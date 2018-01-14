<?php

namespace App\Repository;

use App\Entity\Gnome;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @author Łukasz Gawryluk <gawryluklukasz@gmail.com>
 */
class GnomeRepository extends ServiceEntityRepository
{
    /**
     * @param RegistryInterface $registry
     */
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Gnome::class);
    }

    /**
     * @param Gnome $gnome
     */
    public function save(Gnome $gnome)
    {
        $this->_em->persist($gnome);
        $this->_em->flush();
    }
}
