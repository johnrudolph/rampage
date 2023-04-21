<?php

namespace App\Traits;

use Ramsey\Uuid\Uuid;

trait HasUuid
{
    public static function createWithAttributes(array $attributes)
    {
        $attributes['uuid'] = (string) Uuid::uuid4();

        return static::uuid($attributes['uuid']);
    }

    public static function uuid(string $uuid)
    {
        return static::where('uuid', $uuid)->first();
    }

    protected static function booted()
    {
        static::creating(function ($round) {
            $round->uuid = Uuid::uuid4()->toString();

            return $round;
        });
    }
}
