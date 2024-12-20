<!DOCTYPE html>
<html lang="en">

<head>
     <meta charset="UTF-8" />
     <meta name="viewport" content="width=device-width, initial-scale=1.0" />
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />
     <link rel="stylesheet" href="public/css/style.css" />
     <link rel="stylesheet" href="public/css/contact.css" />
     <link rel="stylesheet" href="public/css/pay.css">
     <link rel="stylesheet" href="public/css/category.css">
     <link rel="stylesheet" href="public/css/detail.css">
     <link rel="stylesheet" href="public/css/gt.css">
     <link rel="stylesheet" href="public/css/cart.css">
     <link rel="stylesheet" href="public/css/login_register.css">
     <link rel="preconnect" href="https://fonts.googleapis.com" />
     <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
     <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300..700&display=swap" rel="stylesheet" />
     <title>Nông Sản Sạch KKT</title>
</head>

<body>
     <header>
          <div class="header-top">
               <section class="header-top-logo">
                    <a href="<?= BASE_URL . '?act=/' ?>">
                         <img src="public/img/Group 177 1.png" alt="" />
                    </a>
               </section>
               <section class="header-control">
                    <div class="item header-address">
                         <i class="fas fa-map-marker-alt"></i>
                         <span>Cửa hàng gần bạn</span>
                    </div>
                    <a href="cart.php">
                         <div class="item header-cart">
                              <i class="fas fa-shopping-cart"></i>
                             <a href="<?= BASE_URL . '?act=gio-hang' ?>">Giỏ hàng</a>
                         </div>
                    </a>
                    <a href="cart.php">
                         <div class="item header-cart">
                             <a class="increase">Tài khoản: <?php if (isset($_SESSION['user_client'])) {
                                        echo $_SESSION['user_client'];
                                   } ?></a> 
                                  
                         </div>
                    </a>
                    <div class="item header-user">
                         <i class="far fa-user"></i>
                         <span> Quản lý tài khoản</span>
                         <ul class="user-submenu">

                               <?php
                                                if (!isset($_SESSION['user_client'])) { ?>
                                                  <li><a href="<?= BASE_URL . '?act=login' ?>">Đăng nhập</a></li>
                                                  <li><a href="<?= BASE_URL .'?act=form-dang-ki'?>">Đăng ký</a></li>
                                                  <li><a href="<?= BASE_URL_ADMIN?>">Đăng nhập Admin</a></li>
                                              <?php } else { ?>
                                                  
                                                  </label>
                                                  <li><a href="<?= BASE_URL .'?act=quan-ly-tai-khoan'?>">Tài khoản</a></li>
                                                  <li><a href="<?= BASE_URL .'?act=lich-su-mua-hang'?>">Đơn hàng</a></li>
                                                  <li><a href="<?= BASE_URL .'?act=quen-mat-khau'?>">Quên mật khẩu</a></li>
                                                  <li><a href="<?= BASE_URL . '?act=logout' ?>">Đăng xuất</a></li>

                              <?php } ?>
                         </ul>
                    </div>
               </section>
          </div>
          <div class="header-menu">
               <section class="header-menu__control">
                    <ul class="menu-item">


                         <li><a href="<?= BASE_URL .'?act=/' ?>">Trang chủ</a></li>
                         <li><a href="<?= BASE_URL . '?act=gt' ?>">Giới thiệu</a></li>


                         <li class="header-product">
                              <a href="<?= BASE_URL . '?act=danh-muc-san-pham'?>">Sản phẩm</a>
                              <ul class="submenu">
                                   <li><a href="#">Rau củ</a></li>
                                   <li><a href="#">Hải sản</a></li>
                                   <li><a href="#">Nước ép</a></li>
                              </ul>
                         </li>



                         <li><a href="<?= BASE_URL .'?act=contact' ?>">Liên hệ</a></li>

     



                    </ul>
               </section>
               <section class="header-search">
                    <i class="fas fa-search"></i>
                    <input type="text" placeholder="Search..." />
               </section>
          </div>
     </header>
</body>