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

    function displaySuccessMessage($message) {
      echo "<p class='alert alert-success'>$message</p>";
    }
    
    include('connect.php');
  
    if(isset($_POST['them'])  ){
    $MAHS = $_POST['MAHS'];
    $HOTEN = $_POST['HOTEN'];
    $GIOITINH = $_POST['GIOITINH'];
    $NGSINH = $_POST['NGSINH'];
    $DIACHI = $_POST['DIACHI'];
    $MALOP = $_POST['MALOP'];
    $NAMHOC = $_POST['NAMHOC'];
    
    $checkClassExists = mysqli_query($db, "SELECT * FROM lophoc WHERE MALOP = '$MALOP'");
    $checkIDExists = mysqli_query($db, "SELECT * FROM lophoc WHERE MALOP = '$MAHS'");
    if (mysqli_num_rows($checkClassExists) <= 0  ) {
      echo "Error: The class ID ($MALOP) you entered does not exist";
  } else if (mysqli_num_rows($checkIDExists) > 0) {
    echo "The Student ID ($MAHS)  you entered exist";
  } else{
    $themsql = "INSERT INTO HOCSINH(MAHS, HOTEN, MALOP, GIOITINH, NGSINH, DIACHI, NAMHOC) VALUES('$MAHS','$HOTEN', '$MALOP', '$GIOITINH', '$NGSINH', '$DIACHI', '$NAMHOC')";
    $themsqlHK1 = "INSERT INTO HANHKIEM(MAHS, MALOP, HOCKY, NAMHOC) VALUES('$MAHS', '$MALOP',1, '$NAMHOC')";
    $themsqlHK2 = "INSERT INTO HANHKIEM(MAHS, MALOP, HOCKY, NAMHOC) VALUES('$MAHS', '$MALOP',2, '$NAMHOC')";
    $themsqlHBK1 = "INSERT INTO HOCBAHOCKI(MAHS, MALOP, HOCKY, NAMHOC) VALUES('$MAHS', '$MALOP', 1, '$NAMHOC')";
    $themsqlHBK2 = "INSERT INTO HOCBAHOCKI(MAHS, MALOP, HOCKY, NAMHOC) VALUES('$MAHS', '$MALOP', 2, '$NAMHOC')";
    $themsqlHBN = "INSERT INTO HOCBANAMHOC(MAHS, MALOP, NAMHOC) VALUES('$MAHS', '$MALOP', '$NAMHOC')";
    $themsqlDT1 = "INSERT INTO DIEMMONHOC(MAHS, MALOP, MAMH, HOCKY, NAMHOC) VALUES('$MAHS', '$MALOP', 'TOAN', 1, '$NAMHOC')";
    $themsqlDT2 = "INSERT INTO DIEMMONHOC(MAHS, MALOP, MAMH, HOCKY, NAMHOC) VALUES('$MAHS', '$MALOP', 'TOAN', 2, '$NAMHOC')";
    $themsqlDV1 = "INSERT INTO DIEMMONHOC(MAHS, MALOP, MAMH, HOCKY, NAMHOC) VALUES('$MAHS', '$MALOP', 'VAN', 1, '$NAMHOC')";
    $themsqlDV2 = "INSERT INTO DIEMMONHOC(MAHS, MALOP, MAMH, HOCKY, NAMHOC) VALUES('$MAHS', '$MALOP', 'VAN', 2, '$NAMHOC')";
    $themsqlDA1 = "INSERT INTO DIEMMONHOC(MAHS, MALOP, MAMH, HOCKY, NAMHOC) VALUES('$MAHS', '$MALOP', 'ANH', 1, '$NAMHOC')";
    $themsqlDA2 = "INSERT INTO DIEMMONHOC(MAHS, MALOP, MAMH, HOCKY, NAMHOC) VALUES('$MAHS', '$MALOP', 'ANH', 2, '$NAMHOC')";
    $themquery = mysqli_query($db, $themsql);
    $themquery2 = mysqli_query($db, $themsqlHK1);
    $themquery3 = mysqli_query($db, $themsqlHK2);
    $themquery4 = mysqli_query($db, $themsqlHBK1);
    $themquery5 = mysqli_query($db, $themsqlHBK2);
    $themquery6 = mysqli_query($db, $themsqlHBN);
    $themquery7 = mysqli_query($db, $themsqlDT1);
    $themquery8 = mysqli_query($db, $themsqlDV1);
    $themquery9= mysqli_query($db, $themsqlDA1);
    $themquery10 = mysqli_query($db, $themsqlDT2);
    $themquery11 = mysqli_query($db, $themsqlDV2);
    $themquery12= mysqli_query($db, $themsqlDA2);
    displaySuccessMessage("Thêm học sinh thành công");
  }
    }
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
      <a class="navbar-brand" href="homenew.php">Quản lí học sinh</a>
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
 <div class="container mt-3">
        <div class="text-center">
             <h2>Danh sách học sinh </h>
        </div>
        <table class="table table-hover">
          <thead class="table-dark">
              <tr>
                <th>Mã học học sinh</th>
                <th>Họ và tên</th>
                <th>Mã lớp</th>
                <th>Giới tính</th>
                <th>Ngày sinh</th>
                <th>Địa chỉ</th>
                <th>Năm học</th>
                <th>Hành động</th>
                <th><button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#themhocsinh">Thêm học sinh</button></th>
              </tr>
          </thead>
          <tbody>
            <?php
            include('connect.php');
            $lietke_sql = " SELECT * FROM hocsinh ORDER BY MAHS, MALOP";
            $lietke_result = mysqli_query($db, $lietke_sql);
            while ($lietke_row = mysqli_fetch_array($lietke_result)) {
            ?>
              <tr>
                <td><?php echo $lietke_row['MAHS'];?></td>
                <td><?php echo $lietke_row['HOTEN'];?></td>
                <td><?php echo $lietke_row['MALOP'];?></td>
                <td><?php echo $lietke_row['GIOITINH'];?></td>
                <td><?php echo $lietke_row['NGSINH'];?></td>
                <td><?php echo $lietke_row['DIACHI'];?></td>
                <td><?php echo $lietke_row['NAMHOC'];?></td>
                <td><a class="btn btn-primary" href="Capnhathocsinh.php?mahs=<?php echo $lietke_row['MAHS']; ?>">
                          Cập nhật
                     </a>
                      <a onclick = "return confirm('Xác nhận xóa học sinh');" href="Xoahocsinh.php?mahs=<?php echo $lietke_row['MAHS'];?>" class="btn btn-danger">Xóa</a>
                </td>
             </tr>
             <?php
               }
             ?>      
    </tbody>
        </table>
    </div>


    
  <div class="modal" id="themhocsinh">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Thêm thông tin học sinh</h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
       <form action="Quanlihocsinh.php" method="post">
          <div class="text"><h3>Thêm thông tin học sinh</h3></div>
            <div class="mb-3 mt-3">
              <label for="text" class="form-label">Mã học sinh:</label>
              <input type="text" class="form-control" id="MAHS" placeholder="Mã học sinh" name="MAHS" required autofocus>
            </div>
            <div class="mb-3 mt-3">
              <label for="text" class="form-label">Họ và tên học sinh:</label>
              <input type="text" class="form-control" id="HOTEN" placeholder="Họ và tên học sinh" name="HOTEN" required autofocus>
            </div>
            <div class="mb-3 mt-3">
              <label for="text" class="form-label">Mã lớp</label>
              <input type="text" class="form-control" id="MALOP" placeholder="Lớp đang học" name="MALOP" required autofocus>
            </div>
            <div class="mb-3 mt-3">
              <label for="text" class="form-label">Giới tính</label>
              <input type="text" class="form-control" id="GIOITINH" placeholder="Giới tính học sinh" name="GIOITINH" required autofocus>
            </div>
            <div class="mb-3 mt-3">
              <label for="date" class="form-label">Ngày sinh</label>
              <input type="date" class="form-control" id="NGSINH" placeholder="Ngày sinh học sinh" name="NGSINH" required autofocus>
            </div>
            <div class="mb-3 mt-3">
              <label for="text" class="form-label">Địa chỉ</label>
              <input type="text" class="form-control" id="DIACHI" placeholder="Địa chỉ học sinh" name="DIACHI" required autofocus>
            </div>
            <div class="mb-3 mt-3">
              <label for="text" class="form-label">Năm học</label>
              <input type="text" class="form-control" id="NAMHOC" placeholder="Năm học" name="NAMHOC" required autofocus>
            </div>
            
            <button type="submit" class="btn btn-success" name="them">Thêm học sinh</button>
       </form>
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Thoát</button>
      </div>

    </div>
  </div>

  
</body>