$('#fileToUploadStudios').bind('change', function() {

	var totalsize = 0;
		for (var i = 0; i < this.files.length; ++i) {
  			

  			var name = this.files.item(i).name;
  			//alert("here is a file name: " + name);
		    var size = this.files.item(i).size;
		    var type = name.split('.').pop();
		    //type = '.pdf';
		    typeLowerCase = type.toLowerCase();
		    console.log(typeLowerCase);
		    totalsize += size;
		    if (size > 30000000 || totalsize > 30000000 ){

		    		alert('Size of files must be less than 30MB');
					document.getElementById("fileToUploadStudios").value = "";
		    		break;

		    }
		
		  	if (typeLowerCase == 'jpg' || 
		  	   typeLowerCase == 'jpeg' || 
		  	   typeLowerCase == 'gif' || 
		  	   typeLowerCase == 'bmp' || 
		  	   typeLowerCase == 'png' || 
		  	   typeLowerCase == 'tiff') {
		    		
		    	
    		 } 
    		 else {

    		 		alert('Please upload pictures only.');
			 		document.getElementById("fileToUploadStudios").value = "";
    		 }
		}	

});

