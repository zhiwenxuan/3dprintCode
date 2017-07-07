
<?php
	//print_r($model);
	$this->renderpartial('//customer/left');
?>



<div class="float_left">
<span  class="mb_title">密码修改</span>

<div class="main_right">

    <div class="accountInfo">
    
    	
       <div class="form">

			<?php $form=$this->beginWidget('CActiveForm', array(
                'id'=>'pwd-form',
            )); ?>
            <?php echo $form->errorSummary($model); ?>
            <table class="infoTable">    
                <tr>
                	<td><?php echo $form->labelEx($model,'newpassword'); ?></td>
                    <td><?php echo $form->passwordField($model,'newpassword',array('class'=>'input_width')); ?></td>
                    <td><?php echo $form->error($model,'newpassword'); ?></td>
                </tr>
                
                <tr>
                	<td><?php echo $form->labelEx($model,'newverifyPassword'); ?></td>
                    <td><?php echo $form->passwordField($model,'newverifyPassword',array('class'=>'input_width')); ?></td>
                    <td><?php echo $form->error($model,'newverifyPassword'); ?></td>
                </tr>
                
              
             
                <tr>
            		<td></td>
                    <td colspan="2">
                    	<div style="float:left;">
                    		<a class="bottom_true"  onclick="$('#pwd-form').submit();"><span>&nbsp;提 交&nbsp;</span></a>
                        </div>
                        <div style="float:left; margin-left:10px;">
                        	<a class="bottom_false" href="<?php echo $this->createUrl('customer/account', array('id'=>Yii::app()->user->id)) ?>"><span>&nbsp;取 消&nbsp;</span></a>
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
    

