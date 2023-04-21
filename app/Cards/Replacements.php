<?php

namespace app\Cards;

class Replacements extends Card
{
    const TITLE = 'Replacements';

    const TYPE = 'Divine Gift';

    const SLUG = 'replacements';

    const DESCRIPTION = "Discard as many cards from your hand as you want. Then draw 1 card from your deck for every card you discarded.";

    const INITIAL_POWER = 0;

    public function effect()
    {
        //
    }
}