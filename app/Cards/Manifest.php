<?php

namespace app\Cards;

class Manifest extends Card
{
    const TITLE = 'Manifest';

    const TYPE = 'Colossus';

    const SLUG = 'manifest';

    const DESCRIPTION = "Immediately play another card from your hand, even if you are not allowed to play that card right now.";

    const INITIAL_POWER = 1;

    public function effect()
    {
        //
    }
}