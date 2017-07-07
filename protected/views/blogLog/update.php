<?php
$this->renderpartial('//customer/left');
?>

<!-- right -content_begin -->
<div class="m_left">
	<div class="m_title">
    	<span>修改博客</span>
    </div>
    <?php
		$form = $this->beginWidget('CActiveForm', array(
			'id' => 'blogCreate',
			'enableAjaxValidation' => false,
			'htmlOptions' => array('enctype' => 'multipart/form-data'),
		));
    ?>
    <?php echo $form->errorSummary($model); ?>
    <input id="tags" value="<?=$model->tags;?>" name="tags" type="hidden">
    <input id="pic" value="<?=$model->pic;?>" name="pic" type="hidden">
    <table class="m_table" cellpadding="0"  cellspacing="1">
    	<tr>
        	<td class="m_table_title"><span>*</span>标题:</td>
            <td><input id="title" class="m_ipt w_300" name="title"  maxlength="50" value="<?=$model->title;?>" type="text"><span class="form_msg">最多输入50个字符</span></td>
        </tr>
        <tr>
        	<td class="m_table_title"><span>*</span>标签:</td>
            <td>
            <?php
				$m_tag = explode(",", $model->tags); 
            	foreach($tags as $tag){
					$flag = 0;
					foreach($m_tag as $t){
						if($tag->id == $t){
							$flag = 1;
						}
					}
					if($flag == 1){
						echo '<label>'.$tag->name.'</label>&nbsp;<input  type="checkbox" checked="checked"  id="'.$tag->id.'" name="tag"/>&nbsp;&nbsp;&nbsp;';	
					}else{
						echo '<label>'.$tag->name.'</label>&nbsp;<input  type="checkbox"  id="'.$tag->id.'" name="tag"/>&nbsp;&nbsp;&nbsp;';	
					}
				}
			?><span class="form_msg">至少选选择一个标签</span>
            </td>
        </tr>
        <tr>
        	<td class="m_table_title"><span>*</span>题图:</td>
            <td>
            <?php
			$kb = 1024;
			$complete_script = "js:function(id, name, response)
			{	
				
				$('#picSpace').append('<div id='+id+' class=picModel  fileNme='+response['filename']+' ><img style=float:left; width=100 height=100 src=/assets/blogfile/'+response['filename']+'><a class=deletePic onClick=DeletePic('+id+') >删除</a><div class=clear></div></div>');
			
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
						
									),				   											
				'validation'=>array('allowedExtensions'=>array('jpg','jpeg','png'),
									'sizeLimit'=>2048*$kb,
									'minSizeLimit'=>10*$kb,
									'itemLimit'=>20))
				));
			?>
            <span class="form_msg up_msg">只允许上传一张图片</span>
            </td>
        </tr>
        <tr>
        	<td></td>
            <td id="picSpace">
            <div id='0' class=picModel  fileNme='<?=$model->pic?>' ><img style="float:left;" width=100 height=100 src='/assets/blogfile/<?=$model->pic?>'><a class="deletePic" onClick="DeletePic('0')" >删除</a><div class=clear></div></div>
            </td>
        </tr>
        <tr>
        	<td class="m_table_title"><span>*</span>描述:</td>
            <td><textarea id="description" class="m_ipt w_700" name="description" maxlength="255" ><?=$model->description;?></textarea></td>
        </tr>
        <tr>
        	<td class="m_table_title"><span>*</span>正文:</td>
            <td></td>
        </tr>
        <tr>
        	<td colspan="2"><script id="editor" name="content" type="text/plain" class="m_ipt_content"><?=$model->content;?></script></td>
        </tr>
        <tr>
        	<td colspan="2"><div class="img_submit" onclick="subMitModel();">提交</div></td>
        </tr>
    </table>
    <?php $this->endWidget(); ?>
</div>
<!-- right -content_end -->
<div class="clear"></div>





<script type="text/javascript">
    //实例化编辑器
    UE.getEditor('editor');
	
	//----新增时的删除
	function DeletePic(id){
		$('#'+id).remove();	 
	}
	
	//----提交表单
    function subMitModel(){
		
		//----判断标题
        if ($('#title').val() == "") {
            alert('请输入标题！');
            return false;
        }

		//----判断checkbox是否选中
		var check = 0;
		var tags = new Array();
		$("[name='tag']").each(function(l,n){
			if (n.checked == true)
			{
				check++;
				tags.push(n.id);
			}
		});
		$('#tags').val(tags);
		if(check == 0){
			  alert('至少选择一个标签！');
			  return false;
		}
		
		//----判断图片
		var num = 1;
		var pic = '';
		$('.picModel').each(function(index, element) {
            if(index == 0){
				num = 0;
				pic =  $(this).attr("fileNme");
			}else{
				num++;
			}
        });
		$('#pic').val(pic);
		if(num != 0){
			alert('只允许上传一张图片');
			return false;
		}
		
		//----判断描述不能为空
		if ($('#description').val() == "") {
            alert('请输入描述！');
            return false;
        }
		

        //----判断编辑器内容
        var arr = [];
        arr.push(UE.getEditor('editor').getContentTxt());
        if (arr.join("\n") == "") {
            alert('详细内容不允许为空！');
            return false;
        }
		
		$('#blogCreate').submit();
		

    }
	
</script>





