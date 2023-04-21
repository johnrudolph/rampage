<?php

namespace app\EnvironmentCards;

class Graveyard extends EnvironmentCard
{
    const TITLE = 'Graveyard';

    const SLUG = 'graveyard';

    const DESCRIPTION = "When a Skirmish starts here, before the Initiator plays their first card, everyone searches their discard piles for Acolytes and immediately plays all Acolytes they find.";

    public function effectWhenCardIsPrepared()
    {
        //
    }

    public function effectWhenSkirmishStarts()
    {
        //
    }
}