<?php
declare(strict_types=1);

namespace PowerNav\Sets\Application;

use PowerNav\Sets\Domain\Set;
use PowerNav\Sets\Domain\SetRepository;
use PowerNav\Sets\Domain\ValueObject\SetId;

final class GetSet
{
    private SetRepository $setRepository;

    public function __construct(SetRepository $setRepository)
    {
        $this->setRepository = $setRepository;
    }

    public function __invoke(string $id): Set
    {
        $setId = new SetId($id);

        return $this->setRepository->searchById($setId);
    }
}
