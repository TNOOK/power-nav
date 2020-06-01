<?php

declare(strict_types=1);

namespace PowerNav\Sets\Domain;

use PowerNav\Sets\Domain\ValueObject\SetId;
use PowerNav\Sets\Domain\ValueObject\RPE;
use PowerNav\Sets\Domain\ValueObject\Weight;

final class Set
{
    private SetId $id;
    private string $exerciseName;
    private Weight $weight;
    private RPE $rpe;
    private int $repsNumber;
    private ?RPE $actualRpe;
    private bool $isDone;

    public function __construct(SetId $id, string $exerciseName, int $repsNumber, Weight $weight, RPE $desiredRpe, ?RPE $actualRpe, bool $isDone)
    {
        $this->id = $id;
        $this->exerciseName = $exerciseName;
        $this->repsNumber = $repsNumber;
        $this->weight = $weight;
        $this->rpe = $desiredRpe;
        $this->actualRpe = $actualRpe;
        $this->isDone = $isDone;
    }

    /**
     * @return SetId
     */
    public function id(): SetId
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function exerciseName(): string
    {
        return $this->exerciseName;
    }

    /**
     * @return Weight
     */
    public function weight(): Weight
    {
        return $this->weight;
    }

    /**
     * @return RPE
     */
    public function rpe(): RPE
    {
        return $this->rpe;
    }

    /**
     * @return int
     */
    public function repsNumber(): int
    {
        return $this->repsNumber;
    }

    /**
     * @return RPE|null
     */
    public function actualRpe(): ?RPE
    {
        return $this->actualRpe;
    }

    public function isDone(): bool
    {
        return $this->isDone;
    }
}
