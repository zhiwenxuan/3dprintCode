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
        <li>标签管理 <i class="icon-angle-right"></i></li>
        <li>新增标签</li>
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
                  <div class="caption"><i class="icon-reorder"></i>新增标签</div>
                  <div class="tools">
                      <a href="javascript:;" class="collapse"></a>
                  </div>
              </div>

              <div class="portlet-body form form-horizontal">
                  <!-- BEGIN FORM-->
                  
                  <?php
					$form = $this->beginWidget('CActiveForm', array(
						'id' => 'blogTags-form',
						'enableAjaxValidation' => false,
					));
				  ?>

                      <div class="control-group">
                          <label class="control-label"><span class="required">*</span>名称：</label>
                          <div class="controls">
                              <input class="span6 m-wrap" type="text" name="BlogTags[name]" value=""  />
                              <span class="help-inline"></span>
                          </div>
                      </div>

                      <div class="form-actions">
                          <input type="submit" class="btn black" href="javascript:history.go(-1);" value="&nbsp;&nbsp;提&nbsp;交&nbsp;&nbsp;"/> 
                          <a class="btn" href="javascript:history.go(-1);">&nbsp;&nbsp;返&nbsp;回&nbsp;&nbsp;</a>                           
                      </div>
                  <?php $this->endWidget(); ?>
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
		$('#blog_page').addClass('active');	
		$('#blogTags_page').addClass('active');
	});
	
</script>