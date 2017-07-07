

<?php
/* @var $this CustomerController */
/* @var $model Customer */
/* @var $form CActiveForm */
?>

<div class="form">

    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'category-form',
        'enableAjaxValidation' => false,
    ));
    ?>

    <?php echo $form->errorSummary($model); ?>
    <table class="info_table">
       
          
        <tr>
            <td width="60"><?php echo $form->labelEx($model, 'name'); ?></td>
            <td><?php echo $form->textField($model, 'name', array('size' => 20, 'maxlength' => 20)); ?></td>
            <td><?php echo $form->error($model, 'name'); ?></td>
        </tr>
        <tr style="display: none;">
            <td><?php echo $form->labelEx($model, 'password'); ?></td>
            <td><?php echo $form->labelEx($model,'parent_id'); ?>
		<?php echo $form->textField($model,'parent_id'); ?>
		<?php echo $form->error($model,'parent_id'); ?></td>
            <td><?php echo $form->error($model, 'password'); ?></td>
        </tr>
        
        <tr>
            <td></td>
            <td colspan="2"><?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?></td>
           
        </tr>
    </table>

<?php $this->endWidget(); ?>

</div><!-- form -->