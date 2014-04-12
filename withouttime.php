<html>

<!-- missing comes here -->
<!-- from missing.php -->
<?php
	if(isset($_POST['submit'])) {
		$data = "";
		for ($i = 1;$i<=10 ; $i++) {
			// $question = "sawal" . $i;
			$image = "image" . $i;
			//echo $image;	
			// $answer = "answer" . $i;
			$ans_text = "ans_text" . $i;
			$data .= $_POST[$image] . '-' . $_POST[$ans_text] ;
		    $data .=",";
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
	    // $ret = file_put_contents('/tmp/missingdata.txt', $data, FILE_APPEND | LOCK_EX);
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

		<script type="text/javascript">
			//setTimeout('document.test.submit()',5000);	
			
			function loading(){

		   		setTimeout(function(){ 
		    		//document.test.next.=true;
		    		document.getElementById('sub1').checked=true;
		    		document.test.submit();		 
				}, 10000);
			
			}
			//loading();

		/*start time of script*/
		var openTime = new Date();
		
		function getStart(){
			return openTime;
		}

		</script>
		
	</head>

	<body><center><!-- <h1>Select 15 Cat images<br><br> -->
	<!-- </h1> -->

		<!-- <img src="image3.jpg" id="I1" onClick ="TimerSubmit(document.getElementById('I1').src)" /> -->
		<!-- <img src="image3.jpg" id="I1" onClick ="TimerSubmit()" /> -->
		<form name="test" method="post" action="timerdescription.php">
			<input type="checkbox" name="sub" id="sub1" style="display:none">

			<script type="text/javascript">
				//arr contains random numbers from 1-937, to select randomly an image from a class
				var arr = []
				var class_random = []
				var question = []
				
				while(arr.length < 101){
				  var randomnumber=Math.ceil(Math.random()*937)
				  //if(randomnumber==0) document.write('yes it is 1');
				  var rr=Math.ceil(Math.random()*10)
				  //var q=Math.ceil(Math.random()*9)
				  
				  arr[arr.length]=randomnumber;
				  class_random[class_random.length]=rr;
				  //question[question.length]=q;
				}

				var Mainclassdisplayed = Math.ceil(Math.random()*10);
				var mapping=new Array("automobile", "bird", "cat", "deer", "dog" ,"frog", "horse", "ship" , "truck", "airplane");
				document.write('<h1>Form 5: Select 15 '+mapping[Mainclassdisplayed-1]+ ' images<br><br></h1>')
				document.write ('<input type="hidden" name="Mainclass_displayed" id="mainclass" value="'+Mainclassdisplayed+'"  >');

				for(var i=1;i<=100;i++){
				    //button names are ans1,ans2,....
				    //var str="/data/original/" + randomclass[i] + "/" randomclass[i] + "_o_"+ arr[i] + ".jpg";
				    
				    // var str="/data/blur/"+ class_random[i] + "/"+ class_random[i] + "_b_" + arr[i] + ".jpg";
				    var str="/data/original/"+ class_random[i] + "/"+ class_random[i] + "_o_" + arr[i] + ".jpg";
				   
				    // document.write (str);
				   
				    //document.write ('<br>');
				    /*sawal is the question asked variable question is used*/
				    /*ans is true or false, variable used is answer (answer1,answer2...)*/
				    /*text box is if ans given is false, variable used is ans_text*/
				    var str_arr=str.split('/');
				    // document.write ('<img src="'+str+'" id="'+str_arr[str_arr.length-1]+'" onClick ="" />');

				    //document.write ('<img src="'+str+'" id="image'+i+'" onClick ="TimerSubmit("image'+i+'")" />');
				    var iii = "image"+i;
				    //document.write(iii);
				   
				    document.write ('<img src="'+str+'" id="image'+i+'" onClick ="TimerSubmit(this);" />');
				    /*hidden value to store time for when image has been clicked*/
				    document.write ('<input type="hidden" name="timeForImage'+i+'" id="tI'+i+'" value="0"  >');
				    // document.write(str + "id=" + image + i +)
				    document.write ('<input type="checkbox" name="check'+i+'" style="display:none" id="c'+i+'" >' 	);
				    // document.getElementById(iii).onClick="TimerSubmit(\"'+iii+'\")";


				    //document.write ('<input type="hidden" name="sawal'+i+'" value="'+question[i]+'">');
				    document.write ('<input type="hidden" name="image'+i+'" value="'+str_arr[str_arr.length-1]+'">');
				    document.write('&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp')
				    // document.write ('<input type="radio" name="answer'+i+'" value="True">True<br>');
				    // document.write ('<input type="radio" name="answer'+i+'" value="False">False<br>');
				    // document.write ('<input type="text" name="ans_text'+i+'"><br><br>');

				    if(i%10==0){
				    	document.write('<br>');	
				    } 

				    //FinalTime();
					
				}
				/*/*this variable i can decide depending upon the number of images i need to select
				var n=5;
				for(var i=1;i<=n;i++){
					document.write ('<input type="hidden" id =s'+i+'" name="select'+i+'" value="">');
				}*/

			</script>

		<input type="hidden" name="ele1" id="ele2" value="Iani">	
	
		<script type="text/javascript">

			function TimerSubmit(ImageId){
			//function TimerSubmit(){
				//alert("You clicked the image");
				
				// alert(ImageId.id);

				// 
				//highlightImg();
				// var ImageName = document.getElementById(ImageId).src;
				//document.write(ImageId);
				var imgid=ImageId.id;

				//document.getElementById()
				document.getElementById(imgid).style.display = 'none';
				var strArray=ImageId.src.split('/');
				//document.getElementById('ele2').value = strArray[strArray.length-1];
				
				// alert(strArray[strArray.length-1]);
				
				var number=ImageId.id.slice(5,ImageId.id.length);

				// alert(number);
				var ttt="c" + number;

				//document.write(ttt);
				document.getElementById(ttt).checked = true;



				/*done by ishan 11.4.14*/
				var ttt="tI" + number;
				// alert(ttt);
				var endTime = new Date();
	    		
	    		var startTime=getStart();
	    		
	    		var diff = endTime.getTime() - startTime.getTime();

	    		document.getElementById(ttt).value = diff/1000;


			}
			
		</script>
		<br><br><br><br>
		<input type="submit" name="next" value="Submit" />
		</form>


	</center></body>



</html>