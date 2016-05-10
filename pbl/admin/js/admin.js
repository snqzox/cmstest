

$(document).ready(function(){
	var url = window.location.href;     
	var res = url.split("/");
	var currentPage = res[res.length-1];
	console.log("detected url: " + currentPage);
	var subpage = currentPage.split('-');
	console.log(subpage[0]);
		if (subpage[0] == 'article'){
			$('ul#menu li ul li a[href="page-articles.php"]').addClass('active');	
		}
		if (subpage[0] == 'reference'){
			$('ul#menu li ul li a[href="page-references.php"]').addClass('active');	
		}
		if (subpage[0] == 'service'){
			$('ul#menu li ul li a[href="page-services.php"]').addClass('active');	
		}



	$('ul#menu li ul li a').each(function(){
		

		var li = ($( this ).attr('href') );
		console.log(li);
		if (li == currentPage){
			$( this ).addClass('active');
		}
		
		
	});

	$('#trumbowyg-demo').trumbowyg({
        fullscreenable: false,
        closable: true,
        semantic: true,
        removeformatPasted: true,
        resetCss: true,
        autogrow: true,
        lang: 'cs',
        btnsAdd: ['|', 'foreColor', 'backColor'],
        btns: ['bold', 'italic', 'underline', 'formatting', '|','justifyLeft', 'justifyCenter', 'justifyRight','|', 'link', 'insertImage','|','viewHTML']
    });
	
});