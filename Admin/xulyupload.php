<?php
    include "../Client/cauhinh.php";
    session_start();
    if(isset($_POST['myFileIMG']))
    {
        echo '<script>
        alert("vui long chon hinh ");
        window.history.back();
        </script>';
        exit;
    }
    if($_FILES["myFileIMG"]["error"] > 0)
    {
        echo '<script>
        alert("vui long chon hinh ");
        window.history.back();
        </script>';
        exit;
    }
    else 
    {
        //echo "xóa";
       // $user= $users->fetch_array(MYSQLI_ASSOC); 
        $path = "../upload/".$_SESSION["Img"];
        //echo $path;
        unlink($path);

        move_uploaded_file($_FILES["myFileIMG"]["tmp_name"], "../upload/" . $_FILES["myFileIMG"]["name"]);
          $img=$_FILES["myFileIMG"]["name"];
                
				$userid=$_SESSION['MaND'];
                $sql_kiemtra = "UPDATE `user` SET `Img`='$img' WHERE `MaNguoiDung`='$userid'";
                
                $danhsach = $connect->query($sql_kiemtra);
                
                if (!$danhsach) {
                    die("Không thể thực hiện câu lệnh SQL: " . $connect->connect_error);
                    exit();
                }
                else{
                    $_SESSION['Img']=$_FILES["myFileIMG"]["name"];
                    header("Location: index.php");
                }
    }
       
?>	