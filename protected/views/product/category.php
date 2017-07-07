<div class="top">
    <div class="center">
        <div class="heading">
            <?php
                foreach ($category as $r){
                    if($r->id == $_GET['c']){
                        echo $r->name;
                    }
                }
            ?>
        </div>
    </div>
</div>


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



<div style="clear:both"></div>
<ul class="pageList">
        <?php
//$pageALL ----总页数
//$onpage ----当前页数
        if ($onpage > 0) {
            ?>
            <a href="<?php
                echo $this->createUrl('product/category', array('c'=>$c,'page' => $onpage - 1));
            ?>"><li>上一页</li></a>
               <?php
           }
           ?>

        <?php
        for ($i = 1; $i <= $pageALL; $i++) {
            ?>
            <a  href="<?php
                echo $this->createUrl('product/category', array('c'=>$c,'page' => $i - 1));
            ?>"><li 
                    <?php
                    if ($onpage == $i - 1) {
                        echo 'id="pageListSel"';
                    }
                    ?>
                    ><?= $i; ?></li></a>   

            <?php
        }
        ?>		 

        <?php
        if ($pageALL > $onpage + 1) {
            
            ?>
            <a href="<?php
           
                echo $this->createUrl('product/category', array('c'=>$c,'page' => $onpage + 1));
      
            ?>"><li>下一页</li></a> 
               <?php
           }
           ?> 
    </ul>
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