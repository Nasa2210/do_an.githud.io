    <div class="main_banner">
        <img src="../images/ks1.jpg" alt="">
    </div>
    <div class="main">
        <div class="">
            <ul>
                <li><a href="">Trang chủ</a>
                    <span></span>
                </li>
                <li>
                    <a href="">Khách Sạn</a>
                    <span></span>
                </li>
            </ul>
        </div>
    </div>
    <?php 
        include "../Client/cauhinh.php";
        $sql_get_hotel = "SELECT * FROM `khachsan`";
        $hotels = $connect->query($sql_get_hotel);
    ?>
    <div class="intro_branch grid wide">
        <h2 class="_title fronText">HỆ THỐNG CHI NHÁNH KHÁCH SẠN HM</h2>
        <div class="grid wide">
            <div class="row">
                <?php 
                while ($row =$hotels->fetch_array(MYSQLI_ASSOC))
                {
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
                ?>
                
            </div>
        </div>
        <a href="" class="buton_ok">Xem Thêm
            <span></span><span></span><span></span><span></span>
        </a>
    </div>
 