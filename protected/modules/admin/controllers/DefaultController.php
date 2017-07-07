<?php

class DefaultController extends Controller
{	

	public $layout = '/layouts/metro';
   
	public function actionIndex()
	{	
		$this->pageTitle= '后台管理系统 - 控制中心 - DDAYIN.COM';
		$this->render('index');
	}
	
	
	
    public function actionLogin(){
    	
		$this->layout = '/layouts/login';
		$this->pageTitle= '后台管理系统 - 登录 - DDAYIN.COM';
		$model=new LoginForm;
            // if it is ajax validation request
		if(isset($_POST['ajax']) && $_POST['ajax']==='login-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}

		// collect user input data
		if(isset($_POST['LoginForm']))
		{
			$model->attributes=$_POST['LoginForm'];
			// validate user input and redirect to the previous page if valid
			if($model->validate() && $model->login()){
				$this->redirect(Yii::app()->createUrl('admin/default/index'));	
			}                      
		}
		// display the login form
		$this->render('login',array('model'=>$model));
   }
         
   public function actionLogout() {
            Yii::app()->user->logout(false);
            $this->redirect(Yii::app()->getModule('admin')->user->loginUrl);
   }
   
   //    访问权限过滤器  
   public function filters()
   {
	  return array(
		'accessControl',  
	  );
   }
   
	public function accessRules() {
		return array(
			array('deny',
				  'actions'=>array('index'),
				  'users'=>array('?'),//动作不能被匿名执行；
				),
			array('allow',  
			'actions'=>array('index','contact'),  
			'users'=>array('@'),  //动作可以被admin角色的用户执行；
				),  
			array('deny',  
				'actions'=>array('delete'),  
				'users'=>array('*'),  //delete动作不能被任何人执行。
			),  
		);
	}
}