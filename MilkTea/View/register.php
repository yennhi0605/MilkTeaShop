<?php
	require '../Database/database.php';
	$sql2 = "SELECT * from User";
	$result2 = $db->query($sql2)->fetch_all();
	$check = true;

	/*====================Log up==========================*/

	if (isset($_POST["register"])) {
		$fName = $_POST["nameLogup"];
		$uname = $_POST["unameLogup"];
		$password = $_POST["pswLogup"];
		$password1 = $_POST["pswLogup1"];
		$regis = $_POST['register'];
		$pos = "user";

		if ($psw == $regis) {
			$sql = "INSERT into User values(null,'" . $uname . "','" . $password . "','" . $fName . "','" . $pos . "')";
			$db->query($sql);
			header("location:Login.php");
		}
	}
?>
<!DOCTYPE html>
<html>

<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="../Css/register.css">
</head>
<body>
	<form action="" method="post">
		<div class="container" style="background-color: black">
			<h1 style="text-align: center; color: brown">Register</h1>
			<hr>
			<label><b style="margin-top: 30px">Full Name</b></label>
			<input type="text" placeholder="Enter FullName" name="nameLogup" required>

			<label><b style="margin-top: 30px">Username</b></label>
			<input type="text" placeholder="Enter Username" name="unameLogup" required>

			<label><b>Password</b></label>
			<input type="password" placeholder="Enter Password" name="pswLogup" required>

			<label><b>Enter Password Again</b></label>
			<input type="password" placeholder="Enter Password Again" name="pswLogup1" required>
			<hr>
			<button type="submit" name="register" style="background-color: brown">Register</button>
		</div>
	</form>
</body>
</html>