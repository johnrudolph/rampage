<?php

namespace App\StorableEvents;

use Spatie\EventSourcing\StoredEvents\ShouldBeStored;

class PlayerDrewCard extends ShouldBeStored
{
    public function __construct(
        public string $player_uuid,
        public string $card_class,
        public int $original_owner,
    ) {
    }
}
