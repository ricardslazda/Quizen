<?php


namespace Quiz\Repositories;


use Quiz\Models\AnswerModel;

class AnswersRepository extends BaseRepository
{
    protected function getModelName(): string
    {
        return AnswerModel::class;
    }

    public function getAnswers()
    {
        $answers = $this->all();
        $answerData = [];
        foreach ($answers as $answer) {
            $answerData[] = [
                'text' => $answer->text,
                'questionId' => $answer->question_id,
                'isCorrect' => $answer->is_correct,
                'id' => $answer->id,
            ];
        }
        return $answerData;
    }
    public function getAnswer($answerId)
    {
        $answer = $this->one(['id' => $answerId]);
        return $answer;
    }
}