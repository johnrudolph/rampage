<?php

namespace App\Models;

use App\Models\Game;
use App\Models\Player;
use App\Aggregates\SkirmishState;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Skirmish extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function game()
    {
        return $this->belongsTo(Game::class);
    }

    public function players()
    {
        return $this->hasMany(Player::class);
    }

    public function state()
    {
        return SkirmishState::retrieve($this->uuid);
    }

    public function start()
    {
        $this->state()->start();
    }

    public function end()
    {
        $this->state()->end();
    }
}
