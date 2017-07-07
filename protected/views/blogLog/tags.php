
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
	<?php
        foreach($blog as $b){
    ?>
    <div class="right_info">
        <div style="float:left; width:200px; height:140px; overflow:hidden; margin-top:5px; margin-left:5px; margin-bottom:5px;">
            <a target="_blank" href="/index.php/blogLog/view/<?=$b->id;?>?t='<?=$b->title;?>"><img width="200" src="/assets/blogfile/<?=$b->pic;?>"></a>
        </div>
        
        <div style="float:left; width:600px; margin-left:10px;">
            <div class="blog_right_title o_margin_top10"><a target="_blank" href="/index.php/blogLog/view/<?=$b->id;?>?t='<?=$b->title;?>"><?=$b->title;?></a></div>
            <div class="clear" style="margin-top:10px;"></div>
            <div class="blog_content">
                <?= Helper::truncate_utf8_string($b->description,100);?>
            </div>
    
        </div>
        
        <div class="clear"></div>
        
    </div>
    <?php
        }
    ?>
        
        
        
    <ul class="pageList">
    <?php
    if ($onpage > 0) {
    ?>
        <a href="<?php        
                    echo $this->createUrl('blogLog/'.$type.'', array('page' => $onpage - 1,'s_title'=>$title));
                 ?>"><li>上一页</li></a>
    <?php
    }
    ?>
    <?php
        for ($i = 1; $i <= $pageALL; $i++) {
    ?>
            <a <?php
                if ($onpage != $i - 1){
               ?>  href="<?php  echo $this->createUrl('blogLog/'.$type.'', array('page' => $i - 1,'s_title'=>$title));?>"
               <?php
                }
               ?>
            >
                <li <?php
                    if ($onpage == $i - 1) {
                        echo 'id="pageListSel"';
                    }
                    ?> ><?= $i; ?></li>
            </a>   
            
    
    <?php
    }
    ?>		 
    
    <?php
    if ($pageALL > $onpage + 1) {
    ?>
        <a href="<?php  echo $this->createUrl('blogLog/'.$type.'', array('page' => $onpage + 1,'s_title'=>$title));?>"><li>下一页</li></a> 
    <?php
    }
    ?> 
    </ul>
</div>
<div class="clear"></div>
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