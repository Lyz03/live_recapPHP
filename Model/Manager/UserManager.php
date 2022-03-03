<?php

namespace App\Model\Manager;

use App\Model\DB;
use App\Model\Entity\User;

class UserManager
{

    private const TABLENAME = 'user';

    /**
     * @return array
     */
    public function getAll(): array {
        $users = [];
        $query = DB::getConnection()->query("SELECT * FROM " . self::TABLENAME);

        if ($query) {
            foreach ($query->fetchAll() as $value) {
                $users[] = (new User())
                    ->setId($value['id'])
                    ->setEmail($value['email'])
                    ->setFirstname($value['firstname'])
                    ->setLastname($value['lastname'])
                    ->setPassword($value['password'])
                    ->setAge($value['age']);
            }
        }

        return $users;
    }

    /**
     * @param int $userId
     * @return User
     */
    public function getUserById(int $userId): User {

        $users = new User;
        $query = DB::getConnection()->query("SELECT * FROM " . self::TABLENAME . "  WHERE id = $userId");

        if ($query) {
            $data = $query->fetch();

             $users
                 ->setId($data['id'])
                 ->setEmail($data['email'])
                 ->setFirstname($data['firstname'])
                 ->setLastname($data['lastname'])
                 ->setPassword($data['password'])
                 ->setAge($data['age'])
             ;
        }
        return $users;
    }
}