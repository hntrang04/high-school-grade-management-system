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
if($USE==1){
$MAHS= $_GET["mahs"];

include('connect.php');
$xoa_hocbanamhoc = "DELETE FROM hocbanamhoc WHERE MAHS= '$MAHS'" ;
$xoa_resulthocbanamhoc = mysqli_query($db,$xoa_hocbanamhoc);
$xoa_hocbahocki = "DELETE FROM hocbahocki WHERE MAHS= '$MAHS'" ;
$xoa_resulthocbahocki = mysqli_query($db,$xoa_hocbahocki);
$xoa_diem = "DELETE FROM diemmonhoc WHERE MAHS= '$MAHS'" ;
$xoa_diemresult = mysqli_query($db,$xoa_diem);
$xoa_hanhkiem = "DELETE FROM hanhkiem WHERE MAHS= '$MAHS'" ;
$xoa_hanhkiemre = mysqli_query($db,$xoa_hanhkiem);
$xoa_sql = "DELETE FROM HOCSINH WHERE MAHS= '$MAHS'" ;
$xoa_result = mysqli_query($db,$xoa_sql);
};
header("location: quanlihocsinh.php");

?>