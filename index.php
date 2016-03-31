	<html>
 	<head>
 	<title>My Favorite Restaurants</br></br></title>
 	</head>
 	<body> 
	
	<script src='/jquery-2.1.4.min.js'></script>

	<script>
	
	//Get input on keyup to get entry characters
	
	$(document).ready(function(){
		var returndata = [];	
		$( "#rest" ).keyup(function(){
		
			var $table = $( "<table id='tab' name='tab'></table>" );
			var searchterm2=document.getElementById("rest").value;

			$.ajax({
				type: "POST",
				url: '/gofundme/db.php',
				data: ({searchterm: searchterm2}),
				success: function(data){			

				
					var names = data.split(",");//create array from comma sep list
					var i=0;
					var len = names.length;

					var half = (len/2);//first half is rest names other half is cuisines
					$('#myDiv').html('');
					var $table = $( "<table></table>" );
					var $line = $( "<tr></tr>" );
					$line.append( $( "<td> Restaurant</td>" ).html( ) );
					$line.append( $( "<td>&nbsp&nbsp&nbsp==>&nbsp&nbsp&nbsp</td>" ).html( ) );
					$line.append( $( "<td> &nbsp ==>  &nbsp &nbsp&nbsp ==>&nbsp &nbsp&nbsp   Cuisine</br></br></td>" ).html( ) );
					$table.append( $line );
					for ( i =0; i < half; i++) {

						var nam = names[i];
						var split = i + half;
						var cui = names[split];
						var $line = $( "<tr></tr>" );
						
						
						$line.append( $( "<td></td>" ).html( nam ) );

						$line.append( $( "<td></td>" ).html( cui ) );
						$table.append( $line );
					}


 
				$table.appendTo( $( "#myDiv" ) );	



                        
                        

               
			  
 		   		}
	
			});
		});
	});


</script>
	<center><h1 style="color:blue">Favorite Restaurants</h1></center><br />
 	<h2 style="color:green">Find your favorite:</h2> <h5 style="color:green">key below</h5><input type="text" id="rest" placeholder="Enter Rest. Name or Cuisine" style=color:blue></BR></BR></BR> 
   
	<div id="myDiv"><div>

<br />

 

</body>
</html>


 




  







