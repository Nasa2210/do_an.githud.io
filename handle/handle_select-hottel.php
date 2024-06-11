<?php
    include "../Client/cauhinh.php";
    $key = $_POST['id'];
    //echo $key;
    $sql = "SELECT * FROM loaiphong where MaLoai in (select MaLoaiPhong from phong p ,khachsan ks where p.MaKhachSan = ks.MaKhachSan and ks.MaKhachSan = ".$key." group by MaLoaiPhong)" ;
    $danhsach = $connect->query($sql);
    while($row = $danhsach->fetch_array(MYSQLI_ASSOC))
    {
       echo " <option value=".$row["MaLoai"]."> ".$row["TenLoaiPhong"] ." </option>" ;
    }
?>