<?php
	include_once "./cauhinh.php";

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="icon" type="image/x-icon" href="./img/iconweb.png">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hotel HTM</title>

    <link rel="stylesheet" href="../css/Grid.css">
    <link rel="stylesheet" href="../css/main.css">
    <link rel="stylesheet" href="../css/gioithieu.css">
    <link rel="stylesheet" href="../css/hotel.css">
    <link rel="stylesheet" href="../css/new.css">
    <link rel="stylesheet" href="../css/basic.css">
    <script src="../handle/jquery-1.8.0.min.js"></script>
    <!-- <link rel="stylesheet" href="./css/main.css"> -->
    <link
      href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap"
      rel="stylesheet"
    />
    <script src="https://kit.fontawesome.com/0f57b9b4e5.js" crossorigin="anonymous"></script>
    <style>
         * {
        box-sizing: border-box;
      }
      .col {
        background-clip: content-box;
        margin-top: 8px;
        margin-bottom: 8px;
      }
    </style>
</head>


<body>
    <div id="header" class = "grid">
        <div class="grid wide">
            <div class="menu row">
                <a href="index.php" id="logo_header" class="logo col l-2 m-2 c-2"><img src="../img/logo.jpg" alt=""></a> <!--THAY ẢNH CHO T--!!! -->
             
                <ul id="menu_nav" class="menu_nav col l-10 m-0 c-0">
                      <a href="index.php?do=home">Trang chủ</a>   
                      <a href="index.php?do=gioithieu">Giới thiệu</a>  
                      <a href="index.php?do=hotel">Khách sạn</a>  
                      <a href="index.php?do=news&news=dsbaiviet">Tin tức</a>  
                </ul>
                <div class="l-0 m-8 c-8 "></div>
                <div class="menu__sub l-0 m-2 c-2">
                    <i class="fa-solid fa-bars menu__sub-icon" ></i>
                </div>
            </div>
        </div>
    </div>
    <div id="container" class = "grid">
        <?php
            $do = isset($_GET['do']) ? $_GET['do'] : "home";
            include $do . ".php";
        ?>
    </div>
        <!-- Footter -->
    <footer>
        <div class="container">
            <div class="row">
                <div class="col l-4">
                    <div class="footer_name">
                        <h3 class="title">Thông tin liên hệ</h3>
                        <div class="address">
                            <span >HM Hotel</span>
                            <p>Địa chỉ: Cổ Nhuế - Bắc Từ Liêm- Hà Nội</p>
                            <p>Điện thoại: 0912345678</p>
                            <p>Hotline: 09090909</p>
                            <p>Email: hmhotel@gmail.com</p>
                            <p>Website: </p>
                        </div>
                    </div>
                </div>
                <div class="col l-4">
                    <div class="footer_name">
                        <h3 class="title">Thông tin liên hệ</h3>
                        <ul class="menu_footer">
                            <li><a href="">GYM</a></li>
                            <li><a href="">VISA</a></li>
                            <li><a href="">PHÒNG HỌP</a></li>
                            <li><a href="">NHÀ HÀNG</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col l-4">
                    <div class="footer_name">
                        <h3 class="title">Thông tin liên hệ</h3>
                        <div class="form_submit">
                            <input type="text" placeholder="Enter your Email">
                            <a href="" class=" buton btn_footer">Đăng ký</a>
                        </div>
                        <div class="list_icon_mxh">
                            <div class="icon_item"><a href="https://www.facebook.com/profile.php?id=100038694722812"><span><i class="fa-brands fa-facebook"></i></span></a></div>
                            <div class="icon_item"><a href="https://www.instagram.com/minh0123456/"><span><i class="fa-brands fa-instagram"></i></span></a></div>
                            <div class="icon_item"><a href=""><span><i class="fa-brands fa-youtube"></i></span></a></div>
                        </div>
                        <a id="move_to_admin" href="../Admin/index.php" style="color: white; text-decoration:none; font-size:18px;">trang admin</a>
                    </div>
                </div>
                <div class="col l-12 end_footer">
                        <p>Copyright  Hotels | Design by HM </p>
                        
                </div>
            </div>
        </div>
    </footer>
    <div class="phone_contact">
        <div class="number-phone">
            <a href="tel:0912345678">0912345678</a>
        </div>
        <div class="phone-icon">
            <i class="fa-solid fa-phone"></i>
        </div>
    </div>
</body>
</html>