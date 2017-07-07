<?php
	$url=$this->createUrl('product/view',array('id'=>$self->id));
?>
<!--搜索的当前模型_begin-->
<div class="like_p">
	<div class="like_left">
    <?php
	foreach($selfPhoto as $photo){
		echo '<a target="_blank" href="'.$url.'"><img src="/assets/upfile/'.$photo->pic.'"></a>';
		break;
	}
	?>	
    </div>
    <div class="like_border"></div>
    <div class="like_right">
   		<ul class="like_info">
        	<li class="title"><a target="_blank" href="<?=$url;?>"><?=$self->name;?></a></li>
            <li class="p_price">&yen;<?=$self->price;?></li>
            <li>作者：<span class="font_black"><?=$user->name;?></span>&nbsp;&nbsp;<a target="_blank" href="<?php echo $this->createUrl('product/index', array('id' => $self->add_uid)) ?>">(他的商铺)</a></li>
            <li>类别：
           		<span class="font_black">
                <?php
                	$arr = explode(",",$self->category_id);
					foreach($arr as $cid){
						foreach($category as $c){
							if($c->id == $cid){
								echo $c->name.',&nbsp;';
							}
						}
					}
				?>
                </span>
            </li>
            <li>标签：
            	<span class="font_black" title="
                	<?php
					if($self->keyword1 != ""){
						echo $self->keyword1.',';
					}
					?>
                    <?php
					if($self->keyword2 != ""){
						echo $self->keyword2.',';
					}
					?>
                    <?php
					if($self->keyword3 != ""){
						echo $self->keyword3.',';
					}
					?>
                    <?php
					if($self->keyword4 != ""){
						echo $self->keyword4.',';
					}
					?>
                    <?php
					if($self->keyword5 != ""){
						echo $self->keyword5.',';
					}
					?>
                    <?php
					if($self->keyword6 != ""){
						echo $self->keyword6.',';
					}
					?>
                    <?php
					if($self->keyword7 != ""){
						echo $self->keyword7.',';
					}
					?>
                    <?php
					if($self->keyword8 != ""){
						echo $self->keyword8.',';
					}
					?>
                    <?php
					if($self->keyword9 != ""){
						echo $self->keyword9.',';
					}
					?>
                    <?php
					if($self->keyword10 != ""){
						echo $self->keyword10.',';
					}
					?>
                ">
                	<?php
					if($self->keyword1 != ""){
						echo $self->keyword1.',&nbsp;';
					}
					?>
                    <?php
					if($self->keyword2 != ""){
						echo $self->keyword2.',&nbsp;';
					}
					?>
                    <?php
					if($self->keyword3 != ""){
						echo $self->keyword3.',&nbsp;';
					}
					?>
                    <?php
					if($self->keyword4 != ""){
						echo $self->keyword4.',&nbsp;';
					}
					?>
                    <?php
					if($self->keyword5 != ""){
						echo $self->keyword5.',&nbsp;';
					}
					?>
                    <?php
					if($self->keyword6 != ""){
						echo $self->keyword6.',&nbsp;';
					}
					?>
                    <?php
					if($self->keyword7 != ""){
						echo $self->keyword7.',&nbsp;';
					}
					?>
                    <?php
					if($self->keyword8 != ""){
						echo $self->keyword8.',&nbsp;';
					}
					?>
                    <?php
					if($self->keyword9 != ""){
						echo $self->keyword9.',&nbsp;';
					}
					?>
                    <?php
					if($self->keyword10 != ""){
						echo $self->keyword10.',&nbsp;';
					}
					?>
                </span>
            </li>	
           
        </ul>
    </div>
    <div class="clear"></div>
</div>
<!--搜索的当前模型_end-->


<!--搜索结果_begin-->
<div class="like_content">
	<ul class="like_ul">
    <?php 
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
    } 
	?>
    <div class="clear"></div>
    </ul>
</div>
<!--搜索结果_end-->
