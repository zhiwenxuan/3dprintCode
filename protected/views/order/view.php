<?php
	//print_r($productInfo);
	//print_r($dataProvider);
           $express1 = 10;
           $express2 = 20;
           $express3 = 30;

		  if($dataProvider->express == 1){
			$order_express = 'POST';
			$order_express_pay = 10;
		  }
		  if($dataProvider->express == 2){
			$order_express = 'EMS';
			$order_express_pay = 20;
		  }
		  if($dataProvider->express == 3){
			$order_express = 'EXPRESS';
			$order_express_pay = 30;
		  }
		  
		  $order_AllPrice = (int)($dataProvider->allPrice - $order_express_pay);
		  //print_r($order_AllPrice);
?>


<h1>订单详情</h1>
<div class="orderFormMain">
	
    <form name="orderPay" method="post"  action="<?php echo $this->createUrl('order/Handl'); ?>">
    <input name="order_id" value="<?=$dataProvider->id?>" type="hidden">
    <input name="order_price" value="<?=$order_AllPrice;?>" type="hidden">
    <input name="order_express" value="<?=$order_express?>" type="hidden">
    <input name="order_express_pay" value="<?=$order_express_pay?>" type="hidden">

    <!--详细信息-->
    <div class="address_info" style="display: block;">
        <div class="orderInfotitle">订单状态</div>
        <table>
            <tr>
                <td width="60">订单编号</td>
                <td width="120"><?=$dataProvider->id?></td>
                <td width="60">订单状态</td>
                <td width="120">
                    <?php
                        if($dataProvider->order_stat == 1){
                            echo '待付款';
                        }
                        if($dataProvider->order_stat == 2){
                            echo '已付款';
                        }
                        if($dataProvider->order_stat == 3){
                            echo '已发货';
                        }
                        if($dataProvider->order_stat == 4){
                            echo '交易成功';
                        }
                        if($dataProvider->order_stat == 5){
                            echo '交易失败';
                        }
                       
                    ?>
                </td>
            </tr>
        </table>
    </div>
    <!--详细信息-->
    
    <!--收货人地址-->
    <div id="addressInfo">
        <?php
            foreach ($address as $a){
                if($a->id == $dataProvider->address){
        ?>
        <div id="address_info" class="address_info" style="display: block;">
            <div class="orderInfotitle">收货人信息</div>
            <table>
                <tr>
                    <td width="60">收货人</td>
                    <td><span id="Tname"><?=$a->name;?></span></td>
                    <input name="buy_name" value="<?=$a->name;?>" type="hidden">
                </tr>
                <tr>
                    <td>手机号码</td>
                    <td><span id="Tmobile"><?=$a->mobile;?></span></td>
                    <input name="buy_mobile" value="<?=$a->mobile;?>" type="hidden">
                </tr>
                <tr>
                    <td>固定电话</td>
                    <td><span id="Ttelephone"><?=$a->telephone;?></span></td>
                    <input name="buy_phone" value="<?=$a->telephone;?>" type="hidden">
                </tr>
                 <tr>
                    <td>邮编</td>
                    <td><span id="Tareacode"><?=$a->areacode;?></span></td>
                    <input name="buy_code" value="<?=$a->areacode;?>" type="hidden">
                </tr>
                <tr>
                    <td>所在地区</td>
                    <td><span id="Tarea"><?=$a->area;?></span><?=$a->address;?><span id="Taddress"></span></td>
                    <input name="buy_address" value="<?=$a->area;?><?=$a->address;?>" type="hidden">
                </tr>
            </table>
        </div>
        <?php
                }
            }
        ?>
    </div>
    <!--收货人地址-->
    
    <!--配送方式-->
<!--    <div class="address_info" style="display: block;">
        <div class="orderInfotitle" >配送方式</div>
        <table>
            <tr>
                <td width="40"><input type="radio" value="1" name="express" <?php if($dataProvider->express == 1) echo 'checked="checked"';?>  disabled="disabled"></td>
                <td width="80">普通快递</td>
                <td><span class="price1">&yen;<?=$express1;?></span></td>
            </tr>
            <tr>
                <td><input type="radio" value="2" name="express" <?php if($dataProvider->express == 2) echo 'checked="checked"';?>  disabled="disabled" ></td>
                <td>EMS快递</td>
                <td><span class="price1">&yen;<?=$express2;?></span></td>
            </tr>
            <tr>
                <td><input type="radio" value="3" name="express" <?php if($dataProvider->express == 3) echo 'checked="checked"';?>  disabled="disabled"></td>
                <td>顺丰快递</td>
                <td><span class="price1">&yen;<?=$express3;?></span></td>
            </tr>
        </table>
    </div>-->
    <!--配送方式-->
    
    
    <!--支付方式-->
    <div class="address_info" style="display: block;">
        <div class="orderInfotitle" >支付方式</div>
        <table>
            <tr>
                <td width="40"><input type="radio" value="1" name="payment" <?php if($dataProvider->payment == 1) echo 'checked="checked"';?>  disabled="disabled"></td>
                <td>支付宝支付</td>
            </tr>
<!--            <tr>
                <td><input type="radio" value="2" name="payment" <?php if($dataProvider->payment == 2) echo 'checked="checked"';?>  disabled="disabled"></td>
                <td>网银支付</td>
            </tr>
            <tr>
                <td><input type="radio" value="3" name="payment" <?php if($dataProvider->payment == 3) echo 'checked="checked"';?>  disabled="disabled"></td>
                <td>余额支付</td>
            </tr>-->
        </table>
    </div>
    <!--支付方式-->
    
    
    <!--备注-->
    <div class="space_2">
        <table>
            <tr>
                <td class="padding_1" valign="top" align="right">备注：</td>
                <td colspan="7" class="padding_1">
                    <?=$dataProvider->remarks?>
                </td>
            </tr>
        </table>
    </div>
    <!--备注-->
    
</div>


<table class="productList" cellpadding="0" cellspacing="0">
    <tr id="productListHeard">
        <td>商品信息</td>
        <!--<td width="80">类型</td>-->
        <td width="80">作者</td>
        <td width="80">单价</td>
        <td width="80">价格</td>
        <td width="80">数量</td>
    </tr>
<?php
    foreach($productInfo as $r){
    $url=$this->createUrl('product/view',array('id'=>$r->p_id));
?>
    <tr>
        
        <td>
        <div class="margin_space margin-left">
            <div class="img_float">
                <div class="pic100">
                    <a href="<?=$url;?>"><img alt="<?=$r['name']?>" title="<?=$r['name']?>" src="/assets/upfile/<?=$r['pic']?>"></a><span class="imgmid"></span>
                </div>
            </div>
            <div class="info_float">
                <div style="height:40px;"> <a href="<?=$url;?>"><?=$r['name']?></a></div>
                材质：
                <?php
                    if($r['material'] == 1){
                        echo '金属';
                    }else{
                        echo '塑料';
                    }
                ?>
                <br/>
                <div style="float:left; line-height: 25px;">颜色：</div><div color="<?=$r['color'];?>" class="selectProductColor"><div style="background:<?=$r['color'];?>; width: 100%; height: 100%"></div></div>
            </div>
            <div style="clear:both;">
        </div>
        </td>

        <td align="center"><?=$r->getAuthor->name;?></td>
        <td align="center"><span  class="price1">&yen;<?=$r['price'];?></span></td>
        <td align="center"><span id="price_<?=$r['id'];?>" class="price1">&yen;<?=$r['price']*$r['number']?></span></td>
        <td align="center"><?=$r['number']?></td>

    </tr>
    
<?php
	
    }
?>
	<tr>
    	<td colspan="8">
        <div class="allPrice">
        --总计：<span id="allPriceInfo">&yen;<?=$dataProvider->allPrice;?></span>
        </div>
        <div style="clear:both"></div>
        <br/>
        </td>
    </tr>
</table>


<div class="margin_space">
	<?php
		if($dataProvider['order_stat'] == 1){
			echo '<input type="submit" class="pay_order" value="" /> ';
		}
	?>


	<a class="go_buy" href="javascript:history.go(-1);" ><div>返回</div></a>
	<div style="clear:both;"></div>
</div>
</form>
