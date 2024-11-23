<?php require_once './views/header.php' ?>
<main>
<section class="banner-title-login">
          <img src="public/img/bg_breadcrumb.jpg" alt="" />
          <div class="breadcrumb-login">
               <a href="<?= BASE_URL . '?act=/' ?>">Trang chủ</a> 
          </div>
          <div class="title-login">
               <p>TÀI KHOẢN</p>
          </div>
     </section>
    <!-- breadcrumb area end -->

    <section class="content-login">
          <form action="<?= BASE_URL . '?act=sua-thong-tin-ca-nhan' ?>" method="post"> 
               <h1>Sửa tài khoản</h1>
               <input type="text" name="tai_khoan_id"  value="<?= $thongTin['id'] ?>" hidden>
               <?php if (isset($_SESSION['successTt'])) { ?>
                                                    <div class="alert alert-info alert-dismissable">
                                                        <a href="" class="panel-close close" data-dismiss="alert"></a>
                                                        <i class="fa fa-coffee"></i>
                                                        <?= $_SESSION['successTt'] ?>
                                                    </div>
                                                <?php } ?>
                                                <input type="text" name="tai_khoan_id" value="<?= isset($thongTin['id']) ? $thongTin['id'] : '' ?>" hidden>
                                                
<input type="text" placeholder="Họ tên" name="ho_ten" value="<?= isset($thongTin['ho_ten']) ? $thongTin['ho_ten'] : '' ?>" /> <br />
<?php if (isset($_SESSION['errors']['ho_ten'])) { ?>
                                                                    <p class="text-danger"><?= $_SESSION['errors']['ho_ten'] ?></p>
                                                                <?php } ?>
<input type="email" placeholder="Email" name="email" value="<?= isset($thongTin['email']) ? $thongTin['email'] : '' ?>" /> <br />
<?php if (isset($_SESSION['errors']['email'])) { ?>
                                                                    <p class="text-danger"><?= $_SESSION['errors']['email'] ?></p>
                                                                <?php } ?>
<input type="number" placeholder="Số điện thoại" name="so_dien_thoai" value="<?= isset($thongTin['so_dien_thoai']) ? $thongTin['so_dien_thoai'] : '' ?>" /> <br />
<?php if (isset($_SESSION['errors']['so_dien_thoai'])) { ?>
                                                            <p class="text-danger"><?= $_SESSION['errors']['so_dien_thoai'] ?></p>
                                                        <?php } ?>
<input type="text" placeholder="Địa chỉ" name="dia_chi" value="<?= isset($thongTin['dia_chi']) ? $thongTin['dia_chi'] : '' ?>" /> <br />
<?php if (isset($_SESSION['errors']['dia_chi'])) { ?>
                                                            <p class="text-danger"><?= $_SESSION['errors']['dia_chi'] ?></p>
                                                        <?php } ?>


            
               <button type="submit" class="btn-login">
                    Lưu thông tin
               </button>
               
        
          </form>
     </section>

     <section class="content-login">
    <form action="<?= BASE_URL . '?act=sua-mat-khau' ?>" method="post">
        <h1>Đổi Mật Khẩu</h1>

        <input type="password" placeholder="Mật khẩu cũ" name="old_pass" /> <br />
        <?php if (isset($_SESSION['errors']['old_pass'])) { ?>
            <p class="text-danger"><?= $_SESSION['errors']['old_pass'] ?></p>
        <?php } ?>

        <input type="password" placeholder="Mật khẩu mới" name="new_pass" /> <br />
        <?php if (isset($_SESSION['errors']['new_pass'])) { ?>
            <p class="text-danger"><?= $_SESSION['errors']['new_pass'] ?></p>
        <?php } ?>

        <input type="password" placeholder="Nhập lại mật khẩu mới" name="confirm_pass" /> <br />
        <?php if (isset($_SESSION['errors']['confirm_pass'])) { ?>
            <p class="text-danger"><?= $_SESSION['errors']['confirm_pass'] ?></p>
        <?php } ?>

        <button type="submit" class="btn-login">Lưu mật khẩu</button>
    </form>
</section>

<section class="content-login">
    <form action="<?= BASE_URL . '?act=sua-anh-tai-khoan' ?>" method="post" enctype="multipart/form-data">
        <h1>Đổi Ảnh Đại Diện</h1>

        <?php if (isset($_SESSION['successAnh'])) { ?>
            <div class="alert alert-info alert-dismissable">
                <a href="" class="panel-close close" data-dismiss="alert"></a>
                <i class="fa fa-check"></i>
                <?= $_SESSION['successAnh'] ?>
            </div>
        <?php } ?>

        <input type="text" name="tai_khoan_id" value="<?= isset($thongTin['id']) ? $thongTin['id'] : '' ?>" hidden>

        
            <p>Ảnh hiện tại:</p>
            <img src="<?= isset($thongTin['anh_dai_dien']) ? './uploads/' . $thongTin['anh_dai_dien'] : 'public/img/default-avatar.jpg' ?>" 
                 alt="Ảnh đại diện hiện tại" style="max-width: 150px; border-radius: 50%;">
     
        <br />

        <input type="file" name="anh_dai_dien" accept="image/*" /> <br />
        <?php if (isset($_SESSION['errors']['anh_dai_dien'])) { ?>
            <p class="text-danger"><?= $_SESSION['errors']['anh_dai_dien'] ?></p>
        <?php } ?>

        <button type="submit" class="btn-login">Lưu ảnh đại diện</button>
    </form>
</section>


    <!-- my account wrapper start -->
    
</main>
<?php require_once './views/footer.php' ?>


</html>