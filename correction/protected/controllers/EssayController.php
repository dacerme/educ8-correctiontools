<?php

class EssayController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/student';

	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
		);
	}
	
	private function getUser(){
		return Yii::app()->user->getState('userinfo');
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
				'actions'=>array('index','view','list','getessay'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update'),
				'users'=>array('*'),
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

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView()
	{
		$essay = Essay::model()->with('cate','subcate')->findByPk($_GET['essayid']);
		
		if($essay->status < 3){
			$this->render('view',array(
				'model'=>$essay
			));
		}else{
			$mark = EssayMarked::model()->with('essayGradescores')->find('e_id=:eid',array(':eid'=>$_GET['essayid']));
			if(in_array($essay->cateid, array(1,2,3))){
				$grade = EssayGrade::model()->findAll('category=:category',array(':category'=>$essay->subcateid));
			}else{
				$grade = EssayGrade::model()->findAll('category=0');
			}
			$this->render('view',array(
				'model'=>$essay,
				'mark'=>$mark,
				'grade'=>$grade
			));
		}
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new Essay;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Essay']))
		{
			if(isset($_POST['submit'])){
				$status = 1;
			}
			if(isset($_POST['draft'])){
				$status = 0;
			}
			
			$model->attributes=$_POST['Essay'];
			if($_POST['Essay']['cateid'] == 11){
				$model->subcateid = NULL;
			}
			$model->status = $status;
			$model->questionid = 1;
			$model->tid=2;
			if($model->save())
				$this->redirect(array('site/icorrection'));
		}
		$this->render('create',array(
			'model'=>$model,
			'userinfo'=>$this->getUser()
		));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate()
	{
		$model=$this->loadModel($_GET['essayid']);
		if(isset($_POST['Essay']))
		{
			if(isset($_POST['submit'])){
				$status = 1;
			}
			if(isset($_POST['draft'])){
				$status = 0;
			}
			
			$model->attributes=$_POST['Essay'];
			if($_POST['Essay']['cateid'] == 11){
				$model->subcateid = NULL;
			}
			$model->status = $status;
			$model->questionid = 1;
			if($model->save())
				$this->redirect(array('site/icorrection'));
		}
		$this->render('update',array(
			'model'=>$model,
			'userinfo'=>$this->getUser()
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
		$dataProvider=new CActiveDataProvider('Essay');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Essay('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Essay']))
			$model->attributes=$_GET['Essay'];

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
		$model=Essay::model()->findByPk($id);
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
		if(isset($_POST['ajax']) && $_POST['ajax']==='essay-form')
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
				$count = Essay::model()->count('t.uid=:uid',array(':uid'=>$userinfo['uid']));
				break;
			case "not":
				$count = Essay::model()->count('t.uid=:uid and (t.status = 1 or t.status = 2)',array(':uid'=>$userinfo['uid']));
				break;
			case "rated":
				$count = Essay::model()->count('t.uid=:uid and t.status=:status',array(':uid'=>$userinfo['uid'],':status'=>3));
				break;
			case "draft":
				$count = Essay::model()->count('t.uid=:uid and t.status = 0',array(':uid'=>$userinfo['uid']));
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
				$criteria->condition='t.uid=:uid';
				break;
			case "not":
				$criteria->condition='t.uid=:uid and (t.status = 1 or t.status = 2)';
				break;
			case "rated":
				$criteria->condition='t.uid=:uid and t.status = 3';
				break;
			case "draft":
				$criteria->condition='t.uid=:uid and t.status = 0';
				break;
		}
		
		$criteria->params = array(':uid'=>$userinfo['uid']);
		$result = Essay::model()->findAll($criteria);
		$responce->page = $page;
		$responce->total = $total_pages;
		$responce->records = $count;
		foreach($result as $row){
			$cate = Category::model()->findByPk($row->cateid);
		    $responce->rows[]=array(
		    	'id'=>$row->id,
		    	'cell'=>array($row->id,$cate->name,$row->customquestion,$row->submittime,$this->getStatus($row->status))	
			);
		}        
		echo json_encode($responce);
	}

	private function getStatus($status){
		$array = array('0'=>'Draft','1'=>'Not Rated','2'=>'Marking','3'=>'Rated');
		return $array[$status];
	}
}
