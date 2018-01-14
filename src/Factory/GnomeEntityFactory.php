<?php

namespace App\Factory;

use App\Exception\BadTypeException;
use App\Repository\GnomeRepository;
use App\Model\GnomeEntityFactoryInterface;
use App\Entity\Gnome;
use App\DTO\GnomeDTO;

/**
 * @author Łukasz Gawryluk <gawryluklukasz@gmail.com>
 */
final class GnomeEntityFactory implements GnomeEntityFactoryInterface
{
    /**
     * @var GnomeRepository
     */
    private $gnomeRepository;

    /**
     * @param GnomeRepository $gnomeRepository
     */
    public function __construct(GnomeRepository $gnomeRepository)
    {
        $this->gnomeRepository = $gnomeRepository;
    }

    /**
     * @param GnomeDTO $gnomeDTO
     * @return Gnome
     */
    public function create(GnomeDTO $gnomeDTO): Gnome
    {
        $id = $gnomeDTO->getId();
        if ($id) {
            $gnome = $this->gnomeRepository->find($id);
        } else {
            $gnome = new Gnome();
        }

        $gnome->setAge($gnomeDTO->getAge());
        $gnome->setName($gnomeDTO->getName());
        $gnome->setStrength($gnomeDTO->getStrength());

        return $gnome;
    }
}
