<?php

namespace App\Aggregates;

use App\Models\Game;
use App\Models\User;
use App\Models\Player;
use App\StorableEvents\GameStarted;
use App\Exceptions\InvalidGameSetup;
use App\StorableEvents\PlayerJoinedGame;
use app\EnvironmentCards\EnvironmentCard;
use App\Exceptions\InvalidJoinGameException;
use App\StorableEvents\EnvironmentActivated;
use App\StorableEvents\PlayerRemovedFromGame;
use App\Exceptions\InvalidRemovePlayerException;
use Spatie\EventSourcing\AggregateRoots\AggregateRoot;

class GameState extends AggregateRoot
{
    public $players = [];

    const PHASES = [
        'handbuilding' => 'handbuilding',
        'skirmish' => 'skirmish',
    ];

    public $phase;

    public $environments = [];
    
    public function game()
    {
        return Game::uuid($this->uuid());
    }

    public function addPlayer(User $user)
    {        
        if ($this->game()->status != 'upcoming') {
            throw new InvalidJoinGameException('Cannot join a game after it has started');
        }

        if ($this->game()->players->where('user_id', $user->id)->count() > 0) {
            throw new InvalidJoinGameException('User is already in this game');
        }

        $this->recordThat(new PlayerJoinedGame($this->game()->uuid, $user->id))
            ->persist();

        return $this;
    }

    public function applyUserJoinedGame(PlayerJoinedGame $event)
    {
        // @todo this should be a player_id. But how
        $this->players[] = $event->user_id;
    }

    public function removePlayer(Player $player)
    {
        if ($player->game_id != $this->game()->id) {
            throw new InvalidRemovePlayerException('Player is not in this game');
        }

        if ($this->game()->status != 'upcoming') {
            throw new InvalidRemovePlayerException('Cannot remove a player after the game has started');
        }

        $this->recordThat(new PlayerRemovedFromGame($player->uuid, $this->game()->uuid))
            ->persist();

        return $this;
    }

    public function applyPlayerRemovedFromGame(PlayerRemovedFromGame $event)
    {
        // @todo remove player from the array
    }

    public function start()
    {
        if ($this->game()->players()->get()->count() < 2) {
            throw new InvalidGameSetup('The game must have 2 players to start.');
        }
        
        $this->recordThat(new GameStarted($this->game()->uuid))
            ->persist();

        $this->game()->players->each(fn ($player) => 
            $player->deckState()->initialize());

        $this->refreshEnvironments();

        return $this;
    }

    public function applyGameStarted(GameStarted $event)
    {
        $this->phase = $this::PHASES['handbuilding'];
    }

    public function refreshEnvironments()
    {
        collect(range(1, 3))->each(function ($i) {
            if (collect($this->environments)->where('status', 'active')->count() < 3) {
                $new_environment = EnvironmentCard::all()
                    ->reject(fn ($environment) => 
                        collect($this->environments)
                            ->where('environment_class', $environment)
                            ->count() > 0
                    )
                    ->random();

                $this->recordThat(new EnvironmentActivated($this->game()->uuid, $new_environment))
                    ->persist();
            }
        });

        return $this;
    }

    public function applyEnvironmentActivated(EnvironmentActivated $event)
    {
        $this->environments[] = [
            'environment_class' => $event->environment_class,
            'status' => 'active',
        ];
    }
}
