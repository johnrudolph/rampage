<?php

namespace app\EnvironmentCards;

class TheBrink extends EnvironmentCard
{
    const TITLE = 'The Brink';

    const SLUG = 'the-brink';

    const DESCRIPTION = "When preparing a card here during the Handbuilding phase, you must immediately prepare all 3 cards from your hand here, and draw 3 cards from your deck. Then, destroy 1 card that an opponent has prepared here.";

    public function effectWhenCardIsPrepared()
    {
        //
    }

    public function effectWhenSkirmishStarts()
    {
        //
    }
}