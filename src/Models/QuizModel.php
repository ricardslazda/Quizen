<?php


namespace Quiz\Models;


/**
 * Class QuizModel
 * @package Quiz\Models
 */
class QuizModel extends BaseModel
{
    /**
     * @property QuestionModel $questions[]
     */
    protected $table = "quizzes";
    protected $fillable = ['title'];

    public function questions()
    {
        return $this->hasMany(QuestionModel::class, 'quiz_id', 'id');
    }
}