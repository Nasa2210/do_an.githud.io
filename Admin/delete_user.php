<?php
    include "../Client/cauhinh.php";
    $mandid=$_GET['id'];
    $sql_check_user = "SELECT * FROM baiviet bv WHERE MaNguoiDung = '$mandid'";
   // echo $sql_check_user;
    if($connect->query($sql_check_user)->fetch_array(MYSQLI_ASSOC))
    {
        //echo "co ". $mandid;
        $sql_delete_content = "DELETE FROM baiviet  WHERE MaNguoiDung = '$mandid' ";
        if($connect->query($sql_delete_content))
        {
           // echo "da xoa";
             delete_user($mandid);
        }
    }else 
    {
        echo "ko có bài ";
            delete_user($mandid);
    }
    
    function delete_user($mandid)
    {
        include "../Client/cauhinh.php";
        $sql_kiemtra = "DELETE FROM `user` WHERE `MaNguoiDung`='$mandid'";
		$users = $connect->query("SELECT * FROM `user` WHERE `MaNguoiDung`='$mandid' ");
		$danhsach = $connect->query($sql_kiemtra);
		if (!$danhsach) {
			die("Không thể thực hiện câu lệnh SQL: " . $sql_kiemtra);
			exit();
		}
        else{
            if(isset($users))
            {
                //echo "xóa";
                $user= $users->fetch_array(MYSQLI_ASSOC); 
                $path = "../upload/".$user["Img"];
                //echo $path;
                unlink($path);
            }
            if($_SESSION['MaND'] == $mandid )
            {
                session_unset();
                header("Location: login.php");
            }else
            header("Location: index.php?do=user");
       }
    }
?>