<?php

namespace app\Cards;

class Foresight extends Card
{
    const TITLE = 'Foresight';

    const TYPE = 'Divine Gift';

    const SLUG = 'foresight';

    const DESCRIPTION = "Look at the top 4 cards from your deck. Add 1 of them in your hand, and return the other 3 to the top of your deck in any order you choose.";

    const INITIAL_POWER = 0;

    public function effect()
    {
        //
    }
}