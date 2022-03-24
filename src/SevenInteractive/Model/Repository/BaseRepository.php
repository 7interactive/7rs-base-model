<?php

declare(strict_types=1);

namespace SevenInteractive\Model\Repository;

use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\Mapping\ClassMetadataFactory;
use Doctrine\Persistence\Mapping\MappingException;

abstract class BaseRepository extends EntityRepository
{
    /**
     * @var string
     */
    protected static $entityName;

    /**
     * @var EntityManager
     */
    protected static $em;

    /**
     * Initializes a new <tt>EntityRepository</tt>.
     *
     * @param EntityManager $em The EntityManager to use.
     * @param ClassMetadataFactory $class The class descriptor.
     * @throws MappingException
     * @throws \ReflectionException
     */
    public function __construct(EntityManagerInterface $em, ClassMetadataFactory $class)
    {
        $class->setEntityManager($em);
        $className = get_class($this);
        $className = str_replace('Repository\\', 'Entity\\', $className);
        $className = str_replace('Repository', '', $className);
        parent::__construct($em, $class->getMetadataFor($className));
        self::$entityName = $this->_entityName;
        self::$em = $this->_em;
    }
}