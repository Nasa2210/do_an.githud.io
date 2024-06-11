<?php
    include "../Client/cauhinh.php";
    $user=$_POST['user'];
    $pass=$_POST['pass'];
    if(trim($user)==""){
        echo '<script>
        alert("Tên đăng nhập không được bỏ trống!");
        window.history.back();
        </script>';
        exit;
    }
    elseif(trim($pass)==""){
        echo '<script>
        alert("Mật khẩu không được bỏ trống!");
        window.history.back();
        </script>';
        exit;
    }
    else
	{
		// Mã hóa mật khẩu
		$pass = md5($pass);
		
		// Kiểm tra người dùng có tồn tại không
		$sql_kiemtra = "SELECT * FROM user WHERE TenDangNhap = '$user' AND MatKhau = '$pass'";	
		
		
		$danhsach = $connect->query($sql_kiemtra);
		//Nếu kết quả kết nối không được thì xuất báo lỗi và thoát
		if (!$danhsach) {
			die("Không thể thực hiện câu lệnh SQL: " . $connect->connect_error);
			exit();
		}
		$dong = $danhsach->fetch_array(MYSQLI_ASSOC);
		if($dong)
		{
			if($dong['Khoa'] == 0)
			{
				session_start();
				$_SESSION['MaND'] = $dong['MaNguoiDung'];
				$_SESSION['HoTen'] = $dong['TenNguoiDung'];
				$_SESSION['Taikhoan'] = $dong['TenDangNhap'];
				$_SESSION['Quyen'] = $dong['Quyen'];
				$_SESSION['Img'] = $dong['Img'];
				header("Location: index.php");
			}
			else
			{
				echo '<script>
                alert("Người dùng đã bị khóa tài khoản!");
                window.history.back();
                </script>';
        		exit;
			}	
		}
		else
		{
			echo '<script>
            alert("Tên đăng nhập hoặc mật khẩu không chính xác!");
            window.history.back();
            </script>';
            exit;
		}
	}
?>