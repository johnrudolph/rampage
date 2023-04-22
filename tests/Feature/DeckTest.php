<?php

use Illuminate\Foundation\Testing\DatabaseMigrations;

uses(DatabaseMigrations::class);

beforeEach(function () {
    $this->bootGame();
});

it('creates a deck of 23 cards and deals 3 cards to each player when the game begins', function() {
    expect(collect($this->john->deckState()->cards_in_hand)->count())
        ->toBe(3);

    expect(collect($this->john->deckState()->cards_in_hand)->random()['original_owner'])
        ->toBe($this->john->id);

    expect(collect($this->john->deckState()->cards_in_deck)->count())
        ->toBe(20);

    expect(collect($this->john->deckState()->cards_in_deck)->random()['original_owner'])
        ->toBe($this->john->id);
});

it('prepares the card on the environment state after preparing during handbuilding', function () {
    $card = collect($this->john->deckState()->cards_in_hand)->first()['card_class'];
    $environment = collect($this->game->state()->environments)->first()['environment_class'];

    $this->john->prepareCard($card, $environment, $this->john);

    expect(
        collect($this->john->deckState()->cards_in_hand)
            ->filter(fn ($c) => 
                $c['card_class'] === $card
                && $c['original_owner'] === $this->john->id
            )
            ->count() === 0
    )->toBe(true);

    expect(collect($this->john->deckState()->cards_in_hand)->count())
        ->toBe(3);

    expect(collect($this->john->deckState()->cards_prepared)->first()['card_class'])
        ->toBe($card);

    expect(collect($this->john->deckState()->cards_prepared)->first()['original_owner'])
        ->toBe($this->john->id);
});

it('automatically shuffles discards when deck is empty', function () {

})->skip();

it('ensures that no single card is in two arrays at a time', function () {

})->skip();