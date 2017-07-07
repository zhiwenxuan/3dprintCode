<!-- <div class="tab_page" id="tab_review" style="display: none;">-->
<!--  <div class="content">-->
  <?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'review-form',
	'enableClientValidation'=>true,
	'clientOptions'=>array(
		'validateOnSubmit'=>true,
	),
)); ?>
<div>   <b>您的姓名:</b><br>
        <input type="text" value="" name="name">
      <br/>        <?php  
        $this->widget('CStarRating',array(
              'model'=>Product::model(),
              'attribute'=>'rating',
              'maxRating'=>5,
              'titles'=>array(1=>'差',2=>'一般',3=>'不错',4=>'很好',5=>'非常好'),
              'allowEmpty'=>true
            ));
        ?>
        <b>我要评论:</b>
</div>
        <textarea rows="8" style="width: 98%;" name="text"></textarea>
  

     
	
        <div>
	 <b>请输入验证码:</b>
         <?php if(CCaptcha::checkRequirements()): ?>
         <input type="text" autocomplete="off" value="" name="captcha" width="10"/>
	<?php $this->widget('CCaptcha',array(
            'clickableImage'=>true,
            'showRefreshButton'=>false,
          //  'buttonLabel'=>'看不清',
            
            )); ?>

	<?php endif; ?>
        </div>
<!--        <br/>
        <b>请输入验证码:</b>
        <input type="text" autocomplete="off" value="" name="captcha"/>
        <br/></div>
        <img id="captcha" src="index.php?route=product/product/captcha"/>-->
     
      <div class="buttons">
        <table>
          <tbody><tr>
                  <td align="right"><a class="button" onclick="review-form.submit();"><span>发表评论</span></a></td>
          </tr>
        </tbody></table>
      </div>
      
<?php $this->endWidget(); ?>    
<!--</div>  -->
<!--    </div>-->