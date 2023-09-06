<?php

namespace App\Model\Manager;

use App\Model\DB;
use App\Model\Entity\User;

class UserManager
{
    /**
     * Returns all users of the database.
     * @return array
     */
    public function getAll(): array
    {
        $user = [];
        $sql = "SELECT * FROM user";
        $request = DB::getInstance()->query($sql);
        if($request) {
            $data = $request->fetchAll();
            foreach ($data as $userData) {
                $user[] = (new User())
                    ->setId($userData['id'])
                    ->setName($userData['name'])
                    ->setFirstName($userData['first_name'])
                    ->setEmail($userData['email'])
                    ->setIdentify($userData['identify'])
                    ->setPassword($userData['password'])
                    ->setRole($userData['role'])
                    ->setConfirm($userData['confirm'])
                ;
            }
        }

        return $user;
    }

    //We create a sanitize function to clean the data.
    public function sanitize(string $data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        $data = addslashes($data);
        return $data;
    }

    public function validatePassword(string $password):bool {
        $uppercase = preg_match('@[A-Z]@', $password);
        $lowercase = preg_match('@[a-z]@', $password);
        $number = preg_match('@[0-9]@', $password);
        $specialChars = preg_match('@[^\w]@', $password);

        if($uppercase && $lowercase && $number && $specialChars) {
            return true;
        }

        return false;
    }
}

