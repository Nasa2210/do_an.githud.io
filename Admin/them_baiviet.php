<?php 
    include "../Client/cauhinh.php";
    $sql_select = "SELECT * FROM chude";
    $list = $connect->query($sql_select);
    if(!$list)
    {
        echo "loi";    }

?>
<div class="main_insert-content">
<h3>Đăng bài viết</h3>
<form enctype="multipart/form-data"  action="index.php?do=them_baiviet-submit" method="post" id="form_insert-content">
	<div class="row ">
        <div class="form_group item col l-12">
            <div class="row">
                <label class ="col l-2" for ="content-title"> Tiêu đề</label>
                <input type="text" class="form-control col l-8" name="title" id="title">
                <span class="form-message"></span>
            </div>
        </div>
        <div class="form_group item col l-12 ">
            <div class="row">
                <label class ="col l-2" for ="content-topic"> Chủ Đề </label>
                <select class="form-control col l-8" name="topic" id="topic">
                    <option value="0">--chon--</option>
                    <?php 
                         while($row = $list->fetch_array(MYSQLI_ASSOC))
                         {
                             echo "<option value =".$row["MaChuDe"].">".$row["TenChuDe"]."</option>"; ;
                         }
                    ?>
                </select>
                <span class="form-message"></span>
            </div>
        </div>
        <div class="form_group item col l-12 ">
            <div class="row">
                <label class ="col l-2" for ="content-summary">Tóm tắt</label>
                <textarea id="summary" class="form-control col l-8" name="summary"></textarea>	

                <span class="form-message"></span>
            </div>
        </div>
        <div class="form_group item col l-12 ">
            <div class="row">
                <label class ="col l-2" for ="content-image">Hình ảnh</label>
                <img class="col l-4" src="../images/image-placeholder.png" id="image_img" alt="">
                <input type="file" class="form-control col l-6" name="image" id="image">
                <span class="form-message"></span>
            </div>
        </div>
        <div class="form_group item col l-12 ">
            <div class="row">
                <label class ="col l-2" for ="content-cmt-image">Chú thích ảnh</label>
                <input type="tetx" class="form-control col l-6" name="cmt_img" id="cmt_img">
                <span class="form-message"></span>
            </div>
        </div>
        <div class="form_group item col l-12 ">
            <div class="row content">
                <label class ="col l-2" for ="content-body">Nội dung bài viết</label>
                <textarea id="content" class="form-control col l-8" name="content"></textarea>	
                <span class="form-message"></span>
            </div>
        </div>
    </div>
	<input type="submit" value="Đăng bài" />
</form>
<script src="../Js/ckeditor/ckeditor.js"></script>
<script>CKEDITOR.replace('content');</script>
<script src="../Js/validator.js"></script>
<script>
     Validator({
			form: '#form_insert-content',
			orrorSelector: '.form-message',
			formGroupSelector: '.form_group' ,
			rules: [
			Validator.isRequired('#title'),
			//Validator.isRequired('#topic'),
			Validator.isRequired('#cmt_img'),
			Validator.isRequired('#content'),
			Validator.isRequired('#image'),
			Validator.isRequired('#summary'),
			]
		}) 
</script>
<script>
    const fileInput1 = document.getElementById('image');
        const image2 = document.getElementById('image_img');
        fileInput1.addEventListener('change', () => {
			image2.style.display = 'block';
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