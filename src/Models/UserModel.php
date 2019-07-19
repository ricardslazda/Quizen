<?php


namespace Quiz\Models;


/**
 * Class UserModel
 * @package Quiz\Models
 */
class UserModel extends BaseModel
{
    protected $fillable = ['name'];
    protected $table = "users";
}