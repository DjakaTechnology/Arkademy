<html>
<head>
	<title>Check</title>
</head>
<body>
	<fieldset>
		<legend>Check</legend>
		<form id="form" method="POST">
			<table>
				<tr>
					<td>
						<label>Username</label>
					</td>
					<td>:</td>
					<td>
						<input id="username" type="text" name="username" required>
					</td>
				</tr>
				<tr>
					<td><label>Email</label></td>
					<td>:</td>
					<td><input id="email" type="email" name="email" required></td>
				</tr>
				<tr>
					<td><label>Phone</label></td>
					<td>:</td>
					<td><input id="phoneNumber" type="tel" name="phoneNumber" required></td>
				</tr>
			</table>
			<input type="submit" name="submit" value="Check">
		</form>
	</fieldset>
<?php

function CheckValid(){
	if(isset($_POST['submit'])){
		if(ctype_lower($_POST['username']))
			echo "Username : ".$_POST['username']." is valid<br>";
		else
			echo "<script>alert('Username Must Be Lower');</script>";

		if(preg_match("/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix", $_POST['email']))
		  echo 'Email : '. $_POST['email'].' is valid<br>';
		else
		  echo "<script>alert('Invalid Email');</script>";

		if (preg_match("/^[\+0-9\(\)\s]*$/", $_POST['phoneNumber']))
			echo "Phone : ".$_POST['phoneNumber']." number is valid<br>";
		else
			echo "<script>alert('Invalid Phone Number');</script>";
	}
}

CheckValid();
?>


</body>
</html>