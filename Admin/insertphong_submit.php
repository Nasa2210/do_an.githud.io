<?php
    include "../Client/cauhinh.php";
    $ks=$_POST['select_list-hotel'];
    $loaiphong=$_POST['select_room-type'];
    $tenphong=$_POST['room-name'];
    if($ks==0){
        echo '<script>
        alert("Vui lòng chọn khách sạn.");
        window.history.back();
        </script>';
        exit;
    }
    elseif($loaiphong==0){
        echo '<script>
        alert("Vui lòng chọn loại phòng.");
        window.history.back();
        </script>';
        exit;
    }
    elseif($tenphong==""){
        echo '<script>
        alert("Nhập tên phòng");
        window.history.back();
        </script>';
        exit;
    }else{
        $sql_inserphong = $pdo->prepare("INSERT INTO `phong`( `TenPhong`, `MaKhachSan`, `MaLoaiPhong`, `TinhTrang`) VALUES ('$tenphong',' $ks','$loaiphong','Trống')");	
        $sql_inserphong->execute();
        
        if (!$sql_inserphong) {
            die("Không thể thực hiện câu lệnh SQL" );
            exit();
        }
        else{
            echo '<script>
            alert("Thêm phòng thành công.");
            window.history.back();
            </script>';
            
            header("Location: index.php?do=quanlyroom");
        }
    }
?>