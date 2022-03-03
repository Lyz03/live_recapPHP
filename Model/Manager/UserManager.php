<?php

namespace App\Model\Manager;

use App\Model\DB;
use App\Model\Entity\User;

class UserManager
{

    private const TABLENAME = 'user';

    public function getUserById(int $userId): array {

        $users = [];
        $query = DB::getConnection()->query("SELECT * FROM " . self::TABLENAME . "  WHERE id = $userId");

        if ($query) {
            $users = [];
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