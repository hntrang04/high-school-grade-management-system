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
};


if($USE ==1 ){
if(isset($_POST['capnhat'])  ){
    $MALOP = $_POST['MALOP'];
    $TENLOP = $_POST['TENLOP'];
    $SISO = $_POST['SISO'];
    $NAMHOC = $_POST['NAMHOC'];
    $MAGV_CNHIEM = $_POST['MAGV_CNHIEM'];
    $MAGV_BOMON1 = $_POST['MAGV_BOMON1'];
    $MAGV_BOMON2 = $_POST['MAGV_BOMON2'];
    include "connect.php";
    $update_sql = "UPDATE LOPHOC SET TENLOP = '$TENLOP', SISO ='$SISO', NAMHOC = '$NAMHOC', MAGV_CNHIEM = '$MAGV_CNHIEM', MAGV_BOMON1 = '$MAGV_BOMON1', MAGV_BOMON2 = '$MAGV_BOMON2'WHERE MALOP = '$MALOP'";
    echo $update_sql;
 if (mysqli_query($db, $update_sql)){
       header("location: quanlilop.php");
   };
  };
};
header("location: quanlilop.php");
?>