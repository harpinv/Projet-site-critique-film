<?php

namespace App\Controller;

class RootController extends AbstractController
{
    /**
     * Render the home page.
     * @return void
     */
    public function index()
    {
        $this->display('home/index.php');
    }
}
