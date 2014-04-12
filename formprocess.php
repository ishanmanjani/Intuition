<?php
	if(isset($_POST['submit'])) {
		$data = "";

		$data .= $_POST['FName'];
		$data.=",";

		$data .= $_POST['roll'];
		$data.=",";
	
		$data .= $_POST['email'];
		$data.=",";

		$data .= $_POST['gender'];
		$data.=",";


		$data .= $_POST['age'];
		$data.=",";


		$data .= $_POST['qualification'];
		$data.=",";


	    $data .= "\n\n";
	    $ret = file_put_contents('/tmp/formdata.txt', $data, FILE_APPEND | LOCK_EX);
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