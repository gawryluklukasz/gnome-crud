<?php

namespace App\Service;

use App\Factory\GnomeEntityFactory;
use App\DTO\GnomeDTO;
use App\Repository\GnomeRepository;

/**
 * @author Łukasz Gawryluk <gawryluklukasz@gmail.com>
 */
final class SaveGnomeService
{
    /**
     * @var CreateGnomeEntity
     */
    private $createGnomeEntity;

    /**
     * @var GnomeRepository
     */
    private $gnomeRepository;

    /**
     * @param GnomeEntityFactory $gnomeEntityFactory
     * @param GnomeRepository    $gnomeRepository
     */
    public function __construct(
        GnomeEntityFactory $gnomeEntityFactory,
        GnomeRepository $gnomeRepository
    ) {
        $this->createGnomeEntity = $gnomeEntityFactory;
        $this->gnomeRepository = $gnomeRepository;
    }

    /**
     * @param GnomeDTO $gnomeDTO
     */
    public function save(GnomeDTO $gnomeDTO)
    {
        $gnome = $this->createGnomeEntity->create($gnomeDTO);
        $this->gnomeRepository->save($gnome);
    }
}
