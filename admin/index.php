<?php

// Require file Common
require_once '../commons/env.php'; // Khai báo biến môi trường
require_once '../commons/function.php'; // Hàm hỗ trợ

// Require toàn bộ file Controllers
require_once './controllers/AdminDanhMucController.php';
require_once './controllers/AdminSanPhamController.php';
require_once './controllers/AdminTaiKhoanController.php';
require_once './controllers/AdminDonHangController.php';

// Require toàn bộ file Models
require_once './models/AdminSanPham.php';
<<<<<<< HEAD
require_once './models/AdminDanhMuc.php';
require_once './models/AdminTaiKhoan.php';
require_once './models/AdminDonHang.php';
=======
require_once './models/AdminDanhMuc.php'; 
>>>>>>> f77c45ed31495c0404f484f2b92805e767ecf052

// Route
$act = $_GET['act'] ?? '/';

// Để bảo bảo tính chất chỉ gọi 1 hàm Controller để xử lý request thì mình sử dụng match

match ($act) {
     //route Danh Muc
     'danh-muc' => (new AdminDanhMucController())->danhSachDanhMuc(),
     'form-them-danh-muc' => (new AdminDanhMucController())->formAddDanhMuc(),
     'them-danh-muc' => (new AdminDanhMucController())->postAddDanhMuc(),
     'form-sua-danh-muc' => (new AdminDanhMucController())->formEditDanhMuc(),
     'sua-danh-muc' => (new AdminDanhMucController())->postEditDanhMuc(),
     'xoa-danh-muc' => (new AdminDanhMucController())->deleteDanhMuc(),
<<<<<<< HEAD
    
   



   // route quản lý đơn hàng
   'don-hang' =>(new AdminDonHangController())->danhSachDonHang(),
//    'chi-tiet-don-hang' => (new AdminDonHangController())->detailDonHang(),
//    'form-sua-don-hang' => (new AdminDonHangController())->formEditDonHang(),
//      'sua-don-hang' => (new AdminDonHangController())->postEditDonHang(),
//    'chi-tiet-don-hang' => (new AdminDonHangController())->detailDonHang(),

 
     

   

      

   

     // route quản lý tài khoản
     // Quản lý tài khoản quản trị
     'list-tai-khoan-quan-tri' =>(new AdminTaiKhoanController())->danhSachQuanTri(),
     'form-them-quan-tri' =>(new AdminTaiKhoanController())->formAddQuanTri(),
     'them-quan-tri' =>(new AdminTaiKhoanController())->postAddQuanTri(),
     'form-sua-quan-tri' =>(new AdminTaiKhoanController())->formEditQuanTri(),
     'sua-quan-tri' =>(new AdminTaiKhoanController())->postEditQuanTri(),


      // route resert password tài khoản
     'resert-password' =>(new AdminTaiKhoanController())->resertPassword(),

     // route quản lý tài khoản khách hàng
     'list-tai-khoan-khach-hang' =>(new AdminTaiKhoanController())->danhSachKhachHang(),
     'form-sua-khach-hang' =>(new AdminTaiKhoanController())->formEditKhachHang(),
     'sua-khach-hang' =>(new AdminTaiKhoanController())->postEditKhachHang(),
     'chi-tiet-khach-hang' =>(new AdminTaiKhoanController())->detailKhachHang(),



     default => 'Trang không tồn tại', 
=======

      // route sản phẩm
    'san-pham'=> (new AdminSanPhamController())->danhSachSanPham(),
    'form-them-san-pham'=> (new AdminSanPhamController())->formAddSanPham(),
    'them-san-pham'=> (new AdminSanPhamController())->postAddSanPham(),
    'form-sua-san-pham'=> (new AdminSanPhamController())->formEditSanPham(),
    'sua-san-pham'=> (new AdminSanPhamController())->postEditSanPham(), 
    'sua-album-anh-san-pham'=> (new AdminSanPhamController())->postEditAnhSanPham(), 
    'xoa-san-pham'=> (new AdminSanPhamController())->deleteSanPham(),
     'chi-tiet-san-pham'=> (new AdminSanPhamController())->detailSanPham(),
>>>>>>> f77c45ed31495c0404f484f2b92805e767ecf052
};
