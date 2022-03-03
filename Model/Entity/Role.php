<?php

namespace App\Model\Entity;

class Role extends AbstractEntity
{

    private string $roleName;
    private array $users;

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