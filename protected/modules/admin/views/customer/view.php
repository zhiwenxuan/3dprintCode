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
        <li>会员管理 <i class="icon-angle-right"></i></li>
        <li>查看会员</li>
      </ul>
      
      <!-- END PAGE TITLE & BREADCRUMB--> 
      
    </div>
  </div>
  <!-- END PAGE HEADER-->
  
  
  <!-- BEGIN PAGE CONTENT-->
  <div class="row-fluid">
      <div class="span12">
      
          <!-- BEGIN SAMPLE FORM PORTLET-->   
          <div class="portlet box grey">
          
              <div class="portlet-title">
                  <div class="caption"><i class="icon-reorder"></i>查看会员</div>
                  <div class="tools">
                      <a href="javascript:;" class="collapse"></a>
                  </div>
              </div>

              <div class="portlet-body form">
                  <!-- BEGIN FORM-->
                  <form  class="form-horizontal">
                  
                      <div class="control-group">
                          <label class="control-label">用户名：</label>
                          <div class="controls">
                              <input class="span6 m-wrap" type="text" value="<?=$model->name;?>"  disabled />
                              <span class="help-inline"></span>
                          </div>
                      </div>
                      
                      <div class="control-group">
                          <label class="control-label">邮箱：</label>
                          <div class="controls">
                              <input class="span6 m-wrap" type="text" value="<?=$model->email;?>"  disabled />
                              <span class="help-inline"></span>
                          </div>
                      </div>
                      
                      <div class="control-group">
                          <label class="control-label">手机：</label>
                          <div class="controls">
                              <input class="span6 m-wrap" type="text" value="<?=$model->mobile;?>"  disabled />
                              <span class="help-inline"></span>
                          </div>
                      </div>
                      
                      <div class="control-group">
                          <label class="control-label" >电话：</label>
                          <div class="controls">
                              <input class="span6 m-wrap" type="text" value="<?=$model->telephone;?>"  disabled />
                              <span class="help-inline"></span>
                          </div>
                      </div>
                      
                      <div class="control-group">
                          <label class="control-label">注册时间：</label>
                          <div class="controls">
                              <input class="span6 m-wrap" type="text" value="<?=$model->date_added;?>"  disabled />
                              <span class="help-inline"></span>
                          </div>
                      </div>

                      
                      <div class="control-group">
                          <label class="control-label">最后修改日期：</label>
                          <div class="controls">
                              <input class="span6 m-wrap" value="<?=$model->date_modified;?>" type="text"  disabled />
                              <span class="help-inline"></span>
                          </div>
                      </div>

                      <div class="form-actions">
                          <a type="submit" class="btn black" href="javascript:history.go(-1);">&nbsp;&nbsp;返&nbsp;回&nbsp;&nbsp;</a>                           
                      </div>
                  </form>
                  <!-- END FORM-->        
              </div>
          </div>
          <!-- END SAMPLE FORM PORTLET-->

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