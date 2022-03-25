
	$(document).bind('keydown','t',function(){
		$("#tumb").click();
	});

	var help = true
	$(document).bind('keydown','h',function(){
		if(help == true){
		$("#help").click();
		help = false;
	}else{
		$("#darkness").click();
		help = true;
	};
	});
	

	$(document).bind('keydown','esc',function(){
		$("#quick-guide").click();
		$(".backsetting").click();
		$(".backbookmark").click();
		$("#thumbbox").fadeOut();
		$(".darkthumbnails").fadeOut();
	});

	$(document).bind('keydown','l',function(){
		$("#light").click();
	});		


	$(document).bind('keydown','f',function(){
		$("#fullscreen").click();
		$(".fullscreen").click();
	});	

	$(document).bind('keydown','m',function(){
		$("#music").click();
	});	

	$(document).bind('keydown','s',function(){
		$("#setting").click();
	});	

	$(document).bind('keydown','=',function(){
		$(".zoomin").click();
		$("#zoomin").click();
	});

	$(document).bind('keydown','-',function(){
		$(".zoomout").click();
		$("#zoomout").click();
	});

	$(document).bind('keydown','x',function(){
		$("#over").click();
	});
	
	$(document).bind('keydown','c',function(){
		$(".copied").click();
	});
		