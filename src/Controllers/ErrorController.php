<?php


namespace Quiz\Controllers;


class ErrorController extends BaseController
{
    public function error()
    {
        $this->view('error', [], true);
    }
}