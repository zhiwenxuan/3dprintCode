 <table cellspacing="0" cellpadding="2" style="width: 100%;">
       <tbody>
        
       <?php $srcPath=  Yii::app()->request->baseUrl; 
               $srcPath =$srcPath."/images/product/";
              foreach( Product::model()->featured()->findAll() as $comment) {
               $src=$srcPath. nl2br(CHtml::encode($comment->thumbnail));
              $url=$this->createUrl('product/view',array('id'=>$comment->id));
              $carturl=$this->createUrl('checkout/add2cart',array('id'=>$comment->id,'qty'=>1));
               ?> 
<tr>
        <td valign="top" style="width:1px"><a href="<?php echo $url;?>"><img width="38" heigth="38" src="<?php echo $src;?>"></a></td>
        <td valign="top"><a href="<?php echo $url;?>"><?php echo $comment->name;?></a>
                    <br>
                    <span style="font-size: 11px; color: #900;"><?php echo nl2br(CHtml::encode($comment->price));?></span>
                  <a title="购买" href="<?php echo $carturl; ?>" class="button_add_small">&nbsp;</a>
       </td>
      </tr>
   <?php } ?>   
   </tbody></table>
