<?php


namespace Quiz\Repositories;


use Quiz\Models\UserAnswerModel;

class UserAnswerRepository extends BaseRepository
{
    protected function getModelName(): string
    {
        return UserAnswerModel::class;
    }

    public function getUserAnswers()
    {
            $userAnswers = $this->all();
            $userAnswerData = [];
            foreach ($userAnswers as $userAnswer) {
                $userAnswerData[] = [
                    'text' => $userAnswer->text,
                    'userId' => $userAnswer->user_id,
                    'questionId' => $userAnswer->question_id,
                    'answerId' => $userAnswer->answer_id,
                    'quizId' => $userAnswer->quiz_id,
                ];
            }
            return $userAnswerData;
    }
}