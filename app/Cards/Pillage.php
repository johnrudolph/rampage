<?php

namespace app\Cards;

class Pillage extends Card
{
    const TITLE = 'Pillage';

    const TYPE = 'Beast';

    const SLUG = 'pillage';

    const DESCRIPTION = 'Choose a card type. Each of your opponents must discard a card of that type from their hand, or discard 2 cards from their hand of types other than the type you chose.';

    const INITIAL_POWER = 2;

    public function effect()
    {
        //
    }
}