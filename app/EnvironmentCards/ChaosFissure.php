<?php

namespace app\EnvironmentCards;

class ChaosFissure extends EnvironmentCard
{
    const TITLE = 'Chaos Fissure';

    const SLUG = 'chaos-fissure';

    const DESCRIPTION = "When you prepare a card here during Handbuilding: all opponents must immediately prepare a card here too. When a Skirmish starts here, shuffle all the cards prepared here and deal them out clockwise, beginning with the Initiator.";

    public function effectWhenCardIsPrepared()
    {
        //
    }

    public function effectWhenSkirmishStarts()
    {
        //
    }
}