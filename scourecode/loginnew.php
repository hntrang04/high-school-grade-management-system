<?php
session_start();
if (isset($_SESSION["username"]) ){
    header('location: homenew.php');
}

    if(isset($_POST['dangnhap'])  ){
        $username = $_POST['username'];
        $password = $_POST['password'];

    include('connect.php');
    // Xác minh thông tin đăng nhập
    $sql = "SELECT * FROM account WHERE username = '$username' AND password = '$password'";
    $result = $db->query($sql);
    
    if ($result->num_rows > 0) {
        
        session_start();
        $_SESSION['username'] = $username;
        header('Location: homenew.php');
    } else {
        // Đăng nhập thất bại
        echo '<p>Tên đăng nhập hoặc mật khẩu không chính xác.</p>';
    }

    $db->close();
/*
    if($username =='admin' && $password == 'admin'){
        $_SESSION['username'] = '$username';
        header('location: home.php');
    }
*/
}

?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="login.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <title>Đăng nhập</title>
    <style>

    .container {
      display: flex;
      justify-content: center;
      align-items: center;
      width: 400px;
      height: 350px;
      margin: 20px auto;
      background-color: rgba(245, 130, 87, 0.5);
      padding: 20px;
      border-radius: 20px;
      position: absolute; /* Đặt con thành vị trí tuyệt đối */
      top: 20%; /* Đặt vị trí trên cùng của con 50% */
      left: 38%; /* Đặt vị trí bên trái của con 50% */
    } 
    .button-container {
      display: flex;
      justify-content: center;
      align-items: center;
    }
    .text {
      display: flex;
      justify-content: center;
      align-items: center;
    }
   
  </style>
</head>

 <body>
    <div class="container">
 <form action="loginnew.php" method="post">
 <div class="text"><h3>Đăng nhập</h3></div>
  <div class="mb-3 mt-3">
    <label for="text" class="form-label">Tên đăng nhập:</label>
    <input type="text" class="form-control" id="username" placeholder="Enter username" name="username" required autofocus>
  </div>
  <div class="mb-3">
    <label for="pwd" class="form-label">Mật khẩu:</label>
    <input type="password" class="form-control" id="password" placeholder="Enter password" name="password">
  </div>
  <div class="form-check mb-3">
    <label class="form-check-label">
      <input class="form-check-input" type="checkbox" name="remember"> Remember me
    </label>
  </div>
  <div class="button-container">
  <button type="submit" class="btn btn-primary" name="dangnhap">Đăng nhập</button>
  </div>
</form>
</div>
 </body>