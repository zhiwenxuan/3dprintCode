<?php $this->beginContent('//layouts/main'); ?>

    	 
<div id="column_left">
    
 
<!--商品目录-->
<div class="box">
    <div class="top"><img alt="" src="<?php echo Yii::app()->request->baseUrl; ?>/images/category.png"/>
        &nbsp;   商 品 分 类
    </div>
  <div class="middle" id="category"  >
    
	<?php //$this->widget('ProductCategoriesWidget'); 
           $this->renderPartial("//category/index");
        ?>	
	 
  </div>
  <div class="bottom">&nbsp;</div>
</div>

<div class="box">
  <div class="top"><img alt="" src="<?php echo Yii::app()->request->baseUrl; ?>/images/information.png"/>&nbsp; 网 站 信 息</div>
  <div class="middle" id="information"  >
    <ul>
            <li><a href="/">关于我们</a></li>
            <li><a href="/">条款协议</a></li>
            <li><a href="/">联系我们</a></li>
            <li><a href="/">网站地图</a></li>
    </ul>
  </div>
  <div class="bottom">&nbsp;</div>
</div>

</div><!-- end of column-left -->

<!--    右边栏    -->
<div id="column_right">
    
    <!--   购物车 -->
    <div class="box" id="module_cart">
        <div class="top"><img alt="" src="<?php echo Yii::app()->request->baseUrl; ?>/images/basket.png"/>
            &nbsp;我 的 购 物 车
        </div>
      <div class="middle">
            <div style="text-align: center;"><?php $this->widget('BasketWidget'); ?></div>
          </div>
      <div class="bottom">&nbsp;</div>
    </div>
    
    
    
<!--   这里是右边栏的 其它box-->
<!--<div class="box">
  <div class="top"><img alt="" src="<?php echo Yii::app()->request->baseUrl; ?>/images/featured.png">精 品 推 荐</div>
  <div class="middle">
            <?php echo $this->renderpartial('//product/list');?>
  </div>
  <div class="bottom">&nbsp;</div>
</div>
<div class="box">
  <div class="top"><img alt="" src="<?php echo Yii::app()->request->baseUrl; ?>/images/bestsellers.png">热 销 商 品</div>
  <div class="middle">
            <?php echo $this->renderpartial('//product/bestsellers');?>
  </div>
  <div class="bottom">&nbsp;</div>
</div>-->





</div><!-- end of column-right --> 

<!--各controller/action刷新的内容-->
<div id="content">
        <?php echo $content; ?>
</div><!-- content -->


<?php $this->endContent(); ?>