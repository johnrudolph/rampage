<?php

namespace app\Cards;

class Rampage extends Card
{
    const TITLE = 'Rampage';

    const TYPE = 'Beast';

    const SLUG = 'rampage';

    const DESCRIPTION = 'All of your opponents must discard cards from their hand until their hand size is equal to your hand size.';

    const INITIAL_POWER = 2;

    public function effect()
    {
        //
    }
}