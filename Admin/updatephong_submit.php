<?php
    include "../Client/cauhinh.php";
    $malks=$_POST['maks'];
    $maphong=$_POST['maphong'];
    $TenPhong=$_POST['room-name'];
    $loaiphong=$_POST['select_room-type'];
    $tt=$_POST['room-tinhtrang'];
    if(trim($TenPhong)==""){
        echo '<script>
        alert("Vui lòng nhập tên phòng");
        window.history.back();
        </script>';
        exit;
    }
    elseif($loaiphong==0){
        echo '<script>
        alert("Vui lòng chọn loại phòng");
        window.history.back();
        </script>';
        exit;
    }
    else 
    {
       
        $sql_inserloaiphong = $pdo->prepare("UPDATE `phong` SET `TenPhong`='$TenPhong',`MaKhachSan`='$malks',`MaLoaiPhong`='$loaiphong',`TinhTrang`='$tt' WHERE `MaPhong`='$maphong'");	
        $sql_inserloaiphong->execute();
        
        if (!$sql_inserloaiphong) {
            die("Không thể thực hiện câu lệnh SQL" );
            exit();
        }
        else{
            echo '<script>
            alert("Sửa phòng thành công.");
            window.history.back();
            </script>';
            exit;
            header("Location: index.php?do=quanlyroom");
        }

       
        
          
     
    }
?>