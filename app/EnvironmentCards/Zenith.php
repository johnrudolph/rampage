<?php

namespace app\EnvironmentCards;

class Zenith extends EnvironmentCard
{
    const TITLE = 'Zenith';

    const SLUG = 'zenith';

    const DESCRIPTION = "When a Skirmish starts here: draw 3 cards if you are 2 or more Skirmishes away from winning the game. The hand limit during Skirmishes here is 10 instead of 8.";

    public function effectWhenCardIsPrepared()
    {
        //
    }

    public function effectWhenSkirmishStarts()
    {
        //
    }
}