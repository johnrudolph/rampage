<?php

namespace App\StorableEvents;

use Spatie\EventSourcing\StoredEvents\ShouldBeStored;

class PlayerJoinedGame extends ShouldBeStored
{
    public function __construct(
        public string $game_uuid,
        public int $user_id,
    ) {
    }
}
