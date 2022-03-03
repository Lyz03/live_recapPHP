<?php

namespace App\Model\Manager;

use App\Model\DB;
use App\Model\Entity\User;

class UserManager
{

    public const TABLENAME = 'user';

    /**
     * @return array
     */
    public function getAll(): array {
        $users = [];
        $query = DB::getConnection()->query("SELECT * FROM " . self::TABLENAME);

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

    /**
     * @param int $userId
     * @return User
     */
    public function getUserById(int $userId): ?User {

        $user = null;
        $query = DB::getConnection()->query("SELECT * FROM " . self::TABLENAME . "  WHERE id = $userId");

        if ($query && $data = $query->fetch()) {

            $userRoleManager = new UserRoleManager();

             $user
                 ->setId($data['id'])
                 ->setEmail($data['email'])
                 ->setFirstname($data['firstname'])
                 ->setLastname($data['lastname'])
                 ->setPassword($data['password'])
                 ->setAge($data['age'])
                 ->setRole($userRoleManager->getRoleByUserId($data['id']))
             ;
        }
        return $user;
    }

    /*
    private function createUser(array $data, User $user ): User {
        $users = $user;
        $userRoleManager = new UserRoleManager();

        $users
            ->setId($data['id'])
            ->setEmail($data['email'])
            ->setFirstname($data['firstname'])
            ->setLastname($data['lastname'])
            ->setPassword($data['password'])
            ->setAge($data['age'])
            ->setRole($userRoleManager->getRoleByUserId($data['id']))
        ;

        return $users;
    }
    */
}
