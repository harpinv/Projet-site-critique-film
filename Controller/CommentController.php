<?php

namespace App\Controller;

use App\Model\DB;
use App\Model\Manager\CommentManager;
use App\Model\Manager\MoviesManager;
use App\Model\Manager\ReviewManager;
use App\Model\Manager\UserManager;
use PDOException;

class CommentController extends AbstractController
{
    //Allows you to control the data before saving to the comment table.
    public function newComment()
    {
        //We check that the data exists.
        if(isset($_POST['first_name']) && isset($_POST['name']) && isset($_POST['text']) && isset($_POST['fk_movies'])) {
            //It is checked that the data does not exceed the maximum size allowed.
            if(strlen($_POST['first_name']) < 101 && strlen($_POST['name']) < 101) {
                try {
                    //We pass the data into the function created previously and store them in variables.
                    $firstName = (new UserManager())->sanitize($_POST['first_name']);
                    $name = (new UserManager())->sanitize($_POST['name']);
                    $text = (new UserManager())->sanitize($_POST['text']);
                    $fkMovies = (new UserManager())->sanitize($_POST['fk_movies']);

                    //We send the data to the manager.
                    $sql = "INSERT INTO comment (name, first_name, text, fk_movies)
                            VALUES (:name, :first_name, :text, :fk_movies)
                           ";
                    $stmt = DB::getInstance()->prepare($sql);
                    $stmt->bindParam(':name', $name);
                    $stmt->bindParam(':first_name', $firstName);
                    $stmt->bindParam(':text', $text);
                    $stmt->bindParam(':fk_movies', $fkMovies);

                    $stmt->execute();

                    //we make a redirection to the movies page.
                    $movies = new MoviesManager();
                    $this->display('movies/movies', [
                        'movies' => $movies->getAll3()
                    ]);
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

    //Deleted data from the comment table.
    public function deleteComment()
    {
        try{
            //We send the data identifier to delete to the manager.
            $id = $_POST['id'];
            $sql = "DELETE FROM comment WHERE id = $id";
            $request = DB::getInstance()->prepare($sql);

            $request->execute();

            //we make a redirection to the review page.
            $characteristic = new MoviesManager();
            $review = new ReviewManager();
            $comment = new CommentManager();
            $this->display('movies/reviewMovies', [
                'characteristic' => $characteristic->getAll(),
                'review' => $review->getAll(),
                'comment' => $comment->getAll()
            ]);
        }
        catch (PDOException $exception) {
            echo "Connection error: " . $exception->getMessage();
        }
    }
}
