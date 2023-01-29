<?php 

namespace app\models;

use Yii;
use yii\base\Model;

class CountryForm extends Model{

    public $name;
    public $code;
    public $population;


    public function rules(){
        return [
            [['name','code','population'], 'required'],
            ['population','number']
        ];
    }
}