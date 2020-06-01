<?php

declare(strict_types=1);

namespace PowerNav\Sets\Infrastructure\Controller;

use PowerNav\Sets\Application\GetSet;
use PowerNav\Sets\Domain\Set;
use Symfony\Component\HttpFoundation\JsonResponse;
use function Lambdish\Phunctional\apply;

final class SetsGetController
{
    private GetSet $getSet;

    public function __construct(GetSet $getSet)
    {
        $this->getSet = $getSet;
    }

    public function __invoke(string $id): JsonResponse
    {
        /** @var Set $set */
        $set = apply($this->getSet, [$id]);

        return new JsonResponse($set->weight()->number());
    }
}
