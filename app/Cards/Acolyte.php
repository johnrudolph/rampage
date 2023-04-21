<?php

namespace app\Cards;

class Acolyte extends Card
{
    const TITLE = 'Acolyte';

    const TYPE = 'Acolyte';

    const SLUG = 'acolyte';

    const DESCRIPTION = 'If you have more Acolytes in play than each of your opponents, this card gets +3 power.';

    const INITIAL_POWER = 2;

    public function power()
    {
        return static::INITIAL_POWER;
    }
}