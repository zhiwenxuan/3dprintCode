<?php
	$this->renderpartial('//customer/left');
?>


<div class="float_left">
<span class="mb_title">用 户 中 心</span>
<div class="main_right">

    <div class="accountInfo">
    
    	<!--logo-->
        <div class="accountLogo">
            <img src="/<?=$dataProvider->pic?>"/><span class="imgmid"></span>
        </div>
        <!--logo-->
        
        
        <!--帐户信息-->
        <div style="float:left; margin-left:20px;">
        	<div class="bigName"><?= Yii::app()->user->name;?><span id="smaillFont">,欢迎您！</span></div>
             
             
            
            <div class="us_info_title">订单信息</div> 
            <table>
                <tr>
                     <td width="150" height="30"><a href="<?php echo $this->createUrl('order/needPay', array('stat'=>1)) ?>">待付款订单 (<?php
                     $cter = new CDbCriteria;
                     $cter->compare('order_stat',1,FALSE,'AND');
                     $cter->compare('u_id',  Yii::app()->user->id,FALSE);
                     $Count = Order::model()->count($cter); 
                     echo $Count;
                     ?>)</a></td>
                     <td width="150"><a href="<?php echo $this->createUrl('order/index', array('stat'=>2)) ?>">已付款的订单 (<?php
                     $cter = new CDbCriteria;
                     $cter->compare('order_stat',2,FALSE,'AND');   
                     $cter->compare('u_id',  Yii::app()->user->id,FALSE);
                     $Count = Order::model()->count($cter); 
                     echo $Count;
                     ?>)</a></td>
                     <td width="150"><a href="<?php echo $this->createUrl('order/index', array('stat'=>4)) ?>">已完成订单 (<?php
                     $cter = new CDbCriteria;
                     $cter->compare('order_stat',4,FALSE,'AND');    
                     $cter->compare('u_id',  Yii::app()->user->id,FALSE);
                     $Count = Order::model()->count($cter); 
                     echo $Count;
                     ?>)</a></td>
                 </tr>
            </table>
            <div class="us_info_border"></div>
          
          
          	<div class="us_info_title">我的模型</div> 
            <table>   
                 <tr>
                     <td width="150" height="30"><a href="<?php echo $this->createUrl('product/manage', array('stat'=>1)) ?>">待审核模型 (<?php
                     $cter = new CDbCriteria;
                     $cter->compare('stat',1,FALSE,'AND');  
                     $cter->compare('add_uid',  Yii::app()->user->id,FALSE);
                     $Count = Product::model()->count($cter); 
                     echo $Count;
                     ?>)</a></td>
                     <td width="150"><a href="<?php echo $this->createUrl('product/pDown') ?>">待上架模型 (<?php
                     $cter = new CDbCriteria;
                     $cter->compare('stat',2,FALSE,'AND');  
                     $cter->compare('shelves',1,FALSE,'AND');
                     $cter->compare('add_uid',  Yii::app()->user->id,FALSE);
                     $Count = Product::model()->count($cter); 
                     echo $Count;
                     ?>)</a></td>
                     <td></td>
                 </tr>
             </table>
			 <div class="us_info_border"></div>
			
            <div class="us_info_title">我的D打印</div>
             <table>
                 <tr>
                     <td width="150" height="30"><a href="<?php echo $this->createUrl('cart/index') ?>">我的购物车 (<?php
                     $cter = new CDbCriteria;
                     $cter->compare('uid',Yii::app()->user->id,FALSE);    
                     $Count = Cart::model()->count($cter); 
                     echo $Count;
                     ?>)</a></td>
                     <td width="150">我的积分：<?=$dataProvider->integral;?>分</td>
                     
                     <td width="150"><a href="<?php echo $this->createUrl('product/index', array('id' => $dataProvider->id)) ?>">我的商店</a></td>

             	</tr>
            </table>
            <div class="us_info_border"></div>
                
        </div>
        <!--帐户信息-->
        
        <div style="clear:both;"></div>

    </div>
    
    
</div>

</div>


<div class="clear"></div>