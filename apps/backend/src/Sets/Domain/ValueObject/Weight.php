<?php

declare(strict_types=1);

namespace PowerNav\Sets\Domain\ValueObject;

final class Weight
{
    private float $value;
    private WeightUnit $unit;

    public function __construct(float $value, WeightUnit $unit)
    {
        $this->value = $value;
        $this->unit = $unit;
    }

    public function number(): float
    {
        return $this->value;
    }

    public function unit(): WeightUnit
    {
        return $this->unit;
    }
}
