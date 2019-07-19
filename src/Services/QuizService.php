<?php


namespace Quiz\Services;


use mysql_xdevapi\Session;
use Quiz\Repositories\AnswersRepository;
use Quiz\Repositories\QuestionsRepository;
use Quiz\repositories\QuizRepository;
use Quiz\Repositories\UserAnswerRepository;

/**
 * Class QuizService
 * @package Quiz\Services
 */
class QuizService
{
    /**
     * @var QuizRepository
     */
    private $quizRepository;
    private $answersRepository;
    private $session;
    private $userService;

    /**
     * QuizService constructor.
     * @param QuizRepository $quizRepository
     */
    private $questionsRepository;

    public function __construct(UserAnswerRepository $userAnswerRepository = null, UserService $userService = null,Session $session = null, QuizRepository $quizRepository = null, AnswersRepository $answersRepository = null, QuestionsRepository $questionsRepository = null)
    {

        $this->quizRepository = $quizRepository ?? new QuizRepository();
        $this->questionsRepository = $questionsRepository ?? new QuestionsRepository();
        $this->answersRepository = $answersRepository ?? new AnswersRepository();
        $this->session = $session ?? \Quiz\Session::getInstance();
        $this->userService = $userService ?? new UserService();
        $this->userAnswerRepository = $userAnswerRepository ?? new UserAnswerRepository();
    }

    /**
     * @return QuizModel[]Collection
     */
    public function getQuizList()
    {
        $quizzes = $this->quizRepository->all();
        return $quizzes;

    }

    public function getQuizQuestion(int $quizId)
    {
        return $this->questionsRepository->all(['quiz_id' => $quizId]);
    }

    public function getQuizQuestions()
    {
        return $this->questionsRepository->all();
    }
    public function createQuiz(string $name)
    {

    }

    public function getQuizData()
    {
        $quizzes = $this->quizRepository->all();
        $quizData = [];
        $questionCount = $this->questionsRepository->all();
        $questionCount = count($questionCount);
        foreach ($quizzes as $quiz) {
            $quizData[] = [
                'id' => $quiz->id,
                'title' => $quiz->title,
                'questionCount' => $questionCount
        ];
        }
        return $quizData;
    }

    public function getNextQuestion()
    {
        $quizId = $this->session->get('quiz_id');
        $questionsAnswered = $this->session->get('questions_answered');
        $question = $this->questionsRepository->getQuestionByOffset($quizId, $questionsAnswered);
        if(!$question) {
            return [];
        }
        $questionData = [
                'id' => $question->id,
                'text' => $question->text,
                'answers' => $this->getAnswerData($question->id),
                ];
        return $questionData;
    }

    public function getAnswerData(int $questionId)
    {
        $question = $this->questionsRepository->one(['id'=>$questionId]);
        if(!$question) {
            throw new \Exception('Question not found');
        }
        $answers = $this->answersRepository->all(['question_id' => $question->id]);

        $answerData = [];

        foreach ($answers as $answer) {
            $answerData[] = [
                'id' => $answer->id,
                'text' => $answer->text,
            ];
        }
        return $answerData;
    }

    public function startQuiz(int $userId, int $quizId)
    {
        $quiz = $this->quizRepository->one(['id' => $quizId]);
        if(!$quiz) {
            throw new \Exception('No quiz found');
        }
        $this->session->set('quiz_id', $quizId);
        $this->session->set('user_id', $userId);
        $this->session->set('questions_answered', 0);
    }

    public function saveUserAnswer(int $questionId, int $answerId)
    {
        $questionsAnswered = $this->session->get('questions_answered');
        $questionsAnswered++;
        $this->session->set('questions_answered', $questionsAnswered);
        $userId = $this->session->get('user_id');
        $quizId = $this->session->get('quiz_id');
        $this->userAnswerRepository->create(['user_id' => $userId, 'question_id' =>$questionId,
                                            'answer_id' => $answerId, 'quiz_id' => $quizId]);

    }

    public function getQuizResult()
    {
        $userId = $this->session->get('user_id');
        $userAnswers = $this->userAnswerRepository->all(['user_id' => $userId]);
        $correctAnswers = 0;
        foreach($userAnswers as $userAnswer) {
            $correctAnswers += $userAnswer->answer->is_correct;
        }
        return [
            'correctAnswers' => $correctAnswers
        ];
    }
}