<?php
        $page = isset($_GET['do']) ? $_GET['do'] : "ql_khachsan";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/Grid.css">
    <link rel="stylesheet" href="../css/infouser.css">
    <link rel="stylesheet" href="../css/mainuser1.css">
    <link rel="stylesheet" href="../css/quanlyroom.css">
    <link rel="stylesheet" href="../css/doimatkhau.css">
    <link rel="stylesheet" href="../css/quanlyloaiphong.css">
    <link rel="stylesheet" href="../css/infouser.css">
    <link rel="stylesheet" href="../css/manager_hotel.css">
    <link rel="stylesheet" href="../css/insertphong.css">
    <link rel="stylesheet" href="../css/regis_user.css">
    <link rel="stylesheet" href="../css/regis_user.css">
    <link rel="stylesheet" href="../css/updatedatphong.css">
    <link rel="stylesheet" href="../css/quanlydatphong.css">
    <link rel="stylesheet" href="../css/form_them_khachsan.css">
    <link rel="stylesheet" href="../css/ql_chude.css">
    <link rel="stylesheet" href="../css/ql_baiviet.css">
    <link rel="stylesheet" href="../css/them_baiviet.css">
    <link rel="stylesheet" href="../css/ql_chuoikhachsan.css">
    <script src="https://kit.fontawesome.com/0f57b9b4e5.js" crossorigin="anonymous"></script>

    <script src="../handle/jquery-1.8.0.min.js"></script>

</head>
    <?php 
        session_start();
        include "../Client/cauhinh.php";
        if(isset($_SESSION['MaND'])){
    ?>
<body>
<div class="header grid">
    <div class="tasbars row no-gutters">
        <div class="col l-2 header_logo">
            <header class="logo">
                <a href="../Client/index.php" style="  color: #fff;" ><i class="fa-solid fa-house"></i></a>
            </header>
        </div>
        <div class="col l-10 header_main">
            <div class="header_user" >
                <img src="../upload/<?php echo$_SESSION['Img']?>" alt="" class="img_user" >
                <div class="menu_user">
                    <ul>
                        <a href="?do=infouser" >Thông tin cá nhân</a>
                        <a href="?do=doimatkhau">Đổi mật khẩu</a>
                        <a href="?do=dangxuat">Đăng xuất</a>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="body grid">
    <div class="row no-gutters" style="height:100%;">
        <div class="col l-2 navigation">
            <div class="avatar" >
                <img src="../upload/<?php echo$_SESSION['Img']?>" alt="" class="img_user_table" > 
                <span><?php echo$_SESSION['HoTen']?></span>
            </div>
            <div id="myList" class="row no-gutters">
                <?php
                    if($_SESSION['Quyen']==1&&$page=='user'){
                        echo "<a class=\"col l-12 active\" href=\"index.php?do=user\"><p><i class=\"fa-sharp fa-solid fa-user\"></i> Danh Sách Người Dùng</p></a>";
                    }
                    if($_SESSION['Quyen']==1&&$page!='user'){
                        echo "<a class=\"col l-12 \" href=\"index.php?do=user\"><p><i class=\"fa-sharp fa-solid fa-user\"></i> Danh Sách Người Dùng</p></a>";
                    }
                ?>
                <!-- <a class="col l-12 active" href="user.php?do=user">Danh Sách Người Dùng</a> -->
                <a class="col l-12 <?php if( $page=='ql_chuoikhachsan') echo "active"; else echo "" ?>" href="index.php?do=ql_chuoikhachsan"><p><i class="fa-solid fa-rectangle-list"></i> Chuỗi</p></a>
                <a class="col l-12 <?php if( $page=='ql_khachsan') echo "active"; else echo "" ?>" href="index.php?do=ql_khachsan"><p><i class="fa-solid fa-hotel"></i> Khách Sạn </p></a>
                <a class="col l-12 <?php if( $page=='quanlydatphong') echo "active"; else echo "" ?>" href="index.php?do=quanlydatphong"><p><i class="fa-solid fa-bookmark"></i> Đặt Phòng </p></a>
                <a class="col l-12 <?php if( $page=='quanlyroom') echo "active"; else echo "" ?>" href="index.php?do=quanlyroom"><p><i class="fa-sharp fa-solid fa-cloud"></i> Phòng </p></a>
                <a class="col l-12 <?php if( $page=='quanlyloaiphong') echo "active"; else echo "" ?>" href="index.php?do=quanlyloaiphong"><p><i class="fa-solid fa-people-roof"></i>Loại Phòng </p></a>
                <a class="col l-12 <?php if( $page=='ql_baiviet') echo "active"; else echo "" ?>" href="index.php?do=ql_baiviet"><p><i class="fa-solid fa-newspaper"></i> Tin tức </p></a>
                <a class="col l-12 <?php if( $page=='ql_chude') echo "active"; else echo "" ?>" href="index.php?do=ql_chude"><p><i class="fa-sharp fa-solid fa-book-open-reader"></i> Chủ Đề </p></a>
            </div>
            <!-- <script src="../Js/mainuser.js"></script> -->
        </div>
        <div class="col l-10 container" id="container">
            <?php
                $do = isset($_GET['do']) ? $_GET['do'] : "ql_khachsan";
                include $do.".php";
            ?>
        </div>
        <script src="../Js/mainuser.js"></script>
        
        <script type="module" >
            import {myAjax} from "../handle/ajax.js";
            myAjax('#select_list-hotel',"#infor_avatar-hotel", "../handle/handle_change_hotel-avatar.php" );
            myAjax('#select_list-hotel',".header-body .infor .number p", "../handle/handle_change_hotel-count.php" );
            myAjax('#select_list-hotel',".list_hotel-body .list_hotel-main", "../handle/handle_change_hotel-infor.php" );
            </script>
    </div>

    <?php } else header("Location: login.php");?>
</div>
<footer>
    <h4>Đồ án lập trình web quản lý khách sạn</h4>
    <p>Giáo viên hướng </p>
    <p>Sinh viên thực hiện: Hoàng Duy Hải 2221050041 - Nguyễn Thế Anh 2221050653 - Đỗ Hoàng Minh </p>
</footer>
</body>
</html>