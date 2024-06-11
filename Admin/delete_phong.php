<?php
    include "../Client/cauhinh.php";
    $mandid=$_GET['id'];
    $sql_dphong = $pdo->prepare("DELETE FROM `phong` WHERE `MaPhong`='$mandid'");
    $sql_dphong->execute();
		
		if (!$sql_dphong) { 
		}
        else{
            echo '<script>
            alert("Xóa thành công!");
            window.history.back();
            </script>';
           
            header("Location: ?do=quanlyroom");
        }
?>