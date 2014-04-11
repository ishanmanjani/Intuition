<?php
	if(isset($_POST['submit'])) {
		$data = "";
		for ($i = 1;$i<=20 ; $i++) {
			// $question = "sawal" . $i;
			$image = "image" . $i;
			//echo $image;	
			// $answer = "answer" . $i;
			$ans_text = "ans_text" . $i;
			$data .= $_POST[$image] . '-' . $_POST[$ans_text] . '-';
		    
		}
	    //$data = $_POST['q1'] . '-' . $_POST['q2'] . '-' .$_POST['q3'] . '-' ."\n";
	    $data .= $_POST['finaltime_var'];
	    $data .= "\n\n";
	    $ret = file_put_contents('/tmp/missingdata.txt', $data, FILE_APPEND | LOCK_EX);
	    if($ret === false) {
		die('There was an error writing this file');
	    }
	    else {
		echo "$ret bytes written to file";
	    }
	}
	else {
	   die('no post data to process');
	}


?>
