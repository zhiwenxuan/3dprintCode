<?php
//print_r($pageALL);
//print_r($onpage);
//print_r($model);
$this->renderpartial('//customer/left');
?>


<div style="float:left;">
    
    
    <div style="width:828px; margin-left:18px; margin-bottom:18px; border-bottom:1px solid #dedede; height:40px; line-height:30px;">
    <span style="font-family:'微软雅黑'; font-size:20px;">下载记录</span>
    </div>
	
    
    <?php
		$result = empty($dataProvider); 
		
		foreach ($dataProvider as $r) {	
			
	?>
    <table id="product_<?= $r['id']; ?>" class="productList_mb" cellpadding="0" cellspacing="0">
     	
        <tr id="productListHeard">
            <td width="320" style="text-align:left; padding-left:20px;">
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?= substr($r['add_time'], 0, 22) ?>
            </td>
            <td width="120"></td>
            <td width="120"></td>
        </tr>
       
        <tr>
            <td>
            <!--商品信息-->
            <?php
            foreach ($productInfo as $k) {
				  if ($k['id'] == $r['p_id']) {
					  $url = $this->createUrl('product/view', array('id' => $k->id));
            ?>
                <div class="margin_space_4">
                    <div class="img_float">
                        <div class="pic100">
                            <a href="<?= $url; ?>"><img  alt="<?= $k['name'] ?>" title="<?= $k['name'] ?>" src="/assets/upfile/<?= $r['pic'] ?>"></a><span class="imgmid"></span>
                        </div>
                    </div>
                    <div class="info_float">
                        <div style="height:30px; margin-top:18px;"><a style="color:#000; font-size:13px;" href="<?= $url; ?>"><?= $k['name'] ?></a></div>
                       <div>发布者：<?= $r['add_name'] ?></div>
                    </div>
                    <div style="clear:both;"></div>
                </div>
            <?php
                }
            }
            ?>
            </td>
            <td align="center"></td>
            <td align="center">
            	<a id="font_blue"  href="/<?=$r->download; ?>">下载</a>
             
            </td>
        </tr>
    </table>
	<?php
        }
    ?>





    <ul class="pageList">
        <?php
		//$pageALL ----总页数
		//$onpage ----当前页数
        if ($onpage > 0) {
            ?>
            <a href="<?php
            if ($action == "index") {
                echo $this->createUrl('download/index', array('page' => $onpage - 1));
            }
            ?>"><li>上一页</li></a>
               <?php
           }
           ?>

        <?php
        for ($i = 1; $i <= $pageALL; $i++) {
            ?>
            <a  href="<?php
            if ($action == "index") {
                echo $this->createUrl('download/index', array('page' => $i - 1));
            }
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
            if ($action == "index") {
                echo $this->createUrl('download/index', array('page' => $onpage + 1));
            }
            ?>"><li>下一页</li></a> 
               <?php
           }
           ?> 
    </ul>
    <div style="clear:both"></div>
</div>
<div class="clear"></div>
