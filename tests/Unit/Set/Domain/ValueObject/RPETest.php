<?php

declare(strict_types=1);

namespace PowerNav\Tests\Set\Domain\ValueObject;

use PHPUnit\Framework\TestCase;
use PowerNav\Sets\Domain\ValueObject\RPE;

final class RPETest extends TestCase
{
    public function testIsValidatingRPE(): void
    {
        $rpe = RPE::fromFloat(6.55);

        $this->assertSame(6.5, $rpe->value());
    }

    public function testIsRoundingToOneDecimal(): void
    {
        $rpe = RPE::fromFloat(6.55);

        $this->assertSame(6.5, $rpe->value());
    }
}
