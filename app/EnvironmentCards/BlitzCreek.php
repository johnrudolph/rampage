<?php

namespace app\EnvironmentCards;

class BlitzCreek extends EnvironmentCard
{
    const TITLE = 'BlitzCreek';

    const SLUG = 'blitz-creek';

    const DESCRIPTION = "During Skirmishes here, if you have 20 or more Power in play at the end of your turn or another player's turn, your opponents must discard all the cards in their hands.";

    public function effectWhenCardIsPrepared()
    {
        //
    }

    public function effectWhenSkirmishStarts()
    {
        //
    }
}