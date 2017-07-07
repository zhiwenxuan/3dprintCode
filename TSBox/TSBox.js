/*!
* jQuery JavaScript Library v1.4.2
* tsBox 1.0 by xusion create 2011-03-10 jQuery的扩展对话框函数  jQuery extension dialog box function
* 必须先调用 jquery.cvbox.js
* 使用方法：$.tsBox.[mothod](args)
* 参考文档：http://demo.jb51.net/js/jquery_cvbox/index.htm
*/
document.write("<link rel='stylesheet' type='text/css' href='/TSBox/jquery.cvbox.css?v=20111124' />");
document.write("<script type='text/javascript' src='/TSBox/jquery.cvbox.js?v=20111124'></script>");


$.extend({  //对话框，提示框类似于alert功能。   Dialog boxes similar to the alert function.
    tsBox: {
        Show: function (selector, title) {    //显示对话框  Display the dialog box
          var tsbox =  $(selector).cvbox({
			  
                titleBarText: title,
				autoWidth: true
            });
			$(selector).data("tsbox",tsbox);
        },
		Hide: function(selector){
			var tsbox=$(selector).data("tsbox");
			if(tsbox!=null){
				tsbox.hide();
			}
		},
        Alert: function (strMsg, funCallBack, strTitle) {    //提示对话框  Prompt dialog box
            $(document).cvbox({
                titleBarText: (strTitle != null ? strTitle : "提示框"),
                alertText: strMsg,
                btnIcon: 3,
                submitAfter: funCallBack
            });
        },
        Error: function (strMsg, funCallBack, strTitle) {    //提示对话框  Prompt dialog box
            $(document).cvbox({
                titleBarText: (strTitle != null ? strTitle : "提示框"),
                alertText: strMsg,
                btnIcon: 0,
                submitAfter: funCallBack
            });
        },
        Flash: function (strMsg, strTitle) {
            $(document).cvbox({
                titleBarText: (strTitle != null ? strTitle : "提示框"),
                alertText: strMsg,
                delayClose: 20000000,
                btnIcon: 1,
                btnShow: false
            });
        },
        Confirm: function (strMsg, okCallBack, strTitle) {   //确认对话框    Confirmation dialog box
            $(document).cvbox({
                titleBarText: "确认框",
                confirmText: strMsg,
                submitAfter: okCallBack
            });
        }
    }
});


