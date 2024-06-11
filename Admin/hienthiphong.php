<?php
     include "../Client/cauhinh.php";
    $ma=$_GET['id'];
     $select_ksphong = $pdo->prepare("SELECT * FROM KhachSan ks, Phong p WHERE ks.`MaKhachSan` = p.`MaKhachSan` AND p.`MaKhachSan`='$ma'");	
     $select_ksphong->execute();
     $select_ksphong_trong = $pdo->prepare("SELECT COUNT(*)AS 'Trong' FROM KhachSan ks, Phong p WHERE ks.`MaKhachSan` = p.`MaKhachSan` AND p.`MaKhachSan`='$ma' AND p.`TinhTrang`='Trống'");	
     $select_ksphong_dango = $pdo->prepare("SELECT COUNT(*) AS 'DangO'FROM KhachSan ks, Phong p WHERE ks.`MaKhachSan` = p.`MaKhachSan` AND p.`MaKhachSan`='$ma'AND p.`TinhTrang`='Đang ở'");	
     $select_ksphong_datcoc = $pdo->prepare("SELECT COUNT(*) AS 'DatCoc'FROM KhachSan ks, Phong p WHERE ks.`MaKhachSan` = p.`MaKhachSan` AND p.`MaKhachSan`='$ma'AND p.`TinhTrang`='Đặt cọc'");
     $select_ksphong_trong->execute();
     $select_ksphong_dango->execute();
     $select_ksphong_datcoc->execute();	
     $slks_trong= $select_ksphong_trong->fetch(PDO::FETCH_ASSOC);
     $slks_dango= $select_ksphong_dango->fetch(PDO::FETCH_ASSOC);
     $slks_dat= $select_ksphong_datcoc->fetch(PDO::FETCH_ASSOC);

     $date = date('d-m-Y H:i');
    
    while ($row = $select_ksphong->fetch(PDO::FETCH_ASSOC)){
        if($row['TinhTrang']=='Đang ở'){
            echo "<div class=\"room\" style=\"background-color: #00a65a;\" >";
        }
        elseif($row['TinhTrang']=='Đặt cọc'){
            echo "<div class=\"room\" style=\"background-color: #605ca8;\" >";
        }
        else{
            echo "<div class=\"room\" style=\"background-color: #3d8cbd;\" >";
        }
        echo "<div class=\"img_iconroom\"><i class=\"fa-brands fa-slideshare\"></i></div>";
        echo "<div class=\"content_nameroom\">".$row['TenPhong']."</div>";
        echo "<div class=\"trangthai\">".$row['TinhTrang']."</div>";
        echo "<div class=\"ngaydat\"><i class=\"fa-solid fa-calendar-check\"></i>".  $date."</div>";
        echo " <div class=\"ngaytra\"><i class=\"fa-regular fa-calendar-xmark\"></i>".$date."</div>";
        echo "<a href='?do=update_phong&idmaphong=".$row["MaPhong"]."&idmaks=".$row["MaKhachSan"]."'><img src='../images/edit.png' /></a>";
        echo "<a href='?do=delete_phong&id=" . $row["MaPhong"] . "' onclick='return confirm(\"Bạn có muốn xóa phòng " . $row['TenPhong'] . " không?\")'><img src='../images/delete.png' /></a>";
        
        if($row['TinhTrang']=='Đặt cọc'||$row['TinhTrang']=='Đang ở')
            echo "<a href='?do=xemchitietkh_phong&idmaphong=".$row["MaPhong"]."'>Xem chi tiết</a>";
        echo "</div>";
    }
?>
<div class="tinhtrang">
    <div class="potion_tt Trong"><?php if ($slks_trong["Trong"]>0){echo $slks_trong["Trong"];} else{ echo "0";}?></div>
    <div class="potion_tt dango"><?php if ($slks_dango["DangO"]>0){echo $slks_dango["DangO"];} else{ echo "0";}?></div>
    <div class="potion_tt datcoc"><?php if ($slks_dat["DatCoc"]>0){echo $slks_dat["DatCoc"];} else{ echo "0";}?></div>
</div>

