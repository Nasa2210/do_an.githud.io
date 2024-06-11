        <div class="slider l-12 m-12 c-12">
            <i class="fa fa-angle-left slider-prev"></i>
            <div class="slider-wrapper">
                <div class="slider-main">
                <div class="slider-item">
                    <img
                    src="../images/tt1.jpg"
                    alt=""
                    />
                </div>
                <div class="slider-item">
                    <img
                    src="../images/tt2.jpg"
                    alt=""
                    />
                </div>
                <div class="slider-item">
                    <img
                    src="../images/tt3.jpg"
                    alt=""
                    />
                </div>
                <div class="slider-item">
                    <img
                    src="../images/tt4.jpg"
                    alt=""
                    />
                </div>
                <div class="slider-item">
                    <img
                    src="../images/tt5.jpg"
                    alt=""
                    />
                </div>
                </div>
            </div>
            <i class="fa fa-angle-right slider-next"></i>
        </div>

    </div>
    <script src="../Js/starter.js"></script>
    <div class="booking grid">
        <div class="row  no-gutters">
            <div class="col l-6 m-12 c-12">
                <div class="booking__item one_item">
                    <div class="tab_main"><a href="">Đặt phòng ngay</a></div>
                    <div class="tab_item"></div>
                    <div class="tab_content">
                        <form action="../handle/handle_datphong.php" method="POST" name="booking-form" id="booking-form">
                            <div class="row">
                                <div class="col l-4 m-6 c-12">
                                    <div class="form_group">
                                        <label for="">Họ và tên
                                            <span class="starRed">*</span>
                                        </label>
                                        <input class = "form-control" type="text" class="form_control" name="full_name" id="full_name" placeholder="">
                                        <span class="form-message"></span>
                                    </div>
                                </div>
                                <div class="col l-4 m-6 c-12">
                                    <div class="form_group">
                                        <label for="">Điện thoại
                                            <span class="starRed">*</span>
                                        </label>
                                        <input class = "form-control" type="text" class="form_control" name="number_phone" id="phone" placeholder="">
                                        <span class="form-message"></span>
                                    </div>
                                </div>
                                <div class="col l-4 m-6 c-12">
                                    <div class="form_group">
                                        <label for="">Email
                                            <span class="starRed">*</span>
                                        </label>
                                        <input class = "form-control" type="text" class="form_control" name="email" id="email" placeholder="">
                                        <span class="form-message"></span>
                                    </div>
                                </div>
                                <div class="col l-4 m-6 c-12">
                                    <div class="form_group">
                                        <label for="">Chi nhánh
                                            <span class="starRed">*</span>
                                        </label>
                                        <select class = "form-control select_from" name="select_branch" id="select_branch">
                                            <option value="0">----Chọn----</option>
                                            <?php
                                                $sql = "SELECT * FROM chuoikhachsan";
                                                $chuoiks = $connect->query($sql);
                                                //Nếu kết quả kết nối không được thì xuất báo lỗi và thoát
                                                if (!$chuoiks) {
                                                    die("Không thể thực hiện câu lệnh SQL: " . $connect->connect_error);
                                                    exit();
                                                }
                                                while ($row = $chuoiks->fetch_array(MYSQLI_ASSOC)) 		
                                                {
                                                    echo    "<option value = ".$row["MaChuoi"]." > ".$row["TenChuoi"]." </option>";
                                                }
                                            ?>
                                        
                                        </select>
                                        <span class="form-message"></span>
                                    </div>
                                </div>
                             
                                <div class="col l-4 m-6 c-12">
                                    <div class="form_group">
                                        <label for="">Khách sạn
                                            <span class="starRed">*</span>
                                        </label>
                                        <select class = "form-control select_from"  name="select_hotel" id="select_hotel" >
                                            <option value="0">---Chọn----</option>
                                        </select>
                                        <span class="form-message"></span>
                                    </div>
                                   <script>
                                        jQuery(document).ready(function ($) {
                                        $("#select_branch").change(function(){
                                            var id = $("#select_branch").val();
                                            $.post("../handle/handle_select.php",{id : id} , function(date)
                                            {
                                                $("#select_hotel").html(date);
                                            });
                                        });
                                        $("#select_hotel").disabled = false;;
                                    }) 
                                   </script>
                                </div>
                                <div class="col l-4 m-6 c-12">
                                    <div class="form_group">
                                        <label for="">Loại phòng
                                            <span class="starRed">*</span>
                                        </label>
                                        <select class = "form-control select_from" name="select_type-room" id="select_type-room" >
                                            <option value=""></option>
                                        </select>
                                        <span class="form-message"></span>
                                    </div>
                                    <script>
                                        jQuery(document).ready(function ($) {
                                        $("#select_hotel").change(function(){
                                            var id = $("#select_hotel").val();
                                             $.post("../handle/handle_select-hottel.php",{id : id} , function(date)
                                             {
                                                $("#select_type-room").html(date);
                                             });
                                            
                                        });
                                    }) 
                                   </script>
                                </div>
                                <div class="col l-4 m-6 c-12">
                                    <div class="form_group">
                                        <label for="">Ngày đến
                                            <span class="starRed">*</span>
                                        </label>
                                        <input class = "form-control" type="date" class="form_control" name="date_come" id="date_come" placeholder="">
                                        <span class="form-message"></span>
                                    </div>
                                </div>
                                <div class="col l-4 m-6 c-12">
                                    <div class="form_group">
                                        <label for="">Ngày đi
                                            <span class="starRed">*</span>
                                        </label>
                                        <input class = "form-control" type="date" class="form_control" name="date_leave" id="date_leave" placeholder="">
                                        <span class="form-message"></span>
                                    </div>
                                </div>
                                <div class="col l-8 m-12 c-12">
                                    <div class="form_group">
                                        <label for="">Ghi chú
                                            <span class="starRed">*</span>
                                        </label>
                                        <textarea name="note" id="textarea_fromG" cols="30" rows="10"></textarea>
                                        <span class="form-message"></span>
                                    </div>
                                </div>
                                <div class="col l-4 m-6 c-12">
                                    <div class="form_group">
                                        <label for="">Số lượng phòng
                                            <span class="starRed">*</span>
                                        </label>
                                        <input class = "form-control" type="text" class="form_control" name="number-room" id="number-room" placeholder="">
                                        <span class="form-message"></span>
                                        <input class = "form-control form-submit" type="submit" id="submit_datphong">
                                    </div>
                                </div>
                            </div>
                        </form>
                        <script src="../Js/validator.js"></script>
                        <script >
                            var dateCome = document.querySelector('#date_come');
                            var dateLeave = document.querySelector('#date_leave');
                            var date = new Date();
                            var year = date.getFullYear();
                            var month = String(date.getMonth() +1).padStart(2, '0');
                            var today = String(date.getDate()).padStart(2, '0');
                            var dateCurrent = year + '-' + month + '-' + today;
                            dateCome.min = dateCurrent;
                            dateLeave.min = dateCurrent;
                            dateCome.addEventListener('change', function()
                            {
                                console.log(dateCurrent, dateCome.value);
                                dateLeave.min = dateCome.value;
                            })
                            Validator({
                                form: '#booking-form',
                                orrorSelector: '.form-message',
                                formGroupSelector: '.form_group' ,
                                rules: [
                                Validator.isRequired('#full_name'),
                                Validator.isRequired('#phone'),
                                Validator.isRequired('#email'),
                                Validator.isEmail('#email'),
                                Validator.isRequired('#select_branch'),
                            //     Validator.isRequired('#select_area'),
                                Validator.isRequired('#select_hotel'),
                                Validator.isRequired('#select_type-room'),
                                Validator.isRequired('#date_come'), 
                                Validator.isRequired('#date_leave'),
                                Validator.isRequired('#number-room'),
                                Validator.isNumber('#number-room'),
                                ]
                            }) 

                        </script>
                    </div>
                </div>
            </div>
            <div class=" booking__item two_item col l-6 m-12 c-12">
                <div class="booking_header">
                    <h3 class="title_box">Tin tức nổi bật</h3>
                </div>
                <div class="bookingbody">
                    <div class="media row no-gutters">
                        <div class="media_img col l-4"><img src="../img/2.png" alt=""></div>
                        <div class="media_body col l-8">
                        
                            <h5>Khách sạn Mializa Hotel là chuỗi khách sạn tình yêu được phân bổ trên toàn thủ đô Hà nội</h5>
                            <p>Khách sạn MiaLiza  Hotel là chuỗi khách sạn tình yêu được phân bổ trên toàn thủ đô Hà nội </p>
                        </div>
                    </div>
                    <div class="intro_genar row no-gutters">
                        
                        <a href="" class="col l-12">
                        <?php
                        $sql = "SELECT *
                                FROM baiviet
                                LIMIT 6;
                        ";
                        $danhsach = $connect->query($sql);
                        //Nếu kết quả kết nối không được thì xuất báo lỗi và thoát
                        if (!$danhsach) {
                            die("Không thể thực hiện câu lệnh SQL: " . $connect->connect_error);
                            exit();
                        }
                        while ($row = $danhsach->fetch_array(MYSQLI_ASSOC)) 		
                        {
                            echo "<a href=\"index.php?do=baiviet_chitiet&id=".$row["MaBaiViet"]."\"><i class=\"fa-solid fa-check\"></i>".$row["TieuDe"]."</a>";
                        }
                    ?>
                        </a>
                    </div>
                    
                </div>
              
            </div>
            <div>

            </div>
        </div>
    </div>

    <!-- // intro_branch -->
    <div class="intro_branch grid wide">
        <h2 class="_title fronText">HỆ THỐNG CHI NHÁNH KHÁCH SẠN HM</h2>
        <div class="grid wide">
            <div class="row">
                    <?php 
                        include "intro_branch.php";
                    ?>
                </div>
            </div>
        </div>
       
    </div>


      <!-- Top khách sạn -->
    <div class="hotel-highlights grid  ">
        <div class="grid wide">
            <h2 class="_title fronText">KHÁCH SẠN NỔI BẬT</h2>
            <P class = "sub-title fronText">Một số khách sạn nổi bật của HM</P>
            <div class="row">
               <?php
                    include "./hotel_highlights.php";
                ?>
            </div>
        </div>
    </div>
    
        <div class="service grid wide">
            <h2 class="title">
                DỊCH VỤ - TIỆN NGHI
            </h2>
            <P class="title-sub">Dịch vụ nhà hàng, karaoke, coffee, phòng họp,... tại HM Hotel</P>
            <div class="row">
                
                <div class="col l-3">
                    <div class="tap_service_mains">
                        <a class="tap_service-item active"  href="#">GYM</a>
                        <a class="tap_service-item " href="#">VISA</a>
                        <a class="tap_service-item " href="#">Dịch Vụ Phòng Hộp</a>
                        <a class="tap_service-item " href="#">Thuê Xe</a>
                        <a class="tap_service-item " href="#">Nhà Hàng</a> 
                    </div>
                
                </div>
            
               <div class="col l-9">
                    <div class="tap_service_contains ">
                    <div class="contains_item active">
                        <div class="row">
                            <div class="item-img col l-4">
                                <img src="../images/gym.jpg" alt="">
                            </div>
                            <div class="item_body col l-8">
                                
                                <h3 class="title fronText">
                                    GYM
                                </h3>
                                <p class="content fronText">
                                    Một phòng tập thể dục năng động với trang thiết bị công nghệ cao để căng cơ và thư giãn trong phòng xông hơi và tháp Jacuzzi để bắt đầu và kết thúc một ngày bận rộn. Phòng Tập Thể Hình GYM  tại ROSALIZA INTERNATIONAL HOTEL với trang Thiết Bị Chuyên Nghiệp Đạt Chuẩn 100% USA . 
                                </p>
                                <a class = "btn fronText" >Xem thêm</a>
                            </div>
                        </div>
                    </div>
                    <!-- visa -->
                    <div class="contains_item ">
                        <div class="row">
                            <div class="item-img col l-4">
                                <img src="../images/visa.jpg" alt="">
                            </div>
                            <div class="item_body col l-8">
                                <h3 class="title fronText">
                                VISA
                                </h3>
                                <p class="content fronText">
                                What is a `Visa on Arrival?: this is most likely the easiest way to obtain your visa without having to chase down embassies, consulates and the like prior to your trip, and is a valid alternative when applying for a tourist visa.
                                </p>
                                <a class = "btn fronText" >Xem thêm</a>
                            </div>
                        </div>
                    </div>
                    <!-- phòng hộp -->
                    <div class="contains_item ">
                        <div class="row">
                            <div class="item-img col l-4">
                                <img src="../images/phonghop.jpg" alt="">
                            </div>
                            <div class="item_body col l-8">
                                <h3 class="title fronText">
                                Dịch Vụ Phòng họp
                                </h3>
                                <p class="content fronText">
                                You come to Hanoi to prepare for an event and to find a place to rent meeting rooms, meeting with partners to completely eliminate a job to find a venue for this important event at Rosaliza Hotel. Guests can rent a meeting room at the hotel you will really feel satisfied by all that Rosaliza brings. A luxurious design style, friendly reception space,
                                </p>
                                <a class = "btn fronText" >Xem thêm</a>
                            </div>
                        </div>
                    </div>
                    <!-- Thuê xe  -->
                    <div class="contains_item ">
                        <div class="row">
                            <div class="item-img col l-4">
                                <img src="../images/visa.jpg" alt="">
                            </div>
                            <div class="item_body col l-8">
                                <h3 class="title fronText">
                                Thuê xe
                                </h3>
                                <p class="content fronText">
                                - Dịch vụ thuê xe oto và xe máy đi theo ngày <br>
                                - Dịch vụ thuê xe đón Nội Bài về khách sạn và từ khách sạn đi Nội Bài
                                </p>
                                <a class = "btn fronText" >Xem thêm</a>
                            </div>
                        </div>
                    </div>
                    <!-- Nhà hàng -->
                    <div class="contains_item ">
                        <div class="row">
                            <div class="item-img col l-4">
                                <img src="../images/nhahang.jpg" alt="">
                            </div>
                            <div class="item_body col l-8">
                                <h3 class="title fronText">
                                Nhà hàng
                                </h3>
                                <p class="content fronText">
                                Nhà hàng Rosaliza  thuộc Khách sạn Rozaliza Hà Nội  có vị trí tại tầng 3 trong khuôn viên khách sạn cao 14 tầng nhà hàng chuyên phục vụ các món ăn Âu, Á, và truyền thống Việt Nam trong một bầu không khí sang trọng, ấm cúng có không gian nhìn ra con phố cổ Trần Quốc Toản.
                                </p>
                                <a class = "btn fronText" >Xem thêm</a>
                            </div>
                        </div>
                    </div>
                    </div>
                </div>
                <script src="../Js/tabService.js"></script>
            </div>