<?php
	require '../Database/database.php';
	session_start();

	$sql = "SELECT * FROM User";
	$result = $db->query($sql)->fetch_all();

	if (isset($_POST['login'])) {
		$uname = $_POST['uname'];
		$pass = $_POST['psw'];
		get_login($uname, $pass);
	}
?>
<!DOCTYPE html>
<html>

<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="../Css/login.css">
</head>

<body>
	<form method="post">
		<div class="container" style="background-color: black">
			<h1 style="text-align: center; color: brown">Login</h1>
			<hr>
			<label><b style="margin-top: 30px">Username</b></label>
			<input type="text" placeholder="Enter Username" name="uname" required>

			<label><b>Password</b></label>
			<input type="password" placeholder="Enter Password" name="psw" required>
			<hr>
			<button type="submit" name="login" style="background-color: brown">Login</button>
		</div>
	</form>
</body>

</html>
<!-- <form action="indexAdmin.php" method="post">
				<div class="edit-container">
			<h1>Edit Product</h1>
			<label>Image</label>
			<input type="file" name="Image" id="" value=<?php echo $result[0][0] ?>>
			<label>Name Product</label>
			<input type="text" name="Name" value=<?php echo $result[0][1] ?>>
			<label>Price</label>
			<input type="text" name="price" value=<?php echo $result[0][2] ?>>
			<label>Type Product</label>
			<input type="text" name="type" value=<?php echo $result[0][3] ?>>
			<label>Decription</label>
			<input type="text" name="des" value=<?php echo $result[0][5] ?>>
			<button name="edits" value=<?php echo $result[0][0] ?>>Update</button>
			</div>
		</form>
		$id = $_POST["edit"];
	echo $id;
	$sql = "SELECT * FROM MilkTea WHERE id=".$id;
	$result = $db->query($sql)->fetch_all(); -->