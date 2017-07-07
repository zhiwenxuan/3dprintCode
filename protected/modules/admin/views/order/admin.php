<div class="container-fluid"> 
  
  <!-- BEGIN PAGE HEADER-->
  <div class="row-fluid">
    <div class="span12"> 
      
      <!-- BEGIN STYLE CUSTOMIZER -->
      <!-- END BEGIN STYLE CUSTOMIZER --> 
      
      
      
      <!-- BEGIN PAGE TITLE & BREADCRUMB-->
      
      <h3 class="page-title"> 订单中心 <small></small> </h3>
      <ul class="breadcrumb">
        <li> <i class="icon-home"></i> 首页 <i class="icon-angle-right"></i> </li>
        <li>订单中心 <i class="icon-angle-right"></i></li>
        <li>订单管理</li>
      </ul>
      
      <!-- END PAGE TITLE & BREADCRUMB--> 
      
    </div>
  </div>
  <!-- END PAGE HEADER-->
  
  
  
  
  <!-- BEGIN PAGE CONTENT-->
  
  <div class="row-fluid">
      
  
      <div class="span12">
      
      <form id="admin-form" method="post" action="<?php echo $this->createUrl('order/admin'); ?>" >
      <div class="control-group pull-left margin-right-20">
    	<label class="control-label">订单状态</label>
    	<div class="controls">
    	<select id="orderStat" class="small m-wrap" tabindex="1" name="stat">
            <option value=""  <?php if($stat == "") echo 'selected="selected"'; ?>>全部</option>
            <option value="1" <?php if($stat == 1) echo 'selected="selected"'; ?>>待付款</option>
            <option value="2" <?php if($stat == 2) echo 'selected="selected"'; ?>>已付款</option>
            <option value="4" <?php if($stat == 4) echo 'selected="selected"'; ?>>交易完成</option>
            <option value="5" <?php if($stat == 5) echo 'selected="selected"'; ?>>已取消</option>
    	</select>
    	</div>
      </div>
      <!-------------------------------------------------------------------------------->
      <div class="control-group pull-left">
    	<label class="control-label">支付方式</label>
    	<div class="controls">
    	<select id="payment" class="small m-wrap" tabindex="1" name="payment">
            <option value=""  <?php if($payment == "") echo 'selected="selected"'; ?>>全部</option>
            <option value="1" <?php if($payment == 1) echo 'selected="selected"'; ?>>支付宝支付</option>
            <option value="2" <?php if($payment == 2) echo 'selected="selected"'; ?>>网银支付</option>
            <option value="3" <?php if($payment == 3) echo 'selected="selected"'; ?>>余额支付</option>
    	</select>
    	</div>
      </div>
      <div class="clear"></div>
      </form>
      
      
      <form id="order-form" method="post" action="<?php echo $this->createUrl('order/admin'); ?>" >
      <div class="input-append pull-left margin-right-20">
      <input placeholder="订单编号" class="m-wrap" name="id" value="<?= $id ?>" type="text">
      <button class="btn green" type="submit">&nbsp;搜索&nbsp;</button>
      </div>
      <div class="input-append  pull-left margin-right-20">
      <input placeholder="购买者" name="buyUser" value="<?= $buyUser ?>" class="m-wrap" type="text">
      <button class="btn green" type="submit">&nbsp;搜索&nbsp;</button>
      </div>
      <div class="input-append  pull-left">
      <input placeholder="邮箱地址" name="buyEmail" value="<?= $buyEmail ?>" class="m-wrap" type="text">
      <button class="btn green" type="submit">&nbsp;搜索&nbsp;</button>
      </div>
      <div class="clear"></div>
      </form>

          <!-- BEGIN EXAMPLE TABLE PORTLET-->
  
          <div class="portlet box light-grey">
  
              <div class="portlet-title">
  
                  <div class="caption"><i class="icon-globe"></i>订单列表</div>
  
                  <div class="tools">
  
                      <a href="javascript:;" class="collapse"></a>

                  </div>
  
              </div>
  
              <div class="portlet-body">
  
                  <table class="table table-striped table-bordered table-hover" id="sample_1">
  
                      <thead>
  
                          <tr> 
                              <th >编号</th>
  
                              <th class="hidden-480">下单时间</th>
  
                              <th class="hidden-480">购买者</th>
                              <th class="hidden-480" width="80">联系电话</th>
  
                              <th class="hidden-480" width="80">订单金额</th>
                              <th class="hidden-480" width="120">支付方式</th>
                              <th class="hidden-480" width="120" >订单状态</th>
  
                              <th class="hidden-480" width="190"></th>
  
                          </tr>
  
                      </thead>
  
                      <tbody>

                          <?php
							foreach ($model as $r) {
						  ?>
                          <tr class="odd gradeX">
  
                              <td><?= $r->id; ?></td>
  
                              <td class="hidden-480"><?=$r->add_time;?></td>
  
                              <td class="hidden-480"><?= $r->buyUser->name; ?></td>
                              <td class="hidden-480">
                              	<?php
									foreach ($amodel as $a){
										if($a['id'] == $r['address']){
											echo $a['mobile'];
										}
									}
								?>
                              </td>
                              <td class="hidden-480">
                              	<span class="price">&yen;<?=$r->allPrice;?></span>
                              </td>
                              <td class="hidden-480">
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
                              <td id="admin_<?= $r['id']; ?>" class="center hidden-480">
                              <?php
									if($r['order_stat'] == 1){
										echo '待付款';
									}
									if($r['order_stat'] == 2){
										echo '已付款';
									}
			
									if($r['order_stat'] == 4){
										echo '交易完成';
									}
									if($r['order_stat'] == 5){
										echo '已取消';
									}
							  ?>
                              </td>
  
                              <td >
                              <a class="btn  green-stripe" href="<?= $this->createUrl('order/view', array('id' => $r->id)) ?>">查看</a>
                              <a class="btn  blue-stripe" href="<?= $this->createUrl('order/update', array('id' => $r->id)) ?>">编辑</a>
                              <a class="btn  red-stripe" onclick="Delete(<?=$r->id;?>)">取消</a>
                              </td>
  
                          </tr>
						  <?php
                    		}
                    	  ?>
                      </tbody>
  
                  </table>
                  <div class="pagination pagination-centered">
                  	<ul>
                    <?php
						//$pageALL ----总页数
						//$onpage ----当前页数
						if ($onpage > 0) {
					?>
					<li><a href="<?php echo $this->createUrl('order/admin', array('page' => $onpage - 1,'stat' => $stat,'payment' => $payment,'id'=>$id,'buyUser'=>$buyUser,'buyEmail'=>$buyEmail));?>">上一页</a></li>
					<?php
						}
					?>
					
					<?php
						for ($i = 1; $i <= $pageALL; $i++) {
					?>
					<li 
                    	<?php
							if ($onpage == $i - 1) {
								echo 'class="active"';
							}
						?>
					><a  href="<?php echo $this->createUrl('order/admin', array('page' => $i - 1,'stat' => $stat,'payment' => $payment,'id'=>$id,'buyUser'=>$buyUser,'buyEmail'=>$buyEmail));	?>"><?= $i; ?></li></a>   
					<?php
						}
					?>		 
					
					<?php
						if ($pageALL > $onpage + 1) {
					?>
					<li><a href="<?php	echo $this->createUrl('order/admin', array('page' => $onpage + 1,'stat' => $stat,'payment' => $payment,'id'=>$id,'buyUser'=>$buyUser,'buyEmail'=>$buyEmail));?>">下一页</a></li> 
					<?php
						}
					?> 
                    </ul>
                  </div>
              </div>              
          </div>
          <!-- END EXAMPLE TABLE PORTLET-->
      </div>
  </div>
  <!-- END PAGE CONTENT-->
</div>

<script>
	jQuery(document).ready(function(){
		$('#order_center_page').addClass('active');	
		$('#order_page').addClass('active');
	});
	
	//----查询订单状态
    $('#orderStat').change(function(){
       $('#admin-form').submit();
    });
	
	//----查询支付方式
    $('#payment').change(function(){
       $('#admin-form').submit();
    });
	
	//取消确认框  
    function Delete(id) {
        cm = confirm("确定取消该订单吗？       ");
        if (cm) {
            $.post("/index.php/admin/order/delete/",{id:id,mr:Math.random()}, function(msg) {
				
                if (msg == 200) {
                    $('#admin_' + id).html('已取消');
                } else {
                    alert('取消失败！')
                }
            });
        } else {

        }
    }
	
	
</script>
