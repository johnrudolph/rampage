<?php

namespace App\StorableEvents;

use Spatie\EventSourcing\StoredEvents\ShouldBeStored;

class PlayerPreparedCard extends ShouldBeStored
{
    public function __construct(
        public string $player_uuid,
        public string $card_class,
        public string $environment_class,
    ) {
    }
}
