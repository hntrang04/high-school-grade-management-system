<?php
    session_start();
    if (!isset($_SESSION["username"]) ) {
        header('location:loginnew.php');
    }else{
      $username = $_SESSION['username'];
      include('connect.php');
      $userID = mysqli_query($db, "SELECT ID FROM ACCOUNT WHERE username = '$username'");
      $lietke_row = mysqli_fetch_array($userID);
      $USE = $lietke_row['ID'];
    }

      $MAHS = $_GET["mahs"];
      $GVID = mysqli_query($db, "SELECT * FROM GIAOVIEN WHERE ACCOUNT_ID = '$USE'");
      $GVID_row = mysqli_fetch_array($GVID);
      $MGV = $GVID_row['MAGV'];
      $MHGV = $GVID_row['MAMH'];
      $MALOP_sql = mysqli_query($db, "SELECT MALOP FROM HOCSINH WHERE MAHS = '$MAHS'");
      $MALOP_result = mysqli_fetch_array($MALOP_sql);
      $MALOP= $MALOP_result['MALOP'];

      // $DIEM_sql = "SELECT * FROM DIEMMONHOC AS dm
      //          INNER JOIN HOCSINH AS hs ON dm.MAHS = hs.MAHS WHERE dm.MALOP = '$MALOP' AND hs.MALOP='$MALOP'and dm.MAMH ='$MHGV' AND HOCKY= 1
      //          LIMIT 0, 25";
      //       $DIEM_result = mysqli_query($db, $DIEM_sql);
      //       $DIEM_row = mysqli_fetch_array($DIEM_result);

     // $DIEMHS = mysqli_query($db, "SELECT * FROM DIEMMONHOC AS dm
     //          INNER JOIN HOCSINH AS hs ON dm.MAHS = hs.MAHS WHERE dm.MALOP = '$MALOP' AND hs.MALOP='$MALOP'and dm.MAMH ='$MHGV' AND HOCKY= 1
     //          LIMIT 0, 25");
       $DIEM_sql = "SELECT *
     FROM DIEMMONHOC
     INNER JOIN HOCSINH ON DIEMMONHOC.MAHS = HOCSINH.MAHS
     WHERE DIEMMONHOC.MALOP = '$MALOP' AND HOCSINH.MALOP='$MALOP' AND DIEMMONHOC.MAMH ='$MHGV' AND HOCKY= 2 AND DIEMMONHOC.MAHS='$MAHS'
     LIMIT 0, 25";
     $DIEM_result = mysqli_query($db, $DIEM_sql);
     $row_DIEMHS = mysqli_fetch_array($DIEM_result);


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
    <title>Quản lí điểm</title>
    <style>
   .d-flex{
    align-items: center;
    justify-content: center;
    margin: 10px;
   }
   table, th, td {
  border: 1px solid #ddd; /* Example: Solid border with width 1px and color #ddd */
}
.text-center {
  display: flex;
  justify-content: center;
}
   </style>
</head>

<body>
 <nav class="navbar navbar-expand-sm bg-dark navbar-dark fixed-top">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="QuanLiDiemtheolop.php">Quản lí điểm</a>
    </div>
    <ul class="nav navbar-nav">
      <li class="active"><a href="homenew.php">Home</a></li>
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

<form action="updatediemhocki2.php" method="post">
          <div class="text"><h3>Cập nhật điểm học sinh</h3></div>
              <input type="hidden" class="form-control" id="MAHS" name="MAHS" value="<?php echo $row_DIEMHS['MAHS']?>"  required autofocus>
            <div class="mb-3 mt-3">
              <label for="text" class="form-label">Họ và tên học sinh</label>
              <input type="text" class="form-control" id="HOTEN" value="<?php echo $row_DIEMHS['HOTEN']?>" name="HOTEN" disabled required autofocus>
            </div>
              <input type="hidden" class="form-control" id="MALOP" value="<?php echo $row_DIEMHS['MALOP']?>" name="MALOP" required autofocus>
              <input type="hidden" class="form-control" id="HOCKY" value="<?php echo $row_DIEMHS['HOCKY']?>" name="HOCKY" required autofocus>            
              <input type="hidden" class="form-control" id="NAMHOC" value="<?php echo $row_DIEMHS['NAMHOC']?>" name="NAMHOC" required autofocus>
              <input type="hidden" class="form-control" id="MAMH" value="<?php echo $row_DIEMHS['MAMH']?>" name="MAMH" required autofocus>
            <div class="mb-3 mt-3">
              <label for="text" class="form-label">Điểm hệ số 1 thứ 1</label>
              <input type="number" min="0" max="10" step="0.25" class="form-control" id="DIEMHS1_1" value="<?php echo $row_DIEMHS['DIEMHS1_1']?>" name="DIEMHS1_1" >
            </div>
            <div class="mb-3 mt-3">
              <label for="text" class="form-label">Điểm hệ số 1 thứ 2</label>
              <input type="number" min="0" max="10" step="0.25"class="form-control" id="DIEMHS1_2" value="<?php echo $row_DIEMHS['DIEMHS1_2']?>" name="DIEMHS1_2">
            </div>
            <div class="mb-3 mt-3">
              <label for="text" class="form-label">Điểm hệ số 1 thứ 3</label>
              <input type="number" min="0" max="10" step="0.25" class="form-control" id="DIEMHS1_3" value="<?php echo $row_DIEMHS['DIEMHS1_3']?>" name="DIEMHS1_3">
            </div>
            <div class="mb-3 mt-3">
              <label for="text" class="form-label">Điểm hệ số 2 thứ 1</label>
              <input type="number" min="0" max="10" step="0.25" class="form-control" id="DIEMHS2_1" value="<?php echo $row_DIEMHS['DIEMHS2_1']?>" name="DIEMHS2_1">
            </div>
            <div class="mb-3 mt-3">
              <label for="text" class="form-label">Điểm hệ số 2 thứ 2</label>
              <input type="number" min="0" max="10" step="0.25" class="form-control" id="DIEMHS2_2" value="<?php echo $row_DIEMHS['DIEMHS2_2']?>" name="DIEMHS2_2">
            </div>
            <div class="mb-3 mt-3">
              <label for="text" class="form-label">Điểm hệ số 3 </label>
              <input type="number" min="0" max="10" step="0.25" class="form-control" id="DIEMHS3" value="<?php echo $row_DIEMHS['DIEMHS3']?>" name="DIEMHS3">
            </div>
            <button type="submit" class="btn btn-success" name="capnhatdiem">Cập nhật điểm học sinh</button>
       </form>
</body>