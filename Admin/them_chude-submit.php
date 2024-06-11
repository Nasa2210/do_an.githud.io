<?php 
    include "../Client/cauhinh.php";
    $sql ="insert into chude values (NULL, '".$_POST["topic-name"]."')";
    $action =  $connect->query($sql);
    if(!$action )
    {
        die("lỗi: ".$sql."" . $connect->error);
    }

    else {
        header("location: index.php?do=ql_chude");
    }
?>