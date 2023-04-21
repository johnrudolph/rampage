<?php

namespace app\EnvironmentCards;

use app\Cards\Oasis;
use app\Cards\Cavern;
use app\Cards\Desert;
use app\Cards\Zenith;
use app\Cards\Volcano;
use app\Cards\Badlands;
use app\Cards\TheBrink;
use app\Cards\Graveyard;
use app\Cards\Outskirts;
use app\Cards\TheSticks;
use app\Cards\BlitzCreek;
use app\Cards\GlassRiver;
use app\Cards\ImpulseIsle;
use app\Cards\PoisonSwamp;
use app\Cards\ChaosFissure;
use app\Cards\MagneticMaar;
use app\Cards\HallowedGround;
use app\Cards\StockpileSteppe;
use app\Cards\SacrificeMountain;

class EnvironmentCard
{
    const TITLE = 'Title';

    const SLUG = 'slug';

    const DESCRIPTION = 'Description';

    public function effectWhenCardIsPrepared()
    {
        //
    }

    public function effectWhenSkirmishStarts()
    {
        //
    }

    public static function all()
    {
        return collect([
            Badlands::class,
            BlitzCreek::class,
            Cavern::class,
            ChaosFissure::class,
            Desert::class,
            GlassRiver::class,
            Graveyard::class,
            HallowedGround::class,
            ImpulseIsle::class,
            MagneticMaar::class,
            Oasis::class,
            Outskirts::class,
            PoisonSwamp::class,
            SacrificeMountain::class,
            StockpileSteppe::class,
            TheBrink::class,
            TheSticks::class,
            Volcano::class,
            Zenith::class,
        ]);
    }
}