

(function( $ ){

		var theInt = null;
		var $crosslink, $navthumb;
		var curclicked = 0;
		
		theInterval = function(cur){
			clearInterval(theInt);
			
			if( typeof cur != 'undefined' )
				curclicked = cur;
			
			$crosslink.removeClass("active-thumb");
			$navthumb.eq(curclicked).parent().addClass("active-thumb");
				$(".stripNav ul li a").eq(curclicked).trigger('click');
			
			theInt = setInterval(function(){
				$crosslink.removeClass("active-thumb");
				$navthumb.eq(curclicked).parent().addClass("active-thumb");
				$(".stripNav ul li a").eq(curclicked).trigger('click');
				curclicked++;
				if( 6 == curclicked )
					curclicked = 0;
				
			}, 2000);
		};
		
		$(function(){
			
			$("#main-photo-slider").codaSlider();
			
			$navthumb = $(".nav-thumb");
			$crosslink = $(".cross-link");
			
			$navthumb
			.click(function() {
				var $this = $(this);
				theInterval($this.parent().attr('href').slice(1) - 1);
				return false;
			});
			
			theInterval();
		});

	$("form #loginBtn").live('click',function(e){
		console.log("hello");
	// 	e.preventDefault();
	// 	$('p.msg').remove();
	// 	if($('div.box input#username').val()==""){
	// 		$('div.box').append("<p style='color:#EA0000' class='msg'>Please input a UserName!</p>");
	// 	}
	// 	else if($('div.box input#password').val()==""){
	// 		$('div.box').append("<p style='color:#EA0000' class='msg'>Please input password!</p>");
	// 	}
	// 	else{
	// 		$.post(
	// 			'/valley/index.php/DessertSold/login',
	// 			{
	// 				'username':$('div.box input#username').val(),
	// 				'password':$('div.box input#password').val()	
	// 			},
	// 			function(msg){
	// 				 if(msg=="<p style='color:#EA0000' class='msg'>password or UserName Error!</p>")
	// 					$('div.box').append(msg);

	// 			}
	// 		);
	// 	}
	});

///////////////ads js
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
/////
	// $('form#Sale-dsBuyNow-form').submit(function(e){
	// 	e.preventDefault();
	// });

	$('div#goodBuy a.button').live('click',function(e){
		var snum = $('input#Goods_snum').val();
		var availnum = parseInt($('p#access').text());
		e.preventDefault();
		$('p.msg').remove();
		if($('input#Goods_siid').val()==-1){
			//window.location.href="#loginformm";
			$('div.box').append("<p style='color:#EA0000' class='msg'>Please Login First! </p>");
		}
		else
		{
			if((snum<=0)||(isNaN( snum )) ){
				$('div#error').empty().append("</br><p style='color:#EA0000' class='msg'>Please input the amount of buying! </p>");
				return false;
			}
			else if(snum > availnum){
				$('div#error').empty().append("</br><p style='color:#EA0000' class='msg'>Sorry, there are not enough cakes! </p>");
				return false;
			}
			else
			{
				$.post(
				'/valley/index.php/SingleGoodSold/DsBuyNow',
				{
					siid:$('input#Goods_siid').val(),
					sgid:$('input#Goods_sgid').val(),
					snum:$('input#Goods_snum').val(),
					stime:$('input#datepicker').val()
				},
				function(msg){
					$('div#error').append(msg);
					//$('body').remove();
					//$('body').append(msg);	
				}
				);

			}
		}
	});

	$('a.button').live('click',function(){
			$('p.msg').remove();

			$('div.box').append("<p style='color:#EA0000' class='msg'>Please Login First! </p>");

	});

	/////ending
}) ( jQuery );

function showImg(index){
        var adHeight = $(".content_right .ad").height();
		$(".slider").stop(true,false).animate({bottom : -adHeight*index},1000);
		$(".num li").removeClass("on")
			.eq(index).addClass("on");
}

