 <?php 	 if(count($items)>0)
         $this->renderpartial('view',array("items"=>$items,'model'=>$model));
 ?>
<div class="top">
  <div class="left"></div>
  <div class="right"></div>
  <div class="center">
    <div class="heading">商 品 展 示</div>
  </div>
</div>
<div class="middle">
    <div class="list">
        <?php $srcPath=  Yii::app()->request->baseUrl; 
               $srcPath =$srcPath."/images/product/";
                if (count($products)==0) echo count($items)>0?"请继续选择子类":"这个分类暂时没有商品上架";
                else{
              foreach( $products as $comment) {
               $src=$srcPath. nl2br(CHtml::encode($comment->thumbnail));
              $url=$this->createUrl('product/view',array('id'=>$comment->id));
              $carturl=$this->createUrl('checkout/add2cart',array('id'=>$comment->id,'qty'=>1));
               ?>
            <div style="width: 20%">
                <div class="image"><img src="<?php echo $src ;?>" alt=" "/>
              <a href="<?php echo $url ;?>"><?php echo nl2br(CHtml::encode($comment->name));  ?></a></div>
                <div class="name"><?php echo nl2br(CHtml::encode($comment->price));?><a title="购买" href="<?php echo $carturl; ?>" class="button_add_small">&nbsp;</a></div>
   
            </div>  
       <?php } }?>
      

          </div>
 <?php $this->widget('CLinkPager', array(
    'pages' => $pages,
     'header'=>'页码',
     'prevPageLabel' => '上一页',
     'nextPageLabel' => '下一页',
 
)) ?>
</div>
  <div class="bottom">&nbsp;</div>
<?php  echo $this->renderpartial('//product/recent' ) ;?>
