<?php
	if(Yii::app()->user->isGuest == false){
		$userName = Yii::app()->user->name;
		$cookie = Yii::app()->request->getCookies();
		if(isset($cookie['mycookie']->value)){
			$userPwd = $cookie['mycookie']->value;
		}

    	unset($cookie['mycookie']);
	}
?>

<p>建议使用谷歌浏览器（chrome）或者firefox。</p>
<iframe src="http://112.124.104.11:8000"  width="1024" height="800"  ></iframe>
<br>
<br>
<h3>其他3D模型开发工具推荐</h3>
<p>除了3D打印工场提供的在线设计中心，我们还推荐以下几款免费，好用的3D模型制作软件。</p>
<p> </p>
<div class="type_three" > <a href="https://tinkercad.com/">
  <div class="t_title">TinkerCAD</div>
  </a>
  <div style="color: #888;">
    Tinkercad能够帮您制作可3D打印的小物件，您不需要任何专业的设计技巧。打开网页就能开始制作… <br>
  </div>
  <a href="https://tinkercad.com/"><img src="/images/3dEditors/tinkercad.png" width="280" height="190"></a> </div>
<div class="type_three"> <a href="http://www.3dtin.com/">
  <div class="t_title">3D Tin</div>
  </a>
  <div style="color: #888;">
    这是一个基于浏览器的免费编辑器，非常适合初学者和年轻人使用。随着此款软件高级处理功能的增…</div>
  <a href="http://www.3dtin.com/"><img src="/images/3dEditors/3dTin.jpg" width="280" height="190"></a> </div>
<div class="type_three_right"> <a href="http://www.blender.org/download/get-blender/">
  <div class="t_title">Blender</div>
  </a>
  <div style="color: #888;">
    十分强大的应用程序，内含多种成熟的专业工具。Blender开源3D软件拥有广泛的拥护者和大量资源…</div>
  <a href="http://www.blender.org/download/get-blender/"><img src="/images/3dEditors/Blender.jpg" width="280" height="190"></a> </div>
<div class="clear" style="margin-bottom: 30px;"></div>
<div class="type_three" > <a href="http://www.sketchup.com/download">
  <div class="t_title">SketchUP</div>
  </a>
  <div style="color: #888;">
    SketchUp常用于制作建筑、家具、火车等模型。此款软件仅需几步操作，十分容易上手。适用系统：… <br>
  </div>
  <a href="http://www.sketchup.com/download"><img src="/images/3dEditors/sketchUP.jpg" width="280" height="190"></a> </div>
<div class="type_three"> <a href="https://www.shapeways.com/creator/2dto3d">
  <div class="t_title">2D转换成3D</div>
  </a>
  <div style="color: #888;">
    打开一张黑白的JPG格式图片，即可以开始3D设计了。适用：在线上传</div>
  <a href="https://www.shapeways.com/creator/2dto3d"><img src="/images/3dEditors/2DTO3D.jpg" width="280" height="190"></a> </div>
<div class="type_three_right"> <a href="http://www.printcraft.org/">
  <div class="t_title">PrintCraft</div>
  </a>
  <div style="color: #888;">
    Printcraft是世界上首个3D打印Minecraft多人沙盒游戏服务器。制作Minecraft模型并打印吧。</div>
  <a href="http://www.printcraft.org/"><img src="/images/3dEditors/Printcraft.jpg" width="280" height="190"></a> </div>
<div class="clear" style="margin-bottom: 30px;"></div>
<div class="type_three" > <a href="http://www.123dapp.com/design">
  <div class="t_title">AUTODESK 123D</div>
  </a>
  <div style="color: #888;"><br>
    请下载，然后安装使用。 <br>
  </div>
  <a href="http://www.123dapp.com/design"><img src="/images/3dEditors/123CAD.jpg" width="280" height="190"></a> </div>
<div class="type_three"> <a href="http://pixologic.com/sculptris/">
  <div class="t_title">Sculptris</div>
  </a>
  <div style="color: #888;">
    请下载，然后安装使用。</div>
  <a href="http://pixologic.com/sculptris/"><img src="/images/3dEditors/Sculptris.jpg" width="280" height="190"></a> </div>
<div class="type_three_right"> <a href="http://www.parametricparts.com/">
  <div class="t_title">Parametric Parts</div>
  </a>
  <div style="color: #888;">
    ParametricParts允许顾客在网络平台上创作并打印3D产品。每个人都有3D打印的创作灵感，即使没…</div>
  <a href="http://www.parametricparts.com/"><img src="/images/3dEditors/Parametric_Parts.png" width="280" height="190"></a> </div>
<div class="clear" style="margin-bottom: 10px;"></div>
