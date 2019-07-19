<?php


namespace Quiz\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class BaseModel
 * @package Quiz\Models
 */
abstract class BaseModel extends Model{
    /**
     * @var bool
     */
    public $timestamps = false;
}