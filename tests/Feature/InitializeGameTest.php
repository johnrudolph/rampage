<?php

use App\Models\Game;
use App\Models\User;
use App\Models\Player;
use App\Exceptions\InvalidGameSetup;
use App\Exceptions\InvalidJoinGameException;
use App\Exceptions\InvalidRemovePlayerException;
use Illuminate\Foundation\Testing\DatabaseMigrations;

uses(DatabaseMigrations::class);

beforeEach(function () {
    $this->john = User::factory()->create(['name' => 'john']);
    $this->daniel = User::factory()->create(['name' => 'daniel']);
    $this->jacob = User::factory()->create(['name' => 'jacob']);
    $this->mary = User::factory()->create(['name' => 'mary']);
    $this->walter = User::factory()->create(['name' => 'walter']);

    $this->game = Game::fromTemplate();
});

it('allows you to add a player to a game before the game starts', function () {
    $this->game->addPlayer($this->john);

    $this->assertDatabaseHas('players', [
        'game_id' => $this->game->id,
        'user_id' => $this->john->id,
    ]);

    $this->assertEquals($this->john->fresh()->current_game_id, $this->game->id);

    expect($this->game->fresh()->players->count())->toBe(1);
});

it('updates game status to "active" after the game begins', function () {
    $this->game->addPlayer($this->john);
    $this->game->addPlayer($this->jacob);
    $this->game->start();

    $this->assertEquals($this->game->fresh()->status, 'active');
});

it('throws an error if a player joins a game after it has started', function () {
    $this->game->addPlayer($this->john);
    $this->game->addPlayer($this->jacob);
    $this->game->start();

    $this->expect(fn () => $this->game->addPlayer($this->daniel))
        ->toThrow(InvalidJoinGameException::class, 'Cannot join a game after it has started');
});

it('throws an error if a player joins a game they are already in', function () {
    $this->game->addPlayer($this->john);

    $this->expect(fn () => $this->game->fresh()->addPlayer($this->john))
        ->toThrow(InvalidJoinGameException::class, 'User is already in this game');
});

it('allows the Party Leader to remove a player from a game before the game starts', function () {
    $this->game->addPlayer($this->john);
    $this->game->addPlayer($this->jacob);

    $this->game->removePlayer(Player::where('user_id', $this->jacob->id)->first());

    $this->assertEquals($this->game->fresh()->players()->count(), 1);
});

it('throws an error if a player is removed after the game begins', function () {
    $this->game->addPlayer($this->john);
    $this->game->addPlayer($this->jacob);
    $this->game->start();

    $this->expect(fn () => $this->game->removePlayer(Player::where('user_id', $this->jacob->id)->first()))
        ->toThrow(InvalidRemovePlayerException::class, 'Cannot remove a player after the game has started');

    $this->assertEquals($this->game->players()->count(), 2);
});


it('throws an error if you start a game with fewer than 2 players', function () {
    $this->expect(fn () => $this->game->start())
        ->toThrow(InvalidGameSetup::class, 'The game must have 2 players to start.');
});
