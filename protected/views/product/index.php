<?php
	$userStat = '';
	if(Yii::app()->user->isGuest == false){
		if(Yii::app()->user->id == $userInfo->id){
			$userStat = 'self';
		}else{
			$userStat = 'other';
		}
	}else{
		$userStat = 'other';
	}		
?>

<?php
	if(isset($userInfo->banner)){
?>
<div class="diy_user_bg" style="background:url('/assets/userbg/<?=$userInfo->banner;?>')">
<?php
	}
?>

<!--主内容_begin-->
	<div class="diy_content">
    	<!--top_begin-->
    	<div class="diy_top">
        
        	<div class="diy_top_left">
            
                <!--user_info-->
                <img class="diy_user_logo" src="/<?=$userInfo->pic?>"/>
                <div class="heading us_shop_img">
                    <?=$userInfo->name?>
                    <span class="font_4"> &nbsp;&nbsp;-- &nbsp;&nbsp;的3D创意商店</span>
                </div>
                <div class="font_4 diy_des"><?php if(isset($userInfo->description)){ echo $userInfo->description;}?></div>
                <!--user_info-->
                
                <div class="diy_font"><?=$userInfo->integral;?><span>&nbsp;积分</span></div>
                <div class="diy_font"><?=$p_count;?><span>&nbsp;个模型</span></div>
  
            </div>
            
            <div class="diy_top_right" style="background:url('/assets/userbg/<?=$userInfo->diyimg;?>')">
            		
            </div>
            
        </div>
        <!--top_end-->
        
        <!--content_begin-->
        <div class="diy_content_c">
        	<div class="shop_nav">
                <div id="design" class="title_sel">
                <?php
				if($userStat == 'self'){
					echo '我';
				}else{
					echo '他';
				}
				?>的3D创意
                </div>
                <div id="blog" class="title">
                <?php
				if($userStat == 'self'){
					echo '我';
				}else{
					echo '他';
				}
				?>的博客</div>
            </div>
            <div class="clear"></div>
            <div id="design_info">
            <?php 
    			$srcPath =  SITE_URL;
    			foreach($product as $p){
       				$url=$this->createUrl('product/view',array('id'=>$p->id));
	   				$productPhoto = ProductPhoto::model()->findAll('p_id='.$p->id);
	   				foreach($productPhoto as $photo){
	   					if($photo->p_id == $p->id){
			?>
            <ul class="diy_ul">
            	<li class="diy_li">
                	<div><a href="<?php echo $url ?>"><img alt="<?php echo $p->name?>" title="<?php echo $p->name ?>" src="/assets/upfile/<?=$photo->pic;?>"></a></div>
                    <div class="name"><a href="<?php echo $url ?>" title="<?php echo $p->name;?>"><?php echo $p->name ?></a></div>
                    <div class="price">&yen;<?php echo $p->price ?></div>
                    <div class="like">
                    <form id="product-form<?=$p->id;?>" method="post" action="<?php  echo $this->createUrl('product/3dSearch'); ?>" >
                            <input type="hidden" name ='keyword1'   value="<?=$p->keyword1?>"/>
                            <input type="hidden" name = 'p_id' value="<?=$p->id;?>">
                            <a  href="javascript:void(0)" onclick="$('#product-form<?=$p->id;?>').submit();">似</a>
                    </form>      
                    </div>
                </li>
            </ul>
            <?php  
							break;
						}
	   				}
   				} 
			?>
            </div>
            <div id="blog_info" style="display:none;">
                <?php
                	foreach($blog as $b){
				?>
            	<div id="blog_<?=$b->id;?>" class="blog_list_info">
                	<div class="blog_list_img">
                    	<img width="180" src="/assets/blogfile/<?=$b->pic;?>">
                    </div>
                    <div class="blog_right_content">
                        <div class="color_or"></div>	
                        <div class="blog_right_title"><a target="_blank" href="<?=$this->createUrl('/blogLog/view',array('id'=>$b->id,'t'=>$b->title))?>"><?=$b->title;?></a></div>
                        <div style="line-height:20px; margin-top:5px; font-size: 1.6rem "><?= Helper::truncate_utf8_string($b->description,150);?></div>
                    </div>
                    <div class="clear"></div>
                    <?php
                    	if($userStat == 'self'){
					?>
                    <div id="self_edit"><a target="_blank" href="<?=$this->createUrl('/blogLog/update',array('id'=>$b->id))?>">修改</a><a onclick="Delete(<?=$b->id;?>)">删除</a></div>
                    <?php
						}
					?>
                </div>
				<?php
					}
				?>
            </div>
            <div class="clear"></div> 
        </div>	
        <!--content_end-->
        
    </div>
<!--主内容_end-->

</div>
<script>

//----切换页签
$('#blog').click(function(){
	$('#design').removeClass('title_sel').addClass('title');
	$('#blog').removeClass('title').addClass('title_sel');
	$('#design_info').hide();
	$('#blog_info').show();	
});
$('#design').click(function(){
	$('#blog').removeClass('title_sel').addClass('title');
	$('#design').removeClass('title').addClass('title_sel');
	$('#blog_info').hide();
	$('#design_info').show();	
});


//----删除博客
function Delete(id){
	cm = confirm("确定删除吗？       ");
   	if(cm){
       $.post("/index.php/blogLog/delete",{id:id, mr:Math.random()},function(msg){
              
			  if(msg==200){
				$('#blog_'+id).remove();
			  }else{
				alert('删除失败！');
			  }			  
		});
   	}else{
       
   	}	
}

</script>