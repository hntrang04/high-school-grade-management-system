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
        if(isset($_POST['capnhat'])){
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
        
            $update_gv_sql = "UPDATE GIAOVIEN SET HOTEN = '$HOTEN', LOPHOC_ID = '$LOPHOC_ID', GIOITINH ='$GIOITINH', NGSINH = '$NGSINH', SDT = '$SDT', HOCVI= '$HOCVI', MAMH = '$MAMH' WHERE MAGV = '$MAGV'";
            $update_account_sql = "UPDATE ACCOUNT SET USERNAME ='$USERNAME', PASSWORD ='$PASSWORD' WHERE ID = '$ACCOUNT_ID'";
         if (mysqli_query($db, $update_gv_sql) && mysqli_query($db, $update_account_sql)) {
               header("location: quanligiaovien.php");
           }
        }
        }
        header("location: quanligiaovien.php");
?>