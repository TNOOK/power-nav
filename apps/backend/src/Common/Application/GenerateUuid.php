<?php
declare(strict_types=1);

namespace PowerNav\Common\Application;

use PowerNav\Common\Domain\Service\UuidGenerator;
use PowerNav\User\Domain\UserId;

final class GenerateUuid
{
    private UuidGenerator $uuidGenerator;

    public function __construct(UuidGenerator $uuidGenerator)
    {
        $this->uuidGenerator = $uuidGenerator;
    }

    public function __invoke(): string
    {
        return $this->uuidGenerator->generate();
    }
}
