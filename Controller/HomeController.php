<?php

namespace App\Controller;


use App\Model\Manager\MoviesManager;

class HomeController extends AbstractController
{
    /**
     * Allows you to go to the home page.
     * @return void
     */
    public function index(): void
    {
        $manager = new MoviesManager();
        $this->display('home/index', [
        'title' => $manager->getAll2()
    ]);
    }
}
