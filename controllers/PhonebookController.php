<?php

namespace app\controllers;

use app\models\Phonebook;
use app\models\search\PhonebookSearch;
use Yii;
use yii\filters\VerbFilter;
use yii\web\Controller;
use yii\web\NotFoundHttpException;

/**
 * PhonebookController implements the CRUD actions for Phonebook model.
 */
class PhonebookController extends Controller
{
	
	/**
	 * {@inheritdoc}
	 */
	public function behaviors()
	{
		return [
			'verbs' => [
				'class' => VerbFilter::className(),
				'actions' => [
					'delete' => ['POST'],
				],
			],
		];
	}
	
	
	/**
	 * Lists all Phonebook models.
	 *
	 * @return mixed
	 */
	public function actionIndex()
	{
		$model = new Phonebook();
		if ($model->load(Yii::$app->request->post()) && $model->save()) {
			$model = new Phonebook();
		}
		$searchModel = new PhonebookSearch();
		$dataProvider = $searchModel->search(Yii::$app->request->queryParams);
		$dataProvider->setSort(['defaultOrder' => ['surname' => SORT_ASC]]);
		
		return $this->render('index', [
			'searchModel' => $searchModel,
			'dataProvider' => $dataProvider,
			'model' => $model,
		]);
	}
	
	
	/**
	 * Displays a single Phonebook model.
	 *
	 * @param integer $id
	 *
	 * @return mixed
	 * @throws NotFoundHttpException if the model cannot be found
	 */
	public function actionView($id)
	{
		return $this->render('view', [
			'model' => $this->findModel($id),
		]);
	}
	
	
	/**
	 * Creates a new Phonebook model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 *
	 * @return mixed
	 */
	public function actionCreate()
	{
		$model = new Phonebook();
		
		if ($model->load(Yii::$app->request->post()) && $model->save()) {
			return $this->redirect(['view', 'id' => $model->id]);
		}
		
		return $this->render('create', [
			'model' => $model,
		]);
	}
	
	
	/**
	 * @param $id
	 *
	 * @return array|string
	 * @throws \yii\web\NotFoundHttpException
	 */
	public function actionUpdate($id)
	{
		if (Yii::$app->request->isAjax) {
			$model = $this->findModel($id);
			
			if ($model->load(Yii::$app->request->post())) {
				Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
				if($model->save()) {
					return ['success' => true,];
				}
				return ['success' => false, 'errorMsg' => $model->errors];
			
			}
			return $this->renderAjax('_form', [
				'model' => $model,
			]);
		}
		
	}
	
	
	/**
	 * Deletes an existing Phonebook model.
	 * If deletion is successful, the browser will be redirected to the 'index' page.
	 *
	 * @param integer $id
	 *
	 * @return mixed
	 * @throws NotFoundHttpException if the model cannot be found
	 */
	public function actionDelete($id)
	{
		$this->findModel($id)->delete();
		
		return $this->redirect(['index']);
	}
	
	
	/**
	 * Finds the Phonebook model based on its primary key value.
	 * If the model is not found, a 404 HTTP exception will be thrown.
	 *
	 * @param integer $id
	 *
	 * @return Phonebook the loaded model
	 * @throws NotFoundHttpException if the model cannot be found
	 */
	protected function findModel($id)
	{
		if (($model = Phonebook::findOne($id)) !== null) {
			return $model;
		}
		
		throw new NotFoundHttpException('The requested page does not exist.');
	}
}
