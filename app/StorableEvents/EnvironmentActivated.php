<?php

namespace App\StorableEvents;

use Spatie\EventSourcing\StoredEvents\ShouldBeStored;

class EnvironmentActivated extends ShouldBeStored
{
    public function __construct(
        public string $game_uuid,
        public string $environment_class,
    ) {
    }
}
