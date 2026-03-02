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
    
    include('connect.php');
  if($USE == 1){
    if(isset($_POST['them'])  ){
    $MAGV = $_POST['MAGV'];
    $HOTEN = $_POST['HOTEN'];
    $GIOITINH = $_POST['GIOITINH'];
    $NGSINH = $_POST['NGSINH'];
    $SDT = $_POST['SDT'];
    $HOCVI = $_POST['HOCVI'];
    $LOPHOC_ID = $_POST['LOPHOC_ID'];
    $MAMH = $_POST['MAMH'];
    $ACCOUNT_ID = $_POST['ACCOUNT_ID'];
    $USERNAME = $_POST['USERNAME'];
    $PASSWORD = $_POST['PASSWORD'];
    
    $checkClassExists = mysqli_query($db, "SELECT * FROM lophoc WHERE MALOP = '$LOPHOC_ID'");
    $checkIDExists = mysqli_query($db, "SELECT * FROM ACCOUNT WHERE ID = '$ACCOUNT_ID'");
    $checkMSExists = mysqli_query($db, "SELECT * FROM GIAOVIEN WHERE MAGV = '$MAGV'");
      if (mysqli_num_rows($checkClassExists) <= 0  ) {
      echo "Error: The class ID ($LOPHOC_ID) you entered does not exist";
  }   else if (mysqli_num_rows($checkIDExists) > 0) {
    echo "The account ID ($ACCOUNT_ID)  you entered exist";}
    
      else if (mysqli_num_rows($checkMSExists) > 0) {
      echo "The giao vien ID ($MAGV)  you entered exist";}
     else {
    $themacc = "INSERT INTO ACCOUNT(ID, USERNAME, PASSWORD) VALUES('$ACCOUNT_ID', '$USERNAME', '$PASSWORD')";
    $themacc_query= mysqli_query($db, $themacc);
    $themsql = "INSERT INTO GIAOVIEN(MAGV, HOTEN, GIOITINH, NGSINH, SDT, HOCVI, LOPHOC_ID, MAMH, ACCOUNT_ID) VALUES('$MAGV','$HOTEN', '$GIOITINH', '$NGSINH', '$SDT', '$HOCVI', '$LOPHOC_ID', '$MAMH', '$ACCOUNT_ID')";
    $themquery = mysqli_query($db, $themsql);
    displaySuccessMessage("Thêm giáo viên thành công");}
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
    <title>Quản lí giáo viên</title>
    <style>
   .d-flex{
    align-items: center;
    justify-content: center;
    margin: 10px;
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
      <a class="navbar-brand" href="quanligiaovien.php">Quản lí giáo viên</a>
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

<div class="container-fluid">
        <div class="text-center">
             <h2>Danh sách giáo viên</h>
        </div>
        <table class="table table-hover">
          <thead class="table-dark">
              <tr>
                <th>Mã giáo viên</th>
                <th>Họ và tên giáo viên</th>
                <th>Giới tính</th>
                <th>Ngày sinh</th>
                <th>Số điện thoại</th>
                <th>Học vị</th>
                <th>Lớp đang chủ nhiệm</th>
                <th>Môn học đảm nhiệm</th>
                <th>Hành động</th>
                <th><button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#themgiaovien">Thêm giáo viên</button></th>
              </tr>
          </thead>
          <tbody>
            <?php
            include('connect.php');
            $lietke_sql = " SELECT * FROM GIAOVIEN ORDER BY MAGV";
            $lietke_result = mysqli_query($db, $lietke_sql);
            while ($lietke_row = mysqli_fetch_array($lietke_result)) {
            ?>
              <tr>
                <td><?php echo $lietke_row['MAGV'];?></td>
                <td><?php echo $lietke_row['HOTEN'];?></td>
                <td><?php echo $lietke_row['GIOITINH'];?></td>
                <td><?php echo $lietke_row['NGSINH'];?></td>
                <td><?php echo $lietke_row['SDT'];?></td>
                <td><?php echo $lietke_row['HOCVI'];?></td>
                <td><?php echo $lietke_row['LOPHOC_ID'];?></td>
                <td><?php echo $lietke_row['MAMH'];?></td>
                <td><a class="btn btn-primary" href="Capnhatgiaovien.php?magv=<?php echo $lietke_row['MAGV']; ?>">
                          Cập nhật
                     </a>
                      <a onclick = "return confirm('Xác nhận xóa giáo viên');" href="Xoagiaovien.php?magv=<?php echo $lietke_row['MAGV'];?>" class="btn btn-danger">Xóa</a>
                </td>
             </tr>
             <?php
               }
             ?>      
    </tbody>
        </table>
    </div>


    
  <div class="modal" id="themgiaovien">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Thêm thông tin giáo viên</h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
       <form action="Quanligiaovien.php" method="post">
          <div class="text"><h3>Thêm thông tin giáo viên</h3></div>
            <div class="mb-3 mt-3">
              <label for="text" class="form-label">Mã giáo viên:</label>
              <input type="text" class="form-control" id="MAGV" placeholder="Mã giáo viên" name="MAGV" required autofocus>
            </div>
            <div class="mb-3 mt-3">
              <label for="text" class="form-label">Họ và tên giáo viên:</label>
              <input type="text" class="form-control" id="HOTEN" placeholder="Họ và tên giáo viên" name="HOTEN" required autofocus>
            </div>
            <div class="mb-3 mt-3">
              <label for="text" class="form-label">Giới tính</label>
              <input type="text" class="form-control" id="GIOITINH" placeholder="Giới tính" name="GIOITINH" required autofocus>
            </div>
            <div class="mb-3 mt-3">
              <label for="date" class="form-label">Ngày sinh</label>
              <input type="date" class="form-control" id="NGSINH" placeholder="Ngày sinh " name="NGSINH" required autofocus>
            </div>
            <div class="mb-3 mt-3">
              <label for="text" class="form-label">Số điện thoại</label>
              <input type="text" class="form-control" id="SDT" placeholder="Số điện thoại" name="SDT" required autofocus>
            </div>
            <div class="mb-3 mt-3">
              <label for="text" class="form-label">Học vị</label>
              <input type="text" class="form-control" id="HOCVI" placeholder="Học vị" name="HOCVI" required autofocus>
            </div>
            <div class="mb-3 mt-3">
              <label for="text" class="form-label">Mã lớp chủ nhiệm</label>
              <input type="text" class="form-control" id="LOPHOC_ID" placeholder="Lớp chủ nhiệm" name="LOPHOC_ID" >
            </div>
            <div class="mb-3 mt-3">
              <label for="text" class="form-label">Mã môn học giảng dạy</label>
              <input type="text" class="form-control" id="MAMH" placeholder="Môn học giảng dạy" name="MAMH" >
            </div>
            <div class="mb-3 mt-3">
              <label for="text" class="form-label">Mã tài khoản</label>
              <input type="text" class="form-control" id="ACCOUNT_ID" placeholder="Mã tài khoản" name="ACCOUNT_ID" >
            </div>
            <div class="mb-3 mt-3">
              <label for="text" class="form-label">Tên tài khoản</label>
              <input type="text" class="form-control" id="USERNAME" placeholder="Tên tài khoản" name="USERNAME" >
            </div>
            <div class="mb-3 mt-3">
              <label for="pwd" class="form-label">Mật khẩu tài khoản</label>
              <input type="password" class="form-control" id="PASSWORD" placeholder="Mật khẩu tài khoản" name="PASSWORD" >
            </div>
            
            <button type="submit" class="btn btn-success" name="them">Thêm giáo viên</button>
       </form>
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Thoát</button>
      </div>

    </div>
  </div>
</body>