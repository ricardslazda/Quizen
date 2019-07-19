<?php


namespace Quiz\Repositories;

use Quiz\Models\QuizModel;

/**
 * Class QuizRepository
 * @package Quiz\Repositories
 */
class QuizRepository extends BaseRepository{
    protected function getModelName(): string
    {
        return QuizModel::class;
    }
    public function getQuizzes()
    {
        $quizzes = $this->all();
        $quizData = [];
        foreach ($quizzes as $quiz) {
            $quizData[] = [
                'text' => $quiz->title,
                'id' => $quiz->id,
            ];
        }
        return $quizData;
    }

    public function getQuiz($quizId)
    {
        $quiz = $this->one(['id' => $quizId]);
        return $quiz;
    }
}
