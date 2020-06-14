<?php

declare(strict_types=1);

namespace PowerNav\Sets\Infrastructure\Persistence\Doctrine;

use Doctrine\DBAL\Platforms\AbstractPlatform;
use Doctrine\DBAL\Types\Type;
use PowerNav\Sets\Domain\ValueObject\WeightUnit;

final class WeightUnitType extends Type
{
    public function getSQLDeclaration(array $fieldDeclaration, AbstractPlatform $platform): string
    {
        return $platform->getVarcharTypeDeclarationSQL($fieldDeclaration);
    }

    public function convertToDatabaseValue($value, AbstractPlatform $platform)
    {
        return $value->value();
    }

    public function convertToPHPValue($value, AbstractPlatform $platform)
    {
        return WeightUnit::kilogram();
    }

    public function getName(): string
    {
        return 'weight_unit';
    }
}
