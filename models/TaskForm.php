<?php

namespace app\models;

use Yii;
use yii\base\Model;

class TaskForm extends Model
{
    public $name;
    public $endDate;
    public $content;


    public function rules()
    {
        return [
            [['name', 'content', 'endDate'], 'required'],
        ];
    }
}
