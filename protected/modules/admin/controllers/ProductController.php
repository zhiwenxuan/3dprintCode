<?php

class ProductController extends Controller
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
				'actions'=>array(''),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update','index','view','admin','delete','upload','ajaxDelete','cleanUg','deleteTags'),
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
		$model=new Product;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Product']))
		{
			$model->attributes=$_POST['Product'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
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
		$this->pageTitle= '后台管理系统 - 模型中心 - 模型管理 - 编辑模型 - DDAYIN.COM';
		$model=$this->loadModel($id);
		$p_id = $id;
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);
		
		$cate=new CDbCriteria;  
		$cate->order='parent_id ASC';  
		$category = Category::model()->findAll($cate);//查询出所有类别
		$picArray = ProductPhoto::model()->findAll('p_id='.$id);//查询出所有该产品的图片
		$product = Product::model()->findByPk($id);
		
		if(isset($_POST['Product']))
		{
			$model->attributes=$_POST['Product'];
			$model->description = $_POST['description'];
			//----分类数据
			$categoryArray =  implode(",",$_POST['category']);
			$model->category_id = ','.$categoryArray.',';
			$model->similarList = $_POST['Product']['similarList'];
			
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
			
			$model->edit_uid = Yii::app()->user->id;
			$model->edit_time = date('Y-m-d H:i:s', time());
			
			
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
			
			//----推荐商品
			$model->push = $_POST['push'];
			
			//----设计费
			$model->designPrice = $_POST['Product']['designPrice'];
	
			//----图片数据
			if($_POST['fileNameArray'] != ""){
				$fileName = explode(",",$_POST['fileNameArray']);
				foreach($fileName as $f){
					$ProductPhoto = new ProductPhoto;
					$ProductPhoto->p_id = $p_id;
					$ProductPhoto->pic = $f;
					$ProductPhoto->add_id = Yii::app()->user->id;
					$ProductPhoto->add_time = date('Y-m-d H:i:s', time());
					$ProductPhoto->save();
				}
			}
			
			//----上下架
            if(isset($_POST['Product']['shelves'])){
                $model->shelves = $_POST['Product']['shelves'];
            }else{
                $model->shelves = 1;
            }
			
			
			if($model->save()){
				
				if (is_object($three) && get_class($three) === 'CUploadedFile') {
                    $three->saveAs($model->three_model);    // 上传3D模型  
                }
				
				if (is_object($annex_file) && get_class($annex_file) === 'CUploadedFile') {
                    $annex_file->saveAs($model->dowload);    // 上传3D模型附件  
                }
				
				 $this->redirect(array('admin'));	
			}
				
		}

		$this->render('update',array(
			'model'=>$model,
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
	public function actionDelete()
	{
		$model = Product::model()->findByPk($_POST['id']);
		$model->delete();
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
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('Product');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin($page = 0,$stat="",$shelves='',$id='',$addUser='')
	{
		$this->pageTitle= '后台管理系统 - 模型中心 - 模型管理 - DDAYIN.COM';
		$cter = new CDbCriteria;
                //---------------------------------下拉查询
                if(isset($_POST['stat'])){
                    if($_POST['stat'] != "" || $_POST['shelves'] != ''){
                          $cter->compare('stat',$_POST['stat'], false,'AND');
                          $cter->compare('shelves', $_POST['shelves'], false);
                          $stat = $_POST['stat'];
                          $shelves = $_POST['shelves'];
                     }
                }


                 if($stat != "" || $shelves != ""){
                    $cter->compare('stat',$stat, false,'AND');
                    $cter->compare('shelves', $shelves, false);
                 
                 }
                 //------------------------------------提交查询
                 if(isset($_POST['id'])){
                    if($_POST["id"] != ""){
                        $cter->compare('id',$_POST['id'],true,'AND');
                        $id = $_POST['id'];
                    }
                    if($_POST['addUser'] != ""){
                        $user = Customer::model()->find('name="'.$_POST['addUser'].'"');
                        if($user){
                            $cter->compare('add_uid', $user->id,true,'AND');
                        }
                        $addUser = $_POST['addUser'];
                    }
                   
                 }

                 if($id != ''){
                      $cter->compare('id',$id,true,'AND');  
                 }
                 if($addUser != ""){
                      $user = Customer::model()->find('name="'.$addUser.'"');
                      if($user){
                        $cter->compare('add_uid',$user->id,true,'AND');  
                      }
                 }
                


                $pageCount = Product::model()->count($cter); //----当前用户总数
                $cter->order = 'id ASC';
                $cter->limit = 30;
                $cter->offset = $page * 30;
                $model = Product::model()->findAll($cter);
                $pageALL = ceil($pageCount / 30);
                //$model = Customer::model()->findAll();

                $amodel = Address::model()->findAll();
                $this->render('admin', array(
                    'model' => $model,
                    'onpage' => $page,
                    'pageCount' => $pageCount,
                    'pageALL' => $pageALL,
                    'amodel' => $amodel,
                    'stat' => $stat,
                    'shelves' => $shelves,
                    'id' => $id,
                    'addUser' => $addUser,
                ));
	}

	
    
        
        
        
	public function loadModel($id)
	{
		$model=Product::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Product $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='product-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
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
	
	//----清理图片
	public function actionCleanUG()
	{
		$cts_del = 0;

		$imgs = scandir(Yii::app()->basePath."/../assets/upfile/");
		$ilen = count($imgs);
		if($ilen>3)
		{
			for($i=2;$i<$ilen-1;$i++)
			{
				if(!ProductPhoto::model()->exists("pic='".$imgs[$i]."'"))
				{
					unlink(Yii::app()->basePath."/../assets/upfile/".$imgs[$i]);
					$cts_del++;
				}
			}
		}
		$this->redirect(array('product/admin','result'=>0,'msg'=>'一共清理了 '.$cts_del.' 个图片信息'));
		
	}
	
	
	
}
