<?php

namespace App\StorableEvents;

use Spatie\EventSourcing\StoredEvents\ShouldBeStored;

class PlayerDeckInitialized extends ShouldBeStored
{
    public function __construct(
        public string $player_uuid,
    ) {
    }
}
