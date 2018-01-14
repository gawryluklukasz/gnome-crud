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
     * @var GnomeEntityFactory
     */
    private $gnomeEntityFactory;

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
        $this->gnomeEntityFactory = $gnomeEntityFactory;
        $this->gnomeRepository = $gnomeRepository;
    }

    /**
     * @param GnomeDTO $gnomeDTO
     */
    public function save(GnomeDTO $gnomeDTO)
    {
        $gnome = $this->gnomeEntityFactory->create($gnomeDTO);
        $this->gnomeRepository->save($gnome);
    }
}
