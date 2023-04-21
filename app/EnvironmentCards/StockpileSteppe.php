<?php

namespace app\EnvironmentCards;

class StockpileSteppe extends EnvironmentCard
{
    const TITLE = 'Stockpile Steppe';

    const SLUG = 'stockpile-steppe';

    const DESCRIPTION = "When this is drawn, place 3 Items face-down here. When a Skirmish starts here, flip all 3 Items face-up.";

    public function effectWhenCardIsPrepared()
    {
        //
    }

    public function effectWhenSkirmishStarts()
    {
        //
    }
}