<?php

namespace app\EnvironmentCards;

class MagneticMaar extends EnvironmentCard
{
    const TITLE = 'Magnetic Maar';

    const SLUG = 'magnetic-maar';

    const DESCRIPTION = "During the Handbuilding phase, this is the only Environment where you can initiate a Skirmish. You may still prepare cards on any of the 3 Environments, but you cannot initiate on either of the other 2 while this is in play.";

    public function effectWhenCardIsPrepared()
    {
        //
    }

    public function effectWhenSkirmishStarts()
    {
        //
    }
}