<?php

namespace app\Cards;

class Spark extends Card
{
    const TITLE = 'Spark';

    const TYPE = 'Electric';

    const SLUG = 'spark';

    const DESCRIPTION = 'When anyone plays a DIVINE GIFT, before they resolve its effect: they must discard 1 card from their hand or destroy 1 card they have in play for each ELECTRIC card in play here.';

    const INITIAL_POWER = 1;

    public function effect()
    {
        //
    }

    public function power()
    {
        return static::INITIAL_POWER;
    }
}