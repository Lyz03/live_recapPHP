<?php

namespace App\Model\Entity;

class Role
{

    private ?int $id;
    private string $roleName;
    private array $users;

    /**
     * @return int|null
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @param int|null $id
     * @return Role
     */
    public function setId(?int $id): self
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return string
     */
    public function getRoleName(): string
    {
        return $this->roleName;
    }

    /**
     * @param string $roleName
     * @return Role
     */
    public function setRoleName(string $roleName): self
    {
        $this->roleName = $roleName;
        return $this;
    }

    /**
     * @return array
     */
    public function getUsers(): array
    {
        return $this->users;
    }

    /**
     * @param array $user
     * @return Role
     */
    public function setUsers(array $user): self
    {
        $this->users = $user;
        return $this;
    }



}