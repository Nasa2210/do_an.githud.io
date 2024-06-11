<?php
    include "../Client/cauhinh.php";
	$sql = "SELECT * FROM chude";
    $danhsach = $connect->query($sql);
    $id = isset($_GET['id'])? $_GET['id'] : 0 ;
?>
<div class="main_list-topic grid wide">
    <h1>Danh sách các chủ đề bài viết </h1>
    <div class="row">
        <div class="list_topic col l-10 l-o-1">
            <div class="row">
                <div class="topic-right col l-6 grid ">
                    <table class="table-topic">
                        <tr class="topic-title">
                            <th>
                                <p>Mã Chủ đề</p>
                            </th>
                            <th>
                                <p>Tên chủ đề</p>
                            </th>
                            <th> Hành động</th>
                        </tr>
                        <?php 
                        while($row = $danhsach->fetch_array(MYSQLI_ASSOC))
                        {
                            echo "<tr>";
                            echo "    <td>".$row["MaChuDe"]."</td>";
                            echo "    <td>".$row["TenChuDe"]."</td>";
                            echo "    <td><a href='index.php?do=ql_chude&id=" . $row["MaChuDe"] . "'><img src='../images/edit.png' /></a>
                                        <a href='index.php?do=xoa_chude&id=" . $row["MaChuDe"] . "' onclick='return confirm(\"Bạn có muốn xóa chủ đề " . $row['TenChuDe'] . " không?\")'><img src='../images/delete.png' /></a> </td>" ;
                        }
                        ?>
                    </table>
                </div>
                <div class="topic-left col l-6">
                    <?php 
                        if($id!= 0 )
                        {
                            $sql_getchude = "SELECT * FROM chude WHERE MaChuDe = ".$id;
                            $topic = $connect->query($sql_getchude);
                            if(!$topic)
                            {
                                die("Lỗi: ". $connect->error);
                                exit();
                            }
                            else 
                            {
                                $infor = $topic->fetch_array(MYSQLI_ASSOC)
                    ?> 
                    <form action="" method="post" id="topic-form">
                        <h3>Sửa chủ đề bài viết</h3>
                        <div class="form_group">
                            <label for="topic-id">Mã chủ đề</label>
                            <input type="text" id="topic-id" value="<?php echo $infor['MaChuDe']?>" disabled>
                        </div>
                        <div class="form_group">
                            <label for="topic-name">Tên chủ đề</label>
                            <input class = "form-control" type="text" id="topic-name" value="<?php echo $infor['TenChuDe']?>">
                            <span class="form-message"></span>
                        </div>
                        <button type="submit">Sửa</button>
                    </form>
                    <a href="index.php?do=ql_chude" class="btn-insert">Thêm Chủ Đề</a>
                    <?php } }
                    else {
                    ?>
                    
                    <form action="them_chude-submit.php" class= "insert-form" method="post" id="topic-form">
                        <h3>Thêm chủ đề bài viết</h3>
                        <div class="form_group">
                            <label for="topic-id">Mã chủ đề</label>
                            <input type="text" id="topic-id" value="" disabled>
                        </div>
                        <div class="form_group">
                            <label for="topic-name">Tên chủ đề</label>
                            <input class = "form-control" type="text" id="topic-name" name = "topic-name" value="">
                            <span class="form-message"></span>
                        </div>
                        <button type="submit">Thêm</button>
                    </form>
                    <?php 
                    }?>
                </div>
                <script src="../Js/validator.js"></script>
                <script>
                     Validator({
                                form: '#topic-form',
                                orrorSelector: '.form-message',
                                formGroupSelector: '.form_group' ,
                                rules: [
                                Validator.isRequired('#topic-name'),
                                ]
                            }) 
                </script>
            </div>
        </div>
    </div>
</div>