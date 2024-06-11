<?php
    include "../Client/cauhinh.php";
    $key = $_POST['id'];
    $sql = "SELECT count(*) as so FROM khachsan where MaChuoi = ".$key;
    $danhsach = $connect->query($sql);
    $row = $danhsach->fetch_array(MYSQLI_ASSOC);
    echo $row['so'];    
?>