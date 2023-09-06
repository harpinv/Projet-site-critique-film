<?php

namespace App\Controller;

use App\Model\DB;
use App\Model\Manager\MoviesManager;
use App\Model\Manager\UserManager;
use PDOException;

class UserController extends AbstractController
{
    /**
     * Allows you to go to the movies page.
     * @return void
     */
    public function users()
    {
        $users = new UserManager();
        $this->display('compte/listUser', [
            'users' => $users->getAll()
        ]);
    }

    /**
     * Allows you to go to the identification page.
     * @return void
     */
    public function identification()
    {
        $this->display('login/identification', []);
    }

    /**
     * Allows you to go to the enterUser page.
     * @return void
     */
    public function enter()
    {
        $this->display('login/enterUser', []);
    }

    /**
     * Allows you to control and compare the information of the form with that of the database.
     * @return void
     */
    public function control()
    {
        $sql = "SELECT * FROM user WHERE identify = :identify";
        $request = DB::getInstance()->prepare($sql);

        $password = $_POST['password'];
        $user = $_POST['identify'];

        $request->bindParam(':identify', $user);

        if ($password && $user){
            if ($request->execute()){
                $data = $request->fetch();
                if (password_verify($password, $data["password"])) {
                    if($data["confirm"] == 1) {
                        //We create a one-day session that takes as a variable the identifier, the password, the name and the firstname.
                        $timeOfSession = time() + (60 * 60 * 24);

                        setcookie(session_name(), session_id(), $timeOfSession);

                        $_SESSION['name'] = $data['name'];
                        $_SESSION['firstName'] = $data['first_name'];
                        $_SESSION['role'] = $data['role'];

                        //We make a relocation to the home page.
                        header ('location: /home');
                    } else {
                        //In case of incorrect username or passwords, we make a relocation to an error page.
                        header ('location: /error');
                    }
                } else {
                    //In case of incorrect username or passwords, we make a relocation to an error page.
                    header ('location: /error');
                }
            } else {
                //In case of incorrect username or passwords, we make a relocation to an error page.
                header ('location: /error');
            }
        } else {
            //In case of incorrect username or passwords, we make a relocation to an error page.
            header ('location: /error');
        }
    }

    public function validate()
    {
        $sql = "UPDATE user SET confirm = :confirm WHERE email = :email";
        $request = DB::getInstance()->prepare($sql);

        $email = $_POST['email'];
        $confirm = 1;

        $request->bindParam(':email', $email);
        $request->bindParam(':confirm', $confirm);

        $request->execute();

        $this->display('login/validate', []);
    }

    //Allows you to control the data before saving to the contact table.
    public function newUser()
    {
        //We check that the data exists.
        if(isset($_POST['name']) && isset($_POST['firstName']) && isset($_POST['email']) && isset($_POST['identify']) && isset($_POST['password']) && isset($_POST['password-repeat']) && isset($_POST['role']) && isset($_POST['confirm'])) {
            //It is checked that the data does not exceed the maximum size allowed.
            if(strlen($_POST['name']) < 101 && strlen($_POST['firstName']) < 101 && strlen($_POST['email']) < 101 && strlen($_POST['identify']) < 101 && strlen($_POST['password']) > 5 && strlen($_POST['password']) < 61) {
                //We check the format of the email address and password and we check that the two passwords match.
                if(filter_var($_POST['email'], FILTER_VALIDATE_EMAIL) && $_POST['password'] == $_POST['password-repeat'] && (new UserManager())->validatePassword($_POST['password'])) {
                    try {
                        //We pass the data into the function created previously and store them in variables.
                        $name = (new UserManager())->sanitize($_POST['name']);
                        $firstName = (new UserManager())->sanitize($_POST['firstName']);
                        $email = (new UserManager())->sanitize($_POST['email']);
                        $identify = (new UserManager())->sanitize($_POST['identify']);
                        $password = (new UserManager())->sanitize($_POST['password']);
                        $hash = password_hash($password, PASSWORD_BCRYPT);
                        $role = (new UserManager())->sanitize($_POST['role']);
                        $confirm = (new UserManager())->sanitize($_POST['confirm']);

                        //We send the data to the manager and we make a redirection to the contactConfirmation page.
                        $sql = "INSERT INTO user (name, first_name, email, identify, password, role, confirm)
                                VALUES (:name, :first_name, :email, :identify, :password, :role, :confirm)
                                ";
                        $stmt = DB::getInstance()->prepare($sql);
                        $stmt->bindParam(':name', $name);
                        $stmt->bindParam(':first_name', $firstName);
                        $stmt->bindParam(':email', $email);
                        $stmt->bindParam(':identify', $identify);
                        $stmt->bindParam(':password', $hash);
                        $stmt->bindParam(':role', $role);
                        $stmt->bindParam(':confirm', $confirm);

                        $stmt->execute();

                        $to = $_POST['email'];
                        $subject = "Confirmation of registration";
                        $message = '<p>Your information has been recorded, click on the link to confirm your registration</p>
                                    <form method="post" action="http://localhost:63342/Projet-site-critique-film/View/login/confirmation.php?_ijt=iri0pii32jd0ua623rjekt96bl&_ij_reload=RELOAD_ON_SAVE">
                                        <input style="display: none" type="text" name="email" value="' . $_POST['email'] . '">
                                        <input type="submit" name="submit" value="confirm">
                                    </form>
                                    <p>The team of the site "Life Great Watcher"</p>';
                        $message = wordwrap($message, 70, "\r\n");
                        mail($to, $subject, $message);

                        $this->display('login/userConfirmation', []);

                    }
                    catch (PDOException $exception) {
                        echo "Connection error: " . $exception->getMessage();
                    }
                } else {
                    echo "Error: The email address is in the wrong format or the passwords do not match, or the password does not have the right format.";
                }
            } else {
                echo "Error: One of the values entered exceeds the maximum size allowed";
            }
        } else {
            echo "Error: One of the values entered does not exist";
        }
    }

    /**
    * Goes to the error page.
    * @return void
    */
    public function error()
    {
        $this->display('login/errorIdentification', []);
    }

    /**
     * Allows you to destroy a session.
     * @return void
     */
    public function session()
    {
        //An open session is destroyed using three functions
        session_unset ();

        session_destroy ();

        $session = new MoviesManager();
        $this->display('home/index', [
            'title' => $session->getAll()
        ]);
    }

    /**
     * Allows you to go to the biography page.
     * @return void
     */
    public function biography()
    {
        $this->display('biography/biography', []);
    }
}