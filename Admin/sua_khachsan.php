<?php 
    $key = $_GET['id'];
    $sql = "SELECT * FROM khachsan WHERE MaKhachSan = '$key'";
    $khachsan = $connect->query($sql);
    $ksan = $khachsan->fetch_array(MYSQLI_ASSOC);

    $HotelName = $ksan["TenKhachSan"];
    $Adress = $ksan["DiaChi"];
    $NumberPhone = $ksan["Sdt"];
    $Lever = $ksan["XepLoai"];
    $Image = $ksan["HinhAnh"];
    $Description = $ksan["MoTa"];
?>
<div class="main_update main_form_addKS	">
    <h3>Thêm Khách Sạn</h3>

	<form enctype="multipart/form-data"  action="sua_khachsan-submit.php" method="post" id="form_post">
        <input type="hidden" name="IDHotel" value = <?php echo $key; ?>>
		<div class="row no-gutters">
			<div class="form_group col l-12" >
				<div class="row no-gutters">
					<span class="MyFormLabel col l-2">Tên Khách Sạn:</span>
					<input class="form-control col l-10" id="hotel_name" type="text" name="TenKS" size = " 60" value = "<?php echo $HotelName; ?>"/>
					<span class="form-message"></span>
				</div>
			</div>
			<div class="form_group col l-12" >
				<div class="row no-gutters">
					<span class="MyFormLabel col l-2">Địa chỉ:</span>
					<textarea id="hotel_adress" class="form-control col l-10" name="DiaChi" cols="50"><?php echo $Adress; ?></textarea>
					<span class="form-message"></span>
				</div>
			</div>
			<div class="form_group col l-12" >
				<div class="row no-gutters">
					<span class="MyFormLabel col l-2">Số điện thoại:</span>
					<input id="hotel_number-phone" class="form-control col l-10" name="Sdt" cols="50" value = "<?php echo $NumberPhone; ?>"></input>
					<span class="form-message"></span>
				</div>
			</div>
			<div class="form_group col l-12" >
				<div class="row no-gutters">
					<span class="MyFormLabel col l-2">Xếp loại:</span>
					<input type="radio" class="form-control" id="basao" name="XepLoai" value="3">
					<label for="basao">3 <i class="fa-solid fa-star"></i></label><br>
				 	<input type="radio" class="form-control" id="bonsao" name="XepLoai" value="4">
					<label for="bonsao">4 <i class="fa-solid fa-star"></i></label><br>
					<input type="radio" class="form-control" id="namsao" name="XepLoai" value="5">
					<label for="namsao">5 <i class="fa-solid fa-star"></i></label><br>
					<span class="form-message"></span>
				</div>
			</div>
			<div class="form_group col l-12" >
				<div class="row no-gutters">
					<span class="MyFormLabel col l-2">Hình ảnh</span>
                    <img id="myImage2" class="img_user2" style="width: 240px; height: 240px;" >
                    <img src="../images/<?php echo $Image; ?>" id='myImage3' class='img_user1'style="display:block;width: 240px; height: 240px;" >
					<input type="file" name="HinhAnh"id="myFileInput1" >
					<span class="form-message"></span>
				</div>
			</div>
			<div class="form_group col l-12" >
				<div class="row no-gutters Mota">
					<span class="MyFormLabel col l-12">Mô tả khách sạn:</span>
					<textarea id="hotel_description" class="form-control" class="" name="Mota" id="Mota"><?php echo $Description?> </textarea>	
					<span class="form-message"></span>
					<script src="../Js/ckeditor/ckeditor.js"></script>			
					<script>CKEDITOR.replace('Mota');</script>
				</div>
			</div>
		</div>
        <input type="submit" value="Sửa bài" class="button-submit col l-12"/>
    </form>
	<script src="../Js/validator.js"></script>
	<script>
		Validator({
			form: '#form_post',
			orrorSelector: '.form-message',
			formGroupSelector: '.form_group' ,
			rules: [
			Validator.isRequired('#hotel_name'),
			Validator.isRequired('#hotel_adress'),
			Validator.isRequired('#hotel_number-phone'),
			//Validator.isRequired('#hotel_image'),
			Validator.isRequired('#hotel_description'),
			Validator.isRequired('input[name="XepLoai"]'),
			]
		}) 

	</script>
    <script>
        const fileInput1 = document.getElementById('myFileInput1');
        const image2 = document.getElementById('myImage2');
        const image3 = document.getElementById('myImage3');
        fileInput1.addEventListener('change', () => {
            image2.style.display = 'block';
            image3.style.display = 'none';
            // Lấy tệp hình ảnh đã chọn
            const file1 = fileInput1.files[0];
            
            // Hiển thị hình ảnh
            const reader1 = new FileReader();
            reader1.readAsDataURL(file1);
            reader1.onload = function () {
                image2.src = reader1.result;
            };
        });
    </script>
</div>