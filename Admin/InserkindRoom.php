<div class="InserkindRoom grid wide">
    <div class="form_inser row">
        <form action="InserkindRoom_submit.php" method="post" enctype="multipart/form-data" class="col l-8 l-o-4">
            <h3>Thêm loại phòng</h3>
            <table>
                <tr class="ifo_room1 form-group">
                    <td>
                        <label for="taptin1">Chọn hình phòng: </label>
                    </td>
                    <td>
                        <input type="file" name="taptin1" id="room_img">
                    </td>
                </tr>
                <tr class="ifo_room1 form-group">
                    <td>
                        <lable for="TenLoaiPhong" class="p_ifo0">Tên Loại Phòng</lable>
                    </td>
                    <td>
                        <input type="text"name="TenLoaiPhong" id="room_name">
                    </td>
                </tr>
                <tr class="ifo_room1 form-group">
                    <td>
                        <lable for="Gia" class="p_ifo1">Giá</lable>
                    </td>
                    <td>
                        <input type="text"name="Gia" id="room_price">
                    </td>
                </tr>
                <tr class="ifo_room1 form-group">
                    <td>
                        <lable for="KichThuoc" class="p_ifo2">Kích thước phòng</lable>
                    </td>
                    <td>
                        <input type="text"name="KichThuoc" id="room_size">
                    </td>
                </tr>
                <tr class="ifo_room1 form-group">
                    <td>
                        <lable for="SoLuong" class="p_ifo3">Số lượng người</lable>
                    </td>
                    <td>
                        <input type="text"name="SoLuong" id="room_number-people"> 
                    </td>
                </tr>
                <tr class="ifo_room1 form-group">
                    <td>
                        <p  class="p_ifo4">Loại giường</p>
                    </td>
                    <td>
                        <div class="radio_loaigiuong">
                            <label for="room_bed-vip">Vip</label>
                            <input type="radio"name="LoaiGiuong" id="room_bed-vip" value="1">
                            <label for="LoaiGiuong">Bình thường</label>
                            <input type="radio"name="LoaiGiuong" id="room_bed-basic" value="2"> 
                        </div>
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <input type="submit" value="Thêm phòng" name="submit" class="themphong">
                    </td>
                </tr>
            </table>
        </form>
    </div>
</div>
