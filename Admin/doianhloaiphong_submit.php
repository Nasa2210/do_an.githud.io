<?php
    include "../Client/cauhinh.php";
    $malpid=$_POST["malpid"];

    
    if(isset($_FILES['img_loaiphonganh']) && $_FILES['img_loaiphonganh']['error'] == 0){
       
        move_uploaded_file($_FILES["img_loaiphonganh"]["tmp_name"], "../upload/" . $_FILES["img_loaiphonganh"]["name"]);
        $img=$_FILES["img_loaiphonganh"]["name"]; 
        $sql_inserloaiphong = $pdo->prepare("UPDATE `loaiphong` SET `HinhAnh`='$img' WHERE `MaLoai`='$malpid'");	
        $sql_inserloaiphong->execute();
        
        if (!$sql_inserloaiphong) {
            die("Không thể thực hiện câu lệnh SQL" );
            exit();
        }
        else{
            echo '<script>
            alert("Sửa ảnh thành công.");
            window.history.back();
            </script>';
            exit;
            header("Location: index.php?do=quanlyloaiphong");
        }
    }
    else{ echo '<script>
        alert("Chưa chọn hình.");
        window.history.back();
        </script>';
        exit;
        header("Location: index.php?do=quanlyloaiphong");
       
    }
?>