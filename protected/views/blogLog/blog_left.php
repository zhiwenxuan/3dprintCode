
<div class="blog_left float_left">
    <!--<div class="left_info">
    	<div class="title">
        	个人资料
        </div>
        <div>
        </div>
    </div>-->
    
    <div class="left_info">
    	<div class="title">
        	文章搜索
        </div>
        <div style="margin-top:20px;">
        	<form class="blog_search" method="post" action="<?php echo $this->createUrl('blogLog/bSearch'); ?>">
            	<input class="text" id="name" name="name" type="text" >
                <input class="submit" type="submit" value="搜索" style="">
            </form>
        </div>
    </div>
    
    <div class="left_info">
    	<div class="title">
        	文章分类
        </div>
        <div style="margin-top:5px;">
        	<?php
				$i = 1;
            	foreach($blogTags as $tags){
					if($i == 10){
						$i = 1;
					}
			?>
            	<a class="<?php
                			 if($i == 1){
							 	echo 'tags_1';
							 }
							 if($i == 2){
							 	echo 'tags_2';
							 }
							 if($i == 3){
							 	echo 'tags_3';
							 }
							 if($i == 4){
							 	echo 'tags_4';
							 }
							 if($i == 5){
							 	echo 'tags_5';
							 }
							 if($i == 6){
							 	echo 'tags_6';
							 }
							 if($i == 7){
							 	echo 'tags_7';
							 }
							 if($i == 8){
							 	echo 'tags_8';
							 }
							 if($i == 9){
							 	echo 'tags_9';
							 }
						  ?>" href="<?php echo $this->createUrl('blogLog/tags', array('c' => $tags->id)) ?>"><?=$tags->name;?></a>	
            <?php
				$i++;
		
				}
			?>
            <div class="clear"></div>
        </div>
    </div>
    
    <div class="left_info">
    	<div class="title">
        	阅读排行
        </div>
        <div>
        	<ul class="hotBlog">
            	<?php
					$h_num=1;
                	foreach($hotBlog as $hot){
				?>
            	<li><span class="<?php
                					if($h_num <= 3 ){
										echo 'hot_num';
									}else{
										echo 'hot_num_m';
									}
								 ?>"><?=$h_num;?></span><a onclick="markRead(<?=$hot->id;?>);" href="/index.php/blogLog/view/<?=$hot->id;?>"><?=$hot->title;?></a></li>
                <?php
					$h_num++;
					}
				?>
            </ul>
        </div>
    </div>
    
</div>

<script>
	//----统计阅读次数
	function markRead(id){
		$.post("<?php echo $this->createUrl('blogRead/readTime');?>",{id:id,mr:Math.random()},function(msg){
			if(msg == 200){
				//alert('成功！');
			}else{
				//alert('备注添加失败！')
			}
		});
	}
</script>