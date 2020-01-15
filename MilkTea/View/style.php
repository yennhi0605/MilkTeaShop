<div class="header">
	<h1 class="brand">MilkTea</h1>
	<?php
	if ($user == null) {
	?>
		<div>
			<button onclick="onLoginClicked()">Login</button>
			<button onclick="onRegisterClicked()">Register</button>
		</div>
	<?php
	} else {
	?>
		<div class="user-info">
			<marquee>
				<p class="name">Hello <?php echo $user->getShortName() ?></p>
			</marquee>
			<div class="cart-info">
				<button class="cart">Cart</button>
				<span class="cart-number">0</span>
			</div>
			<button>Logout</button>
		</div>
	<?php
	}
	?>
</div>

<form id="login-form" class="login" method="post">
	<h1>Login</h1>
	<input type="text" name="username" placeholder="Username">
	<input type="password" name="password" placeholder="Password">
	<button type="submit">Login</button>
</form>

<div class="milktea-container">
	<?php
	for ($i = 0; $i < count($MilkTeas); $i++) {
	?>

		<div class="item-milktea">
			<img class="item-milktea-icon" src=<?php echo $MilkTeas[$i]->getImagePath(); ?>>
			<p class="item-milktea-name"><?php echo $MilkTeas[$i]->name ?></p>
			<p class="item-milktea-price"><?php echo $MilkTeas[$i]->getDisplayPrice() ?></p>
			<?php
			if ($user && $user->canManage()) {
			?>
				<button class="item-milktea-edit">Edit</button>
				<button class="item-milktea-delete">Delete</button>
			<?php
			}
			if ($user && $user->canBuy()) {
			?>
				<button class="item-milktea-buy">Buy</button>
			<?php
			}
			?>
		</div>

	<?php
	}
	?>
</div>
<div class="footer">
	<p>Copyright by Nhi Nguyen 2019</p>
</div>
<script src="index.js"></script>