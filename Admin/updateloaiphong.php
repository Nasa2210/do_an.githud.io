<?php
        include "../Client/cauhinh.php";
        $malpid=$_GET['id'];
        $sql_kiemtra = "SELECT * FROM `loaiphong` WHERE MaLoai = '$malpid' ";	
		
		
		$danhsach = $connect->query($sql_kiemtra);
		//Nếu kết quả kết nối không được thì xuất báo lỗi và thoát
		if (!$danhsach) {
			die("Không thể thực hiện câu lệnh SQL: " . $connect->connect_error);
			exit();
		}
		
		$row = $danhsach->fetch_array(MYSQLI_ASSOC);
    ?>
  <div class="form_updateloaiphong">
  <form action="updateloaiphong_submit.php" method="post"enctype="multipart/form-data">
   

        <div class="box updateloaiphong">
            <h2>Update Loại phòng</h2>
            
                
                <div class="input_box">
                    <span><i class="fa-brands fa-codepen"></i>Mã Loại Phòng</span>
                    <input type="text"name="malpid"value="<?php echo $malpid?> " readonly >
                    
                </div>
                <div class="input_box">
                    <span><i class="fa-solid fa-people-roof"></i>Tên Loại phòng </span>
                    <input type="text" name="TenLoaiPhong"value="<?php echo $row['TenLoaiPhong']?>">
                    
                </div>
                <div class="input_box">
                    <span><i class="fa-solid fa-dollar-sign"></i>Giá</span>
                    <input type="text"  name="Gia" value="<?php echo $row['Gia']?>">
                    
                </div>
                <div class="input_box">
                    <span><i class="fa-solid fa-ruler-horizontal"></i>Kích thước</span>
                    <input type="text" name="KichThuoc" value="<?php echo $row['KichThuoc']?>">
                    
                </div>
                <div class="input_box">
                    <span><i class="fa-solid fa-users"></i>Số lượng Người</span>
                    <input type="text"  name ="SLNguoi" value="<?php echo $row['SLNguoi']?>">
                    
                </div>
                <div class="input_box">
                    <span><i class="fa-solid fa-bed"></i></i>Loại Giường</span>
                    <?php
                        if($row['LoaiGiuong']==1){
                            echo"<input type=\"radio\"  name =\"LoaiGiuong\" value=\"1\" checked>Vip";
                            echo"<input type=\"radio\"  name =\"LoaiGiuong\" value=\"2\">Thường";
                        }
                        if($row['LoaiGiuong']==2){
                            echo"<input type=\"radio\"  name =\"LoaiGiuong\" value=\"1\" >Vip";
                            echo"<input type=\"radio\"  name =\"LoaiGiuong\" value=\"2\"checked>Thường";
                        }
                    ?>
                    
                </div>

                    <input type="submit" value="Sửa" class="sua"/>
             
        </div>
        </from>

  </div> 