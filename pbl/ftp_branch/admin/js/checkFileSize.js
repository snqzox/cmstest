$('#fileToUpload').bind('change', function() {
	
	var totalsize = 0;

		for (var i = 0; i < this.files.length; ++i) {
  			

  			var name = this.files.item(i).name;
  			//alert("here is a file name: " + name);
		    var size = this.files.item(i).size;
		    
		    totalsize += size;
		    if (size > 30000000 || totalsize > 30000000 ){

		    		alert('Size of files must be less than 30MB');
					document.getElementById("fileToUpload").value = "";
		    		break;

		    }
		}	
		

  //this.files[0].size gets the size of your file.

});

