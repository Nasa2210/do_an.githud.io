<?php
    include "../Client/cauhinh.php";
    $userid=$_POST['userid'];
    $username=$_POST['username'];
    $user=$_POST['user'];
    $pass=$_POST['pass'];
    $quyen=$_POST['quyen'];
    if(trim($username)==""){
        echo '<script>
        alert("Họ tên không được bỏ trống!");
        window.history.back();
        </script>';
        exit;
    }
    elseif(trim($user)==""){
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
    elseif(is_numeric($quyen)<0&&$quyen!=""){
        echo '<script>
        alert("Quyền chỉ có (1.Quản trị, 2.Nhân viên). Vui lòng nhập lại!");
        window.history.back();
        </script>';
        exit;
    }
    else{
        $pass = md5($pass);
        $sql_kiemtra = "UPDATE `user` SET `TenNguoiDung`='$username',`TenDangNhap`='$user',`MatKhau`='$pass',`Quyen`='$quyen' WHERE `MaNguoiDung`='$userid'";
		
		$danhsach = $connect->query($sql_kiemtra);
		
		if (!$danhsach) {
			die("Không thể thực hiện câu lệnh SQL: " . $connect->connect_error);
			exit();
		}
        else{
            header("Location: index.php?do=user");
        }
        
    }
?>