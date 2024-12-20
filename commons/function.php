<?php

// Kết nối CSDL qua PDO
function connectDB()
{
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
function deleteSessionErrors()
{
    if (isset($_SESSION['flash'])) {
        unset($_SESSION['flash']);
        unset($_SESSION['errors']);
        unset($_SESSION['thongBao']);
        unset($_SESSION['thongBaoDN']);
        unset($_SESSION['old_data']);
        unset($_SESSION['success']);
        unset($_SESSION['successTt']);
        unset($_SESSION['successAnh']);
        unset($_SESSION['errorsKH']);
        unset($_SESSION['tong']);
        unset($_SESSION['layMk']);
        unset($_SESSION['dat_hang_thanh_cong']);
        session_unset();
        session_destroy();
    }
}

// Hàm format ngày
function formatDate($date)
{
    echo date("d-m-Y", strtotime($date));
}

function uploadFileAlbum($file, $folderUpload, $key)
{
    $pathStorage = $folderUpload . time() . $file['name'][$key];
    $from = $file['tmp_name'][$key];
    $to = PATH_ROOT . $pathStorage;
    if (move_uploaded_file($from, $to)) {
        return $pathStorage;
    }
    return null;
}
function deleteFile($file)
{
    $pathDelete = PATH_ROOT . $file;
    if (file_exists($pathDelete)) {
        unlink($pathDelete);
    }
}
function uploadFile($file, $folderUpload)
{
    $pathStorage = $folderUpload . time() . $file['name'];
    $from = $file['tmp_name'];
    $to = PATH_ROOT . $pathStorage;
    if (move_uploaded_file($from, $to)) {
        return $pathStorage;
    }
    return null;
}

function checkLoginAdmin()
{
    if (!isset($_SESSION['user_admin'])) {
        //không có session thì redirect về trang login
        // header("Location: " . BASE_URL_ADMIN . '?act=login-admin');
        require_once './views/auth/formLogin.php';
        exit();
    }
}
function formatPrice($price){
    return number_format($price, 0, ',', '.');
}