<?php

namespace Tests;

use App\Models\Game;
use App\Models\User;
use App\Models\Player;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;

    public Game $game;

    public function bootGame() {
        $this->game = Game::fromTemplate();

        $this->setGame($this->game);

        collect(['john', 'jacob', 'daniel', 'walter'])
            ->each(function ($name) {
                $user_name = $name.'_user';

                $this->$user_name = User::factory()->create(['name' => $name]);

                $this->game->addPlayer($this->$user_name);

                $this->$name = Player::firstWhere('user_id', $this->$user_name->id);
            });

        $this->game->start();
    }

    public function setGame(Game $game)
    {
        config(['app.testing_game_id' => $game->id]);
    }
}
