<?php

namespace App\Model;

use App\DTO\GnomeDTO;

/**
 * @author Łukasz Gawryluk <gawryluklukasz@gmail.com>
 */
interface GnomeValidatorInterface
{
    /**
     * @return ValidResponse
     */
    public function isValid(GnomeDTO $gnomeDTO) : ValidResponseInterface;
}
