<?php
	require 'database.php';

	session_start();

	$sql = "SELECT * from MilkTeas";
  	$result = $db->query($sql)->fetch_all(MYSQLI_ASSOC);

  	$idPro = $_SESSION["id"];
	if (isset($_POST["order"])) {
		$id = $_POST["order"];
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

</body>
</html>