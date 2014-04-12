<html>


<!-- starting form comes here -->
	<?php
		if(isset($_POST['submit'])) {
			// echo "$_SESSION['views']";


			$file = fopen("/var/www/research/groups/iab/exptML/results/count1.txt","r");
			$counter= fgets($file);
			/*echo $counter;
			echo $counter;*/
			fclose($file);



			$new_count=$counter+1;
			// $new_count="1024";
			// $new_count .= "\n"

			$ans = file_put_contents('/var/www/research/groups/iab/exptML/results/count1.txt', $new_count, LOCK_EX);


			session_start();
			// store session data
			$_SESSION['filetowrite']=$new_count;
		


			// echo "ans is ".$ans;

			$file_name="file" . $new_count . ".txt";
			/*session_start();
			if(isset($_SESSION['views'])){
				echo "iii";
			}*/
			// echo "Pageviews=". $_SESSION['views'] . "\n";

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


		    $data .= ";\n\n";
		    $path_file = "/var/www/research/groups/iab/exptML/results/" . $file_name;
		    $ret = file_put_contents($path_file, $data, FILE_APPEND | LOCK_EX);
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
	<center><h2> Form 1</h2> <p>

	For each of the following questions mark True if the given label corresponds to the image.<br>
	If you mark False, write the correct label for the image in the space provided.<br>
	<br>
	The ten different images used here are : <b>Automobile, Bird, Cat, Deer, Dog, Frog, Horse, Ship, Truck, Airplane </b>
	</p></center>

</head>

<body>

<center>
	
	<h1><h1><br>
	<table style="width:1000px">
<form action="blur.php" method="POST">
	<!-- <input type="hidden" name="FinalTime" id="final" value=1014> -->
	<script type="text/javascript">
		//arr contains random numbers from 1-937, to select randomly an image from a class
		var arr = []
		var class_random = []
		var question = []
		/*while(arr.length < 4){
		  var randomnumber=Math.ceil(Math.random()*9)
		  var found=false;
		  for(var i=0;i<arr.length;i++){
		    if(arr[i]==randomnumber){found=true;break}
		  }
		  if(!found)arr[arr.length]=randomnumber;
		}*/
		while(arr.length < 21){
		  var randomnumber=Math.ceil(Math.random()*937)
		  //if(randomnumber==0) document.write('yes it is 1');
		  var rr=Math.ceil(Math.random()*10)
		  var q=Math.ceil(Math.random()*10)
		  
		  arr[arr.length]=randomnumber;
		  class_random[class_random.length]=rr;
		  question[question.length]=q;
		}
	/*document.write ('<img src="image' + arr[0] + '.jpg"> <img src="image' + arr[1] + '.jpg"> <img src="image' + arr[2] + '.jpg">');
		document.write ('<br><input type="radio" name="q1" value="Ishan">Ishan<br>'); */


		var openTime = new Date();
		//document.write(openTime.getHours() + " " + openTime.getMinutes() + " " + openTime.getSeconds());
		function getStart(){
			return openTime;
		}


		/*data*/

		var mapping=new Array("automobile", "bird", "cat", "deer", "dog" ,"frog", "horse", "ship" , "truck", "airplane");

 		/*for(var i=1;i<=3;i++){
		    //button names are q1,q2,....
		    var str="image" + arr[i] + ".jpg";
		    document.write (str);
		    document.write ('Q'+i + '<br><img src="image' + arr[i] + '.jpg"><br>');
		    document.write ('<input type="hidden" name="image'+i+'" value="image' + arr[i] + '.jpg">');
		    document.write ('<input type="radio" name="q'+i+'" value="True">True<br>');
		    document.write ('<input type="radio" name="q'+i+'" value="False">False<br><br>');
		    //FinalTime();
			
		  }*/
		  //var str="/data/original/" + class_random[1] + "/" class_random[1] + "_o_"+ arr[1] + ".jpg";
		  // var str2="/data/original/"+ class_random[1] + "/"+ class_random[1] + "_o_" + arr[1] + ".jpg";
		  // document.write(str2);
		  // document.write('<img src="'+str2+'">');
		  

		  /*done by ishan on 9.4.2014*/
		  // for(var i=1;i<=20;i++){
		  for(var i=1;i<=10;i++){

		  	/*starting row of table*/
		  	if(i==1 || i== 5 || i==9){
		  		document.write('<tr>');
		  	}

		    //button names are ans1,ans2,....
		    //var str="/data/original/" + randomclass[i] + "/" randomclass[i] + "_o_"+ arr[i] + ".jpg";
		    var str="/data/original/"+ class_random[i] + "/"+ class_random[i] + "_o_" + arr[i] + ".jpg";
		   
		    // document.write (str);
		   
		  
		    // document.write ('<br>');


		    /*sawal is the question asked variable question is used*/
		    /*ans is true or false, variable used is answer (answer1,answer2...)*/
		    /*text box is if ans given is false, variable used is ans_text*/
		    
		    //document.write(question[i]-1 + '\n');

		    document.write('<td>');

		    document.write ('Q'+i + '. ' + mapping[question[i]-1] + ' ?' + '<br><img src="'+str+'"><br>');
		    var str_arr=str.split('/');
		    document.write ('<input type="hidden" name="sawal'+i+'" value="'+question[i]+'">');
		    document.write ('<input type="hidden" name="image'+i+'" value="'+str_arr[str_arr.length-1]+'">');
		    document.write ('<input type="radio" name="answer'+i+'" value="True">True<br>');
		    document.write ('<input type="radio" name="answer'+i+'" value="False">False<br>');
		    document.write ('<input type="text" name="ans_text'+i+'"><br><br><br><br>');
		    //FinalTime();
			
		    document.write('</td>');

		    /*closing row*/
			if(i==4 || i==8 || i==10){
		  		document.write('</tr>');
		  	}


		  }

		  document.write ('<input type="hidden" name="finaltime_var" id="final_var" value=1111>');
		 
	</script>
		 
	</table>
	
	   <!-- <input name="option1" type="checkbox" value="Dog"/> Dog<br>
	    <input name="option2" type="checkbox" value="Car"/> Car<br>
	    <input name="option3" type="checkbox" value="Cat"/> Cat<br> -->
		<!--<br>document.write ('<img src="image' + arr[0]'); <br> -->

		<!--<input type="radio" name="q1" value="True"> True<br> 
		<input type="radio" name="q1" value="False"> False<br> -->

	    <input type="submit" name="submit" value="Save Data" onClick ="FinalTime()"> <br>
	    <!-- <button type="button" class="btn btn-primary">Primary</button> -->

	    <script>
	    	//document.write ('<input type="hidden" name="FinalTime" value=1014>');	
	    	function FinalTime(){
	    		var endTime = new Date();
	    		var endH=endTime.getHours(), endM=endTime.getMinutes(), endS=endTime.getSeconds();

	    		// alert("I am an alert box!");
	    		var startTime=getStart();
	    		var startH=startTime.getHours(), startM=startTime.getMinutes(), startS=startTime.getSeconds();
	    		var diff = endTime.getTime() - startTime.getTime();

	    		document.getElementById('final_var').value = diff/1000;
	    	}
		</script>

		

</form>
</center>


</body>


</html>
