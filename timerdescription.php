<html>



<!--  withoutime ki php-->
<!-- without time comes here -->
<?php
	
	// if(isset($_POST['next']) || isset($_POST['sub'])) {
	if(isset($_POST['next'])) {
		$data = "\n";
		$data .= $_POST['Mainclass_displayed'];
		$data .= ",";
		// for ($i = 1;$i<=3 ; $i++) {
		// 	$image = "image" . $i;
		// 	echo $image;
		// 	$question = "q" . $i;
		// 	$data .= $_POST[$image] . '-' . $_POST[$question] . '-';
		    
		// }
	    //$data = $_POST['q1'] . '-' . $_POST['q2'] . '-' .$_POST['q3'] . '-' ."\n";

	    // $data .= $_POST['ele1'];


	    // $data .= "\n";
	    // /*i have to set this varibale given on how many images are displayed*/
	    $n=100;
	    for ($i=1; $i<=$n ; $i++) { 
	    	$id="check" . $i;
	    	// echo "$id";
	    	$tmp=$_POST[$id];

	    	// echo "$tmp";

	    	if(isset($_POST[$id])){
	    		$image = "image" . $i;
	    		// echo "$image";
	    		$data .=$_POST[$image] . "-" ;

	    		$timetaken = "timeForImage" . $i;
	    		$data .=  $_POST[$timetaken] . "," ;
	    	}
	    	echo "\n";
	    }
	    $data .= ";\n";


	    /*linking*/
			session_start();
			$new_count=$_SESSION['filetowrite'];
			$file_name="file" . $new_count . ".txt";
			$path_file = "/var/www/research/groups/iab/exptML/results/" . $file_name;


		$ret = file_put_contents($path_file, $data, FILE_APPEND | LOCK_EX);
	    // $ret = file_put_contents('/tmp/timerdata.txt', $data, FILE_APPEND | LOCK_EX);
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


<center>
<head>

	<!-- <h2> Form 3</h2> --> <p>

		In the next page you will see 100 images.<br>
		You have to select 15 images as instructed as soon as possible.<br>
		There is a time limit of 20 seconds for doing this job.<br>
		</p>


	<br>

</head>


<form action="timer.php" method="POST">
	<input type="submit" name="submit" value="Continue" > <br>

</form>
</center>

</html>