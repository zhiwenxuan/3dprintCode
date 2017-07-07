<?php
//print_r($model->plasticColor);
$this->renderpartial('//customer/left');
?>


<div class="float_left">
<span  class="mb_title">修改模型</span>

    <div class="main_right">

        <div class="accountInfo">


            <div class="form">

                <?php
                $form = $this->beginWidget('CActiveForm', array(
                    'id' => 'product-form',
                    'enableAjaxValidation' => false,
                    'htmlOptions' => array('enctype' => 'multipart/form-data'),
                ));
                ?>
 				<input type="hidden" name="fileNameArray" id="fileNameArray">
                <input id="shelves" type="hidden" name="Product[shelves]" value="<?= $model->shelves; ?>"/>
				<input id="dowload_type" type="hidden" name="Product[dowload_type]" value="<?= $model->dowload_type; ?>"/>
                <?php echo $form->textField($model, 'metalColor', array('size' => 60, 'id' => 'metalColor', 'style' => 'display:none',)); ?>
                <?php echo $form->textField($model, 'plasticColor', array('size' => 60, 'id' => 'plasticColor', 'style' => 'display:none',)); ?>
                <?php echo $form->textField($model, 'plasticPrice', array('size' => 60, 'id' => 'plasticPrice', 'style' => 'display:none',)); ?>
                <?php echo $form->textField($model, 'metalPrice', array('size' => 60, 'id' => 'metalPrice', 'style' => 'display:none',)); ?>

<?php echo $form->errorSummary($model); ?>
                <table class="infoTable">    
                    <tr>
                        <td width="70"><?php echo $form->labelEx($model, 'category_id'); ?></td>
                        <td>
                        <div style="border:1px solid #dedede; padding:10px;">
						<?php
                            $categoryA = explode(",",$model->category_id);
                        
                            foreach($category as $c)
                            {
                                if($c->id != 1)
                                {
                                    $flag = 0;
                                    foreach ($categoryA as $a)
                                    {
                                        if($a == $c->id)
                                        {
                                            $flag=1;
                                        }
                                    }
                                    if($flag==1)
                                    {
                                        echo '<div style="float:left; margin-left:20px; margin-top:5px; margin-bottom:5px;"><input name="category[]" style="vertical-align:middle" type="checkbox" checked="checked" value="'.$c->id.'"><label style="vertical-align:middle; margin-left:5px;"></label>'.$c->name.'</div>';
                                    }
                                    else
                                    {
                                        echo '<div style="float:left; margin-left:20px; margin-top:5px; margin-bottom:5px;"><input name="category[]" style="vertical-align:middle" type="checkbox" value="'.$c->id.'"><label style="vertical-align:middle; margin-left:5px;"></label>'.$c->name.'</div>';
                                    }
                                }
                            }
                        ?>	
                        <div style="clear:both;"></div>
                        </div>
                        
                        </td>
                        <td><?php echo $form->error($model, 'category_id'); ?></td>
                    </tr>

                    <tr>
                        <td><?php echo $form->labelEx($model, 'name'); ?></td>
                        <td><?php echo $form->textField($model, 'name', array('size' => 60, 'maxlength' => 255)); ?></td>
                        <td><?php echo $form->error($model, 'name'); ?></td>
                    </tr>

                    <tr>
                        <td>标签：</td>
                        <td>
                            <input name="tags" id="tags" type="hidden">
                            <input class="keyword" name="keyword" value="<?= $model->keyword1 ?>"><a id="moreTag" class="add_info_img">+</a>
                            <div id="tagInfo">
                                <?php
                                if ($model->keyword2 != "") {
                                    ?>
                                    <div id="tag_2"><input class="keyword" name="keyword" value="<?= $model->keyword2 ?>"><a onclick="deleteTag('2')" class="add_tag">删除</a></div>
                                    <?php
                                }
                                ?>

                                <?php
                                if ($model->keyword3 != "") {
                                    ?>
                                    <div id="tag_3"><input class="keyword" name="keyword" value="<?= $model->keyword3 ?>"><a onclick="deleteTag('3')" class="add_tag">删除</a></div>
                                    <?php
                                }
                                ?>
                                <?php
                                if ($model->keyword4 != "") {
                                    ?>
                                    <div id="tag_4"><input class="keyword" name="keyword" value="<?= $model->keyword4 ?>"><a onclick="deleteTag('4')" class="add_tag">删除</a></div>
                                    <?php
                                }
                                ?>
                                <?php
                                if ($model->keyword5 != "") {
                                    ?>
                                    <div id="tag_5"><input class="keyword" name="keyword" value="<?= $model->keyword5 ?>"><a onclick="deleteTag('5')" class="add_tag">删除</a></div>
                                    <?php
                                }
                                ?>
                                <?php
                                if ($model->keyword6 != "") {
                                    ?>
                                    <div id="tag_6"><input class="keyword" name="keyword" value="<?= $model->keyword6 ?>"><a onclick="deleteTag('6')" class="add_tag">删除</a></div>
                                    <?php
                                }
                                ?>
                                <?php
                                if ($model->keyword7 != "") {
                                    ?>
                                    <div id="tag_7"><input class="keyword" name="keyword" value="<?= $model->keyword7 ?>"><a onclick="deleteTag('7')" class="add_tag">删除</a></div>
                                    <?php
                                }
                                ?>
                                <?php
                                if ($model->keyword8 != "") {
                                    ?>
                                    <div id="tag_8"><input class="keyword" name="keyword" value="<?= $model->keyword8 ?>"><a onclick="deleteTag('8')" class="add_tag">删除</a></div>
                                    <?php
                                }
                                ?>
                                <?php
                                if ($model->keyword9 != "") {
                                    ?>
                                    <div id="tag_9"><input class="keyword" name="keyword" value="<?= $model->keyword9 ?>"><a onclick="deleteTag('9')" class="add_tag">删除</a></div>
                                    <?php
                                }
                                ?>
                                <?php
                                if ($model->keyword10 != "") {
                                    ?>
                                    <div id="tag_10"><input class="keyword" name="keyword" value="<?= $model->keyword10 ?>"><a onclick="deleteTag('10')" class="add_tag">删除</a></div>
                                    <?php
                                }
                                ?>



                            </div>
                        </td>
                        <td></td>
                    </tr>

                    <tr>
                        <td><?php echo $form->labelEx($model, 'thumbnail'); ?><span class="required">*</span></td>
                        <td>
                        <?php
							$kb = 1024;
							$complete_script = "js:function(id, name, response)
							{	
								
								$('#picSpace').append('<div id='+id+' class=picModel  fileNme='+response['filename']+' ><img style=float:left; width=100 height=100 src=/assets/upfile/'+response['filename']+'><a class=deletePic onClick=DeletePic('+id+') >删除</a><div class=clear></div></div>');
							
							}";
							
							
							$delete = "js:function(id)
							{	
								$('#'+id).remove();
							
							}";
							
							$this->widget('ext.EFineUploader.EFineUploader',array(
								'id'=>'FineUploader',
								'config'=>array(
								'autoUpload'=>true,
								'request'   =>array('endpoint'=>$this->createUrl('upload'),
													'params'=>array('YII_CSRF_TOKEN'=>Yii::app()->request->csrfToken)),
								'deleteFile'=>array(
													'enabled'=>'true',
													'forceConfirm'=>'true',
													'endpoint'=>$this->createUrl('upload'),
					   
								),
					
								'retry'     =>array('enableAuto'=>true,'preventRetryResponseProperty'=>true),
								'callbacks' =>array('onComplete'=>$complete_script,
													'onDelete'=>$delete,
													),				   											
								'validation'=>array('allowedExtensions'=>array('jpg','jpeg'),
													'sizeLimit'=>2048*$kb,
													'minSizeLimit'=>10*$kb,
													'itemLimit'=>20))
								));
							?>

                        </td>
                        <td><?php echo $form->error($model, 'thumbnail'); ?></td>
                    </tr>

					<tr>
                        <td></td>
                        <td><div id="picSpace">
                        <?php
                            $i = 1;
                            foreach($picArray as $p){
                                echo '<div id="p'.$i.'" class="picOldModel" fileNme="'.$p->pic.'" ><img style="float:left;" width="100" height="100" src="/assets/upfile/'.$p->pic.'"><a class="deletePic" onClick="DeleteOldPic('.$i.')" >删除</a><div class="clear"></div></div>';
                            $i++;
                            }
                        
                        ?>
                        
                        
                        </div></td>
                        <td></td>
                    </tr>



                    <tr>
                        <td><?php echo $form->labelEx($model, 'three_model'); ?></td>
                        <td><?php echo CHtml::activeFileField($model, 'three_model') ?></td>
                        <td><?php echo $form->error($model, 'three_model'); ?></td>
                    </tr>
                    
                    <tr>
                        <td><?php echo $form->labelEx($model, 'dowload'); ?></td>
                        <td><?php echo CHtml::activeFileField($model, 'dowload'); ?></td>
                        <td><?php echo $form->error($model, 'dowload'); ?></td>
                    </tr>
                    
                    
                    <tr>
                        <td><?php echo $form->labelEx($model, 'dowload_integral'); ?></td>
                        <td><?php echo $form->textField($model, 'dowload_integral', array('size' => 15, 'maxlength' => 15)); ?></td>
                        <td><?php echo $form->error($model, 'dowload_integral'); ?></td>
                    </tr>
                    
                    
       
                    
                    <tr>
                        <td>提供下载</td>
                        <td>
                       <input type="radio" name="dowload_type"  
					   <?php 
					   if ($model->dowload_type == 0) {
                            echo 'checked="checked"';
                       } 
					   ?>
                       value="0" style="vertical-align: middle"/><span style="vertical-align: middle">否</span>
                                &nbsp;&nbsp;&nbsp;&nbsp;
                       <input type="radio" name="dowload_type" 
					   <?php 
					   if ($model->dowload_type == 1) {
                            echo 'checked="checked"';
                       } 
					   ?> value="1" style="vertical-align: middle"/><span style="vertical-align: middle">是</span>
                            </td>
                        <td></td>
                        
                    </tr>
                    
          
                    


                    <tr>
                        <td>属性<span class="required">*</span></td>
                        <td colspan="2">
                            <table class="productQuality" cellspacing="1" >
                                <tr>
                                    <td width="80">&nbsp;&nbsp;材质：
                                        金属
                                    </td>
                                    <td class="checkMargin">&nbsp;&nbsp;颜色： 
                                        <input class="metalColor" value="red" <?php
                                        $color = explode(',', $model->metalColor);
                                        foreach ($color as $c) {
                                            if ($c == 'red') {
                                                echo 'checked="checked"';
                                            }
                                        }
                                        ?>type="checkbox"/><label>红色</label>

                                        <input class="metalColor" value="blue" <?php
                                        $color = explode(',', $model->metalColor);
                                        foreach ($color as $c) {
                                            if ($c == 'blue') {
                                                echo 'checked="checked"';
                                            }
                                        }
                                        ?>type="checkbox"/><label>蓝色</label>

                                        <input class="metalColor" value="green" <?php
                                        $color = explode(',', $model->metalColor);
                                        foreach ($color as $c) {
                                            if ($c == 'green') {
                                                echo 'checked="checked"';
                                            }
                                        }
                                        ?>type="checkbox"/><label>绿色</label>

                                        <input class="metalColor" value="yellow" <?php
                                        $color = explode(',', $model->metalColor);
                                        foreach ($color as $c) {
                                            if ($c == 'yellow') {
                                                echo 'checked="checked"';
                                            }
                                        }
                                        ?>type="checkbox"/><label>黄色</label>

                                        <input class="metalColor" value="white" <?php
                                        $color = explode(',', $model->metalColor);
                                        foreach ($color as $c) {
                                            if ($c == 'white') {
                                                echo 'checked="checked"';
                                            }
                                        }
                                        ?>type="checkbox"/><label>白色</label>

                                        <input class="metalColor" value="black" <?php
                                        $color = explode(',', $model->metalColor);
                                        foreach ($color as $c) {
                                            if ($c == 'black') {
                                                echo 'checked="checked"';
                                            }
                                        }
                                        ?>type="checkbox"/><label>黑色</label>

                                        <input class="metalColor" value="magenta" <?php
                                        $color = explode(',', $model->metalColor);
                                        foreach ($color as $c) {
                                            if ($c == 'magenta') {
                                                echo 'checked="checked"';
                                            }
                                        }
                                        ?>type="checkbox"/><label>玫红</label>

                                        <input class="metalColor" value="orange" <?php
                                        $color = explode(',', $model->metalColor);
                                        foreach ($color as $c) {
                                            if ($c == 'orange') {
                                                echo 'checked="checked"';
                                            }
                                        }
                                        ?>type="checkbox"/><label>橙色</label>
                                    </td>
                                   
                                </tr>

                                <tr>
                                    <td width="80">&nbsp;&nbsp;材质：
                                        塑料
                                    </td>
                                    <td class="checkMargin">&nbsp;&nbsp;颜色：
                                        <input class="plasticColor" value="red" <?php
                                        $color = explode(',', $model->plasticColor);
                                        foreach ($color as $c) {
                                            if ($c == 'red') {
                                                echo 'checked="checked"';
                                            }
                                        }
                                        ?>type="checkbox"/><label>红色</label>

                                        <input class="plasticColor" value="blue" <?php
                                        $color = explode(',', $model->plasticColor);
                                        foreach ($color as $c) {
                                            if ($c == 'blue') {
                                                echo 'checked="checked"';
                                            }
                                        }
                                        ?>type="checkbox"/><label>蓝色</label>

                                        <input class="plasticColor" value="green" <?php
                                        $color = explode(',', $model->plasticColor);
                                        foreach ($color as $c) {
                                            if ($c == 'green') {
                                                echo 'checked="checked"';
                                            }
                                        }
                                        ?>type="checkbox"/><label>绿色</label>

                                        <input class="plasticColor" value="yellow" <?php
                                        $color = explode(',', $model->plasticColor);
                                        foreach ($color as $c) {
                                            if ($c == 'yellow') {
                                                echo 'checked="checked"';
                                            }
                                        }
                                        ?>type="checkbox"/><label>黄色</label>

                                        <input class="plasticColor" value="white" <?php
                                        $color = explode(',', $model->plasticColor);
                                        foreach ($color as $c) {
                                            if ($c == 'white') {
                                                echo 'checked="checked"';
                                            }
                                        }
                                        ?>type="checkbox"/><label>白色</label>

                                        <input class="plasticColor" value="black" <?php
                                        $color = explode(',', $model->plasticColor);
                                        foreach ($color as $c) {
                                            if ($c == 'black') {
                                                echo 'checked="checked"';
                                            }
                                        }
                                        ?>type="checkbox"/><label>黑色</label>

                                        <input class="plasticColor" value="magenta" <?php
                                        $color = explode(',', $model->plasticColor);
                                        foreach ($color as $c) {
                                            if ($c == 'magenta') {
                                                echo 'checked="checked"';
                                            }
                                        }
                                        ?>type="checkbox"/><label>玫红</label>

                                        <input class="plasticColor" value="orange" <?php
                                        $color = explode(',', $model->plasticColor);
                                        foreach ($color as $c) {
                                            if ($c == 'orange') {
                                                echo 'checked="checked"';
                                            }
                                        }
                                        ?>type="checkbox"/><label>橙色</label>

                                    </td>
                                   
                                </tr>

                            </table>
                        </td>
                    </tr>

                    <?php
                    if ($model->stat == 2) {
                        ?>
                        <tr>
                            <td>上架</td>
                            <td>
                                <input type="radio" name="shelves"  <?php if ($model->shelves == 1) {
                            echo 'checked="checked"';
                        } ?> value="1" style="vertical-align: middle"/><span style="vertical-align: middle">下架</span>
                                &nbsp;&nbsp;&nbsp;&nbsp;
                                <input type="radio" name="shelves" <?php if ($model->shelves == 2) {
                            echo 'checked="checked"';
                        } ?> value="2" style="vertical-align: middle"/><span style="vertical-align: middle">上架</span>
                            </td>
                            <td></td>
                        </tr>
    <?php
}
?>

                    <tr>
                        <td><?php echo $form->labelEx($model, 'designPrice'); ?></td>
                        <td><?php echo $form->textField($model, 'designPrice', array('size' => 15, 'maxlength' => 15)); ?></td>
                        <td><?php echo $form->error($model, 'designPrice'); ?></td>
                    </tr>



                    <tr>
                        <td colspan="3">详细信息<span class="required">*</span></td>
                    </tr>


                    <tr>
                        <td colspan="3">
                            <script id="editor" name="description" type="text/plain" style="width:750px;height:500px;">
<?php
echo $model->description;
?>
                            </script>
                        </td>
                    </tr> 


                    <tr>
                        <td></td>
                        <td colspan="2">
                            <div style="float:left;">
<?php echo CHtml::button($model->isNewRecord ? '保存' : '保存', array('class' => 'bottom_true','onClick'=>'subMitModel()','style' => 'height:29px; padding-top:0px;')); ?>
                            </div>
                            <div style="float:left; margin-left:10px;">
                                <a class="bottom_false" href="<?php echo $this->createUrl('customer/account', array('id' => Yii::app()->user->id)) ?>"><span>&nbsp;取 消&nbsp;</span></a>
                            </div>
                        </td>    

                    </tr>
                </table>
<?php $this->endWidget(); ?>

            </div><!-- form -->



        </div>


    </div>

</div>
<div class="clear"></div>
<script>

//----传递上下架的值
    $(':radio').click(function() {
        $('#shelves').val($('input[name="shelves"]:checked').val());
		$('#dowload_type').val($('input[name="dowload_type"]:checked').val());
    });

//实例化编辑器
//建议使用工厂方法getEditor创建和引用编辑器实例，如果在某个闭包下引用该编辑器，直接调用UE.getEditor('editor')就能拿到相关的实例
    UE.getEditor('editor');

	 //----新增时的删除
	 function DeletePic(id){
		  $('#'+id).remove();
		 
	 }
	 
	 //----原数据的删除
	 function DeleteOldPic(id){
	
		   $.post("<?php echo $this->createUrl('product/ajaxDelete');?>",{fileName:$('#p'+id).attr("fileNme"),mr:Math.random()},function(msg){
	
				if(msg == 200){
					$('#p'+id).remove();	
				}else{
					 alert('删除图片失败！');	
				} 
			   
		   });
		   
	 }


    //----提交表单
    function subMitModel(){
		
		

		
		//----判断checkbox是否选中
		var check = 0;
		$("[name='category[]']").each(function(l,n){
	   
			if (n.checked == true)
			{
				check++;
			}
			
			
		});
		if(check == 0){
			  alert('至少选择一个模型类别！');
			  return false;
		}
		

        //----提交tag
        var tags = new Array();
        $('.keyword').each(function(s, n) {
            kw = n.value;
            tags.push(kw);
        });
        $('#tags').val(tags);


        //----提交颜色
        var mColors = new Array();//金属颜色
        var pColors = new Array();//塑料颜色
        var k = 0;
        $('.metalColor').each(function(i, j) {
            if (j.checked == true) {
                mc = $(j).val();
                mColors.push(mc);
                k++;

            }
            $('#metalColor').val(mColors);
        });

        $('.plasticColor').each(function(i, j) {
            if (j.checked == true) {
                pc = $(j).val();
                pColors.push(pc);
                k++;
            }
            $('#plasticColor').val(pColors);
        });

        if (k == 0) {
            alert("至少选择一个颜色！");
            return false;
        }
        //----判断用户名
        if ($('#Product_name').val() == "") {
            alert('名称不允许为空！');
            return false;
        }

        //----判断编辑器内容
        var arr = [];
        arr.push(UE.getEditor('editor').getContentTxt());
        if (arr.join("\n") == "") {
            alert('详细内容不允许为空！');
            return false;
        }
		
	  //----提交图片
	  var num = 0;
	  var fNameArray = new Array();
	  $('.picModel').each(function(i,j) {

		  fName = $(this).attr("fileNme");
		  fNameArray.push(fName);
		  

	  });
	  $('#fileNameArray').val(fNameArray);
	  
	  $('#picSpace div').each(function(index, element) {
      		num = index;  
      });
	  if(num == 0){
	  	alert('至少上传一张模型图片！');
		return false;
	  }
	  if(num >= 20){
		  alert('最多上传10张图片');
		  return false;
	  }else{
	  	  $('#product-form').submit();
	  }

    }


    //----提交多个标签



    $('#moreTag').click(function() {

        var num_i = 0;
        $('.keyword').each(function(l, p) {
            num_i++;
        });


        if (num_i == 10) {
            return false
        }
        var html = '';
        html += '<div id="tag_' + num_i + '"><input class="keyword" name="keyword"><a onclick="deleteTag(' + num_i + ')" class="add_tag">删除</a></div>';
        $('#tagInfo').append(html);
        num_i++;
    });

    function deleteTag(k) {
	  $.post("/index.php/product/deleteTags/",{id:<?=$model->id?>,k:k,mr:Math.random()}, function(msg) {
		
		  if (msg == 200) {
			 $('#tag_' + k).remove();
		  } else {
			  alert('删除失败！')
		  }
	  });  
  }
    
     //----提交多张图片
    $('#morePic').click(function() {
        
        $('.Mpic').each(function(s,n){
            if($(n).is(':hidden')){
                $(n).show();
                $(n).children().attr("disabled",false);    
                $(n).children().show();
                return false
            }            
        }); 
    });
    
    function deletePic(m) {
        $('#Product_pic'+m).hide();
        $('#Product_pic'+m).attr("disabled",true);
        $('#Product_pic'+m).parent().hide();
    }
    




</script>


