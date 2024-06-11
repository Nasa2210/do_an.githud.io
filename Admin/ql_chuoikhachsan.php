<div class="main_list-hotel">
<?php
    include "../Client/cauhinh.php";
	$sql_list_hotel = "SELECT * FROM chuoikhachsan Where 1";
    $list_hotel = $connect->query($sql_list_hotel);

    $id = isset($_GET['id'])? $_GET['id'] : 0 ;
?>
    <h2>Danh sách các chuỗi khách sạn</h2>
    <div class="list_hotel row no-gutters">
        <div class="hotel-right col l-9 ">
            <table class="table-hotel">
                <tr class="hotel-title">
                    <th>
                        <p>#</p>
                    </th>
                    <th>
                        <p>Tên chuỗi</p>
                    </th>
                    <th>
                        <p>Mô tả</p>
                    </th>
                    <th> <p>Hình ảnh</p></th>
                    <th></th>
                </tr>
                <?php 
                while($row = $list_hotel->fetch_array(MYSQLI_ASSOC))
                {
                    echo "<tr>";
                    echo "    <td>".$row["MaChuoi"]."</td>";
                    echo "    <td>".$row["TenChuoi"]."</td>";
                    echo "    <td>".$row["MoTa"]."</td>";
                    echo "    <td>  <img class =\"image_list-hotle\" src= '../images/".$row["HinhAnh"]."'/> </td>";
                    echo "    <td> <div>  <a href='index.php?do=ql_chuoikhachsan&id=" . $row["MaChuoi"] . "'><img src='../images/edit.png' /></a>
                                <a href='index.php?do=xoa_chuoi&id=" . $row["MaChuoi"] . "' onclick='return confirm(\"Bạn có muốn xóa chủ đề " . $row['TenChuoi'] . " không?\")'><img src='../images/delete.png' /></a> </div> </td> " ;
                }
                ?>
            </table>
        </div>
        <div class="hotel-left col l-3">
            <?php 
                if($id!= 0 )
                {
                    $sql_getchude = "SELECT * FROM chuoikhachsan WHERE MaChuoi = ".$id;
                    $topic = $connect->query($sql_getchude);
                    if(!$topic)
                    {
                        die("Lỗi: ". $connect->error);
                        exit();
                    }
                    else 
                    {
                        $infor = $topic->fetch_array(MYSQLI_ASSOC)
            ?> 
            <a href="index.php?do=ql_chuoikhachsan" class="btn-insert">Thêm chuỗi</a>
            <form enctype="multipart/form-data" action="sua_chuoi.php" id= "list_hotel-form" method="post" class="form-update">
                <h3>Sửa Chuỗi </h3>
                <input type="hidden"name="list_id" value="<?php echo $infor["MaChuoi"] ?>">
                <div class="form_group">
                    <label for="list_hotel-id">Mã Chuỗi</label>
                    <input type="text" id="list_hotel-id" name="list_hotel-id" value="<?php echo $infor["MaChuoi"] ?>" disabled>
                </div>
                <div class="form_group">
                    <label for="list_hotel-name">Tên Chuỗi</label>
                    <input class = "form-control" type="text" id="list_hotel-name" name = "list_hotel-name" value="<?php echo $infor["TenChuoi"] ?>">
                    <span class="form-message"></span>
                </div>
                <div class="form_group">
                    <label for="list_hotel-name">Mô Tả</label>
					<textarea id="list_hotel-description" class="form-control" name="list_hotel-description"  cols="27"><?php echo $infor["MoTa"] ?></textarea>
                    <span class="form-message"></span>
                </div>
                <div class="form_group">
                    <p >Hình ảnh</p>
                    <img src="../images/<?php echo $infor["HinhAnh"] ?>" alt="" id="image">
                    <input class = "form-control" type="file" id="list_hotel-img" name = "list_hotel-img">
                    <span class="form-message"></span>
                </div>
                <button type="submit">Sửa</button>
            </form>
            <?php } }
            else {
            ?>
            <form enctype="multipart/form-data" action="them_chuoikhachsan-submit.php" id= "list_hotel-form" method="post" class="insert-form">
                <h3>Thêm Chuỗi </h3>
                <div class="form_group">
                    <label for="list_hotel-id">Mã Chuỗi</label>
                    <input type="text" id="list_hotel-id" name="list_hotel-id" value="" disabled>
                </div>
                <div class="form_group">
                    <label for="list_hotel-name">Tên Chuỗi</label>
                    <input class = "form-control" type="text" id="list_hotel-name" name = "list_hotel-name">
                    <span class="form-message"></span>
                </div>
                <div class="form_group">
                    <label for="list_hotel-name">Mô Tả</label>
					<textarea id="list_hotel-description" class="form-control" name="list_hotel-description" cols="50"></textarea>
                    <span class="form-message"></span>
                </div>
                <div class="form_group">
                    <p >Hình ảnh</p>
                    <img src="../images/image-placeholder.png" alt="" id="image">
                    <input class = "form-control" type="file" id="list_hotel-img" name = "list_hotel-img">
                    <span class="form-message"></span>
                </div>
                <button type="submit">Thêm</button>
            </form>
            <?php 
            }?>
        </div>
            <script src="../Js/validator.js"></script>
            <script>
                    Validator({
                            form: '#list_hotel-form',
                            orrorSelector: '.form-message',
                            formGroupSelector: '.form_group' ,
                            rules: [
                            Validator.isRequired('#list_hotel-name'),
                            Validator.isRequired('#list_hotel-description'),
                            Validator.isRequired('#list_hotel-img'),
                            ]
                        }) 
            </script>
            <script>
                const fileInput = document.getElementById('list_hotel-img');
                const image = document.getElementById('image');
                fileInput.addEventListener('change', () => {
                    const file1 = fileInput.files[0];
                    const reader1 = new FileReader();
                    reader1.readAsDataURL(file1);
                    reader1.onload = function () {
                        image.src = reader1.result;
                    };
                });
            </script>
        </div>
    </div>
</div>