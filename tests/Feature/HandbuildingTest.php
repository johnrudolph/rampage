<?php

use Illuminate\Foundation\Testing\DatabaseMigrations;

uses(DatabaseMigrations::class);

beforeEach(function () {
    $this->bootGame();
});

it('chooses 3 random Environments to be in play when the game starts', function () {

});
