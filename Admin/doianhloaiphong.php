<!DOCTYPE html>
<html lang="en">
<head>
</head>
<body>
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

<form action="doianhloaiphong_submit.php" class="Doianhloaiphong" enctype="multipart/form-data" method="post">
    <img id="myImage2" class="img_user2" >
    <input type="text"name="malpid"value="<?php echo $malpid?> " style="display:none">
    <input type="file" name="img_loaiphonganh"  id="myFileInput1"   style="display:none">
    <img src='../upload/<?php echo$row['HinhAnh']?>' id='myImage3' class='img_user1'style="display:block">
    <input type="submit" value="Upload" class="sua"/>
</form>
<button id="btn_chonImg1" onclick="document.getElementById('myFileInput1').click();"><i class="fa-solid fa-camera"></i></button>
       
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
</body>
</html>