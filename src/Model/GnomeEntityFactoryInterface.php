<?php

namespace App\Model;

use App\DTO\GnomeDTO;
use App\Entity\Gnome;

/**
 * @author Łukasz Gawryluk <gawryluklukasz@gmail.com>
 */
interface GnomeEntityFactoryInterface
{
    /**
     * @return Gnome
     */
    public function create(GnomeDTO $gnomeDTO): Gnome;
}
