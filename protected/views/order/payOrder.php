<?php

	if($model->express == 1){
	 	$order_express = 'POST';
		$exPay = 10;
	}
	if($model->express == 2){
		$order_express = 'EMS';
		$exPay = 20;
	}
	if($model->express == 3){
		$order_express = 'EXPRESS';
		$exPay = 30;
	}
	$orderPrice = $model->allPrice - $exPay;
?>
<div style="margin-top:40px; margin-bottom:40px;">

<div style="float:left; width:80px; margin-left:300px;">
	<img src="<?php echo Yii::app()->request->baseUrl; ?>/images/true.png">
</div>
<div style="float:left; font-weight:700; margin-top:20px;">
	订单<?=$order_id;?>添加成功！
</div>

<div style="clear:both;"></div>
<a style="margin-top:60px; padding-top:60px; margin-left:380px;" href="<?= $this->createUrl('order/view', array('id' =>$order_id)) ?>">查看订单</a>
<a style="margin-top:60px; padding-top:60px; margin-left:10px;" onclick="subPay();">立即付款</a>
</div>

<form id="ljfk" name="orderPay" method="post"  action="<?php echo $this->createUrl('order/Handl'); ?>">
    <input name="order_id" value="<?=$model->id?>" type="hidden">
    <input name="order_price" value="<?=$orderPrice;?>" type="hidden">
    <input name="order_express" value="<?=$order_express?>" type="hidden">
    <input name="order_express_pay" value="<?=$exPay?>" type="hidden">
    
    <input name="buy_name" value="<?=$address->name;?>" type="hidden">
    <input name="buy_mobile" value="<?=$address->mobile;?>" type="hidden">
    <input name="buy_phone" value="<?=$address->telephone;?>" type="hidden">
    <input name="buy_code" value="<?=$address->areacode;?>" type="hidden">
    <input name="buy_address" value="<?=$address->area;?><?=$address->address;?>" type="hidden">
    
</form>


<script>
	//----立即付款
	function subPay(){
		$('#ljfk').submit();
	}

</script>