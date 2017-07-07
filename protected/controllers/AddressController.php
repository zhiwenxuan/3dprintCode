<?php

class AddressController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column1';

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
				'actions'=>array(''),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update','index','view','delete','ajaxAdd','ChoiceAdd'),
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin'),
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
		$model=new Address;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Address']))
		{
			$model->attributes=$_POST['Address'];
                        $model->add_id = Yii::app()->user->id;
                        $model->add_time = date('Y-m-d H:i:s',time());
                        if($model->save()){
                            $this->redirect(array('index'));    
                        }
				
		}

		$this->render('create',array(
			'model'=>$model,
		));
	}
        
        public function actionAjaxAdd()//----ajax添加收货人信息
	{
            $model=new Address;
            $model->name = $_POST['name'];
            $model->mobile = $_POST['mobile'];
            $model->telephone = $_POST['telephone'];
            $model->areacode = $_POST['areacode'];
            $model->area = $_POST['area'];
            $model->address = $_POST['address'];
            $model->add_id = Yii::app()->user->id;
            $model->add_time = date('Y-m-d H:i:s',time());
            if($model->save()){
                echo CJSON::encode($model);  
            }
            

	}
	
	    public function actionChoiceAdd()//----ajax选择收货人信息
	{
            $id = $_POST['id'];
			$model=Address::model()->findByPk($id);
			echo CJSON::encode($model);  
            

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
		$this->pageTitle=Yii::app()->name.'-会员中心-我的收货地址-修改我的收货地址';
		if(isset($_POST['Address']))
		{
			$model->attributes=$_POST['Address'];
                        $model->edit_id = Yii::app()->user->id;
                        $model->edit_time = date('Y-m-d H:i:s',time());
                        if($model->save()){
                            $this->redirect(array('index'));    
                        }
				
		}

		$this->render('create',array(
			'model'=>$model,
		));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete()
	{
		$address = Address::model()->findByPk($_POST['id']);
		$address->delete(); 
		echo 200;
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex($page = 0 )
	{
		//----只查询出当前登录用户的订单
		$address = new CDbCriteria;
		$address->compare('add_id',Yii::app()->user->id,false);
		
		$pageCount = Address::model()->count($address);//----当前用户总数
		$address->order = 'id ASC';
		$address->limit = 5 ;
		$address->offset = $page*5;
		$dataProvider= Address::model()->findAll($address);
		$pageALL = ceil($pageCount/5);
		$this->pageTitle=Yii::app()->name.'-会员中心-我的收货地址';
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
			'onpage'=>$page,
			'pageCount'=> $pageCount,
			'pageALL'=>$pageALL,
			'action'=>"index",
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Address('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Address']))
			$model->attributes=$_GET['Address'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Address the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Address::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Address $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='address-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
