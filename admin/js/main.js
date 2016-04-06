
var newHash     = '',
   $mainContent = $('#content');


//detect content in url on page reload
$(document).ready(function(){
var url      = window.location.href;     // Returns full URL
var res = url.split("#");
console.log(res[1]);
$( "#content" ).load( res[1]);  
});

$('ul#menu li').delegate('a', 'click', function() {
  $('ul#menu li a.active').removeClass('active');
  $(this).addClass('active');
});

//load content from menu item click
$('body').delegate('a', 'click', function() {

if ($(this).hasClass("ajax") ) {  

  a = $(this).attr('href');
  window.location.hash = $(this).attr('href');
  console.log(a);
  $( "#content" ).load( a );
  return false;
}});

var $loading = $('#loading').hide();


//show and hide ajax loading
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
      

      if( $(this).hasClass('formvalidation')){
          var formval = $('.req').val();
          if(formval == null || formval == ""){
            updated("vyplnt tomoore");
            return false;
          }
      }
     console.log(formval);

     console.log('btn-clicked')

     var vbtnid =  $(this).attr('data-id');
     var service =  $(this).attr('service-id');
     var vtitle = $("#title").val();
     var vsubtitle = $("#subtitle").val();
     var vcontent = $("#trumbowyg-demo").val();
     var vemail = $("#email").val();
     var vmobile = $("#mobile").val();
     var vcompany = $("#company").val();
     var vaddres = $("#addres").val();
     var vpsc = $("#psc").val();
     var vic = $("#ic").val();
     var vdic = $("#dic").val();
     var vservice_ref = $("#service_ref").val(); //service name in reference

     if(vtitle !='' || vemail !=''){

      switch (vbtnid) {
      case "about":
      //    alert('ABOUT PAGE - main.js');
          $.post("../admin/scripts/update.php", //Required URL of the page on server
          { // Data Sending With Request To Server
          "title2":vtitle,
          "subtitle2":vsubtitle,        
          "content2":vcontent,
          "btnid2":vbtnid,
          },
         function(response,status){ // Required Callback Function
        // alert("*----Received Data----*\n\nResponse : " + response+"\n\nStatus : " + status);//"response" receives - whatever written in echo of above PHP script.
          checkStatus(status);
         });
                break;

      case "main":
          //alert('PAGE MAIN - main.js');
          $.post("../admin/scripts/update.php", //Required URL of the page on server
          { // Data Sending With Request To Server
          "title2":vtitle,
          "subtitle2":vsubtitle,        
          "btnid2":vbtnid,
          },
         function(response,status){ // Required Callback Function
         //alert("*----Received Data----*\n\nResponse : " + response+"\n\nStatus : " + status);//"response" receives - whatever written in echo of above PHP script.
          checkStatus(status);
         });
            break;

      case "contact":
          //alert('PAGE CONTACT - main.js');
          $.post("../admin/scripts/update.php", //Required URL of the page on server
          { // Data Sending With Request To Server
          "email2":vemail,
          "mobile2":vmobile,        
          "company2":vcompany,
          "addres2":vaddres,
          "psc2":vpsc,
          "ic2":vic,
          "dic2":vdic,     
          "btnid2":vbtnid,    
          },
         function(response,status){ // Required Callback Function
         //alert("*----Received Data----*\n\nResponse : " + response+"\n\nStatus : " + status);//"response" receives - whatever written in echo of above PHP script.
          checkStatus(status);
        });
            break;

      case "service":
        //  alert('PAGE SERVICE - main.js');
           $.post("../admin/scripts/update.php", //Required URL of the page on server
          { // Data Sending With Request To Server
          "title2":vtitle,
          "subtitle2":vsubtitle,        
          "content2":vcontent,
          "service2":service,
          "btnid2":vbtnid,
          },
         function(response,status){ // Required Callback Function
      //alert("*----Received Data----*\n\nResponse : " + response+"\n\nStatus : " + status);//"response" receives - whatever written in echo of above PHP script.
          checkStatus(status);
         });
            break;

      case "refrence":
      // alert('PAGE REFERENCE - main.js');
          $.post("../admin/scripts/update.php", //Required URL of the page on server
          { // Data Sending With Request To Server
          "title2":vtitle,
          "content2":vcontent,
          "service_ref":vservice_ref,
          "service2":service,
          "btnid2":vbtnid,
          },
         function(response,status){ // Required Callback Function
   // alert("*----Received Data----*\n\nResponse : " + response+"\n\nStatus : " + status);//"response" receives - whatever written in echo of above PHP script.
          //alert(status);
      checkStatus(status);

         });
            break;
      }
     }
  else {
    alert("data empty")
  };
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

function updated(value){
    $('#sysmsg').text(value);
    $('#sysmsg').fadeIn();
    $('#sysmsg').delay(5000).fadeOut();
}

function checkStatus(statusValue){

  if (statusValue == 'success'){
    updated("Saved");
     
  } else {

    updated("Data did not save!");

  }

}