<?php
	//print_r($model);
	$this->renderpartial('//customer/left');
?>

<?php
	//print_r($dataProvider);
?>

<div class="float_left">
<span  class="mb_title">待审核的模型</span>

<table class="productList_mb" cellpadding="0" cellspacing="0">
    <tr id="productListHeard">
    	<td width="120">模型编号</td>
        <td>模型信息</td>
        <td width="100">单价</td>
        <td width="100">状态</td>
        <td width="100">创建时间</td>
        <td width="100">操作</td>
    </tr>
<?php
    foreach($dataProvider as $r){
            $url=$this->createUrl('product/view',array('id'=>$r->id));
			foreach($productPhoto as $p){
			if($r->id  == $p->p_id){
?>
    <tr id="product_<?=$r['id'];?>">
    	<td width="120" align="center"><?=$r['id'];?></td>
        <td>
        <div class="margin_space">
            <div class="img_float">
                <div class="pic100">
                    <a href="<?=$url;?>"><img width="100" alt="<?=$r['name']?>" title="<?=$r['name']?>" src="/assets/upfile/<?=$p->pic?>"></a>
                    <span class="imgmid"></span>
                </div>
            </div>
            <div class="info_float">
                <div><a href="<?=$url;?>"><?=$r['name']?></a></div>
                <div>发布者：<?=$r->fbz->name;?></div>
            </div>
            <div style="clear:both;"></div>
        </div>
        </td>
        <td align="center"><span  class="price1">&yen;<?=$r['price'];?></span></td>
        <td align="center">
            <?php
                if($r['stat'] == 1){
                    echo '待审核';
                }
                if($r['stat'] == 2){
                    echo '已审核';
                }
                if($r['stat'] == 3){
                    echo '未通过';
                }
            ?>
        </td>
        <td align="center"><?=  substr($r['add_time'], 0,10)?></td>
        <td align="center">

            <a target="_blank" id="font_blue" href="<?=$url;?>">查看</a>
            
            
            <br/>
            <a id="font_blue"  href="<?=$this->createUrl('product/update',array('id'=>$r->id,'uid'=>$r['add_uid'])) ?>">修改</a>
            <?php echo CHtml::link(Yii::t('cmp','删除'),'javascript:',array('class'=>'font_blue','onclick'=>'return art_del_confirm("'.$r['id'].'")'))?>   
        </td>
    </tr>
    
<?php
	break;
			}
		}
    }
?>
</table>


<ul class="pageList">
<?php
//$pageALL ----总页数
//$onpage ----当前页数
    if($onpage > 0){		
?>
    <a href="<?php 
			      if($action == "index"){
				  	echo $this->createUrl('product/verify', array('page'=>$onpage-1));
				  }
				 
					
			 ?>"><li>上一页</li></a>
<?php
	}
?>

<?php
	for($i =1; $i<=$pageALL; $i++){
?>
	<a  href="<?php
    			   if($action == "index"){
				  	 echo $this->createUrl('product/verify', array('page'=>$i-1));
				   }
				   
				   
			  ?>"><li 
    <?php
    	if($onpage == $i-1){
			echo 'id="pageListSel"';
		}
	?>
    ><?=$i;?></li></a>   
    
<?php
    }
?>		 

<?php
    if($pageALL > $onpage+1){		
?>
    <a href="<?php 
			      if($action == "index"){
				  	echo $this->createUrl('product/verify', array('page'=>$onpage+1));
				  }
				  
			?>"><li>下一页</li></a> 
<?php
	}
?> 
</ul>
<div style="clear:both"></div>




</div>
<div class="clear"></div>
<script>  
//单项删除确认框  
function art_del_confirm(id){  
   cm = confirm("确定删除吗？       ");
   if(cm){
       $.post("index.php?r=product/delete&id="+id,null,function(msg){
                 
			  if(msg==200){
							$('#product_'+id).remove();
			  }else{
				alert('删除失败！');
			  }			  
		});
   }else{
       
   }
}  
</script>