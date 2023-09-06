<?php

namespace App\Model\Manager;

use App\Model\DB;
use App\Model\Entity\Contact;

class ContactManager
{
    /**
     * Returns all contacts in the database.
     * @return array
     */
    public function getAll(): array
    {
        $contacts = [];
        $sql = "SELECT * FROM contact";
        $request = DB::getInstance()->query($sql);
        if($request) {
            $data = $request->fetchAll();
            foreach ($data as $contactData) {
                $contacts[] = (new Contact())
                    ->setId($contactData['id'])
                    ->setName($contactData['name'])
                    ->setFirstName($contactData['first_name'])
                    ->setEmail($contactData['email'])
                    ->setObject($contactData['object'])
                    ->setText($contactData['text'])
                    ->setContactDate($contactData['contact_date'])
                ;
            }
        }

        return $contacts;
    }
}