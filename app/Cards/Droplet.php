<?php

namespace app\Cards;

class Droplet extends Card
{
    const TITLE = 'Droplet';

    const TYPE = 'Water';

    const SLUG = 'droplet';

    const DESCRIPTION = 'When this card is in play, it gives +2 Power to all ELECTRIC cards and -2 Power to all FIRE cards (card Power cannot go below 0).';

    const INITIAL_POWER = 1;

    public function effect()
    {
        //
    }
}