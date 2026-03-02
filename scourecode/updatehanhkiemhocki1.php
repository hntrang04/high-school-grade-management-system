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
if(isset($_POST['capnhathanhkiem'])  ){
    $MAHS = $_POST['MAHS'];
    $MALOP = $_POST['MALOP'];
    $HOCKY = $_POST['HOCKY'];
    $NAMHOC = $_POST['NAMHOC'];
    $LOAIHK = $_POST['LOAIHK'];

    $update_sql = "UPDATE HANHKIEM SET LOAIHK ='$LOAIHK' WHERE MALOP = '$MALOP'AND MAHS ='$MAHS'AND HOCKY = '$HOCKY'";
    if(mysqli_query($db, $update_sql));{
     $update_HKHK = "UPDATE HOCBAHOCKI SET LOAIHK ='$LOAIHK' WHERE MALOP = '$MALOP'AND MAHS ='$MAHS' AND HOCKY = '$HOCKY'";
    if(mysqli_query($db, $update_HKHK)){
   header("location: quanlihanhkiemki1.php?malop=$MALOP");
                                      }
   
}
}

?>