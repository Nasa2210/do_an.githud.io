<?php
    include "../Client/cauhinh.php";
    $MaKS=$_GET['idmaks'];
    $MaPhong=$_GET['idmaphong'];
    $sql_selectloaiphong = $pdo->prepare("SELECT * FROM `loaiphong` WHERE 1");
    $sql_selectloaiphong->execute();
    $sql_selectkhachsan = $pdo->prepare("SELECT * FROM `khachsan` WHERE 1");
    $sql_selectkhachsan->execute();
    

?>
<div class="Ngoai">
    <div class="che"></div>
    <div class="form_inserphong">
        <div class="form_isphong_header">
            <h2>Sửa phòng</h2>
            <p  ><i id="back"class="fa-solid fa-xmark"></i></p>
        </div>
        <div class="form_isphong_body">
            <form action="updatephong_submit.php" method="post" id="form_themphong">
                <input type="hidden" name="maks" value="<?php echo $MaKS;?>">
                <input type="hidden" name="maphong" value="<?php echo $MaPhong;?>">
                <div class="second_isphong ">
                    <div class="choose form_group">
                        <label for="select_room-type">Chọn Loại phòng:</label>
                        <select name="select_room-type" id="select_room-type" class="form-control">
                            <option value="0">----Chọn----</option>
                            <?php 
                                while($row2 = $sql_selectloaiphong->fetch(PDO::FETCH_ASSOC))
                                {
                                    echo "<option value =".$row2["MaLoai"].">".$row2["TenLoaiPhong"]."</option>"; ;
                                }
                            ?>
                        </select>
                        <span class="form-message"></span>

                    </div>
                    <div class="thongtinphong ">
                        <div class="ttpten form_group">
                            <label for = "room-name" >Tên phòng:</label>
                            <input name = "room-name" type="text" id="room-name" class="form-control">
                            <span class="form-message"></span>
                        </div>
                        
                    </div>
                    <div class="thongtinphong ">
                        <div class="ttpten form_group">
                            <label for = "room-tinhtrang" >Tình Trạng:</label>
                            <input type="radio" name="room-tinhtrang" id="" value="Trống" checked>Trống
                            <input type="radio" name="room-tinhtrang" id="" value="Đang ở">Đang ở
                            <input type="radio" name="room-tinhtrang" id="" value="Đặt cọc"> Đặt cọc
                            
                            <span class="form-message"></span>
                        </div>
                        
                    </div>
                </div>
                <button type="submit"> Sửa Phòng </button>
            </form>
        </div>
    </div>
    <script>
    var test= document.getElementById('back');
                    test.addEventListener('click',()=>{
                        window.history.back();
                    });
                
</script>
</div>