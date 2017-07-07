<?php
$this->renderpartial('//customer/left');
?>
<style>
	.picModel{
		border:1px solid #dedede;
		padding:10px;
		float:left;
		margin-right:10px;
		margin-top:8px;
	}
	.picModel img {
	float:left;
	}
	
	
	.picOldModel{
		border:1px solid #dedede;
		padding:10px;
		float:left;
		margin-right:10px;
		margin-top:8px;
	}
	.picOldModel img {
		float:left;
	}
	
	.deletePic{
		float:left;
		margin-left:8px;
		margin-top:38px;
		color:#888;
		text-decoration:none;
		cursor:pointer;
	}

</style>
<div class="float_left">
    <span  class="mb_title">上传模型</span>
    <div class="main_right">
        <div class="accountInfo">
            <div class="form">
                <?php
                $form = $this->beginWidget('CActiveForm', array(
                    'id' => 'product-form',
                    'enableAjaxValidation' => false,
                   	'htmlOptions' => array('enctype' => 'multipart/form-data',),
                ));
                ?>
                <input type="hidden" name="fileNameArray" id="fileNameArray">
                <input id="dowload_type" type="hidden" name="Product[dowload_type]" value="<?= $model->dowload_type; ?>"/>
                <?php echo $form->textField($model, 'metalColor', array('size' => 60, 'id' => 'metalColor', 'style' => 'display:none',)); ?>
                <?php echo $form->textField($model, 'plasticColor', array('size' => 60, 'id' => 'plasticColor', 'style' => 'display:none',)); ?>
                <?php echo $form->textField($model, 'plasticPrice', array('size' => 60, 'id' => 'plasticPrice', 'value' => 0, 'style' => 'display:none',)); ?>
                <?php echo $form->textField($model, 'metalPrice', array('size' => 60, 'id' => 'metalPrice', 'value' => 0, 'style' => 'display:none',)); ?>

                <?php echo $form->errorSummary($model); ?>
                <table class="infoTable"> 
                	<!--类别-->   
                    <tr>
                        <td width="70"><?php echo $form->labelEx($model, 'category_id'); ?></td>
                        <td>
                        <div style="border:1px solid #dedede; padding:10px;">
						<?php
                            foreach($category as $c)
                            {
                                if($c->id != 1)
                                {
                                    
                                	echo '<div style="float:left; margin-left:20px; margin-top:5px; margin-bottom:5px;"><input name="category[]" style="vertical-align:middle" type="checkbox"  value="'.$c->id.'"><label style="vertical-align:middle; margin-left:5px;"></label>'.$c->name.'</div>';
                                    
                                }
                            }
                        ?>	
                        <div style="clear:both;"></div>
                        </div>
                        </td>
                        <td><?php echo $form->error($model, 'category_id'); ?></td>
                    </tr>

                    <tr>
                        <td><?php echo $form->labelEx($model, 'name'); ?></td>
                        <td><?php echo $form->textField($model, 'name', array('size' => 40, 'maxlength' => 255)); ?></td>
                        <td id="nameMsg"><?php echo $form->error($model, 'name'); ?></td>
                    </tr>

                    <tr>
                        <td>标签：</td>
                        <td>
                            <input name="tags" id="tags" type="hidden">
                            <input class="keyword" name="keyword"><a id="moreTag" class="add_info_img">+</a>
                            <div id="tagInfo">



                            </div>
                        </td>
                        <td></td>
                    </tr>

                    <tr>
                        <td><?php echo $form->labelEx($model, 'thumbnail'); ?><span class="required">*</span></td>
                        <td>
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
                        </td>
                        <td></td>
                    </tr>

                    
                    <tr>
                        <td></td>
                        <td><div id="picSpace"></div></td>
                        <td></td>
                    </tr>

                    <tr>
                        <td><?php echo $form->labelEx($model, 'three_model'); ?></td>
                        <td><?php echo CHtml::activeFileField($model, 'three_model'); ?></td>
                        <td><?php echo $form->error($model, 'three_model'); ?></td>
                    </tr>
                    
                    <tr>
                        <td><?php echo $form->labelEx($model, 'dowload'); ?></td>
                        <td><?php echo CHtml::activeFileField($model, 'dowload'); ?></td>
                        <td><?php echo $form->error($model, 'dowload'); ?></td>
                    </tr>
                    
                    
                    <tr>
                        <td><?php echo $form->labelEx($model, 'dowload_integral'); ?></td>
                        <td><?php echo $form->textField($model, 'dowload_integral', array('size' => 15, 'maxlength' => 15)); ?></td>
                        <td><?php echo $form->error($model, 'dowload_integral'); ?></td>
                    </tr>
                    
                    <tr>
                        <td>提供下载</td>
                        <td>
                       <input type="radio" name="dowload_type"  
					   <?php 
					   if ($model->dowload_type == 0) {
                            echo 'checked="checked"';
                       } 
					   ?>
                       value="0" style="vertical-align: middle"/><span style="vertical-align: middle">否</span>
                                &nbsp;&nbsp;&nbsp;&nbsp;
                       <input type="radio" name="dowload_type" 
					   <?php 
					   if ($model->dowload_type == 1) {
                            echo 'checked="checked"';
                       } 
					   ?> value="1" style="vertical-align: middle"/><span style="vertical-align: middle">是</span>
                            </td>
                        <td></td>
                        
                    </tr>
                    

                    <tr>
                        <td>属性<span class="required">*</span></td>
                        <td colspan="2">
                            <table class="productQuality" cellspacing="1" >
                                <tr>
                                    <td width="80">&nbsp;&nbsp;材质：
                                        金属
                                    </td>
                                    <td class="checkMargin">&nbsp;&nbsp;颜色：
                                        <input class="metalColor" value="red" type="checkbox"/><label>红色</label>
                                        <input class="metalColor" value="blue" type="checkbox"/><label>蓝色</label>
                                        <input class="metalColor" value="green" type="checkbox"/><label>绿色</label>
                                        <input class="metalColor" value="yellow" type="checkbox"/><label>黄色</label>
                                        <input class="metalColor" value="white" type="checkbox"/><label>白色</label>
                                        <input class="metalColor" value="black" type="checkbox"/><label>黑色</label>
                                        <input class="metalColor" value="magenta" type="checkbox"/><label>玫红</label>
                                        <input class="metalColor" value="orange" type="checkbox"/><label>橙色</label>
                                    </td>
                                  
                                </tr>

                                <tr>
                                    <td width="80">&nbsp;&nbsp;材质：
                                        塑料
                                    </td>
                                    <td class="checkMargin">&nbsp;&nbsp;颜色：
                                        <input class="plasticColor" value="red" type="checkbox"/><label>红色</label>
                                        <input class="plasticColor" value="blue" type="checkbox"/><label>蓝色</label>
                                        <input class="plasticColor" value="green" type="checkbox"/><label>绿色</label>
                                        <input class="plasticColor" value="yellow" type="checkbox"/><label>黄色</label>
                                        <input class="plasticColor" value="white" type="checkbox"/><label>白色</label>
                                        <input class="plasticColor" value="black" type="checkbox"/><label>黑色</label>
                                        <input class="plasticColor" value="magenta" type="checkbox"/><label>玫红</label>
                                        <input class="plasticColor" value="orange" type="checkbox"/><label>橙色</label>
                                    </td>
                                    
                                </tr>

                            </table>
                        </td>
                    </tr>


                    <tr>
                        <td><?php echo $form->labelEx($model, 'designPrice'); ?></td>
                        <td><?php echo $form->textField($model, 'designPrice', array('size' => 15, 'maxlength' => 15)); ?></td>
                        <td><?php echo $form->error($model, 'designPrice'); ?></td>
                    </tr>
                    
              



                    <tr>
                        <td colspan="3">详细信息<span class="required">*</span></td>
                    </tr>


                    <tr>
                        <td colspan="3">
                            <script id="editor" name="description" type="text/plain" style="width:750px;height:500px;"></script>
                        </td>
                    </tr>                


                    <tr>
                        <td></td>
                        <td colspan="2">
                            <div style="float:left;">
                                <?php echo CHtml::button($model->isNewRecord ? '保存' : '保存', array('onClick' => 'subMitModel()','class' => 'bottom_true', 'style' => 'height:29px; padding-top:0px;')); ?>
                            </div>
                            <div style="float:left; margin-left:10px;">
                                <a class="bottom_false" href="<?php echo $this->createUrl('customer/account', array('id' => Yii::app()->user->id)) ?>"><span>&nbsp;取 消&nbsp;</span></a>
                            </div>
                        </td>    

                    </tr>

                </table>

                <?php $this->endWidget(); ?>

            </div><!-- form --> 



        </div>


    </div>

</div>
<div class="clear"></div>

 
<script type="text/javascript">

	//----传递是否上架的值
    $(':radio').click(function() {
        $('#dowload_type').val($('input[name="dowload_type"]:checked').val());
    });


    //实例化编辑器
    //建议使用工厂方法getEditor创建和引用编辑器实例，如果在某个闭包下引用该编辑器，直接调用UE.getEditor('editor')就能拿到相关的实例
    UE.getEditor('editor');


	
	


    //----提交多个标签
    $('#moreTag').click(function() {
        var num_i = 0;
        $('.keyword').each(function(l, p) {
            num_i++;
        });


        if (num_i == 10) {
            return false;
        }
        var html = '';
        html += '<div id="tag_' + num_i + '"><input class="keyword" name="keyword"><a onclick="deleteTag(' + num_i + ')" class="add_tag">删除</a></div>';
        $('#tagInfo').append(html);
        num_i++;
    });

    function deleteTag(k) {
        $('#tag_' + k).remove();
    }
    

    
   //----新增时的删除
 	function DeletePic(id)
	{
		$('#'+id).remove();
 	}
	
	//----提交表单
    function subMitModel(){

		//----判断checkbox是否选中
		var check = 0;
		$("[name='category[]']").each(function(l,n){
			 
			 
			
			if (n.checked == true)
			{
				check++;
			}
			
			
		});
		if(check == 0){
			  alert('至少选择一个模型类别！');
			  return false;
		}
	  
		
		
		//----判断用户名
        if($('#Product_name').val() == ""){
            alert('名称不允许为空！');
            return false;
        }
		
		
		//----提交tag
        var tags = new Array();
        $('.keyword').each(function(s, n) {
            kw = n.value;
            tags.push(kw);
        });
        $('#tags').val(tags);

		
		
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
		}
        
		
		
		
	

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
        
  
        //----判断编辑器内容
        var arr = [];
        arr.push(UE.getEditor('editor').getContentTxt());
        if(arr.join("\n") == ""){
            alert('详细内容不允许为空！');
            return false;
        } 
		
		
		$('#product-form').submit();
		
        
    }

</script>
