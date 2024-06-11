<?php
    include "../Client/cauhinh.php";
	$sql_selectloaiphong = $pdo->prepare("SELECT * FROM `loaiphong` WHERE 1");	
	$sql_selectloaiphong->execute();
?>
<div class="body_sudkindroom">
    <div class="hder_sudkindroom">
        <div class="row  no-gutters">
            <div class="col l-12">
                <div class="btn_opinion">
                    <a href="?do=InserkindRoom">Thêm loại phòng</a>
                </div>
            </div>
        </div>
    </div>
    <div class="giua_sudkindroom">
        <div class="grid wide">
            <div class="row no-gutters">
                <?php
                    while ($row = $sql_selectloaiphong->fetch(PDO::FETCH_ASSOC)){
                        echo "<div class=\"item_kindroom col l-4 grid\">";
                        echo "    <div class=\"row\">";
                        echo "        <div class=\"kindroom-avatar col l-4 l-o-1\" >";
                        echo "            <img src=\"../upload/".$row['HinhAnh']."\" alt=\"\">";
                        echo "        </div>";
                        echo "        <div class=\" kindroom kindroom_content col l-7\">";
                        echo "            <div class=\"kindroom-name\">";
                        echo "                <p>Tên Loại Phòng:".$row['TenLoaiPhong']."</p>";
                        echo "            </div>";
                        echo "            <div class=\"kindroom kindroom-gia\">";
                        echo "                <p>Giá :".$row['Gia']."</p>";
                        echo "            </div>";
                        echo "            <div class=\"kindroom kindroom-kichthuoc\">";
                        echo "                <p>Kích thước phòng:".$row['KichThuoc']."</p>";
                        echo "            </div>";
                        echo "            <div class=\" kindroom kindroom-soluong\">";
                        echo "                <p>Số lượng:".$row['SLNguoi']."</p>";
                        echo "            </div>";
                        echo "            <div class=\"kindroom-action\">";
                        if($row['LoaiGiuong']==1) {
                        echo "               <p>Loại Giường: Vip</p>"; 
                        }
                        elseif($row['LoaiGiuong']==2){
                        echo "               <p>Loại Giường: Bình thường</p>"; 
                        }
                        echo "                 <a href='index.php?do=doianhloaiphong&id=" . $row["MaLoai"] . "'>Đổi ảnh</a>";
                        echo "                 <a href='index.php?do=updateloaiphong&id=" . $row["MaLoai"] . "'><img src='../images/edit.png' /></a>";
					    echo "                 <a href='index.php?do=deleteloaiphong&id=" . $row["MaLoai"] . "' onclick='return confirm(\"Bạn có muốn xóa tên phòng" . $row['TenLoaiPhong'] . " không?\")'><img src='../images/delete.png' /></a>"; 
                        echo "            </div>";
                        echo "        </div>";
                        echo "    </div>";
                        echo "</div> ";
                    }
                ?>
        </div>
    </div>
</div>
