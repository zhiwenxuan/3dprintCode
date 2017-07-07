<div class="top">
    <div class="center">
        <div class="heading"> 金  属</div>
    </div>
</div>
<div class="middle">
    
<?php 
    $srcPath=  SITE_URL;
    $products=Product::model()->findAll('category_id=2 AND stat=2 AND shelves=2 order by add_time desc');
	$i = 0;
    foreach($products as $comment){
       $src=$srcPath. nl2br(CHtml::encode($comment->thumbnail));
       $url=$this->createUrl('product/view',array('id'=>$comment->id));
?>

        <div class="recentList">
        
            <div class="recentList_img">
                <a href="<?php echo $url ?>"><img alt="<?php echo $comment->name?>" title="<?php echo $comment->name ?>" src="<?php echo $src;?>"></a>
                <span class="imgmid"></span>
            </div>
            <div class="recentList_title">
                <a href="<?php echo $url ?>"><?php echo $comment->name ?></a>
            </div>
            <div class="recentList_price">
                <div class="price">
                    &yen;<?php echo $comment->price ?>
                </div>

                <div id="buy_<?=$comment->id;?>" class="buy">
                    <!-- dk 创建一个图标, 点击查询类似3D模型(通过3D模型检索)-->
                    <div class="similar">   
                        <form id="product-form" method="post" action="<?php  echo $this->createUrl('product/3dSearch'); ?>" >
                            <input type="hidden" name ='currentModelNm'   value=" <?php echo $comment->id ?>"/>
                            <input type="hidden" name = 'p_id' value="<?=$comment->id;?>">
                            <a href="javascript:void(0)" onclick="$('#product-form').submit();"  >搜索类似模型</a>
                        </form>      
                    </div>
                    <?php
//                    if (!(Yii::app()->user->isGuest)){
//                    echo CHtml::ajaxLink('加入购物车',$this->createUrl('cart/ajaxadd',array('uid'=>Yii::app()->user->id,'pid'=>$comment->id)),array('type'=>'POST','success'=>"function(date,status,jqXHR){"
//                        ."if(status == 'success'){"
//                        . "if(date == 200){"
//                        . "$('#buy_".$comment->id."').html('<a id=font_org>已加入购物车</a>');"
//                        . "}"
//                        . "}"
//                        . "}"));
//                    }else{
//                        echo "<a href='".$this->createUrl('site/login')."'>加入购物车</a>";
//                    }

                    ?>
                </div>
                <div style="clear: both"></div>
                
            </div>
        </div>


<?php  
	if($i == 7){
		break;
	}
	$i++;
    } 
?>

    
</div>

<div style="clear:both"></div>

<script>
    $('.recentList').each(function(i,j){
       $(this).hover(function(){
          $(this).addClass('recentListSel');
       },function() {
	  $(this).removeClass("recentListSel");
       });
    });
   
</script>