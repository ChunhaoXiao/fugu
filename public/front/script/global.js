function suofangFn(a, b) {
	var c = document.documentElement.clientWidth || document.body.clientWidth,
		d = document.documentElement.clientHeight || document.body.clientHeight;
	a = document.getElementById(a);
	suofang = c / b;
	d /= suofang;
	if (c <= 750) {
		a.style.position = "relative";
		a.style.left = "0px";
		a.style.top = "0px";
		a.style.width = b + "px";
		a.style.overflow = "hidden";
		a.style.minHeight = d + "px";
		a.style.transformOrigin = "left top 0px";
		a.style.webkitTransformOrigin = "left top 0px";
		a.style.transform = "scale(" + suofang + ")";
		a.style.webkitTransform = "scale(" + suofang + ")";
		$(".nav").css({
			transformOrigin: "left bottom 0px",
			webkitTransformOrigin: "left bottom 0px",
			transform: "scale(" + suofang + ")",
			webkitTransform: "scale(" + suofang + ")"
		})
	} else {
		a.style = "";
		var oHeight = document.documentElement.clientHeight || document.body.clientHeight;
		a.style.minHeight = oHeight + "px";
	}
}
window.setTimeout(function(){
	suofangFn("innerbox", 750);
},200);
var oHeight = document.documentElement.clientHeight || document.body.clientHeight;
$("body").css({
	minHeight: oHeight
});
var orientation = 0,
	otime = null;

function screenOrientationEvent() {
	window.clearTimeout(otime);
	otime = window.setTimeout(function() {
		suofangFn("innerbox", 750);
	}, 300);
}
var innerWidthTmp = window.innerWidth;

function screenOrientationListener() {
	try {
		var a = window.innerWidth;
		a != innerWidthTmp && (orientation = a > window.innerHeight ? 90 : 0, screenOrientationEvent(), innerWidthTmp = a)
	} catch (b) {
		alert(b);
	}
	setTimeout("screenOrientationListener()", 500);
}
screenOrientationListener();