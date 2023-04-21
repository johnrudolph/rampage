<?php

namespace App\Aggregates;

use App\Models\Environment;
use Spatie\EventSourcing\AggregateRoots\AggregateRoot;

class EnvironmentState extends AggregateRoot
{
    public $cards_prepared = [];
    
    public function environment()
    {
        return Environment::uuid($this->uuid());
    }
}
