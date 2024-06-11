<?php
    include "../Client/cauhinh.php";
    $idmaDatPhong=$_GET['id'];
    $selectdatphong = $pdo->prepare("SELECT * FROM `datphong` WHERE `MaDatPhong`='$idmaDatPhong'");	
    $selectdatphong->execute();
    $row = $selectdatphong->fetch(PDO::FETCH_ASSOC);
    if($row['MaPhong'] ==0){
        echo '<script>
        alert("Khách hàng chưa đặt phòng!");
        window.history.back();
        </script>';
        exit;
    }
    else{
        $sql_tenloaiphong=$pdo->prepare("SELECT * FROM `loaiphong` WHERE `MaLoai` ='".$row['MaLoaiPhong']."'");
        $sql_tenloaiphong->execute();
        $row2 = $sql_tenloaiphong->fetch(PDO::FETCH_ASSOC);
        $sql_phong=$pdo->prepare("SELECT * FROM `phong` WHERE `MaPhong` ='".$row['MaPhong']."'");
        $sql_phong->execute();
        $rowphong = $sql_phong->fetch(PDO::FETCH_ASSOC);
        $sql_khachhang=$pdo->prepare("SELECT * FROM `khachhang` WHERE `MaKhachHang` ='".$row['MaKhachHang']."'");
        $sql_khachhang->execute();
        $row_khachhang = $sql_khachhang->fetch(PDO::FETCH_ASSOC);
        $sql_khachsan=$pdo->prepare("SELECT * FROM `khachsan` WHERE `MaKhachSan` ='".$row['MaKhachSan']."'");
        $sql_khachsan->execute();
        $row_khachsan = $sql_khachsan->fetch(PDO::FETCH_ASSOC);
    }
       
    
   
?>

<div class="Ngoai1">
    <div class="che1"></div>
    <div class="form_inserphong1">
        <div class="form_isphong_header1 ">
               <div class="header_datphong1">
               <h2>Sửa đặt phòng</h2>
                <p><i id="back"class="fa-solid fa-xmark"></i></p>
               </div>
               <div class="form_thongtindatphong ">
                <form action="updatedatphong_submit.php" method="post" class="row no-gutterss">
                        <div class="left_uddatphong col l-6"> 
                            <div class="MaDatPhong">
                                <label for="MaDatPhong">Mã đặt phòng</label>
                                <input type="text" name="MaDatPhong" id="MaDatPhong" value="<?php echo $row['MaDatPhong'];?>" readonly>
                            
                            </div>
                            <div class="MaDatPhong">
                                <label for="MaDatPhong">Mã khách sạn</label>
                                <input type="text" name="tenkhachsan" id="tenDatPhong" value="<?php echo $row_khachsan['TenKhachSan'];?>" readonly>
                                <input type="hidden" name="Makhachsan" id="MaDatPhong" value="<?php echo $row['MaKhachSan'];?>">
                            
                            </div>
                            <div class="MaLoaiPhong">
                                <label for="MaLoaiPhong">Tên loại phòng</label>
                                <select name="select_datphong_loaiphong" id="MaLoaiPhong" class="form-control">
                                    <option value="<?php echo $row['MaLoaiPhong'];?>">
                                    <?php 

                                    echo $row2['TenLoaiPhong'];
                                    ?></option>
                                    <?php 
                                        $sql_tenloaiphong=$pdo->prepare("SELECT * FROM `loaiphong` WHERE `TenLoaiPhong` <> '".$row2['TenLoaiPhong']."'");
                                        while($rowtenloaiphong_select = $sql_tenloaiphong->fetch(PDO::FETCH_ASSOC))
                                        {
                                            echo "<option value =".$rowtenloaiphong_select["MaLoai"].">".$rowtenloaiphong_select["TenLoaiPhong"]."</option>"; ;
                                        }
                                    ?>
                                </select>
                            </div>
                            <div class="MaPhong">
                                <label for="MaPhong">Tên phòng</label>
                                <select name="select_datphong_phong" id="MaLoaiPhong" class="form-control">
                                <option value="<?php echo $row['MaPhong'];?>"><?php echo $rowphong['TenPhong'];?></option> 
                                    <?php 
                                        $sql_tenphong=$pdo->prepare("SELECT * FROM `phong` WHERE `MaPhong` <> '".$row['MaPhong']."'");
                                        $sql_tenphong->execute();
                                        while($rowtenphong_select = $sql_tenphong->fetch(PDO::FETCH_ASSOC))
                                        {
                                            echo "<option value =".$rowtenphong_select["MaPhong"].">".$rowtenphong_select["TenPhong"]."</option>"; ;
                                        }
                                    ?>
                                </select>
                            
                            </div>
                            <div class="ngaydat">
                                <label for="NgayDat">Ngày đặt: </label>
                                <input type="date" name="NgayDat" id="NgayDat" value="<?php echo $row['NgayDat'];?>">
                            </div>
                        
                            <div class="ngaynhan">
                                <label for="NgayNhan">Ngày nhận:</label>
                                <input type="date" name="NgayNhan" id="NgayNhan"  value="<?php echo $row['NgayNhan'];?>">
                            </div>
                        
                            <div class="ngaytra">
                                <label for="NgayTra">Ngày trả:</label>
                                <input type="date" name="NgayTra" id="NgayTra" value="<?php echo $row['NgayTra'];?>">
                            </div>
                        
                            <div class="ghichu">
                                <label for="GhiChu">Ghi chú:</label>
                                <textarea name="GhiChu" id="GhiChu"><?php echo $row['GhiChu'];?></textarea>
                        
                            </div>
                            <div class="soluong">
                                <label for="SoLuong">Số lượng:</label>
                                <input type="number" name="SoLuong" id="SoLuong" <?php echo $row['SoLuong'];?>>
                            </div>
                        
                        </div>
                        <!-- Thông tin khách hàng -->
                        <div class="right_uddatphong col l-6">
                            <div class="MaKH">
                                <label for="MaKH">Mã Khách Hàng</label>
                                <input name="Kh_MaKH" type="text" id="MaKH" value="<?php echo $row_khachhang['MaKhachHang'];?>"readonly>
                            
                            </div>
                            <div class="HoTen">
                            <label for="HoTen">Họ tên</label>
                            <input name="Kh_HoTen" type="text" id="HoTen"value="<?php echo $row_khachhang['HoTen'];?>">
                           
                        </div>
                        <div class="Email">
                            <label for="Email">Email</label>
                            <input name="Kh_Email" type="text" id="Email"value="<?php echo $row_khachhang['Email'];?>">
                           
                        </div>
                        <div class="SDT">
                            <label for="SDT">Số điện thoại</label>
                            <input name="Kh_SDT" type="text" id="SDT"value="<?php echo $row_khachhang['Sdt'];?>">
                           
                        </div>
                        </div>
                        <div class="submit_datphong col l-12">   
                            <input type="submit" value="Sửa">
                        </div>
                    </form>
               </div>
               <script>
                    var test= document.getElementById('back');
                                    test.addEventListener('click',()=>{
                                        window.history.back();
                                    });
                                
                </script>
        </div>
    </div>
</div>        