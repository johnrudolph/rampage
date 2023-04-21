<?php

namespace App\Aggregates;

use app\Cards\Card;
use App\Models\Player;
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

        return $this;
    }

    public function applyPlayerDeckInitialized(PlayerDeckInitialized $event)
    {
        Card::initialDeck()->shuffle()->each(function ($card) {
            $this->cards_in_deck [] = [
                'card' => $card,
                'original_owner' => $this->player()->id,
            ];
        });
    }

    public function prepareCard(Card $card, EnvironmentCard $environment)
    {
        if (
            collect($this->player()->game()->state()->environments)
                ->where([
                    'environment' => $environment,
                    'status' => 'active',
                ])->count() < 1
        ) {
            throw new InvalidPreparedCard('This is not an active environment.');
        }

        if (collect($this->cards_in_hand)->where('card', $card)->count() < 1) {
            throw new InvalidPreparedCard('This card is not in your hand.');
        }
        
        $this->recordThat(new PlayerPreparedCard($this->player()->uuid, $card::class, $environment::class))
            ->persist();

        $this->recordThat(new PlayerDrewUpToThree($this->player()->uuid, $card, $environment))
            ->persist();
    }

    public function applyPlayerPreparedCard(PlayerPreparedCard $event)
    {
        $this->cards_prepared [] = [
            'card' => $event->card_class,
            'environment' => $event->environment_class,
        ];
    }
}
