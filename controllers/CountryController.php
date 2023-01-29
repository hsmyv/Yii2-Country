<?php 
namespace app\controllers;

use Yii;
use yii\web\Controller;
use yii\web\Response;
use app\models\Country;
use app\models\CountryForm;

class CountryController extends Controller{
    public function actionGetCountries(){
        $countries = Country::find()->all();

        return $this->render('index', ['countries' => $countries]);
    }

    public function actionEditCountry($id){
        $model = new CountryForm();
        $country = Country::findOne($id);

        //1. submit the form 
        if($model->load(Yii::$app->request->post()) && $model->validate()){

            $name = $model['name'];
            $code = $model['code'];
            $population = $model['population'];

            $country->name = $name;
            $country->code = $code;
            $country->population = $population;

            $country->save();

            return $this->render('country-confirm');
        }else{
            return $this->render('edit', ['model' => $model, 'country' => $country]);
        }
    }


    public function actionCreateCountry(){
        $model = new CountryForm();

        if($model->load(Yii::$app->request->post()) && $model->validate()){

            $country = new Country();

            $name = $model['name'];
            $code = $model['code'];
            $population = $model['population'];
            
            $country->name = $name;
            $country->code = $code;
            $country->population = $population;

            $country->save();
            
            return $this->redirect('get-countries');

        }else{
            return $this->render('edit', ['model' => $model]);
        }
    }

    public function actionDeleteCountry($id){
        $country = Country::findOne($id);

       
        $country->delete();

        return $this->redirect('get-countries');
    }
}

