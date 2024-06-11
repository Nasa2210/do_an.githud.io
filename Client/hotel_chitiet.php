<?php
	$MaKS = $_GET['id'];
	$sql = "SELECT *
			FROM khachsan 
			WHERE MaKhachSan = $MaKS ";
	
	$danhsach = $connect->query($sql);
	//Nếu kết quả kết nối không được thì xuất báo lỗi và thoát
	if (!$danhsach) {
		die("Không thể thực hiện câu lệnh SQL: " . $connect->connect_error);
		exit();
	}
	
	$dong = $danhsach->fetch_array(MYSQLI_ASSOC);
?>
<div class="main_banner">
        <img src="../images/ks5.jpg" alt="">
    </div>
    <div class="main">
        <div class="">
            <ul>
                <li><a href="../index.php">Trang chủ</a>
                    <span></span>
                </li>
                <li>
                    <a href="./gioithieu.php">Hotel</a>
                    <span></span>
                </li>
            </ul>
        </div>
    </div>
<div id="about_hotel">

<div class="infor-hotel grid wide">
    <div class="row">
        <div class="col l-10 l-o-1 ">
            <div class="row">
                <div class="hearder col l-12">
                    <div class="row">
                        <div class="image col l-4">
                            <img src="../images/<?php echo $dong["HinhAnh"] ?>" alt="">
                        </div>
                        <div class="col l-8">
                            <h3 class="title">
                                <?php echo $dong["TenKhachSan"] ?>
                            </h3>
                            <p class="lever">
                                Xếp Loại: <?php echo $dong["XepLoai"] ?> <i class="fa-solid fa-star"></i>
                            </p>
                            <p class="adress">
                               Địa chỉ: <?php echo $dong["DiaChi"] ?>
                            </p>
                            <p class="contact">
                               Điện thoai: <a href="tel:<?php echo $dong["Sdt"] ?>"><?php echo $dong["Sdt"] ?></a> 
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            
           <div class="body col l-12">
                <p class="content">
                    <?php echo $dong["MoTa"] ?>
                </p>
           </div>
           <h3>Các hình ảnh</h3>
           <div class="imgs col l-12 m-12 c -12">
                <?php 
                    $sql1 = "SELECT *
                            FROM hinhanh  
                            WHERE MaKhachSan = $MaKS ";
                    
                    $danhsachAnh = $connect->query($sql1);
                    //Nếu kết quả kết nối không được thì xuất báo lỗi và thoát
                    if (!$danhsachAnh) {
                        die("Không thể thực hiện câu lệnh SQL: " . $connect->connect_error);
                        exit();
                    }
                    while($row = $danhsachAnh->fetch_array(MYSQLI_ASSOC))
                    {
                        echo "<img src=".$row["DuongDan"]." alt=\"\" class = \"col l-3 m-4 c-6\">";
                    }
                ?>
                
           </div>
        </div>

    </div>


</div>    
</div>