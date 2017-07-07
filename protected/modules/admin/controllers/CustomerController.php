<?php

class CustomerController extends Controller {

    /**
     * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
     * using two-column layout. See 'protected/views/layouts/column2.php'.
     */
    public $layout = '/layouts/metro';

    /**
     * @return array action filters
     */
    public function filters() {
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
    public function accessRules() {
        return array(
            array('allow', // allow all users to perform 'index' and 'view' actions
                'actions' => array(''),
                'users' => array('*'),
            ),
            array('allow', // allow authenticated user to perform 'create' and 'update' actions
                'actions' => array('create', 'update','index', 'view','admin', 'delete'),
                'users' => array('@'),
            ),
            array('allow', // allow admin user to perform 'admin' and 'delete' actions
                'actions' => array('admin', 'delete'),
                'users' => array('admin'),
            ),
            array('deny', // deny all users
                'users' => array('*'),
            ),
        );
    }

    /**
     * Displays a particular model.
     * @param integer $id the ID of the model to be displayed
     */
    public function actionView($id) {
		$this->pageTitle= '后台管理系统 - 用户中心 - 会员管理 - 查看会员 - DDAYIN.COM';
        $this->render('view', array(
            'model' => $this->loadModel($id),
        ));
    }

    /**
     * Creates a new model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     */
    public function actionCreate() {
		$this->pageTitle= '后台管理系统 - 用户中心 - 会员管理 - 新增会员 - DDAYIN.COM';
        $model = new Customer;
        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if (isset($_POST['Customer'])) {

            //print_r($model->password);
            $model->attributes = $_POST['Customer'];
            $model->password = md5($_POST['Customer']['password']);
            $model->pic = "./assets/userLogo/default.png";
			$model->date_added = date('Y-m-d H:i:s', time());
            if ($model->save()) {
                $this->redirect(array('admin'));
            }
        }

        $this->render('create', array(
            'model' => $model,
        ));
    }

    /**
     * Updates a particular model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id the ID of the model to be updated
     */
    public function actionUpdate($id) {
		$this->pageTitle= '后台管理系统 - 用户中心 - 会员管理 - 编辑会员 - DDAYIN.COM';
        $model = $this->loadModel($id);
        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);
		
		if(isset($_POST['Customer'])){
				print_r(11111);	
		}


        if (isset($_POST['Customer'])) {
            $model->attributes = $_POST['Customer'];

            if ($model->save()){
				$this->redirect(array('admin'));	
			}     
        }

        $this->render('update', array(
            'model' => $model,
        ));
    }

    /**
     * Deletes a particular model.
     * If deletion is successful, the browser will be redirected to the 'admin' page.
     * @param integer $id the ID of the model to be deleted
     */
    public function actionDelete($id) {
        $model = Customer::model()->findByPk($id);
        $model->delete();
        echo 200;
    }

    /**
     * Lists all models.
     */
    public function actionIndex() {
        $dataProvider = new CActiveDataProvider('Customer');
        $this->render('index', array(
            'dataProvider' => $dataProvider,
        ));
    }

    /**
     * Manages all models.
     */
    public function actionAdmin($page = 0, $name = "", $email = "") {

		$this->pageTitle= '后台管理系统 - 用户中心 - 会员管理 - DDAYIN.COM';
        $cter = new CDbCriteria;
        //----搜索功能
        if(isset($_POST['name']) || isset($_POST['email'])){

            if ($_POST['name'] != "" && $_POST['email'] != "") {
                $name = $_POST['name'];
                $email = $_POST['email'];

            }elseif ($_POST['name'] != "" && $_POST['email'] == "") {
                $name = $_POST['name'];
                $email = "";

            }elseif ($_POST['name'] == "" && $_POST['email'] != "") {
                $name = "";
                $email = $_POST['email'];

            }
        
        }

        if ($name != "" && $email != "") {
            
            $cter->compare('name', $name, TRUE, 'AND');
            $cter->compare('email', $email, TRUE);
            
        } elseif ($name != "" && $email == "") {
            
            $cter->compare('name', $name, TRUE);
            
        } elseif ($name == "" && $email != "") {
            
            $cter->compare('email', $email, TRUE);
            
        }

        $pageCount = Customer::model()->count($cter); //----当前用户总数
        $cter->order = 'id ASC';
        $cter->limit = 20;
        $cter->offset = $page * 20;
        $model = Customer::model()->findAll($cter);
        $pageALL = ceil($pageCount / 20);
        //$model = Customer::model()->findAll();
        $this->render('admin', array(
            'model' => $model,
            'onpage' => $page,
            'pageCount' => $pageCount,
            'pageALL' => $pageALL,
            'sname' => $name,
            'semail' => $email,
        ));
    }

    /**
     * Returns the data model based on the primary key given in the GET variable.
     * If the data model is not found, an HTTP exception will be raised.
     * @param integer $id the ID of the model to be loaded
     * @return Customer the loaded model
     * @throws CHttpException
     */
    public function loadModel($id) {
        $model = Customer::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }

    /**
     * Performs the AJAX validation.
     * @param Customer $model the model to be validated
     */
    protected function performAjaxValidation($model) {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'customer-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }

}
