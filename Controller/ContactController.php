<?php

namespace App\Controller;

use App\Model\DB;
use App\Model\Manager\ContactManager;
use App\Model\Manager\UserManager;
use PDOException;

class ContactController extends AbstractController
{
    /**
     * Allows you to go to the contactReceived page.
     * @return void
     */
    public function contactReceived()
    {
        $contact = new ContactManager();
        $this->display('contact/contactReceived', [
            'contacts' => $contact->getAll()
        ]);
    }

    /**
     * Allows you to go to the contact page.
     * @return void
     */
    public function contact()
    {
        $this->display('contact/contact', []);
    }

    //Allows you to control the data before saving to the contact table.
    public function newContact()
    {
        //We check that the data exists.
        if(isset($_POST['name']) && isset($_POST['firstName']) && isset($_POST['email']) && isset($_POST['object']) && isset($_POST['text'])) {
            //It is checked that the data does not exceed the maximum size allowed.
            if(strlen($_POST['name']) < 101 && strlen($_POST['firstName']) < 101 && strlen($_POST['email']) < 151 && strlen($_POST['object']) < 501) {
                try {
                    //We pass the data into the function created previously and store them in variables.
                    $name = (new UserManager())->sanitize($_POST['name']);
                    $firstName = (new UserManager())->sanitize($_POST['firstName']);
                    $email = (new UserManager())->sanitize($_POST['email']);
                    $object = (new UserManager())->sanitize($_POST['object']);
                    $text = (new UserManager())->sanitize($_POST['text']);

                    //Saves a contact to the database.
                    $sql = "INSERT INTO contact (name, first_name, email, object, text)
                            VALUES (:name, :first_name, :email, :object, :text)
                             ";
                    $stmt = DB::getInstance()->prepare($sql);
                    $stmt->bindParam(':name', $name);
                    $stmt->bindParam(':first_name', $firstName);
                    $stmt->bindParam(':email', $email);
                    $stmt->bindParam(':object', $object);
                    $stmt->bindParam(':text', $text);

                    $stmt->execute();

                    //We send the data to the manager and we make a redirection to the contactConfirmation page.
                    $this->display('contact/contactConfirmation', []);
                }
                catch (PDOException $exception) {
                    echo "Connection error: " . $exception->getMessage();
                }
            } else {
                echo "Error: One of the values entered exceeds the maximum size allowed";
            }
        } else {
            echo "Error: One of the values entered does not exist";
        }
    }

    //Deleted data from the contact table.
    public function deleteContact()
    {
        try{
            //We send the data identifier to delete to the manager.
            $id = $_POST['id'];
            $sql = "DELETE FROM contact WHERE id = $id";
            $request = DB::getInstance()->prepare($sql);

            $request->execute();

            //We make a redirect to the contactReceived page.
            $delete = new ContactManager();
            $this->display('contact/contactReceived', [
                'contactReceived' => $delete->getAll()
            ]);
        }
        catch (PDOException $exception) {
            echo "Connection error: " . $exception->getMessage();
        }
    }
}
