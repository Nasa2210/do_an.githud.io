<div class="br_firt" id = "br_firt">
    <?php
        include "../Client/cauhinh.php";
        $key = $_POST['id'];
        $stmt = $pdo->prepare("SELECT ks.`MaKhachSan`,ks.`TenKhachSan` FROM KhachSan ks WHERE ks.MaChuoi =".$key);	
        $stmt->execute();
        while ($dong = $stmt->fetch(PDO::FETCH_ASSOC)){
            $stmt1 = $pdo->prepare("SELECT COUNT(ks.`MaKhachSan`)as'tongphong' from KhachSan ks, Phong p WHERE ks.`MaKhachSan` = p.`MaKhachSan` AND ks.`TenKhachSan`=:value");
            $stmt1->bindParam(':value', $dong['TenKhachSan']);
            $stmt1->execute();
            $dong1 = $stmt1->fetch(PDO::FETCH_ASSOC);
            
            $_SESSION['MaKS'.$dong['MaKhachSan'].''] = $dong['MaKhachSan'];
            echo  "<div class=\"room_mylist\">
            <i class=\"fa-solid fa-hotel\"></i>
            <a id=\"aroom_mylist\"class=\"myLink\" data-target=\"hienthiphong.php?do=&id=".$dong['MaKhachSan']."\">".$dong['TenKhachSan']."</a>
            <span>" .$dong1['tongphong']."</span>
        </div>";
        }
    ?>

</div>
<div class="br_second" id="br_second">
    
</div>
            <script>
                 const links = document.querySelectorAll('.myLink');
  
  //Thêm sự kiện click vào từng phần tử a
            links.forEach(link => {
                link.addEventListener('click', function(event) {
                // Ngăn chặn hành động mặc định của phần tử a
                event.preventDefault();
                // Lấy đường dẫn của file PHP tương ứng
                const target = this.getAttribute('data-target');
                //  console.log(target);
                // Lấy nội dung của file PHP tương ứng bằng phương thức fetch()
                fetch(target)
                    .then(response => response.text())
                    .then(data => {
                    // Gán nội dung của file PHP vào phần tử HTML
                    console.log(data);
                    const content = document.getElementById('br_second');
                    content.innerHTML = data;
                   
                    });
                });
            });
            var linksroom = document.querySelectorAll(".myLink");
            for (var i = 0; i < linksroom.length; i++) {
                linksroom[i].addEventListener("click", function() {
                    // Xóa lớp active của các thẻ <a> khác
                    for (var j = 0; j < linksroom.length; j++) {
                        linksroom[j].classList.remove("active");
                    }
            
                    // Gán lớp active cho thẻ <a> được nhấp chuột
                    this.classList.add("active");
                });
            }
          
            </script>