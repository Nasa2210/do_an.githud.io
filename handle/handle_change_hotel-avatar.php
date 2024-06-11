<?php
    include "../Client/cauhinh.php";
    $key = $_POST['id'];
    if($key != 0)
    {
        $sql = "SELECT * FROM chuoikhachsan where MaChuoi = ".$key;
        $danhsach = $connect->query($sql);
        $row = $danhsach->fetch_array(MYSQLI_ASSOC);
        echo "<img src=../images/".$row["HinhAnh"]." alt=\"\">";
    }
    
?>