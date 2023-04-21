<?php

namespace App\EnvironmentCards;

class Desert extends EnvironmentCard
{
    const TITLE = 'Desert';

    const SLUG = 'desert';

    const DESCRIPTION = "During Skirmishes here, you cannot play WATER cards.";

    public function effectWhenCardIsPrepared()
    {
        //
    }

    public function effectWhenSkirmishStarts()
    {
        //
    }
}