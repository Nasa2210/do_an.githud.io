<?php
    include "../Client/cauhinh.php";
    $malpid=$_POST['malpid'];
    $TenLoaiPhong=$_POST['TenLoaiPhong'];
    $Gia=$_POST['Gia'];
    $KichThuoc=$_POST['KichThuoc'];
    $SoLuong=$_POST['SLNguoi'];
    $LoaiGiuong=$_POST['LoaiGiuong'];
    if(trim($Gia)=="" && $Gia>0){
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
       
            $sql_inserloaiphong = $pdo->prepare("UPDATE `loaiphong` SET `TenLoaiPhong`='$TenLoaiPhong',`Gia`=' $Gia',`KichThuoc`='$KichThuoc',`SLNguoi`='$SoLuong',`LoaiGiuong`='$LoaiGiuong' WHERE `MaLoai`='$malpid'");	
            $sql_inserloaiphong->execute();
            
            if (!$sql_inserloaiphong) {
                die("Không thể thực hiện câu lệnh SQL" );
                exit();
            }
            else{
                echo '<script>
                alert("Sửa loại phòng thành công.");
                window.history.back();
                </script>';
                exit;
                header("Location: index.php");
            }

       
        
          
     
    }
?>