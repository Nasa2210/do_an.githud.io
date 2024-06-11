<?php
	$MaCD = $_GET['id']? $_GET['id']: 0;
	if($MaCD ==0)
	{
		echo "Không có bài viết nào";
	}else
	{
		$sql = "select t.MaBaiViet, t.TieuDe, t.NgayDang, t.TomTat, t.MaChuDe, t.HinhAnh, t.ChuThichAnh, l.MaChuDe, l.TenChuDe
		  from (chude l inner join baiviet t on t.MaChuDe=l.MaChuDe)
		  where t.MaChuDe='$MaCD'
		  group by t.MaChuDe, t.MaBaiViet, t.TieuDe, t.NgayDang, t.TomTat
		  having (t.NgayDang >= all (select NgayDang from baiviet where MaChuDe=l.MaChuDe))";
	
			$danhsach = $connect->query($sql);
			//Nếu kết quả kết nối không được thì xuất báo lỗi và thoát
			if (!$danhsach) {
				die("Không thể thực hiện câu lệnh SQL: " . $connect->connect_error);
				exit();
			}
			while ($row = $danhsach->fetch_array(MYSQLI_ASSOC)) 		
			{
	
				echo    "<div class=\"new-item col l-6\">";
				echo        "<a href= 'index.php?do=baiviet_chitiet&news=dsbaiviet&id= ".$row['MaBaiViet']."' class=\"new-link\">".$row['TieuDe']."</a> <br>";
				echo        "<a href='index.php?do=baiviet_chude&news=dsbaiviet&id=".$row['MaChuDe']." ' class=\"new-link-cd\">".$row['TenChuDe']."</a> " ;
				echo        "<p>".$row['NgayDang']."</p>";
				echo        "<div class=\"new-body row \">";
				echo              "<div class=\"new-body_img col l-4\">";
				echo                    "<img src='../images/".$row['HinhAnh']."' alt=\"\" >";
				echo              "</div>";
				echo                    "<p class=\"col l-8\">".$row['TomTat']."</p>";
				echo        "</div>";
				echo        "<a href='index.php?do=baiviet_chitiet&news=dsbaiviet&id=".$row['MaBaiViet']."' class=\"new-about\">chi tiet</a>";
				echo      "</div>";
			}
	} 

?>
	</body>
</html>