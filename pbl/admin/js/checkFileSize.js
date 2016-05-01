$('#fileToUpload').bind('change', function() {

		for (var i = 0; i < this.files.length; ++i) {
  			

  			var name = this.files.item(i).name;
  			//alert("here is a file name: " + name);
		    var size = this.files.item(i).size;
		    
		    if (size > 3000000){

		    		alert('Size of file ' + name +  '  must be less than 3MB');
					document.getElementById("fileToUpload").value = "";
		    		break;

		    }
		}	
		

  //this.files[0].size gets the size of your file.

	});