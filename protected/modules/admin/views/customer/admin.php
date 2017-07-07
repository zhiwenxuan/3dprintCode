<div class="container-fluid"> 
  
  <!-- BEGIN PAGE HEADER-->
  <div class="row-fluid">
    <div class="span12"> 
      
      <!-- BEGIN STYLE CUSTOMIZER -->
      <!-- END BEGIN STYLE CUSTOMIZER --> 
      
      
      
      <!-- BEGIN PAGE TITLE & BREADCRUMB-->
      
      <h3 class="page-title"> 用户中心 <small></small> </h3>
      <ul class="breadcrumb">
        <li> <i class="icon-home"></i> 首页 <i class="icon-angle-right"></i> </li>
        <li>用户中心 <i class="icon-angle-right"></i></li>
        <li>会员管理</li>
      </ul>
      
      <!-- END PAGE TITLE & BREADCRUMB--> 
      
    </div>
  </div>
  <!-- END PAGE HEADER-->
  
  
  
  
  <!-- BEGIN PAGE CONTENT-->
  
  <div class="row-fluid">
    
  
      <div class="span12">
      <form id="admin-form" method="post" class="form-search" action="<?php echo $this->createUrl('customer/admin'); ?>" >

      <div class="input-append pull-left margin-right-20">
      <input placeholder="用户名" class="m-wrap" name="name" value="<?= $sname ?>" type="text">
      <button class="btn green" type="submit">&nbsp;搜索&nbsp;</button>
      </div>

      

      <div class="input-append  pull-left">
      <input placeholder="邮箱" name="email" value="<?= $semail ?>" class="m-wrap" type="text">
      <button class="btn green" type="submit">&nbsp;搜索&nbsp;</button>
      </div>
      
      <div class="clear"></div>
      </form>

          <!-- BEGIN EXAMPLE TABLE PORTLET-->
  
          <div class="portlet box light-grey">
  
              <div class="portlet-title">
  
                  <div class="caption"><i class="icon-globe"></i>会员列表</div>
  
                  <div class="tools">
  
                      <a href="javascript:;" class="collapse"></a>

                  </div>
  
              </div>
  
              <div class="portlet-body">
  
                  <div class="clearfix">
  
                      <div class="btn-group">
  
                          <a id="sample_editable_1_new" class="btn green" href="<?= $this->createUrl('customer/create') ?>">
  
                          &nbsp;&nbsp;新&nbsp;增&nbsp;&nbsp; <i class="icon-plus"></i>
  
                          </a>
  
                      </div>
                        
                  </div>
  
                  <table class="table table-striped table-bordered table-hover" id="sample_1">
  
                      <thead>
  
                          <tr>
  
                              <th style="width:8px;"><input type="checkbox" class="group-checkable" data-set="#sample_1 .checkboxes" /></th>
  
                              <th>用户名</th>
  
                              <th class="hidden-480">邮箱</th>
  
                              <th class="hidden-480">电话</th>
                              <th class="hidden-480">手机</th>
  
                              <th class="hidden-480">创建时间</th>
  
                              <th width="128"></th>
  
                          </tr>
  
                      </thead>
  
                      <tbody>
                          <?php
							foreach ($model as $r) {
						  ?>
                          <tr class="odd gradeX" id="admin_<?= $r['id']; ?>">
  
                              <td><input type="checkbox" class="checkboxes" value="1" /></td>
  
                              <td><?= $r->name; ?></td>
  
                              <td class="hidden-480"><a href="mailto:<?= $r->email; ?>"><?= $r->email; ?></a></td>
  
                              <td class="hidden-480"><?=$r->telephone;?></td>
                              <td class="hidden-480"><?=$r->mobile;?></td>
  
                              <td class="center hidden-480"><?=$r->date_added?></td>
  
                              <td >
                              <a class="btn  green-stripe" href="<?= $this->createUrl('customer/view', array('id' => $r->id)) ?>">查看</a>
                              <a class="btn  blue-stripe" href="<?= $this->createUrl('customer/update', array('id' => $r->id)) ?>">编辑</a>
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
					<li><a href="<?php echo $this->createUrl('customer/admin', array('page' => $onpage - 1, 'name' => $sname, 'email' => $semail));?>">上一页</a></li>
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
					><a  href="<?php echo $this->createUrl('customer/admin', array('page' => $i - 1, 'name' => $sname, 'email' => $semail));	?>"><?= $i; ?></li></a>   
					<?php
						}
					?>		 
					
					<?php
						if ($pageALL > $onpage + 1) {
					?>
					<li><a href="<?php	echo $this->createUrl('customer/admin', array('page' => $onpage + 1, 'name' => $sname, 'email' => $semail));?>">下一页</a></li> 
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
		$('#menber_page').addClass('active');	
		$('#user_page').addClass('active');
	});
</script>