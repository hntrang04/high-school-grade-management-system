<?php
include "connect.php";

session_start();
    if (!isset($_SESSION["username"]) ) {
        header('location:login.php');
    }else{
      $username = $_SESSION['username'];
      include('connect.php');
      $userID = mysqli_query($db, "SELECT ID FROM ACCOUNT WHERE username = '$username'");
      $lietke_row = mysqli_fetch_array($userID);
      $USE = $lietke_row['ID'];
    };
if($USE == 1){
if(isset($_POST['capnhat'])  ){
    $MAHS = $_POST['MAHS'];
    $HOTEN = $_POST['HOTEN'];
    $GIOITINH = $_POST['GIOITINH'];
    $NGSINH = $_POST['NGSINH'];
    $DIACHI = $_POST['DIACHI'];
    $MALOP = $_POST['MALOP'];
    $NAMHOC = $_POST['NAMHOC'];

    $update_sql = "UPDATE HOCSINH SET HOTEN = '$HOTEN', MALOP = '$MALOP', GIOITINH ='$GIOITINH', NGSINH = '$NGSINH', DIACHI = '$DIACHI', NAMHOC = '$NAMHOC' WHERE MAHS = '$MAHS'";
    $update_malop_hk ="UPDATE HANHKIEM SET MALOP = '$MALOP', NAMHOC = '$NAMHOC' WHERE MAHS ='$MAHS'" ;
    $update_malop_hocbahocki ="UPDATE HOCBAHOCKI SET MALOP = '$MALOP', NAMHOC = '$NAMHOC' WHERE MAHS ='$MAHS'" ;
    $update_malop_hocbanamhoc ="UPDATE HOCBANAMHOC SET MALOP = '$MALOP', NAMHOC = '$NAMHOC' WHERE MAHS ='$MAHS'" ;
    $update_malop_diemmonhoc ="UPDATE DIEMMONHOC SET MALOP = '$MALOP', NAMHOC = '$NAMHOC' WHERE MAHS ='$MAHS'" ;
 if (mysqli_query($db, $update_sql) && mysqli_query($db,$update_malop_hk) && mysqli_query($db,$update_malop_hocbahocki)&& mysqli_query($db,$update_malop_hocbanamhoc)&& mysqli_query($db,$update_malop_diemmonhoc)){
       header("location: quanlihocsinh.php");
   }
}
}
header("location: quanlihocsinh.php");
?>