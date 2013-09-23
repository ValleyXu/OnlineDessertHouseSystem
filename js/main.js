




(function ($) {



	//$( "#datepicker" ).datepicker({ dateFormat: 'yy-mm-dd'});

	// $("#cu").live('click', function(e){
	// 	e.preventDefault();
	// 	$.get('/valley/index.php/site/toCu', {}, function( view ) {
	// 		$('#body').empty().html( view );
	// 	});
	// });

	$("div.slide").live('click',function(e){
		$.get('/valley/index.php/dessertsold/DsMember', {}, function( view ) {
			//$('#body').empty().html( view );
			//window.open(view);
		});
	});
	
	$('input#userDelBtn').live('click',function(){
		$('p.msg').remove();
		if($('input#userNameDel').val()==""){
			$('div#right').append("<p style='color:#EA0000' class='msg'>Please input a UserName!</p>");
		}
		else{
		$.post(
			'/valley/index.php/MemberPage/mpAdminDel',
			{uname:$('input#userNameDel').val()},
			function(msg){
				$('div#right').append(msg);
			}
			);
		}
	});


	$('input#userModiBtn').live('click',function(){
		$('p.msg').remove();
		if($('input#userNameModi').val()==""){
			$('div#right').append("<p style='color:#EA0000' class='msg'>Please input a UserName!</p>");
		}
		else{
		$.post(
			'/valley/index.php/MemberPage/mpAdminModi',
			{iname:$('input#userNameModi').val()},
			function(msg){
				if(msg=="<p style='color:#EA0000' class='msg'>No Such User!</p>")
					$('div#right').append(msg);
				else{
					$('html').empty();
					$('html').append(msg);
				}
			}
			);
		}
	});

	$('input#userQuitBtn').live('click',function(){
		$('p.msg').remove();
		if($('input#userNameQuit').val()==""){
			$('div#right').append("<p style='color:#EA0000' class='msg'>Please input a UserName!</p>");
		}
		else{
		$.post(
			'/valley/index.php/MemberPage/MpSaleQuit',
			{iname:$('input#userNameQuit').val()},
			function(msg){
					$('div#right').append(msg);
			}
			);
		}
	});

	$('input#userRechargeBtn').live('click',function(){
		$('p.msg').remove();

		if($('input#userNameRecharge').val()==""){
			$('div#right').append("<p style='color:#EA0000' class='msg'>Please input a UserName!</p>");
		}
		else{
		$.post(
			'/valley/index.php/MemberPage/MpSaleRecharge',
			{
				iname:$('input#userNameRecharge').val(),
				imoney:$('select#rechargeSelect').val()
			},
			function(msg){
				$('div#right').append(msg);
			}
			);
		}
	});

	$('input#buy').live('click',function(){
		$('p.msg').remove();
		//var snum = $('input#Goods_snum').val();
		//var availnum = parseInt($('p#access').text());
		//alert($('input#userBuy').val());
		//alert($('input#goodsBuy').val());
		//alert($('input#buyNum').val());
		if($('input#userBuy').val()==""||$('input#goodsBuy').val()==""||$('input#buyNum').val()==""){
			$('div#right').append("<p style='color:#EA0000' class='msg'>Please complete!</p>");
		}
		else if(isNaN($('input#buyNum').val())){
			$('div#right').append("<p style='color:#EA0000' class='msg'>Please input a number to buy!</p>");
		}
		else{
		$.post(
			'/valley/index.php/DessertSorA/DsSalesman',
			{
				iname:$('input#userBuy').val(),
				gname:$('input#goodsBuy').val(),
				snum:$('input#buyNum').val(),
				stime:$('input#datepicker').val()
			},
			function(msg){
				$('div#right').append(msg);
			}
			);
		}
	});

	$('input#goodsDelBtn').live('click',function(){
		$('p.msg').remove();
		if($('input#goodsNameDel').val()==""){
			$('div#right').append("<p style='color:#EA0000' class='msg'>Please input a Goods Name!</p>");
		}
		else{
		$.post(
			'/valley/index.php/DessertSorA/dsAdminDel',
			{gname:$('input#goodsNameDel').val()},
			function(msg){
				$('div#right').append(msg);
			}
			);
		}
	});


	$('input#goodsModiBtn').live('click',function(){
		$('p.msg').remove();
		if($('input#goodsNameModi').val()==""){
			$('div#right').append("<p style='color:#EA0000' class='msg'>Please input a Goods Name!</p>");
		}
		else{
		$.post(
			'/valley/index.php/DessertSorA/dsAdminModi',
			{gname:$('input#goodsNameModi').val()},
			function(msg){
				if(msg=="<p style='color:#EA0000' class='msg'>No Such Goods!</p>")
					$('div#right').append(msg);
				else{
					$('html').empty();
					$('html').append(msg);
				}
			}
			);
		}
	});
///////ending
	//imf.create("imageFlow", 0.15, 1.5, 10);
	$('input#yearBtn').live('click',function(){
		
		$('p.msg').remove()
			if(isNaN($('input#year').val())||$('input#year').val()==""){
				$('div#right').append("</br><p style='color:#EA0000' class='msg'>Please input a year! </p>");
				return false;
			}
			else {
				var year = $('input#year').val();
				var yearNum = parseInt(year);
				if(yearNum<2010||yearNum>3000){
					$('div#right').append("</br><p style='color:#EA0000' class='msg'>Sorry, We don't have the Valley Dessert in this year! </p>");
					return false;
				}
				else
				{
					$.post(
					'/valley/index.php/Chart/chartYear',
					{
						year:yearNum
						//}
					},
					function(msg){
						$('body').empty();
						$('body').append(msg);
	//如果用html.empty;则包含在html中的script没有执行，why?					
					}
					);

				}
			}
	});

})(jQuery);


	

