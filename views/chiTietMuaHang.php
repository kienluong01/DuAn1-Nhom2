<?php require_once './views/header.php' ?>

<section class="banner-title-cart">
     <img src="public/img/bg_breadcrumb.jpg" alt="" />
     <div class="breadcrumb-cart">
          <a href="home.php">Trang chủ</a> >
          <a href="cart.php">Giỏ hàng</a>
     </div>
     <div class="title-cart">
          <p>Chi tiết mua hàng</p>
     </div>
</section>
<div class="cart-container">
     <h2>Thông tin sản phẩm</h2>

     <!-- Sản phẩm 1 -->
     <?php foreach ($chiTietDonHang as $item): ?>
     <div class="cart-item">
          <div class="item-info">
               <div class="details">
               <img src="<?= BASE_URL . $item['hinh_anh'] ?>" alt="" />
                <h3>Tên sản phẩm <?= $item['ten_san_pham'] ?></h3>
                <h3>Số lượng: <?=  $item['so_luong'] ?></h3>

                    <div class="weight">
                         <span>Đơn giá: <?= number_format( $item['don_gia'],0,',','.')  ?> </span>
                    </div>
               </div>
          </div>
          <div class="item-actions">
               <div class="quantity">
                    <h1>Tổng tiền <?= number_format( $item['thanh_tien'],0,',','.')  ?></h1>
                    <input type="number" readonly />
                 
               </div>
         
          </div>
     </div>
     
<?php endforeach ?>




</div>
              
<div class="container">
          <div class="order-section">
               <div class="shipping-info">
               <h2>Thông tin đơn hàng</h2> 
               <form action="<?= BASE_URL . '?act=xu-ly-thanh-toan' ?>" method="POST">     
               <label for="">Trạng thái đơn hàng:  <h1>  <?= $trangThaiDonHang[$donHang['trang_thai_id']] ?></h1> </label>
               <label for="">Tên người nhận:  <h1>  <?= $donHang['ten_nguoi_nhan'] ?></h1> </label>
               <label for="">Email:  <h1>  <?= $donHang['email_nguoi_nhan'] ?></h1> </label>
               <label for="">Số điện thoại:  <h1>  <?= $donHang['sdt_nguoi_nhan'] ?></h1> </label>
               <label for="">Địa chỉ:  <h1>  <?= $donHang['dia_chi_nguoi_nhan'] ?></h1> </label>
               <label for="">Ngày đặt:  <h1>  <?= $donHang['ngay_dat'] ?></h1> </label>
               <label for="">Tổng tiền:  <h1>  <?= number_format($donHang['tong_tien'],0,',','.') ?></h1> </label>
               <label for="">Ghi chú:  <h1>  <?= $donHang['ghi_chu'] ?></h1> </label>
           
              
                    
                   
               </div>
     </div>
     </div>

<?php require_once './views/footer.php' ?>
</body>

</html>