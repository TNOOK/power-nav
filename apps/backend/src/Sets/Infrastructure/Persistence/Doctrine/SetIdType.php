<?php

declare(strict_types=1);

namespace PowerNav\Sets\Infrastructure\Persistence\Doctrine;

use Doctrine\DBAL\Platforms\AbstractPlatform;
use PowerNav\Common\Infrastructure\Persistence\Doctrine\UuidType;
use PowerNav\Sets\Domain\ValueObject\SetId;

final class SetIdType extends UuidType
{
    private const SET_ID = 'set_id';

    public function convertToPHPValue($value, AbstractPlatform $platform): SetId
    {
        return new SetId($value);
    }

    public function getName(): string
    {
        return self::SET_ID;
    }
}
