<?php


namespace Quiz\Controllers;


use mysql_xdevapi\Session;
use Quiz\Repositories\AnswersRepository;
use Quiz\Repositories\QuestionsRepository;
use Quiz\Repositories\QuizRepository;
use Quiz\Repositories\UserAnswerRepository;

class AdminController extends BaseController
{
    private $quizRepository;
    private $answerRepository;
    private $userAnswerRepository;
    private $questionRepository;
    private $password;
    private $username;
    private $session;


    public function __construct()
    {
        $this->username = ADMIN_USERNAME;
        $this->password = ADMIN_PASSWORD;

        $this->template = 'admin';
        $this->quizRepository = new QuizRepository();
        $this->answerRepository = new AnswersRepository();
        $this->userAnswerRepository = new UserAnswerRepository();
        $this->questionRepository = new QuestionsRepository();
        $this->session = \Quiz\Session::getInstance();
    }
        public function index()
        {
            $this->view('admin-main');
        }
    public function userAnswers()
    {
        if ($this->session->get('loggedIn') == true) {
            $userAnswerData = $this->userAnswerRepository->getUserAnswers();
            $this->view('admin-user-answers', ['userAnswers' => $userAnswerData], true);
        }else {
            redirect('/admin');
        }
    }

    public function questionAnswers()
    {
        if ($this->session->get('loggedIn') == true) {
            $answerData = $this->answerRepository->getAnswers();
            $this->view('admin-question-answers', ['questionAnswers' => $answerData], true);
        } else {
            redirect('/admin');
        }
    }

    public function questions()
    {
        if ($this->session->get('loggedIn') == true) {
            $questionData = $this->questionRepository->getQuestions();
            $this->view('admin-questions', ['questions' => $questionData], true);
        }else {
            redirect('/admin');
        }
    }


    public function quizzes()
    {
        if ($this->session->get('loggedIn') == true) {
                $quizData = $this->quizRepository->getQuizzes();
                $this->view('admin-quizzes', ['quizzes' => $quizData], true);
        }else {
            redirect('/admin');
        }
    }

    public function verifyLogin() : bool{
        $post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
        if(isset($post['username']) && isset($post['password'])) {
            $inputUsername = $post['username'];
            $inputPassword = $post['password'];
            $this->session->set('username', $inputUsername);
            $this->session->set('password', $inputPassword);
        }

        $this->session->set('loggedIn', false);

        if($inputPassword == $this->password && $inputUsername == $this->username) {
            $this->session->set('loggedIn', true);
            redirect('/admin');
            return true;
        }
        redirect('/admin');
        return false;
    }

    public function logout()
    {
        $this->session->unset("loggedIn");
        $this->session->unset("username");
        $this->session->unset("password");
        redirect("/admin");
    }

    public function deleteQuestion()
    {
        if(isset($_POST['id'])) {
            $questionId = $_POST['id'];
            $question = $this->questionRepository->getQuestion($questionId);
            $question->delete();
            redirect("/admin/questions");
        }
    }

    public function deleteQuiz()
    {
        if(isset($_POST['id'])) {
            $quizId = $_POST['id'];
            $quiz = $this->quizRepository->getQuiz($quizId);
            $quiz->delete();
            redirect("/admin/quizzes");
        }
    }

    public function deleteAnswer()
    {
        if(isset($_POST['id'])) {
            $answerId = $_POST['id'];
            $answer = $this->answerRepository->getAnswer($answerId);
            $answer->delete();
            redirect("/admin/answers
            ");
        }
    }
}