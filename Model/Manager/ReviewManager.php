<?php

namespace App\Model\Manager;

use App\Model\DB;
use App\Model\Entity\review;

class ReviewManager
{
    /**
     * Returns all database reviews.
     * @return array
     */
    public function getAll(): array
    {
        $reviews = [];
        $sql = "SELECT * FROM review";
        $request = DB::getInstance()->query($sql);
        if ($request) {
            $data = $request->fetchAll();
            foreach ($data as $reviewData) {
                $reviews[] = (new review())
                    ->setId($reviewData['id'])
                    ->setTitle($reviewData['title'])
                    ->setText($reviewData['text'])
                    ->setAuthor($reviewData['author'])
                    ->setReviewDate($reviewData['review_date'])
                    ->setFkMovies($reviewData['fk_movies'])
                ;
            }
        }

        return $reviews;
    }
}