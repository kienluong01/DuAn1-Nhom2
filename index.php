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


$act = $_GET['act'] ?? '/';s

match ($act){
    // '/' => (new HomeController())->home(), // trường hợp đặc biệt
    'login'=> (new TaiKhoanController())->formLogin(),
    'check-login'=>(new TaiKhoanController())->postLogin(),
};

