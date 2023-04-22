<?php

namespace app\Cards;

use App\Models\Player;
use App\Models\Skirmish;

class Acolyte extends Card
{
    const TITLE = 'Acolyte';

    const TYPE = 'Acolyte';

    const SLUG = 'acolyte';

    const DESCRIPTION = 'If you have more Acolytes in play than each of your opponents, this card gets +3 power.';

    const INITIAL_POWER = 2;

    public static function power(Player $player, Skirmish $skirmish)
    {
        return static::INITIAL_POWER;
    }
}