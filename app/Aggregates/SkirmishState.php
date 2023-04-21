<?php

namespace App\Aggregates;

use App\Models\Skirmish;
use Spatie\EventSourcing\AggregateRoots\AggregateRoot;

class SkirmishState extends AggregateRoot
{
    public $player_power = [];

    public function skirmish()
    {
        return Skirmish::uuid($this->uuid());
    }

    public function environment()
    {
        return $this->skirmish()->environment;
    }
    
    public function start()
    {
        $this->recordThat(new SkirmishStarted($this->uuid()))
            ->persist();

        return $this;
    }

    public function applySkirmishStarted(SkirmishStarted $event)
    {
        $this->skirmish()->players->each(fn ($player) => 
            collect($this->player_power)
                ->push([
                'player_id' => $player->id,
                'power' => 0,
            ])
        );
    }

    public function end()
    {
        $this->recordThat(new SkirmishEnded($this->uuid()))
            ->persist();

        return $this;
    }
}
