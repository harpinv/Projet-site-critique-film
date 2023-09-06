<?php

namespace App\Controller;

abstract class AbstractController
{
    /**
     * Displays views.
     * @param string $view
     * @param array $params
     * @return void
     */

    public function display(string $view, array $params = [])
    {
        ob_start();
        require_once dirname(__FILE__) . "/../View/$view.php";
        $html = ob_get_clean();

        require_once dirname(__FILE__) . '/../View/layout.php';
        exit();
    }


    /**
     * Display any error type.
     * @param int $type
     * @return void
     */

    public function displayError(int $type)
    {
        $this->display("error/$type");
    }
}
