<?php include 'header.php' ?>
<?php include 'side_bar.php' ?>
<?php include '../lib/connection.php' ?>
 <?php
 if(isset($_POST['submit']))
 {
    $img=$_FILES['link']['name'];
    $link='image/'.$img;
    move_uploaded_file($_FILES['link']['tmp_name'],"../image/".$img);
    $name=$_POST['name'];
    $query="INSERT INTO update_img(name,link)
     VALUES ('$name','$link')";
    $result=mysqli_query($conn,$query);
    if($result)
    {
      header('Location:list.php');
    }
    else {
      echo "Thêm mới không thành công";
    }
  }

   ?>
            <div class="content">
              <form action="update.php" method="post" style="margin-top:50px;" enctype="multipart/form-data">
                <div class="form-group">
                  <label>Sản phẩm mới</label>
                  <input type="text" name="name" value="" class="form-control" placeholder="Sản phẩm mới" style="width:70%;">
                </div>
                <div class="form-group">
                  <label>Link</label>
                  <input type="file" name="link" value="" class="form-control" placeholder="Link"  style="width:70%;">
                </div>
                <input class="btn btn-primary" type="submit" value="Thêm mới" name="submit">
              </form>
            </div>
            <div class="space" style="clear:both;"></div>
<?php include 'footer.php' ?>
