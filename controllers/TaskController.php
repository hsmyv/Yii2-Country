<?php

namespace app\controllers;

use app\models\Task;
use app\models\TaskForm;
use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;


class TaskController extends Controller
{
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['create', 'update'],
                'rules' => [
                    [
                        'allow' => true,
                        'roles' => ['@']
                    ],
                ],
            ],
        ];
    }
    public function actionGetTasks()
    {
        $tasks = Task::find()->all();

        return $this->render('index', ['tasks' => $tasks]);
    }

    public function actionCreateTask()
    {
        $model = new TaskForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            $task = new Task();

            $name = $model['name'];
            $content = $model['content'];
            $endDate = $model['endDate'];

            $task->name = $name;
            $task->content = $content;
            $task->endDate = $endDate;

            $task->save();
            return $this->redirect('get-tasks');
        } else {
            return $this->render('edit', ['model' => $model]);
        }
    }
    public function actionEditTask($id)
    {
        $model = new TaskForm();
        $task = Task::findOne($id);

        //1. submit the form 
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {

            $name = $model['name'];
            $content = $model['content'];
            $endDate = $model['endDate'];

            $task->name = $name;
            $task->content = $content;
            $task->endDate = $endDate;

            $task->save();

            return $this->render('task-confirm');
        } else {
            return $this->render('edit', ['model' => $model, 'task' => $task]);
        }
    }

    public function actionDeleteTask($id)
    {
        $country = Task::findOne($id);


        $country->delete();

        return $this->redirect('get-tasks');
    }
}
