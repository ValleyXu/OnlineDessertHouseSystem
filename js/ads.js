

	

$(function(){
   var len  = $(".num > li").length;
	 var index = 0;
	 var adTimer;
	 $(".num li").mouseover(function(){
		index  =   $(".num li").index(this);
		showImg(index);
	 }).eq(0).mouseover();	
	 
	
	 $('.ad').hover(function(){
			 clearInterval(adTimer);
		 },function(){
			 adTimer = setInterval(function(){
			    showImg(index)
				index++;
				if(index==len){index=0;}
			  } , 2000);
	 }).trigger("mouseleave");
	 
	 $(".close").mouseover(function(){
	 	$(".close").addClass("on");
	});
	
	$(".close").mouseout(
	 	function(){
	 		$(".close").removeClass("on");
	 });
	 
	$(".close").click(function(){
		$(".ad").hide();
	});
})


function showImg(index){
        var adHeight = $(".content_right .ad").height();
		$(".slider").stop(true,false).animate({bottom : -adHeight*index},1000);
		$(".num li").removeClass("on")
			.eq(index).addClass("on");
}
	