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
if($USE == 1){
$MALOP= $_GET["malop"];

include('connect.php');
$xoa_sql = "DELETE FROM lophoc WHERE MALOP= '$MALOP'" ;
$xoa_result = mysqli_query($db,$xoa_sql);
};
header("location: quanlilop.php");
?>