<?php

declare(strict_types=1);

namespace PowerNav\Sets\Domain;

use PowerNav\Sets\Domain\ValueObject\SetId;

interface SetRepository
{
    public function searchById(SetId $id): ?Set;

    public function save(Set $set): void;
}
