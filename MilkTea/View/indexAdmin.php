<?php
require "../Database/database.php";
require "../Model/Coffee.php";
require "../Model/Juice_Tea.php";
require "../Model/Milktea.php";
require "../Model/Smoothie.php";

$sql = "SELECT * FROM MilkTea";
$result = $db->query($sql)->fetch_all(MYSQLI_ASSOC);

$milkteas = array();
for ($i = 0; $i < count($result); $i++) {
  $milk = $result[$i];


  if ($milk['type'] == 'Coffee') {
    array_push($milkteas, new Coffee($milk['id'], $milk['name'], $milk['price'], $milk['image']));
  }
  if ($milk['type'] == 'Juice_Tea') {
    array_push($milkteas, new Juice_Tea($milk['id'], $milk['name'], $milk['price'], $milk['image']));
  }
  if ($milk['type'] == 'Milktea') {
    array_push($milkteas, new Milktea($milk['id'], $milk['name'], $milk['price'], $milk['image']));
  }
  if ($milk['type'] == 'Smoothie') {
    array_push($milkteas, new Smoothie($milk['id'], $milk['name'], $milk['price'], $milk['image']));
  }
}

//Admin delete product//

if (isset($_POST["delete"])) {
  $id = $_POST["delete"];
  $sql = "Delete FROM milktea where id=" . $id . ";";
  $db->query($sql);
  header("location: indexAdmin.php");
}

//Admin add product //

if (isset($_POST["add"])) {
  $image = $_POST["img"];
  $name = $_POST["namePr"];
  $type = $_POST["type"];
  $price = $_POST["price"];
  $description = $_POST["des"];

  $sql = "INSERT INTO milktea() VALUES(null,'" . $name . "','" . $price . "','" . $type . "','Image/" . $image . "', '".$description."')";
  $db->query($sql);

  $sql = "SELECT * from MilkTea";
  $result = $db->query($sql)->fetch_all(MYSQLI_ASSOC);
  header("location: indexAdmin.php");
}

/*====================Admin edit product=======================*/

  if (isset($_POST["edits"])) {
    $image_edit = $_POST['Image'];
    $name_edit = $_POST['Name'];
    $price_edit = $_POST['price'];
    $type_edit = $_POST['type'];
    $des_edit = $_POST['des'];

    $stm = 'UPDATE Milktea SET name="'.$name_edit.'", price="'.$price_edit.'", type="'.$type_edit.'", image="image/'.$image_edit.'" ,description="'.$des_edit.'" WHERE id="'.$_POST['edits'].'"';
    $db->query($stm); 
    header("location:indexAdmin.php");
  }
?>

<!DOCTYPE html>
<html>

<head>
  <title>MilkTea Shop</title>
  <link rel="stylesheet" type="text/css" href="../Css/indexAcount.css">
</head>

<body>
  <div class="header">
    <p>Liên hệ: Nguyễn Yến Nhi</p>
    <p>Địa chỉ: 101B Lê Hữu Trác, Sơn Trà Đà Nẵng</p>
    <p style="margin-right: 400px">Phone: 0354236247</p>
    <form action="index.php" method="">
      <button name="logout" style="background-color: red">Log out</button>
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
      <a href="indexAdmin.php">TRANG CHỦ</a>
      <a href="Gioi Thieu">GIỚI THIỆU</a>
      <a href="Tin Tuc">TIN TỨC</a>
      <a href="Huong Dan">HƯỚNG DẪN ĐẶT HÀNG</a>
      <a href="Lien He">LIÊN HỆ</a>
    </div>
    <div class="search">
      <input class="search" type="text" placeholder="Search" name="">
    </div>
    <form action="add.php" method="">
      <button style="margin-top: 15px; background-color: sandybrown">
        <img src="../Image/add.png" alt="add.png" width="15px" height="15px">ADD
      </button>
    </form>
  </div>

  <!--Display Product-->

  <h1 style="color: brown; font-weight: bold; text-align: center; margin-top: 20px;">
    SẢN PHẨM
  </h1>

  <div class="milk-container">
    <?php
    for ($i = 0; $i < count($milkteas); $i++) {
    ?>
      <div class="item-milk">
        <img class="item-milk-icon" src=<?php echo "../".$milkteas[$i]->getImagePath(); ?>>
        <h1 class="item-milk-name"><?php echo $milkteas[$i]->name ?></h1>
        <p style="color: brown" class="item-milk-type"><?php echo $milkteas[$i]->getType() ?></p>
        <h2 class="item-milk-price"><?php echo $milkteas[$i]->getDisplayPrice() ?></h2>
        <form action="edit.php" method="post" class="btn">
          <button name="edit" type="submit" style=" background-color: sandybrown" value="<?php echo $milkteas[$i]->id;?>">Edit
          </button>
        </form>
        <form method="post">
          <button type="submit" name="delete" style="width: 80px; background-color: red" value="<?php echo $milkteas[$i]->id; ?>">Delete</button>
        </form>
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