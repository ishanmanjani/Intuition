<html>

	<?php
		if(isset($_POST['submit'])) {
			// echo "$_SESSION['views']";


			$file = fopen("/tmp/count1.txt","r");
			$counter= fgets($file);
			echo $counter;
			echo $counter;
			fclose($file);



			$new_count=$counter+1;
			// $new_count="1024";
			// $new_count .= "\n"

			$ans = file_put_contents('/tmp/count1.txt', $new_count, LOCK_EX);


			session_start();
			// store session data
			$_SESSION['filetowrite']=$new_count;
		


			// echo "ans is ".$ans;

			$file_name="file" . $new_count . ".txt";
			/*session_start();
			if(isset($_SESSION['views'])){
				echo "iii";
			}*/
			echo "Pageviews=". $_SESSION['views'] . "\n";

			$data = "";

			$data .= $_POST['FName'];
			$data.=",";

			// $data .= $_POST['roll'];
			// $data.=",";
		
			$data .= $_POST['email'];
			$data.=",";

			$data .= $_POST['gender'];
			$data.=",";


			$data .= $_POST['age'];
			$data.=",";


			$data .= $_POST['qualification'];
			$data.=",";

			$data .= $_POST['team'];


		    $data .= "\n\n";
		    $path_file = "/tmp/" . $file_name;
		    $ret = file_put_contents($path_file, $data, FILE_APPEND | LOCK_EX);
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

	<body>

	</body>
	


</html>