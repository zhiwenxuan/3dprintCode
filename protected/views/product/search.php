<?php 
// $models = Category::model()->findAll();
// $fa=Category::model()->with('childs')->together()->findAll('t.parent_id !=:parent',array('parent'=>0));
// $list=CHtml::listData($fa,'id',      // actual values
//                 'name',    // display value
//                 'parent.name'); //pcategory is the alias in the relation
// 
//  echo CHtml::dropDownList('categry_id',$fa,$list);  

?>
<div class="top">
    <div class="left"></div>
    <div class="right"></div>
    <div class="center">
      <h1>商 品 搜 索 </h1>
    </div>
  </div>
<div class="middle"><b>查询条件</b>
    <div id="content_search" style="background: #F7F7F7; border: 1px solid #DDDDDD; padding: 10px; margin-top: 3px; margin-bottom: 10px;">
     <?php  echo CHtml::beginForm($this->createUrl('product/search'), "post",array('id'=>'contentsearch')) ?>   
      <table>
        <tbody><tr>
          <td>关键字:</td>
          <td>      
           <?php //'t.parent_id !=:parent',array('parent'=>0)
                 echo CHtml::textField("keyword", $critria['keyword'], array(
                     'name'=>'keyword',
                     'style'=>"color: #999;",
                     'onclick'=>"this.value=''",
                     'onkeydown'=>"this.style.color = '#000000'"
                     ));
                //找出所有分类gorupby上级分类：
                 $model=Category::model()->with('parent')->together()->findAll();
                
                 //生成listData 
                 $list=CHtml::listData($model,'id',      // actual values
                                 'name',    // display value
                                 'parent.name'); // groupfield name in the relation
                 echo('   ');
                 echo CHtml::dropDownList('category_id',$critria['category_id'],$list ); 
            ?>
          </td>    
        </tr>
        <tr>
            <td colspan="2"> <?php echo CHtml::checkBox("description", $critria['description'], array('name'=>'description')) ?> 在商品描述中包含关键字</td>
        </tr>
	<tr>
          <td colspan="2">  <?php echo CHtml::checkBox("model", $critria['model'])   ?> 在商品型号中包含关键字</td>
        </tr>
   
      </tbody></table>
   

    </div>
    <div class="buttons">
      <table>
        <tbody><tr class="sort">
        <td align="left" >   
        按: <?php  
           echo CHtml::dropDownList('psort',$critria['selectvalue'], array(
              "&sort=t.name&order=ASC"=>'名称 A - Z',
              "&sort=t.name&order=DESC"=>'名称 Z - A',
              "&sort=t.price&order=ASC"=>"价格 低 > 高",
              "&sort=t.price&order=DESC"=>'价格 高> 低'),
              array( 'empty'=>'默认' )) ;
      
          ?>  排 序
 
             </td>                
          <td align="right"><a class="button" onclick="contentSearch();" id="btnSearch"><span>查 询</span></a></td>
        </tr>
      </tbody></table>
     <?php  echo CHtml::endForm(); ?>    
    </div>

    <br/>
    <div class="heading">商品列表</div>
    <div style="background: #F7F7F7; border: 1px solid #DDDDDD; padding: 10px; margin-top: 3px; margin-bottom: 15px;">
     
    <table class="list"> 
        <tbody>
        <tr>
            <?php 
                   $srcPath=  Yii::app()->request->baseUrl."/images/product/";
                   foreach( $products as $comment) {
                      $src=$srcPath. nl2br(CHtml::encode($comment->thumbnail));
                      $url=$this->createUrl('product/view',array('id'=>$comment->id));
                      $carturl=$this->createUrl('checkout/add2cart',array('id'=>$comment->id,'qty'=>1));
               ?>
               <td style="width: 20%">
                <div class="image"><img src="<?php echo $src ;?>" alt=" "/><br/>
                <a href="<?php echo $url ;?>"><?php echo nl2br(CHtml::encode($comment->name));  ?></a></div>
                <div class="name"><?php echo nl2br(CHtml::encode($comment->price));?>
                    <a title="购买" href="<?php echo $carturl; ?>" class="button_add_small">&nbsp;</a>
                </div>
               </td>  
               <?php } ?>
      </tr>
      </tbody>
    </table>   
         
 <?php $this->widget('CLinkPager', array(
    'pages' => $pages,
     'header'=>'页码',
     'prevPageLabel' => '上一页',
     'nextPageLabel' => '下一页',
 
)) ?>
    </div> 
      </div>

<div class="bottom">
    <div class="left"></div>
    <div class="right"></div>
    <div class="center"></div>
  </div>
<script>
$('#content_search input').keydown(function(e) {
if (e.keyCode == 13) {
contentSearch();
}
});
function contentSearch() {
   
    
url = 'index.php?r=product/search';
var keyword = $('#keyword').attr('value');
if (keyword) {
url += '&keyword=' + encodeURIComponent(keyword);
}
var category_id = $('#category_id').attr('value');
if (category_id) {
url += '&category_id=' + encodeURIComponent(category_id);
}
if ($('#description').attr('checked')) {
url += '&description=1';
}
if ($('#model').attr('checked')) {
url += '&model=1';
}
var sortby=$('#psort').attr('value');

if (sortby){
    url +=sortby;
}


location = url;
}

</script>