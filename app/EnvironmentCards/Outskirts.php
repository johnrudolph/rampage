<?php

namespace app\EnvironmentCards;

class Outskirts extends EnvironmentCard
{
    const TITLE = 'Outskirts';

    const SLUG = 'outskirts';

    const DESCRIPTION = "You may Initiate a Skirmish here, even if there are no cards prepared here. However, you can only Initiate a Skirmish here if an opponent has won more Skirmishes than you.";

    public function effectWhenCardIsPrepared()
    {
        //
    }

    public function effectWhenSkirmishStarts()
    {
        //
    }
}