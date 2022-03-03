<?php

namespace App\Model\Manager;

use App\Model\DB;
use App\Model\Entity\User;
use App\Model\Entity\Role;

class UserRoleManager
{

    public const TABLENAME = 'user';
    public const TABLENAME2 = 'user_role';
    public const TABLENAME3 = 'role';

    public function getUserByRoleId(int $roleId): array {

        $users = [];
        $query = DB::getConnection()->query("
            SELECT * FROM " . self::TABLENAME .
            " WHERE id IN (SELECT user_fk FROM " . self::TABLENAME2 . " WHERE role_fk = $roleId)");

        if ($query) {

            $userRoleManager = new UserRoleManager();

            foreach ($query->fetchAll() as $value) {
                $users[] = (new User())
                    ->setId($value['id'])
                    ->setEmail($value['email'])
                    ->setFirstname($value['firstname'])
                    ->setLastname($value['lastname'])
                    ->setPassword($value['password'])
                    ->setAge($value['age'])
                    ->setRole($userRoleManager->getRoleByUserId($value['id']))
                ;
            }
        }

        return $users;
    }

    public function getRoleByUserId(int $userId): array {

        $roles = [];
        $query = DB::getConnection()->query("
            SELECT * FROM " . self::TABLENAME3 .
            " WHERE id IN (SELECT role_fk FROM " . self::TABLENAME2 . " WHERE user_fk = $userId)");

        if ($query) {
            foreach ($query->fetchAll() as $value) {
                $roles[] = (new Role())
                    ->setId($value['id'])
                    ->setRoleName($value['role_name'])
                ;
            }
        }

        return $roles;
    }

}