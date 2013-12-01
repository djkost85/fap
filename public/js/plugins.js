// jQuery RoyalSlider plugin. Custom build. Copyright 2011-2013 Dmitry Semenov http://dimsemenov.com 
// http://dimsemenov.com/private/home.php?build=bullets_autoplay_active-class 
// jquery.royalslider v9.5.1
(function(n){function u(b,e){var c,a=this,f=window.navigator,g=f.userAgent.toLowerCase();a.uid=n.rsModules.uid++;a.ns=".rs"+a.uid;var d=document.createElement("div").style,h=["webkit","Moz","ms","O"],k="",l=0,r;for(c=0;c<h.length;c++)r=h[c],!k&&r+"Transform"in d&&(k=r),r=r.toLowerCase(),window.requestAnimationFrame||(window.requestAnimationFrame=window[r+"RequestAnimationFrame"],window.cancelAnimationFrame=window[r+"CancelAnimationFrame"]||window[r+"CancelRequestAnimationFrame"]);window.requestAnimationFrame||
(window.requestAnimationFrame=function(a,b){var c=(new Date).getTime(),d=Math.max(0,16-(c-l)),f=window.setTimeout(function(){a(c+d)},d);l=c+d;return f});window.cancelAnimationFrame||(window.cancelAnimationFrame=function(a){clearTimeout(a)});a.isIPAD=g.match(/(ipad)/);a.isIOS=a.isIPAD||g.match(/(iphone|ipod)/);c=function(a){a=/(chrome)[ \/]([\w.]+)/.exec(a)||/(webkit)[ \/]([\w.]+)/.exec(a)||/(opera)(?:.*version|)[ \/]([\w.]+)/.exec(a)||/(msie) ([\w.]+)/.exec(a)||0>a.indexOf("compatible")&&/(mozilla)(?:.*? rv:([\w.]+)|)/.exec(a)||
[];return{browser:a[1]||"",version:a[2]||"0"}}(g);h={};c.browser&&(h[c.browser]=!0,h.version=c.version);h.chrome&&(h.webkit=!0);a._browser=h;a.isAndroid=-1<g.indexOf("android");a.slider=n(b);a.ev=n(a);a._doc=n(document);a.st=n.extend({},n.fn.royalSlider.defaults,e);a._currAnimSpeed=a.st.transitionSpeed;a._minPosOffset=0;!a.st.allowCSS3||h.webkit&&!a.st.allowCSS3OnWebkit||(c=k+(k?"T":"t"),a._useCSS3Transitions=c+"ransform"in d&&c+"ransition"in d,a._useCSS3Transitions&&(a._use3dTransform=k+(k?"P":"p")+
"erspective"in d));k=k.toLowerCase();a._vendorPref="-"+k+"-";a._slidesHorizontal="vertical"===a.st.slidesOrientation?!1:!0;a._reorderProp=a._slidesHorizontal?"left":"top";a._sizeProp=a._slidesHorizontal?"width":"height";a._prevNavItemId=-1;a._isMove="fade"===a.st.transitionType?!1:!0;a._isMove||(a.st.sliderDrag=!1,a._fadeZIndex=10);a._opacityCSS="z-index:0; display:none; opacity:0;";a._newSlideId=0;a._sPosition=0;a._nextSlidePos=0;n.each(n.rsModules,function(b,c){"uid"!==b&&c.call(a)});a.slides=[];
a._idCount=0;(a.st.slides?n(a.st.slides):a.slider.children().detach()).each(function(){a._parseNode(this,!0)});a.st.randomizeSlides&&a.slides.sort(function(){return 0.5-Math.random()});a.numSlides=a.slides.length;a._refreshNumPreloadImages();a.st.startSlideId?a.st.startSlideId>a.numSlides-1&&(a.st.startSlideId=a.numSlides-1):a.st.startSlideId=0;a._newSlideId=a.staticSlideId=a.currSlideId=a._realId=a.st.startSlideId;a.currSlide=a.slides[a.currSlideId];a._accelerationPos=0;a.pointerMultitouch=!1;a.slider.addClass((a._slidesHorizontal?
"rsHor":"rsVer")+(a._isMove?"":" rsFade"));d='<div class="rsOverflow"><div class="rsContainer">';a.slidesSpacing=a.st.slidesSpacing;a._slideSize=(a._slidesHorizontal?a.slider.width():a.slider.height())+a.st.slidesSpacing;a._preload=Boolean(0<a._numPreloadImages);1>=a.numSlides&&(a._loop=!1);a._loopHelpers=a._loop&&a._isMove?2===a.numSlides?1:2:0;a._maxImages=6>a.numSlides?a.numSlides:6;a._currBlockIndex=0;a._idOffset=0;a.slidesJQ=[];for(c=0;c<a.numSlides;c++)a.slidesJQ.push(n('<div style="'+(a._isMove?
"":c!==a.currSlideId?a._opacityCSS:"z-index:0;")+'" class="rsSlide "></div>'));a._sliderOverflow=d=n(d+"</div></div>");var m=a.ns,k=function(b,c,d,f,e){a._downEvent=b+c+m;a._moveEvent=b+d+m;a._upEvent=b+f+m;e&&(a._cancelEvent=b+e+m)};c=f.pointerEnabled;a.pointerEnabled=c||f.msPointerEnabled;a.pointerEnabled?(a.hasTouch=!1,a._lastItemFriction=0.2,a.pointerMultitouch=Boolean(1<f[(c?"m":"msM")+"axTouchPoints"]),c?k("pointer","down","move","up","cancel"):k("MSPointer","Down","Move","Up","Cancel")):(a.isIOS?
a._downEvent=a._moveEvent=a._upEvent=a._cancelEvent="":k("mouse","down","move","up"),"ontouchstart"in window||"createTouch"in document?(a.hasTouch=!0,a._downEvent+=" touchstart"+m,a._moveEvent+=" touchmove"+m,a._upEvent+=" touchend"+m,a._cancelEvent+=" touchcancel"+m,a._lastItemFriction=0.5,a.st.sliderTouch&&(a._hasDrag=!0)):(a.hasTouch=!1,a._lastItemFriction=0.2));a.st.sliderDrag&&(a._hasDrag=!0,h.msie||h.opera?a._grabCursor=a._grabbingCursor="move":h.mozilla?(a._grabCursor="-moz-grab",a._grabbingCursor=
"-moz-grabbing"):h.webkit&&-1!=f.platform.indexOf("Mac")&&(a._grabCursor="-webkit-grab",a._grabbingCursor="-webkit-grabbing"),a._setGrabCursor());a.slider.html(d);a._controlsContainer=a.st.controlsInside?a._sliderOverflow:a.slider;a._slidesContainer=a._sliderOverflow.children(".rsContainer");a.pointerEnabled&&a._slidesContainer.css((c?"":"-ms-")+"touch-action",a._slidesHorizontal?"pan-y":"pan-x");a._preloader=n('<div class="rsPreloader"></div>');f=a._slidesContainer.children(".rsSlide");a._currHolder=
a.slidesJQ[a.currSlideId];a._selectedSlideHolder=0;a._useCSS3Transitions?(a._TP="transition-property",a._TD="transition-duration",a._TTF="transition-timing-function",a._yProp=a._xProp=a._vendorPref+"transform",a._use3dTransform?(h.webkit&&!h.chrome&&a.slider.addClass("rsWebkit3d"),a._tPref1="translate3d(",a._tPref2="px, ",a._tPref3="px, 0px)"):(a._tPref1="translate(",a._tPref2="px, ",a._tPref3="px)"),a._isMove?a._slidesContainer[a._vendorPref+a._TP]=a._vendorPref+"transform":(h={},h[a._vendorPref+
a._TP]="opacity",h[a._vendorPref+a._TD]=a.st.transitionSpeed+"ms",h[a._vendorPref+a._TTF]=a.st.css3easeInOut,f.css(h))):(a._xProp="left",a._yProp="top");var p;n(window).on("resize"+a.ns,function(){p&&clearTimeout(p);p=setTimeout(function(){a.updateSliderSize()},50)});a.ev.trigger("rsAfterPropsSetup");a.updateSliderSize();a.st.keyboardNavEnabled&&a._bindKeyboardNav();a.st.arrowsNavHideOnTouch&&(a.hasTouch||a.pointerMultitouch)&&(a.st.arrowsNav=!1);a.st.arrowsNav&&(f=a._controlsContainer,n('<div class="rsArrow rsArrowLeft"><div class="rsArrowIcn"></div></div><div class="rsArrow rsArrowRight"><div class="rsArrowIcn"></div></div>').appendTo(f),
a._arrowLeft=f.children(".rsArrowLeft").click(function(b){b.preventDefault();a.prev()}),a._arrowRight=f.children(".rsArrowRight").click(function(b){b.preventDefault();a.next()}),a.st.arrowsNavAutoHide&&!a.hasTouch&&(a._arrowLeft.addClass("rsHidden"),a._arrowRight.addClass("rsHidden"),f.one("mousemove.arrowshover",function(){a._arrowLeft.removeClass("rsHidden");a._arrowRight.removeClass("rsHidden")}),f.hover(function(){a._arrowsAutoHideLocked||(a._arrowLeft.removeClass("rsHidden"),a._arrowRight.removeClass("rsHidden"))},
function(){a._arrowsAutoHideLocked||(a._arrowLeft.addClass("rsHidden"),a._arrowRight.addClass("rsHidden"))})),a.ev.on("rsOnUpdateNav",function(){a._updateArrowsNav()}),a._updateArrowsNav());if(a._hasDrag)a._slidesContainer.on(a._downEvent,function(b){a._onDragStart(b)});else a.dragSuccess=!1;var q=["rsPlayBtnIcon","rsPlayBtn","rsCloseVideoBtn","rsCloseVideoIcn"];a._slidesContainer.click(function(b){if(!a.dragSuccess){var c=n(b.target).attr("class");if(-1!==n.inArray(c,q)&&a.toggleVideo())return!1;
if(a.st.navigateByClick&&!a._blockActions){if(n(b.target).closest(".rsNoDrag",a._currHolder).length)return!0;a._mouseNext(b)}a.ev.trigger("rsSlideClick",b)}}).on("click.rs","a",function(b){if(a.dragSuccess)return!1;a._blockActions=!0;setTimeout(function(){a._blockActions=!1},3)});a.ev.trigger("rsAfterInit")}n.rsModules||(n.rsModules={uid:0});u.prototype={constructor:u,_mouseNext:function(b){b=b[this._slidesHorizontal?"pageX":"pageY"]-this._sliderOffset;b>=this._nextSlidePos?this.next():0>b&&this.prev()},
_refreshNumPreloadImages:function(){var b;b=this.st.numImagesToPreload;if(this._loop=this.st.loop)2===this.numSlides?(this._loop=!1,this.st.loopRewind=!0):2>this.numSlides&&(this.st.loopRewind=this._loop=!1);this._loop&&0<b&&(4>=this.numSlides?b=1:this.st.numImagesToPreload>(this.numSlides-1)/2&&(b=Math.floor((this.numSlides-1)/2)));this._numPreloadImages=b},_parseNode:function(b,e){function c(b,c){c?g.images.push(b.attr(c)):g.images.push(b.text());if(h){h=!1;g.caption="src"===c?b.attr("alt"):b.contents();
g.image=g.images[0];g.videoURL=b.attr("data-rsVideo");var d=b.attr("data-rsw"),f=b.attr("data-rsh");"undefined"!==typeof d&&!1!==d&&"undefined"!==typeof f&&!1!==f?(g.iW=parseInt(d,10),g.iH=parseInt(f,10)):a.st.imgWidth&&a.st.imgHeight&&(g.iW=a.st.imgWidth,g.iH=a.st.imgHeight)}}var a=this,f,g={},d,h=!0;b=n(b);a._currContent=b;a.ev.trigger("rsBeforeParseNode",[b,g]);if(!g.stopParsing)return b=a._currContent,g.id=a._idCount,g.contentAdded=!1,a._idCount++,g.images=[],g.isBig=!1,g.hasCover||(b.hasClass("rsImg")?
(d=b,f=!0):(d=b.find(".rsImg"),d.length&&(f=!0)),f?(g.bigImage=d.eq(0).attr("data-rsBigImg"),d.each(function(){var a=n(this);a.is("a")?c(a,"href"):a.is("img")?c(a,"src"):c(a)})):b.is("img")&&(b.addClass("rsImg rsMainSlideImage"),c(b,"src"))),d=b.find(".rsCaption"),d.length&&(g.caption=d.remove()),g.content=b,a.ev.trigger("rsAfterParseNode",[b,g]),e&&a.slides.push(g),0===g.images.length&&(g.isLoaded=!0,g.isRendered=!1,g.isLoading=!1,g.images=null),g},_bindKeyboardNav:function(){var b=this,e,c,a=function(a){37===
a?b.prev():39===a&&b.next()};b._doc.on("keydown"+b.ns,function(f){b._isDragging||(c=f.keyCode,37!==c&&39!==c||e||(a(c),e=setInterval(function(){a(c)},700)))}).on("keyup"+b.ns,function(a){e&&(clearInterval(e),e=null)})},goTo:function(b,e){b!==this.currSlideId&&this._moveTo(b,this.st.transitionSpeed,!0,!e)},destroy:function(b){this.ev.trigger("rsBeforeDestroy");this._doc.off("keydown"+this.ns+" keyup"+this.ns+" "+this._moveEvent+" "+this._upEvent);this._slidesContainer.off(this._downEvent+" click");
this.slider.data("royalSlider",null);n.removeData(this.slider,"royalSlider");n(window).off("resize"+this.ns);b&&this.slider.remove();this.ev=this.slider=this.slides=null},_updateBlocksContent:function(b,e){function c(c,e,g){c.isAdded?(a(e,c),f(e,c)):(g||(g=d.slidesJQ[e]),c.holder?g=c.holder:(g=d.slidesJQ[e]=n(g),c.holder=g),c.appendOnLoaded=!1,f(e,c,g),a(e,c),d._addBlockToContainer(c,g,b),c.isAdded=!0)}function a(a,c){c.contentAdded||(d.setItemHtml(c,b),b||(c.contentAdded=!0))}function f(a,b,c){d._isMove&&
(c||(c=d.slidesJQ[a]),c.css(d._reorderProp,(a+d._idOffset+p)*d._slideSize))}function g(a){if(l){if(a>r-1)return g(a-r);if(0>a)return g(r+a)}return a}var d=this,h,k,l=d._loop,r=d.numSlides;if(!isNaN(e))return g(e);var m=d.currSlideId,p,q=b?Math.abs(d._prevSlideId-d.currSlideId)>=d.numSlides-1?0:1:d._numPreloadImages,s=Math.min(2,q),v=!1,u=!1,t;for(k=m;k<m+1+s;k++)if(t=g(k),(h=d.slides[t])&&(!h.isAdded||!h.positionSet)){v=!0;break}for(k=m-1;k>m-1-s;k--)if(t=g(k),(h=d.slides[t])&&(!h.isAdded||!h.positionSet)){u=
!0;break}if(v)for(k=m;k<m+q+1;k++)t=g(k),p=Math.floor((d._realId-(m-k))/d.numSlides)*d.numSlides,(h=d.slides[t])&&c(h,t);if(u)for(k=m-1;k>m-1-q;k--)t=g(k),p=Math.floor((d._realId-(m-k))/r)*r,(h=d.slides[t])&&c(h,t);if(!b)for(s=g(m-q),m=g(m+q),q=s>m?0:s,k=0;k<r;k++)s>m&&k>s-1||!(k<q||k>m)||(h=d.slides[k])&&h.holder&&(h.holder.detach(),h.isAdded=!1)},setItemHtml:function(b,e){var c=this,a=function(){if(!b.images)b.isRendered=!0,b.isLoaded=!0,b.isLoading=!1,d(!0);else if(!b.isLoading){var a,e;b.content.hasClass("rsImg")?
(a=b.content,e=!0):a=b.content.find(".rsImg:not(img)");a&&!a.is("img")&&a.each(function(){var a=n(this),c='<img class="rsImg" src="'+(a.is("a")?a.attr("href"):a.text())+'" />';e?b.content=n(c):a.replaceWith(c)});a=e?b.content:b.content.find("img.rsImg");k();a.eq(0).addClass("rsMainSlideImage");b.iW&&b.iH&&(b.isLoaded||c._resizeImage(b),d());b.isLoading=!0;if(b.isBig)n("<img />").on("load.rs error.rs",function(a){n(this).off("load.rs error.rs");f([this],!0)}).attr("src",b.image);else{b.loaded=[];b.numStartedLoad=
0;a=function(a){n(this).off("load.rs error.rs");b.loaded.push(this);b.loaded.length===b.numStartedLoad&&f(b.loaded,!1)};for(var g=0;g<b.images.length;g++){var h=n("<img />");b.numStartedLoad++;h.on("load.rs error.rs",a).attr("src",b.images[g])}}}},f=function(a,c){if(a.length){var d=a[0];if(c!==b.isBig)(d=b.holder.children())&&1<d.length&&l();else if(b.iW&&b.iH)g();else if(b.iW=d.width,b.iH=d.height,b.iW&&b.iH)g();else{var e=new Image;e.onload=function(){e.width?(b.iW=e.width,b.iH=e.height,g()):setTimeout(function(){e.width&&
(b.iW=e.width,b.iH=e.height);g()},1E3)};e.src=d.src}}else g()},g=function(){b.isLoaded=!0;b.isLoading=!1;d();l();h()},d=function(){if(!b.isAppended&&c.ev){var a=c.st.visibleNearby,d=b.id-c._newSlideId;e||b.appendOnLoaded||!c.st.fadeinLoadedSlide||0!==d&&(!(a||c._isAnimating||c._isDragging)||-1!==d&&1!==d)||(a={visibility:"visible",opacity:0},a[c._vendorPref+"transition"]="opacity 400ms ease-in-out",b.content.css(a),setTimeout(function(){b.content.css("opacity",1)},16));b.holder.find(".rsPreloader").length?
b.holder.append(b.content):b.holder.html(b.content);b.isAppended=!0;b.isLoaded&&(c._resizeImage(b),h());b.sizeReady||(b.sizeReady=!0,setTimeout(function(){c.ev.trigger("rsMaybeSizeReady",b)},100))}},h=function(){!b.loadedTriggered&&c.ev&&(b.isLoaded=b.loadedTriggered=!0,b.holder.trigger("rsAfterContentSet"),c.ev.trigger("rsAfterContentSet",b))},k=function(){c.st.usePreloader&&b.holder.html(c._preloader.clone())},l=function(a){c.st.usePreloader&&(a=b.holder.find(".rsPreloader"),a.length&&a.remove())};
b.isLoaded?d():e?!c._isMove&&b.images&&b.iW&&b.iH?a():(b.holder.isWaiting=!0,k(),b.holder.slideId=-99):a()},_addBlockToContainer:function(b,e,c){this._slidesContainer.append(b.holder);b.appendOnLoaded=!1},_onDragStart:function(b,e){var c=this,a,f="touchstart"===b.type;c._isTouchGesture=f;c.ev.trigger("rsDragStart");if(n(b.target).closest(".rsNoDrag",c._currHolder).length)return c.dragSuccess=!1,!0;!e&&c._isAnimating&&(c._wasAnimating=!0,c._stopAnimation());c.dragSuccess=!1;if(c._isDragging)f&&(c._multipleTouches=
!0);else{f&&(c._multipleTouches=!1);c._setGrabbingCursor();if(f){var g=b.originalEvent.touches;if(g&&0<g.length)a=g[0],1<g.length&&(c._multipleTouches=!0);else return}else b.preventDefault(),a=b,c.pointerEnabled&&(a=a.originalEvent);c._isDragging=!0;c._doc.on(c._moveEvent,function(a){c._onDragMove(a,e)}).on(c._upEvent,function(a){c._onDragRelease(a,e)});c._currMoveAxis="";c._hasMoved=!1;c._pageX=a.pageX;c._pageY=a.pageY;c._startPagePos=c._accelerationPos=(e?c._thumbsHorizontal:c._slidesHorizontal)?
a.pageX:a.pageY;c._horDir=0;c._verDir=0;c._currRenderPosition=e?c._thumbsPosition:c._sPosition;c._startTime=(new Date).getTime();if(f)c._sliderOverflow.on(c._cancelEvent,function(a){c._onDragRelease(a,e)})}},_renderMovement:function(b,e){if(this._checkedAxis){var c=this._renderMoveTime,a=b.pageX-this._pageX,f=b.pageY-this._pageY,g=this._currRenderPosition+a,d=this._currRenderPosition+f,h=e?this._thumbsHorizontal:this._slidesHorizontal,g=h?g:d,d=this._currMoveAxis;this._hasMoved=!0;this._pageX=b.pageX;
this._pageY=b.pageY;"x"===d&&0!==a?this._horDir=0<a?1:-1:"y"===d&&0!==f&&(this._verDir=0<f?1:-1);d=h?this._pageX:this._pageY;a=h?a:f;e?g>this._thumbsMinPosition?g=this._currRenderPosition+a*this._lastItemFriction:g<this._thumbsMaxPosition&&(g=this._currRenderPosition+a*this._lastItemFriction):this._loop||(0>=this.currSlideId&&0<d-this._startPagePos&&(g=this._currRenderPosition+a*this._lastItemFriction),this.currSlideId>=this.numSlides-1&&0>d-this._startPagePos&&(g=this._currRenderPosition+a*this._lastItemFriction));
this._currRenderPosition=g;200<c-this._startTime&&(this._startTime=c,this._accelerationPos=d);e?this._setThumbsPosition(this._currRenderPosition):this._isMove&&this._setPosition(this._currRenderPosition)}},_onDragMove:function(b,e){var c=this,a,f="touchmove"===b.type;if(!c._isTouchGesture||f){if(f){if(c._lockAxis)return;var g=b.originalEvent.touches;if(g){if(1<g.length)return;a=g[0]}else return}else a=b,c.pointerEnabled&&(a=a.originalEvent);c._hasMoved||(c._useCSS3Transitions&&(e?c._thumbsContainer:
c._slidesContainer).css(c._vendorPref+c._TD,"0s"),function h(){c._isDragging&&(c._animFrame=requestAnimationFrame(h),c._renderMoveEvent&&c._renderMovement(c._renderMoveEvent,e))}());if(c._checkedAxis)b.preventDefault(),c._renderMoveTime=(new Date).getTime(),c._renderMoveEvent=a;else if(g=e?c._thumbsHorizontal:c._slidesHorizontal,a=Math.abs(a.pageX-c._pageX)-Math.abs(a.pageY-c._pageY)-(g?-7:7),7<a){if(g)b.preventDefault(),c._currMoveAxis="x";else if(f){c._completeGesture(b);return}c._checkedAxis=!0}else if(-7>
a){if(!g)b.preventDefault(),c._currMoveAxis="y";else if(f){c._completeGesture(b);return}c._checkedAxis=!0}}},_completeGesture:function(b,e){this._lockAxis=!0;this._hasMoved=this._isDragging=!1;this._onDragRelease(b)},_onDragRelease:function(b,e){function c(a){return 100>a?100:500<a?500:a}function a(a,b){if(f._isMove||e){for(var d=0,g=0;g<f._realId;g++)d+=parseInt(f.slidesJQ[g+1].find(".carousel_group").width())+f.st.slidesSpacing;h=-d;k=Math.abs(f._sPosition-h);f._currAnimSpeed=k/b;a&&(f._currAnimSpeed+=
250);f._currAnimSpeed=c(f._currAnimSpeed);f._animateTo(h,!1)}}var f=this,g,d,h,k;g=-1<b.type.indexOf("touch");if(!f._isTouchGesture||g)if(f._isTouchGesture=!1,f.ev.trigger("rsDragRelease"),f._renderMoveEvent=null,f._isDragging=!1,f._lockAxis=!1,f._checkedAxis=!1,f._renderMoveTime=0,cancelAnimationFrame(f._animFrame),f._hasMoved&&(e?f._setThumbsPosition(f._currRenderPosition):f._isMove&&f._setPosition(f._currRenderPosition)),f._doc.off(f._moveEvent).off(f._upEvent),g&&f._sliderOverflow.off(f._cancelEvent),
f._setGrabCursor(),!f._hasMoved&&!f._multipleTouches&&e&&f._thumbsEnabled){var l=n(b.target).closest(".rsNavItem");l.length&&f.goTo(l.index())}else{d=e?f._thumbsHorizontal:f._slidesHorizontal;if(!f._hasMoved||"y"===f._currMoveAxis&&d||"x"===f._currMoveAxis&&!d)if(!e&&f._wasAnimating){f._wasAnimating=!1;if(f.st.navigateByClick){f._mouseNext(f.pointerEnabled?b.originalEvent:b);f.dragSuccess=!0;return}f.dragSuccess=!0}else{f._wasAnimating=!1;f.dragSuccess=!1;return}else f.dragSuccess=!0;f._wasAnimating=
!1;f._currMoveAxis="";var r=f.st.minSlideOffset;g=g?b.originalEvent.changedTouches[0]:f.pointerEnabled?b.originalEvent:b;var m=d?g.pageX:g.pageY,p=f._startPagePos;g=f._accelerationPos;var q=f.currSlideId,s=f.numSlides,v=d?f._horDir:f._verDir,u=f._loop;Math.abs(m-p);g=m-g;d=(new Date).getTime()-f._startTime;d=Math.abs(g)/d;if(0===v||1>=s)a(!0,d);else{if(!u&&!e)if(0>=q){if(0<v){a(!0,d);return}}else if(q>=s-1&&0>v){a(!0,d);return}if(e){h=f._thumbsPosition;if(h>f._thumbsMinPosition)h=f._thumbsMinPosition;
else if(h<f._thumbsMaxPosition)h=f._thumbsMaxPosition;else{m=d*d/0.006;l=-f._thumbsPosition;p=f._thumbsContainerSize-f._thumbsViewportSize+f._thumbsPosition;0<g&&m>l?(l+=f._thumbsViewportSize/(15/(m/d*0.003)),d=d*l/m,m=l):0>g&&m>p&&(p+=f._thumbsViewportSize/(15/(m/d*0.003)),d=d*p/m,m=p);l=Math.max(Math.round(d/0.003),50);h+=m*(0>g?-1:1);if(h>f._thumbsMinPosition){f._animateThumbsTo(h,l,!0,f._thumbsMinPosition,200);return}if(h<f._thumbsMaxPosition){f._animateThumbsTo(h,l,!0,f._thumbsMaxPosition,200);
return}}f._animateThumbsTo(h,l,!0)}else l=function(a){var b=Math.floor(a/f._slideSize);a-b*f._slideSize>r&&b++;return b},p+r<m?0>v?a(!1,d):(l=l(m-p),f._moveTo(f.currSlideId-l,c(Math.abs(f._sPosition-(-f._realId-f._idOffset+l)*f._slideSize)/d),!1,!0,!0)):p-r>m?0<v?a(!1,d):(l=l(p-m),f._moveTo(f.currSlideId+l,c(Math.abs(f._sPosition-(-f._realId-f._idOffset-l)*f._slideSize)/d),!1,!0,!0)):a(!1,d)}}},_setPosition:function(b){b=this._sPosition=b;this._useCSS3Transitions?this._slidesContainer.css(this._xProp,
this._tPref1+(this._slidesHorizontal?b+this._tPref2+0:0+this._tPref2+b)+this._tPref3):this._slidesContainer.css(this._slidesHorizontal?this._xProp:this._yProp,b)},updateSliderSize:function(b){var e,c;if(this.st.autoScaleSlider){var a=this.st.autoScaleSliderWidth,f=this.st.autoScaleSliderHeight;this.st.autoScaleHeight?(e=this.slider.width(),e!=this.width&&(this.slider.css("height",f/a*e),e=this.slider.width()),c=this.slider.height()):(c=this.slider.height(),c!=this.height&&(this.slider.css("width",
a/f*c),c=this.slider.height()),e=this.slider.width())}else e=this.slider.width(),c=this.slider.height();if(b||e!=this.width||c!=this.height){this.width=e;this.height=c;this._wrapWidth=e;this._wrapHeight=c;this.ev.trigger("rsBeforeSizeSet");this.ev.trigger("rsAfterSizePropSet");this._sliderOverflow.css({width:this._wrapWidth,height:this._wrapHeight});this._slideSize=(this._slidesHorizontal?this._wrapWidth:this._wrapHeight)+this.st.slidesSpacing;this._imagePadding=this.st.imageScalePadding;for(e=0;e<
this.slides.length;e++)b=this.slides[e],b.positionSet=!1,b&&b.images&&b.isLoaded&&(b.isRendered=!1,this._resizeImage(b));if(this._cloneHolders)for(e=0;e<this._cloneHolders.length;e++)b=this._cloneHolders[e],b.holder.css(this._reorderProp,(b.id+this._idOffset)*this._slideSize);this._updateBlocksContent();this._isMove&&(this._useCSS3Transitions&&this._slidesContainer.css(this._vendorPref+"transition-duration","0s"),this._setPosition((-this._realId-this._idOffset)*this._slideSize));this.ev.trigger("rsOnUpdateNav")}this._sliderOffset=
this._sliderOverflow.offset();this._sliderOffset=this._sliderOffset[this._reorderProp]},appendSlide:function(b,e){var c=this._parseNode(b);if(isNaN(e)||e>this.numSlides)e=this.numSlides;this.slides.splice(e,0,c);this.slidesJQ.splice(e,0,n('<div style="'+(this._isMove?"position:absolute;":this._opacityCSS)+'" class="rsSlide"></div>'));e<this.currSlideId&&this.currSlideId++;this.ev.trigger("rsOnAppendSlide",[c,e]);this._refreshSlides(e);e===this.currSlideId&&this.ev.trigger("rsAfterSlideChange")},removeSlide:function(b){var e=
this.slides[b];e&&(e.holder&&e.holder.remove(),b<this.currSlideId&&this.currSlideId--,this.slides.splice(b,1),this.slidesJQ.splice(b,1),this.ev.trigger("rsOnRemoveSlide",[b]),this._refreshSlides(b),b===this.currSlideId&&this.ev.trigger("rsAfterSlideChange"))},_refreshSlides:function(b){var e=this;b=e.numSlides;b=0>=e._realId?0:Math.floor(e._realId/b);e.numSlides=e.slides.length;0===e.numSlides?(e.currSlideId=e._idOffset=e._realId=0,e.currSlide=e._oldHolder=null):e._realId=b*e.numSlides+e.currSlideId;
for(b=0;b<e.numSlides;b++)e.slides[b].id=b;e.currSlide=e.slides[e.currSlideId];e._currHolder=e.slidesJQ[e.currSlideId];e.currSlideId>=e.numSlides?e.goTo(e.numSlides-1):0>e.currSlideId&&e.goTo(0);e._refreshNumPreloadImages();e._isMove&&e._loop&&e._slidesContainer.css(e._vendorPref+e._TD,"0ms");e._refreshSlidesTimeout&&clearTimeout(e._refreshSlidesTimeout);e._refreshSlidesTimeout=setTimeout(function(){e._isMove&&e._setPosition((-e._realId-e._idOffset)*e._slideSize);e._updateBlocksContent();e._isMove||
e._currHolder.css({display:"block",opacity:1})},14);e.ev.trigger("rsOnUpdateNav")},_setGrabCursor:function(){this._hasDrag&&this._isMove&&(this._grabCursor?this._sliderOverflow.css("cursor",this._grabCursor):(this._sliderOverflow.removeClass("grabbing-cursor"),this._sliderOverflow.addClass("grab-cursor")))},_setGrabbingCursor:function(){this._hasDrag&&this._isMove&&(this._grabbingCursor?this._sliderOverflow.css("cursor",this._grabbingCursor):(this._sliderOverflow.removeClass("grab-cursor"),this._sliderOverflow.addClass("grabbing-cursor")))},
next:function(b){this._moveTo("next",this.st.transitionSpeed,!0,!b)},prev:function(b){this._moveTo("prev",this.st.transitionSpeed,!0,!b)},_moveTo:function(b,e,c,a,f){var g=this,d,h,k;g.ev.trigger("rsBeforeMove",[b,a]);k="next"===b?g.currSlideId+1:"prev"===b?g.currSlideId-1:b=parseInt(b,10);if(!g._loop){if(0>k){g._doBackAndForthAnim("left",!a);return}if(k>=g.numSlides){g._doBackAndForthAnim("right",!a);return}}g._isAnimating&&(g._stopAnimation(!0),c=!1);h=k-g.currSlideId;k=g._prevSlideId=g.currSlideId;
var l=g.currSlideId+h;a=g._realId;var n;g._loop?(l=g._updateBlocksContent(!1,l),a+=h):a=l;g._newSlideId=l;g._oldHolder=g.slidesJQ[g.currSlideId];g._realId=a;g.currSlideId=g._newSlideId;g.currSlide=g.slides[g.currSlideId];g._currHolder=g.slidesJQ[g.currSlideId];var l=g.st.slidesDiff,m=Boolean(0<h);h=Math.abs(h);var p=Math.floor(k/g._numPreloadImages),q=Math.floor((k+(m?l:-l))/g._numPreloadImages),p=(m?Math.max(p,q):Math.min(p,q))*g._numPreloadImages+(m?g._numPreloadImages-1:0);p>g.numSlides-1?p=g.numSlides-
1:0>p&&(p=0);k=m?p-k:k-p;k>g._numPreloadImages&&(k=g._numPreloadImages);if(h>k+l)for(g._idOffset+=(h-(k+l))*(m?-1:1),e*=1.4,k=0;k<g.numSlides;k++)g.slides[k].positionSet=!1;g._currAnimSpeed=e;g._updateBlocksContent(!0);f||(n=!0);for(k=e=0;k<a;k++)e+=parseInt(g.slidesJQ[k+1].find(".carousel_group").width())+g.st.slidesSpacing;d=-e;n?setTimeout(function(){g._isWorking=!1;g._animateTo(d,b,!1,c);g.ev.trigger("rsOnUpdateNav")},0):(g._animateTo(d,b,!1,c),g.ev.trigger("rsOnUpdateNav"))},_updateArrowsNav:function(){this.st.arrowsNav&&
(1>=this.numSlides?(this._arrowLeft.css("display","none"),this._arrowRight.css("display","none")):(this._arrowLeft.css("display","block"),this._arrowRight.css("display","block"),this._loop||this.st.loopRewind||(0===this.currSlideId?this._arrowLeft.addClass("rsArrowDisabled"):this._arrowLeft.removeClass("rsArrowDisabled"),this.currSlideId===this.numSlides-1?this._arrowRight.addClass("rsArrowDisabled"):this._arrowRight.removeClass("rsArrowDisabled"))))},_animateTo:function(b,e,c,a,f){function g(){var a;
h&&(a=h.data("rsTimeout"))&&(h!==k&&h.css({opacity:0,display:"none",zIndex:0}),clearTimeout(a),h.data("rsTimeout",""));if(a=k.data("rsTimeout"))clearTimeout(a),k.data("rsTimeout","")}var d=this,h,k,l={};isNaN(d._currAnimSpeed)&&(d._currAnimSpeed=400);d._sPosition=d._currRenderPosition=b;d.ev.trigger("rsBeforeAnimStart");d._useCSS3Transitions?d._isMove?(d._currAnimSpeed=parseInt(d._currAnimSpeed,10),c=d._vendorPref+d._TTF,l[d._vendorPref+d._TD]=d._currAnimSpeed+"ms",l[c]=a?n.rsCSS3Easing[d.st.easeInOut]:
n.rsCSS3Easing[d.st.easeOut],d._slidesContainer.css(l),a||!d.hasTouch?setTimeout(function(){d._setPosition(b)},5):d._setPosition(b)):(d._currAnimSpeed=d.st.transitionSpeed,h=d._oldHolder,k=d._currHolder,k.data("rsTimeout")&&k.css("opacity",0),g(),h&&h.data("rsTimeout",setTimeout(function(){l[d._vendorPref+d._TD]="0ms";l.zIndex=0;l.display="none";h.data("rsTimeout","");h.css(l);setTimeout(function(){h.css("opacity",0)},16)},d._currAnimSpeed+60)),l.display="block",l.zIndex=d._fadeZIndex,l.opacity=0,
l[d._vendorPref+d._TD]="0ms",l[d._vendorPref+d._TTF]=n.rsCSS3Easing[d.st.easeInOut],k.css(l),k.data("rsTimeout",setTimeout(function(){k.css(d._vendorPref+d._TD,d._currAnimSpeed+"ms");k.data("rsTimeout",setTimeout(function(){k.css("opacity",1);k.data("rsTimeout","")},20))},20))):d._isMove?(l[d._slidesHorizontal?d._xProp:d._yProp]=b+"px",d._slidesContainer.animate(l,d._currAnimSpeed,a?d.st.easeInOut:d.st.easeOut)):(h=d._oldHolder,k=d._currHolder,k.stop(!0,!0).css({opacity:0,display:"block",zIndex:d._fadeZIndex}),
d._currAnimSpeed=d.st.transitionSpeed,k.animate({opacity:1},d._currAnimSpeed,d.st.easeInOut),g(),h&&h.data("rsTimeout",setTimeout(function(){h.stop(!0,!0).css({opacity:0,display:"none",zIndex:0})},d._currAnimSpeed+60)));d._isAnimating=!0;d.loadingTimeout&&clearTimeout(d.loadingTimeout);d.loadingTimeout=f?setTimeout(function(){d.loadingTimeout=null;f.call()},d._currAnimSpeed+60):setTimeout(function(){d.loadingTimeout=null;d._animationComplete(e)},d._currAnimSpeed+60)},_stopAnimation:function(b){this._isAnimating=
!1;clearTimeout(this.loadingTimeout);if(this._isMove)if(!this._useCSS3Transitions)this._slidesContainer.stop(!0),this._sPosition=parseInt(this._slidesContainer.css(this._xProp),10);else{if(!b){b=this._sPosition;var e=this._currRenderPosition=this._getTransformProp();this._slidesContainer.css(this._vendorPref+this._TD,"0ms");b!==e&&this._setPosition(e)}}else 20<this._fadeZIndex?this._fadeZIndex=10:this._fadeZIndex++},_getTransformProp:function(){var b=window.getComputedStyle(this._slidesContainer.get(0),
null).getPropertyValue(this._vendorPref+"transform").replace(/^matrix\(/i,"").split(/, |\)$/g),e=0===b[0].indexOf("matrix3d");return parseInt(b[this._slidesHorizontal?e?12:4:e?13:5],10)},_getCSS3Prop:function(b,e){return this._useCSS3Transitions?this._tPref1+(e?b+this._tPref2+0:0+this._tPref2+b)+this._tPref3:b},_animationComplete:function(b){this._isMove||(this._currHolder.css("z-index",0),this._fadeZIndex=10);this._isAnimating=!1;this.staticSlideId=this.currSlideId;this._updateBlocksContent();this._slidesMoved=
!1;this.ev.trigger("rsAfterSlideChange")},_doBackAndForthAnim:function(b,e){var c=this,a=(-c._realId-c._idOffset)*c._slideSize;if(0!==c.numSlides&&!c._isAnimating)if(c.st.loopRewind)c.goTo("left"===b?c.numSlides-1:0,e);else if(c._isMove){c._currAnimSpeed=200;var f=function(){c._isAnimating=!1};c._animateTo(a+("left"===b?30:-30),"",!1,!0,function(){c._isAnimating=!1;c._animateTo(a,"",!1,!0,f)})}},_resizeImage:function(b,e){if(!b.isRendered){var c=b.content,a="rsMainSlideImage",f,g=this.st.imageAlignCenter,
d=this.st.imageScaleMode,h;b.videoURL&&(a="rsVideoContainer","fill"!==d?f=!0:(h=c,h.hasClass(a)||(h=h.find("."+a)),h.css({width:"100%",height:"100%"}),a="rsMainSlideImage"));c.hasClass(a)||(c=c.find("."+a));if(c){var k=b.iW,l=b.iH;b.isRendered=!0;if("none"!==d||g){a="fill"!==d?this._imagePadding:0;h=this._wrapWidth-2*a;var n=this._wrapHeight-2*a,m,p,q={};"fit-if-smaller"===d&&(k>h||l>n)&&(d="fit");if("fill"===d||"fit"===d)m=h/k,p=n/l,m="fill"==d?m>p?m:p:"fit"==d?m<p?m:p:1,k=Math.ceil(k*m,10),l=Math.ceil(l*
m,10);"none"!==d&&(q.width=k,q.height=l,f&&c.find(".rsImg").css({width:"100%",height:"100%"}));g&&(q.marginLeft=Math.floor((h-k)/2)+a,q.marginTop=Math.floor((n-l)/2)+a);c.css(q)}}}}};n.rsProto=u.prototype;n.fn.royalSlider=function(b){var e=arguments;return this.each(function(){var c=n(this);if("object"!==typeof b&&b){if((c=c.data("royalSlider"))&&c[b])return c[b].apply(c,Array.prototype.slice.call(e,1))}else c.data("royalSlider")||c.data("royalSlider",new u(c,b))})};n.fn.royalSlider.defaults={slidesSpacing:8,
startSlideId:0,loop:!1,loopRewind:!1,numImagesToPreload:4,fadeinLoadedSlide:!0,slidesOrientation:"horizontal",transitionType:"move",transitionSpeed:600,controlNavigation:"bullets",controlsInside:!0,arrowsNav:!0,arrowsNavAutoHide:!0,navigateByClick:!0,randomizeSlides:!1,sliderDrag:!0,sliderTouch:!0,keyboardNavEnabled:!1,fadeInAfterLoaded:!0,allowCSS3:!0,allowCSS3OnWebkit:!0,addActiveClass:!1,autoHeight:!1,easeOut:"easeOutSine",easeInOut:"easeInOutSine",minSlideOffset:10,imageScaleMode:"fit-if-smaller",
imageAlignCenter:!0,imageScalePadding:4,usePreloader:!0,autoScaleSlider:!1,autoScaleSliderWidth:800,autoScaleSliderHeight:400,autoScaleHeight:!0,arrowsNavHideOnTouch:!1,globalCaption:!1,slidesDiff:2};n.rsCSS3Easing={easeOutSine:"cubic-bezier(0.390, 0.575, 0.565, 1.000)",easeInOutSine:"cubic-bezier(0.445, 0.050, 0.550, 0.950)"};n.extend(jQuery.easing,{easeInOutSine:function(b,e,c,a,f){return-a/2*(Math.cos(Math.PI*e/f)-1)+c},easeOutSine:function(b,e,c,a,f){return a*Math.sin(e/f*(Math.PI/2))+c},easeOutCubic:function(b,
e,c,a,f){return a*((e=e/f-1)*e*e+1)+c}})})(jQuery,window);
// jquery.rs.bullets v1.0.1
(function(c){c.extend(c.rsProto,{_i5:function(){var a=this;"bullets"===a.st.controlNavigation&&(a.ev.one("rsAfterPropsSetup",function(){a._j5=!0;a.slider.addClass("rsWithBullets");for(var b='<div class="rsNav rsBullets">',e=0;e<a.numSlides;e++)b+='<div class="rsNavItem rsBullet"><span></span></div>';a._k5=b=c(b+"</div>");a._l5=b.appendTo(a.slider).children();a._k5.on("click.rs",".rsNavItem",function(b){a._m5||a.goTo(c(this).index())})}),a.ev.on("rsOnAppendSlide",function(b,c,d){d>=a.numSlides?a._k5.append('<div class="rsNavItem rsBullet"><span></span></div>'):
a._l5.eq(d).before('<div class="rsNavItem rsBullet"><span></span></div>');a._l5=a._k5.children()}),a.ev.on("rsOnRemoveSlide",function(b,c){var d=a._l5.eq(c);d&&d.length&&(d.remove(),a._l5=a._k5.children())}),a.ev.on("rsOnUpdateNav",function(){var b=a.currSlideId;a._n5&&a._n5.removeClass("rsNavSelected");b=a._l5.eq(b);b.addClass("rsNavSelected");a._n5=b}))}});c.rsModules.bullets=c.rsProto._i5})(jQuery);
// jquery.rs.autoplay v1.0.5
(function(b){b.extend(b.rsProto,{_x4:function(){var a=this,d;a._y4={enabled:!1,stopAtAction:!0,pauseOnHover:!0,delay:2E3};!a.st.autoPlay&&a.st.autoplay&&(a.st.autoPlay=a.st.autoplay);a.st.autoPlay=b.extend({},a._y4,a.st.autoPlay);a.st.autoPlay.enabled&&(a.ev.on("rsBeforeParseNode",function(a,c,f){c=b(c);if(d=c.attr("data-rsDelay"))f.customDelay=parseInt(d,10)}),a.ev.one("rsAfterInit",function(){a._z4()}),a.ev.on("rsBeforeDestroy",function(){a.stopAutoPlay();a.slider.off("mouseenter mouseleave");b(window).off("blur"+
a.ns+" focus"+a.ns)}))},_z4:function(){var a=this;a.startAutoPlay();a.ev.on("rsAfterContentSet",function(b,e){a._l2||a._r2||!a._a5||e!==a.currSlide||a._b5()});a.ev.on("rsDragRelease",function(){a._a5&&a._c5&&(a._c5=!1,a._b5())});a.ev.on("rsAfterSlideChange",function(){a._a5&&a._c5&&(a._c5=!1,a.currSlide.isLoaded&&a._b5())});a.ev.on("rsDragStart",function(){a._a5&&(a.st.autoPlay.stopAtAction?a.stopAutoPlay():(a._c5=!0,a._d5()))});a.ev.on("rsBeforeMove",function(b,e,c){a._a5&&(c&&a.st.autoPlay.stopAtAction?
a.stopAutoPlay():(a._c5=!0,a._d5()))});a._e5=!1;a.ev.on("rsVideoStop",function(){a._a5&&(a._e5=!1,a._b5())});a.ev.on("rsVideoPlay",function(){a._a5&&(a._c5=!1,a._d5(),a._e5=!0)});b(window).on("blur"+a.ns,function(){a._a5&&(a._c5=!0,a._d5())}).on("focus"+a.ns,function(){a._a5&&a._c5&&(a._c5=!1,a._b5())});a.st.autoPlay.pauseOnHover&&(a._f5=!1,a.slider.hover(function(){a._a5&&(a._c5=!1,a._d5(),a._f5=!0)},function(){a._a5&&(a._f5=!1,a._b5())}))},toggleAutoPlay:function(){this._a5?this.stopAutoPlay():
this.startAutoPlay()},startAutoPlay:function(){this._a5=!0;this.currSlide.isLoaded&&this._b5()},stopAutoPlay:function(){this._e5=this._f5=this._c5=this._a5=!1;this._d5()},_b5:function(){var a=this;a._f5||a._e5||(a._g5=!0,a._h5&&clearTimeout(a._h5),a._h5=setTimeout(function(){var b;a._z||a.st.loopRewind||(b=!0,a.st.loopRewind=!0);a.next(!0);b&&(a.st.loopRewind=!1)},a.currSlide.customDelay?a.currSlide.customDelay:a.st.autoPlay.delay))},_d5:function(){this._f5||this._e5||(this._g5=!1,this._h5&&(clearTimeout(this._h5),
this._h5=null))}});b.rsModules.autoplay=b.rsProto._x4})(jQuery);
// jquery.rs.active-class v1.0.1
(function(c){c.rsProto._o4=function(){var b,a=this;if(a.st.addActiveClass)a.ev.on("rsOnUpdateNav",function(){b&&clearTimeout(b);b=setTimeout(function(){a._g4&&a._g4.removeClass("rsActiveSlide");a._r1&&a._r1.addClass("rsActiveSlide");b=null},50)})};c.rsModules.activeClass=c.rsProto._o4})(jQuery);


$.fn.tagit = function(){
	return this.each(function(){
		var self = $(this);
		var add = $(".tagit_add", self);
		var choice = $(".tagit_choice", self);
		var value = $(".tagit_value", self);

		

		self.on({
			'click': function(){
				add.find("input").focus();
			}
		})

		self.on({
			'click': function(){
				self.removeChoice($(this));
			}
		}, '.tagit_choice');

		add.on({
			'keypress': function(e){
				var code = (e.keyCode ? e.keyCode : e.which);
				if(code == 13) {
					self.createChoice($(this).val());
					return false;
				}
			},
			'focus': function(){
				self.addClass("state_focus")
			},
			'blur': function(){
				if($(this).val() != '') self.createChoice($(this).val());
				self.stateFocus();

			}
		}, 'input');

		self.createChoice = function(text){
			if(text == '' || text.length < 2) return false;

			var obj = $("<li class='tagit_choice'><span class='tag state_be_removed'>"+text+"</span></li>");
			obj.insertBefore(add);

			add.find("input").val('');

			self.updateValue();
		};

		self.removeChoice = function(obj){
			obj.addClass("tagit_removed").animate({
				width: 0,
				opacity: 0,
				marginRight: 0
			}, 200)

			add.find("input").focus();
			
			setTimeout(function(){
				obj.remove();

				self.updateValue();
			}, 300);
		};

		self.updateValue = function(){
			var input = '';
			
			$(".tagit_choice .tag", self).each(function(i){
				input+=((i==0?'':', ') + $(this).text());
			});

			value.val(input);
		};

		self.stateFocus = function(){
			if($(".tagit_choice", self).length > 0) self.addClass("state_focus");
			else self.removeClass("state_focus");
		}

		self.stateFocus();

	});
}

$.fn.like = function(){
	return this.each(function(){
		var self = $(this);
		var url = self.attr('href');
		var count = $(".like_button_count", self);

		self.on({
			'click': function(){

				 $.ajax({
					url: url+'&ajax=1',
					dataType: 'json',
					success: function(data){
						if(data.status) self.update(data.count, true);
						else self.update(data.count);
					}
				});

				return false;
			}
		});

		self.update = function(newCount, stateActive){
			count.html(newCount);

			if(stateActive) self.addClass("state_active");
			else self.removeClass("state_active");
		};
	});
};

$.fn.fieldState = function(){
	return this.each(function(){
		var self = $(this);

		self.each(function(){
			if(self.val() != '') self.addClass("state_focus");
		}).on({
			'focus': function(){
				self.addClass("state_focus");
			},
			'blur': function(){
				if(self.val() == '') self.removeClass("state_focus");
			}
		})
	})
}