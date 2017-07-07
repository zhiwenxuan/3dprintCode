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
        <li>分类管理</li>
      </ul>
      
      <!-- END PAGE TITLE & BREADCRUMB--> 
      
    </div>
  </div>
  <!-- END PAGE HEADER-->
  
  
  
  
  <!-- BEGIN PAGE CONTENT-->
  
  <div class="row-fluid">
    
  
      <div >


          <!-- BEGIN EXAMPLE TABLE PORTLET-->
  
          <div class="portlet box light-grey">
  
              <div class="portlet-title">
  
                  <div class="caption"><i class="icon-globe"></i>分类列表</div>
  
                  <div class="tools">
  
                      <a href="javascript:;" class="collapse"></a>

                  </div>
  
              </div>
  
              <div class="portlet-body">
  
                  <div class="clearfix">
  
                      <div class="btn-group">
  
                          <a id="sample_editable_1_new" class="btn green" href="<?= $this->createUrl('category/create') ?>">
  
                          &nbsp;&nbsp;新&nbsp;增&nbsp;&nbsp; <i class="icon-plus"></i>
  
                          </a>
  
                      </div>
                        
                  </div>
  
                  <table class="table table-striped table-bordered table-hover" id="sample_1">
  
                      <thead>
  
                          <tr>
  
                              <th style="width:8px;"><input type="checkbox" class="group-checkable" data-set="#sample_1 .checkboxes" /></th>
  
                              <th>编号</th>
  
                              <th class="hidden-480">名称</th>

                              <th width="128"></th>
  
                          </tr>
  
                      </thead>
  
                      <tbody>
                          <?php
							foreach ($model as $r) {
						  ?>
                          <tr class="odd gradeX" id="admin_<?= $r['id']; ?>">
  
                              <td><input type="checkbox" class="checkboxes" value="1" /></td>
  
                              <td><?= $r->id; ?></td>
  
                              <td class="hidden-480"><?= $r->name; ?></td>

                              <td >
                              <a class="btn  blue-stripe" href="<?= $this->createUrl('category/update', array('id' => $r->id)) ?>">编辑</a>
                              <a class="btn  red-stripe" onclick="Delete(<?=$r->id;?>)">删除</a>
                              </td>
  
                          </tr>
						  <?php
                    		}
                    	  ?>
                      </tbody>
  
                  </table>
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
		$('#category_page').addClass('active');
	});

	//----删除分类
	function Delete(id){
		 cm = confirm("确定删除吗？       ");
         if (cm) {
            $.post("/index.php/admin/category/delete/",{id:id,mr:Math.random()},function(msg) {
				
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