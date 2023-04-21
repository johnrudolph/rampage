<?php

namespace app\EnvironmentCards;

class HallowedGround extends EnvironmentCard
{
    const TITLE = 'Hallowed Ground';

    const SLUG = 'hallowed-ground';

    const DESCRIPTION = "During Skirmishes here, you can only play WATER, FIRE, and ELECTRIC cards if you have more ACOLYTES in play than your opponents.";

    public function effectWhenCardIsPrepared()
    {
        //
    }

    public function effectWhenSkirmishStarts()
    {
        //
    }
}