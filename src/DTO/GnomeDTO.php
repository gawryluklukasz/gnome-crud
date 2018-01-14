<?php

namespace App\DTO;

use App\Exception\BadTypeException;

/**
 * @author Łukasz Gawryluk <gawryluklukasz@gmail.com>
 */
final class GnomeDTO
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var string
     */
    private $name;

    /**
     * @var int
     */
    private $strength;

    /**
     * @var int
     */
    private $age;

    /**
     * @return int
     * @throws BadTypeException
     */
    public function getId(): int
    {
        if (!is_int($this->id)) {
            throw new BadTypeException('Id must be an int');
        }
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId($id)
    {
        $this->id = (int) $id;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return (string) $this->name;
    }

    /**
     * @param string $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return int
     * @throws BadTypeException
     */
    public function getStrength(): int
    {
        if (!is_int($this->strength)) {
            throw new BadTypeException('Strength must be an int');
        }
        return $this->strength;
    }

    /**
     * @param int $strength
     */
    public function setStrength($strength)
    {
        $this->strength = $strength;
    }

    /**
     * @return int
     * @throws BadTypeException
     */
    public function getAge(): int
    {
        if (!is_int($this->age)) {
            throw new BadTypeException('Age must be an int');
        }
        return $this->age;
    }

    /**
     * @param int $age
     */
    public function setAge($age)
    {
        $this->age = $age;
    }
}
