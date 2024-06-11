<?php

    $madp = $_GET['id'];
    $makhachsan = $_GET['idks'];
    $maloaiphong = $_GET['idlp'];
    $trangthai = $_GET['trangthai'];
    $selecks = $pdo->prepare("SELECT * FROM `khachsan` WHERE `MaKhachSan`='$makhachsan'");	
    $selecks->execute();
    $dongnameks=$selecks->fetch(PDO::FETCH_ASSOC);
    $select_phongtrong = $pdo->prepare("SELECT * FROM `phong` where `TinhTrang`='Trống' And `MaKhachSan`='". $makhachsan."'");
    $select_phongtrong->execute();
   
?>
<div class="Ngoai">
    <div class="che"></div>
    <div class="form_inserphong">
        <div class="form_isphong_header">
                <h2>Thêm phòng cho khách hàng</h2>
                <p><i id="back"class="fa-solid fa-xmark"></i></p>
            </div>
            <form action="themphongforkh.php" method="post">
                <input type="hidden" name="MaDatPhong" value="<?php echo $madp;?>">
                <input type="hidden" name="TrangThai" value="<?php echo $trangthai;?>">
                <div class="form_isphong_body">
                    <h3><?php 
                    
                    echo $dongnameks['TenKhachSan'];
                    
                    ?></h3>
                    <label for="select_phong">Phòng còn trống</label>
                <select name="chuoi" id="select_phong">
                    <option value="0"> ---- chon ---</option>
                    <?php 
                        while ($row = $select_phongtrong->fetch(PDO::FETCH_ASSOC))
                        {
                            echo "<option value= ".$row["MaPhong"].">".$row["TenPhong"]."</option>";
                        }
                    ?>
                </select>
                <input type="submit" value="Đặt phòng">
                </div>
                <script>
                    var test= document.getElementById('back');
                                    test.addEventListener('click',()=>{
                                        window.history.back();
                                    });
                                
                </script>
            </form>
    </div>
</div>
