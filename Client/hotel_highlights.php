
<?php 
    $sql = "SELECT * FROM khachsan ORDER BY XepLoai DESC LIMIT 3 ";
    $danhsach = $connect->query($sql);
    if (!$danhsach) {
        die("Không thể thực hiện câu lệnh SQL: " . $connect->connect_error);
        exit();
    }else
    {

        while ($row = $danhsach->fetch_array(MYSQLI_ASSOC)) {
            echo" <div class = \"col l-3 m-3 c-12\">";
            echo"     <div class=\"warpCard\">";
            echo"         <div class=\"card_img\">";
            echo"             <img src=../images/".$row["HinhAnh"]." class = \"l-12\" alt=\"\">";
            echo"         </div>";
            echo"         <div class=\"card_title l-12 m-12 c-12 \">";
            echo"             <a href=\"index.php?do=hotel_chitiet&id=".$row["MaKhachSan"]." \" class =\"fronText\">".$row["TenKhachSan"]."</a>";
            echo"         </div>";
            echo"         <div class=\"card_body fronText\">";
            echo"             <p>Xếp loại: ".$row["XepLoai"]." <i class=\"fa-solid fa-star\"></i></p>";
            echo"             <p>Địa chỉ: ".$row["DiaChi"]." </p>";
            echo"             <p>Liên hệ:  ".$row["Sdt"]."</p>";
            echo"             <div class=\"btn btn1\">";
            echo"                 <a href=\"index.php?do=hotel_chitiet&id=".$row["MaKhachSan"]."\" class=\"fronText\">Xem thêm</a>";
            echo"             </div>";
            echo"         </div>";
            echo"     </div>";
            echo" </div>";
        }
    }
    function getPath($MaKhachSan, $connect)
    {
        
        $sql_hinhanh = "SELECT * FROM hinhanh WHERE MaKhachSan = '$MaKhachSan' limit 1";
        $dsHinh = $connect->query($sql_hinhanh);
        if(!$dsHinh)
        {
            die("Không thể thực hiện câu lệnh SQL: " . $connect->connect_error);
            exit();
        }
        else
         if ($row_hinh = $dsHinh->fetch_array(MYSQLI_ASSOC))
        {
            return $row_hinh["DuongDan"];
        }
        return null;
    }
?>