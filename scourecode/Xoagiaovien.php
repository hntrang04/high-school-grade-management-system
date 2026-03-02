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
$MAGV= $_GET["magv"];

include('connect.php');
$ACCOUNT_ID = mysqli_query( $db,"SELECT ACCOUNT_ID FROM GIAOVIEN WHERE MAGV = '$MAGV'");
$account_id = mysqli_fetch_array($ACCOUNT_ID);
$IDXOA = $account_id['ACCOUNT_ID'];
$xoa_gv = "DELETE FROM GIAOVIEN WHERE MAGV= '$MAGV'" ;
$xoa_gv_result = mysqli_query($db,$xoa_gv);
$xoa_taikhoan = "DELETE FROM ACCOUNT WHERE ID = '$IDXOA'" ;
$xoa_taikhoan_result = mysqli_query($db,$xoa_taikhoan);
};
header("location: quanligiaovien.php");

?>