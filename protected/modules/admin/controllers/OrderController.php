<?php

class OrderController extends Controller {

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
                'actions' => array('update', 'index', 'view', 'admin', 'delete','sendOrder'),
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
        $this->pageTitle= '后台管理系统 - 订单中心 - 查看订单 - DDAYIN.COM';
        $dataProvider = Order::model()->findByPk($id);
        $address = Address::model()->findAll();
        $productInfo = OrderProduct::model()->findAll('order_id=' . $id);
        $category = Category::model()->findAll();
        $this->render('view', array(
            'dataProvider' => $dataProvider,
            'productInfo' => $productInfo,
            'category' => $category,
            'address' => $address,
        ));
    }


    /**
     * Updates a particular model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id the ID of the model to be updated
     */
    public function actionUpdate($id) {
         $this->pageTitle= '后台管理系统 - 订单中心 - 编辑订单 - DDAYIN.COM';

		 
        if(isset($_POST['stat'])){
             $dataProvider = Order::model()->findByPk($id);
			 $dataProvider->order_stat = $_POST['stat'];	
             $dataProvider->save();
          
             
             
            $this->redirect(array('order/admin'));   
            
            
        }else{
            $dataProvider = Order::model()->findByPk($id);
            $address = Address::model()->findAll();
            $productInfo = OrderProduct::model()->findAll('order_id=' . $id);
            $category = Category::model()->findAll();
            $this->render('update', array(
                'dataProvider' => $dataProvider,
                'productInfo' => $productInfo,
                'category' => $category,
                'address' => $address,
            ));  
        }
        
        
    }

    /**
     * Deletes a particular model.
     * If deletion is successful, the browser will be redirected to the 'admin' page.
     * @param integer $id the ID of the model to be deleted
     */
    public function actionDelete() {
        $model = Order::model()->findByPk($_POST['id']);
        $model->order_stat = 5;
		$model->save();
        echo 200;
    }

    /**
     * Lists all models.
     */
    public function actionIndex() {
        $dataProvider = new CActiveDataProvider('Order');
        $this->render('index', array(
            'dataProvider' => $dataProvider,
        ));
    }

    /**
     * Manages all models.
     */
    public function actionAdmin($page = 0,$stat="",$payment='',$express='',$id='',$buyUser='',$buyEmail='') {
		$this->pageTitle= '后台管理系统 - 订单中心 - 订单管理 - DDAYIN.COM';
        $cter = new CDbCriteria;
        //---------------------------------下拉查询
        if(isset($_POST['stat'])){
            if($_POST['stat'] != "" || $_POST['payment'] != '' || $_POST['express']){
                  $cter->compare('order_stat',$_POST['stat'], false,'AND');
                  $cter->compare('payment', $_POST['payment'], false,'AND');
                  $stat = $_POST['stat'];
                  $payment = $_POST['payment'];
             }
        }
         
         
         if($stat != "" || $payment != "" || $express != ''){
            $cter->compare('order_stat',$stat, false,'AND');
            $cter->compare('payment', $payment, false,'AND');
         }
         //------------------------------------提交查询
         if(isset($_POST['id'])){
            if($_POST["id"] != ""){
                $cter->compare('id',$_POST['id'],true,'AND');
                $id = $_POST['id'];
            }
            if($_POST['buyUser'] != ""){
                $user = Customer::model()->find('name="'.$_POST['buyUser'].'"');
                if($user){
                    $cter->compare('add_id', $user->id,true,'AND');
                }
                $buyUser = $_POST['buyUser'];
            }
		
            if($_POST['buyEmail'] != ""){
                $user = Customer::model()->find('email="'.$_POST['buyEmail'].'"');
                if($user){
                    $cter->compare('add_id',$user->id,false);
                }
                $buyEmail = $_POST['buyEmail'];
            }
         }
         
         if($id != ''){
              $cter->compare('id',$id,true,'AND');  
         }
         if($buyUser != ""){
              $user = Customer::model()->find('name="'.$buyUser.'"');
              if($user){
                $cter->compare('add_id',$user->id,true,'AND');  
              }
         }
         if($buyEmail != ""){
              
              $user = Customer::model()->find('name="'.$buyEmail.'"');
              if($user){
                  $cter->compare('u_id',$user->id,false);
              }
              
         }
         
        
        $pageCount = Order::model()->count($cter); //----当前用户总数
        $cter->order = 'id ASC';
        $cter->limit = 20;
        $cter->offset = $page * 20;
        $model = Order::model()->findAll($cter);
        $pageALL = ceil($pageCount / 20);
        //$model = Customer::model()->findAll();
        
        $amodel = Address::model()->findAll();
        $this->render('admin', array(
            'model' => $model,
            'onpage' => $page,
            'pageCount' => $pageCount,
            'pageALL' => $pageALL,
            'amodel' => $amodel,
            'stat' => $stat,
            'payment' => $payment,
            'express' => $express,
            'id' => $id,
            'buyUser' => $buyUser,
            'buyEmail'=> $buyEmail,
        ));
    }
    
    
    public function actionsendOrder($page = 0) {

        $cter = new CDbCriteria;
        $cter->compare('order_stat',3, false);
        
        $pageCount = Order::model()->count($cter); //----当前用户总数
        $cter->order = 'id ASC';
        $cter->limit = 10;
        $cter->offset = $page * 10;
        $model = Order::model()->findAll($cter);
        $pageALL = ceil($pageCount / 10);
        //$model = Customer::model()->findAll();
        
        $amodel = Address::model()->findAll();
        $this->render('sendOrder', array(
            'model' => $model,
            'onpage' => $page,
            'pageCount' => $pageCount,
            'pageALL' => $pageALL,
            'amodel' => $amodel,
        ));
    }

    /**
     * Returns the data model based on the primary key given in the GET variable.
     * If the data model is not found, an HTTP exception will be raised.
     * @param integer $id the ID of the model to be loaded
     * @return Order the loaded model
     * @throws CHttpException
     */
    public function loadModel($id) {
        $model = Order::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }

    /**
     * Performs the AJAX validation.
     * @param Order $model the model to be validated
     */
    protected function performAjaxValidation($model) {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'order-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }

}
