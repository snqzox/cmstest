$(window).load(function(){
  //your code here
});
$(function() {
	var $appeared = $('#appeared');
	var $disappeared = $('#disappeared');
	$('.animate').appear();

	$(document.body).on('appear', '.animate', function(e, $affected) {
		$(this).addClass('visible');
	});

/*	$(document.body).on('disappear', '.animate', function(e, $affected) {
		$(this).removeClass('visible');
	});*/
});
$('.menu-expander').click(function(){
	console.log('ta');
	$('#menu > ul').slideToggle();
});

$(function() {

	// URL detection
	var url = window.location.href;     
	var res = url.split("/");
	var tempRes = res[res.length - 1].split("#");
	var finalRes = tempRes[0];
	console.log("detected url: " + finalRes);
	var pages = ["granty-a-dotace.php", "realitni-cinnost.php", "projekcni-atelier.php", "nakladni-autodoprava.php"];
	var isSubpage = $.inArray(finalRes, pages) > -1;
	if (isSubpage == true){
		$('#menu > ul > li > a[href="index.php#sluzby"]').addClass("active");
		$(window).scroll(function(){
			var scrollPos = $(document).scrollTop();
		    if (scrollPos <= 20) {
		        $('#top-stripe').removeClass('shrinked');
		        $('.subpage:not(#reference) h1').removeClass('sticky');
		    }
		    else{
		        $('#top-stripe').addClass('shrinked');
		        $('.subpage:not(#reference) h1').addClass('sticky');
		    }
		});

	}
	else{
		$(window).scroll(function(){
			var scrollPos = $(document).scrollTop();
		    if (scrollPos <= 200) {
		        $('#top-stripe').removeClass('shrinked');
		    }
		    else{
		        $('#top-stripe').addClass('shrinked');
		    }
		    $('#menu > ul > li > a').each(function () {
		        var currLink = $(this);
		        var refElementTemp = $(currLink.attr("href").split("#"));
				var refElement = $('#' + refElementTemp[1]);

				//change active nav item while scrolling
			
		        if (refElement.length && refElement.position().top <= scrollPos + 180 && refElement.position().top + refElement.height() > scrollPos) {
		            $('#menu > ul > li > a').removeClass("active");
		            currLink.addClass("active");
		        }
		        else{
		            currLink.removeClass("active");
		        }
		    });	
		});

		    
		    //smoothscroll while click on nav item
		    $('#menu > ul > li > a[href^="index.php#"]').on('click', function (e) {
		        e.preventDefault();
		        $(document).off("scroll");
		        
		        $('a').each(function () {
		            $(this).removeClass('active');
		        })
		        $(this).addClass('active');
		      
		        var target = this.hash,
		            menu = target;
		        $target = $(target);
		        console.log(target);

		        if (target.length) {
				   $('html, body').stop().animate({
		            'scrollTop': $target.offset().top+2
		        }, 1500, 'swing', function () {
		            window.location.hash = target;
		        });
				} 
		       
		    });

		
	}

});





