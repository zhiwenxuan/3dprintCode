
<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'product-form',
	'enableAjaxValidation'=>false,
)); ?>


<table class="info_table">
    <tr>
        <td width="60">
			<?php echo $form->labelEx($model,'category_id'); ?>
        </td>
        <td>
			<?php echo $form->textField($model,'category_id'); ?>
        </td>
        <td>
			<?php echo $form->error($model,'category_id'); ?>
        </td>
    </tr>

	<tr>
    	<td>
			<?php echo $form->labelEx($model,'name'); ?>
		</td>
        <td>
			<?php echo $form->textField($model,'name',array('size'=>60,'maxlength'=>255)); ?>
		</td>
        <td>
			<?php echo $form->error($model,'name'); ?>
		</td>
    </tr>

	<tr>
    	<td>
			<?php echo $form->labelEx($model,'three_model'); ?>
		</td>
        <td>
			<?php echo $form->textField($model,'three_model',array('size'=>60,'maxlength'=>225)); ?>
		</td>
        <td>
			<?php echo $form->error($model,'three_model'); ?>
		</td>
    </tr>

	<tr>
    	<td>
			<?php echo $form->labelEx($model,'thumbnail'); ?>
		</td>
        <td>
			<?php echo $form->textField($model,'thumbnail',array('size'=>60,'maxlength'=>255)); ?>
		</td>
        <td>
			<?php echo $form->error($model,'thumbnail'); ?>
		</td>
    </tr>

	<tr>
    	<td>
			<?php echo $form->labelEx($model,'pic1'); ?>
		</td>
        <td>
			<?php echo $form->textField($model,'pic1',array('size'=>60,'maxlength'=>225)); ?>
		</td>
        <td>
			<?php echo $form->error($model,'pic1'); ?>
		</td>
    </tr>

	<tr>
    	<td>
			<?php echo $form->labelEx($model,'pic2'); ?>
		</td>
        <td>
			<?php echo $form->textField($model,'pic2',array('size'=>60,'maxlength'=>225)); ?>
		</td>
        <td>
			<?php echo $form->error($model,'pic2'); ?>
		</td>
    </tr>

	<tr>
    	<td>
			<?php echo $form->labelEx($model,'pic3'); ?>
		</td>
        <td>
			<?php echo $form->textField($model,'pic3',array('size'=>60,'maxlength'=>225)); ?>
		</td>
        <td>
			<?php echo $form->error($model,'pic3'); ?>
		</td>
    </tr>

	<tr>
    	<td>
			<?php echo $form->labelEx($model,'pic4'); ?>
		</td>
        <td>
			<?php echo $form->textField($model,'pic4',array('size'=>60,'maxlength'=>225)); ?>
		</td>
        <td>
			<?php echo $form->error($model,'pic4'); ?>
		</td>
    </tr>
    
    <tr>
    	<td>
			<?php echo $form->labelEx($model,'price'); ?>
		</td>
        <td>
			<?php echo $form->textField($model,'price'); ?>
		</td>
        <td>
			<?php echo $form->error($model,'price'); ?>
		</td>
    </tr>
    
    <tr>
    	<td>
			<?php echo $form->labelEx($model,'buy'); ?>
		</td>
        <td>
			<?php echo $form->textField($model,'buy'); ?>
		</td>
        <td>
			<?php echo $form->error($model,'buy'); ?>
		</td>
    </tr>
    
    <tr>
    	<td>
			<?php echo $form->labelEx($model,'stat'); ?>
		</td>
        <td>
			<?php echo $form->textField($model,'stat'); ?>
		</td>
        <td>
			<?php echo $form->error($model,'stat'); ?>
		</td>
    </tr>
    
    <tr>
    	<td>
			<?php echo $form->labelEx($model,'shelves'); ?>
		</td>
        <td>
			<?php echo $form->textField($model,'shelves'); ?>
		</td>
        <td>
			<?php echo $form->error($model,'shelves'); ?>
		</td>
    </tr>
        
    <tr>
    	<td>
			<?php echo $form->labelEx($model,'description'); ?>
		</td>
        <td>
        <script id="editor" name="description" type="text/plain" style="width:750px;height:500px;">
			<?php echo $model->description; ?>
	    </script>
		</td>
        <td>
			<?php echo $form->error($model,'description'); ?>
		</td>
    </tr>
    
    <tr>
    	<td>
			<?php echo $form->labelEx($model,'add_uid'); ?>
		</td>
        <td>
			<?php echo $model->addUser->name; ?>
		</td>
        <td>
			
		</td>
    </tr>
    
    <tr>
    	<td>
			<?php echo $form->labelEx($model,'add_time'); ?>
		</td>
        <td>
			<?php echo $model->add_time; ?>
		</td>
        <td>
			
		</td>
    </tr>
    
    <tr>
    	<td>
			<?php echo $form->labelEx($model,'edit_uid'); ?>
		</td>
        <td>
			<?php echo $model->editUser->name; ?>
		</td>
        <td>
		</td>
    </tr>
    
    <tr>
    	<td>
			<?php echo $form->labelEx($model,'edit_time'); ?>
		</td>
        <td>
			<?php echo $model->edit_time; ?>
		</td>
        <td>

		</td>
    </tr>
	
	 <tr>
            <td></td>
            <td colspan="2"><?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?></td>
           
     </tr>
     </table>

<?php $this->endWidget(); ?>

</div><!-- form -->


<script>
 UE.getEditor('editor');
</script>