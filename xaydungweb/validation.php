<!DOCTYPE html>
<html>
<head>
	<title>Validation</title>
	<meta charset="utf-8">
	<style type="text/css">
		form{
			background: green;
			width: 40%;
			margin:auto;
		}
		form table tr{
			padding:20px;
		}
		.title{
			text-transform:uppercase;
			font-weight: bold;
			color: red;
			text-align: center;
		}
		table input[type="text"]{
			width: 300px;
			border-radius: 5px;
			border: 1px solid yellow;
			height: 25px;
		}
		table td{
			color: orange;
			font-weight: bold;
		}
		p{color: red;}
	</style>
</head>
<body>
<?php include 'connection.php'; ?>
   <?php
        $namerr=$emailrr=$addressrr=$genderrr="";
        $name=$email=$address=$gender="";
        if($_SERVER["REQUEST_METHOD"]=="POST"){

		            if(empty($_POST['name']))
		            {
		            	$namerr="Vui lòng nhập đầy đủ họ tên";
		            }
		            else
		            	$name=$_POST['name'];
		            if(empty($_POST['email']))
		            {
		            	$emailrr="Vui lòng nhập email";
		            }
		            else
		            	$email=$_POST['email'];
		            if(empty($_POST['address']))
		            {
		            	$addressrr="Vui lòng nhập địa chỉ";
		            }
		            else
		            	$address=$_POST['address'];
		            if(empty($_POST['gender']))
		            {
		            	$genderrr="Vui lòng chọn giới tính";
		            }
		            else
		            	$gender=$_POST['gender'];
                   if($namerr || $emailrr || $addressrr || $genderrr)
                   	{echo "";}
                   else
                   	 {
				            $data="INSERT INTO danh_sach(name,email,dia_chi,gioi_tinh)
				             values ('$name','$email','$address','$gender')";
				            if(mysqli_query($conn,$data))
				            {
				            	echo 'Đăng kí thành công';
				            }
				            else
				            	echo "ERROR: " .mysqli_error($conn);
				     }
        }
   ?>



			   <form method="post" actionm="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
			   	 <table>
			   	 	<tr>
			   	 		<td class="title">Thông tin khách hàng</td>

			   	 	</tr>
			   	 	<tr>
			   	 		<td>Họ và tên</td>
			   	 		<td>
			   	 		   <input type="text" name="name" value="<?php if(isset($_POST['name'])) echo $_POST['name']; ?>">
			   	 		   <p><?php echo $namerr; ?></p>
			   	 	    </td>
			   	 	</tr>
			   	 	<tr>
			   	 		<td>Email</td>
			   	 		<td><input type="text" name="email" value="<?php if(isset($_POST['email'])) echo $_POST['email']; ?>">
                              <p><?php echo $emailrr; ?></p>
			   	 		</td>
			   	 	</tr>
			   	 	<tr>
			   	 		<td>Địa chỉ</td>
			   	 		<td><input type="text" name="address" value="<?php if(isset($_POST['address'])) echo $_POST['address']; ?>">
                              <p><?php echo $addressrr; ?></p>
			   	 		</td>
			   	 	</tr>
			   	 	<tr>
			   	 		<td> Giơi tính </td>
			   	 		<td>
			   	 		    <input type="radio" name="gender" value="female" <?php if (isset($gender) && $gender=="female") echo "checked";?>>Nữ

			   	 		    <input type="radio" name="gender" value="male" <?php if (isset($gender) && $gender=="male") echo "checked";?>>Nam
			   	 		    <p><?php echo $genderrr; ?></p>

			   	 		</td>
			   	 	</tr>
			   	 	<tr>
			   	 		<td>
			   	 			<input type="submit" name="submit" value="Gửi" class="title">
			   	 		</td>
			   	 	</tr>
			   	 </table>
			   </form>
</body>
</html>
