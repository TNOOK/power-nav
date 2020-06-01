<?php

declare(strict_types=1);

namespace PowerNav\Sets\Infrastructure\Controller;

use PowerNav\Sets\Application\CreateSet;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use function Lambdish\Phunctional\apply;

final class SetsPostController
{
    private CreateSet $createSet;

    public function __construct(CreateSet $createSet)
    {
        $this->createSet = $createSet;
    }

    public function __invoke(Request $request)
    {
        $data = json_decode($request->getContent(), true, 512, JSON_THROW_ON_ERROR);

        $set = apply($this->createSet, [
            $data['id'],
            $data['exerciseName'],
            $data['repsNumber'],
            $data['weightValue'],
            $data['weightUnit'],
            $data['desiredRpe'],
            $data['actualRpe'],
            $data['isDone'],
        ]);

        return new JsonResponse($set->id()->value(), Response::HTTP_CREATED);
    }
}
