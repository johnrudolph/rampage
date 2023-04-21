<?php

namespace app\EnvironmentCards;

class Badlands extends EnvironmentCard
{
    const TITLE = 'Badlands';

    const SLUG = 'badlands';

    const DESCRIPTION = 'During Skirmishes here: you cannot play FIRE cards, and when you play a BEAST card, resolve its effect twice.';

    public function effectWhenCardIsPrepared()
    {
        //
    }

    public function effectWhenSkirmishStarts()
    {
        //
    }
}