<?php 
     include "../Client/cauhinh.php";
     $MaDatPhong=$_POST['MaDatPhong'];
     $trangthai=$_POST['TrangThai'];
     $chuoi=$_POST['chuoi'];
     if($chuoi==0){
        echo '<script>
        alert("Vui lòng chọn phòng!");
        window.history.back();
        </script>';
        exit;
     }
     else{
        $selectdatphong = $pdo->prepare("UPDATE `phong` SET `TinhTrang`='Đặt cọc' WHERE `MaPhong`='$chuoi'");	
        $selectdatphong->execute();
        $upddatphong = $pdo->prepare("UPDATE `datphong` SET `MaPhong`='$chuoi',`TrangThai`='$trangthai' WHERE `MaDatPhong`='$MaDatPhong'");	
        $upddatphong->execute();
         if($upddatphong){
            echo '<script>
            alert("Đặt thành công!");
            window.history.back();
            </script>';
            exit;
        }
            
        else
        {
            echo '<script>
            alert("Lỗi đặt !");
            window.history.back();
            </script>';
        exit;
        }  
     }
       
?>