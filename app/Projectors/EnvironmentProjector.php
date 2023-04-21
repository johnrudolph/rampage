<?php

namespace App\Projectors;

use App\Models\Game;
use App\Models\Environment;
use App\StorableEvents\EnvironmentActivated;
use Spatie\EventSourcing\EventHandlers\Projectors\Projector;

class EnvironmentProjector extends Projector
{
    public function onEnvironmentActivated(EnvironmentActivated $event)
    {
        Environment::create([
            'game_id' => Game::uuid($event->game_uuid)->id,
            'environment_class' => $event->environment_class,
            'status' => 'active',
        ]);
    }
}
