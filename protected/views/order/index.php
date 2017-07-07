<?php
//print_r($pageALL);
//print_r($onpage);
//print_r($model);
$this->renderpartial('//customer/left');
?>


<div class="float_left">
    
    
    <div style="width:828px; margin-left:18px; margin-bottom:18px; border-bottom:1px solid #dedede; height:40px; line-height:30px;">
    	<span style="font-family:'微软雅黑'; font-size:20px;">我的订单</span>
    </div>
	
    
    <?php
		$result = empty($dataProvider); 
		
		foreach ($dataProvider as $r) {	
			
	?>
    <table id="product_<?= $r['id']; ?>" class="productList_mb" cellpadding="0" cellspacing="0">
     	
        <tr id="productListHeard">
            <td width="320" style="text-align:left; padding-left:20px;">
            <?php
				if ($r['order_stat'] == 1) {
					echo '<span id="font_blue">待付款</span>';
				} else if ($r['order_stat'] == 2) {
					echo '<span id="font_blue">已付款</span>';
				} else if ($r['order_stat'] == 3) {
					echo '<span id="font_blue">已发货</span>';
				} else if ($r['order_stat'] == 4) {
					echo '<span id="font_blue">交易成功</span>';
				} else if ($r['order_stat'] == 5) {
					echo '<span id="font_blue">交易关闭</span>';
				}
			?>
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;订单编号<span style="color:#000;"><?= $r['id']; ?></span>
			<span style="color:#000;">
			<?php 
			 	if($r['ad_name'] != ''){
					echo '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'. $r['ad_name'];
				} 
			?>
            </span>
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?= substr($r['add_time'], 0, 22) ?>
            </td>
            <td width="120"></td>
            <td width="120"></td>
        </tr>
       
        <tr>
            <td>
            <!--商品信息-->
            <?php
            foreach ($productInfo as $k) {
                if ($k['order_id'] == $r['id']) {
                    $url = $this->createUrl('product/view', array('id' => $k->p_id));
            ?>
                <div class="margin_space_4">
                    <div class="img_float">
                        <div class="pic100">
                            <a href="<?= $url; ?>"><img  alt="<?= $k['name'] ?>" title="<?= $k['name'] ?>" src="/assets/upfile/<?= $k['pic'] ?>"></a><span class="imgmid"></span>
                        </div>
                    </div>
                    <div class="info_float">
                        <div style="height:30px; margin-top:18px;"><a style="color:#000; font-size:13px;" href="<?= $url; ?>"><?= $k['name'] ?></a></div>
                        <div>发布者：<?= $k->getAuthor->name; ?></div>
                    </div>
                    <div style="clear:both;"></div>
                </div>
            <?php
                }
            }
            ?>
            </td>
            <td align="center"><span  class="price1">&yen;<?= $r['allPrice']; ?></span></td>
            <td align="center">
            	<a id="font_blue"  href="<?= $this->createUrl('order/view', array('id' => $r->id)) ?>">订单详情</a>
                
                <?php
                	if ($r['order_stat'] == 1) {
                ?>	
                	<br/>
               		<br/>
                    <a id="font_blue"  href="<?= $this->createUrl('order/view', array('id' => $r->id)) ?>">立即付款</a>
                    <?php echo CHtml::link(Yii::t('cmp', '取消订单'), 'javascript:', array('class' => 'font_blue', 'onclick' => 'return art_del_confirm("' . $r['id'] . '")')) ?> 

                <?php
                	}
                ?>
                    
                <?php
                	if ($r['order_stat'] == 2) {
                ?>
                    <!--<br/>
                	<br/>
                    <a id="font_blue"  href="">退款申请</a>-->

                <?php
                	}
                ?>
                    
                <?php
                if ($r['order_stat'] == 3) {
                ?>
                   <br/>
               	   <br/>
                    <?php echo CHtml::link(Yii::t('cmp', '确认收货'), 'javascript:', array('class' => 'font_blue', 'onclick' => 'return takeProduct("' . $r['id'] . '")')) ?> 
                    <a id="font_blue"  href="">退款申请</a>

                <?php
                }
                ?>

            </td>
        </tr>
    </table>
	<?php
        }
    ?>





    <ul class="pageList">
        <?php
		//$pageALL ----总页数
		//$onpage ----当前页数
        if ($onpage > 0) {
            ?>
            <a href="<?php
            if ($action == "index") {
                echo $this->createUrl('order/index', array('page' => $onpage - 1, 'stat' => $stat));
            }
            if ($action == "needpay") {
                echo $this->createUrl('order/needpay', array('page' => $onpage - 1, 'stat' => $stat));
            }
            if ($action == "overpay") {
                echo $this->createUrl('order/overpay', array('page' => $onpage - 1, 'stat' => $stat));
            }
            if ($action == "needtake") {
                echo $this->createUrl('order/needtake', array('page' => $onpage - 1, 'stat' => $stat));
            }
            if ($action == "cancelorder") {
                echo $this->createUrl('order/cancelorder', array('page' => $onpage - 1, 'stat' => $stat));
            }
            if ($action == "overorder") {
                echo $this->createUrl('order/overorder', array('page' => $onpage - 1, 'stat' => $stat));
            }
            ?>"><li>上一页</li></a>
               <?php
           }
           ?>

        <?php
        for ($i = 1; $i <= $pageALL; $i++) {
            ?>
            <a  href="<?php
            if ($action == "index") {
                echo $this->createUrl('order/index', array('page' => $i - 1, 'stat' => $stat));
            }
            if ($action == "needpay") {
                echo $this->createUrl('order/needpay', array('page' => $i - 1, 'stat' => $stat));
            }
            if ($action == "overpay") {
                echo $this->createUrl('order/overpay', array('page' => $i - 1, 'stat' => $stat));
            }
            if ($action == "needtake") {
                echo $this->createUrl('order/needtake', array('page' => $i - 1, 'stat' => $stat));
            }
            if ($action == "cancelorder") {
                echo $this->createUrl('order/cancelorder', array('page' => $i - 1, 'stat' => $stat));
            }
            if ($action == "overorder") {
                echo $this->createUrl('order/overorder', array('page' => $i - 1, 'stat' => $stat));
            }
            ?>"><li 
                    <?php
                    if ($onpage == $i - 1) {
                        echo 'id="pageListSel"';
                    }
                    ?>
                    ><?= $i; ?></li></a>   

            <?php
        }
        ?>		 

        <?php
        if ($pageALL > $onpage + 1) {
            ?>
            <a href="<?php
            if ($action == "index") {
                echo $this->createUrl('order/index', array('page' => $onpage + 1, 'stat' => $stat));
            }
            if ($action == "needpay") {
                echo $this->createUrl('order/needpay', array('page' => $onpage + 1, 'stat' => $stat));
            }
             if ($action == "overpay") {
                echo $this->createUrl('order/overpay', array('page' => $onpage + 1, 'stat' => $stat));
            }
            if ($action == "needtake") {
                echo $this->createUrl('order/needtake', array('page' => $onpage + 1, 'stat' => $stat));
            }
            if ($action == "cancelorder") {
                echo $this->createUrl('order/cancelorder', array('page' => $onpage + 1, 'stat' => $stat));
            }
            if ($action == "overorder") {
                echo $this->createUrl('order/overorder', array('page' => $onpage + 1, 'stat' => $stat));
            }
            ?>"><li>下一页</li></a> 
               <?php
           }
           ?> 
    </ul>
    <div style="clear:both"></div>
</div>
<div class="clear"></div>
<script>
//单项删除确认框  
    function art_del_confirm(id) {
        cm = confirm("确定取消吗？       ");
        if (cm) {
            $.post("/index.php/order/ajaxdelete",{id:id, mr:Math.random()}, function(msg) {

                if (msg == 200) {
					alert('订单已取消！')   
                    //$('#product_' + id).remove();
					 history.go(0); 
                } else {
                    alert('取消失败！')
                }
            });
        } else {

        }
    }

    //----提醒买家发货
    function sendProduct(id){
        $.post("index.php?r=order/ajaxsend&id=" + id, null, function(msg) {

                if (msg == 200) {
                    alert('提醒成功！')   
                } else {
                    alert('提醒失败！')
                }
            });
    }
    //----确认收货功能
    function takeProduct(id) {
      
        $.post("index.php?r=order/ajaxtake&id=" + id, null, function(msg) {

            if (msg == 200) {
                alert('收货成功，交易成功！');
                $('#product_' + id).remove();
            } else {
                alert('确认收货失败！')
            }
        });

    }

</script>