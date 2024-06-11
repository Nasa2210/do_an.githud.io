<?php 
     include "../Client/cauhinh.php";
     $MaDatPhong=$_GET['id'];
     $maphong=$_GET['idphong'];
        $uplphong=$pdo->prepare("UPDATE `phong` SET `TinhTrang`='Trống' WHERE `MaPhong`='$maphong'");	
        $uplphong->execute();
         
        $upddatphong = $pdo->prepare("UPDATE `datphong` SET `MaPhong`='0',`TrangThai`='0' WHERE `MaDatPhong`='$MaDatPhong'");	
        $upddatphong->execute();
         if($upddatphong){
            echo '<script>
            alert("Hủy đặt thành công!");
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
     
       
?>