<?php
       // Kết nối với cơ sở dữ liệu
       $db = new mysqli('localhost', 'root', '', 'IS210');
    
       // Kiểm tra kết nối
       if ($db->connect_error) {
           die('Kết nối thất bại: ' . $db->connect_error);
       }
?>