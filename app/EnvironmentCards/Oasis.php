<?php

namespace app\EnvironmentCards;

class Oasis extends EnvironmentCard
{
    const TITLE = 'Oasis';

    const SLUG = 'oasis';

    const DESCRIPTION = "When a Skirmish starts here, before the Initiator plays their first card, draw 3 cards if you have fewer cards prepared on this Environment than all of your opponents.";

    public function effectWhenCardIsPrepared()
    {
        //
    }

    public function effectWhenSkirmishStarts()
    {
        //
    }
}