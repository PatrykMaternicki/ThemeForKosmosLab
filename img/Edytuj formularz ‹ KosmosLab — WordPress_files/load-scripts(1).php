!function(a){a.fn.hoverIntent=function(b,c,d){var e={interval:100,sensitivity:6,timeout:0};e="object"==typeof b?a.extend(e,b):a.isFunction(c)?a.extend(e,{over:b,out:c,selector:d}):a.extend(e,{over:b,out:b,selector:c});var f,g,h,i,j=function(a){f=a.pageX,g=a.pageY},k=function(b,c){return c.hoverIntent_t=clearTimeout(c.hoverIntent_t),Math.sqrt((h-f)*(h-f)+(i-g)*(i-g))<e.sensitivity?(a(c).off("mousemove.hoverIntent",j),c.hoverIntent_s=!0,e.over.apply(c,[b])):(h=f,i=g,c.hoverIntent_t=setTimeout(function(){k(b,c)},e.interval),void 0)},l=function(a,b){return b.hoverIntent_t=clearTimeout(b.hoverIntent_t),b.hoverIntent_s=!1,e.out.apply(b,[a])},m=function(b){var c=a.extend({},b),d=this;d.hoverIntent_t&&(d.hoverIntent_t=clearTimeout(d.hoverIntent_t)),"mouseenter"===b.type?(h=c.pageX,i=c.pageY,a(d).on("mousemove.hoverIntent",j),d.hoverIntent_s||(d.hoverIntent_t=setTimeout(function(){k(c,d)},e.interval))):(a(d).off("mousemove.hoverIntent",j),d.hoverIntent_s&&(d.hoverIntent_t=setTimeout(function(){l(c,d)},e.timeout)))};return this.on({"mouseenter.hoverIntent":m,"mouseleave.hoverIntent":m},e.selector)}}(jQuery);
var showNotice,adminMenu,columns,validateForm,screenMeta;!function(a,b,c){var d=a(document),e=a(b),f=a(document.body);adminMenu={init:function(){},fold:function(){},restoreMenuState:function(){},toggle:function(){},favorites:function(){}},columns={init:function(){var b=this;a(".hide-column-tog","#adv-settings").click(function(){var c=a(this),d=c.val();c.prop("checked")?b.checked(d):b.unchecked(d),columns.saveManageColumnsState()})},saveManageColumnsState:function(){var b=this.hidden();a.post(ajaxurl,{action:"hidden-columns",hidden:b,screenoptionnonce:a("#screenoptionnonce").val(),page:pagenow})},checked:function(b){a(".column-"+b).removeClass("hidden"),this.colSpanChange(1)},unchecked:function(b){a(".column-"+b).addClass("hidden"),this.colSpanChange(-1)},hidden:function(){return a(".manage-column[id]").filter(":hidden").map(function(){return this.id}).get().join(",")},useCheckboxesForHidden:function(){this.hidden=function(){return a(".hide-column-tog").not(":checked").map(function(){var a=this.id;return a.substring(a,a.length-5)}).get().join(",")}},colSpanChange:function(b){var c,d=a("table").find(".colspanchange");d.length&&(c=parseInt(d.attr("colspan"),10)+b,d.attr("colspan",c.toString()))}},d.ready(function(){columns.init()}),validateForm=function(b){return!a(b).find(".form-required").filter(function(){return""===a("input:visible",this).val()}).addClass("form-invalid").find("input:visible").change(function(){a(this).closest(".form-invalid").removeClass("form-invalid")}).length},showNotice={warn:function(){var a=commonL10n.warnDelete||"";return!!confirm(a)},note:function(a){alert(a)}},screenMeta={element:null,toggles:null,page:null,init:function(){this.element=a("#screen-meta"),this.toggles=a("#screen-meta-links").find(".show-settings"),this.page=a("#wpcontent"),this.toggles.click(this.toggleEvent)},toggleEvent:function(){var b=a("#"+a(this).attr("aria-controls"));b.length&&(b.is(":visible")?screenMeta.close(b,a(this)):screenMeta.open(b,a(this)))},open:function(b,c){a("#screen-meta-links").find(".screen-meta-toggle").not(c.parent()).css("visibility","hidden"),b.parent().show(),b.slideDown("fast",function(){b.focus(),c.addClass("screen-meta-active").attr("aria-expanded",!0)}),d.trigger("screen:options:open")},close:function(b,c){b.slideUp("fast",function(){c.removeClass("screen-meta-active").attr("aria-expanded",!1),a(".screen-meta-toggle").css("visibility",""),b.parent().hide()}),d.trigger("screen:options:close")}},a(".contextual-help-tabs").delegate("a","click",function(b){var c,d=a(this);return b.preventDefault(),!d.is(".active a")&&(a(".contextual-help-tabs .active").removeClass("active"),d.parent("li").addClass("active"),c=a(d.attr("href")),a(".help-tab-content").not(c).removeClass("active").hide(),void c.addClass("active").show())}),d.ready(function(){function c(){var b=a("a.wp-has-current-submenu");"folded"===x?b.attr("aria-haspopup","true"):b.attr("aria-haspopup","false")}function g(a){var b,c,d,f,g,h,i,j=a.find(".wp-submenu");g=a.offset().top,h=e.scrollTop(),i=g-h-30,b=g+j.height()+1,c=F.height(),d=60+b-c,f=e.height()+h-50,f<b-d&&(d=b-f),d>i&&(d=i),d>1?j.css("margin-top","-"+d+"px"):j.css("margin-top","")}function h(){a(".notice.is-dismissible").each(function(){var b=a(this),c=a('<button type="button" class="notice-dismiss"><span class="screen-reader-text"></span></button>'),d=commonL10n.dismiss||"";c.find(".screen-reader-text").text(d),c.on("click.wp-dismiss-notice",function(a){a.preventDefault(),b.fadeTo(100,0,function(){b.slideUp(100,function(){b.remove()})})}),b.append(c)})}function i(a){var b=e.scrollTop(),c=!a||"scroll"!==a.type;if(!(B||D||G.data("wp-responsive"))){if(S.menu+S.adminbar<S.window||S.menu+S.adminbar+20>S.wpwrap)return void k();if(R=!0,S.menu+S.adminbar>S.window){if(b<0)return void(O||(O=!0,P=!1,E.css({position:"fixed",top:"",bottom:""})));if(b+S.window>d.height()-1)return void(P||(P=!0,O=!1,E.css({position:"fixed",top:"",bottom:0})));b>N?O?(O=!1,Q=E.offset().top-S.adminbar-(b-N),Q+S.menu+S.adminbar<b+S.window&&(Q=b+S.window-S.menu-S.adminbar),E.css({position:"absolute",top:Q,bottom:""})):!P&&E.offset().top+S.menu<b+S.window&&(P=!0,E.css({position:"fixed",top:"",bottom:0})):b<N?P?(P=!1,Q=E.offset().top-S.adminbar+(N-b),Q+S.menu>b+S.window&&(Q=b),E.css({position:"absolute",top:Q,bottom:""})):!O&&E.offset().top>=b+S.adminbar&&(O=!0,E.css({position:"fixed",top:"",bottom:""})):c&&(O=P=!1,Q=b+S.window-S.menu-S.adminbar-1,Q>0?E.css({position:"absolute",top:Q,bottom:""}):k())}N=b}}function j(){S={window:e.height(),wpwrap:F.height(),adminbar:M.height(),menu:E.height()}}function k(){!B&&R&&(O=P=R=!1,E.css({position:"",top:"",bottom:""}))}function l(){j(),G.data("wp-responsive")?(f.removeClass("sticky-menu"),k()):S.menu+S.adminbar>S.window?(i(),f.removeClass("sticky-menu")):(f.addClass("sticky-menu"),k())}function m(){a(".aria-button-if-js").attr("role","button")}function n(){var a=!1;return b.innerWidth&&(a=Math.max(b.innerWidth,document.documentElement.clientWidth)),a}function o(){var a=n()||961;x=a<=782?"responsive":f.hasClass("folded")||f.hasClass("auto-fold")&&a<=960&&a>782?"folded":"open",d.trigger("wp-menu-state-set",{state:x})}var p,q,r,s,t,u,v,w,x,y=!1,z=a("input.current-page"),A=z.val(),B=/iPhone|iPad|iPod/.test(navigator.userAgent),C=navigator.userAgent.indexOf("Android")!==-1,D=a(document.documentElement).hasClass("ie8"),E=a("#adminmenuwrap"),F=a("#wpwrap"),G=a("#adminmenu"),H=a("#wp-responsive-overlay"),I=a("#wp-toolbar"),J=I.find('a[aria-haspopup="true"]'),K=a(".meta-box-sortables"),L=!1,M=a("#wpadminbar"),N=0,O=!1,P=!1,Q=0,R=!1,S={window:e.height(),wpwrap:F.height(),adminbar:M.height(),menu:E.height()},T=a(".wp-header-end");G.on("click.wp-submenu-head",".wp-submenu-head",function(b){a(b.target).parent().siblings("a").get(0).click()}),a("#collapse-button").on("click.collapse-menu",function(){var b=n()||961;a("#adminmenu div.wp-submenu").css("margin-top",""),b<960?f.hasClass("auto-fold")?(f.removeClass("auto-fold").removeClass("folded"),setUserSetting("unfold",1),setUserSetting("mfold","o"),x="open"):(f.addClass("auto-fold"),setUserSetting("unfold",0),x="folded"):f.hasClass("folded")?(f.removeClass("folded"),setUserSetting("mfold","o"),x="open"):(f.addClass("folded"),setUserSetting("mfold","f"),x="folded"),d.trigger("wp-collapse-menu",{state:x})}),d.on("wp-menu-state-set wp-collapse-menu wp-responsive-activate wp-responsive-deactivate",c),("ontouchstart"in b||/IEMobile\/[1-9]/.test(navigator.userAgent))&&(u=B?"touchstart":"click",f.on(u+".wp-mobile-hover",function(b){G.data("wp-responsive")||a(b.target).closest("#adminmenu").length||G.find("li.opensub").removeClass("opensub")}),G.find("a.wp-has-submenu").on(u+".wp-mobile-hover",function(b){var c=a(this).parent();G.data("wp-responsive")||c.hasClass("opensub")||c.hasClass("wp-menu-open")&&!(c.width()<40)||(b.preventDefault(),g(c),G.find("li.opensub").removeClass("opensub"),c.addClass("opensub"))})),B||C||(G.find("li.wp-has-submenu").hoverIntent({over:function(){var b=a(this),c=b.find(".wp-submenu"),d=parseInt(c.css("top"),10);isNaN(d)||d>-5||G.data("wp-responsive")||(g(b),G.find("li.opensub").removeClass("opensub"),b.addClass("opensub"))},out:function(){G.data("wp-responsive")||a(this).removeClass("opensub").find(".wp-submenu").css("margin-top","")},timeout:200,sensitivity:7,interval:90}),G.on("focus.adminmenu",".wp-submenu a",function(b){G.data("wp-responsive")||a(b.target).closest("li.menu-top").addClass("opensub")}).on("blur.adminmenu",".wp-submenu a",function(b){G.data("wp-responsive")||a(b.target).closest("li.menu-top").removeClass("opensub")}).find("li.wp-has-submenu.wp-not-current-submenu").on("focusin.adminmenu",function(){g(a(this))})),T.length||(T=a(".wrap h1, .wrap h2").first()),a("div.updated, div.error, div.notice").not(".inline, .below-h2").insertAfter(T),d.on("wp-updates-notice-added wp-plugin-install-error wp-plugin-update-error wp-plugin-delete-error wp-theme-install-error wp-theme-delete-error",h),screenMeta.init(),f.on("click","tbody > .check-column :checkbox",function(b){if("undefined"==b.shiftKey)return!0;if(b.shiftKey){if(!y)return!0;p=a(y).closest("form").find(":checkbox").filter(":visible:enabled"),q=p.index(y),r=p.index(this),s=a(this).prop("checked"),0<q&&0<r&&q!=r&&(t=r>q?p.slice(q,r):p.slice(r,q),t.prop("checked",function(){return!!a(this).closest("tr").is(":visible")&&s}))}y=this;var c=a(this).closest("tbody").find(":checkbox").filter(":visible:enabled").not(":checked");return a(this).closest("table").children("thead, tfoot").find(":checkbox").prop("checked",function(){return 0===c.length}),!0}),f.on("click.wp-toggle-checkboxes","thead .check-column :checkbox, tfoot .check-column :checkbox",function(b){var c=a(this),d=c.closest("table"),e=c.prop("checked"),f=b.shiftKey||c.data("wp-toggle");d.children("tbody").filter(":visible").children().children(".check-column").find(":checkbox").prop("checked",function(){return!a(this).is(":hidden,:disabled")&&(f?!a(this).prop("checked"):!!e)}),d.children("thead,  tfoot").filter(":visible").children().children(".check-column").find(":checkbox").prop("checked",function(){return!f&&!!e})}),a("#wpbody-content").on({focusin:function(){clearTimeout(v),w=a(this).find(".row-actions"),a(".row-actions").not(this).removeClass("visible"),w.addClass("visible")},focusout:function(){v=setTimeout(function(){w.removeClass("visible")},30)}},".has-row-actions"),a("tbody").on("click",".toggle-row",function(){a(this).closest("tr").toggleClass("is-expanded")}),a("#default-password-nag-no").click(function(){return setUserSetting("default_password_nag","hide"),a("div.default-password-nag").hide(),!1}),a("#newcontent").bind("keydown.wpevent_InsertTab",function(b){var c,d,e,f,g,h=b.target;if(27==b.keyCode)return b.preventDefault(),void a(h).data("tab-out",!0);if(!(9!=b.keyCode||b.ctrlKey||b.altKey||b.shiftKey)){if(a(h).data("tab-out"))return void a(h).data("tab-out",!1);c=h.selectionStart,d=h.selectionEnd,e=h.value,document.selection?(h.focus(),g=document.selection.createRange(),g.text="\t"):c>=0&&(f=this.scrollTop,h.value=e.substring(0,c).concat("\t",e.substring(d)),h.selectionStart=h.selectionEnd=c+1,this.scrollTop=f),b.stopPropagation&&b.stopPropagation(),b.preventDefault&&b.preventDefault()}}),z.length&&z.closest("form").submit(function(){a('select[name="action"]').val()==-1&&a('select[name="action2"]').val()==-1&&z.val()==A&&z.val("1")}),a('.search-box input[type="search"], .search-box input[type="submit"]').mousedown(function(){a('select[name^="action"]').val("-1")}),a("#contextual-help-link, #show-settings-link").on("focus.scroll-into-view",function(a){a.target.scrollIntoView&&a.target.scrollIntoView(!1)}),function(){function b(){c.prop("disabled",""===d.map(function(){return a(this).val()}).get().join(""))}var c,d,e=a("form.wp-upload-form");e.length&&(c=e.find('input[type="submit"]'),d=e.find('input[type="file"]'),b(),d.on("change",b))}(),B||(e.on("scroll.pin-menu",i),d.on("tinymce-editor-init.pin-menu",function(a,b){b.on("wp-autoresize",j)})),b.wpResponsive={init:function(){var c=this;d.on("wp-responsive-activate.wp-responsive",function(){c.activate()}).on("wp-responsive-deactivate.wp-responsive",function(){c.deactivate()}),a("#wp-admin-bar-menu-toggle a").attr("aria-expanded","false"),a("#wp-admin-bar-menu-toggle").on("click.wp-responsive",function(b){b.preventDefault(),M.find(".hover").removeClass("hover"),F.toggleClass("wp-responsive-open"),F.hasClass("wp-responsive-open")?(a(this).find("a").attr("aria-expanded","true"),a("#adminmenu a:first").focus()):a(this).find("a").attr("aria-expanded","false")}),G.on("click.wp-responsive","li.wp-has-submenu > a",function(b){G.data("wp-responsive")&&(a(this).parent("li").toggleClass("selected"),b.preventDefault())}),c.trigger(),d.on("wp-window-resized.wp-responsive",a.proxy(this.trigger,this)),e.on("load.wp-responsive",function(){var a=navigator.userAgent.indexOf("AppleWebKit/")>-1?e.width():b.innerWidth;a<=782&&c.disableSortables()})},activate:function(){l(),f.hasClass("auto-fold")||f.addClass("auto-fold"),G.data("wp-responsive",1),this.disableSortables()},deactivate:function(){l(),G.removeData("wp-responsive"),this.enableSortables()},trigger:function(){var a=n();a&&(a<=782?L||(d.trigger("wp-responsive-activate"),L=!0):L&&(d.trigger("wp-responsive-deactivate"),L=!1),a<=480?this.enableOverlay():this.disableOverlay())},enableOverlay:function(){0===H.length&&(H=a('<div id="wp-responsive-overlay"></div>').insertAfter("#wpcontent").hide().on("click.wp-responsive",function(){I.find(".menupop.hover").removeClass("hover"),a(this).hide()})),J.on("click.wp-responsive",function(){H.show()})},disableOverlay:function(){J.off("click.wp-responsive"),H.hide()},disableSortables:function(){if(K.length)try{K.sortable("disable")}catch(a){}},enableSortables:function(){if(K.length)try{K.sortable("enable")}catch(a){}}},a(document).ajaxComplete(function(){m()}),d.on("wp-window-resized.set-menu-state",o),d.on("wp-menu-state-set wp-collapse-menu",function(b,c){var d=a("#collapse-button"),e="true",f=commonL10n.collapseMenu;"folded"===c.state&&(e="false",f=commonL10n.expandMenu),d.attr({"aria-expanded":e,"aria-label":f})}),b.wpResponsive.init(),l(),o(),c(),h(),m(),d.on("wp-pin-menu wp-window-resized.pin-menu postboxes-columnchange.pin-menu postbox-toggled.pin-menu wp-collapse-menu.pin-menu wp-scroll-start.pin-menu",l),a(".wp-initial-focus").focus()}),function(){function a(){d.trigger("wp-window-resized")}function c(){b.clearTimeout(f),f=b.setTimeout(a,200)}var f;e.on("resize.wp-fire-once",c)}(),function(){if("-ms-user-select"in document.documentElement.style&&navigator.userAgent.match(/IEMobile\/10\.0/)){var a=document.createElement("style");a.appendChild(document.createTextNode("@-ms-viewport{width:auto!important}")),document.getElementsByTagName("head")[0].appendChild(a)}}()}(jQuery,window);
"undefined"!=typeof jQuery?("undefined"==typeof jQuery.fn.hoverIntent&&!function(a){a.fn.hoverIntent=function(b,c,d){var e={interval:100,sensitivity:6,timeout:0};e="object"==typeof b?a.extend(e,b):a.isFunction(c)?a.extend(e,{over:b,out:c,selector:d}):a.extend(e,{over:b,out:b,selector:c});var f,g,h,i,j=function(a){f=a.pageX,g=a.pageY},k=function(b,c){return c.hoverIntent_t=clearTimeout(c.hoverIntent_t),Math.sqrt((h-f)*(h-f)+(i-g)*(i-g))<e.sensitivity?(a(c).off("mousemove.hoverIntent",j),c.hoverIntent_s=!0,e.over.apply(c,[b])):(h=f,i=g,void(c.hoverIntent_t=setTimeout(function(){k(b,c)},e.interval)))},l=function(a,b){return b.hoverIntent_t=clearTimeout(b.hoverIntent_t),b.hoverIntent_s=!1,e.out.apply(b,[a])},m=function(b){var c=a.extend({},b),d=this;d.hoverIntent_t&&(d.hoverIntent_t=clearTimeout(d.hoverIntent_t)),"mouseenter"===b.type?(h=c.pageX,i=c.pageY,a(d).on("mousemove.hoverIntent",j),d.hoverIntent_s||(d.hoverIntent_t=setTimeout(function(){k(c,d)},e.interval))):(a(d).off("mousemove.hoverIntent",j),d.hoverIntent_s&&(d.hoverIntent_t=setTimeout(function(){l(c,d)},e.timeout)))};return this.on({"mouseenter.hoverIntent":m,"mouseleave.hoverIntent":m},e.selector)}}(jQuery),jQuery(document).ready(function(a){var b,c,d,e=a("#wpadminbar"),f=!1;b=function(b,c){var d=a(c),e=d.attr("tabindex");e&&d.attr("tabindex","0").attr("tabindex",e)},c=function(b){e.find("li.menupop").on("click.wp-mobile-hover",function(c){var d=a(this);d.parent().is("#wp-admin-bar-root-default")&&!d.hasClass("hover")?(c.preventDefault(),e.find("li.menupop.hover").removeClass("hover"),d.addClass("hover")):d.hasClass("hover")?a(c.target).closest("div").hasClass("ab-sub-wrapper")||(c.stopPropagation(),c.preventDefault(),d.removeClass("hover")):(c.stopPropagation(),c.preventDefault(),d.addClass("hover")),b&&(a("li.menupop").off("click.wp-mobile-hover"),f=!1)})},d=function(){var b=/Mobile\/.+Safari/.test(navigator.userAgent)?"touchstart":"click";a(document.body).on(b+".wp-mobile-hover",function(b){a(b.target).closest("#wpadminbar").length||e.find("li.menupop.hover").removeClass("hover")})},e.removeClass("nojq").removeClass("nojs"),"ontouchstart"in window?(e.on("touchstart",function(){c(!0),f=!0}),d()):/IEMobile\/[1-9]/.test(navigator.userAgent)&&(c(),d()),e.find("li.menupop").hoverIntent({over:function(){f||a(this).addClass("hover")},out:function(){f||a(this).removeClass("hover")},timeout:180,sensitivity:7,interval:100}),window.location.hash&&window.scrollBy(0,-32),a("#wp-admin-bar-get-shortlink").click(function(b){b.preventDefault(),a(this).addClass("selected").children(".shortlink-input").blur(function(){a(this).parents("#wp-admin-bar-get-shortlink").removeClass("selected")}).focus().select()}),a("#wpadminbar li.menupop > .ab-item").bind("keydown.adminbar",function(c){if(13==c.which){var d=a(c.target),e=d.closest(".ab-sub-wrapper"),f=d.parent().hasClass("hover");c.stopPropagation(),c.preventDefault(),e.length||(e=a("#wpadminbar .quicklinks")),e.find(".menupop").removeClass("hover"),f||d.parent().toggleClass("hover"),d.siblings(".ab-sub-wrapper").find(".ab-item").each(b)}}).each(b),a("#wpadminbar .ab-item").bind("keydown.adminbar",function(c){if(27==c.which){var d=a(c.target);c.stopPropagation(),c.preventDefault(),d.closest(".hover").removeClass("hover").children(".ab-item").focus(),d.siblings(".ab-sub-wrapper").find(".ab-item").each(b)}}),e.click(function(b){"wpadminbar"!=b.target.id&&"wp-admin-bar-top-secondary"!=b.target.id||(e.find("li.menupop.hover").removeClass("hover"),a("html, body").animate({scrollTop:0},"fast"),b.preventDefault())}),a(".screen-reader-shortcut").keydown(function(b){var c,d;13==b.which&&(c=a(this).attr("href"),d=navigator.userAgent.toLowerCase(),d.indexOf("applewebkit")!=-1&&c&&"#"==c.charAt(0)&&setTimeout(function(){a(c).focus()},100))}),a("#adminbar-search").on({focus:function(){a("#adminbarsearch").addClass("adminbar-focused")},blur:function(){a("#adminbarsearch").removeClass("adminbar-focused")}}),"sessionStorage"in window&&a("#wp-admin-bar-logout a").click(function(){try{for(var a in sessionStorage)a.indexOf("wp-autosave-")!=-1&&sessionStorage.removeItem(a)}catch(b){}}),navigator.userAgent&&document.body.className.indexOf("no-font-face")===-1&&/Android (1.0|1.1|1.5|1.6|2.0|2.1)|Nokia|Opera Mini|w(eb)?OSBrowser|webOS|UCWEB|Windows Phone OS 7|XBLWP7|ZuneWP7|MSIE 7/.test(navigator.userAgent)&&(document.body.className+=" no-font-face")})):!function(a,b){var c,d=function(a,b,c){a.addEventListener?a.addEventListener(b,c,!1):a.attachEvent&&a.attachEvent("on"+b,function(){return c.call(a,window.event)})},e=new RegExp("\\bhover\\b","g"),f=[],g=new RegExp("\\bselected\\b","g"),h=function(a){for(var b=f.length;b--;)if(f[b]&&a==f[b][1])return f[b][0];return!1},i=function(b){for(var d,i,j,k,l,m,n=[],o=0;b&&b!=c&&b!=a;)"LI"==b.nodeName.toUpperCase()&&(n[n.length]=b,i=h(b),i&&clearTimeout(i),b.className=b.className?b.className.replace(e,"")+" hover":"hover",k=b),b=b.parentNode;if(k&&k.parentNode&&(l=k.parentNode,l&&"UL"==l.nodeName.toUpperCase()))for(d=l.childNodes.length;d--;)m=l.childNodes[d],m!=k&&(m.className=m.className?m.className.replace(g,""):"");for(d=f.length;d--;){for(j=!1,o=n.length;o--;)n[o]==f[d][1]&&(j=!0);j||(f[d][1].className=f[d][1].className?f[d][1].className.replace(e,""):"")}},j=function(b){for(;b&&b!=c&&b!=a;)"LI"==b.nodeName.toUpperCase()&&!function(a){var b=setTimeout(function(){a.className=a.className?a.className.replace(e,""):""},500);f[f.length]=[b,a]}(b),b=b.parentNode},k=function(b){for(var d,e,f,h=b.target||b.srcElement;;){if(!h||h==a||h==c)return;if(h.id&&"wp-admin-bar-get-shortlink"==h.id)break;h=h.parentNode}for(b.preventDefault&&b.preventDefault(),b.returnValue=!1,-1==h.className.indexOf("selected")&&(h.className+=" selected"),d=0,e=h.childNodes.length;d<e;d++)if(f=h.childNodes[d],f.className&&-1!=f.className.indexOf("shortlink-input")){f.focus(),f.select(),f.onblur=function(){h.className=h.className?h.className.replace(g,""):""};break}return!1},l=function(a){var b,c,d,e,f,g;if(!("wpadminbar"!=a.id&&"wp-admin-bar-top-secondary"!=a.id||(b=window.pageYOffset||document.documentElement.scrollTop||document.body.scrollTop||0,b<1)))for(g=b>800?130:100,c=Math.min(12,Math.round(b/g)),d=b>800?Math.round(b/30):Math.round(b/20),e=[],f=0;b;)b-=d,b<0&&(b=0),e.push(b),setTimeout(function(){window.scrollTo(0,e.shift())},f*c),f++};d(b,"load",function(){c=a.getElementById("wpadminbar"),a.body&&c&&(a.body.appendChild(c),c.className&&(c.className=c.className.replace(/nojs/,"")),d(c,"mouseover",function(a){i(a.target||a.srcElement)}),d(c,"mouseout",function(a){j(a.target||a.srcElement)}),d(c,"click",k),d(c,"click",function(a){l(a.target||a.srcElement)}),d(document.getElementById("wp-admin-bar-logout"),"click",function(){if("sessionStorage"in window)try{for(var a in sessionStorage)a.indexOf("wp-autosave-")!=-1&&sessionStorage.removeItem(a)}catch(b){}})),b.location.hash&&b.scrollBy(0,-32),navigator.userAgent&&document.body.className.indexOf("no-font-face")===-1&&/Android (1.0|1.1|1.5|1.6|2.0|2.1)|Nokia|Opera Mini|w(eb)?OSBrowser|webOS|UCWEB|Windows Phone OS 7|XBLWP7|ZuneWP7|MSIE 7/.test(navigator.userAgent)&&(document.body.className+=" no-font-face")})}(document,window);
/**
 * Attempt to re-color SVG icons used in the admin menu or the toolbar
 *
 */

window.wp = window.wp || {};

wp.svgPainter = ( function( $, window, document, undefined ) {
	'use strict';
	var selector, base64, painter,
		colorscheme = {},
		elements = [];

	$(document).ready( function() {
		// detection for browser SVG capability
		if ( document.implementation.hasFeature( 'http://www.w3.org/TR/SVG11/feature#Image', '1.1' ) ) {
			$( document.body ).removeClass( 'no-svg' ).addClass( 'svg' );
			wp.svgPainter.init();
		}
	});

	/**
	 * Needed only for IE9
	 *
	 * Based on jquery.base64.js 0.0.3 - https://github.com/yckart/jquery.base64.js
	 *
	 * Based on: https://gist.github.com/Yaffle/1284012
	 *
	 * Copyright (c) 2012 Yannick Albert (http://yckart.com)
	 * Licensed under the MIT license
	 * http://www.opensource.org/licenses/mit-license.php
	 */
	base64 = ( function() {
		var c,
			b64 = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789+/',
			a256 = '',
			r64 = [256],
			r256 = [256],
			i = 0;

		function init() {
			while( i < 256 ) {
				c = String.fromCharCode(i);
				a256 += c;
				r256[i] = i;
				r64[i] = b64.indexOf(c);
				++i;
			}
		}

		function code( s, discard, alpha, beta, w1, w2 ) {
			var tmp, length,
				buffer = 0,
				i = 0,
				result = '',
				bitsInBuffer = 0;

			s = String(s);
			length = s.length;

			while( i < length ) {
				c = s.charCodeAt(i);
				c = c < 256 ? alpha[c] : -1;

				buffer = ( buffer << w1 ) + c;
				bitsInBuffer += w1;

				while( bitsInBuffer >= w2 ) {
					bitsInBuffer -= w2;
					tmp = buffer >> bitsInBuffer;
					result += beta.charAt(tmp);
					buffer ^= tmp << bitsInBuffer;
				}
				++i;
			}

			if ( ! discard && bitsInBuffer > 0 ) {
				result += beta.charAt( buffer << ( w2 - bitsInBuffer ) );
			}

			return result;
		}

		function btoa( plain ) {
			if ( ! c ) {
				init();
			}

			plain = code( plain, false, r256, b64, 8, 6 );
			return plain + '===='.slice( ( plain.length % 4 ) || 4 );
		}

		function atob( coded ) {
			var i;

			if ( ! c ) {
				init();
			}

			coded = coded.replace( /[^A-Za-z0-9\+\/\=]/g, '' );
			coded = String(coded).split('=');
			i = coded.length;

			do {
				--i;
				coded[i] = code( coded[i], true, r64, a256, 6, 8 );
			} while ( i > 0 );

			coded = coded.join('');
			return coded;
		}

		return {
			atob: atob,
			btoa: btoa
		};
	})();

	return {
		init: function() {
			painter = this;
			selector = $( '#adminmenu .wp-menu-image, #wpadminbar .ab-item' );

			this.setColors();
			this.findElements();
			this.paint();
		},

		setColors: function( colors ) {
			if ( typeof colors === 'undefined' && typeof window._wpColorScheme !== 'undefined' ) {
				colors = window._wpColorScheme;
			}

			if ( colors && colors.icons && colors.icons.base && colors.icons.current && colors.icons.focus ) {
				colorscheme = colors.icons;
			}
		},

		findElements: function() {
			selector.each( function() {
				var $this = $(this), bgImage = $this.css( 'background-image' );

				if ( bgImage && bgImage.indexOf( 'data:image/svg+xml;base64' ) != -1 ) {
					elements.push( $this );
				}
			});
		},

		paint: function() {
			// loop through all elements
			$.each( elements, function( index, $element ) {
				var $menuitem = $element.parent().parent();

				if ( $menuitem.hasClass( 'current' ) || $menuitem.hasClass( 'wp-has-current-submenu' ) ) {
					// paint icon in 'current' color
					painter.paintElement( $element, 'current' );
				} else {
					// paint icon in base color
					painter.paintElement( $element, 'base' );

					// set hover callbacks
					$menuitem.hover(
						function() {
							painter.paintElement( $element, 'focus' );
						},
						function() {
							// Match the delay from hoverIntent
							window.setTimeout( function() {
								painter.paintElement( $element, 'base' );
							}, 100 );
						}
					);
				}
			});
		},

		paintElement: function( $element, colorType ) {
			var xml, encoded, color;

			if ( ! colorType || ! colorscheme.hasOwnProperty( colorType ) ) {
				return;
			}

			color = colorscheme[ colorType ];

			// only accept hex colors: #101 or #101010
			if ( ! color.match( /^(#[0-9a-f]{3}|#[0-9a-f]{6})$/i ) ) {
				return;
			}

			xml = $element.data( 'wp-ui-svg-' + color );

			if ( xml === 'none' ) {
				return;
			}

			if ( ! xml ) {
				encoded = $element.css( 'background-image' ).match( /.+data:image\/svg\+xml;base64,([A-Za-z0-9\+\/\=]+)/ );

				if ( ! encoded || ! encoded[1] ) {
					$element.data( 'wp-ui-svg-' + color, 'none' );
					return;
				}

				try {
					if ( 'atob' in window ) {
						xml = window.atob( encoded[1] );
					} else {
						xml = base64.atob( encoded[1] );
					}
				} catch ( error ) {}

				if ( xml ) {
					// replace `fill` attributes
					xml = xml.replace( /fill="(.+?)"/g, 'fill="' + color + '"');

					// replace `style` attributes
					xml = xml.replace( /style="(.+?)"/g, 'style="fill:' + color + '"');

					// replace `fill` properties in `<style>` tags
					xml = xml.replace( /fill:.*?;/g, 'fill: ' + color + ';');

					if ( 'btoa' in window ) {
						xml = window.btoa( xml );
					} else {
						xml = base64.btoa( xml );
					}

					$element.data( 'wp-ui-svg-' + color, xml );
				} else {
					$element.data( 'wp-ui-svg-' + color, 'none' );
					return;
				}
			}

			$element.attr( 'style', 'background-image: url("data:image/svg+xml;base64,' + xml + '") !important;' );
		}
	};

})( jQuery, window, document );

!function(a,b,c){var d=function(){function d(){var c,d,f,h;"string"==typeof b.pagenow&&(z.screenId=b.pagenow),"string"==typeof b.ajaxurl&&(z.url=b.ajaxurl),"object"==typeof b.heartbeatSettings&&(c=b.heartbeatSettings,!z.url&&c.ajaxurl&&(z.url=c.ajaxurl),c.interval&&(z.mainInterval=c.interval,z.mainInterval<15?z.mainInterval=15:z.mainInterval>120&&(z.mainInterval=120)),c.minimalInterval&&(c.minimalInterval=parseInt(c.minimalInterval,10),z.minimalInterval=c.minimalInterval>0&&c.minimalInterval<=600?1e3*c.minimalInterval:0),z.minimalInterval&&z.mainInterval<z.minimalInterval&&(z.mainInterval=z.minimalInterval),z.screenId||(z.screenId=c.screenId||"front"),"disable"===c.suspension&&(z.suspendEnabled=!1)),z.mainInterval=1e3*z.mainInterval,z.originalInterval=z.mainInterval,"undefined"!=typeof document.hidden?(d="hidden",h="visibilitychange",f="visibilityState"):"undefined"!=typeof document.msHidden?(d="msHidden",h="msvisibilitychange",f="msVisibilityState"):"undefined"!=typeof document.webkitHidden&&(d="webkitHidden",h="webkitvisibilitychange",f="webkitVisibilityState"),d&&(document[d]&&(z.hasFocus=!1),y.on(h+".wp-heartbeat",function(){"hidden"===document[f]?(l(),b.clearInterval(z.checkFocusTimer)):(m(),document.hasFocus&&(z.checkFocusTimer=b.setInterval(g,1e4)))})),document.hasFocus&&(z.checkFocusTimer=b.setInterval(g,1e4)),a(b).on("unload.wp-heartbeat",function(){z.suspend=!0,z.xhr&&4!==z.xhr.readyState&&z.xhr.abort()}),b.setInterval(o,3e4),y.ready(function(){z.lastTick=e(),k()})}function e(){return(new Date).getTime()}function f(a){var c,d=a.src;if(d&&/^https?:\/\//.test(d)&&(c=b.location.origin?b.location.origin:b.location.protocol+"//"+b.location.host,0!==d.indexOf(c)))return!1;try{if(a.contentWindow.document)return!0}catch(e){}return!1}function g(){z.hasFocus&&!document.hasFocus()?l():!z.hasFocus&&document.hasFocus()&&m()}function h(a,b){var c;if(a){switch(a){case"abort":break;case"timeout":c=!0;break;case"error":if(503===b&&z.hasConnected){c=!0;break}case"parsererror":case"empty":case"unknown":z.errorcount++,z.errorcount>2&&z.hasConnected&&(c=!0)}c&&!q()&&(z.connectionError=!0,y.trigger("heartbeat-connection-lost",[a,b]))}}function i(){z.hasConnected=!0,q()&&(z.errorcount=0,z.connectionError=!1,y.trigger("heartbeat-connection-restored"))}function j(){var c,d;z.connecting||z.suspend||(z.lastTick=e(),d=a.extend({},z.queue),z.queue={},y.trigger("heartbeat-send",[d]),c={data:d,interval:z.tempInterval?z.tempInterval/1e3:z.mainInterval/1e3,_nonce:"object"==typeof b.heartbeatSettings?b.heartbeatSettings.nonce:"",action:"heartbeat",screen_id:z.screenId,has_focus:z.hasFocus},z.connecting=!0,z.xhr=a.ajax({url:z.url,type:"post",timeout:3e4,data:c,dataType:"json"}).always(function(){z.connecting=!1,k()}).done(function(a,b,c){var d;return a?(i(),a.nonces_expired&&y.trigger("heartbeat-nonces-expired"),a.heartbeat_interval&&(d=a.heartbeat_interval,delete a.heartbeat_interval),y.trigger("heartbeat-tick",[a,b,c]),void(d&&t(d))):void h("empty")}).fail(function(a,b,c){h(b||"unknown",a.status),y.trigger("heartbeat-error",[a,b,c])}))}function k(){var a=e()-z.lastTick,c=z.mainInterval;z.suspend||(z.hasFocus?z.countdown>0&&z.tempInterval&&(c=z.tempInterval,z.countdown--,z.countdown<1&&(z.tempInterval=0)):c=12e4,z.minimalInterval&&c<z.minimalInterval&&(c=z.minimalInterval),b.clearTimeout(z.beatTimer),a<c?z.beatTimer=b.setTimeout(function(){j()},c-a):j())}function l(){z.hasFocus=!1}function m(){z.userActivity=e(),z.suspend=!1,z.hasFocus||(z.hasFocus=!0,k())}function n(){z.userActivityEvents=!1,y.off(".wp-heartbeat-active"),a("iframe").each(function(b,c){f(c)&&a(c.contentWindow).off(".wp-heartbeat-active")}),m()}function o(){var b=z.userActivity?e()-z.userActivity:0;b>3e5&&z.hasFocus&&l(),(z.suspendEnabled&&b>6e5||b>36e5)&&(z.suspend=!0),z.userActivityEvents||(y.on("mouseover.wp-heartbeat-active keyup.wp-heartbeat-active touchend.wp-heartbeat-active",function(){n()}),a("iframe").each(function(b,c){f(c)&&a(c.contentWindow).on("mouseover.wp-heartbeat-active keyup.wp-heartbeat-active touchend.wp-heartbeat-active",function(){n()})}),z.userActivityEvents=!0)}function p(){return z.hasFocus}function q(){return z.connectionError}function r(){z.lastTick=0,k()}function s(){z.suspendEnabled=!1}function t(a,b){var c,d=z.tempInterval?z.tempInterval:z.mainInterval;if(a){switch(a){case"fast":case 5:c=5e3;break;case 15:c=15e3;break;case 30:c=3e4;break;case 60:c=6e4;break;case 120:c=12e4;break;case"long-polling":return z.mainInterval=0,0;default:c=z.originalInterval}z.minimalInterval&&c<z.minimalInterval&&(c=z.minimalInterval),5e3===c?(b=parseInt(b,10)||30,b=b<1||b>30?30:b,z.countdown=b,z.tempInterval=c):(z.countdown=0,z.tempInterval=0,z.mainInterval=c),c!==d&&k()}return z.tempInterval?z.tempInterval/1e3:z.mainInterval/1e3}function u(a,b,c){return!!a&&((!c||!this.isQueued(a))&&(z.queue[a]=b,!0))}function v(a){if(a)return z.queue.hasOwnProperty(a)}function w(a){a&&delete z.queue[a]}function x(a){if(a)return this.isQueued(a)?z.queue[a]:c}var y=a(document),z={suspend:!1,suspendEnabled:!0,screenId:"",url:"",lastTick:0,queue:{},mainInterval:60,tempInterval:0,originalInterval:0,minimalInterval:0,countdown:0,connecting:!1,connectionError:!1,errorcount:0,hasConnected:!1,hasFocus:!0,userActivity:0,userActivityEvents:!1,checkFocusTimer:0,beatTimer:0};return d(),{hasFocus:p,connectNow:r,disableSuspend:s,interval:t,hasConnectionError:q,enqueue:u,dequeue:w,isQueued:v,getQueuedItem:x}};b.wp=b.wp||{},b.wp.heartbeat=new d}(jQuery,window);
!function(a){function b(){var b,d=a("#wp-auth-check"),f=a("#wp-auth-check-form"),g=e.find(".wp-auth-fallback-expired"),h=!1;f.length&&(a(window).on("beforeunload.wp-auth-check",function(a){a.originalEvent.returnValue=window.authcheckL10n.beforeunload}),b=a('<iframe id="wp-auth-check-frame" frameborder="0">').attr("title",g.text()),b.on("load",function(){var b,i;h=!0,f.removeClass("loading");try{i=a(this).contents().find("body"),b=i.height()}catch(j){return e.addClass("fallback"),d.css("max-height",""),f.remove(),void g.focus()}b?i&&i.hasClass("interim-login-success")?c():d.css("max-height",b+40+"px"):i&&i.length||(e.addClass("fallback"),d.css("max-height",""),f.remove(),g.focus())}).attr("src",f.data("src")),f.append(b)),a("body").addClass("modal-open"),e.removeClass("hidden"),b?(b.focus(),setTimeout(function(){h||(e.addClass("fallback"),f.remove(),g.focus())},1e4)):g.focus()}function c(){a(window).off("beforeunload.wp-auth-check"),"undefined"==typeof adminpage||"post-php"!==adminpage&&"post-new-php"!==adminpage||"undefined"==typeof wp||!wp.heartbeat||(a(document).off("heartbeat-tick.wp-auth-check"),wp.heartbeat.connectNow()),e.fadeOut(200,function(){e.addClass("hidden").css("display",""),a("#wp-auth-check-frame").remove(),a("body").removeClass("modal-open")})}function d(){var a=parseInt(window.authcheckL10n.interval,10)||180;f=(new Date).getTime()+1e3*a}var e,f;a(document).on("heartbeat-tick.wp-auth-check",function(a,f){"wp-auth-check"in f&&(d(),!f["wp-auth-check"]&&e.hasClass("hidden")?b():f["wp-auth-check"]&&!e.hasClass("hidden")&&c())}).on("heartbeat-send.wp-auth-check",function(a,b){(new Date).getTime()>f&&(b["wp-auth-check"]=!0)}).ready(function(){d(),e=a("#wp-auth-check-wrap"),e.find(".wp-auth-check-close").on("click",function(){c()})})}(jQuery);
/*!
 * jQuery UI Core 1.11.4
 * http://jqueryui.com
 *
 * Copyright jQuery Foundation and other contributors
 * Released under the MIT license.
 * http://jquery.org/license
 *
 * http://api.jqueryui.com/category/ui-core/
 */
!function(a){"function"==typeof define&&define.amd?define(["jquery"],a):a(jQuery)}(function(a){function b(b,d){var e,f,g,h=b.nodeName.toLowerCase();return"area"===h?(e=b.parentNode,f=e.name,!(!b.href||!f||"map"!==e.nodeName.toLowerCase())&&(g=a("img[usemap='#"+f+"']")[0],!!g&&c(g))):(/^(input|select|textarea|button|object)$/.test(h)?!b.disabled:"a"===h?b.href||d:d)&&c(b)}function c(b){return a.expr.filters.visible(b)&&!a(b).parents().addBack().filter(function(){return"hidden"===a.css(this,"visibility")}).length}a.ui=a.ui||{},a.extend(a.ui,{version:"1.11.4",keyCode:{BACKSPACE:8,COMMA:188,DELETE:46,DOWN:40,END:35,ENTER:13,ESCAPE:27,HOME:36,LEFT:37,PAGE_DOWN:34,PAGE_UP:33,PERIOD:190,RIGHT:39,SPACE:32,TAB:9,UP:38}}),a.fn.extend({scrollParent:function(b){var c=this.css("position"),d="absolute"===c,e=b?/(auto|scroll|hidden)/:/(auto|scroll)/,f=this.parents().filter(function(){var b=a(this);return(!d||"static"!==b.css("position"))&&e.test(b.css("overflow")+b.css("overflow-y")+b.css("overflow-x"))}).eq(0);return"fixed"!==c&&f.length?f:a(this[0].ownerDocument||document)},uniqueId:function(){var a=0;return function(){return this.each(function(){this.id||(this.id="ui-id-"+ ++a)})}}(),removeUniqueId:function(){return this.each(function(){/^ui-id-\d+$/.test(this.id)&&a(this).removeAttr("id")})}}),a.extend(a.expr[":"],{data:a.expr.createPseudo?a.expr.createPseudo(function(b){return function(c){return!!a.data(c,b)}}):function(b,c,d){return!!a.data(b,d[3])},focusable:function(c){return b(c,!isNaN(a.attr(c,"tabindex")))},tabbable:function(c){var d=a.attr(c,"tabindex"),e=isNaN(d);return(e||d>=0)&&b(c,!e)}}),a("<a>").outerWidth(1).jquery||a.each(["Width","Height"],function(b,c){function d(b,c,d,f){return a.each(e,function(){c-=parseFloat(a.css(b,"padding"+this))||0,d&&(c-=parseFloat(a.css(b,"border"+this+"Width"))||0),f&&(c-=parseFloat(a.css(b,"margin"+this))||0)}),c}var e="Width"===c?["Left","Right"]:["Top","Bottom"],f=c.toLowerCase(),g={innerWidth:a.fn.innerWidth,innerHeight:a.fn.innerHeight,outerWidth:a.fn.outerWidth,outerHeight:a.fn.outerHeight};a.fn["inner"+c]=function(b){return void 0===b?g["inner"+c].call(this):this.each(function(){a(this).css(f,d(this,b)+"px")})},a.fn["outer"+c]=function(b,e){return"number"!=typeof b?g["outer"+c].call(this,b):this.each(function(){a(this).css(f,d(this,b,!0,e)+"px")})}}),a.fn.addBack||(a.fn.addBack=function(a){return this.add(null==a?this.prevObject:this.prevObject.filter(a))}),a("<a>").data("a-b","a").removeData("a-b").data("a-b")&&(a.fn.removeData=function(b){return function(c){return arguments.length?b.call(this,a.camelCase(c)):b.call(this)}}(a.fn.removeData)),a.ui.ie=!!/msie [\w.]+/.exec(navigator.userAgent.toLowerCase()),a.fn.extend({focus:function(b){return function(c,d){return"number"==typeof c?this.each(function(){var b=this;setTimeout(function(){a(b).focus(),d&&d.call(b)},c)}):b.apply(this,arguments)}}(a.fn.focus),disableSelection:function(){var a="onselectstart"in document.createElement("div")?"selectstart":"mousedown";return function(){return this.bind(a+".ui-disableSelection",function(a){a.preventDefault()})}}(),enableSelection:function(){return this.unbind(".ui-disableSelection")},zIndex:function(b){if(void 0!==b)return this.css("zIndex",b);if(this.length)for(var c,d,e=a(this[0]);e.length&&e[0]!==document;){if(c=e.css("position"),("absolute"===c||"relative"===c||"fixed"===c)&&(d=parseInt(e.css("zIndex"),10),!isNaN(d)&&0!==d))return d;e=e.parent()}return 0}}),a.ui.plugin={add:function(b,c,d){var e,f=a.ui[b].prototype;for(e in d)f.plugins[e]=f.plugins[e]||[],f.plugins[e].push([c,d[e]])},call:function(a,b,c,d){var e,f=a.plugins[b];if(f&&(d||a.element[0].parentNode&&11!==a.element[0].parentNode.nodeType))for(e=0;e<f.length;e++)a.options[f[e][0]]&&f[e][1].apply(a.element,c)}}});
/*!
 * jQuery UI Widget 1.11.4
 * http://jqueryui.com
 *
 * Copyright jQuery Foundation and other contributors
 * Released under the MIT license.
 * http://jquery.org/license
 *
 * http://api.jqueryui.com/jQuery.widget/
 */
!function(a){"function"==typeof define&&define.amd?define(["jquery"],a):a(jQuery)}(function(a){var b=0,c=Array.prototype.slice;return a.cleanData=function(b){return function(c){var d,e,f;for(f=0;null!=(e=c[f]);f++)try{d=a._data(e,"events"),d&&d.remove&&a(e).triggerHandler("remove")}catch(g){}b(c)}}(a.cleanData),a.widget=function(b,c,d){var e,f,g,h,i={},j=b.split(".")[0];return b=b.split(".")[1],e=j+"-"+b,d||(d=c,c=a.Widget),a.expr[":"][e.toLowerCase()]=function(b){return!!a.data(b,e)},a[j]=a[j]||{},f=a[j][b],g=a[j][b]=function(a,b){return this._createWidget?void(arguments.length&&this._createWidget(a,b)):new g(a,b)},a.extend(g,f,{version:d.version,_proto:a.extend({},d),_childConstructors:[]}),h=new c,h.options=a.widget.extend({},h.options),a.each(d,function(b,d){return a.isFunction(d)?void(i[b]=function(){var a=function(){return c.prototype[b].apply(this,arguments)},e=function(a){return c.prototype[b].apply(this,a)};return function(){var b,c=this._super,f=this._superApply;return this._super=a,this._superApply=e,b=d.apply(this,arguments),this._super=c,this._superApply=f,b}}()):void(i[b]=d)}),g.prototype=a.widget.extend(h,{widgetEventPrefix:f?h.widgetEventPrefix||b:b},i,{constructor:g,namespace:j,widgetName:b,widgetFullName:e}),f?(a.each(f._childConstructors,function(b,c){var d=c.prototype;a.widget(d.namespace+"."+d.widgetName,g,c._proto)}),delete f._childConstructors):c._childConstructors.push(g),a.widget.bridge(b,g),g},a.widget.extend=function(b){for(var d,e,f=c.call(arguments,1),g=0,h=f.length;g<h;g++)for(d in f[g])e=f[g][d],f[g].hasOwnProperty(d)&&void 0!==e&&(a.isPlainObject(e)?b[d]=a.isPlainObject(b[d])?a.widget.extend({},b[d],e):a.widget.extend({},e):b[d]=e);return b},a.widget.bridge=function(b,d){var e=d.prototype.widgetFullName||b;a.fn[b]=function(f){var g="string"==typeof f,h=c.call(arguments,1),i=this;return g?this.each(function(){var c,d=a.data(this,e);return"instance"===f?(i=d,!1):d?a.isFunction(d[f])&&"_"!==f.charAt(0)?(c=d[f].apply(d,h),c!==d&&void 0!==c?(i=c&&c.jquery?i.pushStack(c.get()):c,!1):void 0):a.error("no such method '"+f+"' for "+b+" widget instance"):a.error("cannot call methods on "+b+" prior to initialization; attempted to call method '"+f+"'")}):(h.length&&(f=a.widget.extend.apply(null,[f].concat(h))),this.each(function(){var b=a.data(this,e);b?(b.option(f||{}),b._init&&b._init()):a.data(this,e,new d(f,this))})),i}},a.Widget=function(){},a.Widget._childConstructors=[],a.Widget.prototype={widgetName:"widget",widgetEventPrefix:"",defaultElement:"<div>",options:{disabled:!1,create:null},_createWidget:function(c,d){d=a(d||this.defaultElement||this)[0],this.element=a(d),this.uuid=b++,this.eventNamespace="."+this.widgetName+this.uuid,this.bindings=a(),this.hoverable=a(),this.focusable=a(),d!==this&&(a.data(d,this.widgetFullName,this),this._on(!0,this.element,{remove:function(a){a.target===d&&this.destroy()}}),this.document=a(d.style?d.ownerDocument:d.document||d),this.window=a(this.document[0].defaultView||this.document[0].parentWindow)),this.options=a.widget.extend({},this.options,this._getCreateOptions(),c),this._create(),this._trigger("create",null,this._getCreateEventData()),this._init()},_getCreateOptions:a.noop,_getCreateEventData:a.noop,_create:a.noop,_init:a.noop,destroy:function(){this._destroy(),this.element.unbind(this.eventNamespace).removeData(this.widgetFullName).removeData(a.camelCase(this.widgetFullName)),this.widget().unbind(this.eventNamespace).removeAttr("aria-disabled").removeClass(this.widgetFullName+"-disabled ui-state-disabled"),this.bindings.unbind(this.eventNamespace),this.hoverable.removeClass("ui-state-hover"),this.focusable.removeClass("ui-state-focus")},_destroy:a.noop,widget:function(){return this.element},option:function(b,c){var d,e,f,g=b;if(0===arguments.length)return a.widget.extend({},this.options);if("string"==typeof b)if(g={},d=b.split("."),b=d.shift(),d.length){for(e=g[b]=a.widget.extend({},this.options[b]),f=0;f<d.length-1;f++)e[d[f]]=e[d[f]]||{},e=e[d[f]];if(b=d.pop(),1===arguments.length)return void 0===e[b]?null:e[b];e[b]=c}else{if(1===arguments.length)return void 0===this.options[b]?null:this.options[b];g[b]=c}return this._setOptions(g),this},_setOptions:function(a){var b;for(b in a)this._setOption(b,a[b]);return this},_setOption:function(a,b){return this.options[a]=b,"disabled"===a&&(this.widget().toggleClass(this.widgetFullName+"-disabled",!!b),b&&(this.hoverable.removeClass("ui-state-hover"),this.focusable.removeClass("ui-state-focus"))),this},enable:function(){return this._setOptions({disabled:!1})},disable:function(){return this._setOptions({disabled:!0})},_on:function(b,c,d){var e,f=this;"boolean"!=typeof b&&(d=c,c=b,b=!1),d?(c=e=a(c),this.bindings=this.bindings.add(c)):(d=c,c=this.element,e=this.widget()),a.each(d,function(d,g){function h(){if(b||f.options.disabled!==!0&&!a(this).hasClass("ui-state-disabled"))return("string"==typeof g?f[g]:g).apply(f,arguments)}"string"!=typeof g&&(h.guid=g.guid=g.guid||h.guid||a.guid++);var i=d.match(/^([\w:-]*)\s*(.*)$/),j=i[1]+f.eventNamespace,k=i[2];k?e.delegate(k,j,h):c.bind(j,h)})},_off:function(b,c){c=(c||"").split(" ").join(this.eventNamespace+" ")+this.eventNamespace,b.unbind(c).undelegate(c),this.bindings=a(this.bindings.not(b).get()),this.focusable=a(this.focusable.not(b).get()),this.hoverable=a(this.hoverable.not(b).get())},_delay:function(a,b){function c(){return("string"==typeof a?d[a]:a).apply(d,arguments)}var d=this;return setTimeout(c,b||0)},_hoverable:function(b){this.hoverable=this.hoverable.add(b),this._on(b,{mouseenter:function(b){a(b.currentTarget).addClass("ui-state-hover")},mouseleave:function(b){a(b.currentTarget).removeClass("ui-state-hover")}})},_focusable:function(b){this.focusable=this.focusable.add(b),this._on(b,{focusin:function(b){a(b.currentTarget).addClass("ui-state-focus")},focusout:function(b){a(b.currentTarget).removeClass("ui-state-focus")}})},_trigger:function(b,c,d){var e,f,g=this.options[b];if(d=d||{},c=a.Event(c),c.type=(b===this.widgetEventPrefix?b:this.widgetEventPrefix+b).toLowerCase(),c.target=this.element[0],f=c.originalEvent)for(e in f)e in c||(c[e]=f[e]);return this.element.trigger(c,d),!(a.isFunction(g)&&g.apply(this.element[0],[c].concat(d))===!1||c.isDefaultPrevented())}},a.each({show:"fadeIn",hide:"fadeOut"},function(b,c){a.Widget.prototype["_"+b]=function(d,e,f){"string"==typeof e&&(e={effect:e});var g,h=e?e===!0||"number"==typeof e?c:e.effect||c:b;e=e||{},"number"==typeof e&&(e={duration:e}),g=!a.isEmptyObject(e),e.complete=f,e.delay&&d.delay(e.delay),g&&a.effects&&a.effects.effect[h]?d[b](e):h!==b&&d[h]?d[h](e.duration,e.easing,f):d.queue(function(c){a(this)[b](),f&&f.call(d[0]),c()})}}),a.widget});
/*!
 * jQuery UI Tabs 1.11.4
 * http://jqueryui.com
 *
 * Copyright jQuery Foundation and other contributors
 * Released under the MIT license.
 * http://jquery.org/license
 *
 * http://api.jqueryui.com/tabs/
 */
!function(a){"function"==typeof define&&define.amd?define(["jquery","./core","./widget"],a):a(jQuery)}(function(a){return a.widget("ui.tabs",{version:"1.11.4",delay:300,options:{active:null,collapsible:!1,event:"click",heightStyle:"content",hide:null,show:null,activate:null,beforeActivate:null,beforeLoad:null,load:null},_isLocal:function(){var a=/#.*$/;return function(b){var c,d;b=b.cloneNode(!1),c=b.href.replace(a,""),d=location.href.replace(a,"");try{c=decodeURIComponent(c)}catch(e){}try{d=decodeURIComponent(d)}catch(e){}return b.hash.length>1&&c===d}}(),_create:function(){var b=this,c=this.options;this.running=!1,this.element.addClass("ui-tabs ui-widget ui-widget-content ui-corner-all").toggleClass("ui-tabs-collapsible",c.collapsible),this._processTabs(),c.active=this._initialActive(),a.isArray(c.disabled)&&(c.disabled=a.unique(c.disabled.concat(a.map(this.tabs.filter(".ui-state-disabled"),function(a){return b.tabs.index(a)}))).sort()),this.options.active!==!1&&this.anchors.length?this.active=this._findActive(c.active):this.active=a(),this._refresh(),this.active.length&&this.load(c.active)},_initialActive:function(){var b=this.options.active,c=this.options.collapsible,d=location.hash.substring(1);return null===b&&(d&&this.tabs.each(function(c,e){if(a(e).attr("aria-controls")===d)return b=c,!1}),null===b&&(b=this.tabs.index(this.tabs.filter(".ui-tabs-active"))),null!==b&&b!==-1||(b=!!this.tabs.length&&0)),b!==!1&&(b=this.tabs.index(this.tabs.eq(b)),b===-1&&(b=!c&&0)),!c&&b===!1&&this.anchors.length&&(b=0),b},_getCreateEventData:function(){return{tab:this.active,panel:this.active.length?this._getPanelForTab(this.active):a()}},_tabKeydown:function(b){var c=a(this.document[0].activeElement).closest("li"),d=this.tabs.index(c),e=!0;if(!this._handlePageNav(b)){switch(b.keyCode){case a.ui.keyCode.RIGHT:case a.ui.keyCode.DOWN:d++;break;case a.ui.keyCode.UP:case a.ui.keyCode.LEFT:e=!1,d--;break;case a.ui.keyCode.END:d=this.anchors.length-1;break;case a.ui.keyCode.HOME:d=0;break;case a.ui.keyCode.SPACE:return b.preventDefault(),clearTimeout(this.activating),void this._activate(d);case a.ui.keyCode.ENTER:return b.preventDefault(),clearTimeout(this.activating),void this._activate(d!==this.options.active&&d);default:return}b.preventDefault(),clearTimeout(this.activating),d=this._focusNextTab(d,e),b.ctrlKey||b.metaKey||(c.attr("aria-selected","false"),this.tabs.eq(d).attr("aria-selected","true"),this.activating=this._delay(function(){this.option("active",d)},this.delay))}},_panelKeydown:function(b){this._handlePageNav(b)||b.ctrlKey&&b.keyCode===a.ui.keyCode.UP&&(b.preventDefault(),this.active.focus())},_handlePageNav:function(b){return b.altKey&&b.keyCode===a.ui.keyCode.PAGE_UP?(this._activate(this._focusNextTab(this.options.active-1,!1)),!0):b.altKey&&b.keyCode===a.ui.keyCode.PAGE_DOWN?(this._activate(this._focusNextTab(this.options.active+1,!0)),!0):void 0},_findNextTab:function(b,c){function d(){return b>e&&(b=0),b<0&&(b=e),b}for(var e=this.tabs.length-1;a.inArray(d(),this.options.disabled)!==-1;)b=c?b+1:b-1;return b},_focusNextTab:function(a,b){return a=this._findNextTab(a,b),this.tabs.eq(a).focus(),a},_setOption:function(a,b){return"active"===a?void this._activate(b):"disabled"===a?void this._setupDisabled(b):(this._super(a,b),"collapsible"===a&&(this.element.toggleClass("ui-tabs-collapsible",b),b||this.options.active!==!1||this._activate(0)),"event"===a&&this._setupEvents(b),void("heightStyle"===a&&this._setupHeightStyle(b)))},_sanitizeSelector:function(a){return a?a.replace(/[!"$%&'()*+,.\/:;<=>?@\[\]\^`{|}~]/g,"\\$&"):""},refresh:function(){var b=this.options,c=this.tablist.children(":has(a[href])");b.disabled=a.map(c.filter(".ui-state-disabled"),function(a){return c.index(a)}),this._processTabs(),b.active!==!1&&this.anchors.length?this.active.length&&!a.contains(this.tablist[0],this.active[0])?this.tabs.length===b.disabled.length?(b.active=!1,this.active=a()):this._activate(this._findNextTab(Math.max(0,b.active-1),!1)):b.active=this.tabs.index(this.active):(b.active=!1,this.active=a()),this._refresh()},_refresh:function(){this._setupDisabled(this.options.disabled),this._setupEvents(this.options.event),this._setupHeightStyle(this.options.heightStyle),this.tabs.not(this.active).attr({"aria-selected":"false","aria-expanded":"false",tabIndex:-1}),this.panels.not(this._getPanelForTab(this.active)).hide().attr({"aria-hidden":"true"}),this.active.length?(this.active.addClass("ui-tabs-active ui-state-active").attr({"aria-selected":"true","aria-expanded":"true",tabIndex:0}),this._getPanelForTab(this.active).show().attr({"aria-hidden":"false"})):this.tabs.eq(0).attr("tabIndex",0)},_processTabs:function(){var b=this,c=this.tabs,d=this.anchors,e=this.panels;this.tablist=this._getList().addClass("ui-tabs-nav ui-helper-reset ui-helper-clearfix ui-widget-header ui-corner-all").attr("role","tablist").delegate("> li","mousedown"+this.eventNamespace,function(b){a(this).is(".ui-state-disabled")&&b.preventDefault()}).delegate(".ui-tabs-anchor","focus"+this.eventNamespace,function(){a(this).closest("li").is(".ui-state-disabled")&&this.blur()}),this.tabs=this.tablist.find("> li:has(a[href])").addClass("ui-state-default ui-corner-top").attr({role:"tab",tabIndex:-1}),this.anchors=this.tabs.map(function(){return a("a",this)[0]}).addClass("ui-tabs-anchor").attr({role:"presentation",tabIndex:-1}),this.panels=a(),this.anchors.each(function(c,d){var e,f,g,h=a(d).uniqueId().attr("id"),i=a(d).closest("li"),j=i.attr("aria-controls");b._isLocal(d)?(e=d.hash,g=e.substring(1),f=b.element.find(b._sanitizeSelector(e))):(g=i.attr("aria-controls")||a({}).uniqueId()[0].id,e="#"+g,f=b.element.find(e),f.length||(f=b._createPanel(g),f.insertAfter(b.panels[c-1]||b.tablist)),f.attr("aria-live","polite")),f.length&&(b.panels=b.panels.add(f)),j&&i.data("ui-tabs-aria-controls",j),i.attr({"aria-controls":g,"aria-labelledby":h}),f.attr("aria-labelledby",h)}),this.panels.addClass("ui-tabs-panel ui-widget-content ui-corner-bottom").attr("role","tabpanel"),c&&(this._off(c.not(this.tabs)),this._off(d.not(this.anchors)),this._off(e.not(this.panels)))},_getList:function(){return this.tablist||this.element.find("ol,ul").eq(0)},_createPanel:function(b){return a("<div>").attr("id",b).addClass("ui-tabs-panel ui-widget-content ui-corner-bottom").data("ui-tabs-destroy",!0)},_setupDisabled:function(b){a.isArray(b)&&(b.length?b.length===this.anchors.length&&(b=!0):b=!1);for(var c,d=0;c=this.tabs[d];d++)b===!0||a.inArray(d,b)!==-1?a(c).addClass("ui-state-disabled").attr("aria-disabled","true"):a(c).removeClass("ui-state-disabled").removeAttr("aria-disabled");this.options.disabled=b},_setupEvents:function(b){var c={};b&&a.each(b.split(" "),function(a,b){c[b]="_eventHandler"}),this._off(this.anchors.add(this.tabs).add(this.panels)),this._on(!0,this.anchors,{click:function(a){a.preventDefault()}}),this._on(this.anchors,c),this._on(this.tabs,{keydown:"_tabKeydown"}),this._on(this.panels,{keydown:"_panelKeydown"}),this._focusable(this.tabs),this._hoverable(this.tabs)},_setupHeightStyle:function(b){var c,d=this.element.parent();"fill"===b?(c=d.height(),c-=this.element.outerHeight()-this.element.height(),this.element.siblings(":visible").each(function(){var b=a(this),d=b.css("position");"absolute"!==d&&"fixed"!==d&&(c-=b.outerHeight(!0))}),this.element.children().not(this.panels).each(function(){c-=a(this).outerHeight(!0)}),this.panels.each(function(){a(this).height(Math.max(0,c-a(this).innerHeight()+a(this).height()))}).css("overflow","auto")):"auto"===b&&(c=0,this.panels.each(function(){c=Math.max(c,a(this).height("").height())}).height(c))},_eventHandler:function(b){var c=this.options,d=this.active,e=a(b.currentTarget),f=e.closest("li"),g=f[0]===d[0],h=g&&c.collapsible,i=h?a():this._getPanelForTab(f),j=d.length?this._getPanelForTab(d):a(),k={oldTab:d,oldPanel:j,newTab:h?a():f,newPanel:i};b.preventDefault(),f.hasClass("ui-state-disabled")||f.hasClass("ui-tabs-loading")||this.running||g&&!c.collapsible||this._trigger("beforeActivate",b,k)===!1||(c.active=!h&&this.tabs.index(f),this.active=g?a():f,this.xhr&&this.xhr.abort(),j.length||i.length||a.error("jQuery UI Tabs: Mismatching fragment identifier."),i.length&&this.load(this.tabs.index(f),b),this._toggle(b,k))},_toggle:function(b,c){function d(){f.running=!1,f._trigger("activate",b,c)}function e(){c.newTab.closest("li").addClass("ui-tabs-active ui-state-active"),g.length&&f.options.show?f._show(g,f.options.show,d):(g.show(),d())}var f=this,g=c.newPanel,h=c.oldPanel;this.running=!0,h.length&&this.options.hide?this._hide(h,this.options.hide,function(){c.oldTab.closest("li").removeClass("ui-tabs-active ui-state-active"),e()}):(c.oldTab.closest("li").removeClass("ui-tabs-active ui-state-active"),h.hide(),e()),h.attr("aria-hidden","true"),c.oldTab.attr({"aria-selected":"false","aria-expanded":"false"}),g.length&&h.length?c.oldTab.attr("tabIndex",-1):g.length&&this.tabs.filter(function(){return 0===a(this).attr("tabIndex")}).attr("tabIndex",-1),g.attr("aria-hidden","false"),c.newTab.attr({"aria-selected":"true","aria-expanded":"true",tabIndex:0})},_activate:function(b){var c,d=this._findActive(b);d[0]!==this.active[0]&&(d.length||(d=this.active),c=d.find(".ui-tabs-anchor")[0],this._eventHandler({target:c,currentTarget:c,preventDefault:a.noop}))},_findActive:function(b){return b===!1?a():this.tabs.eq(b)},_getIndex:function(a){return"string"==typeof a&&(a=this.anchors.index(this.anchors.filter("[href$='"+a+"']"))),a},_destroy:function(){this.xhr&&this.xhr.abort(),this.element.removeClass("ui-tabs ui-widget ui-widget-content ui-corner-all ui-tabs-collapsible"),this.tablist.removeClass("ui-tabs-nav ui-helper-reset ui-helper-clearfix ui-widget-header ui-corner-all").removeAttr("role"),this.anchors.removeClass("ui-tabs-anchor").removeAttr("role").removeAttr("tabIndex").removeUniqueId(),this.tablist.unbind(this.eventNamespace),this.tabs.add(this.panels).each(function(){a.data(this,"ui-tabs-destroy")?a(this).remove():a(this).removeClass("ui-state-default ui-state-active ui-state-disabled ui-corner-top ui-corner-bottom ui-widget-content ui-tabs-active ui-tabs-panel").removeAttr("tabIndex").removeAttr("aria-live").removeAttr("aria-busy").removeAttr("aria-selected").removeAttr("aria-labelledby").removeAttr("aria-hidden").removeAttr("aria-expanded").removeAttr("role")}),this.tabs.each(function(){var b=a(this),c=b.data("ui-tabs-aria-controls");c?b.attr("aria-controls",c).removeData("ui-tabs-aria-controls"):b.removeAttr("aria-controls")}),this.panels.show(),"content"!==this.options.heightStyle&&this.panels.css("height","")},enable:function(b){var c=this.options.disabled;c!==!1&&(void 0===b?c=!1:(b=this._getIndex(b),c=a.isArray(c)?a.map(c,function(a){return a!==b?a:null}):a.map(this.tabs,function(a,c){return c!==b?c:null})),this._setupDisabled(c))},disable:function(b){var c=this.options.disabled;if(c!==!0){if(void 0===b)c=!0;else{if(b=this._getIndex(b),a.inArray(b,c)!==-1)return;c=a.isArray(c)?a.merge([b],c).sort():[b]}this._setupDisabled(c)}},load:function(b,c){b=this._getIndex(b);var d=this,e=this.tabs.eq(b),f=e.find(".ui-tabs-anchor"),g=this._getPanelForTab(e),h={tab:e,panel:g},i=function(a,b){"abort"===b&&d.panels.stop(!1,!0),e.removeClass("ui-tabs-loading"),g.removeAttr("aria-busy"),a===d.xhr&&delete d.xhr};this._isLocal(f[0])||(this.xhr=a.ajax(this._ajaxSettings(f,c,h)),this.xhr&&"canceled"!==this.xhr.statusText&&(e.addClass("ui-tabs-loading"),g.attr("aria-busy","true"),this.xhr.done(function(a,b,e){setTimeout(function(){g.html(a),d._trigger("load",c,h),i(e,b)},1)}).fail(function(a,b){setTimeout(function(){i(a,b)},1)})))},_ajaxSettings:function(b,c,d){var e=this;return{url:b.attr("href"),beforeSend:function(b,f){return e._trigger("beforeLoad",c,a.extend({jqXHR:b,ajaxSettings:f},d))}}},_getPanelForTab:function(b){var c=a(b).attr("aria-controls");return this.element.find(this._sanitizeSelector("#"+c))}})});
/*
 * Thickbox 3.1 - One Box To Rule Them All.
 * By Cody Lindley (http://www.codylindley.com)
 * Copyright (c) 2007 cody lindley
 * Licensed under the MIT License: http://www.opensource.org/licenses/mit-license.php
*/

if ( typeof tb_pathToImage != 'string' ) {
	var tb_pathToImage = thickboxL10n.loadingAnimation;
}

/*!!!!!!!!!!!!!!!!! edit below this line at your own risk !!!!!!!!!!!!!!!!!!!!!!!*/

//on page load call tb_init
jQuery(document).ready(function(){
	tb_init('a.thickbox, area.thickbox, input.thickbox');//pass where to apply thickbox
	imgLoader = new Image();// preload image
	imgLoader.src = tb_pathToImage;
});

/*
 * Add thickbox to href & area elements that have a class of .thickbox.
 * Remove the loading indicator when content in an iframe has loaded.
 */
function tb_init(domChunk){
	jQuery( 'body' )
		.on( 'click', domChunk, tb_click )
		.on( 'thickbox:iframe:loaded', function() {
			jQuery( '#TB_window' ).removeClass( 'thickbox-loading' );
		});
}

function tb_click(){
	var t = this.title || this.name || null;
	var a = this.href || this.alt;
	var g = this.rel || false;
	tb_show(t,a,g);
	this.blur();
	return false;
}

function tb_show(caption, url, imageGroup) {//function called when the user clicks on a thickbox link

	var $closeBtn;

	try {
		if (typeof document.body.style.maxHeight === "undefined") {//if IE 6
			jQuery("body","html").css({height: "100%", width: "100%"});
			jQuery("html").css("overflow","hidden");
			if (document.getElementById("TB_HideSelect") === null) {//iframe to hide select elements in ie6
				jQuery("body").append("<iframe id='TB_HideSelect'>"+thickboxL10n.noiframes+"</iframe><div id='TB_overlay'></div><div id='TB_window' class='thickbox-loading'></div>");
				jQuery("#TB_overlay").click(tb_remove);
			}
		}else{//all others
			if(document.getElementById("TB_overlay") === null){
				jQuery("body").append("<div id='TB_overlay'></div><div id='TB_window' class='thickbox-loading'></div>");
				jQuery("#TB_overlay").click(tb_remove);
				jQuery( 'body' ).addClass( 'modal-open' );
			}
		}

		if(tb_detectMacXFF()){
			jQuery("#TB_overlay").addClass("TB_overlayMacFFBGHack");//use png overlay so hide flash
		}else{
			jQuery("#TB_overlay").addClass("TB_overlayBG");//use background and opacity
		}

		if(caption===null){caption="";}
		jQuery("body").append("<div id='TB_load'><img src='"+imgLoader.src+"' width='208' /></div>");//add loader to the page
		jQuery('#TB_load').show();//show loader

		var baseURL;
	   if(url.indexOf("?")!==-1){ //ff there is a query string involved
			baseURL = url.substr(0, url.indexOf("?"));
	   }else{
	   		baseURL = url;
	   }

	   var urlString = /\.jpg$|\.jpeg$|\.png$|\.gif$|\.bmp$/;
	   var urlType = baseURL.toLowerCase().match(urlString);

		if(urlType == '.jpg' || urlType == '.jpeg' || urlType == '.png' || urlType == '.gif' || urlType == '.bmp'){//code to show images

			TB_PrevCaption = "";
			TB_PrevURL = "";
			TB_PrevHTML = "";
			TB_NextCaption = "";
			TB_NextURL = "";
			TB_NextHTML = "";
			TB_imageCount = "";
			TB_FoundURL = false;
			if(imageGroup){
				TB_TempArray = jQuery("a[rel="+imageGroup+"]").get();
				for (TB_Counter = 0; ((TB_Counter < TB_TempArray.length) && (TB_NextHTML === "")); TB_Counter++) {
					var urlTypeTemp = TB_TempArray[TB_Counter].href.toLowerCase().match(urlString);
						if (!(TB_TempArray[TB_Counter].href == url)) {
							if (TB_FoundURL) {
								TB_NextCaption = TB_TempArray[TB_Counter].title;
								TB_NextURL = TB_TempArray[TB_Counter].href;
								TB_NextHTML = "<span id='TB_next'>&nbsp;&nbsp;<a href='#'>"+thickboxL10n.next+"</a></span>";
							} else {
								TB_PrevCaption = TB_TempArray[TB_Counter].title;
								TB_PrevURL = TB_TempArray[TB_Counter].href;
								TB_PrevHTML = "<span id='TB_prev'>&nbsp;&nbsp;<a href='#'>"+thickboxL10n.prev+"</a></span>";
							}
						} else {
							TB_FoundURL = true;
							TB_imageCount = thickboxL10n.image + ' ' + (TB_Counter + 1) + ' ' + thickboxL10n.of + ' ' + (TB_TempArray.length);
						}
				}
			}

			imgPreloader = new Image();
			imgPreloader.onload = function(){
			imgPreloader.onload = null;

			// Resizing large images - original by Christian Montoya edited by me.
			var pagesize = tb_getPageSize();
			var x = pagesize[0] - 150;
			var y = pagesize[1] - 150;
			var imageWidth = imgPreloader.width;
			var imageHeight = imgPreloader.height;
			if (imageWidth > x) {
				imageHeight = imageHeight * (x / imageWidth);
				imageWidth = x;
				if (imageHeight > y) {
					imageWidth = imageWidth * (y / imageHeight);
					imageHeight = y;
				}
			} else if (imageHeight > y) {
				imageWidth = imageWidth * (y / imageHeight);
				imageHeight = y;
				if (imageWidth > x) {
					imageHeight = imageHeight * (x / imageWidth);
					imageWidth = x;
				}
			}
			// End Resizing

			TB_WIDTH = imageWidth + 30;
			TB_HEIGHT = imageHeight + 60;
			jQuery("#TB_window").append("<a href='' id='TB_ImageOff'><span class='screen-reader-text'>"+thickboxL10n.close+"</span><img id='TB_Image' src='"+url+"' width='"+imageWidth+"' height='"+imageHeight+"' alt='"+caption+"'/></a>" + "<div id='TB_caption'>"+caption+"<div id='TB_secondLine'>" + TB_imageCount + TB_PrevHTML + TB_NextHTML + "</div></div><div id='TB_closeWindow'><button type='button' id='TB_closeWindowButton'><span class='screen-reader-text'>"+thickboxL10n.close+"</span><span class='tb-close-icon'></span></button></div>");

			jQuery("#TB_closeWindowButton").click(tb_remove);

			if (!(TB_PrevHTML === "")) {
				function goPrev(){
					if(jQuery(document).unbind("click",goPrev)){jQuery(document).unbind("click",goPrev);}
					jQuery("#TB_window").remove();
					jQuery("body").append("<div id='TB_window'></div>");
					tb_show(TB_PrevCaption, TB_PrevURL, imageGroup);
					return false;
				}
				jQuery("#TB_prev").click(goPrev);
			}

			if (!(TB_NextHTML === "")) {
				function goNext(){
					jQuery("#TB_window").remove();
					jQuery("body").append("<div id='TB_window'></div>");
					tb_show(TB_NextCaption, TB_NextURL, imageGroup);
					return false;
				}
				jQuery("#TB_next").click(goNext);

			}

			jQuery(document).bind('keydown.thickbox', function(e){
				if ( e.which == 27 ){ // close
					tb_remove();

				} else if ( e.which == 190 ){ // display previous image
					if(!(TB_NextHTML == "")){
						jQuery(document).unbind('thickbox');
						goNext();
					}
				} else if ( e.which == 188 ){ // display next image
					if(!(TB_PrevHTML == "")){
						jQuery(document).unbind('thickbox');
						goPrev();
					}
				}
				return false;
			});

			tb_position();
			jQuery("#TB_load").remove();
			jQuery("#TB_ImageOff").click(tb_remove);
			jQuery("#TB_window").css({'visibility':'visible'}); //for safari using css instead of show
			};

			imgPreloader.src = url;
		}else{//code to show html

			var queryString = url.replace(/^[^\?]+\??/,'');
			var params = tb_parseQuery( queryString );

			TB_WIDTH = (params['width']*1) + 30 || 630; //defaults to 630 if no parameters were added to URL
			TB_HEIGHT = (params['height']*1) + 40 || 440; //defaults to 440 if no parameters were added to URL
			ajaxContentW = TB_WIDTH - 30;
			ajaxContentH = TB_HEIGHT - 45;

			if(url.indexOf('TB_iframe') != -1){// either iframe or ajax window
					urlNoQuery = url.split('TB_');
					jQuery("#TB_iframeContent").remove();
					if(params['modal'] != "true"){//iframe no modal
						jQuery("#TB_window").append("<div id='TB_title'><div id='TB_ajaxWindowTitle'>"+caption+"</div><div id='TB_closeAjaxWindow'><button type='button' id='TB_closeWindowButton'><span class='screen-reader-text'>"+thickboxL10n.close+"</span><span class='tb-close-icon'></span></button></div></div><iframe frameborder='0' hspace='0' allowtransparency='true' src='"+urlNoQuery[0]+"' id='TB_iframeContent' name='TB_iframeContent"+Math.round(Math.random()*1000)+"' onload='tb_showIframe()' style='width:"+(ajaxContentW + 29)+"px;height:"+(ajaxContentH + 17)+"px;' >"+thickboxL10n.noiframes+"</iframe>");
					}else{//iframe modal
					jQuery("#TB_overlay").unbind();
						jQuery("#TB_window").append("<iframe frameborder='0' hspace='0' allowtransparency='true' src='"+urlNoQuery[0]+"' id='TB_iframeContent' name='TB_iframeContent"+Math.round(Math.random()*1000)+"' onload='tb_showIframe()' style='width:"+(ajaxContentW + 29)+"px;height:"+(ajaxContentH + 17)+"px;'>"+thickboxL10n.noiframes+"</iframe>");
					}
			}else{// not an iframe, ajax
					if(jQuery("#TB_window").css("visibility") != "visible"){
						if(params['modal'] != "true"){//ajax no modal
						jQuery("#TB_window").append("<div id='TB_title'><div id='TB_ajaxWindowTitle'>"+caption+"</div><div id='TB_closeAjaxWindow'><button type='button' id='TB_closeWindowButton'><span class='screen-reader-text'>"+thickboxL10n.close+"</span><span class='tb-close-icon'></span></button></div></div><div id='TB_ajaxContent' style='width:"+ajaxContentW+"px;height:"+ajaxContentH+"px'></div>");
						}else{//ajax modal
						jQuery("#TB_overlay").unbind();
						jQuery("#TB_window").append("<div id='TB_ajaxContent' class='TB_modal' style='width:"+ajaxContentW+"px;height:"+ajaxContentH+"px;'></div>");
						}
					}else{//this means the window is already up, we are just loading new content via ajax
						jQuery("#TB_ajaxContent")[0].style.width = ajaxContentW +"px";
						jQuery("#TB_ajaxContent")[0].style.height = ajaxContentH +"px";
						jQuery("#TB_ajaxContent")[0].scrollTop = 0;
						jQuery("#TB_ajaxWindowTitle").html(caption);
					}
			}

			jQuery("#TB_closeWindowButton").click(tb_remove);

				if(url.indexOf('TB_inline') != -1){
					jQuery("#TB_ajaxContent").append(jQuery('#' + params['inlineId']).children());
					jQuery("#TB_window").bind('tb_unload', function () {
						jQuery('#' + params['inlineId']).append( jQuery("#TB_ajaxContent").children() ); // move elements back when you're finished
					});
					tb_position();
					jQuery("#TB_load").remove();
					jQuery("#TB_window").css({'visibility':'visible'});
				}else if(url.indexOf('TB_iframe') != -1){
					tb_position();
					jQuery("#TB_load").remove();
					jQuery("#TB_window").css({'visibility':'visible'});
				}else{
					var load_url = url;
					load_url += -1 === url.indexOf('?') ? '?' : '&';
					jQuery("#TB_ajaxContent").load(load_url += "random=" + (new Date().getTime()),function(){//to do a post change this load method
						tb_position();
						jQuery("#TB_load").remove();
						tb_init("#TB_ajaxContent a.thickbox");
						jQuery("#TB_window").css({'visibility':'visible'});
					});
				}

		}

		if(!params['modal']){
			jQuery(document).bind('keydown.thickbox', function(e){
				if ( e.which == 27 ){ // close
					tb_remove();
					return false;
				}
			});
		}

		$closeBtn = jQuery( '#TB_closeWindowButton' );
		/*
		 * If the native Close button icon is visible, move focus on the button
		 * (e.g. in the Network Admin Themes screen).
		 * In other admin screens is hidden and replaced by a different icon.
		 */
		if ( $closeBtn.find( '.tb-close-icon' ).is( ':visible' ) ) {
			$closeBtn.focus();
		}

	} catch(e) {
		//nothing here
	}
}

//helper functions below
function tb_showIframe(){
	jQuery("#TB_load").remove();
	jQuery("#TB_window").css({'visibility':'visible'}).trigger( 'thickbox:iframe:loaded' );
}

function tb_remove() {
 	jQuery("#TB_imageOff").unbind("click");
	jQuery("#TB_closeWindowButton").unbind("click");
	jQuery( '#TB_window' ).fadeOut( 'fast', function() {
		jQuery( '#TB_window, #TB_overlay, #TB_HideSelect' ).trigger( 'tb_unload' ).unbind().remove();
		jQuery( 'body' ).trigger( 'thickbox:removed' );
	});
	jQuery( 'body' ).removeClass( 'modal-open' );
	jQuery("#TB_load").remove();
	if (typeof document.body.style.maxHeight == "undefined") {//if IE 6
		jQuery("body","html").css({height: "auto", width: "auto"});
		jQuery("html").css("overflow","");
	}
	jQuery(document).unbind('.thickbox');
	return false;
}

function tb_position() {
var isIE6 = typeof document.body.style.maxHeight === "undefined";
jQuery("#TB_window").css({marginLeft: '-' + parseInt((TB_WIDTH / 2),10) + 'px', width: TB_WIDTH + 'px'});
	if ( ! isIE6 ) { // take away IE6
		jQuery("#TB_window").css({marginTop: '-' + parseInt((TB_HEIGHT / 2),10) + 'px'});
	}
}

function tb_parseQuery ( query ) {
   var Params = {};
   if ( ! query ) {return Params;}// return empty object
   var Pairs = query.split(/[;&]/);
   for ( var i = 0; i < Pairs.length; i++ ) {
      var KeyVal = Pairs[i].split('=');
      if ( ! KeyVal || KeyVal.length != 2 ) {continue;}
      var key = unescape( KeyVal[0] );
      var val = unescape( KeyVal[1] );
      val = val.replace(/\+/g, ' ');
      Params[key] = val;
   }
   return Params;
}

function tb_getPageSize(){
	var de = document.documentElement;
	var w = window.innerWidth || self.innerWidth || (de&&de.clientWidth) || document.body.clientWidth;
	var h = window.innerHeight || self.innerHeight || (de&&de.clientHeight) || document.body.clientHeight;
	arrayPageSize = [w,h];
	return arrayPageSize;
}

function tb_detectMacXFF() {
  var userAgent = navigator.userAgent.toLowerCase();
  if (userAgent.indexOf('mac') != -1 && userAgent.indexOf('firefox')!=-1) {
    return true;
  }
}

