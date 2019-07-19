<?php


namespace Quiz\Repositories;



use Quiz\Models\QuestionModel;

class QuestionsRepository extends BaseRepository{
    protected function getModelName() : string
{
    return QuestionModel::class;
}

    public function getQuestionByOffset(int $quizId, int $offset = 0)
    {
        return QuestionModel::query()->where(['quiz_id' => $quizId])->offset($offset)->first();
}

    public function getQuestions()
    {
        $questions = $this->all();
        $questionData = [];
        foreach ($questions as $question) {
            $questionData[] = [
                'text' => $question->text,
                'quizId' => $question->quiz_id,
                'id' => $question->id,
            ];
        }
        return $questionData;
}

    public function getQuestion(int $questionId)
    {
       $question = $this->one(['id' => $questionId]);
       return $question;
    }
}