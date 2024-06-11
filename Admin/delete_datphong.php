<?php
    $madatphong=$_GET['id'];
    $deletedatphong = $pdo->prepare("DELETE FROM `datphong` WHERE `MaDatPhong`='$madatphong'");	
    $deletedatphong->execute();
     if($deletedatphong){
        echo '<script>
        alert("Xóa thành công!");
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