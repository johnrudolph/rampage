<?php

namespace app\EnvironmentCards;

class GlassRiver extends EnvironmentCard
{
    const TITLE = 'Glass River';

    const SLUG = 'glass-river';

    const DESCRIPTION = "All cards prepared here must be face-up rather than face-down.";

    public function effectWhenCardIsPrepared()
    {
        //
    }

    public function effectWhenSkirmishStarts()
    {
        //
    }
}