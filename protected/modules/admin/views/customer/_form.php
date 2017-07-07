<?php
/* @var $this CustomerController */
/* @var $model Customer */
/* @var $form CActiveForm */
?>

<div class="form">

    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'customer-form',
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
        <tr>
            <td><?php echo $form->labelEx($model, 'password'); ?></td>
            <td><?php echo $form->passwordField($model, 'password', array('size' => 40, 'maxlength' => 40)); ?></td>
            <td><?php echo $form->error($model, 'password'); ?></td>
        </tr>
        <tr>
            <td><?php echo $form->labelEx($model, 'email'); ?></td>
            <td><?php echo $form->textField($model, 'email', array('size' => 60, 'maxlength' => 96)); ?></td>
            <td><?php echo $form->error($model, 'email'); ?></td>
        </tr>
        <tr>
            <td><?php echo $form->labelEx($model, 'pic'); ?></td>
            <td><?php echo $form->textField($model, 'pic', array('size' => 60, 'maxlength' => 225)); ?></td>
            <td><?php echo $form->error($model, 'pic'); ?></td>
        </tr>
        <tr>
            <td><?php echo $form->labelEx($model, 'email'); ?></td>
            <td><?php echo $form->textField($model, 'email', array('size' => 60, 'maxlength' => 96)); ?></td>
            <td><?php echo $form->error($model, 'email'); ?></td>
        </tr>
        <tr>
            <td><?php echo $form->labelEx($model, 'telephone'); ?></td>
            <td><?php echo $form->textField($model, 'telephone', array('size' => 32, 'maxlength' => 32)); ?></td>
            <td><?php echo $form->error($model, 'telephone'); ?></td>
        </tr>
        <tr>
            <td><?php echo $form->labelEx($model, 'mobile'); ?></td>
            <td><?php echo $form->textField($model, 'mobile', array('size' => 32, 'maxlength' => 32)); ?></td>
            <td><?php echo $form->error($model, 'mobile'); ?></td>
        </tr>
        <tr>
            <td><?php echo $form->labelEx($model, 'address'); ?></td>
            <td><?php echo $form->textField($model, 'address', array('size' => 60, 'maxlength' => 128)); ?></td>
            <td><?php echo $form->error($model, 'address'); ?></td>
        </tr>
        <tr>
            <td></td>
            <td colspan="2"><?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?></td>
           
        </tr>
    </table>

<?php $this->endWidget(); ?>

</div><!-- form -->