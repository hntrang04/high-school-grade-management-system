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
    function displaySuccessMessage($message) {
      echo "<p class='alert alert-success'>$message</p>";
    }
    if($USE == 1){
    include('connect.php');
    if(isset($_POST['them'])  ){
    $MALOP = $_POST['MALOP'];
    $TENLOP = $_POST['TENLOP'];
    $SISO = $_POST['SISO'];
    $NAMHOC = $_POST['NAMHOC'];
    $MAGV_CNHIEM = $_POST['MAGV_CNHIEM'];
    $MAGV_BOMON1 = $_POST['MAGV_BOMON1'];
    $MAGV_BOMON2 = $_POST['MAGV_BOMON2'];
    
    $checkClassExists = mysqli_query($db, "SELECT * FROM lophoc WHERE MALOP = '$MALOP'");
    if (mysqli_num_rows($checkClassExists) > 0  ) {
      echo "Error: The class ID ($MALOP) you entered exist";
  } else{
    $themsql = "INSERT INTO LOPHOC(MALOP, TENLOP, SISO, NAMHOC, MAGV_CNHIEM, MAGV_BOMON1, MAGV_BOMON2) VALUES('$MALOP','$TENLOP', '$SISO', '$NAMHOC', '$MAGV_CNHIEM', '$MAGV_BOMON1','$MAGV_BOMON2')";
    $themquery = mysqli_query($db, $themsql);
    displaySuccessMessage("Thêm lớp thành công");
  }
    }
  }
  $searchQuery = "";
    if (isset($_GET['search'])) {
        $searchQuery = mysqli_real_escape_string($db, trim($_GET['search'])); // Sanitize user input
    }

    $lietke_sql = "SELECT * FROM lophoc";
    if (!empty($searchQuery)) {
        $lietke_sql .= " WHERE (MALOP LIKE '%$searchQuery%' OR TENLOP LIKE '%$searchQuery%' OR NAMHOC LIKE '%$searchQuery%')";
    }
    $lietke_sql .= " ORDER BY MALOP";

    $lietke_result = mysqli_query($db, $lietke_sql);

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
    <title>Quản lí lớp</title>
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
      <a class="navbar-brand" href="QuanLiLop.php">Quản lí lớp</a>
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
      <form method="get" class="form-inline"> <input class="form-control me-2" type="search" name="search" placeholder="Tìm kiếm lớp" aria-label="Search">
      <button class="btn btn-outline-success" type="submit">Tìm kiếm</button>
      </form>
      <li><a href="logout.php"><span class="glyphicon glyphicon-log-in"></span> Logout</a></li>
    </ul>
  </div>
</nav>
    <div class="container mt-3">
        <div class="text-center">
             <h2>Lớp đang quản lí</h>
        </div>
        <table class="table table-hover">
          <thead class="table-dark">
              <tr>
                <th>Mã lớp</th>
                <th>Tên lớp</th>
                <th>Sĩ số</th>
                <th>Năm học</th>
                <th>Giáo viên chủ nhiệm</th>
                <th>Giáo viên bộ môn 1</th>
                <th>Giáo viên bộ môn 2</th>
                <th>Hành động</th>
                <th><button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#themlop">Thêm lớp học</button></th>
              </tr>
          </thead>
          <tbody>
          <?php
            include('connect.php');
            $lietke_sql = " SELECT * FROM lophoc ORDER BY MALOP";
            $lietke_result = mysqli_query($db, $lietke_sql);
            while ($lietke_row = mysqli_fetch_array($lietke_result)) {
            ?>
              <tr>
                <td><?php echo $lietke_row['MALOP'];?></td>
                <td><?php echo $lietke_row['TENLOP'];?></td>
                <td><?php echo $lietke_row['SISO'];?></td>
                <td><?php echo $lietke_row['NAMHOC'];?></td>
                <td><?php echo $lietke_row['MAGV_CNHIEM'];?></td>
                <td><?php echo $lietke_row['MAGV_BOMON1'];?></td>
                <td><?php echo $lietke_row['MAGV_BOMON2'];?></td>
                <td><a class="btn btn-primary" href="Capnhatlop.php?malop=<?php echo $lietke_row['MALOP']; ?>">
                          Cập nhật
                     </a>
                      <a onclick = "return confirm('Xác nhận xóa lớp học');" href="Xoalop.php?malop=<?php echo $lietke_row['MALOP'];?>" class="btn btn-danger">Xóa</a>
                </td>
             </tr>
             <?php
               }
             ?>      
    </tbody>
        </table>
    </div>


    <div class="modal" id="themlop">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Thêm thông tin lớp học</h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
       <form action="Quanlilop.php" method="post">
          <div class="text"><h3>Thêm lớp học mới</h3></div>
            <div class="mb-3 mt-3">
              <label for="text" class="form-label">Mã lớp:</label>
              <input type="text" class="form-control" id="MAHS" placeholder="Mã lớp" name="MALOP" required autofocus>
            </div>
            <div class="mb-3 mt-3">
              <label for="text" class="form-label">Tên lớp học:</label>
              <input type="text" class="form-control" id="TENLOP" placeholder="Tên lớp học" name="TENLOP" required autofocus>
            </div>
            <div class="mb-3 mt-3">
              <label for="text" class="form-label">Sĩ số lớp</label>
              <input type="text" class="form-control" id="SISO" placeholder="Sĩ số lớp" name="SISO" required autofocus>
            </div>
            <div class="mb-3 mt-3">
              <label for="text" class="form-label">Năm học</label>
              <input type="text" class="form-control" id="NAMHOC" placeholder="Năm học" name="NAMHOC" required autofocus>
            </div>
            <div class="mb-3 mt-3">
              <label for="text" class="form-label">Giáo viên chủ nhiệm</label>
              <input type="text" class="form-control" id="MAGV_CNHIEM" placeholder="Giáo viên chủ nhiệm" name="MAGV_CNHIEM" required autofocus>
            </div>
            <div class="mb-3 mt-3">
              <label for="text" class="form-label">Giáo viên bộ môn 1</label>
              <input type="text" class="form-control" id="MAGV_BOMON1" placeholder="Giáo viên bộ môn 1" name="MAGV_BOMON1" required autofocus>
            </div>
            <div class="mb-3 mt-3">
              <label for="text" class="form-label">Giáo viên bộ môn 2</label>
              <input type="text" class="form-control" id="MAGV_BOMON2" placeholder="Giáo viên bộ môn 2" name="MAGV_BOMON2" required autofocus>
            </div>
            
            <button type="submit" class="btn btn-success" name="them">Thêm lớp học</button>
       </form>
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Thoát</button>
      </div>

    </div>
  </div>
</body>