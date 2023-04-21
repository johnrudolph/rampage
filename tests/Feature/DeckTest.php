<?php

use Illuminate\Foundation\Testing\DatabaseMigrations;

uses(DatabaseMigrations::class);

beforeEach(function () {
    $this->bootGame();
});

it('gives you a deck of 23 Player Cards when the game starts', function () {
    expect(collect($this->john->deckState()->cards_in_deck)->count())
        ->toBe(23);

    expect(collect($this->john->deckState()->cards_in_deck)->random()['original_owner'])
        ->toBe($this->john->id);
});
