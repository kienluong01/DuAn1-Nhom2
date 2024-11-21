<?php include './header.php' ?>

<main>
     <section class="banner-title-login">
          <img src="../public/img/bg_breadcrumb.jpg" alt="" />
          <div class="breadcrumb-login">
               <a href="home.php">Trang chủ</a> >
               <a href="login.php">Đăng nhập tài khoản</a>
          </div>
          <div class="title-login">
               <p>ĐĂNG NHẬP TÀI KHOẢN</p>
          </div>
     </section>
     <section class="content-login">
          <form action="">
               <h1>Đăng nhập</h1>
               <p class="desc-login">
                    Nếu bạn chưa có tài khoản, đăng kí
                    <a href="register.php">tại đây</a>
               </p>
               <input type="text" placeholder="Email" /> <br />
               <input type="text" placeholder="Mật khẩu" />
               <button type="submit" class="btn-login">
                    Đăng nhập
               </button>
               <div class="forgot-password">
                    <a href="#">Quên mật khẩu</a>
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
<?php include './footer.php' ?>
</body>

</html>