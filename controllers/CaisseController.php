<?php

namespace app\controllers;

use Yii;
use app\models\Caisse;
use app\models\CaisseSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

class CaisseController extends Controller {

    public function behaviors() {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    public function actionList() {
        $searchModel = new CaisseSearch();
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
            $model = new Caisse();
        }

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
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
        if (($model = Caisse::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
