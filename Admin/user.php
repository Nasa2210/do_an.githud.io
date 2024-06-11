<?php
    include "../Client/cauhinh.php";
	$sql = "SELECT * FROM `user` WHERE 1";
	$danhsach = $connect->query($sql);
	//Nếu kết quả kết nối không được thì xuất báo lỗi và thoát
	if (!$danhsach) {
		die("Không thể thực hiện câu lệnh SQL: " . $connect->connect_error);
		exit();
	}

?>
<div class="main_list-user" >
	<h3 >Danh sách người dùng</h3>
	<a href="index.php?do=regis_user">Đăng ký tài khoản cho nhân viên</a>
	<div class="grid wide">
		<div class="row no-gutters">
			<?php 
			while ($dong = $danhsach->fetch_array(MYSQLI_ASSOC)) 
			{	
				echo "<div class=\"item_user col l-4 grid\">";
				echo "	<div class=\"row\">";
				echo "		<div class=\"user-avatar col l-4 l-o-1\" >";
				echo "			<img src=\"../upload/".$dong['Img']."\" alt=\"\">";
				echo "		</div>";
				echo "		<div class=\"user_content col l-7\">";
				echo "			<div class=\"user-id\">";
				echo "				<p>Mã ND: ". $dong["MaNguoiDung"] ."</p>";
				echo "			</div>";
				echo "			<div class=\"user-name\">";
				echo "				<p>Họ tên: " . $dong["TenNguoiDung"] . "</p>";
				echo "			</div>";
				echo "			<div class=\"user-name-login\">";
				echo "				<p>Username: " . $dong["TenDangNhap"] . "</p>";
				echo "			</div>";
				if($dong["Quyen"] == 1)
				{
					echo "			<div class=\"user-law\">";
					echo "				<p>Quyền: Quản trị(<a href='user_active.php?do=nguoidung_kichhoat&id=" . $dong["MaNguoiDung"] . "&quyen=2'>Hạ quyền</a>)</p>";
					echo "			</div>";
				}
				else
				{
					echo "			<div class=\"user-law\">";
					echo "				<p>Quyền: Thành viên (<a href='user_active.php?do=nguoidung_kichhoat&id=" . $dong["MaNguoiDung"] . "&quyen=1'>Nâng quyền</a>)</p>";
					echo "			</div>";
				}
				
				echo "			<div class=\"user-action\">";
				if($dong["Khoa"] == 0)
					echo "<p>HĐ:</p> <a href='user_active.php?do=nguoidung_kichhoat&id=" . $dong["MaNguoiDung"] . "&khoa=1'><img src='../images/active.png' /></a> ";
				else
					echo "<p>HĐ: </p><a href='user_active.php?do=nguoidung_kichhoat&id=" . $dong["MaNguoiDung"] . "&khoa=0'><img src='../images/ban.png' /></a>";
					
					echo "<a href='index.php?do=update_user&id=" . $dong["MaNguoiDung"] . "'><img src='../images/edit.png' /></a>";
					echo "<a href='index.php?do=delete_user&id=" . $dong["MaNguoiDung"] . "' onclick='return confirm(\"Bạn có muốn xóa người dùng " . $dong['TenNguoiDung'] . " không?\")'><img src='../images/delete.png' /></a>";
				echo "			</div>";
				echo "		</div>";
				echo "	</div>";
				echo "</div>";
			}
			?>
		</div>
	</div>
	
	
</div>
