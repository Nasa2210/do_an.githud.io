<?php
	// Hủy SESSION
	unset($_SESSION['MaND']);
	unset($_SESSION['HoTen']);
	unset($_SESSION['Taikhoan']);
	unset($_SESSION['Quyen']);
	unset($_SESSION['Img']);
	
	// Chuyển hướng về trang index.php
	header("Location: index.php");
?>