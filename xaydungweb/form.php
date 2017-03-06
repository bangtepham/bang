<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Form</title>
    <link rel="stylesheet" href="form.css">
  </head>
  <body>
    <?php
        $conn=mysqli_connect("localhost","root","","thong_tin_khach_hang");
        if(!$conn)
        {
        	  echo "Error:" .mysqli_connect_error($conn);
        }
        else
        	 { mysqli_set_charset($conn,"utf8");

           }
        if($_SERVER["REQUEST_METHOD"]=="POST")
      {
           $name=$email=$phone="";
           $namerr=$emailrr=$phonerr="";
           if(empty($_POST['name'])||empty($_POST['email'])||empty($_POST['phone']))
           {
             $namerr=$emailrr=$phonerr="Ban can nhap day du thong tin";
           }
           else {
              $name=$_POST['name'];
              $email=$_POST['email'];
              $phone=$_POST['phone'];
              $data="INSERT INTO danh_sach(name,email,phone)
                   values ('$name','$email','$phone')";
              if(mysqli_query($conn,$data))
              {
                echo "Insert thanh cong";
              }
              else
                 echo "ERROR:" .mysqli_error($conn);
        }
      }
    ?>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
      <table>
       <tr>
          <td>Name:</td>
          <td><input type="text" name="name"></td>
          <p><?php echo $namerr;?></p>
       </tr>
       <tr>
         <td>Email:</td>
           <td><input type="text" name="email"></td>
             <p><?php echo $emailrr;?></p>
       </tr>
       <tr>
         <td>Phone:</td>
           <td><input type="text" name="phone"></td>
             <p><?php echo $phonerr;?></p>
       </tr>
       <tr>
          <td><input type="submit" name="submit" value="Gui"></td>
       </tr>
    </table>
    </form>

    </form>
  </body>
</html>
