var newHash     = '',
   $mainContent = $('#content');

$('ul#menu li').delegate('a', 'click', function() {
  $('ul#menu li a.active').removeClass('active');
  $(this).addClass('active');
});


$('body').delegate('a', 'click', function() {

if ($(this).hasClass("ajax") ) {  

  a = $(this).attr('href');
  window.location.hash = $(this).attr('href');
  console.log(a);
  $( "#content" ).load( a );
  return false;
}});

var $loading = $('#loading').hide();



$(document)
  .ajaxStart(function () {
    console.log('ajaxStart');
    $loading.show();
  })
  .ajaxStop(function () {
    $loading.hide();
    console.log('ajaxStop');
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
    $("#btn").click(function(){
     console.log('btn-clicked')

     var vtitle = $("#title").val();
     var vsubtitle = $("#subtitle").val();
     var vcontent = $("#trumbowyg-demo").val();
     alert(vtitle);
  
     if(vtitle !='' && (vsubtitle !='' || vcontent !='')){
     alert(vcontent);
      //add condition based on data-id button atribute and send id to upload.php file
     $.post("../admin/scripts/update.php", //Required URL of the page on server
     { // Data Sending With Request To Server
     "title2":vtitle,
     "subtitle2":vsubtitle,        
     "content2":vcontent,
     },
     function(response,status){ // Required Callback Function
     alert("*----Received Data----*\n\nResponse : " + response+"\n\nStatus : " + status);//"response" receives - whatever written in echo of above PHP script.
     //$("#form")[0].reset();
     });
     }
  else {alert("data emptyIIIII")};
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
