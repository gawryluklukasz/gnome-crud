<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\GnomeRepository")
 * @author Łukasz Gawryluk <gawryluklukasz@gmail.com>
 */
final class Gnome
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string")
     */
    private $name;

    /**
     * @ORM\Column(type="smallint")
     */
    private $strength;

    /**
     * @ORM\Column(type="smallint")
     */
    private $age;

    /**
     * @return int
     */
    function getId() : int
    {
        return $this->id;
    }

    /**
     * @return string
     */
    function getName() : string
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return int
     */
    function getStrength() : int
    {
        return $this->strength;
    }

    /**
     * @param int $strength
     */
    function setStrength($strength)
    {
        $this->strength = $strength;
    }

    /**
     * @return int
     */
    function getAge() : int
    {
        return $this->age;
    }

    /**
     * @param int $age
     */
    function setAge($age)
    {
        $this->age = $age;
    }
}
