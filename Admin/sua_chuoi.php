<?php
    include "../Client/cauhinh.php";
    $List_id =  $_POST['list_id'];
    $List_name =  $_POST['list_hotel-name'];
    $List_description =  $_POST['list_hotel-description'];
    $HinhAnh = $_FILES["list_hotel-img"];
    $target_path = "../images/";
    $image_name = basename($HinhAnh['name']);
    $target_path= $target_path.$image_name;
    // xóa hình củ
    
    // thêm file ảnh vào thư mục
    if(trim($List_name) == "")
	{
		echo '<script>
		alert("Tên chuổi khách sạn không được bỏ trống");
		window.history.back();
		</script>';
		exit;
	}
	elseif(trim($List_description) == "")
	{
		echo '<script>
		alert("Mô tả không được bỏ trống");
		window.history.back();
		</script>';
		exit;
	}else 
    {
        $sql_get_list = "SELECT * FROM chuoikhachsan where MaChuoi = ".$List_id;
        $lists = $connect->query($sql_get_list);
        if(isset($lists))
        {
            $list= $lists->fetch_array(MYSQLI_ASSOC); 
            $path = "../images/".$list["HinhAnh"];
            unlink($path);
        }
		if (move_uploaded_file($_FILES['list_hotel-img']['tmp_name'], $target_path))
		{
            $sql_update_list_hotel = "UPDATE  `chuoikhachsan` set TenChuoi = '$List_name', MoTa = '$List_description', HinhAnh = '$image_name' WHERE Machuoi = ".$List_id;
            if($connect->query($sql_update_list_hotel))
            {
                header("Location: index.php?do=ql_chuoikhachsan");
            }
            else 
            {
                die("Error: " . $sql_update_list_hotel. " ". $connect->error);
            }
        }	
        
			//echo "Tập tin " . basename($_FILES['HinhAnh']['name']) . " đã được upload.<br/>";
		else
			echo "Tập tin upload không thành công.<br/>";	
            
		
    }


?>
