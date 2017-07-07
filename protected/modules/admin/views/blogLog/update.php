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
        <li>博客管理 <i class="icon-angle-right"></i></li>
        <li>编辑博客</li>
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
                  <div class="caption"><i class="icon-reorder"></i>编辑博客</div>
                  <div class="tools">
                      <a href="javascript:;" class="collapse"></a>
                  </div>
              </div>

              <div class="portlet-body form form-horizontal">
                  <!-- BEGIN FORM-->
                  
                  <?php $form=$this->beginWidget('CActiveForm', array(
						'id'=>'blogLog-form',
						'enableAjaxValidation'=>false,
						 'htmlOptions' => array('enctype' => 'multipart/form-data'),
				  		));
				  ?>
                  <input id="stat" type="hidden" name="BlogLog[stat]" value="<?= $model->stat; ?>"/>
                  <input id="tags" type="hidden" name="BlogLog[tags]" value="<?= $model->tags; ?>"/>
                  
                      <div class="control-group">
                          <label class="control-label"><span class="required">*</span>标题：</label>
                          <div class="controls">
                              <input id="title"  class="span6 m-wrap" type="text" name="BlogLog[title]" value="<?=$model->title;?>"  />
                              <span class="help-inline"></span>
                          </div>
                      </div>
                      
                      <div class="control-group">
                          <label class="control-label"><span class="required">*</span>描述：</label>
                          <div class="controls">
                          	  <input id="description"  class="span6 m-wrap" type="text" name="BlogLog[description]" value="<?=$model->description;?>"  />
                              <span class="help-inline"></span>
                          </div>
                      </div>
                      
                      <div class="control-group">
                          <label class="control-label"><span class="required">*</span>标签： </label>
                          <div class="controls">
                          <?php
							  $tags = $model->tags;
							  foreach($blogTags as $b)
							  {
								  $flag = 0;
								  foreach ($tags as $t)
								  {
									  if($t == $b->id)
									  {
										  $flag=1;
									  }
								  }
								  if($flag==1)
								  {
									  echo '
									  <label class="checkbox line pull-left">
									  <input class="tagsC" name="tags[]"  type="checkbox" checked="checked" value="'.$b->id.'" />'.$b->name.'		
									  </label>
									  ';
								  }
								  else
								  {
									  echo '
									  <label class="checkbox line pull-left">
									  <input class="tagsC" name="tags[]"  type="checkbox" value="'.$b->id.'" />'.$b->name.'		
									  </label>
									  ';
								  }
							  }
						  ?>	
                          <div class="clear"></div>
                          </div>
                      </div>
                      
                      <div class="control-group">
                          <label class="control-label">推荐</label>
                          <div class="controls">
                              <label class="radio">
                              <input type="radio" name="stat"
                              <?php 
                                 if ($model->stat == 1) {
                                      echo 'checked';
                                 } 
                              ?>
                              value="1" />
                              否
                              </label>
                              <label class="radio">
                              <input type="radio" name="stat"
                              <?php 
                                 if ($model->stat == 2) {
                                      echo 'checked';
                                 } 
						      ?>
                              value="2"  />
                              是
                              </label>  
                          </div>
                      </div>

                      <div class="control-group">
                          <label class="control-label">上传图片</label>
                          <div class="controls">
                          <?php
							$kb = 1024;
							$complete_script = "js:function(id, name, response)
							{	
								
								$('#picSpace').append('<div id='+id+' class=picModel  fileNme='+response['filename']+' ><img style=float:left; width=100 height=100 src=/assets/blogfile/'+response['filename']+'><a class=deletePic onClick=DeletePic('+id+') >删除</a><div class=clear></div></div>');
							
							}";
							
							
							$delete = "js:function(id)
							{	
								$('#'+id).remove();
							
							}";
							
							$this->widget('ext.EFineUploader.EFineUploader',array(
								'id'=>'FineUploader',
								'config'=>array(
								'autoUpload'=>true,
								'request'   =>array('endpoint'=>$this->createUrl('upload'),
													'params'=>array('YII_CSRF_TOKEN'=>Yii::app()->request->csrfToken)),
								'deleteFile'=>array(
													'enabled'=>'true',
													'forceConfirm'=>'true',
													'endpoint'=>$this->createUrl('upload'),
					   
								),
					
								'retry'     =>array('enableAuto'=>true,'preventRetryResponseProperty'=>true),
								'callbacks' =>array('onComplete'=>$complete_script,
													'onDelete'=>$delete,
													),				   											
								'validation'=>array('allowedExtensions'=>array('jpg','jpeg'),
													'sizeLimit'=>2048*$kb,
													'minSizeLimit'=>10*$kb,
													'itemLimit'=>20))
								));
							?>
                          </div>
                      </div>
                      <div class="control-group">
                          <div class="controls">
							<div id="picSpace">
							<?php
                                $i = 1;
								echo '<input type="hidden" name="BlogLog[pic]" value="'.$model->pic.'" id="pic">';
                                echo '<div id="p'.$i.'" class="picModel" fileNme="'.$model->pic.'" ><img style="float:left;" width="100" height="100" src="/assets/blogfile/'.$model->pic.'"><a class="deletePic" onClick="DeleteOldPic('.$i.')" >删除</a><div class="clear"></div></div>';
                            ?>
                            </div>
                          </div>
                      </div>
                      
                   
                      
                      <div class="control-group">
                          <label class="control-label">详细内容：</label>
                          <div class="controls">
                          <script id="editor" name="content" type="text/plain" style="height:500px;"><?php echo $model->content; ?></script>	 
                          </div>
                      </div>
                      
                      <div class="control-group">
                          <label class="control-label">作者：</label>
                          <div class="controls">
                          <span class="text">
                          <?php echo $model->addUser->name; ?>
                          </span>
                          </div>
                      </div>
                      
                      <div class="control-group">
                          <label class="control-label">创建时间：</label>
                          <div class="controls">
                          <span class="text">
                          <?php echo $model->create_time; ?>
                          </span>
                          </div>
                      </div>
 
                      
                      <div class="control-group">
                          <label class="control-label">最后修改时间：</label>
                          <div class="controls">
                          <span class="text">
                          <?php echo $model->edit_time; ?>
                          </span>
                          </div>
                      </div>

                      <div class="form-actions">
                          <input type="button" class="btn black" onclick="subMitModel();" value="&nbsp;&nbsp;提&nbsp;交&nbsp;&nbsp;"/> 
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
		$('#blogLog_page').addClass('active');
	});
	FormSamples.init();
    UE.getEditor('editor');
	

//----传递推荐的值
$(':radio').click(function() {
	$('#stat').val($('input[name="stat"]:checked').val());
});




//----新增图片删除
function DeletePic(id){
	  $('#'+id).remove(); 
}

//----原数据的删除
function DeleteOldPic(id){
	 $.post("<?php echo $this->createUrl('product/ajaxDelete');?>",{fileName:$('#p'+id).attr("fileNme"),mr:Math.random()},function(msg){
		  if(msg == 200){
			  $('#p'+id).remove();	
		  }else{
			   alert('删除图片失败！');	
		  }  
	 });   
}

	
function subMitModel(){
	
	//----判断标题
	if($('#title').val() == "") {
		  alert('标题不允许为空！');
		  return false;
	}
	
	if($('#description').val() == ""){
		alert('描述不允许为空！');
		  return false;	
	}
	
	
 
	//----判断checkbox是否选中
	var check = 0;
	$("[name='tags[]']").each(function(){
   
		if($(this).attr("checked"))
		{
			check++;
		}

	});
	if(check == 0){
		  alert('至少选择一个标签！');
		  return false;
	}
	
	//----提交tag
	var TA = new Array();
	$('.tagsC').each(function(i, j) {
		  if (j.checked == true) {
			  mc = $(j).val();
			  TA.push(mc);
		  }
		  $('#tags').val(TA);
	});
	
	
	$('#pic').val($('.picModel').attr("fileNme"));
	

	//----提交图片
	var num = 0;
	$('#picSpace div').each(function(index, element) {
		  num = index;  
	});
	if(num == 0){
	  alert('至少上传一张模型图片！');
	  return false;
	}
	if(num != 1){
		alert('最多上传1张图片');
		return false;
	}else{
		$('#blogLog-form').submit();
	}
	
}

</script>
