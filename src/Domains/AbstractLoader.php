<?php

declare(strict_types=1);

/*
 * This file is part of ApiBlogPractice
 *
 * (c) Aurelien Morvan <morvan.aurelien@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace App\Domains;

use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Serializer\SerializerInterface;

/**
 * Class AbstractLoader
 */
abstract class AbstractLoader
{
    /** @var EntityManagerInterface */
    protected $entityManager;

    /** @var SerializerInterface */
    protected $serializer;

    /**
     * AbstractLoader constructor.
     *
     * @param EntityManagerInterface $entityManager
     * @param SerializerInterface    $serializer
     */
    public function __construct(
        EntityManagerInterface $entityManager,
        SerializerInterface $serializer
    ) {
        $this->entityManager = $entityManager;
        $this->serializer = $serializer;
    }

    public function load()
    {
        return $this->serializer->serialize(
            $this->obtainDatasFromDatabase(),
            'json'
        );
    }

    public function getRepository()
    {
        return $this->entityManager->getRepository($this->getClassName());
    }

    abstract protected function getClassName();

    abstract protected function obtainDatasFromDatabase();
}
