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
      $MALOP= $_GET["malop"];
      $GVID = mysqli_query($db, "SELECT * FROM GIAOVIEN WHERE ACCOUNT_ID = '$USE'");
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
    <title>Quản lí học bạ</title>
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
.table{
    width: 100%;
}
   </style>
</head>

<body>
 <nav class="navbar navbar-expand-sm bg-dark navbar-dark fixed-top">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="QuanLihanhkiemki1.php">Quản lí học bạ</a>
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
<div class="container -fluid">
        <div class="text-center">
             <h2>Học bạ cả năm</h>
        </div>
        <table class="table table-hover">
          <thead class="table-dark">
              <tr>
                <th>Mã học sinh</th>
                <th>Tên học sinh</th>
                <th>Mã lớp</th>
                <th>Năm học</th>
                <th>Điểm trung bình môn toán</th>
                <th>Điểm trung bình môn văn</th>
                <th>Điểm trung bình môn anh</th>
                <th>Loại hạnh kiểm</th>
                <th>Điểm trung bình năm</th>
                <th>Học lực</th>
                <th>Hành động</th>
              </tr>
          </thead>
          <tbody>
          <?php
            include('connect.php');
            $lietke_sql = "SELECT * FROM hocbanamhoc AS hb
               INNER JOIN HOCSINH AS hs ON hb.MAHS = hs.MAHS WHERE hb.MALOP = '$MALOP' AND hs.MALOP='$MALOP' order by hb.MAHS
               LIMIT 0, 25";
            $lietke_result = mysqli_query($db, $lietke_sql);
            while ($lietke_row = mysqli_fetch_array($lietke_result)) {
            ?>
                <td><?php echo $lietke_row['MAHS'];?></td>
                <td><?php echo $lietke_row['HOTEN'];?></td>
                <td><?php echo $lietke_row['MALOP'];?></td>
                <td><?php echo $lietke_row['NAMHOC'];?></td>
                <td><?php echo $lietke_row['DTBTOANNH'];?> </td>
                <td><?php echo $lietke_row['DTBVANNH'];?></td>
                <td><?php echo $lietke_row['DTBANHNH'];?></td>
                <td><?php echo $lietke_row['LOAIHK'];?></td>
                <td><?php echo $lietke_row['DTBNH'];?></td>
                <td><?php echo $lietke_row['LOAIHL'];?></td>
                <td><a class="btn btn-danger" href="xoahocba.php?mahs=<?php echo $lietke_row['MAHS']; ?>">
                          Xóa
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