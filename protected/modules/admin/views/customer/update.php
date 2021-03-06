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
        <li>编辑会员</li>
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
                  <div class="caption"><i class="icon-reorder"></i>编辑会员</div>
                  <div class="tools">
                      <a href="javascript:;" class="collapse"></a>
                  </div>
              </div>

              <div class="portlet-body form form-horizontal">
              
                  <!-- BEGIN FORM-->
                  <?php $form = $this->beginWidget('CActiveForm', array(
        			'id' => 'customer-form',
        			'enableAjaxValidation' => false,
   					 ));
   				  ?>

    				 <?php echo $form->errorSummary($model); ?>
                  
                      <div class="control-group">
                          <label class="control-label"><span class="required">*</span>用户名：</label>
                          <div class="controls">
                              <input class="span6 m-wrap" type="text" name="Customer[name]" value="<?=$model->name;?>"  />
                              <span class="help-inline"></span>
                          </div>
                      </div>
                      
                      <div class="control-group">
                          <label class="control-label"><span class="required">*</span>密码：</label>
                          <div class="controls">
                              <input class="span6 m-wrap" type="password" name="Customer[password]" value="<?=$model->name;?>" disabled  />
                              <span class="help-inline"></span>
                          </div>
                      </div>
                      
                      
                      <div class="control-group">
                          <label class="control-label"><span class="required">*</span>邮箱：</label>
                          <div class="controls">
                              <input class="span6 m-wrap" type="text" name="Customer[email]" value="<?=$model->email;?>"  />
                              <span class="help-inline"></span>
                          </div>
                      </div>
                      
                      <div class="control-group">
                          <label class="control-label">手机：</label>
                          <div class="controls">
                              <input class="span6 m-wrap" type="text" name="Customer[mobile]" value="<?=$model->mobile;?>"  />
                              <span class="help-inline"></span>
                          </div>
                      </div>
                      
                      <div class="control-group">
                          <label class="control-label" >电话：</label>
                          <div class="controls">
                              <input class="span6 m-wrap" type="text" name="Customer[telephone]" value="<?=$model->telephone;?>"  />
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
		$('#menber_page').addClass('active');	
		$('#user_page').addClass('active');
	});
	
</script>