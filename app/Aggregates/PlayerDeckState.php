<?php

namespace App\Aggregates;

use app\Cards\Card;
use App\Models\Player;
use App\StorableEvents\PlayerDrewCard;
use App\Exceptions\InvalidPreparedCard;
use app\EnvironmentCards\EnvironmentCard;
use App\StorableEvents\PlayerPreparedCard;
use App\StorableEvents\PlayerDeckInitialized;
use Spatie\EventSourcing\AggregateRoots\AggregateRoot;

class PlayerDeckState extends AggregateRoot
{
    public $cards_in_deck = [];

    public $cards_in_hand = [];

    public $cards_in_play = [];

    public $cards_in_discard = [];

    public $cards_prepared = [];

    public function player()
    {
        return Player::uuid($this->uuid());
    }

    public function initialize()
    {
        $this->recordThat(new PlayerDeckInitialized($this->player()->uuid))
            ->persist();

        $this->drawUpTo3();

        return $this;
    }

    public function applyPlayerDeckInitialized(PlayerDeckInitialized $event)
    {
        Card::initialDeck()->shuffle()->each(function ($card) {
            $this->cards_in_deck [] = [
                'card_class' => $card,
                'original_owner' => $this->player()->id,
            ];
        });
    }

    public function drawUpTo3()
    {
        $cards_in_hand = collect($this->cards_in_hand)->count();

        collect(range(1, 3 - $cards_in_hand))->each(function ($i) {
            $next_card = collect($this->cards_in_deck)->first();

            $this->recordThat(new PlayerDrewCard($this->player()->uuid, $next_card['card_class'], $next_card['original_owner']))
                ->persist();
        });
    }

    public function applyPlayerDrewCard(PlayerDrewCard $event)
    {
        $this->cards_in_hand [] = [
            'card_class' => $event->card_class,
            'original_owner' => $event->original_owner,
        ];

        // @todo: this would remove all 4 acolytes
        $this->cards_in_deck = collect($this->cards_in_deck)
            ->reject(fn ($card) => 
                $card['original_owner'] === $event->original_owner
                && $card['card_class'] === $event->card_class
            )
            ->toArray();
    }

    public function prepareCard($card, $environment, Player $original_owner)
    {
        if (
            collect($this->player()->game->state()->environments)
                ->filter(fn ($env) => 
                    $env['environment_class'] === $environment
                    && $env['status'] === 'active'
                )
                ->count() < 1
        ) {
            throw new InvalidPreparedCard('This is not an active environment.');
        }

        if (
            collect($this->cards_in_hand)
                ->filter(fn ($c) => 
                    $c['card_class'] === $card
                    && $c['original_owner'] === $original_owner->id
                )
                ->count() < 1
        ) {
            throw new InvalidPreparedCard('This card is not in your hand.');
        }
        
        $this->recordThat(new PlayerPreparedCard($this->player()->uuid, $card, $environment, $original_owner->id))
            ->persist();

        $this->drawUpTo3();

        return $this;
    }

    public function applyPlayerPreparedCard(PlayerPreparedCard $event)
    {
        $this->cards_prepared [] = [
            'card_class' => $event->card_class,
            'original_owner' => $event->original_owner,
            'environment' => $event->environment_class,
        ];

        // @todo: remove card from hand
        $this->cards_in_hand = collect($this->cards_in_hand)
            ->reject(fn ($card) => 
                $card['original_owner'] === $event->original_owner
                && $card['card_class'] === $event->card_class
            )
            ->toArray();
    }
}
