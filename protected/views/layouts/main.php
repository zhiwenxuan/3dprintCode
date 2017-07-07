<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<script type="text/javascript" src="http://tajs.qq.com/stats?sId=34294308" charset="UTF-8"></script>
<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/orange.css" />
<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/frontstyle.css" media="screen, projection" />
<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/form.css" media="screen, projection" />
<script type="text/javascript" charset="utf-8" src="<?php echo Yii::app()->request->baseUrl; ?>/ueditor/ueditor.config.js"></script>
<script type="text/javascript" charset="utf-8" src="<?php echo Yii::app()->request->baseUrl; ?>/ueditor/ueditor.all.min.js"></script>
<!--建议手动加在语言，避免在ie下有时因为加载语言失败导致编辑器加载失败-->
<!--这里加载的语言文件会覆盖你在配置项目里添加的语言类型，比如你在配置项目里配置的是英文，这里加载的中文，那最后就是中文-->
<script type="text/javascript" charset="utf-8" src="<?php echo Yii::app()->request->baseUrl; ?>/ueditor/lang/zh-cn/zh-cn.js"></script>
<script src="<?php echo Yii::app()->request->baseUrl; ?>/javascripts/jquery-1.2.6.pack.js"></script>
<title><?php echo CHtml::encode($this->pageTitle); ?></title>
<meta name="keywords" content="<?=KEYWORDS?>">
<meta name="description" content="<?=DESCRIPTION?>">
<link rel="shortcut icon" type="image/png" href="<?php echo Yii::app()->request->baseUrl; ?>/favicon.png" />
</head>



<body>
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
    (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
      m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
        })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

          ga('create', 'UA-51277030-1', 'auto');
            ga('send', 'pageview');
</script>
<div class="web_heard_1">
  <div class="web_heard"> 
  
  
    <!--登录与注册-->
    <div class="userInfo">
      <?php
		if (Yii::app()->user->isGuest) {
	  ?>
      <span><a id="tab_login" href="<?php echo $this->createUrl('customer/login'); ?>" >登录</a></span>
      <span class="sep">|</span>
      <span><a href="<?php echo $this->createUrl('customer/register'); ?>">注册</a></span>
      <?php
	  	} else {
	  ?>
      <span>您好!<?= Yii::app()->user->name; ?></span>
      <span class="sep">|</span>
      <span><a href="<?php echo $this->createUrl('customer/logout'); ?>">退出登录</a></span>
      <span class="sep">|</span>
      <span><a href="<?php echo $this->createUrl('product/index', array('id' => Yii::app()->user->id)) ?>">我的商店</a></span>
      <?php
      	}
      ?>
      </div>
    <!--登录与注册--> 
  </div>
</div>
<div style="clear:both"></div>
<div id="header">
  <div class="web_heard">
    <div class="logoImg"> <a href="/"> <img alt="Your Store" width="220" title="My Store" src="<?php echo Yii::app()->request->baseUrl; ?>/images/cologo.png"/> </a> </div>
  </div>
  
  <!--导航栏-->
  <div class="tabNav" id="my-tabs" style="margin-top:18px; display:inline; _margin-left:850px; _margin-top:-55px;">
  <a id="tab_home" href="<?php echo Yii::app()->homeUrl; ?>" class="selected" >商城</a>
  <a id="tab_line" href="<?= $this->createUrl('/site/online') ?>">课程</a>
  <a id="tab_line" href="<?= $this->createUrl('/site/online') ?>">编程</a>
  <a id="tab_line" href="<?= $this->createUrl('/site/online') ?>">百科</a>
  <a id="tab_account" href="<?php
  if (!(Yii::app()->user->isGuest))
	  echo $this->createUrl('customer/account', array('id' => Yii::app()->user->id));
  else
	  echo $this->createUrl('customer/login');
  ?>">会员中心</a> 
  </div>
  <!--导航栏--> 
  
  <!--      black headerBar under Tab Navigation -->
  <div class="headerBar"> 
    <!--     breadcrumbs and search area -->
    <div class="center"> 
      <!--商品分类-->
      <ul id="nav_productInfo">
        <?php
			$criteria=new CDbCriteria;  
			$criteria->order='parent_id ASC';  
			$model = Category::model()->findAll($criteria);
			foreach ($model as $r) {
		?>
        	<a href="<?php echo $this->createUrl('product/category', array('c' => $r->id)) ?>">
        <li>
          <?= $r->name; ?>
        </li>
        </a>
        <?php
			}
		?>
      </ul>
      <!--商品分类--> 
    </div>
  </div>
</div>
<!--heard_end-->

<script>          
$(document).ready(function() {
	route = window.location.href;
	if (!route) {
		$('#tab_home').addClass('selected');
	} else {
		part = route.split('/');
		if (part[5] == 'online') {
			$('#tab_account').removeClass('selected');
			$('#tab_home').removeClass('selected');
			$('#tab_line').addClass('selected');
		}
		
		if (part[4] == 'customer') {
			$('#tab_account').addClass('selected');
			$('#tab_home').removeClass('selected');
			$('#tab_line').removeClass('selected');
		}

		
		if(part[4] == 'site' && part[5] == 'login'){
			$('#tab_account').addClass('selected');
			$('#tab_home').removeClass('selected');
			$('#tab_line').removeClass('selected');	
		}
		
		if(part[4] == 'product' && part[5] == 'verify'){
			$('#tab_account').addClass('selected');
			$('#tab_home').removeClass('selected');
			$('#tab_line').removeClass('selected');	
		}
		
		if(part[4] == 'product' && part[5] == 'pBuys'){
			$('#tab_account').addClass('selected');
			$('#tab_home').removeClass('selected');
			$('#tab_line').removeClass('selected');	
		}
		
		if(part[4] == 'product' && part[5] == 'pDown'){
			$('#tab_account').addClass('selected');
			$('#tab_home').removeClass('selected');
			$('#tab_line').removeClass('selected');	
		}
		
		if(part[4] == 'product' && part[5] == 'pUp'){
			$('#tab_account').addClass('selected');
			$('#tab_home').removeClass('selected');
			$('#tab_line').removeClass('selected');	
		}
		
		if(part[4] == 'product' && part[5] == 'manage'){
			$('#tab_account').addClass('selected');
			$('#tab_home').removeClass('selected');
			$('#tab_line').removeClass('selected');	
		}
		
		if(part[4] == 'product' && part[5] == 'create'){
			$('#tab_account').addClass('selected');
			$('#tab_home').removeClass('selected');
			$('#tab_line').removeClass('selected');	
		}
		
		if(part[4] == 'order'){
			$('#tab_account').addClass('selected');
			$('#tab_home').removeClass('selected');
			$('#tab_line').removeClass('selected');	
		}

	}
});
</script> 
<?php echo $content; ?>
<div style="clear:both"></div>


<?php
	$this->renderpartial('//layouts/foot');
?>
</body>
</html>

