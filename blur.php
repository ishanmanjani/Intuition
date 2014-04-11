<html>


<!-- index comes here, index matlab non blur protocol 1 -->
<!-- from myprocessing.php -->
<?php
	if(isset($_POST['submit'])) {
		$data = "";
		for ($i = 1;$i<=10 ; $i++) {
		/*for ($i = 1;$i<=20 ; $i++) {*/
			$question = "sawal" . $i;
			$image = "image" . $i;
			//echo $image;	
			$answer = "answer" . $i;
			$ans_text = "ans_text" . $i;
			$data .= $_POST[$question] . '-' . $_POST[$image] . '-' . $_POST[$answer] . '-' . $_POST[$ans_text] . '-';
		    
		}
	    //$data = $_POST['q1'] . '-' . $_POST['q2'] . '-' .$_POST['q3'] . '-' ."\n";
	    $data .= $_POST['finaltime_var'];
	    $data .= "\n\n";
	    $ret = file_put_contents('/tmp/normal.txt', $data, FILE_APPEND | LOCK_EX);
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



<!--
	<img src="images/header/rotate.php" alt="Header" width="400" height="100" /> 
-->

<!-- <img src="/data/original/1/1_o_82.jpg"> -->
<!--
<script type="text/javascript">
nRandom = Math.ceil(Math.random() * 9);
document.write ('<img src="image' + nRandom + '.jpg">');
</script>  -->
<form action="missing.php" method="POST">
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


		  var mapping=new Array("automobile", "bird", "cat", "deer", "dog" ,"frog", "horse", "ship" , "truck", "airplane");

		  
		  /*for(var i=1;i<=20;i++){*/
		  for(var i=1;i<=10;i++){
		    //button names are ans1,ans2,....
		    //var str="/data/original/" + randomclass[i] + "/" randomclass[i] + "_o_"+ arr[i] + ".jpg";
		    var str="/data/blur/"+ class_random[i] + "/"+ class_random[i] + "_b_" + arr[i] + ".jpg";
		    // document.write (str);
		    document.write ('<br>');
		    /*sawal is the question asked variable question is used*/
		    /*ans is true or false, variable used is answer (answer1,answer2...)*/
		    /*text box is if ans given is false, variable used is ans_text*/
		    document.write ('Q'+i + '. ' + mapping[question[i]-1] + '<br><img src="'+str+'"><br>');
		    var str_arr=str.split('/');
		    document.write ('<input type="hidden" name="sawal'+i+'" value="'+question[i]+'">');
		    document.write ('<input type="hidden" name="image'+i+'" value="'+str_arr[str_arr.length-1]+'">');
		    document.write ('<input type="radio" name="answer'+i+'" value="True">True<br>');
		    document.write ('<input type="radio" name="answer'+i+'" value="False">False<br>');
		    document.write ('<input type="text" name="ans_text'+i+'"><br><br>');
		    //FinalTime();
			
		  }

		  document.write ('<input type="hidden" name="finaltime_var" id="final_var" value=1111>');
		 
	</script>
		 
	
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
	    		var diff = endTime.getTime() - startTime.getTime(	);

	    		document.getElementById('final_var').value = diff/1000;
	    	}
		</script>

		

</form>

	



</html>
