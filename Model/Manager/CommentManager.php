<?php

namespace App\Model\Manager;

use App\Model\DB;
use App\Model\Entity\Comment;

class CommentManager
{
    /**
     * Returns all comments in the database.
     * @return array
     */
    public function getAll(): array
    {
        $comments = [];
        $sql = "SELECT * FROM comment";
        $request = DB::getInstance()->query($sql);
        if($request) {
            $data = $request->fetchAll();
            foreach ($data as $commentData) {
                $comments[] = (new Comment())
                    ->setId($commentData['id'])
                    ->setName($commentData['name'])
                    ->setFirstName($commentData['first_name'])
                    ->setText($commentData['text'])
                    ->setCommentDate($commentData['comment_date'])
                    ->setFkMovies($commentData['fk_movies'])
                ;
            }
        }

        return $comments;
    }
}
