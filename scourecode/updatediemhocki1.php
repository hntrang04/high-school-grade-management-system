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

function displaySuccessMessage($message) {
    echo "<p class='alert alert-success'>$message</p>";
  }

include "connect.php";
if(isset($_POST['capnhatdiem'])  ){
    $MAHS = $_POST['MAHS'];
    $MALOP = $_POST['MALOP'];
    $MAMH= $_POST['MAMH'];
    $HOCKY = $_POST['HOCKY'];
    $NAMHOC = $_POST['NAMHOC'];
    $DIEMHS1_1 = $_POST['DIEMHS1_1'];
    $DIEMHS1_2 = $_POST['DIEMHS1_2'];
    $DIEMHS1_3 = $_POST['DIEMHS1_3'];
    $DIEMHS2_1 = $_POST['DIEMHS2_1'];
    $DIEMHS2_2 = $_POST['DIEMHS2_2'];
    $DIEMHS3 = $_POST['DIEMHS3'];

    $update_sql = "UPDATE DIEMMONHOC SET DIEMHS1_1 = '$DIEMHS1_1', DIEMHS1_2 ='$DIEMHS1_2', DIEMHS1_3= '$DIEMHS1_3', DIEMHS2_1 = '$DIEMHS2_1', DIEMHS2_2 = '$DIEMHS2_2', DIEMHS3 = '$DIEMHS3' WHERE MALOP = '$MALOP'AND MAHS ='$MAHS'AND HOCKY = '$HOCKY' AND MAMH= '$MAMH'";
   if(mysqli_query($db, $update_sql));{
    $update_dtbmh = "UPDATE DIEMMONHOC SET DTBMH = ($DIEMHS1_1 + $DIEMHS1_2 + $DIEMHS1_3 + $DIEMHS2_1 *2 + $DIEMHS2_2 *2 + $DIEMHS3 * 3) / 10 WHERE MALOP = '$MALOP' AND MAHS ='$MAHS'AND HOCKY = '$HOCKY' AND MAMH= '$MAMH'";
    if(mysqli_query($db, $update_dtbmh)){
      $update_dtbtoanhk = "UPDATE HOCBAHOCKI SET DTBTOANHK = (SELECT DTBMH FROM DIEMMONHOC WHERE MAMH='TOAN' AND MALOP='$MALOP' AND MAHS='$MAHS' AND HOCKY='$HOCKY' AND NAMHOC = '$NAMHOC' ) WHERE MALOP='$MALOP' AND MAHS='$MAHS' AND HOCKY='$HOCKY' AND NAMHOC = '$NAMHOC' ";
      $update_dtbvanhk = "UPDATE HOCBAHOCKI SET DTBVANHK = (SELECT DTBMH FROM DIEMMONHOC WHERE MAMH='VAN' AND MALOP='$MALOP' AND MAHS='$MAHS' AND HOCKY='$HOCKY' AND NAMHOC = '$NAMHOC' ) WHERE MALOP='$MALOP' AND MAHS='$MAHS' AND HOCKY='$HOCKY' AND NAMHOC = '$NAMHOC' ";
      $update_dtbanhhk = "UPDATE HOCBAHOCKI SET DTBANHHK = (SELECT DTBMH FROM DIEMMONHOC WHERE MAMH='ANH' AND MALOP='$MALOP' AND MAHS='$MAHS' AND HOCKY='$HOCKY' AND NAMHOC = '$NAMHOC' ) WHERE MALOP='$MALOP' AND MAHS='$MAHS' AND HOCKY='$HOCKY' AND NAMHOC = '$NAMHOC' ";
      if(mysqli_query($db,$update_dtbtoanhk) && mysqli_query($db,$update_dtbvanhk) && mysqli_query($db,$update_dtbanhhk) ){
      header("location: quanlidiemhocki1.php?malop=$MALOP");
      }
                                      }
   
}
}

?>