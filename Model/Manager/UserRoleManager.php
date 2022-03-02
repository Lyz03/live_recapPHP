<?php

namespace App\Model\Manager;

use App\Model\DB;
use App\Model\Entity\User;
use App\Model\Entity\Role;

class UserRoleManager
{

    public function getUserByRoleId(int $roleId): array {

        $users = [];
        $query = DB::getConnection()->query("
            SELECT * FROM user WHERE id IN (SELECT user_fk FROM user_role WHERE role_fk = $roleId)");

        if ($query) {
            foreach ($query->fetchAll() as $value) {
                $users[] = (new User())
                    ->setId($value['id'])
                    ->setEmail($value['email'])
                    ->setFirstname($value['firstname'])
                    ->setLastname($value['lastname'])
                    ->setPassword($value['password'])
                    ->setAge($value['age'])
                ;
            }
        }

        return $users;
    }

}