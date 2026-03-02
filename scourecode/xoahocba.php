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
$xoa_hocbahhocki = "DELETE FROM hocbahocki WHERE MAHS= '$MAHS'" ;
$xoa_result_hocki = mysqli_query($db,$xoa_hocbanamhoc);
$xoa_result_namhoc = mysqli_query($db,$xoa_hocbahocki);

};
header("location: quanlihocba.php");

?>