<?php
     include "../Client/cauhinh.php";
?>
<div class="main_quanlroom" >
    <div class="header_room">
        <form action="index.php?do=insertphong" method="post">
        <div class="hr_firt">
            <p>Quản lý phòng</p>
            <div class="select_chuoi">
                <select name="chuoi" id="select_chuoiKS">
                    <option value="0"> ---- chon ---</option>
                    <?php 
                        $sql = "SELECT * FROM chuoikhachsan ";
                        $danhsach = $connect -> query($sql);
                        while ($row = $danhsach->fetch_array(MYSQLI_ASSOC))
                        {
                            echo "<option value= ".$row["MaChuoi"].">".$row["TenChuoi"]."</option>";
                        }
                    ?>
                </select>
            </div>
            <div class="menuroom">
                
            <div class="menu_iconroom ">
                <i id="my_menu" class="fa-solid fa-bars"></i>
                 <div  id = "nav_menuroo"class="nav_menuroom ">
                    <button type="submit"  >Thêm Phòng</button>
                </div>
                
            </div>
                
            </div>
        </div>
        </form>
        <div class="hr_second">
            <div class="icon_trangthairoom"><p></p><span>:Trống</span></div>
            <div class="icon_trangthairoom"><p></p><span>:Đang ở</span></div>
            <div class="icon_trangthairoom"><p></p><span>:Đặt cọc</span></div>
                        
        </div>
       
      
    </div>
    <div class="form_room"></div>
    <div class="body_room">
           
            
    </div>
 
    <script type="module" >
        import {myAjax} from "../handle/ajax.js";
        myAjax('.main_quanlroom .header_room #select_chuoiKS',".main_quanlroom .body_room", "../handle/handle_change_body-room.php" );
    </script>
    
</div>
