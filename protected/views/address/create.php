
<?php
	//print_r($model);
	$this->renderpartial('//customer/left');
?>



<div class="float_left">
<span  class="mb_title">地址编辑</span>


<div class="main_right">

    <div class="accountInfo">
    
    	
       <div class="form">
            <?php $form=$this->beginWidget('CActiveForm', array(
                    'id'=>'address-form',
                    'enableAjaxValidation'=>false,
                    'htmlOptions' => array('enctype'=>'multipart/form-data'),  
            )); ?>
           <?php echo $form->errorSummary($model); ?>
            <table class="infoTable">    

                <tr>
                    <td><?php echo $form->labelEx($model,'name'); ?></td>
                    <td><?php echo $form->textField($model,'name',array('size'=>32,'maxlength'=>32)); ?></td>
                    <td><?php echo $form->error($model,'name'); ?></td>
                </tr>
                

                <tr>
                    <td><?php echo $form->labelEx($model,'mobile'); ?></td>
                    <td><?php echo $form->textField($model,'mobile'); ?></td>
                    <td><?php echo $form->error($model,'mobile'); ?></td>
                </tr>
                
                <tr>
                    <td><?php echo $form->labelEx($model,'telephone'); ?></td>
                    <td><?php echo $form->textField($model,'telephone',array('size'=>32,'maxlength'=>32)); ?></td>
                    <td><?php echo $form->error($model,'telephone'); ?></td>
                </tr>
                
                
                <tr>
                    <td><?php echo $form->labelEx($model,'areacode'); ?></td>
                    <td><?php echo $form->textField($model,'areacode',array('size'=>10,'maxlength'=>10)); ?></td>
                    <td><?php echo $form->error($model,'areacode'); ?></td>
                </tr>
                
                <tr>
                    <td><?php echo $form->labelEx($model,'area'); ?></td>
                    <td><?php echo $form->textField($model,'area',array('size'=>60,'maxlength'=>225)); ?></td>
                    <td><?php echo $form->error($model,'area'); ?></td>
                </tr>
                
                <tr>
                    <td><?php echo $form->labelEx($model,'address'); ?></td>
                    <td><?php echo $form->textArea($model,'address',array('rows'=>6, 'cols'=>60,'style'=>'border:1px solid #dedede; color:#888; padding:5px;')); ?></td>
                    <td><?php echo $form->error($model,'address'); ?></td>
                </tr>
                
               
                
              
                
                <tr>
                    <td></td>
                    <td colspan="2">
                    	<div style="float:left;">
                    		<?php echo CHtml::submitButton($model->isNewRecord ? '保存' : '保存',array('class'=>'bottom_true','style'=>'height:29px; padding-top:0px;')); ?>
                        </div>
                        <div style="float:left; margin-left:10px;">
                        	<a class="bottom_false" href="<?php echo $this->createUrl('address/index') ?>"><span>&nbsp;取 消&nbsp;</span></a>
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