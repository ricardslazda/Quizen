<?php

use Quiz\Controllers\AdminController;
use Quiz\Controllers\ErrorController;
use Quiz\Controllers\IndexController;
use Quiz\Controllers\QuizController;
use Quiz\Route;

return [
    '/error' => new Route(ErrorController::class, 'index'),
    '/' => new Route(IndexController::class, 'home'),
    '/quiz/start' => new Route(QuizController::class, 'start', Route::METHOD_POST),
    '/quiz/get-question' => new Route(QuizController::class, 'getQuestion', Route::METHOD_POST),
    '/quiz/save-answer' => new Route(QuizController::class, 'saveAnswer', Route::METHOD_POST),
    '/admin' => new Route(AdminController::class, 'index'),
    '/admin/answer-log' => new Route(AdminController::class, 'userAnswers'),
    '/admin/answers' => new Route(AdminController::class, 'questionAnswers'),
    '/admin/questions' => new Route(AdminController::class, 'questions'),
    '/admin/quizzes' => new Route(AdminController::class, 'quizzes'),
    '/admin/verify' => new Route(AdminController::class, 'verifyLogin', Route::METHOD_POST),
    '/admin/logout' => new Route(AdminController::class, 'logout'),
    '/admin/delete-question' => new Route(AdminController::class, 'deleteQuestion', Route::METHOD_POST),
    '/admin/delete-answer' => new Route(AdminController::class, 'deleteAnswer', Route::METHOD_POST),
    '/admin/delete-quiz' => new Route(AdminController::class, 'deleteQuiz', Route::METHOD_POST)
];