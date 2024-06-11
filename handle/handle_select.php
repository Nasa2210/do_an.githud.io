<?php
    include "../Client/cauhinh.php";
    $key = $_POST['id'];
    $sql = "SELECT * FROM khachsan where MaChuoi = '$key'";
    $danhsach = $connect->query($sql);
    while($row =  $danhsach->fetch_array(MYSQLI_ASSOC))
    {
       // data 
       echo " <option value=".$row["MaKhachSan"]."> ".$row["TenKhachSan"] ." </option>" ;
    }
?>