<?php

class BlogLogController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='/layouts/metro';

	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
			'postOnly + delete', // we only allow deletion via POST request
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
				'actions'=>array('index','view'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update','upload','test'),
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
		$model=new BlogLog;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['BlogLog']))
		{
			$model->attributes=$_POST['BlogLog'];
			$tags = implode(",",$_POST['BlogLog']['tags']);
			$model->tags = $tags;
			$model->stat = 1;
			$model->create_time = date('Y-m-d H:i:s');
			$model->content = $_POST['content'];
			
			
			
			if($model->save())
				$this->redirect(array('admin'));
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
		$this->pageTitle= '后台管理系统 - 博客中心 - 博客管理 - 编辑博客 - DDAYIN.COM';
		$model=$this->loadModel($id);
		$blogTags = BlogTags::model()->findAll();
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);
		$checkTags = BlogLog::model()->findByPk($id);
		//print_r($checkTags->tags);
		$check = explode(",",$checkTags->tags);
		$model->tags = $check;
		if(isset($_POST['BlogLog']))
		{	
			$model->attributes=$_POST['BlogLog'];
			//print_r($_POST['BlogLog']['tags']);
			$tags = $_POST['BlogLog']['tags'];
			$model->stat = $_POST['BlogLog']['stat'];
			$model->pic = $_POST['BlogLog']['pic'];
			$model->tags = $tags;
			$model->edit_time = date('Y-m-d H:i:s');
			$model->content = $_POST['content'];
			if($model->save()){
				$this->redirect(array('admin'));
			}	
		}

		$this->render('update',array(
			'model'=>$model,
			'blogTags'=>$blogTags,
		));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete()
	{
		$model = BlogLog::model()->findByPk($_POST['id']);
		$model->delete();
		echo 200;
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('BlogLog');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin($page = 0,$stat="",$title='',$addUser='')
	{
		$this->pageTitle= '后台管理系统 - 博客中心 - 博客管理 - DDAYIN.COM';
		
		$cter = new CDbCriteria;
		//---------------------------------下拉查询
		if(isset($_POST['stat'])){
			if($_POST['stat'] != ""){
				  $cter->compare('stat',$_POST['stat'], false,'AND');
				  $stat = $_POST['stat'];
			 }
		}

		 //------------------------------------提交查询
		 if(isset($_POST['title'])){
			if($_POST["title"] != ""){
				$cter->compare('title',$_POST['title'],true);
				$title = $_POST['title'];
			}
			if($_POST['addUser'] != ""){
				$user = Customer::model()->find('name="'.$_POST['addUser'].'"');
				if($user){
					$cter->compare('create_id', $user->id,true);
				}
				$addUser = $_POST['addUser'];
			}
		   
		 }

		 if($title != ''){
			  $cter->compare('title',$title,true,'AND');  
		 }
		 if($addUser != ""){
			  $user = Customer::model()->find('name="'.$addUser.'"');
			  if($user){
				$cter->compare('create_id',$user->id,true,'AND');  
			  }
		 }
		


		$pageCount = BlogLog::model()->count($cter); //----当前用户总数
		$cter->order = 'id ASC';
		$cter->limit = 30;
		$cter->offset = $page * 30;
		$model = BlogLog::model()->findAll($cter);
		$pageALL = ceil($pageCount / 30);
		$cmodel = Customer::model()->findAll();

		$this->render('admin', array(
			'model' => $model,
			'cmodel' => $cmodel,
			'onpage' => $page,
			'pageCount' => $pageCount,
			'pageALL' => $pageALL,
			'stat' => $stat,
			'title' => $title,
			'addUser' => $addUser,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return BlogLog the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=BlogLog::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param BlogLog $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='blog-log-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
	
	//----上传图片
	public function actionUpload()
    {
          $dest_folder = Yii::app()->basePath."/../assets/blogfile/";
		  $kb = 1024;
		  $new_name = "HIS_".rand(0,99)."_".date("mdYhis").".jpg";
		  Yii::import("ext.EFineUploader.qqFileUploader");
          $qq = new qqFileUploader();
          $qq->allowedExtensions = array('jpg','jpeg');
          $qq->sizeLimit = 2048 * $kb;
 
          $result = $qq->handleUpload($dest_folder,$new_name);
          $result['filename'] = $new_name;
		  $result['folder'] = $dest_folder;
 
          $uploadedFile = $dest_folder.$result['filename'];
 
          header("Content-Type: text/plain");
          $result = htmlspecialchars(json_encode($result), ENT_NOQUOTES);
          echo $result;
		  
          Yii::app()->end();
    }
	
	public function actionTest(){
		
		$this->render('test');	
	}
	
}
