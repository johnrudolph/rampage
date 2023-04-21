<?php

namespace App\StorableEvents;

use Spatie\EventSourcing\StoredEvents\ShouldBeStored;

class PlayerRemovedFromGame extends ShouldBeStored
{
    public function __construct(
        public string $player_uuid,
        public string $game_uuid,
    ) {
    }
}
