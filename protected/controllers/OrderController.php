<?php

class OrderController extends Controller {

    /**
     * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
     * using two-column layout. See 'protected/views/layouts/column2.php'.
     */
    public $layout = '//layouts/column1';

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
                'actions' => array('create', 'index', 'view', 'needpay', 'cancelorder', 'overorder', 'ajaxdelete', 'remark','payOrder','overpay','needtake','ajaxSend','ajaxTake','Handl','alipayapi','notify_url','return_url'),
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
        
         
        $dataProvider = Order::model()->findByPk($id);
        
        if($dataProvider->add_id == Yii::app()->user->id){
            //print_r(Yii::app()->user->id);
            //print_r($dataProvider->add_id);
            $address = Address::model()->findAll();
            $productInfo = OrderProduct::model()->findAll('order_id=' . $id);
            $category = Category::model()->findAll();
			$this->pageTitle=Yii::app()->name.'-会员中心-订单详情';
            $this->render('view', array(
                'dataProvider' => $dataProvider,
                'productInfo' => $productInfo,
                'category' => $category,
                'address' => $address,
            ));
        }else{
           $this->redirect(array('site/index'));
        }
        
    }

    /**
     * Creates a new model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     */
    public function actionCreate() {
        $model = new Order;

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if (isset($_POST['Order'])) {
            $model->attributes = $_POST['Order'];
            if ($model->save())
                $this->redirect(array('view', 'id' => $model->id));
        }

        $this->render('create', array(
            'model' => $model,
        ));
    }
    
    public function actionPayOrder() {
		 $this->pageTitle=Yii::app()->name.'-会员中心-订单提交';
		
		 $address = Address::model()->findByPk($_POST['sub_address_id']);
		
         $model = new Order;
         $model->u_id = Yii::app()->user->id;//---购买者
         $model->allPrice = $_POST['sub_pay_price'];//---订单总价
         $model->address = $_POST['sub_address_id'];//----地址id
         $model->express = $_POST['sub_express'];//----配送方式
         $model->payment = $_POST['sub_payment'];//----配送方式
         $model->remarks = $_POST['sub_remarks'];//----备注
		 
		 //-----地址
		 $model->ad_name = $address->name;
		 $model->ad_mobile = $address->mobile;
		 $model->ad_telephone = $address->telephone;
		 $model->ad_areacode = $address->areacode;
		 $model->ad_area = $address->area;
		 $model->ad_address = ''.$address->address.'';
		 
		 
         $model->order_stat = 1;
         $model->add_id = Yii::app()->user->id;
         $model->add_time = date('Y-m-d H:i:s', time());
         $model->save();
		 
		 
		 
		 
         
        //----把商品加入order_product
        foreach (explode(',',$_POST['sub_allCid']) as $val) {
            $omodel = new OrderProduct;
            $cmodel = Cart::model()->findByPk($val);
            $omodel->order_id = $model->id;
            $omodel->p_id = $cmodel->pid;
            $omodel->name = $cmodel->name;
            $omodel->category_id = $cmodel->category_id;
            $omodel->pic = $cmodel->pic;
            $omodel->number = $cmodel->number;
            $omodel->material = $cmodel->material;
            $omodel->color = $cmodel->color;
            $omodel->price = $cmodel->price;
            $omodel->u_id = $cmodel->a_id;
            $omodel->save();
        }


        //----提交成功后删除购物车中的该商品
		if($_POST['sub_allCid'] != ''){
			
		
			
			foreach (explode(',',$_POST['sub_allCid']) as $val) {
				$uCart = Cart::model()->findByPk($val);
				
				if($uCart != ''){
					$uCart->delete();	
				}

        	}
			
		}
        
        
         $this->render('payOrder', array(
            'model' => $model,
			'order_id'=>$model->id,
			'address' => $address,
        ));
        
        
       
    }


    /**
     * Deletes a particular model.
     * If deletion is successful, the browser will be redirected to the 'admin' page.
     * @param integer $id the ID of the model to be deleted
     */
    public function actionDelete($id) {
        
        $dataProvider = Order::model()->findByPk($id);
        if($dataProvider->add_id == Yii::app()->user->id){
        
            $this->loadModel($id)->delete();
            // if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
            if (!isset($_GET['ajax'])){
                $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
            }
        }else{
            $this->redirect(array('site/index'));
        }
        
            
    }

    /**
     * Lists all models.
     */
    //----查询出所有订单
    public function actionIndex($page = 0,$stat='') {
        //----只查询出当前登录用户的订单
        $cter = new CDbCriteria;
        $cter->compare('u_id', Yii::app()->user->id, false,'AND');
        
        if($stat != ''){
             $cter->compare('order_stat',$stat,false);
        }

        $pageCount = Order::model()->count($cter); //----当前用户总数
        $cter->order = 'id ASC';
        $cter->limit = 10;
        $cter->offset = $page * 10;
        $dataProvider = Order::model()->findAll($cter);
        $pageALL = ceil($pageCount / 10);
		
		//购买用户id
		

        $productInfo = OrderProduct::model()->findAll();
        $category = Category::model()->findAll();
		$this->pageTitle=Yii::app()->name.'-会员中心-我的订单';
        $this->render('index', array(
            'dataProvider' => $dataProvider,
            'productInfo' => $productInfo,
            'category' => $category,
            'onpage' => $page,
            'pageCount' => $pageCount,
            'pageALL' => $pageALL,
            'action' => "index",
            'stat'=>$stat,
        ));
    }

    //----查询出所有待付款的订单
    public function actionNeedPay($page = 0,$stat='') {

        $cter = new CDbCriteria;
        $cter->compare('u_id', Yii::app()->user->id, false);
        $cter->compare('order_stat', 1, false, "AND");
        $pageCount = Order::model()->count($cter); //----当前用户总数
        $cter->order = 'add_time DESC';
        $cter->limit = 5;
        $cter->offset = $page * 5;
        $dataProvider = Order::model()->findAll($cter);
        $productInfo = OrderProduct::model()->findAll();
        $category = Category::model()->findAll();

        $pageALL = ceil($pageCount / 5);
		$this->pageTitle=Yii::app()->name.'-会员中心-待付款订单';
        $this->render('index', array(
            'dataProvider' => $dataProvider,
            'productInfo' => $productInfo,
            'category' => $category,
            'onpage' => $page,
            'pageCount' => $pageCount,
            'pageALL' => $pageALL,
            'action' => "needpay",
            'stat'=>$stat,
        ));
    }
    
    //----查询出所有已付款的订单
    public function actionOverPay($page = 0,$stat='') {

        $cter = new CDbCriteria;
        $cter->compare('u_id', Yii::app()->user->id, false);
        $cter->compare('order_stat', 2, false, "AND");
        $pageCount = Order::model()->count($cter); //----当前用户总数
        $cter->order = 'add_time DESC';
        $cter->limit = 5;
        $cter->offset = $page * 5;
        $dataProvider = Order::model()->findAll($cter);
        $productInfo = OrderProduct::model()->findAll();
        $category = Category::model()->findAll();

        $pageALL = ceil($pageCount / 5);
		$this->pageTitle=Yii::app()->name.'-会员中心-已付款订单';
        $this->render('index', array(
            'dataProvider' => $dataProvider,
            'productInfo' => $productInfo,
            'category' => $category,
            'onpage' => $page,
            'pageCount' => $pageCount,
            'pageALL' => $pageALL,
            'action' => "overpay",
            'stat'=>$stat,
        ));
    }
    
    //----查询出所有已付款的订单
    public function actionNeedTake($page = 0,$stat='') {

        $cter = new CDbCriteria;
        $cter->compare('u_id', Yii::app()->user->id, false);
        $cter->compare('order_stat', 3, false, "AND");
        $pageCount = Order::model()->count($cter); //----当前用户总数
        $cter->order = 'add_time DESC';
        $cter->limit = 5;
        $cter->offset = $page * 5;
        $dataProvider = Order::model()->findAll($cter);
        $productInfo = OrderProduct::model()->findAll();
        $category = Category::model()->findAll();

        $pageALL = ceil($pageCount / 5);
		$this->pageTitle=Yii::app()->name.'-会员中心-待发货订单';
        $this->render('index', array(
            'dataProvider' => $dataProvider,
            'productInfo' => $productInfo,
            'category' => $category,
            'onpage' => $page,
            'pageCount' => $pageCount,
            'pageALL' => $pageALL,
            'action' => "needtake",
            'stat'=>$stat,
        ));
    }

    //----查询出所有以取消的订单
    public function actionCancelOrder($page = 0,$stat='') {
        $cter = new CDbCriteria;
        $cter->compare('u_id', Yii::app()->user->id, false);
        $cter->compare('order_stat',5, false, "AND");
        $pageCount = Order::model()->count($cter); //----当前用户总数
        $cter->order = 'edit_time DESC';
        $cter->limit = 5;
        $cter->offset = $page * 5;
        $dataProvider = Order::model()->findAll($cter);
        $productInfo = OrderProduct::model()->findAll();
        $category = Category::model()->findAll();

        $pageALL = ceil($pageCount / 5);
		$this->pageTitle=Yii::app()->name.'-会员中心-已取消订单';
        $this->render('index', array(
            'dataProvider' => $dataProvider,
            'productInfo' => $productInfo,
            'category' => $category,
            'onpage' => $page,
            'pageCount' => $pageCount,
            'pageALL' => $pageALL,
            'action' => "cancelorder",
            'stat'=>$stat,
        ));
    }

    //----查询出所有以完成的订单
    public function actionOverOrder($page = 0,$stat='') {
        $cter = new CDbCriteria;
        $cter->compare('u_id', Yii::app()->user->id, false);
        $cter->compare('order_stat', 4, false, "AND");
        $pageCount = Order::model()->count($cter); //----当前用户总数
        $cter->order = 'edit_time DESC';
        $cter->limit = 5;
        $cter->offset = $page * 5;
        $dataProvider = Order::model()->findAll($cter);
        $productInfo = OrderProduct::model()->findAll();
        $category = Category::model()->findAll();

        $pageALL = ceil($pageCount / 5);
		$this->pageTitle=Yii::app()->name.'-会员中心-已完成订单';
        $this->render('index', array(
            'dataProvider' => $dataProvider,
            'productInfo' => $productInfo,
            'category' => $category,
            'onpage' => $page,
            'pageCount' => $pageCount,
            'pageALL' => $pageALL,
            'action' => "overorder",
            'stat'=>$stat,
        ));
    }

    //----取消订单
    public function actionAjaxDelete() {
        $uOrder = Order::model()->findByPk($_POST['id']);
        $uOrder->order_stat = 5;
        $uOrder->save();
        echo 200;
    }
    
    //----提醒卖家发货
    public function actionAjaxSend($id) {
        $uOrder = Order::model()->findByPk($id);
        $uOrder->send = 1;
        $uOrder->save();
        echo 200;
    }
    
    //----确认收货
    public function actionAjaxTake($id) {
        $uOrder = Order::model()->findByPk($id);
        $uOrder->order_stat = 4;
        $uOrder->save();
        echo 200;
    }
    

   

    /**
     * Manages all models.
     */
    public function actionAdmin() {
        $model = new Order('search');
        $model->unsetAttributes();  // clear any default values
        if (isset($_GET['Order']))
            $model->attributes = $_GET['Order'];

        $this->render('admin', array(
            'model' => $model,
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
	
	public function actionHandl(){
      
		$this->render('alipayapi', array());

    }
	
	public function actionReturn_url(){
      
		$this->render('return_url', array());

    }
	
	public function actionNotify_url(){
      
		$this->render('notify_url', array());

    }
	

}
