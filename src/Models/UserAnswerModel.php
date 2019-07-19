<?php


namespace Quiz\Models;
/**
 * @property int $id
 * @property string $text
 * @property AnswerModel $answer
 * @property
 */
class UserAnswerModel extends BaseModel
{

    protected $fillable = ['quiz_id', 'answer_id', 'user_id', 'question_id'];
    protected $table = "user_answers";

    public function answer()
    {
        return $this->hasOne(AnswerModel::class, 'id', 'answer_id');
    }
}