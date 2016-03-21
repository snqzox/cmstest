var newHash     = '',
   $mainContent = $('#content');

$('ul#menu').delegate('li', 'click', function() {
	a = $(this).attr('href');
	window.location.hash = $(this).attr('href');
	console.log(a);
	$( "#content" ).load( a );
	return false;
});

var $loading = $('#loading').hide();
$(document)
  .ajaxStart(function () {
    $loading.show();
  })
  .ajaxStop(function () {
    $loading.hide();
  });
