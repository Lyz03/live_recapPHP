<?php

use App\Model\Manager\UserManager;

class UserController
 {

     public function usersList() {
         $userManager = new UserManager();
         $users = $userManager->getAll();

         require __DIR__ . '/../View/user/userList.php';

     }

 }