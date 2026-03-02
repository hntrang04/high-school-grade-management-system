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
      $GVID = mysqli_query($db, "SELECT MAGV FROM GIAOVIEN WHERE ACCOUNT_ID = '$USE'");
      $GVID_row = mysqli_fetch_array($GVID);
      $MGV = $GVID_row['MAGV'];


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
      <a class="navbar-brand" href="QuanLiDiemnew.php">Quản lí điểm</a>
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
    <div class="container mt-3">
        <div class="text-center">
             <h2>Danh sách các lớp đang quản lí</h>
        </div>
        <table class="table table-hover">
          <thead class="table-dark">
              <tr>
                <th>Mã lớp</th>
                <th>Tên lớp</th>
                <th>Sĩ số</th>
                <th>Năm học</th>
                <th>Hành động</th>
              </tr>
          </thead>
          <tbody>
          <?php
            include('connect.php');
            $lietke_sql = " SELECT * FROM LOPHOC WHERE MAGV_CNHIEM ='$MGV' OR MAGV_BOMON1 ='$MGV' OR MAGV_BOMON2 ='$MGV'";
            $lietke_result = mysqli_query($db, $lietke_sql);
            while ($lietke_row = mysqli_fetch_array($lietke_result)) {
            ?>
              <tr>
                <td><?php echo $lietke_row['MALOP'];?></td>
                <td><?php echo $lietke_row['TENLOP'];?></td>
                <td><?php echo $lietke_row['SISO'];?></td>
                <td><?php echo $lietke_row['NAMHOC'];?></td>
                <td><a class="btn btn-primary" href="quanlidiemhocki1.php?malop=<?php echo $lietke_row['MALOP']; ?>">
                          Học kì 1
                     </a>
                     <a class="btn btn-primary" href="quanlidiemhocki2.php?malop=<?php echo $lietke_row['MALOP']; ?>">
                          Học kì 2
                     </a>
                </td>
             </tr>
             <?php
               }
             ?>          
    </tbody>
        </table>
    </div>
</body>