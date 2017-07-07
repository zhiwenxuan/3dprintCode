/* 
* JQuery.cvbox.js
* http://www.chinavalue.net
* 
* J.Wang
* http://0417.cnblog.socm
*
* 2010.09.30
*
* modify 2011-11-24 by xusion
*/

(function ($) {
    $.fn.cvbox = function (options) {
        var self = $(this);
        var defaults = {
            titleBarText: "",
            titleBarClose: "(X)",
            bgClickClose: false,
            bgShow: true,
            bgOpacity: 0.2,
            confirmText: "",
            alertText: "",
            delayClose: 0,
            btnIcon: 0,
            btnShow: true,
            autoWidth: false,
            submitAfter: function () {
                $.noop();
            }
        };
        var param = $.extend({}, defaults, options || {});
        var icons = ["cvBoxIconError", "cvBoxIconTick", "cvBoxIconComfirm", "cvBoxIconAlert"];

        //弹框的显示
        var cvBoxElement = '<div id="cvBoxShade" class="cvBoxShade"></div>';
        cvBoxElement += '<div id="cvBoxBorder" class="cvBoxBorder">';
        cvBoxElement += '<table class="cvBoxBack" cellpadding="0" cellspacing="0"><tr><td colspan="3" class="cvBoxBackTop"></td></tr><tr><td class="cvBoxBackLeft"></td><td>';
        cvBoxElement += '<div id="cvBoxTitleBar" class="cvBoxTitleBar"><div class="cvBoxTitleBarText">' + param.titleBarText + '</div><div class="cvBoxTitleBarClose"><a href="javascript:void(0);" id="cvBoxTitleBarClose">' + param.titleBarClose + '</a></div><div class="cvBoxClear"></div></div>';
        cvBoxElement += '<div id="cvBoxBody" class="cvBoxBody"></div>';
        cvBoxElement += '</td><td class="cvBoxBackRight"></td></tr><tr><td colspan="3" class="cvBoxBackBottom"></td></tr></table>';
        cvBoxElement += '</div>';

        if ($("#cvBoxBorder").size()) {
            $("#cvBoxBorder").show();

            if (param.bgShow) {
                $("#cvBoxShade").show();
            }
            else {
                $("#cvBoxShade").hide();
            }
        }
        else {
            $("body").append(cvBoxElement);
        }

        //一些元素对象，浏览器宽高，滚动高度，页面高度
        var cbBg = $("#cvBoxShade");
        var cbBorder = $("#cvBoxBorder");
        var cbTitleBar = $("#cvBoxTitleBar");
        var cbBody = $("#cvBoxBody");
        var w, h, st, ph, html_h;

        var cb = {
            //装载的内容
            content: function () {
                var text;
                if (param.confirmText != "") {
                    text = $('<div class="cvBoxBodyBtn"><div class="cvBoxBodyText"><div class="' + icons[2] + '"></div><div class="cvBoxTextSpace">' + param.confirmText + '</div></div><p><input type="button" id="cvBoxBtnSubmit" class="cvBoxBtnSubmit_2" value="确认" />&nbsp;&nbsp;<input type="button" id="cvBoxBtnCancel" class="cvBoxBtnCancel" value="取消" /><div style="clear:both;"></div></p></div>');
                
				}
                else if (param.alertText != "") {
                    text = $('<div class="cvBoxBodyBtn"><div class="cvBoxBodyText"><div class="' + icons[param.btnIcon] + '"></div><div class="cvBoxTextSpace">' + param.alertText + '</div></div><p><input type="button" id="cvBoxBtnSubmit" class="cvBoxBtnSubmit" value="取消" /></p></div>');
                
				}
                else {
                    self.show();
                    text = self;
                }

                return text;
            },

            hw: function (obj) {
                var padding = 8;
                //获取任意元素的高宽
                var hwSize = {};
                $('<div id="cbBox" style="position:absolute;left:-999px;"></div>').appendTo("body").append(obj.clone());
                hwSize.w = (padding * 2) + (param.autoWidth == true ? $("#cbBox").width() : 300);
                hwSize.h = $("#cbBox").height();
                $("#cbBox").remove();
                return hwSize;
            },

            //黑背景的宽高透明度等，弹框的位置
            position: function () {
                w = $(window).width(), h = $(window).height(), st = $(window).scrollTop(), ph = $(document).height(), html_h = $("html").height();
                cbBg.width(w).height(ph).css("opacity", param.bgOpacity);
                //主体内容的位置
                var x_size = cb.hw(cb.content());
                var xh = x_size.h, xw = x_size.w;
                var t = st + (h - xh) / 2, l = (w - xw) / 2;
                cbBorder.css({
                    width: xw,
                    top: t,
                    left: l,
                    zIndex: 9999
                });
            },

            //定位
            posfix: function () {
                if (window.XMLHttpRequest) {
                    cbBorder.css("position", "fixed");
                } else {
                    $(window).scroll(function () {
                        cb.position();
                    });
                }
            },

            //居中
            center: function () {
                $(window).resize(function () {
                     if (cb != null) {
                        cb.position();
                    }
                });
            },

            bgclick: function () {
                cbBg.click(function () {
                    cb.hide();
                });
            },

            bghide: function () {
                cbBg.hide();
            },

            //弹框的隐藏
            hide: function () {
                if (param.confirmText == "" && param.alertText == "") {
                    cb.content().hide().appendTo($("body"));
                }

                cbBorder.fadeOut(300);
				cbBg.hide();
                cbBorder.remove();
                cbBg.remove();
				cb=null;
                return false;
            },

            barhide: function () {
                cbTitleBar.hide();
            },

            show: function () {
                if (cbBody.html() == "") {
                    cbBody.append(cb.content());
                }

                cb.position();
                cb.center();

                if (param.titleBarText == "") {
                    cb.barhide();
                }
                if (!param.bgShow) {
                    cb.bghide();
                }
                if (param.bgClickClose) {
                    cb.bgclick();
                }
                if (param.delayClose > 0) {
                    setTimeout(cb.hide, param.delayClose);
                }
            }
        };


        cb.show();

        //隐藏按钮
        if (param.btnShow != true) {
            $("#cvBoxBtnSubmit").hide();
            $("#cvBoxBtnCancel").hide();
        }

        //一些事件的绑定
        $("#cvBoxBtnSubmit").bind("click", function () {
            cb.hide();
            if (typeof (param.submitAfter) == "function") {
                param.submitAfter();
            }
        });

        $("#cvBoxBtnCancel").bind("click", function () {
            cb.hide();
            return false;
        });

        $("#cvBoxTitleBarClose").bind("click", function () {
            cb.hide();
            return false;
        });

        $("#cvBoxBody").find(".close").bind("click", function () {
            cb.hide();
            return false;
        });

        return cb;
    }
})(jQuery);