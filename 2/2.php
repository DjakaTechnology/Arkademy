<html>
<head>
<title>Check</title>
</head>
<body>

<fieldset>
<legend>Check</legend>
<form method="POST">
<label>Username :</label>
<input type="text" name="username" required>
<br>
<label>Email : </label>
<input type="email" name="email" required>
<br>
<label>Phone Number :</label>
<input type="number" name="phoneNumber" required>
<br>
<input type="submit" name="submit" value="SUBMIT">
</form>
</fieldset>

<br>



<?php
if(isset($_POST['submit'])){
	if(ctype_lower($_POST['username'])){
		echo "Valid Username<br>";
	}else{
		echo "<script>alert('Username Must Be Lower');</script>";
	}
	if(preg_match("/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix", $_POST['email'])) {
	  echo 'Valid Email<br>';
	} else {
	  echo "<script>alert('Invalid Email');</script>";
	}
	if (preg_match("/^[\+0-9\-\(\)\s]*$/", $_POST['phoneNumber'])) {
		echo "Valid Phone Number<br>";
	}else{
		echo "<script>alert('Invalid Phone Number');</script>";
	}
}else{
	echo "isikan terlebih dahulu data nya :v";
}
?>


</body>
</html>