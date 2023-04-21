<?php

namespace App\Projectors;

use App\Models\Game;
use App\StorableEvents\GameStarted;
use Spatie\EventSourcing\EventHandlers\Projectors\Projector;

class GameProjector extends Projector
{
    public function onGameStarted(GameStarted $event)
    {
        $game = Game::uuid($event->game_uuid);

        $game->status = 'active';
        $game->save();
    }
}
