<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Đăng kí thành viên</title>
    <link rel="stylesheet" href="css/register.css">
  </head>
  <body>
    <?php include 'lib/connection.php' ?>
    <?php
    $namerr=$passrr=$usernamerr=$emailrr="";
    $name=$username=$pass=$email="";
      if(isset($_POST['submit']))
      {
        if(empty($_POST['username']))
        {
          $usernamerr="*Vui lòng nhập tài khoản ";
        }
        else {
           $username=$_POST['username'];
        }
        if(empty($_POST['pass']))
        {
          $passrr="*Vui lòng nhập mật khẩu ";
        }
        else {
           $pass=$_POST['pass'];
           if(strlen($_POST['pass'])<8){
             $passrr="*Mật khẩu tối thiểu 8 kí tự";
             $_POST['pass']="";
           }
        }
        if(empty($_POST['name']))
        {
          $namerr="*Vui lòng nhập tên ";
        }
        else {
           $name=$_POST['name'];
        }
        if(empty($_POST['email']))
        {
          $emailrr="*Vui lòng nhập email";
        }
        else {
           $email=$_POST['email'];
        }
        if(empty($_POST['username'])||empty($_POST['pass'])||empty($_POST['name'])||empty($_POST['email']))
        {
          echo "";
        }
        else {
          $query="INSERT INTO tai_khoan(nick_name,mat_khau,ho_ten,email)
          values('$username','$pass','$name','$email')";
          if(mysqli_query($conn,$query))
          {
            header('Location:index2.php');
              $_POST['username']=  $_POST['pass']=  $_POST['name']=  $_POST['email']="";
          }
        }
        }
    ?>
     <form  action="register.php" method="post">
        <table>
           <tr>
                <td colspan="2" algin="center"><h1>Form Register</h1> </td>
           </tr>
           <tr>
        				<td>Username :</td>
        				<td><input type="text" id="username" name="username" placeholder="Username" value="<?php if(isset($_POST['username'])) echo $_POST['username'];?>"></td>
                  <td class="check"><?php echo $usernamerr; ?></td>
			</tr>
			<tr>
        				<td>Password :</td>
        				<td><input type="password" id="pass" name="pass" placeholder="Password" value="<?php if(isset($_POST['pass'])) echo $_POST['pass'];?>"></td>
                <td class="check"><?php echo $passrr; ?></td>
			</tr>
			<tr>
        				<td>Ho Ten :</td>
        				<td><input type="text" id="name" name="name" placeholder="Name" value="<?php if(isset($_POST['name'])) echo  $_POST['name'];?>"></td>
                <td class="check"><?php echo $namerr; ?></td>
			</tr>
			<tr>
        				<td>Email :</td>
        				<td><input type="email" id="email" name="email" placeholder="Email" value="<?php if(isset($_POST['username'])) echo $_POST['email'];?>"></td>
                <td  class="check" ><?php echo $emailrr; ?></td>
			</tr>
			<tr>
        				<td colspan="2" align="center"><input type="submit" name="submit" value="Submit" class="submit"></td>
			</tr>
        </table>
     </form>

  </body>
</html>
