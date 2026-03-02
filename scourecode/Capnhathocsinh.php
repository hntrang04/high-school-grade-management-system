<?php
session_start();
if (!isset($_SESSION["username"]) ) {
    header('location:login.php');
}else{
  $username = $_SESSION['username'];
  include('connect.php');
  $userID = mysqli_query($db, "SELECT ID FROM ACCOUNT WHERE username = '$username'");
  $lietke_row = mysqli_fetch_array($userID);
  $USE = $lietke_row['ID'];
}
$MAHS= $_GET["mahs"];

include "connect.php";

$capnhat_sql = "SELECT * FROM HOCSINH WHERE MAHS = '$MAHS'";
$capnhat_result = mysqli_query($db, $capnhat_sql);
$row = mysqli_fetch_array($capnhat_result);

?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <title>Quản lí học sinh</title>
    <style>
   .d-flex{
    align-items: center;
    justify-content: center;
    margin: 10px;
   }
   </style>
</head>

<body>
 <nav class="navbar navbar-expand-sm bg-dark navbar-dark fixed-top">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="quanlihocsinh.php">Quản lí học sinh</a>
    </div>
    <ul class="nav navbar-nav">
      <li class="active"><a href="Homenew.php">Home</a></li>
      <li><a href="Quanlidiemtheolop.php">Quản lí điểm</a></li>
      <li><a href="Quanlilop.php">Quản lí lớp</a></li>
      <li><a href="Quanlihocsinh.php">Quản lí học sinh</a></li>
      <li><a href="Quanligiaovien.php">Quản lí giáo viên</a></li>
      <li><a href="Quanlihanhkiem.php">Quản lí hạnh kiểm</a></li>
      <li><a href="Quanlihocba.php">Quản lí học bạ</a></li>
    </ul>
    <ul class="nav navbar-nav navbar-right">
      <form class="d-flex">
        <input class="form-control me-2" type="text" placeholder="Search">
        <button class="btn btn-primary" type="button">Search</button>
      </form>
      <li><a href="logout.php"><span class="glyphicon glyphicon-log-in"></span> Logout</a></li>
    </ul>
  </div>
 </nav>

<form action="updatehs.php" method="post">
          <div class="text"><h3>Cập nhật thông tin học sinh</h3></div>
            <div class="mb-3 mt-3">
              <label for="text" class="form-label">Mã học sinh:</label>
              <input type="hidden" class="form-control" id="MAHS" name="MAHS" value="<?php echo $row['MAHS']?>" autofocus>
            </div>
            <div class="mb-3 mt-3">
              <label for="text" class="form-label">Họ và tên học sinh:</label>
              <input type="text" class="form-control" id="HOTEN" value="<?php echo $row['HOTEN']?>" name="HOTEN" required autofocus>
            </div>
            <div class="mb-3 mt-3">
              <label for="text" class="form-label">Mã lớp</label>
              <input type="text" class="form-control" id="MALOP" value="<?php echo $row['MALOP']?>" name="MALOP" required autofocus>
            </div>
            <div class="mb-3 mt-3">
              <label for="text" class="form-label">Giới tính</label>
              <input type="text" class="form-control" id="GIOITINH" value="<?php echo $row['GIOITINH']?>" name="GIOITINH" required autofocus>
            </div>
            <div class="mb-3 mt-3">
              <label for="date" class="form-label">Ngày sinh</label>
              <input type="date" class="form-control" id="NGSINH" value="<?php echo $row['NGSINH']?>" name="NGSINH" required autofocus>
            </div>
            <div class="mb-3 mt-3">
              <label for="text" class="form-label">Địa chỉ</label>
              <input type="text" class="form-control" id="DIACHI" value="<?php echo $row['DIACHI']?>" name="DIACHI" required autofocus>
            </div>
            <div class="mb-3 mt-3">
              <label for="text" class="form-label">Năm học</label>
              <input type="text" class="form-control" id="NAMHOC" value="<?php echo $row['NAMHOC']?>" name="NAMHOC" required autofocus>
            </div>
            
            <button type="submit" class="btn btn-success" name="capnhat">Cập nhật thông tin học sinh</button>
       </form>
       </body>