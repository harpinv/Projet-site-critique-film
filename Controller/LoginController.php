<?php

namespace App\Controller;

class LoginController extends AbstractController
{
    //Allows certain items to appear when a session is opened.
    public function logout($element)
    {
        if (isset($_SESSION["name"]) && isset($_SESSION["firstName"]) && isset($_SESSION["role"])) {
            if ($_SESSION['role'] == 'Administrator') {
                echo $element;
            }
        }
    }

    //Allows you to disconnect in the menu when a session is open and login when it is not.
    public function connect($connect, $disconnect)
    {
        if (isset($_SESSION["name"]) && isset($_SESSION["firstName"]) && isset($_SESSION["role"])) {
            if ($_SESSION['role'] == 'Administrator') {
                echo $disconnect;
            } else {
                echo $connect;
            }
        } else {
            echo $connect;
        }
    }


    //Allows you to disconnect in the menu when a session is open and login when it is not.
    public function disconnect($connect, $disconnect)
    {
        if (isset($_SESSION["name"]) && isset($_SESSION["firstName"]) && isset($_SESSION["role"])) {
            echo $disconnect;
        } else {
            echo $connect;
        }
    }
}
