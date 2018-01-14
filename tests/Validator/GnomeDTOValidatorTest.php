<?php

namespace App\Validator;

use PHPUnit\Framework\TestCase;
use App\Enum\GnomeValidatorReason;
use App\Validator\GnomeDTOValidator;
use App\DTO\GnomeDTO;

/**
 * @author Łukasz Gawryluk <gawryluklukasz@gmail.com>
 */
class GnomeDTOValidatorTest extends TestCase
{
    /**
     * Check min valid data
     */
    public function testIsValidCorrectMin()
    {
        $gnomeDTOValidator = new GnomeDTOValidator();
        $gnomeDTO = $this->getDTO([
            'name' => 'test',
            'age' => 0,
            'strength' => 0,
        ]);
        $valid = $gnomeDTOValidator->isValid($gnomeDTO);
        $this->assertTrue($valid->isValid());
    }

    /**
     * Check max valid data
     */
    public function testIsValidCorrectMax()
    {
        $gnomeDTOValidator = new GnomeDTOValidator();
        $gnomeDTO = $this->getDTO([
            'name' => 'test',
            'age' => 100,
            'strength' => 100,
        ]);
        $valid = $gnomeDTOValidator->isValid($gnomeDTO);
        $this->assertTrue($valid->isValid());
    }

    /**
     * Check to high data to valid
     */
    public function testIsValidIncorrectToHigh()
    {
        $gnomeDTOValidator = new GnomeDTOValidator();
        $gnomeDTO = $this->getDTO([
            'name' => 'test',
            'age' => 101,
            'strength' => 101,
        ]);
        $valid = $gnomeDTOValidator->isValid($gnomeDTO);
        $this->assertFalse($valid->isValid());
        $this->assertNotFalse(array_search(GnomeValidatorReason::AgeToHigh, $valid->reason()));
        $this->assertNotFalse(array_search(GnomeValidatorReason::StrengthToHigh, $valid->reason()));
    }

    /**
     * Check to low data to valid
     */
    public function testIsValidIncorrectToLow()
    {
        $gnomeDTOValidator = new GnomeDTOValidator();
        $gnomeDTO = $this->getDTO([
            'name' => 'test',
            'age' => -1,
            'strength' => -1,
        ]);
        $valid = $gnomeDTOValidator->isValid($gnomeDTO);
        $this->assertFalse($valid->isValid());
        $this->assertNotFalse(array_search(GnomeValidatorReason::AgeToLow, $valid->reason()));
        $this->assertNotFalse(array_search(GnomeValidatorReason::StrengthToLow, $valid->reason()));
    }

    /**
     * Check not int data to valid
     */
    public function testIsValidIncorrectNotInt()
    {
        $gnomeDTOValidator = new GnomeDTOValidator();
        $gnomeDTO = $this->getDTO([
            'name' => 'test',
            'age' => 'tom',
            'strength' => 'vasel',
        ]);
        $valid = $gnomeDTOValidator->isValid($gnomeDTO);
        $this->assertFalse($valid->isValid());
        $this->assertNotFalse(array_search(GnomeValidatorReason::AgeMustBeInt, $valid->reason()));
        $this->assertNotFalse(array_search(GnomeValidatorReason::StrengthMustBeInt, $valid->reason()));
    }

    /**
     * @param array $data
     * @return GnomeDTO
     */
    private function getDTO($data)
    {
        $gnomeDTO = new GnomeDTO();
        $gnomeDTO->setAge($data['age']);
        $gnomeDTO->setName($data['name']);
        $gnomeDTO->setStrength($data['strength']);
        
        return $gnomeDTO;
    }
}
