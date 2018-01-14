<?php

namespace App\Model;

/**
 * @author Łukasz Gawryluk <gawryluklukasz@gmail.com>
 */
interface ValidResponseInterface
{
    /**
     * @return bool
     */
    public function isValid(): bool;

    /**
     * @return array
     */
    public function reason(): array;
}
