<?php

namespace App\Validator;

use App\Exception\BadTypeException;
use App\Enum\GnomeValidatorReason;
use App\Model\GnomeValidatorInterface;
use App\Model\ValidResponseInterface;
use App\DTO\GnomeDTO;

/**
 * @author Łukasz Gawryluk <gawryluklukasz@gmail.com>
 */
final class GnomeDTOValidator implements GnomeValidatorInterface
{
    /**
     * @var ValidResponse
     */
    private $validResponse;

    /**
     * @var GnomeDTO
     */
    private $gnomeDTO;

    /**
     * @param GnomeDTO $gnomeDTO
     * @return ValidResponseInterface
     */
    public function isValid(GnomeDTO $gnomeDTO): ValidResponseInterface
    {
        $this->validResponse = new ValidResponse();
        $this->gnomeDTO = $gnomeDTO;

        $this->validStrength();
        $this->validAge();

        return $this->validResponse;
    }

    /**
     * Add strenght validation
     */
    private function validStrength()
    {
        try {
            $strength = $this->gnomeDTO->getStrength();
        } catch (BadTypeException $e) {
            $this->validResponse->setValid(false);
            $this->validResponse->addReason(GnomeValidatorReason::StrengthMustBeInt);
            return;
        }

        if ($strength < 0) {
            $this->validResponse->setValid(false);
            $this->validResponse->addReason(GnomeValidatorReason::StrengthToLow);
        } elseif ($strength > 100) {
            $this->validResponse->setValid(false);
            $this->validResponse->addReason(GnomeValidatorReason::StrengthToHigh);
        }
    }

    /**
     * Add age validation
     */
    private function validAge()
    {
        try {
            $age = $this->gnomeDTO->getAge();
        } catch (BadTypeException $e) {
            $this->validResponse->setValid(false);
            $this->validResponse->addReason(GnomeValidatorReason::AgeMustBeInt);
            return;
        }

        if ($age < 0) {
            $this->validResponse->setValid(false);
            $this->validResponse->addReason(GnomeValidatorReason::AgehToLow);
        } elseif ($age > 100) {
            $this->validResponse->setValid(false);
            $this->validResponse->addReason(GnomeValidatorReason::AgeToHigh);
        }
    }
}
