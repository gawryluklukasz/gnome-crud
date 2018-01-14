<?php

namespace App\Factory;

use Symfony\Component\HttpFoundation\Request;
use App\Model\GnomeDTOFactoryInterface;
use App\DTO\GnomeDTO;

/**
 * @author Łukasz Gawryluk <gawryluklukasz@gmail.com>
 */
final class GnomeDTOFactory implements GnomeDTOFactoryInterface
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
     * @param Request $request
     * @return GnomeDTOFactoryInterface
     */
    public function setRequest(Request $request): GnomeDTOFactoryInterface
    {
        $data = $request->request->all();

        $this->name = $data['name'] ?? null;
        $this->strength = $data['strength'] ?? null;
        $this->age = $data['age'] ?? null;
 
        return $this;
    }

    /**
     * @param int $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return GnomeDTO
     */
    public function createGnome(): GnomeDTO
    {
        $gnomeDTO = new GnomeDTO();
        $gnomeDTO->setName($this->name);
        $gnomeDTO->setStrength($this->strength);
        $gnomeDTO->setAge($this->age);
        $gnomeDTO->setId($this->id);

        return $gnomeDTO;
    }
}
