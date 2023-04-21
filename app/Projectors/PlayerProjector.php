<?php

namespace App\Projectors;

use App\Models\Game;
use App\Models\User;
use App\Models\Player;
use App\StorableEvents\PlayerJoinedGame;
use App\StorableEvents\PlayerRemovedFromGame;
use Spatie\EventSourcing\EventHandlers\Projectors\Projector;

class PlayerProjector extends Projector
{
    public function onPlayerJoinedGame(PlayerJoinedGame $event)
    {
        $game = Game::uuid($event->game_uuid);
        $user = User::find($event->user_id);
        
        $player = Player::create([
            'game_id' => $game->id,
            'user_id' => $event->user_id,
        ]);

        $user->current_game_id = $game->id;
        $user->save();
    }

    public function onPlayerRemovedFromGame(PlayerRemovedFromGame $event)
    {        
        $game = Game::uuid($event->game_uuid);
        $player = Player::uuid($event->player_uuid);

        $player->delete();
    }
}
