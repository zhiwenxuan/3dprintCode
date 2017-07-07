<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en" class="no-js">
<!--<![endif]-->
<!-- BEGIN HEAD -->
<head>
<meta charset="utf-8" />
<title><?php echo CHtml::encode($this->pageTitle); ?></title>
<meta content="width=device-width, initial-scale=1.0" name="viewport" />
<meta content="" name="description" />
<meta content="" name="author" />

<!-- BEGIN GLOBAL MANDATORY STYLES -->
<link href="<?php echo Yii::app()->request->baseUrl; ?>/media/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
<link href="<?php echo Yii::app()->request->baseUrl; ?>/media/css/bootstrap-responsive.min.css" rel="stylesheet" type="text/css"/>
<link href="<?php echo Yii::app()->request->baseUrl; ?>/media/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
<link href="<?php echo Yii::app()->request->baseUrl; ?>/media/css/style-metro.css" rel="stylesheet" type="text/css"/>
<link href="<?php echo Yii::app()->request->baseUrl; ?>/media/css/style.css" rel="stylesheet" type="text/css"/>
<link href="<?php echo Yii::app()->request->baseUrl; ?>/media/css/style-responsive.css" rel="stylesheet" type="text/css"/>
<link href="<?php echo Yii::app()->request->baseUrl; ?>/media/css/default.css" rel="stylesheet" type="text/css" id="style_color"/>
<link href="<?php echo Yii::app()->request->baseUrl; ?>/media/css/uniform.default.css" rel="stylesheet" type="text/css"/>
<!-- END GLOBAL MANDATORY STYLES -->
<!-- BEGIN PAGE LEVEL STYLES -->
<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/media/css/select2_metro.css" />
<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/media/css/multi-select-metro.css" />
<link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/media/css/DT_bootstrap.css" />
<link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/media/css/search.css" />
<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/media/css/bootstrap-fileupload.css" />
<!-- END PAGE LEVEL STYLES -->
<link rel="shortcut icon" href="<?php echo Yii::app()->request->baseUrl; ?>/media/image/favicon.ico" />

<!-- BEGIN JAVASCRIPTS(Load javascripts at bottom, this will reduce page load time) -->
<!-- BEGIN CORE PLUGINS -->
<script src="<?php echo Yii::app()->request->baseUrl; ?>/media/js/jquery-1.10.1.min.js" type="text/javascript"></script>
<script src="<?php echo Yii::app()->request->baseUrl; ?>/media/js/jquery-migrate-1.2.1.min.js" type="text/javascript"></script>
<!-- IMPORTANT! Load jquery-ui-1.10.1.custom.min.js before bootstrap.min.js to fix bootstrap tooltip conflict with jquery ui tooltip -->
<script src="<?php echo Yii::app()->request->baseUrl; ?>/media/js/jquery-ui-1.10.1.custom.min.js" type="text/javascript"></script>      
<script src="<?php echo Yii::app()->request->baseUrl; ?>/media/js/bootstrap.min.js" type="text/javascript"></script>
<!--[if lt IE 9]>
<script src="<?php echo Yii::app()->request->baseUrl; ?>/media/js/excanvas.min.js"></script>
<script src="<?php echo Yii::app()->request->baseUrl; ?>/media/js/respond.min.js"></script>  
<![endif]-->   
<script src="<?php echo Yii::app()->request->baseUrl; ?>/media/js/jquery.slimscroll.min.js" type="text/javascript"></script>
<script src="<?php echo Yii::app()->request->baseUrl; ?>/media/js/jquery.blockui.min.js" type="text/javascript"></script>  
<script src="<?php echo Yii::app()->request->baseUrl; ?>/media/js/jquery.cookie.min.js" type="text/javascript"></script>
<script src="<?php echo Yii::app()->request->baseUrl; ?>/media/js/jquery.uniform.min.js" type="text/javascript" ></script>
<!-- END CORE PLUGINS -->

<!-- BEGIN PAGE LEVEL PLUGINS -->
<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/media/js/select2.min.js"></script>
<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/media/js/jquery.dataTables.js"></script>
<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/media/js/DT_bootstrap.js"></script>
<!-- END PAGE LEVEL PLUGINS -->

<!-- BEGIN PAGE LEVEL SCRIPTS -->
<script src="<?php echo Yii::app()->request->baseUrl; ?>/media/js/app.js"></script>
<script src="<?php echo Yii::app()->request->baseUrl; ?>/media/js/table-managed.js"></script>    
<!-- END PAGE LEVEL SCRIPTS -->

<script src="<?php echo Yii::app()->request->baseUrl; ?>/media/js/form-samples.js"></script>  
<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/media/js/bootstrap-fileupload.js"></script>

<script type="text/javascript" charset="utf-8" src="<?php echo Yii::app()->request->baseUrl; ?>/ueditor/ueditor.config.js"></script>
<script type="text/javascript" charset="utf-8" src="<?php echo Yii::app()->request->baseUrl; ?>/ueditor/ueditor.all.min.js"></script>
<script type="text/javascript" charset="utf-8" src="<?php echo Yii::app()->request->baseUrl; ?>/ueditor/lang/zh-cn/zh-cn.js"></script>

</head>

<!-- END HEAD -->

<!-- BEGIN BODY -->

<body class="page-header-fixed">

<!-- BEGIN HEADER -->

<div class="header navbar navbar-inverse navbar-fixed-top"> 
  
  <!-- BEGIN TOP NAVIGATION BAR -->
  
  <div class="navbar-inner">
    <div class="container-fluid"> 
      
      <!-- BEGIN LOGO --> 
      
      <a class="brand" href="/index.php/admin/default/index"> <img src="<?php echo Yii::app()->request->baseUrl; ?>/media/image/logo.png" alt="logo"/> </a> 
      
      <!-- END LOGO --> 
      
      <!-- BEGIN RESPONSIVE MENU TOGGLER --> 
      
      <a href="javascript:;" class="btn-navbar collapsed" data-toggle="collapse" data-target=".nav-collapse"> <img src="<?php echo Yii::app()->request->baseUrl; ?>/media/image/menu-toggler.png" alt="" /> </a> 
      
      <!-- END RESPONSIVE MENU TOGGLER --> 
      
      <!-- BEGIN TOP NAVIGATION MENU -->
      
      <ul class="nav pull-right">
        
        <!-- BEGIN NOTIFICATION DROPDOWN -->
        
        <!--<li class="dropdown" id="header_notification_bar"> <a href="#" class="dropdown-toggle" data-toggle="dropdown"> <i class="icon-warning-sign"></i> <span class="badge">6</span> </a>
          <ul class="dropdown-menu extended notification">
            <li>
              <p>You have 14 new notifications</p>
            </li>
            <li> <a href="#"> <span class="label label-success"><i class="icon-plus"></i></span> New user registered. <span class="time">Just now</span> </a> </li>
            <li> <a href="#"> <span class="label label-important"><i class="icon-bolt"></i></span> Server #12 overloaded. <span class="time">15 mins</span> </a> </li>
            <li> <a href="#"> <span class="label label-warning"><i class="icon-bell"></i></span> Server #2 not respoding. <span class="time">22 mins</span> </a> </li>
            <li> <a href="#"> <span class="label label-info"><i class="icon-bullhorn"></i></span> Application error. <span class="time">40 mins</span> </a> </li>
            <li> <a href="#"> <span class="label label-important"><i class="icon-bolt"></i></span> Database overloaded 68%. <span class="time">2 hrs</span> </a> </li>
            <li> <a href="#"> <span class="label label-important"><i class="icon-bolt"></i></span> 2 user IP blocked. <span class="time">5 hrs</span> </a> </li>
            <li class="external"> <a href="#">See all notifications <i class="m-icon-swapright"></i></a> </li>
          </ul>
        </li>-->
        
        <!-- END NOTIFICATION DROPDOWN --> 
        
        <!-- BEGIN INBOX DROPDOWN -->
        
        <!--<li class="dropdown" id="header_inbox_bar"> <a href="#" class="dropdown-toggle" data-toggle="dropdown"> <i class="icon-envelope"></i> <span class="badge">5</span> </a>
          <ul class="dropdown-menu extended inbox">
            <li>
              <p>You have 12 new messages</p>
            </li>
            <li> <a href="inbox.html?a=view"> <span class="photo"><img src="<?php echo Yii::app()->request->baseUrl; ?>/media/image/avatar2.jpg" alt="" /></span> <span class="subject"> <span class="from">Lisa Wong</span> <span class="time">Just Now</span> </span> <span class="message"> Vivamus sed auctor nibh congue nibh. auctor nibh
              
              auctor nibh... </span> </a> </li>
            <li> <a href="inbox.html?a=view"> <span class="photo"><img src="<?php echo Yii::app()->request->baseUrl; ?>//media/image/avatar3.jpg" alt="" /></span> <span class="subject"> <span class="from">Richard Doe</span> <span class="time">16 mins</span> </span> <span class="message"> Vivamus sed congue nibh auctor nibh congue nibh. auctor nibh
              
              auctor nibh... </span> </a> </li>
            <li> <a href="inbox.html?a=view"> <span class="photo"><img src="<?php echo Yii::app()->request->baseUrl; ?>//media/image/avatar1.jpg" alt="" /></span> <span class="subject"> <span class="from">Bob Nilson</span> <span class="time">2 hrs</span> </span> <span class="message"> Vivamus sed nibh auctor nibh congue nibh. auctor nibh
              
              auctor nibh... </span> </a> </li>
            <li class="external"> <a href="inbox.html">See all messages <i class="m-icon-swapright"></i></a> </li>
          </ul>
        </li>-->
        
        <!-- END INBOX DROPDOWN --> 
     
        <!-- BEGIN TODO DROPDOWN -->
        
        <!--<li class="dropdown" id="header_task_bar"> <a href="#" class="dropdown-toggle" data-toggle="dropdown"> <i class="icon-tasks"></i> <span class="badge">5</span> </a>
          <ul class="dropdown-menu extended tasks">
            <li>
              <p>You have 12 pending tasks</p>
            </li>
            <li> <a href="#"> <span class="task"> <span class="desc">New release v1.2</span> <span class="percent">30%</span> </span> <span class="progress progress-success "> <span style="width: 30%;" class="bar"></span> </span> </a> </li>
            <li> <a href="#"> <span class="task"> <span class="desc">Application deployment</span> <span class="percent">65%</span> </span> <span class="progress progress-danger progress-striped active"> <span style="width: 65%;" class="bar"></span> </span> </a> </li>
            <li> <a href="#"> <span class="task"> <span class="desc">Mobile app release</span> <span class="percent">98%</span> </span> <span class="progress progress-success"> <span style="width: 98%;" class="bar"></span> </span> </a> </li>
            <li> <a href="#"> <span class="task"> <span class="desc">Database migration</span> <span class="percent">10%</span> </span> <span class="progress progress-warning progress-striped"> <span style="width: 10%;" class="bar"></span> </span> </a> </li>
            <li> <a href="#"> <span class="task"> <span class="desc">Web server upgrade</span> <span class="percent">58%</span> </span> <span class="progress progress-info"> <span style="width: 58%;" class="bar"></span> </span> </a> </li>
            <li> <a href="#"> <span class="task"> <span class="desc">Mobile development</span> <span class="percent">85%</span> </span> <span class="progress progress-success"> <span style="width: 85%;" class="bar"></span> </span> </a> </li>
            <li class="external"> <a href="#">See all tasks <i class="m-icon-swapright"></i></a> </li>
          </ul>
        </li>-->
        
        <!-- END TODO DROPDOWN --> 
        
        <!-- BEGIN USER LOGIN DROPDOWN -->
        
        <li class="dropdown user"> <a href="#" class="dropdown-toggle" data-toggle="dropdown"> <img alt="" src="<?php echo Yii::app()->request->baseUrl; ?>/media/image/avatar1_small.jpg" /> <span class="username"><?=Yii::app()->user->name;?></span> <i class="icon-angle-down"></i> </a>
          <ul class="dropdown-menu">
           <!-- <li><a href="extra_profile.html"><i class="icon-user"></i> My Profile</a></li>
            <li><a href="page_calendar.html"><i class="icon-calendar"></i> My Calendar</a></li>
            <li><a href="inbox.html"><i class="icon-envelope"></i> My Inbox(3)</a></li>
            <li><a href="#"><i class="icon-tasks"></i> My Tasks</a></li>
            <li class="divider"></li>
            <li><a href="extra_lock.html"><i class="icon-lock"></i> Lock Screen</a></li>-->
            <li><a href="/index.php/admin/default/logout"><i class="icon-key"></i> 退出 </a></li>
          </ul>
        </li>
        
        <!-- END USER LOGIN DROPDOWN -->
        
      </ul>
      
      <!-- END TOP NAVIGATION MENU --> 
      
    </div>
  </div>
  
  <!-- END TOP NAVIGATION BAR --> 
  
</div>
<!-- END HEADER --> 

<!-- BEGIN CONTAINER -->
<div class="page-container"> 
  <!-- BEGIN SIDEBAR -->
  <div class="page-sidebar nav-collapse collapse"> 
    <!-- BEGIN SIDEBAR MENU -->
    <ul class="page-sidebar-menu">
      <li> 
        <!-- BEGIN SIDEBAR TOGGLER BUTTON -->
        <div class="sidebar-toggler hidden-phone"></div>
        <!-- BEGIN SIDEBAR TOGGLER BUTTON --> 
      </li>
      <li> 
        <!-- BEGIN RESPONSIVE QUICK SEARCH FORM -->
       &nbsp;
        <!-- END RESPONSIVE QUICK SEARCH FORM --> 
      </li>
      <li id="home_page" class="start">
      	<a href="/index.php/admin/default/index"><i class="icon-home"></i><span class="title">控制中心</span><span class="selected"></span></a>
      </li>
      
      <li id="menber_page" class=""> <a href="javascript:;"> <i class="icon-user"></i> <span class="title">用户中心</span> <span class="arrow "></span> </a>
        <ul class="sub-menu">
          <li id="user_page"> <a href="/index.php/admin/customer/admin"> 会员管理 </a> </li>
         <!-- <li > <a href=""> 管理员管理</a> </li>-->
        </ul>
      </li>
      
      <li id="model_page" class=""> <a href="javascript:;"> <i class="icon-plane"></i> <span class="title">模型中心</span> <span class="arrow "></span> </a>
        <ul class="sub-menu">
          <li id="category_page"> <a href="/index.php/admin/category/admin"> 分类管理 </a> </li>
          <li id="product_page" > <a href="/index.php/admin/product/admin"> 模型管理</a> </li>
        </ul>
      </li>
      
      <li id="order_center_page" class=""> <a href="javascript:;"> <i class="icon-truck"></i> <span class="title">订单中心</span> <span class="arrow "></span> </a>
        <ul class="sub-menu">
          <li id="order_page"> <a href="/index.php/admin/order/admin"> 订单管理 </a> </li>
        </ul>
      </li>
      
      
      <li id="blog_page"> <a href="javascript:;"> <i class="icon-book"></i> <span class="title">博客中心</span> <span class="arrow "></span> </a>
        <ul class="sub-menu">
          <li id="blogTags_page" > <a href="/index.php/admin/blogTags/admin">标签管理</a> </li>
          <li id="blogLog_page" > <a href="/index.php/admin/blogLog/admin"> 博客管理</a> </li>
        </ul>
      </li>
      <li id="test_page" class="last "> <a href="/index.php/admin/blogLog/test"> <i class="icon-bar-chart"></i> <span class="title">自定义信息（test）</span> </a> </li>
      <li class="last "> <a href="/"> <i class="icon-signout"></i> <span class="title">返回首页</span> </a> </li>
    </ul>
    
    <!-- END SIDEBAR MENU --> 
    
  </div>
  
  <!-- END SIDEBAR --> 
  
  <!-- BEGIN PAGE -->
  
  <div class="page-content"> 
    
    <!-- BEGIN SAMPLE PORTLET CONFIGURATION MODAL FORM-->
    
    <div id="portlet-config" class="modal hide">
      <div class="modal-header">
        <button data-dismiss="modal" class="close" type="button"></button>
        <h3>Widget Settings</h3>
      </div>
      <div class="modal-body"> Widget settings form goes here </div>
    </div>
    
    <!-- END SAMPLE PORTLET CONFIGURATION MODAL FORM--> 
    
    <!-- BEGIN PAGE CONTAINER-->
    
	<?php echo $content; ?>
    
    <!-- END PAGE CONTAINER--> 
    
  </div>
  
  <!-- END PAGE --> 
  
</div>

<!-- END CONTAINER --> 

<!-- BEGIN FOOTER -->

<div class="footer">
  <div class="footer-inner"> Copyright ©2013-2014 白芙堂网络科技有限公司 版权所有. </div>
  <div class="footer-tools"> <span class="go-top"> <i class="icon-angle-up"></i> </span> </div>
</div>

<!-- END FOOTER --> 




<script>

	jQuery(document).ready(function() {    

	   App.init(); // initlayout and core plugins
	
	});

</script>

<!-- END JAVASCRIPTS --> 

</body>

<!-- END BODY -->

</html>