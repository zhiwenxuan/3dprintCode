<?php

class BlogLogController extends Controller
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
				'actions'=>array('index','view','bSearch','blog_left','tags'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update','upload','delete'),
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


	public function loadModel($id) {
        $model = BlogLog::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }


	//----新建博客
	public function actionCreate() {
		
		$model = new BlogLog;
		$tags = BlogTags::model()->findAll();
		$this->pageTitle=Yii::app()->name.'-博客-发布博客';
				
		if(isset($_POST['title']))
		{	
			
			$model->title = $_POST['title'];
			$model->tags = $_POST['tags'];
			$model->pic = $_POST['pic'];
			$model->stat = 1;
			$model->description = $_POST['description'];
			$model->content = $_POST['content'];
			$model->create_id = Yii::app()->user->id;
			$model->create_time = date('Y-m-d H:i:s');
			if($model->save()){
				$this->redirect(array('/customer/account'));
			}
		}
        $this->render('create', array(
			'model' => $model,
			'tags'=>$tags,
        ));
    }
	
	//----查看博客
	public function actionView($id ,$t) {

		$blogTags = BlogTags::model()->findAll();

		$model = BlogLog::model()->findByPk($id);
		$model->read = $model->read + 1;
		$model->save();
		
		$hot = new CDbCriteria;
        $hot->compare('stat',1, false);
        $hot->order = 'top DESC';
        $hot->limit = 10;
        $hotBlog = BlogLog::model()->findAll($hot);//----当前博客总内容
		$this->pageTitle=Yii::app()->name.'-博客-DDAYIN博客园';
        $this->render('view', array(
            'model' => $model,
			'blogTags'=>$blogTags,
			'hotBlog'=>$hotBlog,
        ));
    }
	
	
	//----修改博客
	public function actionUpdate($id){
		$model = BlogLog::model()->findByPk($id);
		$tags = BlogTags::model()->findAll();
		$this->pageTitle=Yii::app()->name.'-博客-修改博客';
				
		if(isset($_POST['title']))
		{	
			
			$model->title = $_POST['title'];
			$model->tags = $_POST['tags'];
			$model->pic = $_POST['pic'];
			$model->description = $_POST['description'];
			$model->content = $_POST['content'];
			$model->edit_time = date('Y-m-d H:i:s');
			if($model->save()){
				$this->redirect(array('/customer/account'));
			}
		}
        $this->render('update', array(
			'model' => $model,
			'tags'=>$tags,
        ));	
	}
	

	public function actionDelete()
	{
		$blog = BlogLog::model()->findByPk($_POST['id']);
		$blog->delete(); 
		echo 200;
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex($page = 0,$s_title='')
	{


		$title = $s_title;
		$this->pageTitle=Yii::app()->name.'-博客-DDAYIN博客园';
		//----获得分页
		$cter = new CDbCriteria;
        $cter->compare('stat',2, false);
        $pageCount = BlogLog::model()->count($cter); //----当前博客总数
        $cter->order = 'create_time DESC';
        $cter->limit = 10;
        $cter->offset = $page * 10;
        $Blog = BlogLog::model()->findAll($cter);//----当前博客总内容
        $pageALL = ceil($pageCount/10);
		
		//----获得热门博客10篇
		$hot = new CDbCriteria;
        $hot->compare('stat',1, false);
        $hot->order = 'top DESC';
        $hot->limit = 10;
        $hotBlog = BlogLog::model()->findAll($hot);//----当前博客总内容

		
		
		
		$dataProvider=new CActiveDataProvider('BlogLog');
		$blogInfo = BlogLog::model()->findAll();
		$blogTags = BlogTags::model()->findAll();//----所有分类
		
		//$blogRead = BlogRead::model()->findAll();
		
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
			'blogInfo'=>$blogInfo,
			'blogTags'=>$blogTags,
			'onpage' => $page,
            'pageCount' => $pageCount,
            'pageALL' => $pageALL,
			'blog' => $Blog,
			'type'=>'index',
			'title'=>$title,
			'hotBlog'=>$hotBlog,
			
		));
		
	}
	
	//----文章查询
	public function actionBSearch($page = 0,$s_title='')
	{
		$this->pageTitle=Yii::app()->name.'-博客-DDAYIN博客园';
		if(isset($_POST['name'])){
			$title = $_POST['name'];
		}else{
			$title = $s_title;
		}
		//----获得分页	
		$cter = new CDbCriteria;
        $cter->compare('title',$title, true);
        $pageCount = BlogLog::model()->count($cter); //----当前博客总数
        $cter->order = 'create_time DESC';
        $cter->limit = 10;
        $cter->offset = $page * 10;
        $Blog = BlogLog::model()->findAll($cter);//----当前博客总内容
        $pageALL = ceil($pageCount/10);
	
		//----获得热门博客10篇
		$hot = new CDbCriteria;
        $hot->compare('stat',1, false);
        $hot->order = 'top DESC';
        $hot->limit = 10;
        $hotBlog = BlogLog::model()->findAll($hot);//----当前博客总内容
		
		
		
		$dataProvider=new CActiveDataProvider('BlogLog');
		$blogInfo = BlogLog::model()->findAll();
		$blogTags = BlogTags::model()->findAll();
		
		//$blogRead = BlogRead::model()->findAll();
		
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
			'blogInfo'=>$blogInfo,
			'blogTags'=>$blogTags,
			'onpage' => $page,
            'pageCount' => $pageCount,
            'pageALL' => $pageALL,
			'blog' => $Blog,
			'type'=>'bSearch',
			'title'=>$title,
			'hotBlog'=>$hotBlog,
		));
		
	}
	
	
	
	public function actionAdmin() {
        $model = new BlogLog('search');
        $model->unsetAttributes();  // clear any default values
        if (isset($_GET['BlogLog']))
            $model->attributes = $_GET['BlogLog'];

        $this->render('admin', array(
            'model' => $model,
        ));
    }
	
	public function actionTags($c='',$page=0){
		
		$cter = new CDbCriteria;
        $cter->compare('tags',$c, true,'AND');
        $cter->compare('stat',2, false,'AND');
        $pageCount = BlogLog::model()->count($cter); //----当前用户总数
        $cter->order = 'create_time DESC';
        $cter->limit = 10;
        $cter->offset = $page * 10;
        $blog = BlogLog::model()->findAll($cter);
        $pageALL = ceil($pageCount / 10);
		
		//----获得热门博客10篇
		$hot = new CDbCriteria;
        $hot->compare('stat',1, false);
        $hot->order = 'top DESC';
        $hot->limit = 10;
        $hotBlog = BlogLog::model()->findAll($hot);//----当前博客总内容
		

		$blogTags = BlogTags::model()->findAll();
        $this->render('tags', array(
            'blog'=>$blog,
            'onpage' => $page,
            'pageCount' => $pageCount,
            'pageALL' => $pageALL,
            'c' => $c,
			'blogTags'=>$blogTags,
			'hotBlog'=>$hotBlog,
			'type'=>'tags',
        ));	
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



}
