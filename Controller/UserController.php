<?php

use App\Controller\AbstractController;
use App\Model\Manager\UserManager;

class UserController extends AbstractController
 {

     public function usersList() {


     }

    /**
     * Default
     */
    public function index()
    {
        $userManager = new UserManager();
        $users = $userManager->getAll();

        require __DIR__ . '/../View/user/userList.php';
    }

    public function editUser() {
        echo 'edit';
    }

    public function deleteUser() {
        echo 'delete';
    }
}