<!DOCTYPE html>
<html>

<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="../Css/add.css">
	<link rel="stylesheet" type="text/css" href="../Css/indexAcount.css">
</head>

<body>
	<form action="indexAdmin.php" method="post">
		<div class="container" style="background-color: black">
			<h2 style="text-align: center;color: brown">ADD PRODUCT</h2>
			<hr>
			<label><b style="color: brown">Image</b></label>
			<input type="file" name="img">
			<label><b style="margin-top: 50px;color: brown">Name Product</b></label>
			<input type="text" placeholder="Enter Product Name" name="namePr">

			<label><b style="color: brown">Type Product</b></label>
			<input type="text" placeholder="Enter Product Type" name="type">
			<hr>
			<label><b style="color: brown">Price Product</b></label>
			<input type="text" placeholder="Enter Product Price" name="price">
			<hr>
			<label><b style="color: brown">Desciption Product</b></label>
			<input type="text" placeholder="Enter Product Desciption" name="des">
			<form action="indexAdmin.php" method="post">
				<button style="margin-top: 10px;background-color: brown" type="submit" name="add">ADD</button>
			</form>
		</div>
	</form>

</body>

</html>