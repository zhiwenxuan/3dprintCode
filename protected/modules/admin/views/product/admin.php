<div class="container-fluid"> 
  
  <!-- BEGIN PAGE HEADER-->
  <div class="row-fluid">
    <div class="span12"> 
      
      <!-- BEGIN STYLE CUSTOMIZER -->
      <!-- END BEGIN STYLE CUSTOMIZER --> 
      
      
      
      <!-- BEGIN PAGE TITLE & BREADCRUMB-->
      
      <h3 class="page-title"> 模型中心 <small></small> </h3>
      <ul class="breadcrumb">
        <li> <i class="icon-home"></i> 首页 <i class="icon-angle-right"></i> </li>
        <li>模型中心 <i class="icon-angle-right"></i></li>
        <li>模型管理</li>
      </ul>
      
      <!-- END PAGE TITLE & BREADCRUMB--> 
      
    </div>
  </div>
  <!-- END PAGE HEADER-->
  
  
  
  
  <!-- BEGIN PAGE CONTENT-->
  
  <div class="row-fluid">
      
  
      <div class="span12">
      
      <form id="admin-form" method="post" action="<?php echo $this->createUrl('product/admin'); ?>" >
      <div class="control-group pull-left margin-right-20">
    	<label class="control-label">商品状态</label>
    	<div class="controls">
    	<select id="p_stat" class="small m-wrap" tabindex="1" name="stat">
            <option value=""  <?php if($stat == "") echo 'selected="selected"'; ?>>&nbsp;全部&nbsp;</option>
            <option value="1" <?php if($stat == 1) echo 'selected="selected"'; ?>>&nbsp;待审核&nbsp;</option>
            <option value="2" <?php if($stat == 2) echo 'selected="selected"'; ?>>&nbsp;已审核&nbsp;</option>
    	</select>
    	</div>
      </div>
      <!-------------------------------------------------------------------------------->
      <div class="control-group pull-left">
    	<label class="control-label">上架状态</label>
    	<div class="controls">
    	<select id="p_on" class="small m-wrap" tabindex="1" name="shelves">
            <option value=""  <?php if($shelves == "") echo 'selected="selected"'; ?>>&nbsp;全部&nbsp;</option>
            <option value="1" <?php if($shelves == 1) echo 'selected="selected"'; ?>>&nbsp;待上架&nbsp;</option>
            <option value="2" <?php if($shelves == 2) echo 'selected="selected"'; ?>>&nbsp;已上架&nbsp;</option>
    	</select>
    	</div>
      </div>
      <div class="clear"></div>
      </form>
      
      
      <form id="order-form" method="post" action="<?php echo $this->createUrl('product/admin'); ?>" >
      <div class="input-append pull-left margin-right-20">
      <input placeholder="商品编号" class="m-wrap" name="id" value="<?= $id ?>" type="text">
      <button class="btn green" type="submit">&nbsp;搜索&nbsp;</button>
      </div>
      <div class="input-append  pull-left">
      <input placeholder="发布者" name="addUser" value="<?= $addUser ?>" class="m-wrap" type="text">
      <button class="btn green" type="submit">&nbsp;搜索&nbsp;</button>
      </div>
      <div class="clear"></div>
      </form>

          <!-- BEGIN EXAMPLE TABLE PORTLET-->
  
          <div class="portlet box light-grey">
  
              <div class="portlet-title">
  
                  <div class="caption"><i class="icon-globe"></i>模型列表</div>
  
                  <div class="tools">
  
                      <a href="javascript:;" class="collapse"></a>

                  </div>
  
              </div>
  
              <div class="portlet-body">
  
                  <table class="table table-striped table-bordered table-hover" id="sample_1">
  
                      <thead>
  
                          <tr> 
                              <th width="40">编号</th>
  
                              <th class="hidden-480">商品信息</th>
  
                              <th class="hidden-480">价格</th>
                              <th class="hidden-480" width="80">状态</th>
  
                              <th class="hidden-480" width="80">上架</th>
                              <th class="hidden-480" width="120">发布者</th>
                              <th class="hidden-480" width="120" >发布时间</th>
  
                              <th class="hidden-480" width="190"></th>
  
                          </tr>
  
                      </thead>
  
                      <tbody>
                          <?php
							foreach ($model as $r) {
						  ?>
                          <tr class="odd gradeX" id="admin_<?= $r['id']; ?>">
  
                              <td><?= $r->id; ?></td>
  
                              <td class="hidden-480"><?= $r->name; ?></td>
  
                              <td class="hidden-480"><span class="price">&yen;<?=$r->price;?></span></td>
                              <td class="hidden-480">
                              	<?php
									if($r->stat == 1){
										echo '待审核';
									}
									if($r->stat == 2){
										echo '已审核';
									}
								?>
                              </td>
                              <td class="hidden-480">
                              	<?php
									if($r->shelves == 1){
										echo '待上架';
									}
									if($r->shelves == 2){
										echo '已上架';
									}
								?>
                              </td>
                              <td class="hidden-480"><?= $r->addUser->name; ?> </td>
                              <td class="center hidden-480"><?=$r->add_time;?></td>
  
                              <td >
                              <a class="btn  green-stripe" target="_blank" href="<?= $this->createUrl('/product/view', array('id' => $r->id)) ?>">查看</a>
                              <a class="btn  blue-stripe" href="<?= $this->createUrl('product/update', array('id' => $r->id)) ?>">编辑</a>
                              <a class="btn  red-stripe" onclick="Delete(<?=$r->id;?>)">删除</a>
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
					<li><a href="<?php echo $this->createUrl('product/admin', array('page' => $onpage - 1,'stat' => $stat,'shelves' => $shelves,'id'=>$id,'addUser'=>$addUser));?>">上一页</a></li>
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
					><a  href="<?php echo $this->createUrl('product/admin', array('page' => $i - 1,'stat' => $stat,'shelves' => $shelves,'id'=>$id,'addUser'=>$addUser));	?>"><?= $i; ?></li></a>   
					<?php
						}
					?>		 
					
					<?php
						if ($pageALL > $onpage + 1) {
					?>
					<li><a href="<?php	echo $this->createUrl('product/admin', array('page' => $onpage + 1,'stat' => $stat,'shelves' => $shelves,'id'=>$id,'addUser'=>$addUser));?>">下一页</a></li> 
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
		$('#model_page').addClass('active');	
		$('#product_page').addClass('active');
	});
	
	//----查询商品状态
    $('#p_stat').change(function(){
       $('#admin-form').submit();
    });
	
	//----查询上架
    $('#p_on').change(function(){
       $('#admin-form').submit();
    });
	
	//删除确认框  
    function Delete(id) {
        cm = confirm("确定删除吗？       ");
        if (cm) {
            $.post("/index.php/admin/product/delete/",{id:id,mr:Math.random()}, function(msg) {
				
                if (msg == 200) {
                    $('#admin_' + id).remove();
                } else {
                    alert('删除失败！')
                }
            });
        } else {

        }
    }
	
	
</script>