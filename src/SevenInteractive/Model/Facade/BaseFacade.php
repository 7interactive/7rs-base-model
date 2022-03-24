<?php

declare(strict_types=1);

namespace SevenInteractive\Model\Facade;

use Nettrine\ORM\EntityManagerDecorator;
use SevenInteractive\Model\Entity\BaseEntity;

abstract class BaseFacade
{
    /** @var EntityManagerDecorator $em */
    protected $em;

    public function __construct(EntityManagerDecorator $em)
    {
        $this->em = $em;
    }

    public function flush()
    {
        $this->em->flush();
    }

    public function getEM()
    {
        return $this->em;
    }

    public function persist(BaseEntity $entity)
    {
        $this->em->persist($entity);
    }

    public function persistAndFlush(BaseEntity $entity)
    {
        $this->persist($entity);
        $this->flush();
        return $entity;
    }

    public function removeAndFlush(BaseEntity $entity)
    {
        $this->em->remove($entity);
        $this->flush();
        return $entity;
    }
}
