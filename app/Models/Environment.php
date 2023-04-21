<?php

namespace App\Models;

use App\Models\Game;
use Ramsey\Uuid\Uuid;
use App\Traits\HasUuid;
use App\Aggregates\EnvironmentState;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Environment extends Model
{
    use HasFactory, HasUuid;

    protected $guarded = [];

    public static function createWithAttributes(array $attributes)
    {
        $attributes['uuid'] = (string) Uuid::uuid4();

        return static::uuid($attributes['uuid']);
    }

    public function state()
    {
        return EnvironmentState::retrieve($this->uuid);
    }

    public function game()
    {
        return $this->belongsTo(Game::class);
    }
}
