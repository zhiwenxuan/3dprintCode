<h1>购物车</h1>
<?php
//print_r($dataProvider);
$allPrice = 0;
?>


<form id="cartForm"  method="post" onsubmit="return cartFormSubmit();" action="<?php echo $this->createUrl('cart/Form'); ?>">
    <input type="hidden" id="all_cart_price" name="all_cart_price">
    <table class="cartList" cellpadding="0" cellspacing="0">
        <tr id="cartListHeard">
            <td width="100">
                <input id="chkAll" checked="checked"  onClick="ChkAllClick('chkSon[]', 'chkAll')"  style="vertical-align:middle;" type="checkbox">
                <span style="vertical-align:middle;">全选</span>
            </td>
            <td>商品信息</td>
            <!--<td width="80">类型</td>-->
            <td width="100">单价</td>
            <td width="100">价格</td>
            <td width="100">数量</td>
            <td width="100">购买时间</td>
            <td width="100">操作</td>
        </tr>
        <?php
        foreach ($dataProvider as $r) {
            $url = $this->createUrl('product/view', array('id' => $r->pid));
            ?>
            <tr id="cart_<?= $r['cid']; ?>">
                <td align="center"><input class="cart_id" checked="checked" name="chkSon[]" type="checkbox" onclick="changeAllPrice();" pid="<?= $r['pid'] ?>" price = "<?= $r['price']; ?>"  oldNum = "<?= $r['number'] ?>" value="<?= $r['cid']; ?>"/></td>
                <td>
                    <div class="margin_space">
                        <div class="img_float">
                            <div class="pic100">
                                <a href="<?= $url; ?>"><img alt="<?= $r['name'] ?>" title="<?= $r['name'] ?>" src="/assets/upfile/<?= $r['pic'] ?>"><span class="imgmid"></span></a>
                                
                            </div>
                        </div>
                        <div class="info_float">
                            <div style="height:40px;"><a href="<?= $url; ?>"><?= $r['name'] ?></a></div>
                            材质：
                            <?php
                            if ($r['material'] == 1) {
                                echo '金属';
                            } else {
                                echo '塑料';
                            }
                            ?>
                            <br/>
                            <div style="float:left; line-height: 25px;">颜色：</div><div color="<?= $r['color']; ?>" class="selectProductColor"><div style="background:<?= $r['color']; ?>; width: 100%; height: 100%"></div></div>
                        </div>
                        <div style="clear:both;">
                        </div>
                </td>
              <!--  <td align="center"></td>-->
                <td align="center"><span  class="price1">&yen;<?= $r['price']; ?></span></td>
                <td align="center"><span id="price_<?= $r['cid']; ?>" class="price1">&yen;<?= $r['price'] * $r['number'] ?></span></td>
                <td align="center"><input id="number_<?= $r['cid']; ?>"  cid="<?= $r['cid']; ?>" onblur="changePrice('price_<?= $r['cid']; ?>', this, '<?= $r['price']; ?>');"  price = "<?= $r['price']; ?>" onkeyup="this.value = this.value.replace(/\D/g, '')"  onafterpaste="this.value=this.value.replace(/\D/g,'')" type="text" class="carNumber" name="numAll[]" value="<?= $r['number'] ?>"/></td>
                <td align="center"><?= substr($r['buy_time'], 0, 10) ?></td>
                <td align="center">
	                   <a onclick="DeleteCart(<?= $r['cid']; ?>)">删除</a>
                </td>
            </tr>

    <?php
    $allPrice += $r['price'] * $r['number'];
}
?>
        <tr>
            <td colspan="8">
                <div class="allPrice">
                    --总计：<span id="allPriceInfo">&yen;<?= $allPrice; ?></span>
                </div>
                <div style="clear:both"></div>
                <div class="margin_space">

                    <a id="cDelete"><div>删除选中</div></a>

                    <input type="submit" class="going_down" value="" /> 
                    <a class="go_buy" href="<?php echo Yii::app()->homeUrl; ?>" ><div>继续购物</div></a>
                    <div style="clear:both;"></div>
                </div>

            </td>
        </tr>

    </table>
</form>




<script type="text/javascript">

	



	//总金额
    function changePrice(id, num, price) {
        var cartAllPrice = "";//----总价	
        $('.cart_id').each(function(i, j) {
            var priceAll_html = "";
            priceAll_html += '&yen;' + num.value * price;
            $('#' + id).html(priceAll_html);

            if (j.checked == true) {

                var newNum = $('#number_' + j.value).val();
                var allPrice = parseInt(newNum * $(j).attr("price"));
                cartAllPrice = cartAllPrice * 1 + allPrice * 1;
                $('#allPriceInfo').html('&yen;' + cartAllPrice);

            }


        });
        $('#all_cart_price').val(cartAllPrice);


        $('.cart_id').each(function(i, j) {
            if (j.checked == true) {
                cid = $(j).val();
                //alert(cid)
                num = $('#number_' + j.value).val();
                //alert(num);
                $.post("/index.php/cart/update",{cid:cid,num:num,mr:Math.random()}, null, function(msg){});
            }
        });
    }
	
	
	//----单独删除
	function DeleteCart(id){
		$.post("<?php echo $this->createUrl('cart/deletethis'); ?>",{id:id, mr:Math.random()}, function(msg) {

            if (msg == 200) {
				$('#cart_' + id).remove();

					var cartAllPrice = "";//----总价	
					$('input[name="numAll[]"]').each(function(i, j) {
						//----当前的数量            alert(j.value);
						//----当前的价格            alert($(j).attr('price'));
	
						var newNum = parseInt(j.value);
						var allPrice = parseInt(j.value * $(j).attr('price'));
						cartAllPrice = cartAllPrice * 1 + allPrice * 1;
	
	
					});
					if(cartAllPrice == ""){
						cartAllPrice = 0;
					}
					
					$('#allPriceInfo').html('&yen;' + cartAllPrice);
				}
        });
	}
	
	


	//----多选删除功能
    $('#cDelete').click(function() {
        //----取到多选的id
        var ccid = new Array();
        $('.cart_id').each(function(i, j) {
            if (j.checked == true) {
                sccid = j.value;
                ccid.push(sccid);
            }
        });

        //----ajax删除取到的数据
        $.post("<?php echo $this->createUrl('cart/ajaxdelete'); ?>",{ccid:ccid, mr:Math.random()}, function(msg) {
            if (msg == 200) {
                $('.cart_id').each(function(i, j) {
                    if (j.checked == true) {
                        $('#cart_' + j.value).remove();
                    }
                });
                var cartAllPrice = "";//----总价	
                $('input[name="numAll[]"]').each(function(i, j) {
                    //----当前的数量            alert(j.value);
                    //----当前的价格            alert($(j).attr('price'));

                    var newNum = parseInt(j.value);
                    var allPrice = parseInt(j.value * $(j).attr('price'));
                    cartAllPrice = cartAllPrice * 1 + allPrice * 1;


                });
                $('#allPriceInfo').html('&yen;' + cartAllPrice);

            }
        });
    });

	//----全部选中
    function ChkAllClick(sonName, cbAllId) {
        var arrSon = document.getElementsByName(sonName);
        var cbAll = document.getElementById(cbAllId);
        var tempState = cbAll.checked;
        for (i = 0; i < arrSon.length; i++) {
            if (arrSon[i].checked != tempState) {
                arrSon[i].click();
            }
        }

        var cartAllPrice = "";//----总价	
        $('.cart_id').each(function(i, j) {
            if (j.checked == true) {

                var newNum = $('#number_' + j.value).val();	
                var allPrice = parseInt(newNum * $(j).attr("price"));
                cartAllPrice = cartAllPrice * 1 + allPrice * 1;
                $('#allPriceInfo').html('&yen;' + cartAllPrice);

            } else {
                cartAllPrice = 0;
                $('#allPriceInfo').html('&yen;' + cartAllPrice);
            }
        });
        $('#all_cart_price').val(cartAllPrice);



    }

    function changeAllPrice() {
        var cartAllPrice = "";//----总价
        var checkbox = 1;
        $('.cart_id').each(function(i, j) {
            if (j.checked == true) {
				$('#number_' + j.value).attr('disabled',false);
				var newNum = $('#number_' + j.value).val();
                var allPrice = parseInt(newNum * $(j).attr("price"));
                cartAllPrice = cartAllPrice * 1 + allPrice * 1;
                $('#allPriceInfo').html('&yen;' + cartAllPrice);
                checkbox++;
            }
			
			if (j.checked == false) {
			
				$('#number_' + j.value).attr('disabled',true);	
				
			}
			

            if (checkbox == 1) {
                cartAllPrice = 0;
                $('#allPriceInfo').html('&yen;' + cartAllPrice);
            }


        });
        $('#all_cart_price').val(cartAllPrice);
    }



//----提交购物车
    function cartFormSubmit() {

        var pids = new Array(); //商品id
        var prices = new Array();//价格
        var nums = new Array();//数量
        //alert($('.cart_id').val());



        if ($('.cart_id').val()) {


            $('.cart_id').each(function(i, j) {
                if (j.checked == true) {

                    pid = $(j).attr("pid");
                    pids.push(pid);

                    price = $(j).attr("price");
                    prices.push(price);
                    //alert(j.value)

                    num = $('#number_' + j.value).val();
                    nums.push(num);

                }
                $('#productId').val(pids);//商品id
                $('#cart_price').val(prices);//每个商品的单价
                $('#buyNum').val(nums);
                changeAllPrice();
            });

        } else {
            alert("您购物车中没有商品！");
            return false;
        }

        if ($('#all_cart_price').val() == 0) {
            alert("您没有可提交的商品！");
            return false;
        }


    }
</script>