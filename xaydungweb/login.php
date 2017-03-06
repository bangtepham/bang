<!DOCTYPE html>
<?php
session_start();
?>
<html>
  <head>
    <meta charset="utf-8">
    <title>Đăng nhập tài khoản</title>
    <link rel="stylesheet" href="css/register.css">
  </head>
  <body>
    <?php include 'lib/connection.php' ?>
    <?php
      $error="";
      $username=$password="";
      if(isset($_POST['submit']))
      {
        $username=$_POST['username'];
        $password=$_POST['password'];
        $username=strip_tags($username);
        $username=addslashes($username);
        $password=strip_tags($password);
        $password=addslashes($password);
        $query="SELECT* FROM tai_khoan where nick_name='$username' and mat_khau='$password'";
        $result=mysqli_query($conn,$query) or die("Error: ".mysqli_error($conn));
        $row = mysqli_num_rows($result);
        if($row==0)
        {
           $error="Tên tài khoản hoặc mật khẩu không đúng!";

        }
        else {
          $_SESSION['username']="$username";//Luu username vao session

          header('Location:admin/quanli.php');
        }

      }
    ?>

    <form action="login.php" method="post">
      <table>
          <tr>
               <td colspan="2" algin="center" style="background:orange";><h1 style="background:green;">Log In</h1>  <p style="color:red;"><?php echo $error; ?></p>
 </td>

          </tr>
          <tr>
                <td>Username:</td>
             <td>
                 <input type="text" name="username"  placeholder="Username" required>
             </td>

          </tr>
          <tr>
            <td>Password:</td>
            <td>
               <input id="pass" type="password" name="password"  placeholder="Password" required>
            </td>
          </tr>
          <tr>
              <td colspan="2" align="center"><input type="submit" name="submit" value="Submit" class="submit"></td>
          </tr>
      </table>
    </form>

  </body>
</html>
