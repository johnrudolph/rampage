<?php

namespace app\Cards;

use App\Models\Player;
use App\Models\Skirmish;

class Inferno extends Card
{
    const TITLE = 'Inferno';

    const TYPE = 'Fire';

    const SLUG = 'inferno';

    const DESCRIPTION = 'When this card is in play, no one can play a BEAST card here.';

    const INITIAL_POWER = 10;

    public function effect()
    {
        //
    }

    public static function power(Player $player, Skirmish $skirmish)
    {
        return static::INITIAL_POWER;
    }
}