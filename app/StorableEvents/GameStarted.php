<?php

namespace App\StorableEvents;

use Spatie\EventSourcing\StoredEvents\ShouldBeStored;

class GameStarted extends ShouldBeStored
{
    public function __construct(
        public string $game_uuid,
    ) {
    }
}
