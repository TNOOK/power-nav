<?php

declare(strict_types=1);

namespace PowerNav\Common\Domain\Service;

use PowerNav\User\Domain\UserId;

interface UuidGenerator
{
    public function generate(): string;
}
