<?php require_once './views/header.php' ?>
<main>
     <section class="banner-title-login">
          <img src="public/img/bg_breadcrumb.jpg" alt="" />
          <div class="breadcrumb-login">
               <a href="<?= BASE_URL . '?act=/' ?>">Trang chủ</a> >
          </div>
          <div class="title-login">
               <p>QUÊN MẬT KHẨU</p>
          </div>
     </section>
     <section class="content-login">
          <form action="<?= BASE_URL . '?act=lay-mat-khau' ?>" method="post"> 
               <h1>Quên mật khẩu</h1>
               <?php if (isset($_SESSION['layMk'])) { ?>
                                            <div class="alert alert-info alert-dismissable">
                                                <a href="" class="panel-close close" data-dismiss="alert"></a>
                                                <i class="fa fa-coffee"></i>
                                                <?= $_SESSION['layMk'] ?>
                                            </div>
                                        <?php } ?>
               <input type="text" placeholder="Email" name="email" /> <br />
               <?php if (isset($_SESSION['errors']['email'])) { ?>
                                                    <p class="text-danger"><?= $_SESSION['errors']['email'] ?></p>
                                     <?php } ?>
               <button type="submit" class="btn-login">
                    Lấy mật khẩu
               </button>
              
              
          </form>
     </section>
</main>
<?php require_once './views/footer.php' ?>
</body>
</html>