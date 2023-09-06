<?php

namespace App\Controller;

use App\Model\DB;
use App\Model\Manager\CommentManager;
use App\Model\Manager\ReviewManager;
use App\Model\Manager\UserManager;
use App\Model\Manager\MoviesManager;
use PDOException;

class ReviewController extends AbstractController
{
    /**
     * Allows you to go to the enterReview page.
     * @return void
     */
    public function enter()
    {
        $this->display('review/enterReview', []);
    }

    /**
     * Allows you to go to the modifieReview page.
     * @return void
     */
    public function modify()
    {
        $modify = new ReviewManager();
        $this->display('review/modifyReview', [
            'modify' => $modify->getAll()
        ]);
    }

    //Allows you to control the data before saving to the review table.
    public function newReview()
    {
        //We check that the data exists.
        if (isset($_POST['title']) && isset($_POST['text']) && isset($_POST['author']) && isset($_POST['date']) && isset($_POST['fk_movies'])) {
            //It is checked that the data does not exceed the maximum size allowed.
            if (strlen($_POST['title']) < 251 && strlen($_POST['author']) < 151) {
                try {
                    //We pass the data into the function created previously and store them in variables.
                    $title = (new UserManager())->sanitize($_POST['title']);
                    $text = (new UserManager())->sanitize($_POST['text']);
                    $author = (new UserManager())->sanitize($_POST['author']);
                    $date = (new UserManager())->sanitize($_POST['date']);
                    $fkMovies = (new UserManager())->sanitize($_POST['fk_movies']);

                    //Allows you to control whether the identifier exists to determine whether to modify values or create new values in the review table.
                    if (isset($_POST['id'])) {
                        //We send the data to the manager.
                        $sql = "UPDATE review SET title = :title, text = :text, author = :author, review_date = :review_date, fk_movies = :fk_movies WHERE id = :id
                                ";
                        $stmt = DB::getInstance()->prepare($sql);

                        $stmt->bindParam(':id', $_POST['id']);
                        $stmt->bindParam(':title', $title);
                        $stmt->bindParam(':text', $text);
                        $stmt->bindParam(':author', $author);
                        $stmt->bindParam(':review_date', $date);
                        $stmt->bindParam(':fk_movies', $fkMovies);

                        $stmt->execute();
                    } else {
                        //We send the data to the manager.
                        $sql = "INSERT INTO review (title, text, author, review_date, fk_movies)
                                VALUES (:title, :text, :author, :review_date, :fk_movies)
                                ";
                        $stmt = DB::getInstance()->prepare($sql);

                        $stmt->bindParam(':title', $title);
                        $stmt->bindParam(':text', $text);
                        $stmt->bindParam(':author', $author);
                        $stmt->bindParam(':review_date', $date);
                        $stmt->bindParam(':fk_movies', $fkMovies);

                        $stmt->execute();
                    }

                    //we make a redirection to the movies page.
                    $movies = new MoviesManager();
                    $this->display('movies/movies', [
                        'movies' => $movies->getAll3()
                    ]);
                } catch (PDOException $exception) {
                    echo "Connection error: " . $exception->getMessage();
                }
            } else {
                echo "Error: One of the values entered exceeds the maximum size allowed";
            }
        } else {
            echo "Error: One of the values entered does not exist";
        }
    }

    //Deletes data from the review table.
    public function deleteReview()
    {
        try {
            //We send the data identifier to delete to the manager.
            $id = $_POST['id'];
            $sql = "DELETE FROM review WHERE id = $id";
            $request = DB::getInstance()->prepare($sql);

            $request->execute();

            //we make a redirect to the review page.
            $characteristic = new MoviesManager();
            $review = new ReviewManager();
            $comment = new CommentManager();
            $this->display('movies/reviewMovies', [
                'characteristic' => $characteristic->getAll(),
                'review' => $review->getAll(),
                'comment' => $comment->getAll()
            ]);
        } catch (PDOException $exception) {
            echo "Connection error: " . $exception->getMessage();
        }
    }
}