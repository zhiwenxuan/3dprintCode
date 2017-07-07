<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
$this->widget('ext.CDropDownMenu.CDropDownMenu',array(
            'style' => 'vertical', // or default or navbar
      'items'=>array(
                array(
                    'label'=>Yii::t('Login'),
                    'url'=>array('//user/user/login'),
                    'visible'=>Yii::app()->user->isGuest,
                    ), 
                array(
                    'label'=>Yii::t('Register'),
                    'url'=>array('//registration/registration/registration'),
                    'visible'=>Yii::app()->user->isGuest,
                    ), 
                array(
                    'label'=>Yii::t('Demo'),
                    'url'=>array('//demo/index'),
                    'visible'=>Yii::app()->user->isGuest,
                    ), 
                array(
                    'label'=>Yii::t('Demo'),
                    'visible'=>!Yii::app()->user->isGuest,
                    'items' => array(
                        array(
                            'label'=>Yii::t('Browse demos'),
                            'url'=>array('//demo/index'),
                            ), 
                        array(
                            'label'=>Yii::t('Create new Demo'),
                            'url'=>array('//demo/create'),
                            ), 
                        array(
                            'label'=>Yii::t('Demos'),
                            'url'=>array('//demo/index', 'owner' => true),
                            ), 
    ),
                array('label'=>'Logout ('.Yii::app()->user->name.')',
                        'url'=>array('/site/logout'),
                        'visible'=>!Yii::app()->user->isGuest)
                    )
    ) 
)
);
?>

     
     
<script type="text/javascript">  
$(document).ready(function() {
	$('#menu &gt; ul').superfish({
		hoverClass	 : 'sfHover',
		pathClass	 : 'overideThisToUse',
		delay		 : 0,
		animation	 : {height: 'show'},
		speed		 : 'normal',
		autoArrows   : false,
		dropShadows  : false, 
		disableHI	 : false, /* set to true to disable hoverIntent detection */
		onInit		 : function(){},
		onBeforeShow : function(){},
		onShow		 : function(){},
		onHide		 : function(){}
	});
	
	$('#menu &gt; ul').css('display', 'block');
});
 
function getURLVar(urlVarName) {
var urlHalves = String(document.location).toLowerCase().split('?');
var urlVarValue = '';
if (urlHalves[1]) {
var urlVars = urlHalves[1].split('&');
for (var i = 0; i <= (urlVars.length); i++) {
if (urlVars[i]) {
var urlVarPair = urlVars[i].split('=');
if (urlVarPair[0] && urlVarPair[0] == urlVarName.toLowerCase()) {
urlVarValue = urlVarPair[1];
}
}
}
}
return urlVarValue;
} 

$(document).ready(function() {
	route = getURLVar('route');
	
	if (!route) {
		$('#dashboard').addClass('selected');
	} else {
		part = route.split('/');
		
		url = part[0];
		
		if (part[1]) {
			url += '/' + part[1];
		}
		
		$('a[href*=\'' + url + '\']').parents('li[id]').addClass('selected');
	}
});
 </script> 