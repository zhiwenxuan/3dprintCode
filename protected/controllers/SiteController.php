<?php

class SiteController extends Controller {

    /**
     * Declares class-based actions.
     */
    public $layout = '//layouts/column1';

    public function actions() {
        return array(
            // captcha action renders the CAPTCHA image displayed on the contact page
            'captcha' => array(
                'class' => 'CCaptchaAction',
                'backColor' => 0xFFFFFF,
            ),
            // page action renders "static" pages stored under 'protected/views/site/pages'
            // They can be accessed via: index.php?r=site/page&view=FileName
            'page' => array(
                'class' => 'CViewAction',
            ),
        );
    }

    /**
     * This is the default 'index' action that is invoked
     * when an action is not explicitly requested by users.
     */
    public function actionIndex() {
        // renders the view file 'protected/views/site/index.php'
        // using the default layout 'protected/views/layouts/main.php'
        $this->pageTitle = Yii::app()->name . ' | 专业3D打印服务';

        $this->render('index');
    }

    public function actionOnline() {
		$this->layout = '//layouts/main';
		$pwd = '';
		if(Yii::app()->user->isGuest == false){
			$id = Yii::app()->user->id;
			$userInfo = Customer::model()->findByPk($id);
			$pwd = $userInfo->password;
		}
        $this->pageTitle = Yii::app()->name . '-创作中心';
        $this->render('online',array(
			'pwd' => $pwd,
		));
    }

    public function actionDesignAPP() {
        // renders the view file 'protected/views/site/index.php'
        // using the default layout 'protected/views/layouts/main.php'
        $this->pageTitle = Yii::app()->name . '-3D设计软件';
        $this->render('designAPP');
    }

    public function actionAbout() {
        // renders the view file 'protected/views/site/index.php'
        // using the default layout 'protected/views/layouts/main.php'
        $this->pageTitle = Yii::app()->name . '-关于我们';
        $this->render('about');
    }

    public function actionContactUs() {
        $this->pageTitle = Yii::app()->name . '-联系我们';
        $this->render('contactUs');
    }

    public function actionBusiness() {
        $this->pageTitle = Yii::app()->name . '-公司业务';
        $this->render('business');
    }

    public function action3Dprint() {
        $this->pageTitle = Yii::app()->name . '-3D打印';
        $this->render('3Dprint');
    }

    public function actionAgreement() {
        $this->pageTitle = Yii::app()->name . '-帮助';
        $this->render('agreement');
    }
    
    public function actionPartners() {
        $this->pageTitle = Yii::app()->name . '-合作伙伴';
        $this->render('partners');
    }
    
    public function actionSupport() {
        $this->pageTitle = Yii::app()->name . '-客户支持';
        $this->render('support');
    }
   
    public function actionCourse() {
        $this->pageTitle = Yii::app()->name . '-使用教程';
        $this->render('course');
    }
    
    public function actionUsing() {
        $this->pageTitle = Yii::app()->name . '-购买需知';
        $this->render('using');
    }
    
    public function actionProblem() {
        $this->pageTitle = Yii::app()->name . '-常见问题';
        $this->render('problem');
    }

    /**
     * This is the action to handle external exceptions.
     */
    public function actionError() {
        if ($error = Yii::app()->errorHandler->error) {
            if (Yii::app()->request->isAjaxRequest)
                echo $error['message'];
            else
                $this->render('error', $error);
        }
    }

    /**
     * Displays the contact page
     */
    public function actionContact() {
        $model = new ContactForm;
        if (isset($_POST['ContactForm'])) {
            $model->attributes = $_POST['ContactForm'];
            if ($model->validate()) {
                $name = '=?UTF-8?B?' . base64_encode($model->name) . '?=';
                $subject = '=?UTF-8?B?' . base64_encode($model->subject) . '?=';
                $headers = "From: $name <{$model->email}>\r\n" .
                        "Reply-To: {$model->email}\r\n" .
                        "MIME-Version: 1.0\r\n" .
                        "Content-type: text/plain; charset=UTF-8";

                mail(Yii::app()->params['adminEmail'], $subject, $model->body, $headers);
                Yii::app()->user->setFlash('contact', 'Thank you for contacting us. We will respond to you as soon as possible.');
                $this->refresh();
            }
        }
        $this->render('contact', array('model' => $model));
    }

    /**
     * Displays the login page
     */
    public function actionLogin() {
        $this->pageTitle = Yii::app()->name . '-用户登录';
        $model = new LoginForm;
        // if it is ajax validation request
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'login-form') {
			
			$model->username = $_POST['LoginForm_username'];
			$model->password = $_POST['LoginForm_password'];
			//echo CActiveForm::validate($model);
			
			if ($model->validate() && $model->login()){
				echo 200;
			}
			
            //echo CActiveForm::validate($model);
            Yii::app()->end();
        }

        // collect user input data
        if (isset($_POST['LoginForm'])) {	
            $model->attributes = $_POST['LoginForm'];
            // validate user input and redirect to the previous page if valid
            if ($model->validate() && $model->login())
                $this->redirect(Yii::app()->user->returnUrl);
        }
		
        // display the login form
        $this->render('login', array('model' => $model));
    }

    /**
     * Logs out the current user and redirect to homepage.
     */
    public function actionLogout() {
        Yii::app()->user->logout();
        $this->redirect(Yii::app()->homeUrl);
    }

}
