<?php include '../lib/connection.php' ?>
<?php
  if(isset($_GET['id']) && filter_var($_GET['id']))
  {
    $ID=$_GET['id'];
    $sql="DELETE FROM update_img WHERE id=$ID";
    $result=mysqli_query($conn,$sql);
        header('Location:list.php');
  }
  ?>
