<?php

// Kết nối CSDL qua PDO
function connectDB() {
    $host = DB_HOST;
    $port = DB_PORT;
    $dbname = DB_NAME;

    try {
        $conn = new PDO("mysql:host=$host;port=$port;dbname=$dbname", DB_USERNAME, DB_PASSWORD);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    
        return $conn;
    } catch (PDOException $e) {
        echo ("Connection failed: " . $e->getMessage());
    }
}

// Hàm xóa lỗi session
function deleteSessionErrors() {
    if (isset($_SESSION['flash'])) {
        unset($_SESSION['flash']);
        unset($_SESSION['errors']);
        unset($_SESSION['thongBao']);
        unset($_SESSION['old_data']);
        unset($_SESSION['successMk']);
        unset($_SESSION['successTt']);
        unset($_SESSION['successAnh']);
        unset($_SESSION['errorsKH']);
        unset($_SESSION['tong']);
        unset($_SESSION['layMk']);
        unset($_SESSION['dat_hang_thanh_cong']);
    }
}

// Hàm format ngày
function formatDate($date) {
    echo date("d-m-Y", strtotime($date));
}
