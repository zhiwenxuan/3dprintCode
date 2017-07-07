
<LINK rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/banner/images/style.css" media="screen">
<LINK rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/banner/images/color.css" media="screen">
<LINK rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/banner/images/nivo-slider.css" media="screen">

<SCRIPT type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/banner/images/jquery-1.6.4.min.js"></SCRIPT>
<SCRIPT type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/banner/images/jquery.easing.1.3.js"></SCRIPT>
<SCRIPT type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/banner/images/jquery.nivo.slider.pack.js"></SCRIPT>
<SCRIPT type="text/javascript">
jQuery(document).ready(function(){
	//Menu
	jQuery("ul.sf-menu").supersubs({ 
	minWidth		: 12,		// requires em unit.
	maxWidth		: 27,		// requires em unit.
	extraWidth		: 1	// extra width can ensure lines don't sometimes turn over due to slight browser differences in how they round-off values
						   // due to slight rounding differences and font-family 
	}).superfish();  // call supersubs first, then superfish, so that subs are 
					 // not display:none when measuring. Call before initialising 
					 // containing tabs for same reason. 
});
//Slider
jQuery(window).load(function() {
	jQuery('#slider').nivoSlider({
	effect: 'fold',
	slices:15,
	animSpeed:500, //Slide transition speed
	pauseTime:5000,
	controlNav: false,
	directionNavHide: false,
	prevText: 'prev',
	nextText: 'next',
	startSlide:0, //Set starting Slide (0 index)
	directionNav:true, //Next &amp; Prev
	afterLoad: function(){
		jQuery(".nivo-caption").animate({top:"60"}, {easing:"easeOutBack", duration: 500})
		},
		beforeChange: function(){
		jQuery(".nivo-caption").animate({top:"-300"}, {easing:"easeInBack", duration: 500})
		},
        beforeChange: function(){
		jQuery(".nivo-caption").animate({top:"-300"}, {easing:"easeInBack", duration: 500})
		},
		afterChange: function(){
		jQuery(".nivo-caption").animate({top:"60"}, {easing:"easeOutBack", duration: 500})
		}
	});
	
});

</SCRIPT>


<DIV id="wrapper"><!-- end #wrapper-top -->
  <DIV id="wrapper-content">
    <DIV class="container">
      <DIV class="twelve columns">
        <DIV id="header">
          <DIV id="slider-container">
            <DIV id="slider" class="nivoSlider"><IMG title="#htmlcaption1" alt="" src="<?php echo Yii::app()->request->baseUrl; ?>/banner/images/maketoreal.jpg"><IMG 
title="#htmlcaption2" alt="" src="<?php echo Yii::app()->request->baseUrl; ?>/banner/images/3dphoto.jpg"><IMG title="#htmlcaption3" 
alt="" src="<?php echo Yii::app()->request->baseUrl; ?>/banner/images/3dart.jpg"><IMG title="#htmlcaption4" 
alt="" src="<?php echo Yii::app()->request->baseUrl; ?>/banner/images/industry.jpg"></DIV>
            <!-- #slider -->
            <DIV id="htmlcaption1" class="nivo-html-caption"><SPAN class="sdate">3D打印工场
              </SPAN>
              <H1>迅速让您的想象变为现实...</H1>
              <HR>
              <P>只需要仅仅几分钟，您可以上传您的创意给我们，或者使用我们的网上设计平台，
              我们即可迅速实现您的创意。 </P>
            </DIV>
            <DIV id="htmlcaption2" class="nivo-html-caption"><SPAN class="sdate">Ddayin.com
              </SPAN>
              <H1>帮助您保留美好回忆...</H1>
              <HR>
              <P>您可以通过3D扫描仪器，拍摄您的三维影像。 
                3D打印工场将等比例地将三维影像变成现实。 </P>
            </DIV>
            <DIV id="htmlcaption3" class="nivo-html-caption"><SPAN class="sdate">销售创意
              </SPAN>
              <H1>欢迎在DDAYIN商城开店...</H1>
              <HR>
              <P>您可以自主定价销售自己的创意，亦可以免费分享获取喜悦。 
                将您的三维设计作品放入DDAYIN商城，与3D打印工场一起分享收入。 </P>
            </DIV>
            <DIV id="htmlcaption4" class="nivo-html-caption"><SPAN class="sdate">工业解决方案
              </SPAN>
              <H1>为企业提供工业级3D打印服务...</H1>
              <HR>
              <P>为企业客户提供手板制作，样机制作，小批量工业零件打印服务。 
                为保护您的设计专利，我们将在3D打印完成后销毁所有设计图。 </P>
            </DIV>
            
          </DIV>
          <!-- #slider-container --></DIV>
        <!-- #header -->

        <!-- #content --></DIV>
    </DIV>
  </DIV>
  <!-- end #wrapper-content --> 
  <!-- end #wrapper-footer --></DIV>
<!-- end #wrapper -->
    <div class="float_left banner_font" >3D打印工场, 为您提供最好的产品，最优的服务！</div>
    <a id="up_bottom"  class="float_right " href="<?php echo $this->createUrl('product/create')?>">
    上传模型    
    </a>
    <div class="clear"></div>
    
    <div class="type_three" style="margin-left: 20px;">
        <div class="t_title">完美3D打印解决方案</div>
        <div style="color: #888;"><br>您只需提交您的3D设计给DDaYin.com，我们会在最短的时间内将实物邮寄给您。 <br>  </div>
        <a href=""><img src="<?php echo Yii::app()->request->baseUrl; ?>/banner/images/3Dexample.jpg" width="280" height="190"></a>
        </div>
    
    <div class="type_three">
        <div class="t_title">创意也能赚钱</div>
        <div style="color: #888;"> <br>只需简单一步，即可将您的3D设计展示在DDaYin.com的网上商城，轻松赚取大米。</div>
        <a href=""><img src="<?php echo Yii::app()->request->baseUrl; ?>/banner/images/makemoney.jpg" width="280" height="190"></a>
    </div>
    
    <div class="type_three">
     <div class="t_title">超易用的3D模型创作平台</div>
        <div style="color: #888;"> <br>若您想轻松创作一个3D作品，我们的网上3D设计中心将给您一种全新的体验。</div>
        <a href=""><img src="<?php echo Yii::app()->request->baseUrl; ?>/banner/images/designcenter.jpg" width="280" height="190"></a>
    </div>
    <div class="clear" style="margin-bottom: 10px;"></div>

   

    <!--热门商品调用-->
    <?php echo $this->renderpartial('//product/hotproduct'); ?>
    
    
     <!--最新商品调用-->
    <?php echo $this->renderpartial('//product/newproduct'); ?>
