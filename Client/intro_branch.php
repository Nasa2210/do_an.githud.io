<?php
    $sql = "SELECT * FROM chuoikhachsan ";
    $danhsach = $connect->query($sql);
    while ($row = $danhsach->fetch_array(MYSQLI_ASSOC)) {
        echo "<div class = \"col l-4 m-4 c-12\">";
        echo    "<div class=\"warpCard\"> ";
        echo    "    <div class=\"card_img\"> ";
        echo    "        <img src=../images/".$row["HinhAnh"]." class = \"l-12\" alt=\"\"> ";
        echo    "    </div> ";
        echo    "    <div class=\"card_title l-12 m-12 c-12 \"> ";
        echo    "        <a href= \"index.php?do=list_hotel&id=".$row["MaChuoi"]."\" class =\"fronText\">".$row["TenChuoi"]."</a> ";
        echo    "    </div> ";
        echo    "    <div class=\"card_body fronText\"> ";
        echo    "        <p>".$row["MoTa"]."</p> ";
        echo    "        <div class=\"btn\"> ";
        echo    "        <a href= \"index.php?do=list_hotel&id=".$row["MaChuoi"]."\" class =\"fronText\">Xem thêm</a> ";
        echo    "        </div> ";
        echo    "    </div> ";
        echo    "</div> ";
        echo    "</div> ";

    }
?>

