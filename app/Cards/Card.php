<?php

namespace app\Cards;

use app\Cards\Bolt;
use app\Cards\Bluff;
use app\Cards\Curse;
use app\Cards\Flame;
use app\Cards\Spark;
use app\Cards\Abduct;
use app\Cards\Shower;
use app\Cards\Acolyte;
use app\Cards\Droplet;
use app\Cards\Inferno;
use app\Cards\Pillage;
use app\Cards\Rampage;
use app\Cards\Downpour;
use app\Cards\Manifest;
use app\Cards\Foresight;
use app\Cards\Solidarity;
use app\Cards\Extrication;
use app\Cards\ChannelPower;
use app\Cards\Replacements;
use app\Cards\Companionship;

class Card
{
    const TITLE = 'Title';

    const TYPE = 'Type';

    const SLUG = 'slug';

    const DESCRIPTION = 'Description';

    const INITIAL_POWER = 0;

    public function effect()
    {
        //
    }

    public function power()
    {
        return static::INITIAL_POWER;
    }

    public static function initialDeck()
    {
        return collect([
            Abduct::class,
            Acolyte::class,
            Acolyte::class,
            Acolyte::class,
            Acolyte::class,
            Bluff::class,
            Bolt::class,
            ChannelPower::class,
            Companionship::class,
            Curse::class,
            Downpour::class,
            Droplet::class,
            Extrication::class,
            Flame::class,
            Foresight::class,
            Inferno::class,
            Manifest::class,
            Pillage::class,
            Rampage::class,
            Replacements::class,
            Shower::class,
            Solidarity::class,
            Spark::class,
        ]);
    }
}