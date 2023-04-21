<?php

namespace app\EnvironmentCards;

class Volcano extends EnvironmentCard
{
    const TITLE = 'Volcano';

    const SLUG = 'volcano';

    const DESCRIPTION = "After passing during Skirmishes here, discard all cards remaining in your hand instead of moving those cards to other Environments.";

    public function effectWhenCardIsPrepared()
    {
        //
    }

    public function effectWhenSkirmishStarts()
    {
        //
    }
}