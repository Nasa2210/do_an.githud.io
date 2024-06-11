<?php
    $idmaphong=$_GET['idmaphong'];
    $selectdatphong = $pdo->prepare("SELECT * FROM `datphong` WHERE `MaPhong`='$idmaphong'");	
    $selectdatphong->execute();
    $danhsach = $selectdatphong->fetch(PDO::FETCH_ASSOC);

    $selectks = $pdo->prepare("SELECT * FROM `khachsan` WHERE `MaKhachSan`='".$danhsach['MaKhachSan']."'");	
    $selectks->execute();
    $danhsachks = $selectks->fetch(PDO::FETCH_ASSOC);

    $selectloaiphong = $pdo->prepare("SELECT * FROM `loaiphong` WHERE `MaLoai`='".$danhsach['MaLoaiPhong']."'");	
    $selectloaiphong->execute();
    $danhsachloaiphong = $selectloaiphong->fetch(PDO::FETCH_ASSOC);

    $selectphong = $pdo->prepare("SELECT * FROM `phong` WHERE `MaPhong`='".$danhsach['MaPhong']."'");	
    $selectphong->execute();
    $danhsachphong = $selectphong->fetch(PDO::FETCH_ASSOC);

    $selectkhachhang = $pdo->prepare("SELECT * FROM `khachhang` WHERE `MaKhachHang`='".$danhsach['MaKhachHang']."'");	
    $selectkhachhang->execute();
    $danhsachkhachhang = $selectkhachhang->fetch(PDO::FETCH_ASSOC);
?>
<div class="Ngoai">
    <div class="che"></div>
    <div class="form_inserphong">
        <div class="form_isphong_header">
            <h2>Thông tin khách hàng</h2>
            <p><i id="back"class="fa-solid fa-xmark"></i></p>
        </div>
        <div class="body_kh_phong">
        <div class="ifo_kh">
            <label for="HoTen">Họ tên:</label>
            <input type="text" name="HoTen" id="HoTen" value="<?php echo $danhsachkhachhang['HoTen'];?>" readonly>
        </div>
        <div class="ifo_kh">
            <label for="Sdt">SDT:</label>
            <input type="text" name="Sdt" id="Sdt" value="<?php echo $danhsachkhachhang['Sdt'];?>" readonly>
        </div>
        <div class="ifo_kh">
            <label for="Email">Email:</label>
            <input type="text" name="Email" id="Email" value="<?php echo $danhsachkhachhang['Email'];?>" readonly>
        </div>
        <div class="ifo_kh">
            <label for="TenKhachSan">Tên Khách Sạn</label>
            <input type="text" name="TenKhachSan" id="TenKhachSan" value="<?php echo $danhsachks['TenKhachSan'];?>" readonly>
        </div>
        <div class="ifo_kh">
            <label for="TenPhong">Tên phòng</label>
            <input type="text" name="TenPhong" id="TenPhong" value="<?php echo $danhsachphong['TenPhong'];?>" readonly>
        </div>
        <div class="ifo_kh">
            <label for="TenLoaiPhong">Tên loại phòng</label>
            <input type="text" name="TenLoaiPhong" id="TenLoaiPhong" value="<?php echo $danhsachloaiphong['TenLoaiPhong'];?>" readonly>
        </div>
        <div class="ifo_kh">
            <label for="NgayDat">Ngày đặt: </label>
            <input type="date" name="NgayDat" id="NgayDat" value="<?php echo $danhsach['NgayDat'];?>"readonly>
        </div>
        <div class="ifo_kh">
            <label for="NgayNhan">Ngày nhận:</label>
            <input type="date" name="NgayNhan" id="NgayNhan"  value="<?php echo $danhsach['NgayNhan'];?>"readonly>
        </div>
        <div class="ifo_kh">
            <label for="NgayTra">Ngày trả:</label>
            <input type="date" name="NgayTra" id="NgayTra" value="<?php echo $danhsach['NgayTra'];?>"readonly>
        </div>
        <div class="ifo_kh">
            <label for="GhiChu">Ghi chú:</label>
            <textarea name="GhiChu" id="GhiChu" readonly><?php echo $danhsach['GhiChu'];?></textarea>
        </div>
        <div class="ifo_kh">
            <label for="SoLuong">Số lượng:</label>
            <input type="text" name="SoLuong" id="SoLuong" value="<?php echo $danhsach['SoLuong'];?>" readonly>
        </div> 
    </div>
    </div>
    
</div>


<script>
    var test= document.getElementById('back');
                    test.addEventListener('click',()=>{
                        window.history.back();
                    });
                
</script>