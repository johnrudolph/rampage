<?php

namespace app\Cards;

use App\Models\Player;
use App\Models\Skirmish;

class Bolt extends Card
{
    const TITLE = 'Bolt';

    const TYPE = 'Electric';

    const SLUG = 'bolt';

    const DESCRIPTION = 'When anyone plays a DIVINE GIFT, before they resolve its effect: they must discard 1 card from their hand or destroy 1 card they have in play for each ELECTRIC card in play here.';

    const INITIAL_POWER = 4;

    public function effect()
    {
        //
    }

    public static function power(Player $player, Skirmish $skirmish)
    {
        return static::INITIAL_POWER;
    }
}