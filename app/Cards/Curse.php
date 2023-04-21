<?php

namespace app\Cards;

class Curse extends Card
{
    const TITLE = 'Curse';

    const TYPE = 'Colossus';

    const SLUG = 'curse';

    const DESCRIPTION = "If you discard this card from your hand during a Skirmish: play it in front of an opponent. It is now in play for them, and is part of their deck. If you destroy this card while it is in play for you, move it to your discard pile.";

    const INITIAL_POWER = -5;
}