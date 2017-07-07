<style>
@charset "utf-8";
/*
/* 
 * HTML5 ✰ 样板
 *
 * 以下是诸多跨浏览器样式研究的结果。 
 * 内嵌致谢，非常感谢 Nicolas Gallagher、Jonathan Neal、
 * Kroc Camen, 和 H5BP 开发团队和小组。
 *
 * 有关此 CSS 的详细信息: h5bp.com/css
 * 
 * Dreamweaver 修改:
 * 1. 高亮标记出选定部分
 * 2. 删除媒体查询部分（我们在单独的文件中添加了自己的媒体查询部分）
 *
 * ==|== 规范化 ==========================================================
 */


/* =============================================================================
   HTML5 显示定义
   ========================================================================== */

article, aside, details, figcaption, figure, footer, header, hgroup, nav, section { display: block; }
audio, canvas, video { display: inline-block; *display: inline; *zoom: 1; }
audio:not([controls]) { display: none; }
[hidden] { display: none; }

/* =============================================================================
   基础
   ========================================================================== */

/*
 * 1. 纠正正文字体大小使用 em 单位设置时，IE6/7 中的文本异常调整大小的问题
 * 2. 强制在非 IE 中使用垂直滚动条
 * 3. 防止在设备方向更改时调整 iOS 文本大小，而不需要禁用用户缩放: h5bp.com/g
 */

html { font-size: 100%; overflow-y: scroll; -webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; }

body { margin: 0; font-size: 13px; line-height: 1.231; }

body, button, input, select, textarea { font-family: sans-serif; color: #222; }

/* 
 * 删除选定高亮部分的文本阴影: h5bp.com/i
 * 这些选定内容声明必须有所区别
 * 此外: 暗粉色！（或自定义背景颜色以符合您的设计）
 */

/* Dreamweaver: 如果您想要自定义选定高亮部分，请取消这些注释
 *::-moz-selection { background: #fe57a1; color: #fff; text-shadow: none; }
 *::selection { background: #fe57a1; color: #fff; text-shadow: none; }
 */

/* =============================================================================
   链接
   ========================================================================== */

a { color: #00e; }
a:visited { color: #551a8b; }
a:hover { color: #06e; }
a:focus { outline: thin dotted; }

/* 改善在所有浏览器中获取焦点和悬停时的可读性: h5bp.com/h */
a:hover, a:active { outline: 0; }


/* =============================================================================
   排版规则
   ========================================================================== */

abbr[title] { border-bottom: 1px dotted; }

b, strong { font-weight: bold; }

blockquote { margin: 1em 40px; }

dfn { font-style: italic; }

hr { display: block; height: 1px; border: 0; border-top: 1px solid #ccc; margin: 1em 0; padding: 0; }

ins { background: #ff9; color: #000; text-decoration: none; }

mark { background: #ff0; color: #000; font-style: italic; font-weight: bold; }

/* 重新声明固定宽度字体系列: h5bp.com/j */
pre, code, kbd, samp { font-family: monospace, monospace; _font-family: 'courier new', monospace; font-size: 1em; }

/* 改善所有浏览器中预先格式化的文本的可读性 */
pre { white-space: pre; white-space: pre-wrap; word-wrap: break-word; }

q { quotes: none; }
q:before, q:after { content: ""; content: none; }

small { font-size: 85%; }

/* 放置上标和下标内容，而不影响行高: h5bp.com/k */
sub, sup { font-size: 75%; line-height: 0; position: relative; vertical-align: baseline; }
sup { top: -0.5em; }
sub { bottom: -0.25em; }


/* =============================================================================
   列表
   ========================================================================== */

ul, ol { margin: 1em 0; padding: 0 0 0 40px; }
dd { margin: 0 0 0 40px; }
nav ul, nav ol { list-style: none; list-style-image: none; margin: 0; padding: 0; }
img { border: 0; -ms-interpolation-mode: bicubic; vertical-align: middle; }
svg:not(:root) { overflow: hidden; }
figure { margin: 0; }
form { margin: 0; }
fieldset { border: 0; margin: 0; padding: 0; }
label { cursor: pointer; }
legend { border: 0; *margin-left: -7px; padding: 0; }
button, input, select, textarea { font-size: 100%; margin: 0; vertical-align: baseline; *vertical-align: middle; }
button, input { line-height: normal; *overflow: visible; }
table button, table input { *overflow: auto; }
button, input[type="button"], input[type="reset"], input[type="submit"] { cursor: pointer; -webkit-appearance: button; }
input[type="checkbox"], input[type="radio"] { box-sizing: border-box; }
input[type="search"] { -webkit-appearance: textfield; -moz-box-sizing: content-box; -webkit-box-sizing: content-box; box-sizing: content-box; }
input[type="search"]::-webkit-search-decoration { -webkit-appearance: none; }
button::-moz-focus-inner, input::-moz-focus-inner { border: 0; padding: 0; }
textarea { overflow: auto; vertical-align: top; resize: vertical; }
/* 用于表单验证的颜色 */
input:valid, textarea:valid {  }
input:invalid, textarea:invalid { background-color: #f0dddd; }

table { border-collapse: collapse; border-spacing: 0; }
td { vertical-align: top; }
/* 用于图像替换 */
.ir { display: block; border: 0; text-indent: -999em; overflow: hidden; background-color: transparent; background-repeat: no-repeat; text-align: left; direction: ltr; }
.ir br { display: none; }

/* 同时在屏幕读取器和浏览器中隐藏: h5bp.com/u */
.hidden { display: none !important; visibility: hidden; }

/* 仅可视隐藏，但在屏幕读取器中可用: h5bp.com/v */
.visuallyhidden { border: 0; clip: rect(0 0 0 0); height: 1px; margin: -1px; overflow: hidden; padding: 0; position: absolute; width: 1px; }

/* 扩展 .visuallyhidden 类以允许元素可在通过键盘浏览时成为焦点: h5bp.com/p */
.visuallyhidden.focusable:active, .visuallyhidden.focusable:focus { clip: auto; height: auto; margin: 0; overflow: visible; position: static; width: auto; }

/* 可视隐藏且在屏幕读取器中隐藏，但保留布局 */
.invisible { visibility: hidden; }

/* 包含浮动: h5bp.com/q */ 
.clearfix:before, .clearfix:after { content: ""; display: table; }
.clearfix:after { clear: both; }
.clearfix { zoom: 1; }


/* ==|== 打印样式 =======================================================
   打印样式。
   已内嵌以避免必要的 HTTP 连接: h5bp.com/r
   ========================================================================== */
 
 @media print {
  * { background: transparent !important; color: black !important; text-shadow: none !important; filter:none !important; -ms-filter: none !important; } /* 黑白打印速度更快: h5bp.com/s */
  a, a:visited { text-decoration: underline; }
  a[href]:after { content: " (" attr(href) ")"; }
  abbr[title]:after { content: " (" attr(title) ")"; }
  .ir a:after, a[href^="javascript:"]:after, a[href^="#"]:after { content: ""; }  /* 不显示图像链接或 javascript/内部链接 */
  pre, blockquote { border: 1px solid #999; page-break-inside: avoid; }
  thead { display: table-header-group; } /* h5bp.com/t */
  tr, img { page-break-inside: avoid; }
  img { max-width: 100% !important; }
  @page { margin: 0.5cm; }
  p, h2, h3 { orphans: 3; widows: 3; }
  h2, h3 { page-break-after: avoid; }
}

@charset "utf-8";
/* 简单流媒体
   注意: 流媒体要求您删除 HTML 中媒体的高度和宽度属性
   http://www.alistapart.com/articles/fluid-images/ 
*/
img, object, embed, video {
	max-width: 100%;
}
/* IE 6 不支持最大宽度，因此默认为 100% 宽度 */
.ie6 img {
	width:100%;
}

/*
	Dreamweaver 流体网格属性
	----------------------------------
	dw-num-cols-mobile:		5;
	dw-num-cols-tablet:		8;
	dw-num-cols-desktop:	10;
	dw-gutter-percentage:	25;
	
	灵感来自于 Ethan Marcotte 的“具有响应的 Web 设计” 
	http://www.alistapart.com/articles/responsive-web-design
	
	和 Joni Korpi 的“黄金网格系统”
	http://goldengridsystem.com/
*/

/* 移动设备布局: 480px 及更低。 */

.gridContainer {
	margin-left: auto;
	margin-right: auto;
	width: 96%;
	padding-left: 2%;
	padding-right: 2%;
}
.LayoutDiv1 {
	clear: both;
	float: left;
	margin-left: 0;
	width: 100%;
	display: block;
	height:80%;
}

/* 平板电脑布局: 481px 至 768px。样式继承自: 移动设备布局。 */

@media only screen and (min-width: 481px) {
.gridContainer {
	width: 90.675%;
	padding-left: 1.1625%;
	padding-right: 1.1625%;
}
.LayoutDiv1 {
	clear: both;
	float: left;
	margin-left: 0;
	width: 100%;
	height:80%;
	display: block;
}

.LayoutDiv2 {
	clear: both;
	float: left;
	margin-left: 0;
	width: 100%;
	display: block;
	font-family:微软雅黑;
	font-size:18px;
	margin-top:20px;
}
}

/* 桌面电脑布局: 769px 至最高 1232px。样式继承自: 移动设备布局和平板电脑布局。 */

@media only screen and (min-width: 769px) {
.gridContainer {
	width: 88.2%;
	max-width: 1232px;
	padding-left: 0.9%;
	padding-right: 0.9%;
	margin: auto;
}
#LayoutDiv1 {
	clear: both;
	float: left;
	margin-left: 0;
	width: 100%;
	display: block;
}
}

</style>
<!doctype html>
<!--[if lt IE 7]> <html class="ie6 oldie"> <![endif]-->
<!--[if IE 7]>    <html class="ie7 oldie"> <![endif]-->
<!--[if IE 8]>    <html class="ie8 oldie"> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="">
<!--<![endif]-->
<head>
<meta charset="utf-8">

<meta name="viewport" content="width=device-width,initial-scale=1.0,maximum-scale=1.0,user-scalable=0" />
<?php
	if (!empty($this->pageDescription))
	{
		echo '<meta name="keywords" content="' . $this->pageKeywords . '" />';
	}else{
		echo '<meta name="keywords" content="' . KEYWORDS . '" />';	
	}
	?>
    
    <?php
	if (!empty($this->pageDescription))
	{
		echo '<meta name="description" content="' . $this->pageDescription . '" />';
	}else{
		echo '<meta name="description" content="' . DESCRIPTION . '" />';	
	}
	?>
<title><?php echo CHtml::encode($this->pageTitle); ?></title>
<!-- 
要详细了解文件顶部 html 标签周围的条件注释:
paulirish.com/2008/conditional-stylesheets-vs-css-hacks-answer-neither/

如果您使用的是 modernizr (http://www.modernizr.com/) 的自定义内部版本，请执行以下操作:
* 在此处将链接插入 js 
* 将下方链接移至 html5shiv
* 将“no-js”类添加到顶部的 html 标签
* 如果 modernizr 内部版本中包含 MQ Polyfill，您也可以将链接移至 respond.min.js 
-->
<!--[if lt IE 9]>
<script src="//html5shiv.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->

</head>
<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/javascripts/jquery.js"></script>
<script>
window._bd_share_config={"common":{"bdSnsKey":{},"bdText":"","bdMini":"2","bdMiniList":false,"bdPic":"","bdStyle":"0","bdSize":"24"},"share":{},"image":{"viewList":["qzone","tsina","tqq","renren","weixin"],"viewText":"分享到：","viewSize":"16"}};with(document)0[(getElementsByTagName('head')[0]||body).appendChild(createElement('script')).src='http://bdimg.share.baidu.com/static/api/js/share.js?v=89860593.js?cdnversion='+~(-new Date()/36e5)];
</script>
<body>
<div class="gridContainer clearfix">
	<?php echo $content; ?>
</div>
</body>
</html>
