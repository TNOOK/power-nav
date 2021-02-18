<?php

declare(strict_types=1);

namespace PowerNav\Common\Infrastructure\Service;

use PowerNav\Common\Domain\Service\UuidGenerator;
use Ramsey\Uuid\Uuid;

final class RamseyUuidGenerator implements UuidGenerator
{
    public function generate(): string
    {
        return Uuid::uuid4()->toString();
    }
}
