<?php 
    include "../Client/cauhinh.php";
    $key = $_GET['id'];
    $sql_delete = "DELETE FROM baiviet WHERE MaBaiViet = '$key'";
    $test = $connect->query($sql_delete);
    if(!$test)
    {
        die("Failed to delete" . $sql_delete);
        exit;
    }
    else 
    {
        header("Location: index.php?do=ql_baiviet");
    }
?>