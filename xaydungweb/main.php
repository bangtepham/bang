<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Anh</title>
  </head>
  <body>
    <?php include 'lib/connection.php' ?>
    <?php
      $query="SELECT *FROM update_img";
      $result=mysqli_query($conn,$query) or die("Error: ".mysqli_error($conn));
      while($data=mysqli_fetch_array($result,MYSQLI_ASSOC)){

      }
     ?>





    <div class="col-md-4">
      <div class="thumbnail">
        <a href="items.php">
          <?php include 'lib/connection.php' ?>
          <?php
            $query="SELECT *FROM update_img";
            $result=mysqli_query($conn,$query) or die("Error: ".mysqli_error($conn));
            while($data=mysqli_fetch_array($result,MYSQLI_ASSOC)){
                 ?>
                    <img width=10% src="<?php echo $data['link']?>">
                      <div class="caption">
                           <p>Tên sản phẩm: <?php echo $data['name'] ?></p>
                <?php
                  }
                  ?>

          </div>
          <div class="caption">
            <p>Giá:</p>
          </div>
          <div class="caption">
            <p>Giảm giá:</p>
          </div>

        </a>
      </div>
    </div>
    <div class="col-md-4">
      <div class="thumbnail">
        <a href="items.php">
          <img src="<?php echo $data['link']?>" alt="Nature" style="width:100%">
          <div class="caption">
            <p>Tên sản phẩm:<?php echo $data['name'] ?></p>
          </div>
          <div class="caption">
            <p>Giá:</p>
          </div>
          <div class="caption">
            <p>Giảm giá:</p>
          </div>
        </a>
      </div>
    </div>

  </body>
</html>
