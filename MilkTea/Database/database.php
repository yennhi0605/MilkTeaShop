<?php
	$servername = "localhost";
	$username = "root";
	$password = "";
	$database = "MilkTeaShop";
	$db = new mysqli($servername, $username, $password, $database);

	/*====================Log in==========================*/
	
	function get_login($uname, $pass){
	global $db;
	$sql = "SELECT * FROM User";
	$result = $db->query($sql)->fetch_all();
	$check = false;

	for ($i = 0; $i < count($result); $i++) {
		if ($result[$i][1] == $uname && $result[$i][2] == $pass) {
			if ($result[$i][4] == "admin") {
				$check = true;
				header("location:indexAdmin.php");
				break;
			} else {
				
				$_SESSION["user"] = $uname;
				$_SESSION["pass"] = $pass;
				header("location:indexUser.php");
				break;
			}
		}
	}
		if ($check == false) {
			?>
			<script>
				alert("Login Fail");
			</script>
			<?php
		}
	}
	function IdUser(){
		global $db;
		$sql = "SELECT id from User where username='".$_SESSION["user"]."' and password='".$_SESSION["pass"]."'";
		$result = $db->query($sql)->fetch_all();
		return $result[0][0];
	}
	function a(){
		global $db;
		$sql = "SELECT * from User where idUser=".IdUser();
		$result = $db->query($sql)->fetch_all();
		var_dump($result);
	}

	function cart($idPro, $idUser){
	  global $db;
	  $check = false;
	  echo IdUser();
	  $sql = "SELECT * FROM cart where idUser=" . IdUser();
	  $result = $db->query($sql)->fetch_all();
	  for ($i = 0; $i < count($result); $i++) {

	 	 if ($idPro == $result[$i][1]) {

	  	$sql1 = "UPDATE cart set quantity = " . ($result[$i][1] + 1) . " where idPro = " . $result[$i][1];
	 	 $check = true;
	  	$db->query($sql1);
	  	break;
	 	 }
	  }
	  	if ($check == false) {
	  	$sql2 = "INSERT INTO cart VALUES($idPro, $idUser, 1)";
	  	$db->query($sql2);
	  }
  	}
?>