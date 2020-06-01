<?php

declare(strict_types=1);

namespace PowerNav\Sets\Application;

use PowerNav\Sets\Domain\Set;
use PowerNav\Sets\Domain\SetRepository;
use PowerNav\Sets\Domain\ValueObject\RPE;
use PowerNav\Sets\Domain\ValueObject\SetId;
use PowerNav\Sets\Domain\ValueObject\Weight;
use PowerNav\Sets\Domain\ValueObject\WeightUnit;

final class CreateSet
{
    private SetRepository $setRepository;

    public function __construct(SetRepository $setRepository)
    {
        $this->setRepository = $setRepository;
    }

    public function __invoke(string $id, string $exerciseName, int $repsNumber, float $weightValue, string $weightUnit, float $desiredRpe, ?float $actualRpe, bool $isDone)
    {
        $setId = new SetId($id);
        $weight = new Weight($weightValue, WeightUnit::fromString($weightUnit));
        $setRpe = RPE::fromFloat($desiredRpe);
        $setActualRpe = $actualRpe ? RPE::fromFloat($actualRpe) : null;

        $set = new Set($setId, $exerciseName, $repsNumber, $weight, $setRpe, $setActualRpe, $isDone);

        $this->setRepository->save($set);
    }
}
