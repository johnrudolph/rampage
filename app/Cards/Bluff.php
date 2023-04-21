<?php

namespace app\Cards;

class Bluff extends Card
{
    const TITLE = 'Bluff';

    const TYPE = 'Colossus';

    const SLUG = 'bluff';

    const DESCRIPTION = 'When you Pass while this card is in play, you may move this card face-down to another Environment instead of scoring it. ';

    const INITIAL_POWER = 4;

    public function effect()
    {
        //
    }
}