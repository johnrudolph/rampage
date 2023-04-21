<?php

namespace App\Models;

use Ramsey\Uuid\Uuid;
use App\Models\Player;
use App\Traits\HasUuid;
use Illuminate\Support\Str;
use App\Aggregates\GameState;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Game extends Model
{
    use HasFactory, HasUuid;

    protected $guarded = [];

    public function state()
    {
        return GameState::retrieve($this->uuid);
    }

    public static function createWithAttributes(array $attributes)
    {
        $attributes['uuid'] = (string) Uuid::uuid4();

        return static::uuid($attributes['uuid']);
    }

    public function players()
    {
        return $this->hasMany(Player::class);
    }

    public static function fromTemplate()
    {
        $game = self::create([
            'uuid' => Uuid::uuid4(),
            'game_code' => self::createGameCode(),
        ]);

        return $game;
    }

    public static function createGameCode()
    {
        $code = Str::random(4);

        if (Game::where('game_code', $code)->where('status', '!=', 'complete')->exists()) {
            return Game::createGameCode();
        }

        return $code;
    }

    public function addPlayer(User $user)
    {
        $this->state()->addPlayer($user);
    }

    public function removePlayer(Player $player)
    {
        $this->state()->removePlayer($player);
    }

    public function start()
    {
        $this->state()->start();
    }
}
