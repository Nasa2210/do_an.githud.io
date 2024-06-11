<?php
include "../Client/cauhinh.php";

// Get POST data
$fullName = $_POST["full_name"];
$numberPhone = $_POST["number_phone"];
$email = $_POST["email"];
$maChuoiKS = $_POST["select_branch"];
$MaKS = $_POST["select_hotel"];
$typeRoom = $_POST["select_type-room"];
$date_come = $_POST["date_come"];
$date_leave = $_POST["date_leave"];
$note = $_POST["note"];
$soluong = $_POST["number-room"];
$today = date('Y-m-d');

// Prepare and execute customer insert statement
$sql_insertKH = $connect->prepare("INSERT INTO `khachhang`(`HoTen`, `Sdt`, `Email`) VALUES (?, ?, ?)");
$sql_insertKH->bind_param("sss", $fullName, $numberPhone, $email);

if ($sql_insertKH->execute()) {
    $maKhachHang = $connect->insert_id; // Get last inserted ID

    // Prepare and execute booking insert statement
    $sql_insertBooking = $connect->prepare("INSERT INTO `datphong`(`MaKhachSan`, `MaLoaiPhong`, `MaKhachHang`, `NgayDat`, `NgayNhan`, `NgayTra`, `GhiChu`, `SoLuong`, `TrangThai`) VALUES (?, ?, ?, ?, ?, ?, ?, ?, 0)");
    $sql_insertBooking->bind_param("iiissssi", $MaKS, $typeRoom, $maKhachHang, $today, $date_come, $date_leave, $note, $soluong);

    if ($sql_insertBooking->execute()) {
        header("Location: ../Client/index.php");
        exit;
    } else {
        echo '<script>
            alert("Error inserting booking");
            window.history.back();
        </script>';
        exit;
    }
} else {
    echo '<script>
        alert("Error inserting customer");
        window.history.back();
    </script>';
    exit;
}
?>
