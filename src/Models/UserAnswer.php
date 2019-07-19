<?php


namespace Quiz\Models;


class UserAnswer extends BaseModel
{
    protected $guarded = [];

    public function answer()
    {
        return $this->hasOne(AnswerModel::class, 'id', 'answer_id');
    }
}