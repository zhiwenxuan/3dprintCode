<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="language" content="en" />

        <!-- blueprint CSS framework -->
<!--	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/screen.css" media="screen, projection" />-->
        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/print.css" media="print" />
        <!--[if lt IE 8]>
        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/ie.css" media="screen, projection" />
        <![endif]-->

        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/main.css" />
        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/form.css" />
        <script src="http://code.jquery.com/jquery-latest.js"></script>     
        
        <script type="text/javascript" charset="utf-8" src="<?php echo Yii::app()->request->baseUrl; ?>/ueditor/ueditor.config.js"></script>
        <script type="text/javascript" charset="utf-8" src="<?php echo Yii::app()->request->baseUrl; ?>/ueditor/ueditor.all.min.js"></script>
        <!--建议手动加在语言，避免在ie下有时因为加载语言失败导致编辑器加载失败-->
        <!--这里加载的语言文件会覆盖你在配置项目里添加的语言类型，比如你在配置项目里配置的是英文，这里加载的中文，那最后就是中文-->
        <script type="text/javascript" charset="utf-8" src="<?php echo Yii::app()->request->baseUrl; ?>/ueditor/lang/zh-cn/zh-cn.js"></script>


        <title><?php echo CHtml::encode($this->pageTitle); ?></title>
    </head>

    <body>
        <div class="container" id="page">

            <div id="header">
                <div id="logo"><font color="white"><?php echo CHtml::encode(Yii::app()->name); ?>后台管理</font></div>
            </div><!-- header -->

            <!--	<div id="mainmenu">-->

            <!-- <div id="mainmenu">-->
            <ul class="navigation">
                <?php
                $this->widget('zii.widgets.CMenu', array(
                    'items' => array(
                        array('label' => '首页', 'url' => array('/admin/default/index')),
                        array('label' => '用户模块', 'url' => '', 'items' => array(
                                array('label' => '用户管理', 'url' => array('/admin/customer/admin')),
                                array('label' => '管理员管理', 'url' => array('/admin/admin/admin')))
                        ),
                        array('label' => '产品模块', 'url' => '', 'items' => array(
                                array('label' => '类别管理', 'url' => array('/admin/category/admin')),
                                array('label' => '商品管理', 'url' => array('/admin/product/admin')))
                        ),
                        array('label' => '订单模块', 'url' => '', 'items' => array(
                                array('label' => '订单管理', 'url' => array('/admin/order/admin')),
                                array('label' => '发货管理', 'url' => array('/admin/order/sendOrder')))
                        ),
                        array('label' => '博客系统', 'url' => '', 'items' => array(
                                array('label' => '博客管理', 'url' => array('/admin/blogLog/admin')),
                                array('label' => '发布博客', 'url' => array('/admin/blogLog/create')),
								array('label' => '分类管理', 'url' => array('/admin/blogTags/admin')))
                        ),

                        array('label' => '清理图片数据', 'url' => array('/admin/product/CleanUg')),
                        array('label' => '退 出 (' . Yii::app()->user->name . ')','url' => array('/admin/default/logout'), 'visible' => !Yii::app()->user->isGuest),
                        array('label' => '返回网站', 'url' => array('/'))
                    ),
                ));
                ?>
            </ul>
            <!--	</div> mainmenu -->
            
            
            <?php if (isset($this->breadcrumbs)): ?>
            <div class="breadMain">
                <?php
                $this->widget('zii.widgets.CBreadcrumbs', array(
                    'links' => $this->breadcrumbs,
                    'homeLink' => CHtml::link('后台管理', $this->createUrl('default/index')),
                ));
                ?><!-- breadcrumbs -->
                </div>
            <?php endif ?>

            <?php echo $content; ?>

            <div id="footer">
                 
            </div><!-- footer -->

        </div><!-- page -->

    </body>
</html>