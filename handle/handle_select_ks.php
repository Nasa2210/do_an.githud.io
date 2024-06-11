
<?php 
    include "../Client/cauhinh.php";
        $keychuoi = $_POST['id'];
    $sql = "SELECT * FROM khachsan where `MaChuoi`=".$keychuoi;
    $danhsach1 = $connect -> query($sql);
    echo "<option value=\"0\"> ---- Chọn ---</option>";
    while ($row = $danhsach1->fetch_array(MYSQLI_ASSOC))
    {
        echo "<option value= ".$row["MaKhachSan"].">".$row["TenKhachSan"]."</option>";
    }

?>