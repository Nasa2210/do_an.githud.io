<?php 
    include "../Client/cauhinh.php";
    $sql ="delete from chude where MaChuDe = ".$_GET['id'];
    $action =  $connect->query($sql);
    if(!$action )
    {
        die("lỗi: ".$sql."" . $connect->error);
    }

    else {
        header("location: index.php?do=ql_chude");
    }
?>