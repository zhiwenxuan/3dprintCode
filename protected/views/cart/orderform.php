<?php
	//print_r($productInfo);
	//print_r($dataProvider);
        $express1 = 10;
        $express2 = 20;
        $express3 = 30;
        $Price =  $allPrice +  $express1;
?>


<h1>填写并核对订单信息</h1>

<div class="orderFormMain">
    
    <!--收货人地址-->
    <div id="addressInfo">
        <div id="add_address" class="orderInfoMore"> 
            <div class="orderInfotitle">收货人信息</div>
            <div class="address_info_now">
            	<ul>
                	<?php
                    	foreach($address as $a){
					?>
                	<li><span><?=$a->name;?></span>&nbsp;&nbsp;<span><?=$a->mobile;?></span>&nbsp;&nbsp;<span><?=$a->area.$a->address;?></span>&nbsp;&nbsp;&nbsp;&nbsp;<span aid="<?=$a->id;?>" onclick="changeAddress(<?=$a->id;?>);" class="font_blue"><input type="radio" style="vertical-align:middle;" name="checkAddress"/></span></li>
                    <?php
						}
					?>
                    <li><span class="font_blue"	 onclick="newAddress();"><img width="110" style="margin-top:10px;" src="<?php echo Yii::app()->request->baseUrl; ?>/images/add_new_address.png"></span></li>
                </ul>
            </div>
            <table <?php if($Count >= 1){ echo 'style="display:none"'; }?> id="addAddress_info">
               
                <tr>
                    <td width="60">收货人</td>
                    <td><input type="text" id="name" name="name"/></td>
                </tr>
                <tr>
                    <td>手机号码</td>
                    <td><input type="text" id="mobile"  name="mobile"/></td>
                </tr>
                <tr>
                    <td>固定电话</td>
                    <td><input type="text" id="telephone" name="telephone"/></td>
                </tr>
                 <tr>
                    <td>邮编</td>
                    <td><input type="text" id="areacode" name="areacode"/></td>
                </tr>
                <tr>
                    <td>所在地区</td>
                    <td><input type="text" id="area" name="area" /></td>
                </tr>
                <tr>
                    <td>详细地址</td>
                    <td><input type="text" id="address" name="address" size="50"/></td>
                </tr>
                <tr>
                    <td></td>
                    <td><input type="button" onclick="subAddressInfo()" value="保存收货人信息"></td>
                </tr>
            </table>
        </div>
        <div id="address_info" class="address_info">
            <div class="orderInfotitle">收货人信息</div>
            <table>
                <tr>
                    <td width="60">收货人</td>
                    <td><span id="Tname"></span></td>
                </tr>
                <tr>
                    <td>手机号码</td>
                    <td><span id="Tmobile"></span></td>
                </tr>
                <tr>
                    <td>固定电话</td>
                    <td><span id="Ttelephone"></span></td>
                </tr>
                 <tr>
                    <td>邮编</td>
                    <td><span id="Tareacode"></span></td>
                </tr>
                <tr>
                    <td>所在地区</td>
                    <td><span id="Tarea"></span><span id="Taddress"></span></td>
                </tr>
            </table>
        </div>
    </div>
    <!--收货人地址-->
    
    <!--配送方式-->
    <!--<div class="address_info" style="display: none;">
        <div class="orderInfotitle" >配送方式</div>
        <table>
            <tr>
                <td width="40"><input type="radio" value="1" name="express" checked="checked"></td>
                <td width="80">普通快递</td>
                <td><span class="price1">&yen;<?=$express1;?></span></td>
            </tr>
            <tr>
                <td><input type="radio" value="2" name="express"></td>
                <td>EMS快递</td>
                <td><span class="price1">&yen;<?=$express2;?></span></td>
            </tr>
            <tr>
                <td><input type="radio" value="3" name="express"></td>
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
                <td width="40"><input type="radio" value="1" name="payment" checked="checked"></td>
                <td>支付宝支付</td>
            </tr>
           <!-- <tr>
                <td><input type="radio" value="2" name="payment"></td>
                <td>网银支付</td>
            </tr>
            <tr>
                <td><input type="radio" value="3" name="payment"></td>
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
                    <textarea type="text" maxlength="150"   id="remark" name="remark" class="textInput"></textarea >
                </td>
            </tr>
        </table>
    </div>
    <!--备注-->
    
</div>





<table class="productList" cellpadding="0" cellspacing="0">
    <tr id="productListHeard">
        <td>商品信息</td>
       <!-- <td width="80">类型</td>-->
        <td width="100">作者</td>
        <td width="100">单价</td>
        <td width="100">价格</td>
        <td width="100">数量</td>
    </tr>
<?php
    foreach($cartInfo as $r){
        foreach($allPid as $k){
            if($r['cid'] == $k){
            $url=$this->createUrl('product/view',array('id'=>$r->pid));
?>
    <tr>
        
        <td>
        <div class="margin_space margin-left">
            <div class="img_float">
                <div class="pic100">
                    <a href="<?=$url;?>"><img alt="<?=$r['name']?>" title="<?=$r['name']?>" src="/assets/upfile/<?=$r['pic']?>"><span class="imgmid"></span></a>
                    <input class="cid" value="<?=$r['cid']?>" type="hidden">
                   
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
      <!--  <td align="center"></td>-->
        <td align="center"><?=$r->getAuthor->name;?></td>
        <td align="center"><span  class="price1">&yen;<?=$r['price'];?></span></td>
        <td align="center"><span id="price_<?=$r['cid'];?>" class="price1">&yen;<?=$r['price']*$r['number']?></span></td>
        <td align="center"><?=$r['number']?></td>

    </tr>
    
<?php
            }
        }
    }
?>
	<tr>
    	<td colspan="8">
        <div class="allPrice">
        --总计：<span id="allPriceInfo">&yen;<?=$Price;?></span>
        </div>
        <div style="clear:both"></div>
        <br/>
        </td>
    </tr>
</table>

<form id="cartForm"  method="post" onsubmit="return subOrder();" action="<?php echo $this->createUrl('order/payOrder'); ?>">
<div class="margin_space">
    <input id="address_id" name="sub_address_id" value="" type="hidden">
    <input id="express" name="sub_express" value="1" type="hidden">
    <input id="payment" name="sub_payment" value="1" type="hidden">
    <input id="pay_price" name="sub_pay_price" value="<?=$Price?>" type="hidden">
    <input id="allCid" name="sub_allCid" value="" type="hidden"/>
    <input id="remarks" name="sub_remarks" value="" type="hidden"/>
    <input type="submit" class="go_order" value="" /> 
    <a class="go_buy" href="/" ><div>继续购物</div></a>
    <div style="clear:both;"></div>
</div>
</form>


<script>
//----提交备注信息
function subMark(){
	var oid = $('#oid').val();
	var content = $('#remark').val();
	$.post("<?php echo $this->createUrl('cart/remark');?>",{oid:oid,content:content,mr:Math.random()},function(msg){
		if(msg == 200){
			//alert('成功！');
		}else{
			alert('备注添加失败！')
		}
	});
}


//----提交收货人信息
function subAddressInfo(){
	var name = $('#name').val();
	var mobile = $('#mobile').val();
        var telephone = $('#telephone').val();
        var areacode = $('#areacode').val();
        var area = $('#area').val();
        var address = $('#address').val();
        $.ajax({
            type:"POST",
            dataType:"json",
            data:{"name":name,"mobile":mobile,"telephone":telephone,"areacode":areacode,"area":area,"address":address},
            url:"<?php echo $this->createUrl('address/ajaxAdd');?>",
            success:function(json) {
                //alert(JSON.stringify(json)); 
                $('#Tname').html(json.name);
                $('#Tmobile').html(json.mobile);
                $('#Ttelephone').html(json.telephone);
                $('#Tareacode').html(json.areacode);
                $('#Tarea').html(json.area);
                $('#Taddress').html(json.address);
                $('#address_id').val(json.id);
                $('#add_address').hide('slow');
                $('#address_info').show('slow'); 
            },
           error:function(){  
               alert('添加收货人信息失败！')
           }  
        });
}
//-----提交已有收货地址
function changeAddress(id){
	$.ajax({
		type:"POST",
		dataType:"json",
		data:{"id":id},
		url:"<?php echo $this->createUrl('address/ChoiceAdd');?>",
		success:function(json) {
			//alert(JSON.stringify(json)); 
			$('#Tname').html(json.name);
			$('#Tmobile').html(json.mobile);
			$('#Ttelephone').html(json.telephone);
			$('#Tareacode').html(json.areacode);
			$('#Tarea').html(json.area);
			$('#Taddress').html(json.address+'&nbsp;&nbsp;<span class="font_blue" onclick="backAddress()">更改</span>');
			$('#address_id').val(json.id);
			$('#add_address').hide('slow');
			$('#address_info').show('slow'); 
		},
	   error:function(){  
		   alert('添加收货人信息失败！')
	   }  
	});
	
}

//----新增收货人地址
function newAddress(){

	<?php
		 $address = Address::model()->findAll('add_id='.Yii::app()->user->id);
		 $criteria = new CDbCriteria;
		 $criteria->compare('add_id='.Yii::app()->user->id,false);
		 $count = Address::model()->count($criteria);
	?>
	var count = <?=$count;?>;
	if(count == 5){
		alert('您最多添加五个常用地址，您可以在‘会员中心--我的收货地址中’修改您的地址');	
		return false;
	}
	

	$('#add_address').show('slow');
	$('.address_info_now').hide('slow');
	$('#address_info').hide('slow'); 
	$('#addAddress_info').show();		
}


//----返回修改地址
function backAddress(){
	$('#add_address').show('slow');
	$('#address_info').hide('slow'); 	
}




//----提交配送方式
$('input[name="express"]').click(function(){
    var price = "";
    var allPrice = <?=$allPrice?>;
    var express1 = <?=$express1?>;
    var express2 = <?=$express2?>;
    var express3 = <?=$express3?>;
    $('#express').val(this.value);
    if(this.value == 1){
        price = allPrice + express1;
        $('#pay_price').val(price);
        $('#allPriceInfo').html('&yen;'+ price);
    }
    if(this.value == 2){
        price = allPrice + express2;
         $('#pay_price').val(price);
        $('#allPriceInfo').html('&yen;'+ price);
    }
    if(this.value == 3){
        price = allPrice + express3;
        $('#pay_price').val(price);
        $('#allPriceInfo').html('&yen;'+ price);
    }
});


//----提交支付方式
$('input[name="payment"]').click(function(){
    $('#payment').val(this.value);
});

//----提交所有产品id
var allCid = new Array();
$('.cid').each(function(i,j){
    cid = j.value;
    allCid.push(cid);
});
$('#allCid').val(allCid);


//----提交订单
function subOrder(){
       
       $('#remarks').val($('#remark').val());
        if($('#address_id').val() == ""){
            alert('请填写收货人信息！');
            return false;
        }  
	
}


</script>

