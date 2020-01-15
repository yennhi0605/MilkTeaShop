<?php
  require '../Database/database.php';
  require_once "../Model/Smoothie.php";

  $sql = "SELECT * from MilkTea WHERE type='Smoothie'";
  $result = $db->query($sql)->fetch_all(MYSQLI_ASSOC);

  $milkteas = array();
  for ($i = 0; $i < count($result); $i++) {
    $milk = $result[$i];

    if ($milk['type'] == 'Smoothie') {
      array_push($milkteas, new Smoothie($milk['id'], $milk['name'], $milk['price'], $milk['image']));
    }
  }
?>
<!DOCTYPE html>
<html>
<head>
  <title></title>
  <link rel="stylesheet" type="text/css" href="../Css/index.css">
  <link rel="stylesheet" type="text/css" href="../Css/indexAcount.css">
</head>

<body>
  <div class="header">
    <p>Liên hệ: Nguyễn Yến Nhi</p>
    <p>Địa chỉ: 101B Lê Hữu Trác, Sơn Trà Đà Nẵng</p>
    <p style="margin-right: 400px">Phone: 0354236247</p>
    <form action="login.php" method="">
      <button style="margin-left:100px;background-color: brown">Log in</button>
    </form>
    <form action="register.php" method="">
      <button style="margin-right: 20px; background-color:brown">Register</button>
    </form>
  </div>

  <div class="image">
    <img src="../Image/logo.jpg" style="width: 70%; height: 400px; margin-top: 20px; margin-left: 200px;">
  </div>

  <h1 style="text-align: center; margin-top: 20px; color: brown; background-color: black;">SẢN PHẨM</h1>

  <div class="milk-container">
    <?php
      for ($i = 0; $i < count($milkteas); $i++) {
    ?>
      <div class="item-milk">
        <img class="item-milk-icon" src=<?php echo "../".$milkteas[$i]->getImagePath(); ?>>
        <h1 class="item-milk-name"><?php echo $milkteas[$i]->name ?></h1>
        <p style="color: brown" class="item-milk-type"><?php echo $milkteas[$i]->getType() ?></p>
        <h2 class="item-milk-price"><?php echo $milkteas[$i]->getDisplayPrice() ?></h2>
      </div>
    <?php
      }
    ?> 
  </div>
  <hr>
  <div class="footer">
    <div class="footer-lienhe">
      <h1 style="color: sandybrown">THÔNG TIN LIÊN HỆ</h1>
      <hr>
      <p>Địa Chỉ: 101B Lê Hữu Trác, Sơn Trà, Đà Nẵng</p>
      <p>Phone: 035 4236 247</p>
      <p>Facebook: Nguyễn Yến Nhi</p>
      <p>Email: nhi.nguyen@gmail.com</p>
    </div>
    <div class="footer-giaohang">
      <h1 style="color: sandybrown">CHÍNH SÁCH</h1>
      <hr>
      <p>Chính Sách Giao Hàng</p>
      <p>Chính Sách Vận CHuyển</p>
      <p>Chính Sách Thanh Toán</p>
      <p>Khách Hàng Thân Thiết</p>
    </div>
    <div class="footer-menu">
      <h1 style="color: sandybrown">MENU</h1>
      <hr>
      <p>Coffee</p>
      <p>Milk Tea</p>
      <p>Smoothie</p>
      <p>Juice/Tea</p>
    </div>
  </div>
</body>

</html>