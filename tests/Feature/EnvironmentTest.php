<?php

use Illuminate\Foundation\Testing\DatabaseMigrations;

uses(DatabaseMigrations::class);

beforeEach(function () {
    $this->bootGame();
});

it('selects 3 Environments when the game starts', function () {
    expect(collect($this->game->state()->environments)->count())
        ->toBe(3);

    expect(collect($this->game->state()->environments)->first()['status'])
        ->toBe('active');
});

it('throws an error if a player attempts to initiate a skirmish when there are fewer than 8 cards', function() {

})->skip();

it('allows a player to initiate once there are 8 cards', function () {

})->skip();