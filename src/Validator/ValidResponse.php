<?php

namespace App\Validator;

use App\Model\ValidResponseInterface;
use App\Model\SetValidResponseInterface;

/**
 * @author Łukasz Gawryluk <gawryluklukasz@gmail.com>
 */
final class ValidResponse implements ValidResponseInterface, SetValidResponseInterface
{
    /**
     * @var bool
     */
    private $valid;

    /**
     * @var array
     */
    private $reason;

    /**
     * @param bool  $valid
     * @param array $reason
     */
    public function __construct($valid = true, $reason = [])
    {
        $this->valid = $valid;
        $this->reason = $reason;
    }

    /**
     * @param string $reason
     */
    public function addReason($reason)
    {
        $this->reason[] = $reason;
    }

    /**
     * @param int $valid
     */
    public function setValid($valid)
    {
        $this->valid = $valid;
    }

    /**
     * @return bool
     */
    public function isValid(): bool
    {
        return $this->valid;
    }

    /**
     * @return array
     */
    public function reason(): array
    {
        return $this->reason;
    }
}
