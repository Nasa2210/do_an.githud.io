<?php
	include "../Client/cauhinh.php";
	if(isset($_GET['quyen']))
	{
		$sql = "UPDATE `user` SET `Quyen` = " . $_GET['quyen'] . " WHERE `MaNguoiDung` = " . $_GET['id'];
		$danhsach = $connect->query($sql);
		if (!$danhsach) {
			die("Không thể thực hiện câu lệnh SQL: " . $connect->connect_error);
			exit();
		}
        else{
            header("Location: index.php?do=user");
        }
	}
	elseif(isset($_GET['khoa']))
	{
		$sql = "UPDATE `user` SET `Khoa` = " . $_GET['khoa'] . " WHERE `MaNguoiDung` = " . $_GET['id'];
		$danhsach1 = $connect->query($sql);
		if (!$danhsach1) {
			die("Không thể thực hiện câu lệnh SQL: " . $connect->connect_error);
			exit();
		}
        else{
            header("Location: index.php?do=user");
        }
	}
	else
	{
		header("Location: index.php?do=user");
	}
?>