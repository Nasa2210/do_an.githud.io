<?php
    include "../Client/cauhinh.php";
    $key = $_GET["id"];
    $sql_content = "SELECT * FROM baiviet WHERE MaBaiViet = " .$key;
    $list = $connect->query($sql_content);
    $row = $list->fetch_array(MYSQLI_ASSOC);
    if(!$row)
    {
        die("Error: ".$connect->error);
        exit;
    }
    else{
        $censorship = $row['KiemDuyet'];
        if($censorship == 1)
        {
            $sql_update = "UPDATE baiviet SET KiemDuyet = '0' WHERE MaBaiViet = $key ";
            if(!$connect->query($sql_update))
            {
                die("Error: " . $connect->error);
            }
            else{
                header("Location: index.php?do=ql_baiviet");
            }
        }else{
            $sql_update = "UPDATE baiviet SET KiemDuyet = '1' WHERE MaBaiViet = $key ";
            if(!$connect->query($sql_update))
            {
                die("Error: " . $connect->error);
            }
            else{
                header("Location: index.php?do=ql_baiviet");
            }
        }
    }

?>