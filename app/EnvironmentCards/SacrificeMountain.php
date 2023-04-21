<?php

namespace app\EnvironmentCards;

class SacrificeMountain extends EnvironmentCard
{
    const TITLE = 'Sacrifice Mountain';

    const SLUG = 'sacrifice-mountain';

    const DESCRIPTION = "When a Skirmish starts here, after players pick up their prepared cards: beginning with the Initiator, everyone chooses 2 cards from their hand and puts them on the top of any opponent's deck. Those cards are now part of their deck.";

    public function effectWhenCardIsPrepared()
    {
        //
    }

    public function effectWhenSkirmishStarts()
    {
        //
    }
}