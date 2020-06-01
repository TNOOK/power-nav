<?php

declare(strict_types=1);

namespace PowerNav\Tests\Common\Domain\ValueObject;

use PHPUnit\Framework\TestCase;
use PowerNav\Sets\Domain\ValueObject\WeightUnit;

final class WeightUnitTest extends TestCase
{
    public function testKilogramsConstructor(): void
    {
        $unit = WeightUnit::kilogram();

        $this->assertSame(WeightUnit::KGS, $unit->value());
    }
}
