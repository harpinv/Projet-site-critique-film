<?php

namespace App\Model\Manager;

use App\Model\DB;
use App\Model\Entity\movies;

class MoviesManager
{
    /**
     * Returns all movies in the database.
     * @return array
     */
    public function getAll(): array
    {
        $movies = [];
        $sql = "SELECT * FROM movies";
        $request = DB::getInstance()->query($sql);
        if($request) {
            $data = $request->fetchAll();
            foreach ($data as $movieData) {
                $movies[] = (new movies())
                    ->setId($movieData['id'])
                    ->setTitle($movieData['title'])
                    ->setReleaseYear($movieData['release_year'])
                    ->setCountry($movieData['country'])
                    ->setDirector($movieData['director'])
                    ->setWriter($movieData['writer'])
                    ->setActor($movieData['actor'])
                    ->setGenre($movieData['genre'])
                    ->setPoster($movieData['poster'])
                    ->setOscarWinners($movieData['oscar_winners'])
                    ->setGoldenPalmWinners($movieData['golden_palm_winners'])
                    ->setGreatestMovies($movieData['greatest_movies'])
                    ->setAfiLists($movieData['afi_lists'])
                    ->setRating($movieData['rating'])
                ;
            }
        }

        return $movies;

    }

    /**
     * Return the last five movies in the database.
     * @return array
     */
    public function getAll2(): array
    {
        $movies = [];
        $sql = "SELECT * FROM movies ORDER BY id DESC LIMIT 5";
        $request = DB::getInstance()->query($sql);
        if($request) {
            $data = $request->fetchAll();
            foreach ($data as $movieData) {
                $movies[] = (new movies())
                    ->setId($movieData['id'])
                    ->setTitle($movieData['title'])
                ;
            }
        }

        return $movies;

    }

    /**
     * Returns all movies in the database, starting at the end.
     * @return array
     */
    public function getAll3(): array
    {
        $movies = [];
        $sql = "SELECT * FROM movies ORDER BY title ASC";
        $request = DB::getInstance()->query($sql);
        if($request) {
            $data = $request->fetchAll();
            foreach ($data as $movieData) {
                $movies[] = (new movies())
                    ->setId($movieData['id'])
                    ->setTitle($movieData['title'])
                ;
            }
        }

        return $movies;

    }
}