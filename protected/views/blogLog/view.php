
<div style="float:left; width:140px; margin-right:20px; font-weight:700; margin-left:20px;">
<span style="font-size:15px; color:#b6bcc4;">博客标签</span>
<ul class="blogLeft">
<?php
	$i = 1;
	foreach($blogTags as $tags){
		if($i == 10){
			$i = 1;
		}
?>
<li><a class="tags_<?=$i;?>" href="<?php echo $this->createUrl('blogLog/tags', array('c' => $tags->id)) ?>"><?=$tags->name;?></a></li>
<?php
	$i++;

	}
?>
</ul>
</div>



<div style="float:left">


    <div class="right_info">
        <div style="text-align:center; color:#333; font-size:3.2rem; color:#38485a; font-weight:700; margin-top:20px;"><?=$model->title;?></div>
        <?php
            if($model->tags != ""){
        ?>
            <div style="text-align:center; margin-top:15px;">分类：
            <?php
                $arr = explode(",",$model->tags);
                foreach($blogTags as $t){
                    foreach($arr as $a){
                        if($t->id == $a){
            ?>
                             <a class="color_or" href="#"><?=$t->name;?></a>
            <?php
                        }
                    }
                }
                
            ?>&nbsp;&nbsp;&nbsp;&nbsp;
            <?=substr($model->create_time,0,10);?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a id="font_black" href="#">阅读</a>(<?=$model->read;?>)
            </div>
        <?php
            }
        ?>
        <div class="blog_view_content" style="font-size:16px; color:rgb(63, 63, 63);">
            <?=$model->content;?>	
        </div>
    </div>

</div>
