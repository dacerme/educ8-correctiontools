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
				'actions'=>array('index','view','list','getessay','mark','getannotations'),
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
		if(isset($_POST['mid'])){
			$model = EssayMarked::model()->findByPk($_POST['mid']);
			$gsedit = true;
		}else{
			$model=new EssayMarked;
			$gsedit = false;
		}
		$model->markedcontent = $_POST['markcontent'];
		$model->e_id = $_POST['eid'];
		$model->feedback = $_POST['feedback'];
		$model->score = intval($_POST['totalscore']);
		$userinfo = Yii::app()->user->getState('userinfo');
		$model->tid = $userinfo['uid'];
		if(isset($_POST['submit'])){
			$model->status = 2;
			$essaystatus = 3;
		}
		if(isset($_POST['draft'])){
			$model->status = 1;
			$essaystatus = 2;
		}
		if($model->save()){
			$essay = Essay::model()->findByPk($model->e_id);
			if($this->saveGradescore($essay,$_REQUEST,$gsedit,$model->m_id)){
				$essay->status = $essaystatus;
				$essay->marktime = $model->marktime;
				if($essay->save()){
					$this->redirect(array('site/icorrection'));
				}
			}
		}
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
				$criteria->condition='t.tid=:tid and t.status = 1';
				break;
			case "rated":
				$criteria->condition='t.tid=:tid and t.status = 3';
				break;
			case "draft":
				$criteria->condition='t.tid=:tid and t.status = 2';
				break;
		}
		
		$criteria->params = array(':tid'=>$userinfo['uid']);
		$result = Essay::model()->findAll($criteria);
		$responce->page = $page;
		$responce->total = $total_pages;
		$responce->records = $count;
		foreach($result as $row){
			$cate = Category::model()->findByPk($row->cateid);
			$user = User::model()->findByPk($row->uid);
		    $responce->rows[]=array(
		    	'id'=>$row->id,
		    	'cell'=>array($row->id,$user->username,$cate->name,$row->customquestion,$row->submittime,$this->getStatus($row->status))	
			);
		}        
		echo json_encode($responce);
	}
	
	public function actionMark(){
		$type=$_GET['type'];
		$essayid = $_GET['essayid'];
		$essay = Essay::model()->with('cate','subcate','question')->findByPk($essayid);
		if(in_array($essay->cateid, array(1,2,3))){
			$grade = EssayGrade::model()->findAll('category=:category',array(':category'=>$essay->subcateid));
		}else{
			$grade = EssayGrade::model()->findAll('category=0');
		}
		if($type == "new"){
			$model = new EssayMarked;
		}else{
			$model = EssayMarked::model()->find('e_id=:eid',array(':eid'=>$essayid));
		}
		$this->render('mark',array('model'=>$model,'essay'=>$essay,'grade'=>$grade));
	}
	
	
	public function actionGetannotations(){
		$criteria = new CDbCriteria();
		$criteria->order = 'value asc';
		$model = EssayAnnotation::model()->findAll($criteria);
		$i=0;
		$bigarray = array();
		$array = array();
		foreach($model as $m){
			$temp = array(
				'type'=>'checkbox',
				'id'=>$m->a_id,
				'label'=>$m->annotation,
				'group'=>'ann',
				'title'=>'caption:'.$m->caption_en.";\nexplain:".$m->explain_en.";\nvalue:".$m->value,
				'style'=>$this->getColor($m->value)
			);
			if($i+1<8){
				$array[]=$temp;
				$i++;
			}else{
				$array[]=$temp;
				$bigarray[]=$array;
				$array = array();
				$i=0;
			}
		}
		$finalarray = array();
		for($j=0;$j<count($bigarray);$j++){
			$temp2 = array(
			   'type'=>'hbox',
		       'widths'=>array('12%','12%','12%','12%','12%','12%','12%','12%'),
			   'children'=>$bigarray[$j]
			);
			$finalarray[]=$temp2;
		}

		$advice = array(
			'id'=>'advice',
			'type'=>'textarea',
			'label'=>'Advice'
		);

		$finalarray[]=$advice;
		echo json_encode(array('id'=>'annotationbuttons','elements'=>$finalarray));
	}
	
	private function getColor($value){
	    $value = floatval($value);
		if($value < 0){
			return "background-color:red;";
		}else if($value == 0){
			return "background-color:#CCCCCC;";
		}else{
			return "background-color:green;";
		}
	}
	
	private function getStatus($status){
		$array = array('0'=>'Draft','1'=>'Not Rated','2'=>'Marking','3'=>'Rated');
		return $array[$status];
	}
	
	private function saveGradescore($essay,$request,$edit,$mid){
		if(in_array($essay->cateid, array(1,2,3))){
			$grade = EssayGrade::model()->findAll('category=:category',array(':category'=>$essay->subcateid));
		}else{
			$grade = EssayGrade::model()->findAll('category=0');
		}
		if($edit){
			$gs = EssayGradescore::model()->find('m_id=:m_id',array(':m_id'=>$mid));
		}else{
			$gs = new EssayGradescore;
		}
		foreach($grade as $g){
			if(isset($request[$g->gradename])){
				$name = $g->gradename;
				$gs->$name = $request[$g->gradename];
			}
		}
		$gs->m_id = $mid;
		if($gs->save()){
			return true;
		}
	}
}
