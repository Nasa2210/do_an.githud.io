<?php 
    include "../Client/cauhinh.php";
    $list_id = $_GET['id'];
    // duyệt và xóa các khách sạn có trong chuỗi
    $sql_get_hotel = "SELECT * FROM `khachsan` WHERE MaChuoi = '$list_id' ";
    echo $sql_get_hotel;
    $hotels = $connect->query($sql_get_hotel);
    if(isset($hotels))
    {
        while($hotel = $hotels->fetch_array(MYSQLI_ASSOC))
        {
            xoa_khachsan($hotel["MaKhachSan"]);
        }
    }
   // xóa chuỗi khách sạn 
    $sql_delete_list = "DELETE FROM `chuoikhachsan` WHERE MaChuoi = '$list_id'";
    if($connect->query($sql_delete_list))
    {
        header("Location: index.php?do=ql_chuoikhachsan");
    }
    else 
    {
        die("Error: ".$sql_delete_list );
    }


    function xoa_khachsan($maks)
    { 
        include "../Client/cauhinh.php";
        // xóa hình trong image
        $sql_get_hotel= "Select * from  khachsan where  MaKhachSan = '$maks'";
        $hotels = $connect->query($sql_get_hotel);
        
        $sqlphong = "DELETE FROM `phong` WHERE `MaKhachSan`='$maks'";
        if (!$connect->query($sqlphong))
        {
            echo "Error: " .$sqlphong;
        }
        $sql_hinhanh = "DELETE FROM `hinhanh` WHERE `MaKhachSan`='$maks'";
        
        if(!$connect->query($sql_hinhanh))
        {
            echo "Error: " .$sql_hinhanh;
            
        }
        $sql_delete_booking = "DELETE FROM `datphong` WHERE `MaKhachSan`='$maks'";
        if(!$connect->query($sql_delete_booking))
        {
            echo "Error: " .$sql_delete_booking;
        }
        $sqlks = "DELETE FROM `khachsan` WHERE `MaKhachSan`='$maks'";
            
            $danhsach = $connect->query($sqlks);
            
            if (!$danhsach) {
                die("Không thể thực hiện câu lệnh SQL: " . $sqlks);
                exit();
            }
            else{
                if(isset($hotels))
                {
                    $hotel= $hotels->fetch_array(MYSQLI_ASSOC); 
                    $path = "../images/".$hotel["HinhAnh"];
                    unlink($path);
                }
            }
    }
?>