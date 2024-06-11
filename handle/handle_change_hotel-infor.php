<?php
    include "../Client/cauhinh.php";
    $key = $_POST['id'];
    $sql = "SELECT * FROM khachsan where MaChuoi = ".$key;
    $danhsach = $connect->query($sql);
    while ($row = $danhsach->fetch_array(MYSQLI_ASSOC))
    {
        echo "<div class=\"hotel-element col l-6\">";
        echo "        <div class=\"warper\">";
        echo "            <div class=\"row no-gutters \">";
        echo "                <div class=\"avatar l-3\">";
        echo "                    <img src=../images/".$row['HinhAnh']." alt=\"\">";
        echo "                </div>";
        echo "                <div class=\"infor l-9\">";
        echo "                    <h4>".$row['TenKhachSan']." </h4>";
        echo "                    <p>Xếp loai: ".$row['XepLoai']."</p>";
        echo "                    <p>Địa chỉ: ".$row['DiaChi']."</p>";
        echo "                    <a href=\"\">Sdt: ".$row['Sdt']."</a>";
        echo "                    <div class = \"action\">";
        echo "                         <a href='index.php?do=sua_khachsan&id=" . $row["MaKhachSan"] . "'><img src='../images/edit.png' /></a>";
		echo "                         <a href='index.php?do=xoa_khachsan&id=" . $row["MaKhachSan"] . "' onclick='return confirm(\"Bạn có muốn xóa khách sạn " . $row['TenKhachSan'] . " không?\")'><img src='../images/delete.png' /></a>";                                
        echo "                    </div>";
        echo "                </div>";
        echo "            </div>";
        echo "        </div>";
        echo "    </div>";
    }
    
?>