<?php

namespace app\EnvironmentCards;

class Cavern extends EnvironmentCard
{
    const TITLE = 'Cavern';

    const SLUG = 'cavern';

    const DESCRIPTION = "During Skirmishes here, if you have 5 or more cards in play when your turn starts, you must Pass.";

    public function effectWhenCardIsPrepared()
    {
        //
    }

    public function effectWhenSkirmishStarts()
    {
        //
    }
}