<?php

class CustomerController extends Controller {

    public $layout = '//layouts/column1';

    public function filters() {
        return array(
            'accessControl', // perform access control for CRUD operations
            'postOnly + delete', // we only allow deletion via POST request
        );
    }

    public function accessRules() {
        return array(
            array('allow', // allow all users to perform 'index' and 'view' actions
                'actions' => array('register', 'login', 'captcha'),
                'users' => array('*'),
            ),
            array('allow', // allow authenticated user to perform 'create' and 'update' actions
                'actions' => array('index', '_register', 'account', 'left', 'edit', 'pwd', 'logout','download','upload'),
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

    public function actionAccount() {

        $id = Yii::app()->user->id;
        $dataProvider = Customer::model()->findByPk($id);

        if (Yii::app()->user->isGuest) {
            $this->actionLogin();
        }
		$this->pageTitle=Yii::app()->name.'-会员中心';
        $this->render('account', array(
            'dataProvider' => $dataProvider,
        ));
    }

    public function actionLogin() {
		
		if(isset($_POST['LoginForm']['password'])){
			 $cookie = new CHttpCookie('mycookie',$_POST['LoginForm']['password']);
			 $cookie->expire = time()+60*60*24*30;  //有限期30天
			 Yii::app()->request->cookies['mycookie']=$cookie;
		}
		
        $model = new LoginForm;
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'login-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }

        if (isset($_POST['LoginForm'])) {

            $model->attributes = $_POST['LoginForm'];
            if ($model->validate() && $model->login())
                $this->redirect(Yii::app()->user->returnUrl);

        }

		$this->pageTitle=Yii::app()->name.'-用户登录';
        $this->render('login', array('model' => $model));
    }

    public function actionLogout() {

        Yii::app()->user->logout();
        $this->redirect(array('site/index'));
    }

    public function actionRegister() {
        $model = new Customer('register');
		
		$imodel = new Integral;

        if (isset($_POST['Customer'])) {
            // 收集用户输入的数据
            $model->attributes = $_POST['Customer'];
            if ($model->validate(array('name', 'password', 'email', 'verifyPassword', 'verifyCode'))) {
                $model->date_added = new CDbExpression('NOW()');
                // save user registration
                $password = $model->password;
                $name = $model->name;
				$email = $_POST['Customer']['email'];
				$userInfo = $name.'_'.$email.'_'.$password;
				$cookie = new CHttpCookie('myInfo',$userInfo);
			    $cookie->expire = time()+60*60*24*30;  //有限期30天
			    Yii::app()->request->cookies['myInfo']=$cookie;
                $model->password = md5($model->password);
                $model->pic = "./assets/userLogo/default.png";
				$model->integral = 100;
                if ($model->save(false)) {
					//----积分明细
					$imodel->u_id = $model->id;
					$imodel->num = 100;
					$imodel->type = 1;//----注册得到积分
					$imodel->ad_time = date('Y-m-d H:i:s', time());
					$imodel->save(false);
                    $umodel = new LoginForm;
                    $umodel->username = $name;
                    $umodel->password = $password;
                    if($umodel->login()){
						$this->redirect(array('site/index'));
					}

                }
            }
        }
		$this->pageTitle=Yii::app()->name.'-用户注册';
        $this->render('register', array('model' => $model));
    }

	

    //----修改账户信息
    public function actionEdit($id) {
		$this->pageTitle=Yii::app()->name.'-会员中心-修改会员信息';
        $model = $this->loadModel($id);
        $dataProvider = Customer::model()->findByPk($id);
        if (isset($_POST['Customer'])) {

            $model->attributes = $_POST['Customer'];
			$model->description = $_POST['Customer']['description'];
			$model->banner = $_POST['Customer']['userbg'];
			$model->diyimg = $_POST['Customer']['diyuserbg'];
            $model->pic = $_POST['Customer']['pic'];
            //上传头像功能
            $file = CUploadedFile::getInstance($model, 'pic');   //获得一个CUploadedFile的实例  
            if (is_object($file) && get_class($file) === 'CUploadedFile') {   // 判断实例化是否成功  
                $model->pic = './assets/userLogo/file_' . time() . '_' . rand(0, 9999) . '.' . $file->extensionName;   //定义文件保存的名称  
            } else {
                $model->pic = $dataProvider->pic;   // 若果失败则应该是什么图片  
            }



            if ($model->isDirty()) {
                if ($model->validate(array('name'))) {
                    $model->date_modified = new CDbExpression('NOW()');

                    if ($model->save(false)) {

                        if (is_object($file) && get_class($file) === 'CUploadedFile') {
                            $file->saveAs($model->pic);    // 上传图片  
                        }
                        $dataProvider = Customer::model()->findByPk($id);
                        $this->render('account', array(
                            'dataProvider' => $dataProvider,
                        )); //页面传值
                        Yii::app()->end();
                    }
                }
            } else {
                if (is_object($file) && get_class($file) === 'CUploadedFile') {
                    $file->saveAs($model->pic);    // 上传图片  
                }
                $this->redirect(array('customer/account', 'id' => $model->id));
            }
        }

        $this->render('_register', array(
            'model' => $model,
        ));
    }

    //----修改账户密码
    public function actionPwd($id) {
		$this->pageTitle=Yii::app()->name.'-会员中心-修改密码';
        $model = $this->loadModel($id);
        if (isset($_POST['Customer'])) {
            $model->attributes = $_POST['Customer'];

            $model->password = md5($_POST['Customer']['newpassword']);
            $model->date_modified = new CDbExpression('NOW()');
            $dataProvider = Customer::model()->findByPk($id);
            if ($model->save()) {
                $this->render('account', array(
                    'dataProvider' => $dataProvider,
                ));
                Yii::app()->end();
            }
        }
        $this->render('pwd', array('model' => $model,));
    }

    public function loadModel($id) {
        $model = Customer::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }

    protected function performAjaxValidation($model) {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'order-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }

    public function actions() {//----验证码
        return array(
            // captcha action renders the CAPTCHA image displayed on the contact page
            'captcha' => array(
                'class' => 'CCaptchaAction',
                'backColor' => 0xFFFFFF, //背景颜色
                'minLength' => 4, //最短为4位
                'maxLength' => 4, //是长为4位
                'transparent' => true, //显示为透明
            ),
        );
    }
	
	public function actionDownload(){
		
		$Customer = Customer::model()->findByPk($_POST['uid']);				
		$Customer->integral = $Customer->integral - $_POST['num'];
		$addUser = Customer::model()->findByPk($_POST['add_id']);
		$addUser->integral = $addUser->integral + $_POST['num'];	
		$addUser->update();
		if($Customer->update()){
			echo 200;
		
		$download = new Download;
		$download->u_id = $_POST['uid'];
		$download->p_id = $_POST['p_id'];
		$download->download = $_POST['url'];
		$download->add_id = $_POST['add_id'];
		$download->integral = $_POST['num'];
		$download->add_name = $_POST['p_name'];
		$download->pic = $_POST['p_pic'];
		$download->add_time = date('Y-m-d H:i:s', time());
		$download->save();
		
		}	
		
	}
	
	
	//----上传图片
	public function actionUpload()
    {
          $dest_folder = Yii::app()->basePath."/../assets/userbg/";
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
