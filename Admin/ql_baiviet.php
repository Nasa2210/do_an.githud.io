<?php 
    include "../Client/cauhinh.php";
    $key = $_SESSION['MaND'];
    $law = $_SESSION['Quyen'];
    // show list content of user 
    $sql_list_content = "SELECT * FROM baiviet bv, chude cd, user s where cd.MaChuDe = bv.MaChuDe AND bv.MaNguoiDung = s.MaNguoiDung";
    $list = $connect->query($sql_list_content);
    if(!$list)
    {
        die("Error: ". $connect->error); 
    }else
    {
?>
<div class="main_list-content">
    <div class="title">
        <h3>Danh sánh bài viết</h3>
    </div>
    <div class="button_insert">
        <a href="index.php?do=them_baiviet"> <i class="fa-sharp fa-solid fa-plus"></i> Đăng bài</a>
    </div>
    <table>
        <tr>
            <th>
                <p>Mã BV </p>
            </th>
            <th>
                <p>Tiêu đề</p>
            </th>
            <th>
                <p>Chủ đề</p>
            </th>
            <th>
                <p>Người đăng</p>
            </th>
            <th><p>
                Hành động
            </p></th>
        </tr>
        
        <?php 
        while ($row = $list->fetch_array(MYSQLI_ASSOC))
        {
            echo " <tr>";
            echo "  <td>";
            echo "     <p>".$row["MaBaiViet"]."</p>";
            echo " </td>";
            echo " <td>";
            echo "      <p>".$row["TieuDe"]."</p>";
            echo "  </td>";
            echo "  <td>";
            echo "      <p>".$row["TenChuDe"]."</p>";
            echo "   </td>";
            echo "   <td>";
            echo "       <p>".$row["TenNguoiDung"]."</p>";
            echo "   </td>";
            echo "   <td class=\"\">";
                if($row["KiemDuyet"] == 1)
                {
                    echo "<a href=\"index.php?do=kiemduyet&id=".$row['MaBaiViet']."\"><img src=\"../images/ban.png\" alt=\"\"></a>";
                }
                else 
                    echo "<a href=\"index.php?do=kiemduyet&id=".$row['MaBaiViet']."\"><img src=\"../images/active.png\" alt=\"\"></a>";
            echo "      
                        <a href='index.php?do=sua_baiviet&id=" . $row["MaBaiViet"] . "'><img src='../images/edit.png' /></a>
                        <a href='index.php?do=xoa_baiviet&id=" . $row["MaBaiViet"] . "' onclick='return confirm(\"Bạn có muốn xóa bài viết không\")'><img src='../images/delete.png' /></a>";
            echo " </td>";
            echo "</tr>";
        }
        ?>


    </table>
    <?php }?>
</div>