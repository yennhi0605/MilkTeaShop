<?php
	require '../Database/database.php';

	$id = $_POST["edit"];
	$sql = "SELECT * FROM MilkTea WHERE id=".$id;
	$result = $db->query($sql)->fetch_all();
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="../Css/edit.css">
	<link rel="stylesheet" type="text/css" href="../Css/indexAcount.css">
</head>
<body>
	<form action="indexAdmin.php" method="post">
		<div class="container" style="background-color: black">
			<h1 style="text-align: center; color: brown">Edit</h1>
			<hr>
			<label><b style="margin-top: 30px;color: brown">Image</b></label>
			<input type="file" name="Image" style="color: white"> value=<?php echo $result[0][0] ?>>
			<hr>
			<label><b style="margin-top: 30px;color: brown">Name Product</b></label>
			<input type="text" name="Name" value=<?php echo $result[0][1] ?>>
			<hr>
			<label><b style="margin-top: 30px;color: brown">Price Product</b></label>
			<input type="text" name="price" value=<?php echo $result[0][2] ?>>
			<hr>
			<label><b style="margin-top: 30px;color: brown">Type Product</b></label>
			<input type="text" name="type" value=<?php echo $result[0][3] ?>>
			<hr style="color: brown">
			<label><b style="margin-top: 30px;color: brown">Description Product</b></label>
			<input type="text" name="des" value=<?php echo $result[0][5] ?>>
			<hr>
			<button style="background-color: brown; border-radius: 10px;" name="edits" value=<?php echo $result[0][0] ?>>Update</button>
		</div>
	</form>
</body>
</html>
