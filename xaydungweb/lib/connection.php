<?php
 $conn=mysqli_connect("localhost","root","","thong_tin_khach_hang");
 if(!$conn)
 {
   die("Error:" .mysqli_connect_error());
 }
 else {
    mysqli_set_charset($conn,'utf8');
 }
?>
