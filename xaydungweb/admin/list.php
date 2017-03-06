<?php include 'header.php' ?>
<?php include 'side_bar.php' ?>
<?php include '../lib/connection.php' ?>

      <div class="content">
              <div class="container" style="margin-top:30px;">
                 <h2>Danh sách sản phẩm</h2>
                <div class="panel panel-default" style="width:95%;">
                   <table class="table table-hover">
                     <thread>
                        <tr>
                          <th>STT</th>
                          <th>Tên sản phẩm</th>
                          <th>Ảnh sản phẩm</th>
                          <th>Sửa</th>
                          <th>Xóa</th>
                        </tr>
                     </thread>
                     <tbody>
                           <?php
                              $query="SELECT*FROM update_img";
                              $result=mysqli_query($conn,$query) or die("ERROR: ".mysqli_error($conn));
                                  while($data=mysqli_fetch_array($result,MYSQLI_ASSOC))
                                  {
                                    ?>
                                  <tr>
                                     <td><?php echo $data['id'] ?></td>
                                     <td><?php echo $data['name'] ?></td>
                                     <td><img width=10% src="../<?php echo $data['link']?>"></td>
                                     <td><a href="#"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></td></a>
                                     <td><a onclick="return confirm('Bạn thật sự muốn xóa không?')" href="delete.php?id=<?php echo $data['id']; ?>"><span class="glyphicon glyphicon-remove" aria-hidden="true" style="color:red;"></span></a></td>
                                  </tr>
                                     <?php
                                  }
                           ?>
                     </tbody>
                   </table>
            </div>
          </div>
        </div>
            <div class="space" style="clear:both;"></div>
<?php include 'footer.php' ?>
