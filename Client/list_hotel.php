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



    <div class="hotel-highlights grid  ">
        <div class="grid wide">
            <h2 class="_title fronText">KHÁCH SẠN</h2>
            <P class = "sub-title fronText">Một số khách sạn nổi bật của chuỗi</P>
            <div class="row">
            <?php 
                $key = $_GET['id'];
                $sql = "SELECT * FROM khachsan where MaChuoi = $key";
                $danhsach = $connect->query($sql);
                if (!$danhsach) {
                    echo $key . "|||";
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
            ?>


            </div>
        </div>
    </div>
