<?php

namespace App\Models;

use Ramsey\Uuid\Uuid;
use App\Traits\HasUuid;
use App\Aggregates\PlayerDeckState;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Player extends Model
{
    use HasFactory, HasUuid;

    protected $guarded = [];

    public static function createWithAttributes(array $attributes)
    {
        $attributes['uuid'] = (string) Uuid::uuid4();

        return static::uuid($attributes['uuid']);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function game()
    {
        return $this->belongsTo(Game::class);
    }

    public function deckState()
    {
        return PlayerDeckState::retrieve($this->uuid);
    }

    public function prepareCard($card, $environment)
    {
        $this->deckState()->prepareCard($card, $environment);
    }
}
