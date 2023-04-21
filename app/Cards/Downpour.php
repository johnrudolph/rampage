<?php

namespace app\Cards;

class Downpour extends Card
{
    const TITLE = 'Downpour';

    const TYPE = 'Water';

    const SLUG = 'downpour';

    const DESCRIPTION = 'When this card is in play, it gives +2 Power to all ELECTRIC cards and -2 Power to all FIRE cards (card Power cannot go below 0).';

    const INITIAL_POWER = 5;

    public function effect()
    {
        //
    }
}