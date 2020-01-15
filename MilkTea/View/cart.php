<?php
  require "../Database/database.php";
  require '../Model/Coffee.php';
  require "../Model/Juice_Tea.php";
  require "../Model/Milktea.php";
  require "../Model/Smoothie.php";

  session_start();

  $sql1 = "SELECT * from milktea";
  $result1 = $db->query($sql1)->fetch_all();

  $sql = "SELECT * from cart";
  $result = $db->query($sql)->fetch_all(MYSQLI_ASSOC);

  if (isset($_GET["order"])) {
    $id = $_GET['order'];
    $sql = "SELECT * FROM cart WHERE id =" . $idPro . ";";
    $result = $db->query($sql)->fetch_all();
    echo $id;
  }
 

    function sum($result){
        $sum = 0;
        for($i = 0; $i < count($result); $i++) {
            $sum += (($result[$i]['price'])*($result[$i]['quantity']));
        }
        return $sum;
    }

    if (isset($_POST["dele"])) {
      $id = $_POST["dele"];
      $sql = "Delete FROM cart where id=" . $id . ";";
      $db->query($sql);
    }

?>
<!DOCTYPE html>
<html>

<head>
  <title></title>
  <link rel="stylesheet" type="text/css" href="../Css/cart.css">
</head>

<body>
  <h1>MY SHOPING CART</h1>
  <table style="margin-top: 50px;width: 97%;margin-left: 15px;" class="tbl">
    <tr>
      <th style="background-color: black; color: red">ID</th>
<!--       <th style="background-color: black; color: red">ID Pro</th>
 -->      <th style="background-color: black; color: red">Image</th>
      <th style="background-color: black; color: red">Quantity</th>
      <th style="background-color: black; color: red">Price</th>
      <th style="background-color: black; color: red">Total</th>
      <th style="background-color: black; color: red">Option</th>
    </tr>

    <?php
      for ($i = 0; $i < count($result); $i++) {
    ?>
      <tr>
        <form action="" method="POST">
          <th style="background-color: white">
            <p><?php echo $result[$i]['id'] ?></p>
          </th>
          <!-- <th style="background-color: white">
            <p><?php echo $result[$i]['idPro']?></p>
          </th> -->
          <th style="background-color: white">
            <img style="width: 30px;" src="../<?php echo $result[$i]['image']?>">
          </th>
          <th style="background-color: white">
            <p><?php echo $result[$i]['quantity'] ?></p>
          </th>
          <th style="background-color: white">
            <p><?php echo $result[$i]['price']?></p>
          </th>
          <th style="background-color: white">
            <p><?php echo $result[$i]['total']?></p>
          </th>
          <th style="background-color: white">
            <button type="submit" style="border-radius: 5px; background-color: brown;" name="dele" value="<?php echo $result[$i]->id ?>"> Delete</button>
          </th>
        </form>
      </tr>
    <?php
     }
    ?>
  </table>

  </div>
    <div class="pay">
    <h2>CỘNG GIỎ HÀNG</h2>
    <p>Tạm tính: <?php echo sum($result)." VNĐ"; ?></p>
    <p>Phí giao hàng: <?php echo (sum($result) * 0.1)." VNĐ"; ?></p>
    <p>Tổng: <?php echo (sum($result) + (sum($result) * 0.1))." VNĐ"; ?></p>
    <form action = "" method="post">
    <button style="text-align: center;">Thanh toán</button>
    </form>
  </div>
</body>

</html>