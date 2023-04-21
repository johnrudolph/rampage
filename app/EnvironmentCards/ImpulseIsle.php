<?php

namespace app\EnvironmentCards;

class ImpulseIsle extends EnvironmentCard
{
    const TITLE = 'Impulse Isle';

    const SLUG = 'impulse-isle';

    const DESCRIPTION = "During Skirmishes here, you will only have 1 turn. On your turn, continue to play cards 1 by 1 and resolve them as you play them until your hand is empty, or until you Pass. On your turn you may still take Items as usual.";

    public function effectWhenCardIsPrepared()
    {
        //
    }

    public function effectWhenSkirmishStarts()
    {
        //
    }
}