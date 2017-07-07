<?php

class CartController extends Controller {

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
                'actions' => array('update', 'ajaxadd', 'addcart', 'index', 'ajaxdelete', 'view', 'form', 'orderform', 'remark','deletethis'),
                'users' => array('@'),
            ),
            array('allow', // allow admin user to perform 'admin' and 'delete' actions
                'actions' => array('create', 'admin', 'delete'),
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
        $this->render('view', array(
            'model' => $this->loadModel($id),
        ));
    }

    /**
     * Creates a new model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     */
    public function actionCreate() {
        $model = new Cart;

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if (isset($_POST['Cart'])) {
            $model->attributes = $_POST['Cart'];
            if ($model->save())
                $this->redirect(array('view', 'id' => $model->cid));
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
    public function actionUpdate() {
		$cid = $_POST['cid'];
		$num = $_POST['num'];
        $cmodel = Cart::model()->findByPk($cid);
        $cmodel->number = $num;
        $cmodel->save();
    }

    /**
     * Deletes a particular model.
     * If deletion is successful, the browser will be redirected to the 'admin' page.
     * @param integer $id the ID of the model to be deleted
     */
    public function actionDelete($id) {
        $this->loadModel($id)->delete();

        // if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
        if (!isset($_GET['ajax']))
            $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
    }

    /**
     * Lists all models.
     */
    public function actionAddCart() {
        $model = new Cart;
        //----加入购物车
		print_r($_POST);
        if (isset($_POST['product_id'])) {

            $product = Product::model()->find('id=' . $_POST['product_id']);
            $uCart = Cart::model()->find('uid=' . $_POST['user_id'] . ' and  ' . 'pid=' . $_POST['product_id'] . ' and  ' . 'color="' . $_POST['color'] . '" and ' . 'material=' . $_POST['material']);
            $pic = '';
			$photo = ProductPhoto::model()->findAll('p_id='.$_POST['product_id']);
			foreach($photo as $p){
				$pic = $p->pic;	
				break;
			}
			
			
            if ($uCart != null) {

                $uCart->number += $_POST['quantity'];
                //print_r($uCart->number);
                $uCart->save();
            } else {

                $model->pid = $product->id;
                $model->category_id = $product->category_id;
                $model->name = $product->name;
                $model->price = $_POST['price'];
                $model->number = $_POST['quantity'];
                $model->color = $_POST['color'];
                $model->material = $_POST['material'];
                $model->pic = $pic;
                $model->a_id = $product->add_uid;
                $model->uid = $_POST['user_id'];
                $model->buy_time = date('Y-m-d H:i:s', time());
                $model->save();
            }
        }
		$this->pageTitle=Yii::app()->name.'-购物车';
        $this->redirect(array('cart/index'));
    }

    public function actionIndex() {
        //----只查询出当前登录用户的购物车
        $cter = new CDbCriteria;
        $cter->compare('uid', Yii::app()->user->id, false);
        $dataProvider = Cart::model()->findAll($cter);
		$this->pageTitle=Yii::app()->name.'-购物车';
        $this->render('index', array(
            'dataProvider' => $dataProvider,
        ));
    }

    //----ajax加入购物车
    public function actionAjaxAdd($uid, $pid) {

        $model = new Cart;
        //----加入购物车
        if (isset($pid)) {
            $product = Product::model()->find('id=' . $pid); //查询出所点击的商品
            $uCart = Cart::model()->find('uid=' . $uid . ' and  ' . 'pid=' . $pid); //判断该课程是否已加入购物车
            if ($uCart != null) {
                $uCart->number += 1;
                $uCart->save();
            } else {
                $model->pid = $product->id;
                $model->category_id = $product->category_id;
                $model->name = $product->name;
                $model->price = $product->price;
                $model->number = 1;
                $model->pic = $product->thumbnail;
                $model->a_id = $product->add_uid;
                $model->uid = $uid;
                $model->buy_time = date('Y-m-d H:i:s', time());
                $model->save();
            }
        }
        echo 200;
    }
	
	
	//----单独删除
    public function actionDeleteThis() {

		  $id = $_POST['id'];		  
		  $uCart = Cart::model()->findByPk($id);
		  $uCart->delete();
		  echo 200;
    }
	

    //----ajax删除
    public function actionAjaxDelete() {
	
		$arr = $_POST['ccid'];
        foreach ($arr as $r => $val) {
            $uCart = Cart::model()->findByPk($val);
            $uCart->delete();
        }
        echo 200;
    }
	
	
	
	

    //----提交购物车
    public function actionForm() {
        

        if (isset($_POST['chkSon'])) {

            $cartInfo = Cart::model()->findAll();
            $address = Address::model()->findAll('add_id='.Yii::app()->user->id);
			$criteria = new CDbCriteria;
			$criteria->compare('add_id='.Yii::app()->user->id,false);
			$Count = Address::model()->count($criteria);
			$this->pageTitle=Yii::app()->name.'-提交订单';
            $this->render('orderform', array(
                'allPrice' => $_POST['all_cart_price'],
                'uid' => Yii::app()->user->id,
                'allPid'=>$_POST['chkSon'],
                'cartInfo'=> $cartInfo,
                'address'=> $address,
				'Count' => $Count,
            ));
        }
    }

   
    //----添加订单备注
    public function actionReMark() {
        //echo $_POST['oid'];
        $id = $_POST['oid'];
        $remark = $_POST['content'];
        $order = Order::model()->findByPk($id);
        $order->remarks = $remark;
        $order->edit_id = Yii::app()->user->id;
        $order->edit_time = date('Y-m-d H:i:s', time());
        $order->save();
        //$this->redirect(array('orderform','id'=>$order->id,));
        echo 200;
    }

    /**
     * Manages all models.
     */
    public function actionAdmin() {
        $model = new Cart('search');
        $model->unsetAttributes();  // clear any default values
        if (isset($_GET['Cart']))
            $model->attributes = $_GET['Cart'];

        $this->render('admin', array(
            'model' => $model,
        ));
    }

    /**
     * Returns the data model based on the primary key given in the GET variable.
     * If the data model is not found, an HTTP exception will be raised.
     * @param integer $id the ID of the model to be loaded
     * @return Cart the loaded model
     * @throws CHttpException
     */
    public function loadModel($id) {
        $model = Cart::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }

    /**
     * Performs the AJAX validation.
     * @param Cart $model the model to be validated
     */
    protected function performAjaxValidation($model) {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'cart-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }

}
