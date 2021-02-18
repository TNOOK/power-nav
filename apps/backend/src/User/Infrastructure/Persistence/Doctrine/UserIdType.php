<?php

declare(strict_types=1);

namespace PowerNav\User\Infrastructure\Persistence\Doctrine;

use Doctrine\DBAL\Platforms\AbstractPlatform;
use PowerNav\Common\Infrastructure\Persistence\Doctrine\UuidType;
use PowerNav\User\Domain\UserId;

final class UserIdType extends UuidType
{
    private const USER_ID = 'user_id';

    public function convertToPHPValue($value, AbstractPlatform $platform): UserId
    {
        return new UserId($value);
    }

    public function getName(): string
    {
        return self::USER_ID;
    }
}
