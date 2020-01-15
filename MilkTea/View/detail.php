<?php
require '../Database/database.php';
session_start();

/*==============Detail=================*/

if (isset($_GET["detail"])) {
  $id = $_GET['detail'];

  $sql = "SELECT * FROM milktea WHERE id =" . $id . ";";
  $result = $db->query($sql)->fetch_all();
}

/*================Display detail->Add to cart=====================*/

  if (isset($_POST["btn"])) {
    $idPro = $_POST["btn"];
    $select = "SELECT * FROM milktea where id=" . $idPro;
    $resultSelect = $db->query($select)->fetch_all();
    $quantity=1;

    $sql = "INSERT INTO cart VALUES(null," . $resultSelect[0][0] . ",".$id.",'". $resultSelect[0][4] . "',".$quantity.",".$resultSelect[0][2].",".($resultSelect[0][2]*$quantity).")";
    $db->query($sql);
    header("location:indexUser.php");
  }

?>
<!DOCTYPE html>
<html>

<head>
  <title>Detail</title>
  <link rel="stylesheet" type="text/css" href="../Css/indexAcount.css">
  <link rel="stylesheet" type="text/css" href="../Css/detail.css">
</head>

<body>
  <div class="header">
    <p>Liên hệ: Nguyễn Yến Nhi</p>
    <p>Địa chỉ: 101B Lê Hữu Trác, Sơn Trà Đà Nẵng</p>
    <p style="margin-right: 400px">Phone: 0354236247</p>
    <form action="index.php">
      <button name="logout" type="submit" style="background-color: red">Log out</button>
    </form>
  </div>

  <div class="slideshow-container" style="margin-top: 20px">
    <div class="mySlides fade">
      <img src="../Image/slide1.jpg" style="width:100%; height: 300px">
    </div>

    <div class="mySlides fade">
      <img src="../Image/slide2.jpg" style="width:100%; height: 300px">
    </div>

    <div class="mySlides fade">
      <img src="../Image/slide3.jpg" style="width:100%; height: 300px">
    </div>
  </div>

  <div class="menu">
    <div class="menu a">
      <a href="indexUser.php">TRANG CHỦ</a>
      <a href="Gioi Thieu">GIỚI THIỆU</a>
      <a href="Tin Tuc">TIN TỨC</a>
      <a href="Huong Dan">HƯỚNG DẪN ĐẶT HÀNG</a>
      <a href="Lien He">LIÊN HỆ</a>
    </div>
    <div class="search">
      <input class="search" type="text" placeholder="Search" name="">
    </div>
    <form action="cart.php" class="cart">
      <button style="background-color: sandybrown">
        <img src="../Image/cart.jpg" alt="icon.png" width="15px" height="15px"> CART
      </button>
    </form>
  </div>
  <div class="detail-container">
    <h1>DETAIL PRODUCT</h1>
    <?php
    for ($i = 0; $i < count($result); $i++) {
    ?>
      <div class="flex2">
        <img name="Image" style="width: 350px; height: 340px;" src="<?php echo "../".$result[$i][4];  ?>">
      </div>
      <div class="content">
        <h2 style="color: white"><?php echo $result[$i][1]; ?></h2>
      </div>
      <div class="description">
        <h3 style="color: sandybrown;"><?php echo $result[$i][5] ?></h3>
      </div>
        <form action="" method="post">
          <div class="btn" style="align-items: center;margin-left: 100px">
            <button name="btn" value=<?php echo $result[$i][0]; ?>>Add to cart</button>
          </div>
        </form>
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

  <script type="text/javascript">
    var slideIndex = 0;
    showSlides();

    function showSlides() {

      var i;
      var slides = document.getElementsByClassName("mySlides");

      for (i = 0; i < slides.length; i++) {
        slides[i].style.display = "none";
      }

      slideIndex++;

      if (slideIndex > slides.length) {
        slideIndex = 1
      }

      for (i = 0; i < slides.length; i++) {
        slides[i].style.display = "none";
      }

      slides[slideIndex - 1].style.display = "block";
      setTimeout(showSlides, 2000);
    }
  </script>
</body>

</html>
$stm = "UPDATE Milktea SET name='".$name_edit."', price='".$price_edit."', type='".$type_edit."',  ,description='".$des_edit."' WHERE id='".$_POST['edits']."'";
     $db->query($stm); 
     header("location:indexAdmin.php");