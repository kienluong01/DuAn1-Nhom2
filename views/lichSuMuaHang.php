<?php require_once './views/header.php' ?>

<section class="banner-title-cart">
     <img src="public/img/bg_breadcrumb.jpg" alt="" />
     <div class="breadcrumb-cart">
          <a href="home.php">Trang chủ</a> >
          <a href="cart.php">Giỏ hàng</a>
     </div>
     <div class="title-cart">
          <p>GIỎ HÀNG</p>
     </div>
</section>

<div class="cart-container">
     <h2>ĐƠN HÀNG CỦA BẠN</h2>

     <!-- Sản phẩm 1 -->
     <?php foreach ($donHangs as $donHang): ?>
     <div class="cart-item">
          <div class="item-info">
               <div class="details">
                <h3>Mã đơn hàng <?= $donHang['ma_don_hang'] ?></h3>
                <a href="">Trạng thái đơn hàng: <?=  $trangThaiDonHang[$donHang['trang_thai_id']] ?></a>

                    <div class="weight">
                         <span>Phương thức thanh toán: <?= $PhuongThucThanhToan[$donHang['phuong_thuc_thanh_toan_id']] ?> </span>
                    </div>
               </div>
          </div>
          <div class="item-actions">
               <div class="quantity">
                    <h1>Ngày đặt <?= $donHang['ngay_dat'] ?></h1>
                    <input type="number" readonly />
                    <h1>Tổng tiền <?= number_format($donHang['tong_tien'],0,',','.') ?></h1>
                    <input type="number" readonly />
                 
               </div>
               <a class="remove" href="<?= BASE_URL ?>?act=chi-tiet-mua-hang&id=<?= $donHang['id'] ?>">Chi tiết đơn hàng</a>
               <?php if($donHang['trang_thai_id'] == 1): ?>
               <a class="remove" href="<?= BASE_URL ?>?act=huy-don-hang&id=<?= $donHang['id'] ?>" onclick="return confirm('Bạn chắc chắn muốn xóa không')">Hủy đơn hàng</a>
               <?php endif; ?>
          </div>
     </div>



<?php endforeach ?>
</div>
<?php require_once './views/footer.php' ?>
</body>

</html>