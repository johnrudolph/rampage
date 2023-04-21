<?php

namespace app\EnvironmentCards;

class TheSticks extends EnvironmentCard
{
    const TITLE = 'The Sticks';

    const SLUG = 'the-sticks';

    const DESCRIPTION = "Every time you play a FIRE card here during a Skirmish, choose 1 card in play here, and destroy it.";

    public function effectWhenCardIsPrepared()
    {
        //
    }

    public function effectWhenSkirmishStarts()
    {
        //
    }
}