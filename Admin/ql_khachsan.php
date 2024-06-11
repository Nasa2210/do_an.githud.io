<?php 
    include "../Client/cauhinh.php";
    $sql = "SELECT * FROM `chuoikhachsan`";
    $danhsach = $connect->query($sql);
    if(!$danhsach)
    {
        echo "Error:" . $sql;
        exit();
    }
?>
<div class="main_manager-hotel" >
    <div class="list_hotel-header ">
        <div class="row no-gutters ">
            <h3 class="title l-12">
                Quản Lý Khách Sạn
            </h3>
            <div class="header-body  l-12">
                <div class="row no-gutters ">
                    <div class="choose  l-6">
                        <form action="./index.php?do=them_khachsan" method="post">
                            <div class="row no-gutters">
                                <label class = "col l-12" for="select_list-hotel">Chọn chổi khách sạn:</label>
                                <select class = "col l-12"name="select_list-hotel" id="select_list-hotel">
                                    <option value="0">----chọn----</option>
                                    <?php 
                                        while($row = $danhsach->fetch_array(MYSQLI_ASSOC))
                                        {
                                            echo "<option value =".$row["MaChuoi"].">".$row["TenChuoi"]."</option>"; ;
                                        }
                                    ?>
                                </select>
                                <button id="btnAdd" class = "col l-2 l-o-7" type="submit"><i class="fa-solid fa-plus"></i></button>
                            </div>
                        </form>
                    </div>
                    <div class="infor l-5">
                        <div class="row">
                            <div class="infor_avartar l-3" id="infor_avatar-hotel">
                                
                            </div>
                        
                            <div class="number l-10">

                                <h4  >
                                    Số lượng khách sạn của chuổi: 
                                </h4>
                                <p style="font-size: 18px;">
                                </p>
                            </div>
                    
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <div class="list_hotel-body">
        <h3>
            Danh sách các khách sạn:
        </h3>
        <div class="list_hotel-main row">

            <div class="hotel-element col l-6">
                <div class="warper">
                    <div class="row no-gutters ">
                        <div class="avatar l-3">
                            <img src="" alt="">
                        </div>
                        <div class="infor l-9">
                            <h3>Tên KS</h3>
                            <p>Xếp loai:</p>
                            <p>Địa chỉ:</p>
                            <a href="">Sdt:</a>
                            <div class = "action">

                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="hotel-element col l-6">
                <div class="warper">
                    <div class="row  ">
                        <div class="avatar l-3">
                            <img src="" alt="">
                        </div>
                        <div class="infor l-9">
                            <h3>Tên KS</h3>
                            <p>Xếp loai:</p>
                            <p>Địa chỉ:</p>
                            <a href="">Sdt:</a>
                            <div> hd</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
</div>
