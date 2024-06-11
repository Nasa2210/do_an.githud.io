<?php
    include "../Client/cauhinh.php";
    session_start();
    $TenLoaiPhong=$_POST['TenLoaiPhong'];
    $Gia=$_POST['Gia'];
    $KichThuoc=$_POST['KichThuoc'];
    $SoLuong=$_POST['SoLuong'];
    $LoaiGiuong=$_POST['LoaiGiuong'];
    if($_FILES["taptin1"]["error"] > 0)
    {
        echo '<script>
        alert("Vui long chon hinh!");
        window.history.back();
        </script>';
        exit;
    }
    elseif(trim($Gia)=="" && $Gia>0){
        echo '<script>
        alert("Giá không được bỏ trống! và lớn >0.Vui lòng nhập lại");
        window.history.back();
        </script>';
        exit;
    }
    elseif(trim($KichThuoc)=="" && $KichThuoc>0){
        echo '<script>
        alert("Kích thước phòng không được bỏ trống! và lớn >0.Vui lòng nhập lại");
        window.history.back();
        </script>';
        exit;
    }
    elseif(trim($SoLuong)=="" &&$SoLuong >0){
        echo '<script>
        alert("Số lượng không được bỏ trống! và lớn >0.Vui lòng nhập lại");
        window.history.back();
        </script>';
        exit;
    }
    else 
    {
        move_uploaded_file($_FILES["taptin1"]["tmp_name"], "../upload/" . $_FILES["taptin1"]["name"]);
          $img=$_FILES["taptin1"]["name"];     
        $sql_inserloaiphong = $pdo->prepare("INSERT INTO `loaiphong`(`TenLoaiPhong`, `Gia`, `KichThuoc`, `SLNguoi`, `LoaiGiuong`, `HinhAnh`) VALUES ('$TenLoaiPhong',' $Gia',' $KichThuoc', ' $SoLuong','$LoaiGiuong','$img')");	
        $sql_inserloaiphong->execute();
        
        if (!$sql_inserloaiphong) {
            die("Không thể thực hiện câu lệnh SQL" );
            exit();
        }
        else{
            echo '<script>
            alert("Thêm phòng thành công.");
            window.history.back();
            </script>';
            header("Location: index.php?do=quanlyloaiphong");
        }
    }
?>