<?php

namespace App\Model\Manager;

use App\Model\DB;
use App\Model\Entity\Role;

class RoleManager
{
    private UserRoleManager $userRoleManager;

    public function __construct() {
        $this->userRoleManager = new UserRoleManager();
    }

    public function getAll(): array {
        $roles = [];
        $query = DB::getConnection()->query("SELECT * FROM role");

        if ($query) {
            foreach ($query->fetchAll() as $value) {
                $roles[] = (new Role())
                    ->setId($value['id'])
                    ->setRoleName($value['role_name'])
                    ->setUsers($this->userRoleManager->getUserByRoleId($value['id']));
            }
        }

        return $roles;
    }

}