<?php
	$u_pic = "";//----定义登录用户头像
	$u_name ="";//----定义用户姓名
	$p_img = "";//----商品图片
?>
<link href="<?php echo Yii::app()->request->baseUrl; ?>/product_js/css/css.css" type="text/css" rel="stylesheet">	
<SCRIPT src="<?php echo Yii::app()->request->baseUrl; ?>/product_js/js/jquery-1.2.6.pack.js" type=text/javascript></SCRIPT>
<SCRIPT src="<?php echo Yii::app()->request->baseUrl; ?>/product_js/js/base.js" type=text/javascript></SCRIPT>

<script src="<?php echo Yii::app()->request->baseUrl; ?>/TSBox/TSBox.js" type="text/javascript"></script>






<!--作者信息-->
<div class="addInfo">

    <div class="moreInfo">
        <div class="space_3">

            <div class="float_left">
                <div class="user_logo" >
                    <a href="<?php echo $this->createUrl('product/index', array('id' => $userInfo->id)) ?>"><img src="/<?= $userInfo->pic; ?>"><span class="imgmid"></span></a> 
                </div>
            </div>

            <div class="float_left margin_left_1">
                <div class="user_name">
                    <span class="font_2"><?= $userInfo->name; ?> <span class="font_4">-- 发布者</span></span>
                    </br>
                    <!--                    <a>加入到收藏</a>-->
                </div>
            </div>

            <div class="float_right">
                <div class="float_right"><a class="moreProduct" href="<?php echo $this->createUrl('product/index', array('id' => $userInfo->id)) ?>">更多该作者模型</a></div>
                <?php
                $i = 0;
                foreach ($product as $r) {
                	$url = $this->createUrl('product/view', array('id' => $r->id));

					if($r->add_uid == $userInfo->id){
						foreach($productPhoto as $p){
				
							if($p->p_id == $r->id){
               
								echo '<div class="user_logo float_right margin_left_1" >';
								echo '<a href="'.$url.'"><img src="/assets/upfile/'.$p->pic.'"></a><span class="imgmid"></span>';
								echo '</div>';
         					
							}
							break;
						}
				
                    $i++;
					}
                    if ($i == 5) {
                        break;
                    }
                }
                ?>

                <div class="clear_both"></div>
            </div>

            <div class="clear_both"></div>

        </div>

    </div>


</div>
<!--作者信息-->





<div class="viewContent">
    <table style="width: 100%; border-collapse: collapse;">
        <tbody>

            <tr>
                <td width="400" style="vertical-align: top;">

                    <div id=preview>
                        <div  class=jqzoom id=spec-n1 >
                            <div id="viewer" style="width: 500px; height: 400px; display: none;"></div>
                            <?php
                            foreach($productPhoto as $p){
							?>
							 <IMG id="imgShow" style="display: block;" width="500" height="400" src="/assets/upfile/<?=$p->pic;?>" jqimg="/assets/upfile/<?=$p->pic;?>" >
							<?php
							$p_img = $p->pic;
							break;
							}
							?>
                           
                        </div>

                        <div id=spec-list>
                            <ul class=list-h style="width:500px; margin-left:-42px;">
                                
                                <?php
								foreach($productPhoto as $p){
									if($p->pic != 'upfilePic.jpg' && $p->pic != ''){
								?>
								<li><img src="/assets/upfile/<?=$p->pic;?>"></li>
								<?php
									 }
								}
								?>

                            </ul>
                        </div>

                    </div>
                </td>
                <td style="padding-left: 15px; vertical-align: top; text-align: left;">
                    <table width="100%">
                        <tbody>
                            <tr>
                                <td colspan="2"><span class="font_3"><?= $model->name ?></span></td>
                            </tr>



                            <tr>
                                <td width="60" height="25">商品类型:</td>
                                <td>
                                <span class="font_grey">
                                <?php
									$checkCategory =  explode(",",$model->category_id);
									
									foreach($category as $c){
										if($c->id != 1){
											foreach($checkCategory as $cc){
												if($cc == $c->id){
													echo $c->name.'&nbsp;&nbsp;';
												}
											}	
										}
										
									}
								?>
                                </span>
                                </td>
                            </tr>
                            
                            <tr>
                                <td width="60" height="25">商品标签:</td>
                                <td><span class="font_grey">
                                        <?php
                                            
                                            $k= 1;
                                            while($k<=10){
                                                $r = 'keyword'.$k;
                                                if($model->$r != ""){
                                                    echo '<div class="tagsSpace">'.$model->$r.'</div>';
                                                }
                                            
                                            $k++;
                                            }
                                        ?>
                                        
                                </td>
                            </tr>

                            <tr>
                                <td width="60" height="25">
                                  商品材质:
                                </td>
                                <td>
                                    <div id="selectM">
                                        <?php
                                            if($model->metalColor != "" && $model->plasticColor != ""){
                                        ?>
                                        <div id="metal" class="activeProductInfo" >金属</div>
                                        <div id="plastic" class="selectProductInfo">塑料</div>
                                        <?php
                                            }
                                        ?>
                                        <?php
                                            if($model->metalColor != "" && $model->plasticColor == ""){
                                        ?>
                                        <div id="metal" class="activeProductInfo" >金属</div>
                                        <?php
                                            }
                                        ?>
                                        <?php
                                            if($model->metalColor == "" && $model->plasticColor != ""){
                                        ?>
                                        <div id="plastic" class="activeProductInfo">塑料</div>
                                        <?php
                                            }
                                        ?>
                                    </div>
                                    
                                    
                                </td>
                            </tr>

                            <tr>
                                <td width="60"  height="25" style=" vertical-align: top; padding-top: 8px;">商品颜色:</td>
                                <td>
                                    <div id="selectC">
                                    <?php
                                        if($model->metalColor != ""){
                                             $a = explode(',',$model->metalColor);
                                        }else{
                                             $a = explode(',',$model->plasticColor);
                                        }
                                       
                                        $i = 0;
                                        foreach ($a as $c){
                                    ?>
                                           <div color="<?=$c;?>" class="<?php
                                                if($i == 0){
                                                    echo 'activeProductColor';
                                                }else{
                                                    echo 'selectProductColor';
                                                }
                                                ?>"><div style="background:<?=$c;?>; width: 100%; height: 100%"></div></div>
                                    <?php        
                                           $i++;
                                        }
                                    ?> 
                                    </div>
                                </td>
                            </tr>
                            
                            
                            
                            <tr>
                                <td width="60">商品价格:</td>
                                <td><span id="allPrice" class="price2">&yen;<?php echo $model->price; ?></span></td>
                            </tr>

                        </tbody>
                    </table>
                    <br/>


                    <?PHP
                    if ($model->stat == 2 && $model->shelves == 2) {
                        ?>
                        <form id="product" enctype="multipart/form-data" method="post" action="<?php echo $this->createUrl('cart/addcart'); ?>">

                            <div class="content">
                                <div class="float_left">数量:  <input type="text" value="1" onpaste="return false"  onkeyup="this.value = this.value.replace(/\D/g, '')"  onafterpaste="this.value=this.value.replace(/\D/g,'')" size="3" name="quantity"/></div>
                                
                                
                                <?php
                                	if(Yii::app()->user->isGuest){
								?>
                                	<div class="float_left margin_left_1"><a class="add_cart_img" id="add_to_cart" onclick="ajaxLoginShow()"></a></div>
                                <?php
                                 	}else{
								?>	
                                	<div class="float_left margin_left_1"><a class="add_cart_img" id="add_to_cart" onclick="$('#product').submit()"></a></div>
                                <?php
                                	 }	
								?>
                                
                                
                                
                              
                                <div class="clear_both"></div>
                            </div>
                            <div>
                                <input type="hidden" value="<?= Yii::app()->user->id ?>" name="user_id"/>
                                <input type="hidden" value="<?php echo $model->id; ?>" name="product_id"/>
                                <input type="hidden" id="color" value="<?php
                                    if($model->metalColor != ''){
                                        $a = explode(',',$model->metalColor);
                                        foreach ($a as $c){  
                                            echo $c;
                                            break;
                                        }  
                                    }else{
                                        $a = explode(',',$model->plasticColor);
                                        foreach ($a as $c){  
                                            echo $c;
                                            break;
                                        }  
                                    }
                                        
                                       ?>" name="color">
                                <input type="hidden" id="material"  value="<?php
                                            if($model->metalColor != ""){
                                                echo 1;
                                            }else{
                                                echo 2;
                                            }
                                       ?>" name="material">
                                <input type="hidden" id="price" value="<?=$model->price;?>" name="price">
                                <input type="hidden" value="#" name="redirect"/>                
                            </div>
                        </form>
                        
                        <br/>
                        
                        <div>
                        
                        
                        
                        
                        <?PHP
                    }
                    ?> 
                    
                    
                    <?PHP
                   		if ($model->stat == 2 && $model->dowload != "" && $model->dowload_type == 1) {
                    ?>
                    <a class="download_img"
                    <?php
                    	foreach($download as $d){
							if(!Yii::app()->user->isGuest){
								if($d->p_id == $model->id && $d->u_id == Yii::app()->user->id){
									echo 'style="display:none;"';		
								}else if($model->add_uid == Yii::app()->user->id){
									echo 'style="display:none;"';	
								}
							}
						}
					?>
                    onclick="downloadMode('<?= Yii::app()->user->id;?>','<?=$model->dowload;?>','<?=$model->dowload_integral;?>','<?=$model->add_uid;?>','<?=$model->id;?>','<?= $userInfo->name; ?>','<?=$p_img;?>')" id="download">下载模型(<?=$model->dowload_integral;?>积分)</a>

					<a  id="dowload_free" class="download_img_2" 
                    <?php
                    	foreach($download as $d){
							if(!Yii::app()->user->isGuest){
								if($d->p_id == $model->id && $d->u_id == Yii::app()->user->id){
									echo 'style="display:block;"';		
								}
								if($userInfo->id == Yii::app()->user->id){
									echo 'style="display:block;"';
								}
								
							}else{
								echo 'style="display:none;"';	
							}
						}
					?>
                    href="/<?=$model->dowload;?>" >下载模型</a>

                    </div>
                    
                    <?php
						}
					?>
                    
                    
                    <?php
						if($model->three_model != ''&& $model->three_model !="./assets/upfilePic.jpg"){
					?>
					<div class="float_left margin_left_1"><a class="download_img"  id="showModel"  onclick="openwin()">显示3D模型</a></div>
					<?php
						}
					?>
                    
                    
                </td>
            </tr>
        </tbody>
    </table>    
    <!--商品信息——end-->

    
    
    <div class="nav_tab">
        <ul>
            <li id="guide_btn" class=" font_6 select" onclick="showPrint();">详细信息</li>
            <li id="comment_btn" class="font_6" onclick="showComments();">商品评论</li>
            <div class="clear_both"></div>
        </ul>
    </div>
    
    
    
    <!--打印指南-->
    <div id="guide" class="guide">
            <?php
                echo $model->description;
            ?>
    </div>
    <!--打印指南--> 


    <!--商品评论-->

    <div id="comment" class="comment" style="display: none;">
        <div class="subComment">
            <!--发布评论-->
            <div class="comment_main">
                <div style=" text-align: center; line-height: 100px;">
                    <?php
                    if (!isset(Yii::app()->user->id)) {
                        echo '<a href="' . $this->createUrl('customer/login') . '">登录后才允许提交评论,立即登录！</a>';
                    } else {
                        ?>

                        <div class="margin_space_1">

                            <div class="comment_logo float_left" >
                                <img src="
                                <?php
                                    foreach ($userAll as $u){
                                        if($u->id == Yii::app()->user->id){
                                            echo '/'.$u->pic;
											
                                        }
                                    }
                                ?>"><span class="imgmid"></span>
                                
                            </div> 
                            <div class=" margin_left_2  float_left">
                                <div>
                                    <input type="hidden" id="p_id" name="p_id" value="<?= $model->id; ?>">
                                    <input type="hidden" id="u_id" name="u_id" value="<?= Yii::app()->user->id ?>"/>
                                    <textarea type="text"  id="comment_content" name="comment_content" class="commentInput"></textarea>
                                </div>
                                <div class="clear_both"></div>
                                <div class="float_right" style=" line-height:40px;">
                                    <a class="subCommentButtom" onclick="subComment()" >提交</a>
                                </div>
                            </div>
                            <div class="clear_both"></div>

                        </div>

                        <?php
                    }
                    ?>
                    <?php
                       
                        if(isset($comments)){
                            echo '<div class="comment_border"></div>';
                        }
                    ?>
                    
                    <div  id="ajax_addSubmit"></div>
                    
                    <!--其他评论-->
                    <?php
                        foreach ($comments as $r){
                    ?>
                    <div class="comment_border_2">
                        
                       
                        <div class="margin_space_2">

                            <div class="comment_logo float_left" >
                                <img src="
                                <?php
                                    foreach ($userAll as $u){
                                        if($u->id == $r->add_id){
                                            echo '/'.$u->pic;
											$u_pic = $u->pic;
									
                                        }
                                    }
                                ?>"><span class="imgmid"></span>
                                
                               
                            </div> 
                            <div class=" margin_left_2  float_left">
                                <div style="width: 780px; line-height: 20px; text-align: left;">
                                    <div class="font_5">
                                    <?php
                                    foreach ($userAll as $u){
                                        if($u->id == $r->add_id){
                                            echo $u->name;
                                        }
                                    }
                                	?>
                                    :</div>
                                    <div class=""><?=$r->content;?></div>
                                    <div class="float_right font_grey">评论时间：<?=$r->add_time;?></div>
                                </div>
                                <div class="clear_both"></div>
<!--                                <div class="float_right" style=" line-height:40px;">
                                    <a class="subCommentButtom" onclick="subComment()" >回复</a>
                                </div>-->
                            </div>
                            <div class="clear_both"></div>
                        </div>
                    </div>
                    <?php
                        }
                    ?>
                    <!--其他评论-->
                    <div class="height_1"></div>    
                </div>
            </div>
            <!--发布评论-->
        </div>
    </div>
    <!--商品评论-->


</div>







<div id="loginContent" style="width: 500px; padding: 10px; display: none;">
<img id="btn_content_close" style="text-align:right; float:right; cursor:pointer;" src="<?php echo Yii::app()->request->baseUrl; ?>/TSBox/thickbox_close.png">
<div class="clear"></div>


<div style="margin-top: 15px; margin-bottom:35px;">
	<table style="width:500px; ">
    	<tr>
        	<td colspan="3" style="font-size:18px; font-weight:700;">用户登录</td>
        </tr>
        <tr>
        	<td width="200" style="text-align:right; height:50px;">用户名：</td>
            <td style="text-align:left;" ><input type="text" name="username" calss="input_width"/></td>
            <td></td>
        </tr>
        <tr>
        	<td width="200" style="text-align:right; height:50px;">密码：</td>
            <td style="text-align:left;" ><input type="password" name="password" calss="input_width"/></td>
            <td></td>
        </tr>
        <tr>
        	<td></td>
            <td style="text-align:left;"><a id="login"  class="button_login" onclick="ajaxLoginSubmit()"></a></td>
            <td></td>
        </tr>
        <tr>
        	<td height="30"></td>
        	<td id="errorMsg"  style="font-size:12px; color:red; text-align:left;"></td>
            <td></td>
        </tr>
    </table>
      
</div>
    
    
</div>


	

<script src="<?php echo Yii::app()->request->baseUrl; ?>/product_js/js/163css.js" type=text/javascript></SCRIPT>
<script src="<?php echo Yii::app()->request->baseUrl; ?>/javascripts/Three.js"></script>
<script src="<?php echo Yii::app()->request->baseUrl; ?>/javascripts/plane.js"></script>
<script src="<?php echo Yii::app()->request->baseUrl; ?>/javascripts/show3d.js"></script>

<script>
	<?php
	
		$u_num = 0;
	
		foreach($userAll as $u){
			if($u->id == Yii::app()->user->id){
				$u_num = $u->integral;
			}
		}
	?>
	
	var user_num = <?=$u_num;?>;
	
	
	//---加载3d模型---打开新的页面
	function openwin() 
	{ 

	var iWidth=800; //弹出窗口的宽度;
	var iHeight=600; //弹出窗口的高度;
	var iTop = (window.screen.availHeight-30-iHeight)/2; 
	var iLeft = (window.screen.availWidth-10-iWidth)/2; 
	OpenWindow=window.open("<?php echo $this->createUrl('product/model', array('id' => $model->id,'t'=>$model->name)) ?>", "<?=$model->name;?>", "height="+iHeight+", width="+iWidth+",top="+iTop+",left="+iLeft+", toolbar=no,scrollbars="+scroll+",menubar=no");

	} 
	
	
	
	//----下载
	function downloadMode(id,url,num,add_id,p_id,p_name,p_pic){
		if(id == ""){
			ajaxLoginShow();
			//alert("您需要登录后才能下载该模型！");
		}else if(id == add_id){
			window.location.href = '/'+url;	
		}else if(user_num >= num){
			$.tsBox.Confirm("下载将扣除您"+num+"的积分！",function(){	//确定窗口		
			
			
				$.post("<?php echo $this->createUrl('customer/download'); ?>", {uid:id,num:num,add_id:add_id,url:url,p_id:p_id,p_name:p_name,p_pic:p_pic, mr: Math.random()}, function(msg) {
					
					if (msg == 200) {
						$('#download').hide();
						$('#dowload_free').show();
						window.location.href = '/'+url;		
	
					}else {
						alert('下载模型失败！')
					}
            	});
			
			});		
		}else{
			alert('您的积分不够,可以通过上传模型获得积分！')	
		}
		
	}

    
    //---显示3d模型
    <?php
        $length = strlen($model->three_model);
        $mName = substr($model->three_model, 1, ($length - 1));
    ?>

    fileNm = "<?php echo $mName; ?>";
    window.onload = function() {

        thingiurlbase = "<?php echo Yii::app()->request->baseUrl; ?>/javascripts";
        // document.write(fileNm);
        view3d = new Thingiview("viewer");
        view3d.setObjectColor('#1185ea');
        view3d.initScene();
        view3d.loadSTL("<?php echo Yii::app()->request->baseUrl; ?>" + fileNm);
    }


//----图片展示
    $(function() {


        $("#spec-list img").bind("mouseover", function() {
            var src = $(this).attr("src");
            $("#spec-n1 img").eq(0).attr({
                src: src.replace("\/n5\/", "\/n1\/"),
                jqimg: src.replace("\/n5\/", "\/n0\/")
            });
            $('#viewer').hide();
            $('#imgShow').show();
            $(this).css({
                "border": "2px solid #ff6600",
                "padding": "1px"
            });
        }).bind("mouseout", function() {
            $(this).css({
                "border": "1px solid #ccc",
                "padding": "2px"
            });
        });
    })


    
//----切换打印指南与商品评论
    function showPrint(){
        $('#guide').show();
        $('#comment').hide();
        $('#guide_btn').addClass('select');
        $('#comment_btn').removeClass('select');
    }
    
    function showComments(){
        $('#guide').hide();
        $('#comment').show();
        $('#guide_btn').removeClass('select');
        $('#comment_btn').addClass('select');
    }


//----提交评论
    function subComment() {
	   
        var uid = $('#u_id').val();
        var pid = $('#p_id').val();
        var comment = $('#comment_content').val();
        
        if(comment == ""){
            alert('请输入您的评论！');
        }else{
        
            $.post("<?php echo $this->createUrl('product/comments'); ?>", {uid: uid, pid: pid, comment: comment, mr: Math.random()}, function(msg) {
                if (msg == 200) {


                               var u_pic = '<?=$userInfo->pic;?>';
                               var u_name = '<?=Yii::app()->user->name?>';	
                               var comment = $('#comment_content').val();
                               var html ="";
                               html += '<div class="comment_border_2">';
                               html += '<div class="margin_space_2">';
                               html += '<div class="comment_logo float_left" >';	
                               html += '<img src="/'+u_pic+'">';
                               html += '<span class="img_space"></span>';
                               html += '</div>'; 
                               html += '<div class=" margin_left_2  float_left">'; 
                               html += '<div style="width: 780px; line-height: 20px; text-align: left;">';  
                               html += '<div class="font_5">'+u_name+':</div>';   
                               html += '<div class="">'+comment+'</div>';  
                               html += '<div class="float_right font_grey">评论时间：刚刚提交</div>';
                               html += '</div>';  
                               html += '<div class="clear_both"></div>';
                               html += '</div>';
                               html += '<div class="clear_both"></div>';
                               html += '</div>';
                               html += '</div>';
                               $('#ajax_addSubmit').append(html);
                               $('#comment_content').val('');
                } else {
                    alert('提交评论失败！')
                }
            });
        }
    }


//---商品切换材质
var dPrice = <?=$model->designPrice;?>//---设计价格
var mPrice = <?=$model->metalPrice;?>//----金属价格
var pPrice = <?=$model->plasticPrice;?>//----塑料价格
$('#plastic').click(function(){//----点击塑料
    var price = "";//----总价
    $(this).addClass('activeProductInfo');
    $('#metal').removeClass().addClass('selectProductInfo');
    $('#material').val(2);
    price= dPrice + pPrice;
    $('#price').val(price);//----更新价格
    $('#allPrice').html('&yen'+price);
    
    //----更新颜色
    var html = "";
    <?php
        $a = explode(',',$model->plasticColor);
        $i = 0;
        foreach ($a as $c){
    ?>
           html += '<div onclick="changeColor(';
           html += 'this'; 
           html += ');" color="<?=$c;?>" class="<?php if($i == 0){ echo 'activeProductColor'; }else{ echo 'selectProductColor'; }?>"><div style="background:<?=$c;?>; width: 100%; height: 100%"></div></div>';
    <?php        
           $i++;
        }
    ?> 
    $('#selectC').html(html);
    var fColor = $('.activeProductColor').attr('color');
    $('#color').val(fColor);
    
});


$('#metal').click(function(){//----点击金属
    var price = "";//----总价
    $(this).addClass('activeProductInfo');
    $('#plastic').removeClass().addClass('selectProductInfo');
    $('#material').val(1);
    price= dPrice + mPrice;
    $('#price').val(price);//----更新价格
    $('#allPrice').html('&yen'+price);
    
    //----更新颜色
    var html = "";
    <?php
        $a = explode(',',$model->metalColor);
        $i = 0;
        foreach ($a as $c){
    ?>
           html += '<div onclick="changeColor(';
           html += 'this'; 
           html += ');" color="<?=$c;?>" class="<?php if($i == 0){ echo 'activeProductColor'; }else{ echo 'selectProductColor'; }?>"><div style="background:<?=$c;?>; width: 100%; height: 100%"></div></div>';
    <?php        
           $i++;
        }
    ?> 
    $('#selectC').html(html);
    var fColor = $('.activeProductColor').attr('color');
    $('#color').val(fColor);
    
});

//---商品切换颜色
$('#selectC > div').click(function(){
   $('#selectC > div').removeClass('activeProductColor').addClass('selectProductColor'); 
   $(this).addClass('activeProductColor');
   var cColor = $(this).attr('color');
   $('#color').val(cColor);
});

function changeColor(k){
   
   $('#selectC > div').removeClass('activeProductColor').addClass('selectProductColor'); 
   $(k).addClass('activeProductColor');
   var cColor = $(k).attr('color');
   $('#color').val(cColor);
}



//----弹出登录框
function ajaxLoginShow(){
	
	
	   $.tsBox.Show("#loginContent");	//闪动窗口
	   $("#btn_content_close").click(function(){
		   $.tsBox.Hide("#loginContent");
		   return false;
	   });
	
	
}

//----提交ajax登录

function ajaxLoginSubmit(){
	
	name = $('input[name="username"]').val();
	
	pwd = $('input[name="password"]').val();

	$.post("<?php echo $this->createUrl('site/login'); ?>",{LoginForm_username:name,LoginForm_password:pwd,ajax:'login-form', mr:Math.random()}, function(msg) {
		
		if(msg == 200){
		 	//$.tsBox.Hide("#loginContent");	
			history.go(0);
		}else{
			$('#errorMsg').html('账号或者密码错误，请重新输入！');
		}			
	});
}








</script>


