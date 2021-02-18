<?php

namespace PowerNav\User\Infrastructure\Controller;

use PowerNav\Sets\Application\CreateSet;
use PowerNav\Common\Application\GenerateUuid;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use function Lambdish\Phunctional\apply;

final class UserRegisterPostController
{
    private GenerateUuid $generateUuid;
//    private CreateUser $createUser;

    public function __construct(GenerateUuid $generateUuid)
    {
        $this->generateUuid = $generateUuid;
    }

    public function __invoke(Request $request)
    {
        $data = json_decode($request->getContent(), true, 512, JSON_THROW_ON_ERROR);

        $userId = apply($this->generateUuid);
        die(dump($userId));
        $user = apply($this->createSet, [
            $userId,
            $data['exerciseName'],
            $data['repsNumber'],
            $data['weightValue'],
            $data['weightUnit'],
            $data['desiredRpe'],
            $data['actualRpe'],
            $data['isDone'],
        ]);

        return new JsonResponse($user->id()->value(), Response::HTTP_CREATED);
    }
}
