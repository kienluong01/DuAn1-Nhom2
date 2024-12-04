<?php require_once './views/header.php' ?>
<main>
     <section class="banner-title-login">
          <img src="public/img/bg_breadcrumb.jpg" alt="" />
          <div class="breadcrumb-login">
               <a href="<?= BASE_URL . '?act=/' ?>">Trang chủ</a> >
               <a href="<?=  BASE_URL . '?act=login' ?>">Đăng nhập tài khoản</a>
          </div>
          <div class="title-login">
               <p>ĐĂNG NHẬP TÀI KHOẢN</p>
          </div>
     </section>
     <section class="content-login">
          <form action="<?= BASE_URL . '?act=check-login' ?>" method="post"> 
               <h1>Đăng nhập</h1>
               <?php if (isset($_SESSION['errors'])) { ?>
    <?php if (is_array($_SESSION['errors'])) { ?>
        <ul class="desc-login">
            <?php foreach ($_SESSION['errors'] as $error) { ?>
                <li><?= htmlspecialchars($error) ?></li>
            <?php } ?>
        </ul>
    <?php } else { ?>
        <p class="desc-login"><?= htmlspecialchars($_SESSION['errors']) ?></p>
    <?php } ?>
<?php } else { ?>
    <p class="desc-login">Vui lòng đăng nhập</p>
<?php } ?>

               <p class="desc-login">
                    Nếu bạn chưa có tài khoản, đăng kí
                    <a href="<?= BASE_URL . '?act=form-dang-ki' ?>">tại đây</a>
               </p>
               <input type="text" placeholder="Email" name="email" required/> <br />
               <input type="text" placeholder="Mật khẩu" name="password" required />
               <button type="submit" class="btn-login">
                    Đăng nhập
               </button>
               <div class="forgot-password">
                    <a href="<?= BASE_URL . '?act=quen-mat-khau' ?>">Quên mật khẩu</a>
               </div>
               <div class="alternate-login">
                    <p>Đăng nhập bằng cách khác</p>
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
</body>
</html>