<div class="top">
    <div class="center">
        <div class="heading"> 热 门 商 品</div>
    </div>
</div>

	
<!--搜索结果_begin-->
<div class="like_content">
	<ul class="like_ul">
    <?php 
	$srcPath=  SITE_URL;
    $product=Product::model()->findAll('stat=2 AND shelves=2 AND push =1 order by buy DESC');
	$i = 0;
    foreach($product as $p){
       $url=$this->createUrl('product/view',array('id'=>$p->id));
	   $productPhoto = ProductPhoto::model()->findAll('p_id='.$p->id);
	   foreach($productPhoto as $p_photo){
	   		if($p_photo->p_id == $p->id){
				
	?>
    	<li>
        	<div>
                <a target="_blank" href="<?php echo $url ?>">
                    <img alt="<?php echo $p->name?>" title="<?php echo $p->name ?>" src="/assets/upfile/<?=$p_photo->pic;?>">
                </a>
            </div>
            <div id="lick_p_info">
            	<div id="like_p_title"><a target="_blank" href="<?php echo $url ?>" title="<?php echo $p->name?>"><?php echo $p->name?></a></div>
                <div id="like_p_price">&yen;<?php echo $p->price?></div>
                <div id="like_p_like">
                <form id="product-form<?=$p->id;?>" method="post" action="<?php  echo $this->createUrl('product/3dSearch'); ?>" >
                    <input type="hidden" name ='keyword1'   value="<?=$p->keyword1?>"/>
                    <input type="hidden" name = 'p_id' value="<?=$p->id;?>">
                    <a  href="javascript:void(0)" onclick="$('#product-form<?=$p->id;?>').submit();">似</a>
                </form>      
                </div>	
                <div class="clear"></div>
            </div>
        </li>
    <?php  
			break;
			}
	   }
	   $i++;
	   if($i == 12){
	   	break;
	   }
    } 
	?>
    <div class="clear"></div>
    </ul>
</div>
<!--搜索结果_end-->