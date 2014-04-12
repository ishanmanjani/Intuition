<html>
<!-- 
<?php
session_start();
// store session data
$_SESSION['views']=1012;
?>
 -->
<?php
//retrieve session data
// echo "Pageviews=". $_SESSION['views'];
?>

	<head>
		<h2> Personal Profile </h2> 

		
	</head>

	<body>
		<form action="index.php" method="POST">

			Name<br> <input type="text" name="FName"><br><br>
			<!-- Roll Number<br><input type="text" name="roll"><br><br> -->
			Email<br><input type="text" name="email"><br><br>
			Gender<br><input type="radio" name="gender" value="Male"> Male<br>
					<input type="radio" name="gender" value="Female"> Female<br>
					<br>
			Age<br><input type="text" name="age"><br><br>
			Qaulification<br><input type="text" name="qualification"><br><br>

			Team id:<br>
			<select name="team">
				<option value="default">-</option>
				<script type="text/javascript">
				for (var i = 1; i < 17; i++) {
					document.write('<option value="'+i+'">Team '+i+'</option>')					
				};

				</script>	
			</select>

			<br><br><br>
			<input type="submit" name="submit" value="Continue">

		</form>
	</body>
	
</html>
