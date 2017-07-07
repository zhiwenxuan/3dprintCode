<div class="top">
    <div class="center">
        <div class="heading">
		
        </div>
    </div>
</div>
<div class="middle">
    
<?php 
    $srcPath=  SITE_URL;
    foreach($product as $comment){
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
                            <a id="search_model" href="javascript:void(0)" onclick="$('#product-form').submit();"  ></a>
                        </form>      
                    </div>
                   
                </div>
                <div style="clear: both"></div>
                
            </div>
        </div>


<?php  
    } 
?>

    
</div>
<div style="clear:both"></div>
<ul class="pageList">
        <?php
//$pageALL ----总页数
//$onpage ----当前页数
        if ($onpage > 0) {
            ?>
            <a href="<?php
                echo $this->createUrl('product/shop', array('page' => $onpage - 1));
            ?>"><li>上一页</li></a>
               <?php
           }
           ?>

        <?php
        for ($i = 1; $i <= $pageALL; $i++) {
            ?>
            <a  href="<?php
                echo $this->createUrl('product/shop', array('page' => $i - 1));
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
           
                echo $this->createUrl('product/shop', array('page' => $onpage + 1));
      
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