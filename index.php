




<html>
<!--  index.php              ***Same as favrest.html***
      Jeff Goldberg
      Type Ahead function          -->


 	<head>
 	<title>My Favorite Restaurants</br></br></title>
 	</head>
 	<body> 
	
	<script src='/jquery-2.1.4.min.js'></script>

	<script>
	
	//Get input on keyup to get entry characters - AJAX
	
	$(document).ready(function(){
		var returndata = [];  //clear return data in preparation for backspace character delete to null entry (edge case)	
		$( "#rest" ).keyup(function(){
		
			var $table = $( "<table id='tab' name='tab'></table>" );
			var searchterm2=document.getElementById("rest").value;

//          Callback to database to match characters entered
			$.ajax({
				type: "POST",
				url: './db.php',
				data: ({searchterm: searchterm2}),
				success: function(data){           //upon return from callback process data			
				        
					var names = data.split(",");//create array from comma sep list
					var i=0;
					var len = names.length;

					var half = (len/2);  //first half is restaurant names, second half is cuisines Split & display as pairs
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
						var cui = names[split];    //split allows to index to the (i)th cui
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
 	<h2 style="color:green">Find your favorite:</h2> <h4 style="color:green">Enter Name or Cuisine</h4></br><input type="text" id="rest" placeholder="Enter Rest. Name or Cuisine" style=color:blue></BR></BR></BR> 
   
	<div id="myDiv"><div>

<br />

 

</body>
</html>




 




  







