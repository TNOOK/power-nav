<?php

declare(strict_types=1);

namespace PowerNav\Sets\Domain\ValueObject;

use InvalidArgumentException;

final class WeightUnit
{
    public const KGS = 'kgs';
    public const LBS = 'lbs';
    private const AVAILABLE_UNITS = [
        self::KGS,
        self::LBS,
    ];

    private string $value;

    private function __construct(string $value)
    {
        $this->value = $value;
    }

    public static function kilogram(): self
    {
        return new self(self::KGS);
    }

    public static function fromString(string $weightUnit): self
    {
        self::validate($weightUnit);

        return new self($weightUnit);
    }

    private static function validate(string $weightUnit): void
    {
        if (!in_array($weightUnit, self::AVAILABLE_UNITS, true)) {
            throw new InvalidArgumentException(sprintf('%s is not a valid unit', $weightUnit));
        }
    }

    public function value(): string
    {
        return $this->value;
    }
}
