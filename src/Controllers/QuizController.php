<?php


namespace Quiz\Controllers;


use Quiz\Services\QuizService;
use Quiz\Services\UserService;
use Quiz\Session;

class QuizController extends BaseController
{
    private $quizService;
    private $userService;

    public function __construct()
    {
        $this->quizService = new QuizService();
        $this->userService = new UserService();
    }
    public function start()
    {
        $name = $_POST['name'];
        $quizId = $_POST['quizId'];

        try {
            $user = $this->userService->createUser($name);
            $this->quizService->startQuiz($user->id, $quizId);
        }catch (\Exception $exception) {
            $this->json([
                'error' => $exception->getMessage(),

            ]);
            throw $exception;
        }
        $this->json([
            'success' => true
        ]);
    }

    public function getQuestion()
    {
        $question = $this->quizService->getNextQuestion();
        if(!$question) {
            $result = $this->quizService->getQuizResult();

            $this->json([
                'result' => $result
            ]);
            return;
        }
        $this->json([
            'question' => $question
        ]);
    }
    public function saveAnswer()
    {
        $questionId = $_POST['questionId'];
        $answerId = $_POST['answerId'];
        $this->quizService->saveUserAnswer($questionId, $answerId);
        $this->json([
            'success' => true,
            'answer' => $answerId,
            'question' => $questionId
        ]);
    }
}