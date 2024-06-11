<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/updateuser.css">
</head>
<body>
    <?php
        include "../Client/cauhinh.php";
        $maNDid=$_GET['id'];
        $sql_kiemtra = "SELECT * FROM user WHERE MaNguoiDung = '$maNDid' ";	
		
		
		$danhsach = $connect->query($sql_kiemtra);
		//Nếu kết quả kết nối không được thì xuất báo lỗi và thoát
		if (!$danhsach) {
			die("Không thể thực hiện câu lệnh SQL: " . $connect->connect_error);
			exit();
		}
		
		$row = $danhsach->fetch_array(MYSQLI_ASSOC);
    ?>
    <form action="updateUser_submit.php" method="post">
            <div class="box sign_up">
                <h2>Update user</h2>
                    <div class="input_box">
                        <input type="text" required="required" name="userid"value="<?php echo $row['MaNguoiDung']?> " readonly>
                        <span><i class="fa-solid fa-user"></i>User code</span>
                        <div></div>
                    </div>
                    <div class="input_box">
                        <input type="text" required="required" name="username"value="<?php echo $row['TenNguoiDung']?>">
                        <span><i class="fa-solid fa-user"></i>User name</span>
                        <div></div>
                    </div>
                    <div class="input_box">
                        <input type="text" required="required" name="user" value="<?php echo $row['TenDangNhap']?>">
                        <span><i class="fa-solid fa-user-secret"></i>User</span>
                        <div></div>
                    </div>
                    <div class="input_box">
                        <input type="text" required="required" name="pass">
                        <span><i class="fa-solid fa-lock"></i>Password</span>
                        <div></div>
                    </div>
                    <div class="input_box">
                        <input type="text" required="required" name ="quyen" value="<?php echo $row['Quyen']?>">
                        <span><i class="fa-solid fa-lock"></i>Authorities</span>
                        <div></div>
                    </div>
                    <input type="submit" value="Sửa" />
            </div>
                
                
        </from>
</body>
</html>