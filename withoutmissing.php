<html>


<!-- blur comes here -->
<!-- from blurprocess.php -->
<?php
	if(isset($_POST['submit'])) {
		$data = "";
		for ($i = 1;$i<=10 ; $i++) {
			$question = "sawal" . $i;
			$image = "image" . $i;
			//echo $image;	
			$answer = "answer" . $i;
			$ans_text = "ans_text" . $i;
			$data .= $_POST[$question] . '-' . $_POST[$image] . '-' . $_POST[$answer] . '-' . $_POST[$ans_text] . '-';
		    $data .= ",";
		}
	    //$data = $_POST['q1'] . '-' . $_POST['q2'] . '-' .$_POST['q3'] . '-' ."\n";
	    $data .= $_POST['finaltime_var'];
	    $data .= ";\n\n";



	    /*linking*/
			session_start();
			$new_count=$_SESSION['filetowrite'];
			$file_name="file" . $new_count . ".txt";
			$path_file = "/var/www/research/groups/iab/exptML/results/" . $file_name;


		$ret = file_put_contents($path_file, $data, FILE_APPEND | LOCK_EX);
	    // $ret = file_put_contents('/tmp/blurdata.txt', $data, FILE_APPEND | LOCK_EX);
	    if($ret === false) {
		die('There was an error writing this file');
	    }
	    else {
		// echo "$ret bytes written to file";
	    }
	}
	else {
	   die('no post data to process');
	}


?>






<head>

	<style>
		table,th,td
		{
			border:0px solid black;
			border-collapse:collapse;
		}
	</style>

	<center><h2> Form 3</h2> <p>

	For each of the image shown, write the corresponding label.<br>
	<br>
	The ten different possible labels are: <b>Automobile, Bird, Cat, Deer, Dog, Frog, Horse, Ship, Truck, Airplane </b>
	</p></center>

</head>

<body>

<center>
	<h1><br></h1>
	<table style="width:1000px">

<form action="missing.php" method="POST">
	
	<script type="text/javascript">
		//arr contains random numbers from 1-937, to select randomly an image from a class
		var arr = []
		var class_random = []
		var question = []
		
		while(arr.length < 21){
		  var randomnumber=Math.ceil(Math.random()*937)
		 
		  var rr=Math.ceil(Math.random()*10)
		  var q=Math.ceil(Math.random()*10)
		  
		  arr[arr.length]=randomnumber;
		  class_random[class_random.length]=rr;
		  question[question.length]=q;
		}
	

		var openTime = new Date();
		
		function getStart(){
			return openTime;
		}


 		
		  
		  for(var i=1;i<=10;i++){

		  	if(i==1 || i== 5 || i==9){
		  		document.write('<tr>');
		  	}

		  	document.write('<td>');	


		    var str="/data/original/"+ class_random[i] + "/"+ class_random[i] + "_o_" + arr[i] + ".jpg";

		    // document.write (str);
		    
		    // document.write ('<br>');
		    /*sawal is the question asked variable question is used*/
		    /*ans is true or false, variable used is answer (answer1,answer2...)*/
		    /*text box is if ans given is false, variable used is ans_text*/
		    // document.write ('Q'+i + '. ' + question[i] + '<br><img src="'+str+'"><br>');
		    document.write ('Q'+i + '.<br><img src="'+str+'"><br>');
		    var str_arr=str.split('/');
		    //document.write ('<input type="hidden" name="sawal'+i+'" value="'+question[i]+'">');
		    document.write ('<input type="hidden" name="image'+i+'" value="'+str_arr[str_arr.length-1]+'">');

		    /*document.write ('<input type="radio" name="answer'+i+'" value="True">True<br>');
		    document.write ('<input type="radio" name="answer'+i+'" value="False">False<br>');*/
		    
		    document.write ('<input type="text" name="ans_text'+i+'"><br><br>');
		    
			

			document.write('</td>');
			 /*closing row*/
			if(i==4 || i==8 || i==10){
		  		document.write('</tr>');
		  	}
		  }

		  document.write ('<input type="hidden" name="finaltime_var" id="final_var" value=1111>');
		 
	</script>

	</table>
		 
	
	   

	    <input type="submit" name="submit" value="Save Data" onClick ="FinalTime()"> <br>
	    

	    <script>
	    
	    	function FinalTime(){
	    		var endTime = new Date();
	    		var endH=endTime.getHours(), endM=endTime.getMinutes(), endS=endTime.getSeconds();
	    		// alert("I am an alert box!");
	    		var startTime=getStart();
	    		var startH=startTime.getHours(), startM=startTime.getMinutes(), startS=startTime.getSeconds();
	    		var diff = endTime.getTime() - startTime.getTime(	);

	    		document.getElementById('final_var').value = diff/1000;
	    	}
		</script>

		

</form>


</center>


</body>

	



</html>
