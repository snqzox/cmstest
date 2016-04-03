var newHash     = '',
   $mainContent = $('#content');




$('ul#menu li').delegate('a', 'click', function() {
  $('ul#menu li a.active').removeClass('active');
  $(this).addClass('active');
});


$('body').delegate('a', 'click', function() {

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
    $('#trumbowyg-demo').trumbowyg({
        fullscreenable: false,
        closable: true,
        semantic: false,
        removeformatPasted: true,
        resetCss: false,
        autogrow: true,
        lang: 'cs',
        btnsAdd: ['|', 'foreColor', 'backColor'],
        btns: ['bold', 'italic', 'underline', 'formatting', '|','justifyLeft', 'justifyCenter', 'justifyRight','|', 'link', 'insertImage','|','viewHTML']
    });
  });

function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('#blah')
                .attr('src', e.target.result);
        };

        reader.readAsDataURL(input.files[0]);
    }
}
