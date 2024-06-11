<?php
	// Lấy thông tin từ FORM
	$MaChuoi = $_POST['MaChuoi'];
	$TenKS = $_POST['TenKS'];
	$DiaChi = $_POST['DiaChi'];
	$Sdt = $_POST['Sdt'];
	$MoTa = $_POST['Mota'];
	$XepLoai = $_POST['XepLoai'];
	$hinh = $_FILES['HinhAnh'];
	echo $MaChuoi;
	// Kiểm tra
	if(trim($MaChuoi) == "")
	{
		echo '<script>
		alert("Chuổi Khách sạn không có ");
		window.history.back();
		</script>';
		exit;
	}
	if(trim($TenKS) == "")
	{
		echo '<script>
		alert("Tên khách sạn không được bỏ trống");
		window.history.back();
		</script>';
		exit;
	}
	elseif(trim($DiaChi) == "")
	{
		echo '<script>
		alert("Địa chỉ khách sạn không được bỏ trống");
		window.history.back();
		</script>';
		exit;
	}
	elseif(trim($Sdt) == "")
	{
		echo '<script>
		alert("Liên lạc khách sạn không được bỏ trống");
		window.history.back();
		</script>';
		exit;
	}
	elseif(trim($MoTa) == "")
	{
		echo '<script>
		alert("Mô tả khách sạn không được bỏ trống");
		window.history.back();
		</script>';
		exit;
	}
	else
	{
		//Lưu tập tin upload vào thư mục hinhanh
		$target_path = "../images/";
		$ImgName = basename($_FILES['HinhAnh']['name']);
		$target_path = $target_path .$ImgName ;
		if (move_uploaded_file($_FILES['HinhAnh']['tmp_name'], $target_path))
			echo "";
			//echo "Tập tin " . basename($_FILES['HinhAnh']['name']) . " đã được upload.<br/>";
		else
			echo "Tập tin upload không thành công.<br/>";	
		
		$sql = "INSERT INTO `khachsan`(`MaChuoi`, `TenKhachSan`, `XepLoai`, `MoTa`, `DiaChi`, `Sdt`, `HinhAnh`)
		 VALUES ('$MaChuoi','$TenKS','$XepLoai','$MoTa','$DiaChi','$Sdt','$ImgName')";
		//  echo $sql;
		$danhsach = $connect->query($sql);
		//Nếu kết quả kết nối không được thì xuất báo lỗi và thoát
		if (!$danhsach) {
			die("Không thể thực hiện câu lệnh SQL: " . $sql);
			exit();
		}
		else
		{
			header("Location: index.php?do=ql_khachsan");
		}
		
		
		
	}
?>