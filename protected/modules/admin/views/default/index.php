<div class="container-fluid"> 
  
  <!-- BEGIN PAGE HEADER-->
  <div class="row-fluid">
    <div class="span12"> 
      
      <!-- BEGIN STYLE CUSTOMIZER -->
      <!-- END BEGIN STYLE CUSTOMIZER --> 
      
      
      
      <!-- BEGIN PAGE TITLE & BREADCRUMB-->
      
      <h3 class="page-title"> 控制中心 <small></small> </h3>
      <ul class="breadcrumb">
        <li> <i class="icon-home"></i> 首页 <i class="icon-angle-right"></i> </li>
        <li>控制中心</li>
      </ul>
      
      <!-- END PAGE TITLE & BREADCRUMB--> 
      
    </div>
  </div>
  <!-- END PAGE HEADER-->
  
  <div id="dashboard"> 
  
    <!-- BEGIN DASHBOARD STATS -->
    <div class="row-fluid">
    
      <div class="span3 responsive" data-tablet="span6" data-desktop="span3">
        <div class="dashboard-stat blue">
          <div class="visual"> <i class="icon-comments"></i> </div>
          <div class="details">
            <div class="number"> 
			<?php
        		$cter = new CDbCriteria;
        		$cter->compare('stat',1,FALSE);      
        		$Count = Product::model()->count($cter); 
        		echo $Count;
        	?> </div>
            <div class="desc"> 待审核商品</div>
          </div>
          <a class="more" href="<?php echo $this->createUrl('product/admin', array('stat'=>1)) ?>"> 查看 <i class="m-icon-swapright m-icon-white"></i> </a> </div>
      </div>
      
      <div class="span3 responsive" data-tablet="span6" data-desktop="span3">
        <div class="dashboard-stat green">
          <div class="visual"> <i class="icon-shopping-cart"></i> </div>
          <div class="details">
            <div class="number">
			<?php
        		$cter = new CDbCriteria;
        		$cter->compare('shelves',1,FALSE);      
        		$Count = Product::model()->count($cter); 
        		echo $Count;
        	?></div>
            <div class="desc">待上架商品</div>
          </div>
          <a class="more" href="<?php echo $this->createUrl('product/admin', array('shelves'=>1)) ?>"> 查看 <i class="m-icon-swapright m-icon-white"></i> </a> </div>
      </div>
      <div class="span3 responsive" data-tablet="span6  fix-offset" data-desktop="span3">
        <div class="dashboard-stat purple">
          <div class="visual"> <i class="icon-globe"></i> </div>
          <div class="details">
            <div class="number">
			<?php
        		$cter = new CDbCriteria;
        		$cter->compare('order_stat',1,FALSE);      
        		$Count = Order::model()->count($cter); 
        		echo $Count;
        	?></div>
            <div class="desc">待付款订单</div>
          </div>
          <a class="more" href="<?php echo $this->createUrl('order/admin', array('stat'=>1)) ?>"> 查看 <i class="m-icon-swapright m-icon-white"></i> </a> </div>
      </div>
      <div class="span3 responsive" data-tablet="span6" data-desktop="span3">
        <div class="dashboard-stat yellow">
          <div class="visual"> <i class="icon-bar-chart"></i> </div>
          <div class="details">
            <div class="number">
            <?php
        		$cter = new CDbCriteria;
        		$cter->compare('order_stat',1,FALSE);      
        		$Count = Order::model()->count($cter); 
        		echo $Count;
        	?>
            </div>
            <div class="desc">待发货订单</div>
          </div>
          <a class="more" href="<?php echo $this->createUrl('order/admin', array('stat'=>3)) ?>"> View more <i class="m-icon-swapright m-icon-white"></i> </a> </div>
      </div>
    </div>
    <!-- END DASHBOARD STATS -->
    
  </div>

</div>

<script>
	jQuery(document).ready(function(){
		$('#home_page').addClass('active');	
	});
</script>