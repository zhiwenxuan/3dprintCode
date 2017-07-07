<?php

class ProductController extends Controller {

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
                'actions' => array('index', 'view','category','pSearch','3dSearch','model'),
                'users' => array('*'),
            ),
            array('allow', // allow authenticated user to perform 'create' and 'update' actions
                'actions' => array('create', 'manage', 'update', 'delete', 'comments','verify','pUp','pDown','pBuys','3dSearch','upload','ajaxDelete','deleteTags'),
                'users' => array('@'),
            ),
            array('allow', // allow admin user to perform 'admin' and 'delete' actions
                'actions' => array('admin'),
                'users' => array('admin'),
            ),
            array('deny', // deny all users
                'users' => array('*'),
            ),
        );
    }
	
	public function actionModel($id , $t){
		$this->layout = '//layouts/null';
		//---模型数据
		$uid = Yii::app()->user->id;
        $product = Product::model()->findByPk($id);

        $add_id = $product->add_uid;
		$productPhoto = ProductPhoto::model()->findAll('p_id='.$product->id);
		$category = Category::model()->findAll();

        $userInfo = Customer::model()->findByPk($add_id);//----模型作者
		
		
		$uid = Yii::app()->user->id;
		$nowUser = Customer::model()->findByPk($uid);
		
        $userAll = Customer::model()->findALL();
		$download = Download::model()->findALL('p_id='.$product->id);
      
		
		$this->pageTitle=$product->name.'---3D模型在线显示|3D打印工场|ddayin.com';
        $this->render('model', array(
            
            'userAll'=>$userAll,
            'product' => $product,
            'userInfo' => $userInfo,
			'nowUser' => $nowUser,
            'model' => $this->loadModel($id),
			'category' =>$category,
			'productPhoto' =>$productPhoto,
			'download'=>$download,
			
        ));
	}

    /**
     * Displays a particular model.
     * @param integer $id the ID of the model to be displayed
     */
    public function actionView($id) {
        $this->layout = '//layouts/main';
        $uid = Yii::app()->user->id;

        $productID = Product::model()->findByPk($id);
        $add_id = $productID->add_uid;
		$productPhoto = ProductPhoto::model()->findAll('p_id='.$productID->id);
		$category = Category::model()->findAll();
		

        $userInfo = Customer::model()->findByPk($add_id);
        $userAll = Customer::model()->findALL();
		$download = Download::model()->findALL();
        $product = Product::model()->findAll('add_uid=' . $add_id . ' AND stat=2 AND shelves=2 order by add_time desc');
        
        $comments = Comments::model()->findAll('p_id='.$id.' order by add_time desc');
		$this->pageTitle=Yii::app()->name.'-商城-'.$productID->name;
        $this->render('view', array(
            'comments'=>$comments,
            'userAll'=>$userAll,
            'product' => $product,
            'userInfo' => $userInfo,
            'model' => $this->loadModel($id),
			'category' =>$category,
			'productPhoto' =>$productPhoto,
			'download'=>$download,
        ));
    }

    /**
     * Creates a new model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     */
    public function actionCreate() {
        $model = new Product;
        if (isset($_POST['Product'])) {
            $model->attributes = $_POST['Product'];
			//上传3D模型功能  dk
            $three = CUploadedFile::getInstance($model, 'three_model');   //获得一个CUploadedFile的实例  
            if (is_object($three) && get_class($three) === 'CUploadedFile') {   // 判断实例化是否成功  
                $model->three_model = './assets/three/'.time().'_'. $three->name;   //定义文件保存的名称  
            } else {
                $model->three_model = './assets/upfilePic.jpg';   // 若果失败则应该是什么图片  
            }
			
			//上传3D模型附件 dj
            $annex_file = CUploadedFile::getInstance($model, 'dowload');   //获得一个CUploadedFile的实例  
            if (is_object($annex_file) && get_class($annex_file) === 'CUploadedFile') {   // 判断实例化是否成功  
                $model->dowload = './assets/annex/'.time().'_'.Yii::app()->user->id.'.rar' ;   //定义文件保存的名称  
            } else {
                $model->dowload = '';   // 若果失败则应该是什么图片  
            }
			
			
            //----颜色
            $tags = explode(",",$_POST['tags']);
            $v = 1;
            foreach($tags as $tag){
                if($v == 1){
                    $model->keyword1 = $tag;
                }
                if($v == 2){
                    $model->keyword2 = $tag;
                }
                if($v == 3){
                    $model->keyword3 = $tag;
                }
                if($v == 4){
                    $model->keyword4 = $tag;
                }
                if($v == 5){
                    $model->keyword5 = $tag;
                }
                if($v == 6){
                    $model->keyword6 = $tag;
                }
                if($v == 7){
                    $model->keyword7 = $tag;
                }
                if($v == 8){
                    $model->keyword8 = $tag;
                }
                if($v == 9){
                    $model->keyword9 = $tag;
                }
                if($v == 10){
                    $model->keyword10 = $tag;
                } 
            $v++;
            }
            $model->metalColor = $_POST['Product']['metalColor'];
            $model->plasticColor = $_POST['Product']['plasticColor'];
            $model->designPrice = $_POST['Product']['designPrice'];
			$model->dowload_integral = $_POST['Product']['dowload_integral'];
			$model->dowload_type = $_POST['Product']['dowload_type'];
			
            $model->plasticPrice = $_POST['Product']['plasticPrice'];
            $model->metalPrice = $_POST['Product']['metalPrice'];
            if($_POST['Product']['metalColor'] != "" && $_POST['Product']['plasticColor'] != ""){
                $model->price = $_POST['Product']['metalPrice'] + $_POST['Product']['designPrice'];
            }
            if($_POST['Product']['metalColor'] != "" && $_POST['Product']['plasticColor'] == ""){
                $model->price = $_POST['Product']['metalPrice'] + $_POST['Product']['designPrice'];   
            }
            if($_POST['Product']['metalColor'] == "" && $_POST['Product']['plasticColor'] != ""){
                $model->price = $_POST['Product']['plasticPrice'] + $_POST['Product']['designPrice'];   
            }

            //----描述
            $model->description = $_POST['description'];
			//----分类数据
			$categoryArray =  implode(",",$_POST['category']);
			$model->category_id = ','.$categoryArray.',';
			
		
			

            $model->add_uid = Yii::app()->user->id;
            $model->add_time = date('Y-m-d H:i:s');
	
            if ($model->save()) {
				//----图片数据
				if($_POST['fileNameArray'] != ""){
					$fileName = explode(",",$_POST['fileNameArray']);
					foreach($fileName as $f){
						$ProductPhoto = new ProductPhoto;
						$ProductPhoto->p_id = $model->id;
						$ProductPhoto->pic = $f;
						$ProductPhoto->add_id = Yii::app()->user->id;
						$ProductPhoto->add_time = date('Y-m-d H:i:s', time());
						$ProductPhoto->save();
					}
				}

                if (is_object($three) && get_class($three) === 'CUploadedFile') {
                    $three->saveAs($model->three_model);    // 上传3D模型  
                }
				
				if (is_object($annex_file) && get_class($annex_file) === 'CUploadedFile') {
                    $annex_file->saveAs($model->dowload);    // 上传3D模型附件  
                }
                $this->redirect(array('manage','num'=>'20'));
            }		
        }
		
		//----用户上传后给予奖励积分
		$u_id = Yii::app()->user->id;			
		$Customer = Customer::model()->findByPk($u_id);				
		$Customer->integral = $Customer->integral + 20;
		$Customer->update();
		
		
		
		$cate=new CDbCriteria;  
		$cate->order='parent_id ASC';  
		$category = Category::model()->findAll($cate);//查询出所有类别
		$this->pageTitle=Yii::app()->name.'-会员中心-上传模型';
        $this->render('create', array(
            'model' => $model,
			'category'=>$category,
        ));
		
    }

    /**
     * Updates a particular model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id the ID of the model to be updated
     */
    public function actionUpdate($id, $uid) {
        $model = $this->loadModel($id, $uid);

        $product = Product::model()->findByPk($id);
		
		$cate=new CDbCriteria;  
		$cate->order='parent_id ASC';  
		$category = Category::model()->findAll($cate);//查询出所有类别
		$picArray = ProductPhoto::model()->findAll('p_id='.$id);//查询出所有该产品的图片

        if ($uid != Yii::app()->user->id) {//只允许修改用户自己的商品
            $this->redirect(array('view', 'id' => $model->id));
        }

        if (isset($_POST['Product'])) {
            $model->attributes = $_POST['Product'];
			
			
			//----分类数据
			$categoryArray =  implode(",",$_POST['category']);
			$model->category_id = ','.$categoryArray.',';
			
			
			//----图片数据
			if($_POST['fileNameArray'] != ""){
				$fileName = explode(",",$_POST['fileNameArray']);
				foreach($fileName as $f){
					$ProductPhoto = new ProductPhoto;
					$ProductPhoto->p_id = $id;
					$ProductPhoto->pic = $f;
					$ProductPhoto->add_id = Yii::app()->user->id;
					$ProductPhoto->add_time = date('Y-m-d H:i:s', time());
					$ProductPhoto->save();
				}
			}
			

           
			$tags = explode(",",$_POST['tags']);
            $v = 1;
            foreach($tags as $tag){
                if($v == 1){
                    $model->keyword1 = $tag;
                }
                if($v == 2){
                    $model->keyword2 = $tag;
                }
                if($v == 3){
                    $model->keyword3 = $tag;
                }
                if($v == 4){
                    $model->keyword4 = $tag;
                }
                if($v == 5){
                    $model->keyword5 = $tag;
                }
                if($v == 6){
                    $model->keyword6 = $tag;
                }
                if($v == 7){
                    $model->keyword7 = $tag;
                }
                if($v == 8){
                    $model->keyword8 = $tag;
                }
                if($v == 9){
                    $model->keyword9 = $tag;
                }
                if($v == 10){
                    $model->keyword10 = $tag;
                }
                
            $v++;
            }
			
			
			//----颜色
            $model->metalColor = $_POST['Product']['metalColor'];
            $model->plasticColor = $_POST['Product']['plasticColor'];
            $model->designPrice = $_POST['Product']['designPrice'];
            $model->plasticPrice = $_POST['Product']['plasticPrice'];
            $model->metalPrice = $_POST['Product']['metalPrice'];
            if($_POST['Product']['metalColor'] != "" && $_POST['Product']['plasticColor'] != ""){
                $model->price = $_POST['Product']['metalPrice'] + $_POST['Product']['designPrice'];
            }
            if($_POST['Product']['metalColor'] != "" && $_POST['Product']['plasticColor'] == ""){
                $model->price = $_POST['Product']['metalPrice'] + $_POST['Product']['designPrice'];   
            }
            if($_POST['Product']['metalColor'] == "" && $_POST['Product']['plasticColor'] != ""){
                $model->price = $_POST['Product']['plasticPrice'] + $_POST['Product']['designPrice'];   
            }
			
			
			//上传3D模型功能  dk
            $three = CUploadedFile::getInstance($model, 'three_model');   //获得一个CUploadedFile的实例  
            if (is_object($three) && get_class($three) === 'CUploadedFile') {   // 判断实例化是否成功  
                 $model->three_model = './assets/three/'.time().'_'. $three->name;  //定义文件保存的名称  
            } else {
                $model->three_model = $product->three_model;   // 若果失败则应该是什么图片  
            }
			
			//上传3D模型附件 dj
            $annex_file = CUploadedFile::getInstance($model, 'dowload');   //获得一个CUploadedFile的实例  
            if (is_object($annex_file) && get_class($annex_file) === 'CUploadedFile') {   // 判断实例化是否成功  
                $model->dowload = './assets/annex/'.time().'_'.Yii::app()->user->id.'.rar' ;   //定义文件保存的名称  
            } else {
                $model->dowload = $product->dowload;   
            }
			
			$model->dowload_integral = $_POST['Product']['dowload_integral'];
			$model->dowload_type = $_POST['Product']['dowload_type'];
			
			
			//----描述
            $model->description = $_POST['description'];
			
			//----上下架
            if(isset($_POST['shelves'])){
                $model->shelves = $_POST['shelves'];
            }else{
                $model->shelves = 1;
            }
           
            $model->edit_uid = Yii::app()->user->id;
            $model->edit_time = date('Y-m-d H:i:s');

            if ($model->save()) {
				
                if (is_object($three) && get_class($three) === 'CUploadedFile') {
                    $three->saveAs($model->three_model);    // 上传3D模型  
                }
				
				if (is_object($annex_file) && get_class($annex_file) === 'CUploadedFile') {
                    $annex_file->saveAs($model->dowload);    // 上传3D模型附件  
                }

                $this->redirect(array('manage'));
            }
        }
		$this->pageTitle=Yii::app()->name.'-会员中心-修改模型';
        $this->render('update', array(
            'model' => $model,
			'category'=>$category,
			'picArray'=>$picArray,
        ));
    }



	public function actionAjaxDelete()//----ajax删除图片
	{		
			
            $model= ProductPhoto::model()->deleteAll("pic='".$_POST['fileName']."'");
            echo 200;
            
            

	}


    /**
     * Deletes a particular model.
     * If deletion is successful, the browser will be redirected to the 'admin' page.
     * @param integer $id the ID of the model to be deleted
     */
    public function actionDelete($id) {
        $uProduct = Product::model()->findByPk($id);
        $uProduct->delete();
        echo 200;
    }
	
	public function actionDeleteTags()
	{
		$model = Product::model()->findByPk($_POST['id']);
		
		$k = 'keyword'.$_POST['k'];
		
        $model->$k = "";
		$model->save();  
        echo 200;
	}

    /**
     * Lists all models.
     */
    public function actionIndex($id) {
		
		$this->layout = '//layouts/main';
        $userInfo = Customer::model()->findByPk($id);
        $product = Product::model()->findAll('add_uid=' . $id . ' AND stat=2 AND shelves=2 order by add_time desc');
		//----查询出博客
		$blog = BlogLog::model()->findAll('create_id=' . $id);
		
		
		$cter = new CDbCriteria;
        $cter->compare('add_uid',$id,true,'AND');
        $cter->compare('stat',2, false,'AND');
        $cter->compare('shelves',2, false);
        $p_count = Product::model()->count($cter); //----当前用户总数

		$this->pageTitle=Yii::app()->name.'-'.$userInfo->name.'-的3D模型商店';
        $this->render('index', array(
            'userInfo' => $userInfo,
            'product' => $product,
			'p_count' => $p_count,
			'blog' => $blog,
        ));
    }
    
    public function actionCategory($c='',$page=0){
        
        $cter = new CDbCriteria;
		$b = ','.$c.',';
        $cter->compare('category_id',$b,true,'AND');
        $cter->compare('stat',2, false,'AND');
        $cter->compare('shelves',2, false);

        $pageCount = Product::model()->count($cter); //----当前用户总数
        $cter->order = 'add_time DESC';
        $cter->limit = 40;
        $cter->offset = $page * 40;
        $product = Product::model()->findAll($cter);
        $pageALL = ceil($pageCount / 40);
        $category = Category::model()->findAll();
        
        if($c == 1){
                    $cter = new CDbCriteria;
                    $cter->compare('stat',2, false,'AND');
                    $cter->compare('shelves',2, false);
                    $pageCount = Product::model()->count($cter); //----当前用户总数
                    $cter->order = 'add_time DESC';
                    $cter->limit = 40;
                    $cter->offset = $page * 40;
                    $product = Product::model()->findAll($cter);
                    $pageALL = ceil($pageCount / 40);
                    $category = Category::model()->findAll();
        }
		$this->pageTitle=Yii::app()->name.'-商城-类别搜索';
        $this->render('category', array(
            'product' => $product,
            'category'=>$category,
            'onpage' => $page,
            'pageCount' => $pageCount,
            'pageALL' => $pageALL,
            'c' => $c,
        ));
        
    }

    public function actionManage($page = 0,$stat = '',$shelves='') {
        //----只查询出当前登录用户的模型
        $cter = new CDbCriteria;
        $cter->compare('add_uid', Yii::app()->user->id, false,'AND');
		
		$productPhoto = ProductPhoto::model()->findAll();
        
        if($stat != ''){
            $cter->compare('stat',$stat , false,'AND');
        }
        if($shelves != ''){
            $cter->compare('stat',$shelves , false);
        }   

        $pageCount = Product::model()->count($cter); //----当前用户总数
        $cter->order = 'edit_time DESC';
        $cter->limit = 10;
        $cter->offset = $page * 10;
        $dataProvider = Product::model()->findAll($cter);
        $pageALL = ceil($pageCount / 10);

        $category = Category::model()->findAll();
		$this->pageTitle=Yii::app()->name.'-会员中心-我的模型';
        $this->render('manage', array(
            'dataProvider' => $dataProvider,
            'category' => $category,
            'onpage' => $page,
            'pageCount' => $pageCount,
            'pageALL' => $pageALL,
            'action' => "index",
            'shelves'=>$shelves,
            'stat'=>$stat,
			'productPhoto' => $productPhoto,
        ));
    }
    
    
    public function actionVerify($page = 0) {
        //----只查询出当前登录用户的模型
        $cter = new CDbCriteria;
        $cter->compare('add_uid', Yii::app()->user->id, false);
        $cter->compare('stat', 1,false);

        $pageCount = Product::model()->count($cter); //----当前用户总数
        $cter->order = 'add_time DESC';
        $cter->limit = 10;
        $cter->offset = $page * 10;
        $dataProvider = Product::model()->findAll($cter);
        $pageALL = ceil($pageCount / 10);
		
		$productPhoto = ProductPhoto::model()->findAll();

        $category = Category::model()->findAll();
		$this->pageTitle=Yii::app()->name.'-会员中心-待审核模型';
        $this->render('verify', array(
            'dataProvider' => $dataProvider,
            'category' => $category,
            'onpage' => $page,
            'pageCount' => $pageCount,
            'pageALL' => $pageALL,
            'action' => "index",
			'productPhoto' => $productPhoto,
        ));
    }
    
    
    //---上架模型
    public function actionPUp($page = 0) {
        //----只查询出当前登录用户的模型
        $cter = new CDbCriteria;
        $cter->compare('add_uid', Yii::app()->user->id, false);
        $cter->compare('shelves',2,false);

        $pageCount = Product::model()->count($cter); //----当前用户总数
        $cter->order = 'add_time DESC';
        $cter->limit = 10;
        $cter->offset = $page * 10;
        $dataProvider = Product::model()->findAll($cter);
        $pageALL = ceil($pageCount / 10);
		
		$productPhoto = ProductPhoto::model()->findAll();

        $category = Category::model()->findAll();
		$this->pageTitle=Yii::app()->name.'-会员中心-已上架模型';
        $this->render('pUp', array(
            'dataProvider' => $dataProvider,
            'category' => $category,
            'onpage' => $page,
            'pageCount' => $pageCount,
            'pageALL' => $pageALL,
            'action' => "index",
			'productPhoto' => $productPhoto,
        ));
    }
    
    //下架模型
    public function actionPDown($page = 0) {
        //----只查询出当前登录用户的模型
        $cter = new CDbCriteria;
        $cter->compare('add_uid', Yii::app()->user->id, false);
        $cter->compare('stat',2,false);
        $cter->compare('shelves',1,false);

        $pageCount = Product::model()->count($cter); //----当前用户总数
        $cter->order = 'add_time DESC';
        $cter->limit = 10;
        $cter->offset = $page * 10;
        $dataProvider = Product::model()->findAll($cter);
        $pageALL = ceil($pageCount / 10);
		
		$productPhoto = ProductPhoto::model()->findAll();

        $category = Category::model()->findAll();
		$this->pageTitle=Yii::app()->name.'-会员中心-已下架模型';
        $this->render('pDown', array(
            'dataProvider' => $dataProvider,
            'category' => $category,
            'onpage' => $page,
            'pageCount' => $pageCount,
            'pageALL' => $pageALL,
            'action' => "index",
			'productPhoto' => $productPhoto,
        ));
    }
    
    //----被购买的次数
    public function actionPBuys($page = 0,$stat='2') {
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
        $this->render('pBuys', array(
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
    
	
	
	
	


    /**
     * Returns the data model based on the primary key given in the GET variable.
     * If the data model is not found, an HTTP exception will be raised.
     * @param integer $id the ID of the model to be loaded
     * @return Product the loaded model
     * @throws CHttpException
     */
    public function loadModel($id) {
        $model = Product::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }

    /**
     * Performs the AJAX validation.
     * @param Product $model the model to be validated
     */
    protected function performAjaxValidation($model) {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'product-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }

    public function actionComments() {

        $uid = $_POST['uid'];
        $pid = $_POST['pid'];
        $comment = $_POST['comment'];

        $model = new Comments;
        $model->p_id = $pid;
        $model->content = $comment;
        $model->add_id = $uid;
        $model->add_time = date('Y-m-d H:i:s', time());
        $model->add_name = Yii::app()->user->name;
        $model->stat = 1;
        $model->save();
        //$this->redirect(array('orderform','id'=>$order->id,));
        echo 200;
    }
    
    //搜索-pSearch， 这部分进行具体搜素操作，然后在views/product/pSearch.php中显示
    public function  actionpSearch(){
      $keyword = $_POST['keyword'];  // 来源： layouts/main.php,    input id="keyword" name="keyword"
        
        if($keyword == ""){
            $product = Product::model()->findAll('stat=2 AND shelves=2 order by add_time desc');
        }else{            
                //include "./utils/big2gb.php";  //用于简体繁体转换, 怎么检测输入是繁体还是简体？  
                //$obj=new big2gb;  
                //$keyword = $obj->chg_utfcode($keyword,'gb2312');     // 繁体 转 简体; 
                //$keyword = $obj->chg_utfcode($keyword,'big5');       // 简体 转 繁体

             $product = Product::model()->findAll('( name LIKE ' .  "'%" . $keyword .  "%'"  . 
                     'OR keyword1 LIKE ' .  "'%" . $keyword .  "%'"  . 
                     'OR keyword2 LIKE ' .  "'%" . $keyword .  "%'"  . 
                     'OR keyword3 LIKE ' .  "'%" . $keyword .  "%'"  . 
                     'OR keyword4 LIKE ' .  "'%" . $keyword .  "%'"  . 
                     'OR keyword5 LIKE ' .  "'%" . $keyword .  "%'"  . 
                     'OR keyword6 LIKE ' .  "'%" . $keyword .  "%'"  . 
                     'OR keyword7 LIKE ' .  "'%" . $keyword .  "%'"  . 
                     'OR keyword8 LIKE ' .  "'%" . $keyword .  "%'"  . 
                     'OR keyword9 LIKE ' .  "'%" . $keyword .  "%'"  . 
                     'OR keyword10 LIKE ' .  "'%" . $keyword .  "%'"  . 
                     'OR tag LIKE ' .  "'%" . $keyword .  "%'"  . 
                     'OR three_model LIKE ' .  "'%" . $keyword .  "%'"  . 
                     'OR description LIKE ' .  "'%" . $keyword .  "%' )"  . 
                     'AND stat=2 AND shelves=2 order by add_time desc');   // 检索中文  '%中文%'
                
        }
       $category = Category::model()->findAll();
  
        $this->pageTitle=Yii::app()->name.'-商城-模型搜索';
        $this->render('pSearch', array(
            'product' => $product,
            'category'=>$category,
            'c'=>$keyword,
        ));

    }   // actionpSearch() 结束
    

    
    //通过3D模型搜索类似模型
    public function  action3dSearch(){
		
		if(isset($_POST['p_id'])){
			$keyword = $_POST['keyword1'];  // 来源： layouts/main.php,    input id="keyword" name="keyword"
			$p_id = $_POST['p_id'];
			$p_product = Product::model()->findByPk($p_id);
			$user = Customer::model()->findByPk($p_product->add_uid);
			$productPhoto = ProductPhoto::model()->findAll('p_id='.$p_id);	
			$category = Category::model()->findAll();
			
			$cter = new CDbCriteria;
			if($keyword != ""){
				$cter->compare('name',$keyword,true,'OR');
				$cter->compare('keyword1',$keyword,true,'OR');
				$cter->compare('keyword2',$keyword,true,'OR');
				$cter->compare('keyword3',$keyword,true,'OR');
				$cter->compare('keyword4',$keyword,true,'OR');
				$cter->compare('keyword5',$keyword,true,'OR');
				$cter->compare('keyword6',$keyword,true,'OR');
				$cter->compare('keyword7',$keyword,true,'OR');
				$cter->compare('keyword8',$keyword,true,'OR');
				$cter->compare('keyword9',$keyword,true,'OR');
				$cter->compare('keyword10',$keyword,true,'OR');	
			}
			if($p_product->keyword2 != ""){
				$cter->compare('name',$p_product->keyword2,true,'OR');
				$cter->compare('keyword1',$p_product->keyword2,true,'OR');
				$cter->compare('keyword2',$p_product->keyword2,true,'OR');
				$cter->compare('keyword3',$p_product->keyword2,true,'OR');
				$cter->compare('keyword4',$p_product->keyword2,true,'OR');
				$cter->compare('keyword5',$p_product->keyword2,true,'OR');
				$cter->compare('keyword6',$p_product->keyword2,true,'OR');
				$cter->compare('keyword7',$p_product->keyword2,true,'OR');
				$cter->compare('keyword8',$p_product->keyword2,true,'OR');
				$cter->compare('keyword9',$p_product->keyword2,true,'OR');
				$cter->compare('keyword10',$p_product->keyword2,true,'OR');	
			}
			if($p_product->keyword3 != ""){
				$cter->compare('name',$p_product->keyword3,true,'OR');
				$cter->compare('keyword1',$p_product->keyword3,true,'OR');
				$cter->compare('keyword2',$p_product->keyword3,true,'OR');
				$cter->compare('keyword3',$p_product->keyword3,true,'OR');
				$cter->compare('keyword4',$p_product->keyword3,true,'OR');
				$cter->compare('keyword5',$p_product->keyword3,true,'OR');
				$cter->compare('keyword6',$p_product->keyword3,true,'OR');
				$cter->compare('keyword7',$p_product->keyword3,true,'OR');
				$cter->compare('keyword8',$p_product->keyword3,true,'OR');
				$cter->compare('keyword9',$p_product->keyword3,true,'OR');
				$cter->compare('keyword10',$p_product->keyword3,true,'OR');	
			}
			if($p_product->keyword4 != ""){
				$cter->compare('name',$p_product->keyword4,true,'OR');
				$cter->compare('keyword1',$p_product->keyword4,true,'OR');
				$cter->compare('keyword2',$p_product->keyword4,true,'OR');
				$cter->compare('keyword3',$p_product->keyword4,true,'OR');
				$cter->compare('keyword4',$p_product->keyword4,true,'OR');
				$cter->compare('keyword5',$p_product->keyword4,true,'OR');
				$cter->compare('keyword6',$p_product->keyword4,true,'OR');
				$cter->compare('keyword7',$p_product->keyword4,true,'OR');
				$cter->compare('keyword8',$p_product->keyword4,true,'OR');
				$cter->compare('keyword9',$p_product->keyword4,true,'OR');
				$cter->compare('keyword10',$p_product->keyword4,true,'OR');	
			}
			if($p_product->keyword5 != ""){
				$cter->compare('name',$p_product->keyword5,true,'OR');
				$cter->compare('keyword1',$p_product->keyword5,true,'OR');
				$cter->compare('keyword2',$p_product->keyword5,true,'OR');
				$cter->compare('keyword3',$p_product->keyword5,true,'OR');
				$cter->compare('keyword4',$p_product->keyword5,true,'OR');
				$cter->compare('keyword5',$p_product->keyword5,true,'OR');
				$cter->compare('keyword6',$p_product->keyword5,true,'OR');
				$cter->compare('keyword7',$p_product->keyword5,true,'OR');
				$cter->compare('keyword8',$p_product->keyword5,true,'OR');
				$cter->compare('keyword9',$p_product->keyword5,true,'OR');
				$cter->compare('keyword10',$p_product->keyword5,true,'OR');	
			}
			if($p_product->keyword6 != ""){
				$cter->compare('name',$p_product->keyword6,true,'OR');
				$cter->compare('keyword1',$p_product->keyword6,true,'OR');
				$cter->compare('keyword2',$p_product->keyword6,true,'OR');
				$cter->compare('keyword3',$p_product->keyword6,true,'OR');
				$cter->compare('keyword4',$p_product->keyword6,true,'OR');
				$cter->compare('keyword5',$p_product->keyword6,true,'OR');
				$cter->compare('keyword6',$p_product->keyword6,true,'OR');
				$cter->compare('keyword7',$p_product->keyword6,true,'OR');
				$cter->compare('keyword8',$p_product->keyword6,true,'OR');
				$cter->compare('keyword9',$p_product->keyword6,true,'OR');
				$cter->compare('keyword10',$p_product->keyword6,true,'OR');	
			}
			if($p_product->keyword7 != ""){
				$cter->compare('name',$p_product->keyword7,true,'OR');
				$cter->compare('keyword1',$p_product->keyword7,true,'OR');
				$cter->compare('keyword2',$p_product->keyword7,true,'OR');
				$cter->compare('keyword3',$p_product->keyword7,true,'OR');
				$cter->compare('keyword4',$p_product->keyword7,true,'OR');
				$cter->compare('keyword5',$p_product->keyword7,true,'OR');
				$cter->compare('keyword6',$p_product->keyword7,true,'OR');
				$cter->compare('keyword7',$p_product->keyword7,true,'OR');
				$cter->compare('keyword8',$p_product->keyword7,true,'OR');
				$cter->compare('keyword9',$p_product->keyword7,true,'OR');
				$cter->compare('keyword10',$p_product->keyword7,true,'OR');	
			}
			if($p_product->keyword8 != ""){
				$cter->compare('name',$p_product->keyword8,true,'OR');
				$cter->compare('keyword1',$p_product->keyword8,true,'OR');
				$cter->compare('keyword2',$p_product->keyword8,true,'OR');
				$cter->compare('keyword3',$p_product->keyword8,true,'OR');
				$cter->compare('keyword4',$p_product->keyword8,true,'OR');
				$cter->compare('keyword5',$p_product->keyword8,true,'OR');
				$cter->compare('keyword6',$p_product->keyword8,true,'OR');
				$cter->compare('keyword7',$p_product->keyword8,true,'OR');
				$cter->compare('keyword8',$p_product->keyword8,true,'OR');
				$cter->compare('keyword9',$p_product->keyword8,true,'OR');
				$cter->compare('keyword10',$p_product->keyword8,true,'OR');	
			}
			if($p_product->keyword9 != ""){
				$cter->compare('name',$p_product->keyword9,true,'OR');
				$cter->compare('keyword1',$p_product->keyword9,true,'OR');
				$cter->compare('keyword2',$p_product->keyword9,true,'OR');
				$cter->compare('keyword3',$p_product->keyword9,true,'OR');
				$cter->compare('keyword4',$p_product->keyword9,true,'OR');
				$cter->compare('keyword5',$p_product->keyword9,true,'OR');
				$cter->compare('keyword6',$p_product->keyword9,true,'OR');
				$cter->compare('keyword7',$p_product->keyword9,true,'OR');
				$cter->compare('keyword8',$p_product->keyword9,true,'OR');
				$cter->compare('keyword9',$p_product->keyword9,true,'OR');
				$cter->compare('keyword10',$p_product->keyword9,true,'OR');	
			}
			if($p_product->keyword10 != ""){
				$cter->compare('name',$p_product->keyword10,true,'OR');
				$cter->compare('keyword1',$p_product->keyword10,true,'OR');
				$cter->compare('keyword2',$p_product->keyword10,true,'OR');
				$cter->compare('keyword3',$p_product->keyword10,true,'OR');
				$cter->compare('keyword4',$p_product->keyword10,true,'OR');
				$cter->compare('keyword5',$p_product->keyword10,true,'OR');
				$cter->compare('keyword6',$p_product->keyword10,true,'OR');
				$cter->compare('keyword7',$p_product->keyword10,true,'OR');
				$cter->compare('keyword8',$p_product->keyword10,true,'OR');
				$cter->compare('keyword9',$p_product->keyword10,true,'OR');
				$cter->compare('keyword10',$p_product->keyword10,true,'OR');	
			}
			if($p_product->name != ""){
				$cter->compare('name',$p_product->name,true,'OR');
				$cter->compare('keyword1',$p_product->name,true,'OR');
				$cter->compare('keyword2',$p_product->name,true,'OR');
				$cter->compare('keyword3',$p_product->name,true,'OR');
				$cter->compare('keyword4',$p_product->name,true,'OR');
				$cter->compare('keyword5',$p_product->name,true,'OR');
				$cter->compare('keyword6',$p_product->name,true,'OR');
				$cter->compare('keyword7',$p_product->name,true,'OR');
				$cter->compare('keyword8',$p_product->name,true,'OR');
				$cter->compare('keyword9',$p_product->name,true,'OR');
				$cter->compare('keyword10',$p_product->name,true,'OR');	
			}
			
			$cter->compare('shelves',2, false);
			$pageCount = Product::model()->count($cter); //----当前用户总数
			$page = 0;
			$cter->order = 'add_time DESC';
			$cter->limit = 100;
			$cter->offset = $page * 100;
			$product = Product::model()->findAll($cter);
			$pageALL = ceil($pageCount / 100);
			
			
			$this->pageTitle=Yii::app()->name.'-商城-相似模型';
			$this->render('3dSearch', array(
				'product' => $product,
				'self'=>$p_product,
				'selfPhoto'=>$productPhoto,
				'user'=>$user,
				'category'=>$category,
			));
		}else{
			$this->redirect(array('/site/index'));
		}
    }
	
	//----上传图片
	public function actionUpload()
    {
          $dest_folder = Yii::app()->basePath."/../assets/upfile/";
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
	
    
}
