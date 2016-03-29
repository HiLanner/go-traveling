function animateImg(){
	var img = $("#img-show-li").children("li");
	var imgLen = $("#img-show-li").children("li").length;
	var nav = $("#nav-btn-li").children("li");
	var navLen = $("#nav-btn-li").children("li").length;
    var timer;
    var index = 0;
    $(img).eq(index).show();
	timer=setInterval(imgShow,2000);
	function imgShow(){
		$(img).eq(index).fadeOut(500);
		$(nav).eq(index).children("img").removeClass("img_here");
		index++;
		if (index>=imgLen) {
			index=0;
		};
		$(img).eq(index).fadeIn(500);
		$(nav).eq(index).children("img").addClass("img_here");
	}
	$(nav).each(function(num){
		$(this).mouseenter(function(){
            clearInterval(timer);
            $(this).siblings("li").children("img").removeClass("img_here");
            $(this).children("img").addClass("img_here");
            $(img).fadeOut("500");
            $(img).eq(num).fadeIn("500");
	    })
	});
	$(nav).each(function(num){
		$(this).mouseleave(function(){
			$(this).removeClass("img_here");
            $(img).fadeOut("500");
			index = num;
			timer=setInterval(imgShow,2000);
	});
	});
}
function toggleTab(){
	var datesNavLi = $("#dates-nav-ul").children("li");
	var date = $(".date");
	var width = date.eq(0).width();
	$(datesNavLi).each(function(index){
		$(this).mouseenter(function(){
		     $(this).siblings().removeClass("date-here");
		     $(this).addClass("date-here");			
			 var index=$(this).index();
			 $(date).animate({left:-width*index},400);
		});
	});
}
function searchNav(){
	var lis = $(".choose_btn").children("li");
	$(lis).eq(0).addClass("lihover");
	$(lis).click(function(){
		$(this).siblings().removeClass("lihover");
		$(this).addClass("lihover");
	})
}
function showDetail(){
	var hotelDetailLi = $(".hotel-detail").children("li");
	var goTop = hotelDetailLi.eq(0).position().top;
	$(hotelDetailLi).mouseenter(function(){
		$(this).animate({top:0},400);
	})
	$(hotelDetailLi).mouseleave(function(){
		$(this).animate({top:goTop},400);
	})
}
function hotRoadLine(){
	var lineNavLi = $("#line-nav-ul").children("li");
	var city = $(".city");
	var width = city.eq(0).width();
	$(lineNavLi).eq(0).addClass("line-nav-li-here");
	$(lineNavLi).each(function(index){
		$(this).click(function(){
		     $(this).siblings().removeClass("line-nav-li-here");
		     $(this).addClass("line-nav-li-here");			
			 var index=$(this).index();
			 $(city).animate({left:-width*index},400);
		});
	});
}
$(document).ready(function(){
	hotRoadLine();
	animateImg();
	toggleTab();
	searchNav();
	showDetail();
});