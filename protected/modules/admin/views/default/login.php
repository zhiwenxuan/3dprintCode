<!-- BEGIN LOGO -->
<div class="logo"> <img src="<?php echo Yii::app()->request->baseUrl;?>/media/image/logo-big.png" alt="" /> </div>
<!-- END LOGO --> 


<!-- BEGIN LOGIN -->
<div class="content"> 
  
  <!-- BEGIN LOGIN FORM -->
  <?php 
  	$form=$this->beginWidget('CActiveForm', array(
		'id'=>'login-form',
		
		'enableClientValidation'=>true,
		'clientOptions'=>array(
			'validateOnSubmit'=>true,
		),
  	));
  ?>
    <h3 class="form-title">管理员登录</h3>
    <div class="alert alert-error hide">
      <button class="close" data-dismiss="alert"></button>
      <span>Enter any username and password.</span> </div>
    <div class="control-group"> 
      
      <!--ie8, ie9 does not support html5 placeholder, so we just show field title for that-->
      
      <label class="control-label visible-ie8 visible-ie9">Username</label>
      <div class="controls">
        <div class="input-icon left"> <i class="icon-user"></i>
          <input class="m-wrap placeholder-no-fix" type="text" placeholder="Username" name="LoginForm[username]"/>
        </div>
      </div>
    </div>
    <div class="control-group">
      <label class="control-label visible-ie8 visible-ie9">Password</label>
      <div class="controls">
        <div class="input-icon left"> <i class="icon-lock"></i>
          <input class="m-wrap placeholder-no-fix" type="password" placeholder="Password" name="LoginForm[password]"/>
        </div>
      </div>
    </div>
    <div class="form-actions">
 
      <button type="submit" class="btn green pull-right"> 登录 <i class="m-icon-swapright m-icon-white"></i> </button>
    </div>

  </form>
  
  <!-- END LOGIN FORM --> 
  
  <!-- BEGIN FORGOT PASSWORD FORM -->
  
 
  
  <!-- END FORGOT PASSWORD FORM --> 
  
  <!-- BEGIN REGISTRATION FORM -->
  
  <form class="form-vertical register-form" action="index.html">
    <h3 class="">Sign Up</h3>
    <p>Enter your account details below:</p>
    <div class="control-group">
      <label class="control-label visible-ie8 visible-ie9">Username</label>
      <div class="controls">
        <div class="input-icon left"> <i class="icon-user"></i>
          <input class="m-wrap placeholder-no-fix" type="text" placeholder="Username" name="username"/>
        </div>
      </div>
    </div>
    <div class="control-group">
      <label class="control-label visible-ie8 visible-ie9">Password</label>
      <div class="controls">
        <div class="input-icon left"> <i class="icon-lock"></i>
          <input class="m-wrap placeholder-no-fix" type="password" id="register_password" placeholder="Password" name="password"/>
        </div>
      </div>
    </div>
    <div class="control-group">
      <label class="control-label visible-ie8 visible-ie9">Re-type Your Password</label>
      <div class="controls">
        <div class="input-icon left"> <i class="icon-ok"></i>
          <input class="m-wrap placeholder-no-fix" type="password" placeholder="Re-type Your Password" name="rpassword"/>
        </div>
      </div>
    </div>
    <div class="control-group"> 
      
      <!--ie8, ie9 does not support html5 placeholder, so we just show field title for that-->
      
      <label class="control-label visible-ie8 visible-ie9">Email</label>
      <div class="controls">
        <div class="input-icon left"> <i class="icon-envelope"></i>
          <input class="m-wrap placeholder-no-fix" type="text" placeholder="Email" name="email"/>
        </div>
      </div>
    </div>
    <div class="control-group">
      <div class="controls">
        <label class="checkbox">
          <input type="checkbox" name="tnc"/>
          I agree to the <a href="#">Terms of Service</a> and <a href="#">Privacy Policy</a> </label>
        <div id="register_tnc_error"></div>
      </div>
    </div>
    <div class="form-actions">
      <button id="register-back-btn" type="button" class="btn"> <i class="m-icon-swapleft"></i> Back </button>
      <button type="submit" id="register-submit-btn" class="btn green pull-right"> Sign Up <i class="m-icon-swapright m-icon-white"></i> </button>
    </div>
  <?php $this->endWidget(); ?>
  
  <!-- END REGISTRATION FORM --> 
  
</div>

<!-- END LOGIN --> 

<!-- BEGIN COPYRIGHT -->

<div class="copyright"> Copyright ©2013-2014 白芙堂网络科技有限公司 版权所有. </div>



