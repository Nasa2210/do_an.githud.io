<div class="thongtindsks_datphong">
    <?php
            include "../Client/cauhinh.php";
            $keymaks = $_POST['id'];
            $selectdatphong = $pdo->prepare("SELECT * FROM `KhachSan` ks,`datphong` dp,`loaiphong` lp,`khachhang` kh WHERE ks.`MaKhachSan`= dp.`MaKhachSan` and dp.`MaKhachHang`=kh.`MaKhachHang` and dp.`MaLoaiPhong`=lp.`MaLoai` and dp.`MaKhachSan`=". $keymaks);	
            $selectdatphong->execute();
           
    ?>
    <table>
        <tr>
            <th>Tên khách sạn</th>
            <th>Tên Khách hàng</th>
            <th>Tên loại phòng</th>
            <th>Tên phòng</th>
            <th>Ngày đặt</th>
            <th>Ngày nhận</th>
            <th>Ngày trả</th>
            <th>Ghi chú</th>
            <th>Số lượng</th>
            <th>Trạng thái</th>
            <th>Hoạt động</th>
        </tr>
        <?php
             while ($dong = $selectdatphong->fetch(PDO::FETCH_ASSOC)){
                
                if($dong["TrangThai"]==1){
                    echo "<tr style=\" background-color: #fff;\">";
                }
                elseif($dong['MaPhong']==0){
                    echo "<tr style=\" background-color: #fff;\">";
                }
                else{
                    echo "<tr >";
                }
                echo "<td>".$dong['TenKhachSan']."</td>";
                echo "<td>".$dong['HoTen']."</td>";
                echo "<td>".$dong['TenLoaiPhong']."</td>";
                if($dong['MaPhong']==0){
                    echo "<td>Chưa đặt phòng</td>";
                }
                else{
                    $selecttenphong = $pdo->prepare("SELECT * FROM `phong` where `MaPhong`='".$dong['MaPhong']."'");	
                    $selecttenphong->execute();
                    $dong_tenphong = $selecttenphong->fetch(PDO::FETCH_ASSOC);
                    echo "<td>".$dong_tenphong['TenPhong']."</td>";
                }
                echo "<td>".$dong['NgayDat']."</td>";
                echo "<td>".$dong['NgayNhan']."</td>";
                echo "<td>".$dong['NgayTra']."</td>";
                echo "<td>".$dong['GhiChu']."</td>";
                echo "<td>".$dong['SoLuong']."</td>";
                if($dong["TrangThai"] == 1)
				{
					echo "			<td class=\"user-law\">";
					echo "				<a href='index.php?do=huydat&id=" . $dong["MaDatPhong"] . "&idphong=" . $dong["MaPhong"] . "'onclick='return confirm(\"Bạn có muốn hủy đặt không?\")'>Đã đặt cọc phòng</a>";
					echo "			</td>";
				}
				else
				{
					echo "			<td class=\"user-law\">";
					echo "				<a href='index.php?do=datphongtrangthai&id=" . $dong["MaDatPhong"] . "&idks=" . $dong["MaKhachSan"] . "&idlp=" . $dong["MaLoaiPhong"] . "&trangthai=1'>Chưa đặt phòng</a>";
					echo "			</td>";
				}
                echo "<td>";
                echo "<a  href='index.php?do=updatedatphong&id=" . $dong["MaDatPhong"] . "'><img src='../images/edit.png' /></a>";
                echo "<a  href='index.php?do=delete_datphong&id=" . $dong["MaDatPhong"] . "' onclick='return confirm(\"Bạn có muốn xóa khách hàng :" . $dong['HoTen'] . " không?\")' style=\"margin-left: 20px;\"><img src='../images/delete.png' /></a>";
                echo "</td>";
                echo "</tr>";   
             }
        ?>
       
    </table>
</div>