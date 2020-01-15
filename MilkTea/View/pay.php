<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<form action="indexUser.php" method="post">
		<div class="container" style="background-color: black">
			<h1 style="text-align: center; color: brown">Pay</h1>
			<hr>
			<label><b style="margin-top: 30px;color: brown">Full Name</b></label>
			<input name="name" style="color: white" required=""> value=<?php echo $result[0][0] ?>>
			<hr>
			<label><b style="margin-top: 30px;color: brown">Address</b></label>
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