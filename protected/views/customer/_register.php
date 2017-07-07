
<?php
//print_r($model);
$this->renderpartial('//customer/left');
?>



<div class="float_left">
<span  class="mb_title">账户信息</span>

    <div class="main_right">

        <div class="accountInfo">


            <div class="form">

                <?php
                $form = $this->beginWidget('CActiveForm', array(
                    'id' => 'register-form',
                    'enableAjaxValidation' => false,
                    'htmlOptions' => array('enctype' => 'multipart/form-data',),
                ));
                ?>

				<input type="hidden" name="Customer[userbg]" id="userbg">
                <input type="hidden" name="Customer[diyuserbg]" id="diyuserbg">
                <table class="infoTable float_left">
                    <tr>
                        <td><?php echo $form->labelEx($model, 'name'); ?></td>
                        <td><?php echo $form->textField($model, 'name', array('class' => 'input_width')); ?></td>
                        <td><?php echo $form->error($model, 'name'); ?></td>
                    </tr>

                    <tr>
                        <td><?php echo $form->labelEx($model, 'email'); ?></td>
                        <td><?php echo $form->textField($model, 'email', array('class' => 'input_width')); ?></td>
                        <td><?php echo $form->error($model, 'email'); ?></td>
                    </tr>

                    <tr>
                        <td><?php echo $form->labelEx($model, 'telephone'); ?></td>
                        <td><?php echo $form->textField($model, 'telephone', array('class' => 'input_width')); ?></td>
                        <td><?php echo $form->error($model, 'telephone'); ?></td>
                    </tr>

                    <tr>
                        <td><?php echo $form->labelEx($model, 'mobile'); ?></td>
                        <td><?php echo $form->textField($model, 'mobile', array('class' => 'input_width')); ?></td>
                        <td><?php echo $form->error($model, 'mobile'); ?></td>
                    </tr>

                    <tr>
                        <td><?php echo $form->labelEx($model, 'address'); ?></td>
                        <td><?php echo $form->textField($model, 'address', array('class' => 'input_width')); ?></td>
                        <td><?php echo $form->error($model, 'address'); ?></td>
                    </tr> 
                    
                    
                    <tr>
                        <td>diy图片</td>
                        <td><?php
							$kb = 1024;
							$complete_script = "js:function(id, name, response)
							{	
								
								$('#picBanner').append('<div id=9'+id+' class=diypicModel  fileNme='+response['filename']+' ><img style=float:left; width=100 height=100 src=/assets/userbg/'+response['filename']+'><a class=deletePic onClick=DeletePic(9'+id+') >删除</a><div class=clear></div></div>');
							
							}";
							
							
							$delete = "js:function(id)
							{	
								$('#2').remove();
							
							}";
							
							$this->widget('ext.EFineUploader.EFineUploader',array(
								'id'=>'banerUploader',
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
							?>  只允许上传一张图片</td>
                        <td></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td><div id="picBanner">
                        
                        <?php
            				if($model->banner != ""){
								echo '<div id="2" class="diypicModel" fileNme="'.$model->diyimg.'" ><img style="float:left;" width="100" height="100" src="/assets/userbg/'.$model->diyimg.'"><a class="deletePic" onClick="DeletePic(\'2\')" >删除</a><div class="clear"></div></div>';	
							}   
                        ?>
                        
                        </div></td>
                        <td></td>
                    </tr>
                                      
  					
                    <tr>
                        <td>主页背景</td>
                        <td><?php
							$kb = 1024;
							$complete_script = "js:function(id, name, response)
							{	
								
								$('#picSpace').append('<div id='+id+' class=picModel  fileNme='+response['filename']+' ><img style=float:left; width=100 height=100 src=/assets/userbg/'+response['filename']+'><a class=deletePic onClick=DeletePic('+id+') >删除</a><div class=clear></div></div>');
							
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
							?>  只允许上传一张图片</td>
                        <td></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td><div id="picSpace">
                        
                        <?php
            				if($model->banner != ""){
								echo '<div id="1" class="picModel" fileNme="'.$model->banner.'" ><img style="float:left;" width="100" height="100" src="/assets/userbg/'.$model->banner.'"><a class="deletePic" onClick="DeletePic(\'1\')" >删除</a><div class="clear"></div></div>';	
							}   
                        ?>
                        
                        </div></td>
                        <td></td>
                    </tr>
                    
                    
                    <tr>
                        <td>个性介绍</td>
                        <td><textarea type="text"  id="description" name="Customer[description]"  maxlength="150" class="textInput"><?php if(isset($model->description)){ echo $model->description; }?></textarea ></td>
                        <td></td>
                    </tr>

                    <tr>
                        <td></td>
                        <td colspan="2">
                            <div style="float:left;">
                                <a class="bottom_true" onClick="submintForm();"><span>&nbsp;提 交&nbsp;</span></a>
                            </div>
                            <div style="float:left; margin-left:10px;">
                                <a class="bottom_false" href="<?php echo $this->createUrl('customer/account', array('id' => Yii::app()->user->id)) ?>"><span>&nbsp;取 消&nbsp;</span></a>
                            </div>
                        </td>         
                    </tr>

                </table>

                <div class="margin_space_3" style=" position:absolute; margin-left:480px;">
                    <div id="preview" class="userLogo">
                        <img id="imghead" src="/<?= $model->pic ?>"/><span  class="img_space"></span>
                    </div>
                    <a class="update_userLogo">
<?php echo CHtml::activeFileField($model, 'pic', array('onchange' => 'previewImage(this,"pic")')) ?>

                    </a>
                </div>

                <div class="clear_both"></div>   

<?php $this->endWidget(); ?>

            </div><!-- form --> 



        </div>


    </div>

</div>
<div class="clear"></div>
<script type="text/javascript" language="javascript">
//----获得预览图片
    function previewImage(file) {

        var MAXWIDTH = 200;
        var MAXHEIGHT = 200;
        var div = document.getElementById('preview');
        //----有FileReader的高版本浏览器
        if (file.files && file.files[0])
        {
            div.innerHTML = '<img id=imghead><span class="img_space"></span>';
            var img = document.getElementById('imghead');
            img.onload = function() {
                var rect = clacImgZoomParam(MAXWIDTH, MAXHEIGHT, img.offsetWidth, img.offsetHeight);
            }
            var reader = new FileReader();

            reader.onload = function(evt) {
                img.src = evt.target.result;
            }
            reader.readAsDataURL(file.files[0]);
        }
        //----无FileReader的低版本浏览器
        else
        {
            var sFilter = 'filter:progid:DXImageTransform.Microsoft.AlphaImageLoader(sizingMethod=scale,src="';
            file.select();
            var src = document.selection.createRange().text;
            div.innerHTML = '<img id=imghead><span class="img_space"></span>';
            var img = document.getElementById('imghead');
            img.filters.item('DXImageTransform.Microsoft.AlphaImageLoader').src = src;
            var rect = clacImgZoomParam(MAXWIDTH, MAXHEIGHT, img.offsetWidth, img.offsetHeight);
            status = ('rect:' + rect.top + ',' + rect.left + ',' + rect.width + ',' + rect.height);
            div.innerHTML = "<div id=divhead style='width:" + rect.width + "px;height:" + rect.height + "px;margin-top:" + rect.top + "px;margin-left:" + rect.left + "px;" + sFilter + src + "\"'></div>";
        }
    }
    function clacImgZoomParam(maxWidth, maxHeight, width, height) {
        var param = {top: 0, left: 0, width: width, height: height};
        if (width > maxWidth || height > maxHeight) {
            rateWidth = width / maxWidth;
            rateHeight = height / maxHeight;
            if (rateWidth > rateHeight)
            {
                param.width = maxWidth;
                param.height = Math.round(height / rateWidth);
            }
            else {
                param.width = Math.round(width / rateHeight);
                param.height = maxHeight;
            }
        }

        param.left = Math.round((maxWidth - param.width) / 2);
        param.top = Math.round((maxHeight - param.height) / 2);
        return param;
    }
	
	//----新增时的删除
 	function DeletePic(id)
	{

		$('#'+id).remove();
 	}

	
	
	
	//----提交表单
	function submintForm(){
		var num = 0;

		$('.picModel').each(function(i,j) {
			if(i == 1){
				alert('只允许上传一张图片作为主页背景！');
				num = i;
			}
		});
		
		$('.diypicModel').each(function(i,j) {
			if(i == 1){
				alert('只允许上传一张diy图片！');
				num = i;
			}
		});
		
		if(num == 1){
			return false;
		}
		
		var user_bg = $('.picModel').attr("fileNme");
		var diyimg = $('.diypicModel').attr("fileNme");
		$('#userbg').val(user_bg);
		$('#diyuserbg').val(diyimg);
		$('#register-form').submit();	
		
	}
</script>
</head>
<body>




