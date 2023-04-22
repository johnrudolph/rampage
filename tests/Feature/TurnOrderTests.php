<?php

use Illuminate\Foundation\Testing\DatabaseMigrations;

uses(DatabaseMigrations::class);

beforeEach(function () {
    $this->bootGame();
});

it('begins each game with the handbuilding phase ', function () {
    expect($this->game->state()->phase)
        ->toBe('handbuilding');
});

it('updates the phase of the game after initiation and after skirmishes end', function () {
    $environment = collect($this->game->state()->environments)->first()['environment_class'];

    $this->john->prepareCard(
        collect($this->john->deckState()->cards_in_hand)->first()['card_class'], 
        $environment
    );

    $this->jacob->prepareCard(
        collect($this->jacob->deckState()->cards_in_hand)->first()['card_class'], 
        $environment
    );

    $this->daniel->prepareCard(
        collect($this->daniel->deckState()->cards_in_hand)->first()['card_class'], 
        $environment
    );

    $this->walter->prepareCard(
        collect($this->walter->deckState()->cards_in_hand)->first()['card_class'], 
        $environment
    );

    $this->john->prepareCard(
        collect($this->john->deckState()->cards_in_hand)->first()['card_class'], 
        $environment
    );

    $this->jacob->prepareCard(
        collect($this->jacob->deckState()->cards_in_hand)->first()['card_class'], 
        $environment
    );

    $this->daniel->prepareCard(
        collect($this->daniel->deckState()->cards_in_hand)->first()['card_class'], 
        $environment
    );

    $this->walter->prepareCard(
        collect($this->walter->deckState()->cards_in_hand)->first()['card_class'], 
        $environment
    );
});

it('throws an error if a player attempts to play a card during the handbuilding phase', function() {

})->skip();

it('throws an error if a player attempts to play or prepare a card when it is not their turn', function() {

})->skip();

it('throws an error if a player attempts to prepare a card during the skirmish phase', function() {

})->skip();

it('allows a player to initiate once there are 8 cards', function () {

})->skip();

it('starts handbuilding with the player to the left of the previous initiator', function () {

})->skip();

it('begins each skirmish with the initiator', function () {

})->skip();

it('skips player turn once they have passed or are out of cards', function () {

})->skip();