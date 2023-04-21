<?php

namespace app\Cards;

class Flame extends Card
{
    const TITLE = 'Flame';

    const TYPE = 'Fire';

    const SLUG = 'flame';

    const DESCRIPTION = 'When this card is in play, no one can play a BEAST card here.';

    const INITIAL_POWER = 6;

    public function effect()
    {
        //
    }

    public function power()
    {
        return static::INITIAL_POWER;
    }
}