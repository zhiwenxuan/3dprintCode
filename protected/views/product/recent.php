<div class="top">
  <div class="left"></div>
  <div class="right"></div>
  <div class="center">
    <div class="heading"> 最 新 商 品</div>
  </div>
</div>
<div class="middle">
<table class="list">
            <tbody>
              <?php 
              $srcPath=  Yii::app()->request->baseUrl."/images/product/"; 
             
               
               $products=Product::model()->recently()->findAll();
               $count=count($products);
               $i=0;
               while($i<$count){
                  echo "<tr>" ;
                   for ($j=0;$j<4;$j++){
                       $comment=$products[$i];
                          $src=$srcPath. nl2br(CHtml::encode($comment->thumbnail));
                          $url=$this->createUrl('product/view',array('id'=>$comment->id));
                          $carturl=$this->createUrl('checkout/add2cart',array('id'=>$comment->id,'qty'=>1));
                  ?>      
                   <td width="25%"> 
                      <a href="<?php echo $url ?>"><img alt="<?php echo $comment->name?>" title="MacBook" src="<?php echo $src;?>"></a><br>
                      <a href="<?php echo $url ?>"><?php echo $comment->name ?></a><br>
<!--                      <span style="color: #900; font-weight: bold;"></span>--><?php echo $comment->price ?>
                      <a title="购买" href="<?php echo $carturl; ?>" class="button_add_small">&nbsp;</a><br>
                    </td>
                
                <?php  $i++;} 
                   echo "</tr>";
                } 
//              foreach( Product::model()->recently()->findAll() as $comment) {
//               $src=$srcPath. nl2br(CHtml::encode($comment->thumbnail));
//              $url=$this->createUrl('product/view',array('id'=>$comment->id));
//              $carturl=$this->createUrl('checkout/add2cart',array('id'=>$comment->id,'qty'=>1));
               ?>

          </tbody>
</table>
</div>
  <div class="bottom">&nbsp;</div>