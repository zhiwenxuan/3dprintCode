<div class="container-fluid"> 
  
  <!-- BEGIN PAGE HEADER-->
  <div class="row-fluid">
    <div class="span12"> 
      
      <!-- BEGIN STYLE CUSTOMIZER -->
      <!-- END BEGIN STYLE CUSTOMIZER --> 
      
      
      
      <!-- BEGIN PAGE TITLE & BREADCRUMB-->
      
      <h3 class="page-title"> 博客中心 <small></small> </h3>
      <ul class="breadcrumb">
        <li> <i class="icon-home"></i> 首页 <i class="icon-angle-right"></i> </li>
        <li>博客中心 <i class="icon-angle-right"></i></li>
        <li>博客管理</li>
      </ul>
      
      <!-- END PAGE TITLE & BREADCRUMB--> 
      
    </div>
  </div>
  <!-- END PAGE HEADER-->
  
  
  
  
  <!-- BEGIN PAGE CONTENT-->
  
  <div class="row-fluid">
      
  
      <div class="span12">
      
      <form id="admin-form" method="post" action="<?php echo $this->createUrl('blogLog/admin'); ?>" >
      <div class="control-group">
    	<label class="control-label">博客状态</label>
    	<div class="controls">
    	<select id="b_stat" class="small m-wrap" tabindex="1" name="stat">
            <option value=""  <?php if($stat == "") echo 'selected="selected"'; ?>>&nbsp;全部&nbsp;</option>
            <option value="1" <?php if($stat == 1) echo 'selected="selected"'; ?>>&nbsp;正常&nbsp;</option>
            <option value="2" <?php if($stat == 2) echo 'selected="selected"'; ?>>&nbsp;已推送&nbsp;</option>
    	</select>
    	</div>
      </div>
      </form>
      
      
      <form id="order-form" method="post" action="<?php echo $this->createUrl('blogLog/admin'); ?>" >
      <div class="input-append pull-left margin-right-20">
      <input placeholder="博客标题" class="m-wrap" name="title" value="<?= $title;?>" type="text">
      <button class="btn green" type="submit">&nbsp;搜索&nbsp;</button>
      </div>
      
      <div class="input-append  pull-left">
      <input placeholder="作者" name="addUser" value="<?= $addUser ?>" class="m-wrap" type="text">
      <button class="btn green" type="submit">&nbsp;搜索&nbsp;</button>
      </div>
      <div class="clear"></div>
      </form>

          <!-- BEGIN EXAMPLE TABLE PORTLET-->
  
          <div class="portlet box light-grey">
  
              <div class="portlet-title">
  
                  <div class="caption"><i class="icon-globe"></i>博客列表</div>
  
                  <div class="tools">
  
                      <a href="javascript:;" class="collapse"></a>

                  </div>
  
              </div>
  
              <div class="portlet-body">
  
                  <table class="table table-striped table-bordered table-hover" id="sample_1">
  
                      <thead>
  
                          <tr> 
                              <th width="40">编号</th>
  
                              <th class="hidden-480">标题</th>
  

                              <th class="hidden-480" width="80">发布者</th>

                              <th class="hidden-480" width="120">状态</th>
                              <th class="hidden-480" width="120" >发布时间</th>
  
                              <th class="hidden-480" width="130"></th>
  
                          </tr>
  
                      </thead>
  
                      <tbody>

                          <?php
							foreach ($model as $r) {
						  ?>
                          <tr class="odd gradeX" id="admin_<?= $r['id']; ?>">
  
                              <td><?= $r->id; ?></td>
  
                              <td class="hidden-480"><?= $r->title; ?></td>
  
                              <td class="hidden-480">
                              <?php
                              	foreach($cmodel as $c){
									if($r->create_id == $c->id){
										echo $c->name;
									}
								}
							  ?>
                              </td>
                              <td class="hidden-480">
                              	<?php
									if($r->stat == 1){
										echo '正常';
									}
									if($r->stat == 2){
										echo '已推送';
									}
								?>
                              </td>
                 
   
                              <td class="center hidden-480"><?=$r->create_time;?></td>
  
                              <td >
                              <a class="btn  blue-stripe" href="<?= $this->createUrl('blogLog/update', array('id' => $r->id)) ?>">编辑</a>
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
					<li><a href="<?php echo $this->createUrl('blogLog/admin', array('page' => $onpage - 1,'stat' => $stat,'title' => $title,'addUser'=>$addUser));?>">上一页</a></li>
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
					><a  href="<?php echo $this->createUrl('blogLog/admin', array('page' => $i - 1,'stat' => $stat,'title' => $title,'addUser'=>$addUser));	?>"><?= $i; ?></li></a>   
					<?php
						}
					?>		 
					
					<?php
						if ($pageALL > $onpage + 1) {
					?>
					<li><a href="<?php	echo $this->createUrl('blogLog/admin', array('page' => $onpage + 1,'stat' => $stat,'title' => $title,'addUser'=>$addUser));?>">下一页</a></li> 
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
		$('#blog_page').addClass('active');	
		$('#blogLog_page').addClass('active');
	});
	
	//----查询博客状态
    $('#b_stat').change(function(){
       $('#admin-form').submit();
    });

	
	//删除确认框  
    function Delete(id) {
        cm = confirm("确定删除吗？       ");
        if (cm) {
            $.post("/index.php/admin/blogLog/delete/",{id:id,mr:Math.random()}, function(msg) {
				
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