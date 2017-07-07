<?php
/**
 * EFineUploader class file.
 * This extension is a wrapper of https://github.com/Widen/fine-uploader
 *
 * @author Vladimir Papaev <kosenka@gmail.com>
 * @version 0.1
 * @license http://www.opensource.org/licenses/bsd-license.php
 */

class EFineUploader extends CWidget
{
        public $version="3.4.1";
        public $id="fineUploader";
	    public $config=array();
	    public $css=null;
        
        public function run()
        {
		if(empty($this->config['request']['endpoint']))
		      throw new CException('EFineUploader: param "request::endpoint" cannot be empty.');
		if(!is_array($this->config['validation']['allowedExtensions']))
		      throw new CException('EFineUploader: param "validation::allowedExtensions" must be an array.');
		if(empty($this->config['validation']['sizeLimit']))
		      throw new CException('EFineUploader: param "validation::sizeLimit" cannot be empty.');
        unset($this->config['element']);
        echo "<div id='{$this->id}'><noscript><p>要使用文件上传，请在浏览器内开启Java脚本支持</p></noscript></div>";
		$assets = dirname(__FILE__).'/assets';
        $baseUrl = Yii::app()->assetManager->publish($assets);
	    $fJs = $baseUrl."/jquery.fineuploader-{$this->version}.js";
        Yii::app()->clientScript->registerScriptFile($fJs, CClientScript::POS_HEAD);
        $this->css = $baseUrl."/fineuploader-{$this->version}.css";
        Yii::app()->clientScript->registerCssFile($this->css);
		$config = array('element'=>'js:document.getElementById("'.$this->id.'")');
		$config = array_merge($config, $this->config);
		$config = CJavaScript::encode($config);
        Yii::app()->getClientScript()->registerScript("FineUploader_".$this->id, "var FineUploader_".$this->id." = new qq.FineUploader($config);",CClientScript::POS_LOAD);
		}

}