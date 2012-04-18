<?php

class EssayMarkedController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/teacher';

	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
		);
	}

	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules()
	{
		return array(
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('index','view','list','getessay','mark'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update'),
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete'),
				'users'=>array('admin'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}
	
	private function getUser(){
		return Yii::app()->user->getState('userinfo');
	}

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{
		$this->render('view',array(
			'model'=>$this->loadModel($id),
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new EssayMarked;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['EssayMarked']))
		{
			$model->attributes=$_POST['EssayMarked'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->m_id));
		}

		$this->render('create',array(
			'model'=>$model,
		));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['EssayMarked']))
		{
			$model->attributes=$_POST['EssayMarked'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->m_id));
		}

		$this->render('update',array(
			'model'=>$model,
		));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		if(Yii::app()->request->isPostRequest)
		{
			// we only allow deletion via POST request
			$this->loadModel($id)->delete();

			// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
			if(!isset($_GET['ajax']))
				$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
		}
		else
			throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('EssayMarked');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new EssayMarked('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['EssayMarked']))
			$model->attributes=$_GET['EssayMarked'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer the ID of the model to be loaded
	 */
	public function loadModel($id)
	{
		$model=EssayMarked::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param CModel the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='essay-marked-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
	
	public function actionList(){
		$type = isset($_GET['type'])?$_GET['type']:"all";
		$this->render('list',array('type'=>$type));
	}

	public function actionGetEssay(){
		$page = $_POST['page']; 
		$limit = $_POST['rows']; 
		$sidx = $_POST['sidx']==""?"submittime":$_POST['sidx']; 
		$sord = $_POST['sord']; 
		$type = isset($_POST['type'])?$_POST['type']:"all";
		
		$userinfo = $this->getUser();
		
		switch($type){
			case "all":
				$count = Essay::model()->count('t.tid=:tid and t.status > 0',array(':tid'=>$userinfo['uid']));
				break;
			case "not":
				$count = Essay::model()->count('t.tid=:tid and t.status = 1',array(':tid'=>$userinfo['uid']));
				break;
			case "rated":
				$count = Essay::model()->count('t.tid=:tid and t.status = 3',array(':tid'=>$userinfo['uid']));
				break;
			case "draft":
				$count = Essay::model()->count('t.tid=:tid and t.status = 2',array(':tid'=>$userinfo['uid']));
				break;
		}
		
		if( $count >0 ) {
			$total_pages = ceil($count/$limit);
		} else {
			$total_pages = 0;
		}
		if ($page > $total_pages){ 
			$page=$total_pages;
		}
		$start = $limit*$page - $limit;
		
		$criteria = new CDbCriteria();
		$criteria->order = $sidx." ".$sord;
		$criteria->limit = $limit;
		$criteria->offset = $start;
		
		switch($type){
			case "all":
				$criteria->condition='t.tid=:tid and t.status > 0';
				break;
			case "not":
				$criteria = Essay::model()->count('t.tid=:tid and t.status = 1',array(':tid'=>$userinfo['uid'],'limit'=>$limit,'offset'=>$start));
				break;
			case "rated":
				$criteria = Essay::model()->count('t.tid=:tid and t.status = 3',array(':tid'=>$userinfo['uid'],'limit'=>$limit,'offset'=>$start));
				break;
			case "draft":
				$criteria = Essay::model()->count('t.tid=:tid and t.status = 2',array(':tid'=>$userinfo['uid'],'limit'=>$limit,'offset'=>$start));
				break;
		}
		
		$criteria->params = array(':tid'=>$userinfo['uid']);
		$result = Essay::model()->findAll($criteria);
		$responce->page = $page;
		$responce->total = $total_pages;
		$responce->records = $count;
		foreach($result as $row){
		    $responce->rows[]=array(
		    	'id'=>$row->id,
		    	'cell'=>array($row->id,$row->uid,$row->cateid,$row->customquestion,$row->submittime,$row->status)	
			);
		}        
		echo json_encode($responce);
	}
	
	public function actionMark(){
		$type=$_GET['type'];
		$essayid = $_GET['essayid'];
		$model = new EssayMarked;
		$this->render('mark',array('model'=>$model));
	}
}
