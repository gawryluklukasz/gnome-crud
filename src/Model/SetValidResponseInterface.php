<?php

namespace App\Model;

/**
 * @author Łukasz Gawryluk <gawryluklukasz@gmail.com>
 */
interface SetValidResponseInterface
{
    /**
     * @param bool $valid
     */
    public function setValid($valid);

    /**
     * @param string $reason
     */
    public function addReason($reason);
}
