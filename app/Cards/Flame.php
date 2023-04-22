<?php

namespace app\Cards;

use App\Models\Player;
use App\Models\Skirmish;

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

    public static function power(Player $player, Skirmish $skirmish)
    {
        return static::INITIAL_POWER;
    }
}