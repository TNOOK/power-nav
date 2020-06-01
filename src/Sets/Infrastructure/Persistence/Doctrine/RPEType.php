<?php

declare(strict_types=1);

namespace PowerNav\Sets\Infrastructure\Persistence\Doctrine;

use Doctrine\DBAL\Platforms\AbstractPlatform;
use Doctrine\DBAL\Types\Type;
use PowerNav\Sets\Domain\ValueObject\RPE;

final class RPEType extends Type
{
    private const RPE = 'rpe';

    public function getSQLDeclaration(array $fieldDeclaration, AbstractPlatform $platform): string
    {
        return $platform->getFloatDeclarationSQL($fieldDeclaration);
    }

    public function convertToPHPValue($value, AbstractPlatform $platform)
    {
        if (null === $value) {
            return null;
        }

        return RPE::fromFloat((float) $value);
    }

    public function convertToDatabaseValue($value, AbstractPlatform $platform)
    {
        if (null === $value) {
            return null;
        }
        return $value->value();
    }

    public function getName(): string
    {
        return self::RPE;
    }
}
