<?php 
session_start();

// Require file Common
require_once './commons/env.php'; // Khai báo biến môi trường
require_once './commons/function.php'; // Hàm hỗ trợ

// Require file controller
require_once './controllers/HomeController.php';
require_once './controllers/TaiKhoanController.php';

// Require file models
require_once './models/TaiKhoan.php';
require_once './models/SanPham.php';

$act = $_GET['act'] ?? '/';

 match ($act) {
    '/' => (new HomeController())->home(), 
    'contact'=>(new HomeController())->contact(),  
    'chi-tiet-san-pham' =>(new HomeController())->chiTietSanPham(),

    // GIO HANG
    

    // LOGIN
    'login' => (new TaiKhoanController())->formLogin(), 
    'check-login' => (new TaiKhoanController())->postLogin(), 
    'form-dang-ki' =>(new TaiKhoanController())->formDangKy(),
    'dang-ky' =>(new TaiKhoanController())->dangKy(),
    'logout' =>(new TaiKhoanController())->logout(),
    'quen-mat-khau' =>(new TaiKhoanController())->quenMatKhau(),
    'lay-mat-khau' =>(new TaiKhoanController())->layMatKhau(),
    'quan-ly-tai-khoan' =>(new TaiKhoanController())->suaTaiKhoan(),
    'sua-thong-tin-ca-nhan' =>(new TaiKhoanController())->suaThongTinCaNhan(),
    'sua-mat-khau' =>(new TaiKhoanController())->suaMatKhau(),
    'sua-anh-tai-khoan' =>(new TaiKhoanController())->suaAnhTaiKhoan(),
    default => 'Action không hợp lệ', // Trường hợp mặc định
};