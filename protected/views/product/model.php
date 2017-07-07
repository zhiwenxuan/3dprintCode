<style>
	span{
		color:red;
		font-weight:700;
	}
	a{
		color:red;
		font-weight:700;
	}
</style>
<!--3d模型容器-->
<div id="viewer" class="LayoutDiv1"></div>

<div id="title" class="LayoutDiv2" style="margin-top:25px;">
	<p>Alice的三维人体模型</p> 
</div>


<div id="make" style="display:none;">
    <div  style="margin-top:2px;  font-size:16px; font-weight:700; font-family:微软雅黑;">数据采集方:<?=$userInfo->name;?></div>
    <div  style="margin-top:2px; font-size:16px; font-weight:700; font-family:微软雅黑;">Shape ID:3216819</div> 

<table border="1"
　　summary="build by peter ding.">
　<caption><em>体型数据</em></caption>
　<tr><th rowspan="2"><th colspan="4">Shape ID:3216819
　<tr><th>身高(CM)<th>体重(KG)<th>胸围(CM)<th>腰围(CM)
　<tr><th>2016-02-10<td>176<td>59<td>88<td>69
　<tr><th>2016-06-08<td>176<td>55<td>86<td>65
</table>
   




 </div>    
</div>

<div id="share" class="bdsharebuttonbox LayoutDiv2">
<a href="#" class="bds_more" data-cmd="more"></a>
<a href="#" class="bds_qzone" data-cmd="qzone" title="分享到QQ空间"></a>
<a href="#" class="bds_tsina" data-cmd="tsina" title="分享到新浪微博"></a>
<a href="#" class="bds_tqq" data-cmd="tqq" title="分享到腾讯微博"></a>
<a href="#" class="bds_renren" data-cmd="renren" title="分享到人人网"></a>
<a href="#" class="bds_weixin" data-cmd="weixin" title="分享到微信"></a>
</div>







<script src="<?php echo Yii::app()->request->baseUrl; ?>/javascripts/Three.js"></script>
<script src="<?php echo Yii::app()->request->baseUrl; ?>/javascripts/show3d.js"></script>
<script>
	var jq=jQuery.noConflict();

	var pc_style = ""
	var browser = {
	versions: function () {
	var u = navigator.userAgent, app = navigator.appVersion;
	return {
	trident: u.indexOf('Trident') > -1,
	presto: u.indexOf('Presto') > -1,
	webKit: u.indexOf('AppleWebKit') > -1,
	gecko: u.indexOf('Gecko') > -1 && u.indexOf('KHTML') == -1,
	mobile: !!u.match(/AppleWebKit.*Mobile.*/) || !!u.match(/AppleWebKit/) && u.indexOf('QIHU') && u.indexOf('Chrome') < 0,
	ios: !!u.match(/\(i[^;]+;( U;)? CPU.+Mac OS X/),
	android: u.indexOf('Android') > -1 || u.indexOf('Linux') > -1,
	iPhone: u.indexOf('iPhone') > -1 || u.indexOf('Mac') > -1,
	iPad: u.indexOf('iPad') > -1,
	webApp: u.indexOf('Safari') == -1,
	ua: u
	};
	}(),
	language: (navigator.browserLanguage || navigator.language).toLowerCase()
	}
	
	if (browser.versions.mobile && !browser.versions.iPad) {
		jq('#share').hide();
		jq('#weixin').show();
		jq('#make').show();
		jq('#title').css('font-size','18px');
		jq('#viewer').css('height','60%');
		
	
	}else{
		/*jq('#share').hide();
		jq('#title').css('font-size','28px');*/
	}


	//----模型显示	
    <?php
        $length = strlen($model->three_model);
        $mName = substr($model->three_model, 1, ($length - 1));
    ?>
    fileNm = "<?php echo $mName; ?>";
	
    window.onload = function()
	{
		thingiurlbase = "<?php echo Yii::app()->request->baseUrl; ?>/javascripts";
	   // document.write(fileNm);
       // alert(fileNm.substr(-3)); // 得到文件后缀名 STL or OBJ
		view3d = new View3D("viewer");
		view3d.setObjectColor('#1185ea');
		view3d.initScene();
        var fileType = fileNm.substr(-3);
        if(fileType.localeCompare("STL") == 0 || fileType.localeCompare("stl") == 0)
       // alert("file type is STL");
		view3d.loadSTL("<?php echo Yii::app()->request->baseUrl; ?>" + fileNm);
        else
		view3d.loadOBJ("<?php echo Yii::app()->request->baseUrl; ?>" + fileNm);
    }
</script>
