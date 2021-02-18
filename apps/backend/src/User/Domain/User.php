<?php

declare(strict_types=1);

namespace PowerNav\User\Domain;

use DateTimeImmutable;
use Symfony\Component\Security\Core\User\UserInterface;

final class User implements UserInterface
{
    private UserId $id;
    private string $email;
    private array $roles;
    private string $password;
    private DateTimeImmutable $createdAt;

    public function __construct(UserId $id, string $email, array $roles, string $password, DateTimeImmutable $createdAt)
    {
        $this->id = $id;
        $this->email = $email;
        $this->roles = $roles;
        $this->password = $password;
        $this->createdAt = $createdAt;
    }


    public function id(): UserId
    {
        return $this->id;
    }

    public function email(): string
    {
        return $this->email;
    }

    public function getUsername(): string
    {
        return $this->email;
    }

    public function getRoles(): array
    {
        $roles = $this->roles;
        $roles[] = 'ROLE_USER';

        return array_unique($roles);
    }

    public function getPassword(): string
    {
        return $this->password;
    }

    public function getSalt()
    {
        // not needed when using the "bcrypt" algorithm in security.yaml
    }

    public function createdAt(): DateTimeImmutable
    {
        return $this->createdAt;
    }

    public function eraseCredentials(): void
    {
        // TODO: Implement eraseCredentials() method.
    }
}
