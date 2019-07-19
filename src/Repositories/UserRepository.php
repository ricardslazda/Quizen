<?php


namespace Quiz\Repositories;


use Quiz\Models\BaseModel;
use Quiz\Models\UserModel;

/**
 * Class UserRepository
 * @package Quiz\Repositories
 */
class UserRepository extends BaseRepository
{
    protected function getModelName(): string
    {
       return UserModel::class;
    }

    protected function getUserAnswers()
    {

    }
}