
<html>

<!-- timer.php comes here -->	

<?php
	if(isset($_POST['next']) || isset($_POST['sub'])) {
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
	    $data .= ";	\n";


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



<h1><center>Thankyou</center>

</html>
