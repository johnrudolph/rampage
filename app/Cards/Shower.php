<?php

namespace app\Cards;

class Shower extends Card
{
    const TITLE = 'Shower';

    const TYPE = 'Water';

    const SLUG = 'shower';

    const DESCRIPTION = 'When this card is in play, it gives +2 Power to all ELECTRIC cards and -2 Power to all FIRE cards (card Power cannot go below 0).';

    const INITIAL_POWER = 3;

    public function effect()
    {
        //
    }
}