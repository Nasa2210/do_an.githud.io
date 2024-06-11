<?php
    include "../Client/cauhinh.php";
    $MaDatPhong=$_POST['MaDatPhong'];
    $Makhachsan=$_POST['Makhachsan'];
    $loaiphong=$_POST['select_datphong_loaiphong'];
    // khách hàng
    $Kh_MaKH=$_POST['Kh_MaKH'];
    $Kh_HoTen=$_POST['Kh_HoTen'];
    $Kh_Email=$_POST['Kh_Email'];
    $Kh_SDT=$_POST['Kh_SDT'];
    //.........................
    $phong=$_POST['select_datphong_phong'];
    $NgayDat=$_POST['NgayDat'];
    $NgayNhan=$_POST['NgayNhan'];
    $NgayTra=$_POST['NgayTra'];
    $date = new DateTime($NgayDat);
    $formattedNgayDat = $date->format('Y-m-d');
    $date1 = new DateTime($NgayNhan);
    $formattedNgayNhan = $date1->format('Y-m-d');
    $date2 = new DateTime($NgayTra);
    $formattedNgayTra = $date2->format('Y-m-d');
    $GhiChu=$_POST['GhiChu'];
    $SoLuong=$_POST['SoLuong'];

    if (!isset($Kh_HoTen) && empty($Kh_HoTen)) {
        echo '<script>
                alert("Họ tên không được bỏ trống");
                window.history.back();
                </script>';
                exit;
    }
    else if (!isset($Kh_Email) && empty($Kh_Email)) {
        echo '<script>
                alert("Email không được bỏ trống");
                window.history.back();
                </script>';
                exit;
    }
    else if (!isset($Kh_SDT) && empty($Kh_SDT) && !is_numeric($Kh_SDT)) {
        echo '<script>
                alert("Số điện thoại không được bỏ trống và là số");
                window.history.back();
                </script>';
                exit;
    }
    else if (!isset( $SoLuong) && !is_numeric($SoLuong) && $SoLuong<0) {
        echo '<script>
                alert("Số lượng >0");
                window.history.back();
                </script>';
                exit;
    }
    else 
    {
       
            $sql_updkhachhang = $pdo->prepare("UPDATE `khachhang` SET `HoTen`=' $Kh_HoTen',`Sdt`='$Kh_SDT',`Email`='$Kh_Email' WHERE `MaKhachHang`='$Kh_MaKH'");	
            $sql_updkhachhang->execute();
            $sql_upddatphong = $pdo->prepare("UPDATE `datphong` SET `MaKhachSan`='$Makhachsan',`MaLoaiPhong`=' $loaiphong',`MaKhachHang`='$Kh_MaKH',`MaPhong`='$phong',`NgayDat`='$formattedNgayDat',`NgayNhan`='$formattedNgayNhan',`NgayTra`='$formattedNgayTra',`GhiChu`='$GhiChu',`SoLuong`='$SoLuong' WHERE `MaDatPhong`='$MaDatPhong'");	
            $sql_upddatphong->execute();
            
            if (!$sql_upddatphong) {
                die("Không thể thực hiện câu lệnh SQL" );
                exit();
            }
            else{
                echo '<script>
                alert("Sửa  thành công.");
                window.history.back();
                </script>';
                exit;
                header("Location: index.php?do=quanlydatphong");
            }

       
        
          
     
    }
?>