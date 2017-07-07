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
        <li>模型管理 <i class="icon-angle-right"></i></li>
        <li>编辑模型</li>
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
                  <div class="caption"><i class="icon-reorder"></i>编辑模型</div>
                  <div class="tools">
                      <a href="javascript:;" class="collapse"></a>
                  </div>
              </div>

              <div class="portlet-body form form-horizontal">
                  <!-- BEGIN FORM-->
                  
                  <?php $form=$this->beginWidget('CActiveForm', array(
						'id'=>'product-form',
						'enableAjaxValidation'=>false,
						 'htmlOptions' => array('enctype' => 'multipart/form-data'),
				  		));
				  ?>
                  <input type="hidden" name="fileNameArray" id="fileNameArray">
                  <input id="dowload_type" type="hidden" name="Product[dowload_type]" value="<?= $model->dowload_type; ?>"/>
                  <input id="push" type="hidden" name="Product[push]" value="<?= $model->push; ?>"/>
                  <input id="stat" type="hidden" name="Product[stat]" value="<?= $model->stat; ?>"/>
                  <input id="shelves" type="hidden" name="Product[shelves]" value="<?= $model->shelves; ?>"/>
                  <?php echo $form->textField($model, 'metalColor', array('size' => 60, 'id' => 'metalColor', 'style' => 'display:none',)); ?>
                  <?php echo $form->textField($model, 'plasticColor', array('size' => 60, 'id' => 'plasticColor', 'style' => 'display:none',)); ?>

                      <div class="control-group">
                          <label class="control-label"><span class="required">*</span>名称：</label>
                          <div class="controls">
                              <input id="name"  class="span6 m-wrap" type="text" name="Product[name]" value="<?=$model->name;?>"  />
                              <span class="help-inline"></span>
                          </div>
                      </div>
                      
                      <div class="control-group">
                          <label class="control-label"><span class="required">*</span>类别：</label>
                          <div class="controls">
                          <?php
							  $categoryA = explode(",",$model->category_id);
							  foreach($category as $c)
							  {
								  if($c->id != 1)
								  {
									  $flag = 0;
									  foreach ($categoryA as $a)
									  {
										  if($a == $c->id)
										  {
											  $flag=1;
										  }
									  }
									  if($flag==1)
									  {
										  echo '
										  <label class="checkbox line pull-left">
										  <input name="category[]"  type="checkbox" checked="checked" value="'.$c->id.'" />'.$c->name.'		
										  </label>
										  ';
									  }
									  else
									  {
										  echo '
										  <label class="checkbox line pull-left">
										  <input name="category[]"  type="checkbox" value="'.$c->id.'" />'.$c->name.'		
										  </label>
										  ';
									  }
								  }
							  }
						  ?>	
                          <div class="clear"></div>
                          </div>
                      </div>
                      
                      <div class="control-group">
                          <label class="control-label"><span class="required">*</span>标签： </label>
                          <div class="controls">
                             <div class="select2-wrapper">
                                  <input type="hidden" name="tags" class="span12 select2_sample3" value="<?php
								  $num = 0;
                                  for ($i = 1; $i <= 10; $i++) {
									  $k = 'keyword'.$i;
									  if($model->$k != ''){
										$num++;
									  }
								  }
								  if($num != 0){
									  for($n = 1; $n <= $num-1; $n++){
										$k = 'keyword'.$n;
										echo $model->$k.',';
									  }
									  $k = 'keyword'.$num;
									  echo $model->$k;
								  }
								  ?>">
                              </div>
                          </div>
                      </div>
                      
                      <div class="control-group">
                          <label class="control-label">3D模型</label>
                          <div class="controls">
                              <div class="fileupload fileupload-new" data-provides="fileupload">
                                  <div class="input-append">
                                      <div class="uneditable-input">
                                          <i class="icon-file fileupload-exists"></i> 
                                          <span class="fileupload-preview"></span>
                                      </div>
                                      <span class="btn btn-file">
                                      <span class="fileupload-new">选择</span>
                                      <span class="fileupload-exists">替换</span>
                                      <input type="file" name="Product[three_model]" class="default"  />
                                      </span>
                                      <a href="#" class="btn fileupload-exists" data-dismiss="fileupload">删除</a>
                                  </div>
                              </div>
                          </div>
                      </div>
                      
                      <div class="control-group">
                          <label class="control-label">下载附件</label>
                          <div class="controls">
                              <div class="fileupload fileupload-new" data-provides="fileupload">
                                  <div class="input-append">
                                      <div class="uneditable-input">
                                          <i class="icon-file fileupload-exists"></i> 
                                          <span class="fileupload-preview"></span>
                                      </div>
                                      <span class="btn btn-file">
                                      <span class="fileupload-new">选择</span>
                                      <span class="fileupload-exists">替换</span>
                                      <input type="file" name="Product[dowload]" class="default"  />
                                      </span>
                                      <a href="#" class="btn fileupload-exists" data-dismiss="fileupload">删除</a>
                                  </div>
                              </div>
                          </div>
                      </div>
                      
                      <div class="control-group">
                          <label class="control-label">所需积分：</label>
                          <div class="controls">
                          	  <?php echo $form->textField($model, 'dowload_integral', array('size' => 15, 'maxlength' => 15,'class' => 'span1 m-wrap')); ?>
                              <span class="help-inline"></span>
                          </div>
                      </div>
                      
                      <div class="control-group">
                          <label class="control-label">提供下载</label>
                          <div class="controls">
                              <label class="radio">
                              <input type="radio" name="dowload_type"
                              <?php 
                                 if ($model->dowload_type == 0) {
                                      echo 'checked';
                                 } 
                              ?>
                              value="0" />
                              否
                              </label>
                              <label class="radio">
                              <input type="radio" name="dowload_type"
                              <?php 
                                 if ($model->dowload_type == 1) {
                                      echo 'checked';
                                 } 
						      ?>
                              value="1"  />
                              是
                              </label>  
                          </div>
                      </div>
                      
                      <div class="control-group">
                          <label class="control-label">推荐商品</label>
                          <div class="controls">
                              <label class="radio">
                              <input type="radio" name="push"
                              <?php 
                                 if ($model->push == 0) {
                                      echo 'checked';
                                 } 
                              ?>
                              value="0" />
                              否
                              </label>
                              <label class="radio">
                              <input type="radio" name="push"
                              <?php 
                                 if ($model->push == 1) {
                                      echo 'checked';
                                 } 
						      ?>
                              value="1"  />
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
								
								$('#picSpace').append('<div id='+id+' class=picModel  fileNme='+response['filename']+' ><img style=float:left; width=100 height=100 src=/assets/upfile/'+response['filename']+'><a class=deletePic onClick=DeletePic('+id+') >删除</a><div class=clear></div></div>');
							
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
                                foreach($picArray as $p){
                                    echo '<div id="p'.$i.'" class="picOldModel" fileNme="'.$p->pic.'" ><img style="float:left;" width="100" height="100" src="/assets/upfile/'.$p->pic.'"><a class="deletePic" onClick="DeleteOldPic('.$i.')" >删除</a><div class="clear"></div></div>';
                                $i++;
                                }
                            ?>
                            </div>
                          </div>
                      </div>
                      
                      <div class="control-group">
                          <label class="control-label">设计费：</label>
                          <div class="controls">
                          	  <?php echo $form->textField($model, 'designPrice', array('size' => 15, 'maxlength' => 15,'class' => 'span1 m-wrap')); ?>
                              <span class="help-inline"></span>
                          </div>
                      </div>
                      
                      <div class="control-group">
                          <label class="control-label">购买次数：</label>
                          <div class="controls">
                          	  <?php echo $form->textField($model, 'buy', array('size' => 15, 'maxlength' => 15,'class' => 'span1 m-wrap')); ?>
                              <span class="help-inline"></span>
                          </div>
                      </div>
                      
                      <div class="control-group">
                          <label class="control-label">金属：</label>
                          <div class="controls">
                          
                          <label class="checkbox line pull-left">
                          <input class="metalColor" value="red" <?php
						  $color = explode(',', $model->metalColor);
						  foreach ($color as $c) {
							  if ($c == 'red') {
								  echo 'checked="checked"';
							  }
						  }
						  ?>type="checkbox"/>红色</label>

						  <label class="checkbox line pull-left">
						  <input class="metalColor"  value="blue" <?php
						  $color = explode(',', $model->metalColor);
						  foreach ($color as $c) {
							  if ($c == 'blue') {
								  echo 'checked="checked"';
							  }
						  }
						  ?>type="checkbox"/>蓝色</label>

						  <label class="checkbox line pull-left">
						  <input class="metalColor" value="green" <?php
						  $color = explode(',', $model->metalColor);
						  foreach ($color as $c) {
							  if ($c == 'green') {
								  echo 'checked="checked"';
							  }
						  }
						  ?>type="checkbox"/>绿色</label>


						  <label class="checkbox line pull-left">
						  <input class="metalColor" value="yellow" <?php
						  $color = explode(',', $model->metalColor);
						  foreach ($color as $c) {
							  if ($c == 'yellow') {
								  echo 'checked="checked"';
							  }
						  }
						  ?>type="checkbox"/>黄色</label>

						  <label class="checkbox line pull-left">
						  <input class="metalColor" value="white" <?php
						  $color = explode(',', $model->metalColor);
						  foreach ($color as $c) {
							  if ($c == 'white') {
								  echo 'checked="checked"';
							  }
						  }
						  ?>type="checkbox"/>白色</label>
						  
                          <label class="checkbox line pull-left">  
						  <input class="metalColor" value="black" <?php
						  $color = explode(',', $model->metalColor);
						  foreach ($color as $c) {
							  if ($c == 'black') {
								  echo 'checked="checked"';
							  }
						  }
						  ?>type="checkbox"/>黑色</label>

						  <label class="checkbox line pull-left">
						  <input class="metalColor" value="magenta" <?php
						  $color = explode(',', $model->metalColor);
						  foreach ($color as $c) {
							  if ($c == 'magenta') {
								  echo 'checked="checked"';
							  }
						  }
						  ?>type="checkbox"/>玫红</label>
							
                          <label class="checkbox line pull-left">
                          <input class="metalColor"  value="orange" <?php
                          $color = explode(',', $model->metalColor);
                          foreach ($color as $c) {
                              if ($c == 'orange') {
                                  echo 'checked="checked"';
                              }
                          }
                          ?>type="checkbox"/>橙色</label>
                          <div class="clear"></div>
                          </div>
                      </div>
                      
                      <div class="control-group">
                          <label class="control-label">塑料：</label>
                          <div class="controls">
                          
                          <label class="checkbox line pull-left">
                          <input class="plasticColor" value="red" <?php
						  $color = explode(',', $model->plasticColor);
						  foreach ($color as $c) {
							  if ($c == 'red') {
								  echo 'checked="checked"';
							  }
						  }
						  ?>type="checkbox"/>红色</label>

						  <label class="checkbox line pull-left">
						  <input class="plasticColor"  value="blue" <?php
						  $color = explode(',', $model->plasticColor);
						  foreach ($color as $c) {
							  if ($c == 'blue') {
								  echo 'checked="checked"';
							  }
						  }
						  ?>type="checkbox"/>蓝色</label>

						  <label class="checkbox line pull-left">
						  <input class="plasticColor" value="green" <?php
						  $color = explode(',', $model->plasticColor);
						  foreach ($color as $c) {
							  if ($c == 'green') {
								  echo 'checked="checked"';
							  }
						  }
						  ?>type="checkbox"/>绿色</label>


						  <label class="checkbox line pull-left">
						  <input class="plasticColor" value="yellow" <?php
						  $color = explode(',', $model->plasticColor);
						  foreach ($color as $c) {
							  if ($c == 'yellow') {
								  echo 'checked="checked"';
							  }
						  }
						  ?>type="checkbox"/>黄色</label>

						  <label class="checkbox line pull-left">
						  <input class="plasticColor" value="white" <?php
						  $color = explode(',', $model->plasticColor);
						  foreach ($color as $c) {
							  if ($c == 'white') {
								  echo 'checked="checked"';
							  }
						  }
						  ?>type="checkbox"/>白色</label>
						  
                          <label class="checkbox line pull-left">  
						  <input class="plasticColor" value="black" <?php
						  $color = explode(',', $model->plasticColor);
						  foreach ($color as $c) {
							  if ($c == 'black') {
								  echo 'checked="checked"';
							  }
						  }
						  ?>type="checkbox"/>黑色</label>

						  <label class="checkbox line pull-left">
						  <input class="plasticColor" value="magenta" <?php
						  $color = explode(',', $model->plasticColor);
						  foreach ($color as $c) {
							  if ($c == 'magenta') {
								  echo 'checked="checked"';
							  }
						  }
						  ?>type="checkbox"/>玫红</label>
							
                          <label class="checkbox line pull-left">
                          <input class="plasticColor" value="orange" <?php
                          $color = explode(',', $model->plasticColor);
                          foreach ($color as $c) {
                              if ($c == 'orange') {
                                  echo 'checked="checked"';
                              }
                          }
                          ?>type="checkbox"/>橙色</label>
                          <div class="clear"></div>
                          </div>
                      </div>
                      
                      <div class="control-group">
                          <label class="control-label">金属价格：</label>
                          <div class="controls">
                          	  <?php echo $form->textField($model, 'metalPrice', array('size' => 15, 'maxlength' => 15,'class' => 'span1 m-wrap')); ?>
                              <span class="help-inline"></span>
                          </div>
                      </div>
                      
                      <div class="control-group">
                          <label class="control-label">塑料价格：</label>
                          <div class="controls">
                          	  <?php echo $form->textField($model, 'plasticPrice', array('size' => 15, 'maxlength' => 15,'class' => 'span1 m-wrap')); ?>
                              <span class="help-inline"></span>
                          </div>
                      </div>
                      
                      <div class="control-group">
                          <label class="control-label">相似模型：</label>
                          <div class="controls">
                          	  <?php echo $form->textField($model, 'similarList', array('size' => 15, 'maxlength' => 15,'class' => 'span1 m-wrap')); ?>
                              <span class="help-inline"></span>
                          </div>
                      </div>
                      
                      <div class="control-group">
                          <label class="control-label">状态：</label>
                          <div class="controls">
                              <label class="radio">
                              <input type="radio" name="Product[stat]"
                              <?php 
                                 if ($model->stat == 1) {
                                      echo 'checked';
                                 } 
                              ?>
                              value="1" />
                              待审核
                              </label>
                              <label class="radio">
                              <input type="radio" name="Product[stat]"
                              <?php 
                                 if ($model->stat == 2) {
                                      echo 'checked';
                                 } 
						      ?>
                              value="2"  />
                              已审核
                              </label>  
                          </div>
                      </div>

                      
                      <div class="control-group">
                          <label class="control-label">上架：</label>
                          <div class="controls">
                              <label class="radio">
                              <input type="radio" name="Product[shelves]"
                              <?php 
                                 if ($model->shelves == 1) {
                                      echo 'checked';
                                 } 
                              ?>
                              value="1" />
                              下架
                              </label>
                              <label class="radio">
                              <input type="radio" name="Product[shelves]"
                              <?php 
                                 if ($model->shelves == 2) {
                                      echo 'checked';
                                 } 
						      ?>
                              value="2" />
                              上架
                              </label>  
                          </div>
                      </div>
                      
                      <div class="control-group">
                          <label class="control-label">详细内容：</label>
                          <div class="controls">
                          <script id="editor" name="description" type="text/plain" style="height:500px;"><?php echo $model->description; ?></script>	 
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
                          <?php echo $model->add_time; ?>
                          </span>
                          </div>
                      </div>
                      
                      <div class="control-group">
                          <label class="control-label">编辑者：</label>
                          <div class="controls">
                          <span class="text">
                          <?php
                            if(isset($model->editUser->name)){
                                echo $model->editUser->name;    
                            }/*else{
								echo $model->addAdmin->name;
							}*/
                         ?>
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
		$('#model_page').addClass('active');	
		$('#category_page').addClass('active');
	});
	FormSamples.init();
    UE.getEditor('editor');
	

//----传递提供下载的值和推荐的值
$(':radio').click(function() {
	$('#dowload_type').val($('input[name="dowload_type"]:checked').val());
	$('#push').val($('input[name="push"]:checked').val());
	$('#stat').val($('input[name="Product[stat]"]:checked').val());
	$('#shelves').val($('input[name="Product[shelves]"]:checked').val());
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
	
	//----判断用户名
	if ($('#name').val() == "") {
		  alert('名称不允许为空！');
		  return false;
	}
 
	//----判断checkbox是否选中
	var check = 0;
	$("[name='category[]']").each(function(){
   
		if($(this).attr("checked"))
		{
			check++;
		}
		
		
	});
	if(check == 0){
		  alert('至少选择一个模型类别！');
		  return false;
	}
	
	
	//----提交tag
	var tags = new Array();
	$('.keyword').each(function(s, n) {
		  kw = n.value;
		  tags.push(kw);
	});
	$('#tags').val(tags);
	
	
	//----提交颜色
	var mColors = new Array();//金属颜色
	var pColors = new Array();//塑料颜色
	var k = 0;
	$('.metalColor').each(function(i, j) {
		  if (j.checked == true) {
			  mc = $(j).val();
			  mColors.push(mc);
			  k++;

		  }
		  $('#metalColor').val(mColors);
	});

	$('.plasticColor').each(function(i, j) {
		  if (j.checked == true) {
			  pc = $(j).val();
			  pColors.push(pc);
			  k++;
		  }
		  $('#plasticColor').val(pColors);
	});
	if (k == 0) {
		  alert("至少选择一个颜色！");
		  return false;
	}


	//----提交图片
	var num = 0;
	var fNameArray = new Array();
	$('.picModel').each(function(i,j) {

		fName = $(this).attr("fileNme");
		fNameArray.push(fName);
		

	});
	$('#fileNameArray').val(fNameArray);
	
	$('#picSpace div').each(function(index, element) {
		  num = index;  
	});
	if(num == 0){
	  alert('至少上传一张模型图片！');
	  return false;
	}
	if(num >= 20){
		alert('最多上传10张图片');
		return false;
	}else{
		$('#product-form').submit();
	}
	
}

</script>
