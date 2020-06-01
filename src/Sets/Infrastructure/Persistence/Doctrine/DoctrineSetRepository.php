<?php

declare(strict_types=1);

namespace PowerNav\Sets\Infrastructure\Persistence\Doctrine;

use Doctrine\ORM\EntityManagerInterface;
use PowerNav\Sets\Domain\Set;
use PowerNav\Sets\Domain\SetRepository;
use PowerNav\Sets\Domain\ValueObject\SetId;

final class DoctrineSetRepository implements SetRepository
{
    /**
     * @var EntityManagerInterface
     */
    private EntityManagerInterface $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    public function searchById(SetId $id): ?Set
    {
        /** @var Set $set */
        $set = $this->entityManager->find(Set::class, $id);

        return $set;
    }

    public function save(Set $set): void
    {
        $this->entityManager->persist($set);
        $this->entityManager->flush();
    }
}
