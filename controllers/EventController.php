<?php

namespace app\controllers;

use app\models\Event;
use app\models\EventSearch;
use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\NotFoundHttpException;

class EventController extends Controller {
    public function behaviors() {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['list', 'edit', 'delete'],
                'rules' => [
                    [
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
        ];
    }

    public function actionList() {
        $searchModel = new EventSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('list', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionEdit($id = null) {
        if ($id) {
            $model = $this->findModel($id);
        } else {
            $model = new Event();
        }

        if ($model->load(Yii::$app->request->post()) && $model->validate()) {

            if ($model->memberIds) {
                foreach ($model->memberIds as $memberIds) {
//                    $model->
                }
            }
            return $this->redirect(['list', 'id' => $model->id]);
        } else {
            return $this->render('edit', [
                'model' => $model,
            ]);
        }
    }

    public function actionDelete($id) {
        $this->findModel($id)->delete();

        return $this->redirect(['list']);
    }

    protected function findModel($id) {
        if (($model = Event::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
