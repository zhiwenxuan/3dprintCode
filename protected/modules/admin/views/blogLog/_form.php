


<div class="form">
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'blog-log-form',
	'enableAjaxValidation'=>false,
)); ?>
	<?php echo $form->errorSummary($model); ?>
<table class="info_table">    
	 <tr>
     	<td width="60">
			<?php echo $form->labelEx($model,'title'); ?>
        </td>
     	<td>
			<?php echo $form->textField($model,'title',array('size'=>60,'maxlength'=>225)); ?>
        </td>
     	<td>
			<?php echo $form->error($model,'title'); ?>
        </td>
    </tr>
    <tr>
    	<td>
		<?php echo $form->labelEx($model,'description'); ?>
        </td>
        <td>
		<?php echo $form->textField($model,'description',array('size'=>60,'maxlength'=>255)); ?>
        </td>
        <td>
		<?php echo $form->error($model,'description'); ?>
        </td>
	</tr>
	
    <tr>
    	<td>
		<?php echo $form->labelEx($model,'stat'); ?>
        </td>
        <td>
		<?php echo $form->textField($model,'stat',array('size'=>60,'maxlength'=>225)); ?>
        </td>
        <td>
		<?php echo $form->error($model,'stat'); ?>
        </td>
	</tr>
    

	<tr>
    	<td>
		<?php echo $form->labelEx($model,'pic'); ?>
        </td>
        <td>
		<?php echo $form->textField($model,'pic',array('size'=>60,'maxlength'=>225)); ?>
        </td>
        <td>
		<?php echo $form->error($model,'pic'); ?>
        </td>
	</tr>

	<tr>
    	<td>
		<?php echo $form->labelEx($model,'tags'); ?>
        </td>
        <td>
       	<?php
		$arr = array();
		$tags = BlogTags::model()->findAll();
		foreach($tags as $t)
		{
			$arr[$t->id] = $t->name;
			
		}
		 	echo $form->checkBoxList($model,'tags',$arr,array('separator'=>'&nbsp;','template'=>'{input} {label}')); 
		?>
        </td>
        <td>
		<?php echo $form->error($model,'tags'); ?>
        </td>
	</tr>
	<tr>
    	<td>
		<?php echo $form->labelEx($model,'content'); ?>
        </td>
        <td>
		<script id="editor" name="content" type="text/plain" style="width:750px;height:500px;">
        <?php
		if(isset($model->content)){
			echo $model->content;	
		}
		?>
        </script>
        </td>
        <td>
		<?php echo $form->error($model,'content'); ?>
        </td>
	</tr>
	<tr>
    	<td></td>
    	<td colspan="2">
		<?php echo CHtml::submitButton($model->isNewRecord ? '保存' : '保存', array('class' => 'bottom_true', 'style' => 'height:29px; padding-top:4px;')); ?>
		</td>
    </tr>
		
</table>
<?php $this->endWidget(); ?>
</div>


<script type="text/javascript">
    //实例化编辑器
    //建议使用工厂方法getEditor创建和引用编辑器实例，如果在某个闭包下引用该编辑器，直接调用UE.getEditor('editor')就能拿到相关的实例
    UE.getEditor('editor');
    
    
    $('.bottom_true').click(function() {
        //----判断编辑器内容
        var arr = [];
        arr.push(UE.getEditor('editor').getContentTxt());
        if(arr.join("\n") == ""){
            alert('详细内容不允许为空！');
            return false;
        }
    });
</script>