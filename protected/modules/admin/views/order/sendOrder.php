<?php
/* @var $this OrderController */
/* @var $model Order */

$this->breadcrumbs=array(
	'订单模块'=>array('admin'),
	'发货管理',
);
?>




<table class="adminTable" cellpadding="0" cellspacing="0">
    <tr id="adminTableHeard">
        <td width="100">
            <input id="chkAll"  onClick="ChkAllClick('chkSon[]', 'chkAll')" checked="checked" style="vertical-align:middle;" type="checkbox">
            <span style="vertical-align:middle;">全选</span>
        </td>
        <td width="80">订单编号</td>
        <td >下单时间</td>
        <td>购买者</td>
        <td >订单金额</td>
        <td >配送方式</td>
        <td >支付方式</td>
        <td>订单状态</td>
        <td>操作</td>
    </tr>
    <?php
    foreach ($model as $r) {
        ?>
        <tr id="admin_<?= $r['id']; ?>">
            <td width="100">
                <input id="chkAll"  onClick="ChkAllClick('chkSon[]', 'chkAll')" checked="checked" style="vertical-align:middle;" type="checkbox">
            </td>
            <td><?= $r->id; ?></td>
            <td><?=substr($r->add_time,0,10);?></td>
            <td><?= $r->buyUser->name; ?></td>
            <td><span class="price1">&yen;<?=$r->allPrice;?></span></td>
            <td>
                <?php
                    if($r['express'] == 1){
                        echo '普通快递';
                    }
                    if($r['express'] == 2){
                        echo 'EMS快递';
                    }
                    if($r['express'] == 3){
                        echo '顺丰快递';
                    }
                ?>
            </td>
            <td>
                <?php
                    if($r['payment'] == 1){
                        echo '支付宝支付';
                    }
                    if($r['payment'] == 2){
                        echo '网银支付';
                    }
                    if($r['payment'] == 3){
                        echo '余额支付';
                    }
                ?>
            </td>
            <td>
                <?php
                    if($r['order_stat'] == 1){
                        echo '待付款';
                    }
                    if($r['order_stat'] == 2){
                        echo '已取消';
                    }
                    if($r['order_stat'] == 3){
                        echo '待发货';
                    }
                    if($r['order_stat'] == 4){
                        echo '已发货';
                    }
                    if($r['order_stat'] == 5){
                        echo '确认收货';
                    }
                    if($r['order_stat'] == 6){
                        echo '交易完成';
                    }
                ?>
            </td>
            <td style="line-height:20px;">
                <a id="font_blue" target="_blank"  href="<?= $this->createUrl('order/view', array('id' => $r->id)) ?>">查看</a>
                <br/>
                <a id="font_blue" target="_blank"  href="<?= $this->createUrl('order/update', array('id' => $r->id)) ?>">修改</a>&nbsp;&nbsp;<?php echo CHtml::link(Yii::t('cmp', '删除'), 'javascript:', array('id' => 'font_blue', 'onclick' => 'return art_del_confirm("' . $r['id'] . '")')) ?> 
            </td>
        </tr>
        <?php
    }
    ?>
</table>

<ul class="pageList">
    <?php
    //$pageALL ----总页数
    //$onpage ----当前页数
    if ($onpage > 0) {
        ?>
        <a href="<?php
        echo $this->createUrl('order/admin', array('page' => $onpage - 1));
        ?>"><li>上一页</li></a>
           <?php
       }
       ?>

    <?php
    for ($i = 1; $i <= $pageALL; $i++) {
        ?>
        <a  href="<?php
        echo $this->createUrl('order/admin', array('page' => $i - 1));
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
        echo $this->createUrl('order/admin', array('page' => $onpage + 1));
        ?>"><li>下一页</li></a> 
        <?php
    }
    ?> 
</ul>

<div style="clear: both"></div>

<script>
    //删除确认框  
    function art_del_confirm(id) {
        cm = confirm("确定删除吗？       ");
        if (cm) {
            $.post("index.php?r=admin/order/delete&id=" + id, null, function(msg) {

                if (msg == 200) {
                    $('#admin_' + id).remove();
                } else {
                    alert('删除失败！')
                }
            });
        } else {

        }
    }
    
    //----查询订单状态
   $('#orderStat').change(function(){

       $('#admin-form').submit();
   });
   
   //----查询支付方式
   $('#payment').change(function(){
       $('#admin-form').submit();
   });
   
   //----查询配送方式
   $('#express').change(function(){
       $('#admin-form').submit();
   });
   
    
</script>
