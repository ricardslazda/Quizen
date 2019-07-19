<?php


namespace Quiz\Controllers;


use Quiz\Services\QuizService;
use Quiz\Session;

class IndexController extends BaseController
{
    private $quizService;

    public function __construct()
    {
        $this->quizService = new QuizService();
    }

    public function home()
    {
        $name = Session::getInstance()->get('name');
        $quizzes = $this->quizService->getQuizData();

        return $this->view('index', [
            'name' => $name,
            'quizzes' => $quizzes
        ]);
    }
}