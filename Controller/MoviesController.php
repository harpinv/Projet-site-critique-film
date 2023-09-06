<?php

namespace App\Controller;

use App\Model\DB;
use App\Model\Manager\CommentManager;
use App\Model\Manager\MoviesManager;
use App\Model\Manager\ReviewManager;
use App\Model\Manager\UserManager;
use PDOException;

class MoviesController extends AbstractController
{
    /**
     * Allows you to go to the movies page.
     * @return void
     */
    public function movies()
    {
        $movies = new MoviesManager();
        $this->display('movies/movies', [
            'movies' => $movies->getAll3()
        ]);
    }

    /**
     * Allows you to go to the movies page.
     * @return void
     */
    public function research()
    {
        $movies = new MoviesManager();
        $this->display('movies/research', [
            'movies' => $movies->getAll3()
        ]);
    }

    /**
     * Allows you to go to the characteristic page.
     * @return void
     */
    public function characteristic()
    {
        $characteristic = new MoviesManager();
        $review = new ReviewManager();
        $comment = new CommentManager();
        $this->display('movies/reviewMovies', [
            'characteristic' => $characteristic->getAll(),
            'review' => $review->getAll(),
            'comment' => $comment->getAll()
        ]);
    }

    /**
     * Allows you to go to the enterMovies page.
     * @return void
     */
    public function enter()
    {
        $this->display('movies/enterMovies', []);
    }

    /**
     * Allows you to go to the modifyMovies page.
     * @return void
     */
    public function modify()
    {
        $modify = new MoviesManager();
        $this->display('movies/modifyMovies', [
            'modify' => $modify->getAll()
        ]);
    }

    //Allows you to control the data before saving to the movies table.
    public function newMovies()
    {
        //We check that the data exists.
        if(isset($_POST['title']) && isset($_POST['releaseYear']) && isset($_POST['country']) && isset($_POST['director']) && isset($_POST['writer']) && isset($_POST['actor']) && isset($_POST['genre']) && isset($_POST['poster']) && isset($_POST['oscar']) && isset($_POST['golden']) && isset($_POST['greatest']) && isset($_POST['afiLists']) && isset($_POST['rating'])) {
            //It is checked that the data does not exceed the maximum size allowed.
            if(strlen($_POST['title']) < 251 && strlen($_POST['country']) < 251 && strlen($_POST['director']) < 501 && strlen($_POST['writer']) < 501 && strlen($_POST['actor']) < 1001 && strlen($_POST['poster']) < 251) {
                try {
                    //We pass the data into the function created previously and store them in variables.
                    $title = (new UserManager())->sanitize($_POST['title']);
                    $releaseYear = (new UserManager())->sanitize($_POST['releaseYear']);
                    $country = (new UserManager())->sanitize($_POST['country']);
                    $director = (new UserManager())->sanitize($_POST['director']);
                    $writer = (new UserManager())->sanitize($_POST['writer']);
                    $actor = (new UserManager())->sanitize($_POST['actor']);
                    $genre = (new UserManager())->sanitize($_POST['genre']);
                    $poster = (new UserManager())->sanitize($_POST['poster']);
                    $oscar = (new UserManager())->sanitize($_POST['oscar']);
                    $golden = (new UserManager())->sanitize($_POST['golden']);
                    $greatest = (new UserManager())->sanitize($_POST['greatest']);
                    $afiLists = (new UserManager())->sanitize($_POST['afiLists']);
                    $rating = (new UserManager())->sanitize($_POST['rating']);

                    //Allows you to control whether the identifier exists to determine whether to modify values or create new values in the movies table.
                    if(isset($_POST['id'])) {
                        //We send the data to the manager.
                        $sql = "UPDATE movies SET title = :title, release_year = :release_year, country = :country, director = :director, writer = :writer, actor = :actor, genre = :genre, poster = :poster, oscar_winners = :oscar_winners, golden_palm_winners = :golden_palm_winners, greatest_movies = :greatest_movies, afi_lists = :afi_lists, rating = :rating WHERE id = :id
                                ";
                        $stmt = DB::getInstance()->prepare($sql);

                        $stmt->bindParam(':id', $_POST['id']);
                        $stmt->bindParam(':title', $title);
                        $stmt->bindParam(':release_year', $releaseYear);
                        $stmt->bindParam(':country', $country);
                        $stmt->bindParam(':director', $director);
                        $stmt->bindParam(':writer', $writer);
                        $stmt->bindParam(':actor', $actor);
                        $stmt->bindParam(':genre', $genre);
                        $stmt->bindParam(':poster', $poster);
                        $stmt->bindParam(':oscar_winners', $oscar);
                        $stmt->bindParam(':golden_palm_winners', $golden);
                        $stmt->bindParam(':greatest_movies', $greatest);
                        $stmt->bindParam(':afi_lists', $afiLists);
                        $stmt->bindParam(':rating', $rating);

                        $stmt->execute();
                    } else {
                        //We send the data to the manager.
                        $sql = "INSERT INTO movies (title, release_year, country, director, writer, actor, genre, poster, oscar_winners, golden_palm_winners, greatest_movies, afi_lists, rating)
                                VALUES (:title, :release_year, :country, :director, :writer, :actor, :genre, :poster, :oscar_winners, :golden_palm_winners, :greatest_movies, :afi_lists, :rating)
                                ";
                        $stmt = DB::getInstance()->prepare($sql);

                        $stmt->bindParam(':title', $title);
                        $stmt->bindParam(':release_year', $releaseYear);
                        $stmt->bindParam(':country', $country);
                        $stmt->bindParam(':director', $director);
                        $stmt->bindParam(':writer', $writer);
                        $stmt->bindParam(':actor', $actor);
                        $stmt->bindParam(':genre', $genre);
                        $stmt->bindParam(':poster', $poster);
                        $stmt->bindParam(':oscar_winners', $oscar);
                        $stmt->bindParam(':golden_palm_winners', $golden);
                        $stmt->bindParam(':greatest_movies', $greatest);
                        $stmt->bindParam(':afi_lists', $afiLists);
                        $stmt->bindParam(':rating', $rating);

                        $stmt->execute();
                    }

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

    //Deletes data from the item table.
    public function deleteMovies()
    {
        try{
            //We send the data identifier to delete to the manager.
            $id = $_POST['id'];
            $sql = "DELETE FROM movies WHERE id = $id";
            $request = DB::getInstance()->prepare($sql);

            $request->execute();

            //we make a redirect to the movies page.
            $delete = new MoviesManager();
            $this->display('movies/movies', [
                'movies' => $delete->getAll3()
            ]);
        }
        catch (PDOException $exception) {
            echo "Connection error: " . $exception->getMessage();
        }
    }
}
