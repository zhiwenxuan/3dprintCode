<?php
	//print_r($model);
	$this->renderpartial('//customer/left');
?>

<?php
	//print_r($dataProvider);
?>


<div class="float_left">
<span  class="mb_title">我的收货地址</span>

<a class="add_address" style="margin-left:20px;" href="<?=$this->createUrl('address/create')?>">新增地址</a>

<table class="productList_mb" cellpadding="0" cellspacing="0">
    <tr id="productListHeard">
        <td width="100">收件人</td>
        <td width="120">所在地区</td>
        <td >街道地址</td>
        <td width="100">邮编</td>
        <td width="100">手机号码</td>
        <td width="100">电话号码</td>
        <td width="100">操作</td>
    </tr>
<?php
    foreach($dataProvider as $r){
    $url=$this->createUrl('address/view',array('id'=>$r->id));
?>
    <tr id="product_<?=$r['id'];?>">
        <td height="50" align="center"><?=$r['name'];?></td>
        <td align="center"><?=$r['area'];?></td>
        <td align="center"><?=$r['address'];?></td>
        <td align="center"><?=$r['areacode'];?></td>
        <td align="center"><?=$r['mobile'];?></td>
        <td align="center"><?=$r['telephone'];?></td>
        <td align="center">
            <a id="font_blue"  href="<?=$this->createUrl('address/update',array('id'=>$r->id)) ?>">修改</a>
            <?php echo CHtml::link(Yii::t('cmp','删除'),'javascript:',array('class'=>'font_blue','onclick'=>'return art_del_confirm("'.$r['id'].'")'))?>   
        </td>
    </tr>
    
<?php
	
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
                            echo $this->createUrl('address/index', array('page'=>$onpage-1));
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
				  	 echo $this->createUrl('address/index', array('page'=>$i-1));
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
				  	echo $this->createUrl('address/index', array('page'=>$onpage+1));
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
       $.post("/index.php/address/delete",{id:id, mr:Math.random()},function(msg){
              //alert(msg);    
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