<?php

namespace app\EnvironmentCards;

class PoisonSwamp extends EnvironmentCard
{
    const TITLE = 'Poison Swamp';

    const SLUG = 'poison-swamp';

    const DESCRIPTION = "After you prepare a card here in the Handbuilding phase, discard the other 2 cards from your hand, then draw back up to 3 cards.";

    public function effectWhenCardIsPrepared()
    {
        //
    }

    public function effectWhenSkirmishStarts()
    {
        //
    }
}