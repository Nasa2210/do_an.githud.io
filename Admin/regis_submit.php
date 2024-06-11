<?php
    include "../Client/cauhinh.php";
	$username = $_POST['username'];
	$user = $_POST['user'];
	$pass = $_POST['pass'];
	$conpass = $_POST['conpass'];
	
	// Kiểm tra
	if(trim($username) == ""){
		echo '<script>
        alert("Họ và tên không được bỏ trống!");
        window.history.back();
        </script>';
        exit;
	}
	elseif(trim($user) == ""){
		echo '<script>
        alert("Tên đăng nhập không được bỏ trống!");
        window.history.back();
        </script>';
        exit;
	}
	elseif(trim($pass) == ""){
		echo '<script>
        alert("Mật khẩu không được bỏ trống!");
        window.history.back();
        </script>';
        exit;
	}
	
	elseif($pass != $conpass){
		echo '<script>
        alert("Xác nhận mật khẩu không đúng!");
        window.history.back();
        </script>';
        exit;
	}
	else
	{
		echo $user;
		$sql_kiemtra = "SELECT * FROM `user` WHERE `TenDangNhap` = '$user'";
		
		$danhsach = $connect->query($sql_kiemtra);
		if($danhsach)
		{
			// Mã hóa mật khẩu
			$pass = md5($pass);
			
			$sql_them = "INSERT INTO `user`(`TenNguoiDung`, `TenDangNhap`, `MatKhau`, `Quyen`, `Khoa`,`Img`)
					VALUES ('$username', '$user', '$pass', 2, 0,'')";
			$themnd = $connect->query($sql_them);
			
			if($themnd){
				echo '<script>
				alert("Đăng ký thành công!");
				window.history.back();
				</script>';
				exit;
			}
				
			else
			{
				echo '<script>
				alert("Lỗi đăng ký thành công!");
				window.history.back();
				</script>';
			exit;
			}
		}
		else
		{
			echo '<script>
				alert("Người dùng với tên đăng nhập đã được sử dụng!");
				window.history.back();
				</script>';
				exit;
			}
	}
?>