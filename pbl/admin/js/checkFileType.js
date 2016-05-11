$('#fileToUploadStudios').bind('change', function() {

		for (var i = 0; i < this.files.length; ++i) {
  			

  			var name = this.files.item(i).name;
  			//alert("here is a file name: " + name);
		    var size = this.files.item(i).size;
		    var type = name.split('.').pop();
		    //type = '.pdf';
		    typeLowerCase = type.toLowerCase();
		    console.log(typeLowerCase);

		    if (size > 3000000){

		    		alert('Size of file ' + name +  '  must be less than 3MB');
					document.getElementById("fileToUploadStudios").value = "";
		    		break;

		    }
		
		  	if (typeLowerCase == 'jpg' || 
		  	   typeLowerCase == 'jpeg' || 
		  	   typeLowerCase == 'gif' || 
		  	   typeLowerCase == 'bmp' || 
		  	   typeLowerCase == 'png' || 
		  	   typeLowerCase == 'tiff') {
		    		
		    	return true;
    		 } 
    		 else {

    		 		alert('Please upload pictures only.');
			 		document.getElementById("fileToUploadStudios").value = "";
    		 }
		}	

});

