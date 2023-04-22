<?php

use Illuminate\Foundation\Testing\DatabaseMigrations;

uses(DatabaseMigrations::class);

beforeEach(function () {
    $this->bootGame();
});

it('calculates scores at the end of skirmishes', function () {

})->skip();

it('handles ties', function () {

})->skip();
