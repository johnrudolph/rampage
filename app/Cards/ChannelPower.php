<?php

namespace app\Cards;

use App\Models\Player;
use App\Models\Skirmish;

class ChannelPower extends Card
{
    const TITLE = 'Channel Power';

    const TYPE = 'Colossus';

    const SLUG = 'channel-power';

    const DESCRIPTION = "When scoring, find your opponent who has the most cards in play here. This card's power is equal to the number of cards that opponent has in play here.";

    const INITIAL_POWER = 0;

    public static function power(Player $player, Skirmish $skirmish)
    {
        //
    }
}