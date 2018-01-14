<?php

namespace App\Model;

use Symfony\Component\HttpFoundation\Request;
use App\DTO\GnomeDTO;

/**
 * @author Łukasz Gawryluk <gawryluklukasz@gmail.com>
 */
interface GnomeDTOFactoryInterface
{
    /**
     * @param Request $request
     */
    public function setRequest(Request $request) : GnomeDTOFactoryInterface;

    /**
     * @return GnomeDTO
     */
    public function createGnome() : GnomeDTO;
}
