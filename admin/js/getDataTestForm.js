$(document).ready(function(){
	$("#btn").click(function(){

	var vid = $("#id").val();
	var vtitle = $("#title").val();
	var vdescription = $("#trumbowyg-demo").val();
	alert(vid);
	alert(vtitle);
	alert(vdescription);
	if(vid !='' && (vtitle !='' || vdescription !='')){
	
	$.post("scripts/update.php", //Required URL of the page on server
	{ // Data Sending With Request To Server
	"id2":vid,
	"caption2":vtitle, 	 			
	"description2":vdescription,
	},
	function(response,status){ // Required Callback Function
	alert("*----Received Data----*\n\nResponse : " + response+"\n\nStatus : " + status);//"response" receives - whatever written in echo of above PHP script.
	//$("#form")[0].reset();
	});
	}
	else {alert("data emptyIIIII")};
	});
	});