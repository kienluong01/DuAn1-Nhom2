<?php require_once './views/header.php' ?>
<main>
     <section class="banner-title-login">
          <img src="public/img/bg_breadcrumb.jpg" alt="" />
          <div class="breadcrumb-login">
               <a href="">Trang chủ</a> 
               <a href="">Đăng ký tài khoản</a>
          </div>
          <div class="row">
          <?php if (isset($_SESSION['thongBao'])): ?>
    <script type="text/javascript">
        alert("<?php echo $_SESSION['thongBao']; ?>");
    </script>
    <?php unset($_SESSION['thongBao']); // Xóa session thongBao sau khi hiển thị ?>
<?php endif; ?>

          </div>
          <div class="title-login">
               <p>ĐĂNG KÝ TÀI KHOẢN</p>
          </div>
     </section>
     <section class="content-login">
     <form action="<?= BASE_URL . '?act=dang-ky' ?>" method="POST" enctype="multipart/form-data">
               <h1>Đăng ký</h1>
               <p class="desc-login">
                    Nếu bạn đã có tài khoản, đăng nhập
                    <a href="<?= BASE_URL . '?act=login' ?>">tại đây</a>
               </p>
               <input type="text" placeholder="Họ và tên"  id="ho_ten" name="ho_ten" value="<?= isset($_SESSION['old_data']['ho_ten']) ? $_SESSION['old_data']['ho_ten'] : '' ?>" /> <br />
               <?php if (isset($_SESSION['errors']['ho_ten'])) { ?>
                                        <p class="text-danger"><?= $_SESSION['errors']['ho_ten'] ?></p>
                                    <?php } ?>
               <input type="text" placeholder="Email" id="email" name="email" value="<?= isset($_SESSION['old_data']['email']) ? $_SESSION['old_data']['email'] : '' ?>" /> <br />
               <?php if (isset($_SESSION['errors']['email'])) { ?>
                                        <p class="text-danger"><?= $_SESSION['errors']['email'] ?></p>
                                    <?php } ?>
               <input type="text" placeholder="Số điện thoại"  id="so_dien_thoai" name="so_dien_thoai" value="<?= isset($_SESSION['old_data']['so_dien_thoai']) ? $_SESSION['old_data']['so_dien_thoai'] : '' ?>" />
               <?php if (isset($_SESSION['errors']['so_dien_thoai'])) { ?>
                                        <p class="text-danger"><?= $_SESSION['errors']['so_dien_thoai'] ?></p>
                                    <?php } ?>
               <br />
               <input type="password" placeholder="Mật khẩu" name="mat_khau" />
               <?php if (isset($_SESSION['errors']['mat_khau'])) { ?>
                                        <p class="text-danger"><?= $_SESSION['errors']['mat_khau'] ?></p>
                                    <?php } ?>
               <button type="submit" class="btn-login">
                    Đăng ký
               </button>
               <!-- <div class="forgot-password">
                              <a href="#">Quên mật khẩu</a>
                         </div> -->
               <div class="alternate-login">
                    <p>Hoặc đăng nhập bằng</p>
                    <button class="login-facebook" type="submit">
                         <i class="fab fa-facebook-f"></i>
                         <span>Facebook</span>
                    </button>
                    <button class="login-google" type="submit">
                         <i class="fab fa-google"></i>
                         <span>Google</span>
                    </button>
               </div>
          </form>
     </section>
</main>
<?php require_once './views/footer.php' ?>


</html>