<?php require_once './views/header.php' ?>

<body id="pay">
     <section class="banner-title-pay">
          <img src="public/img/bg_breadcrumb.jpg" alt="" />
          <div class="breadcrumb-pay">
               <a href="cart.php">Giỏ hàng</a> >
               <a href="pay.php">Thanh toán</a>
          </div>
          <div class="title-pay">
               <p>THANH TOÁN</p>
          </div>
     </section>
     <div class="container">
          <div class="order-section">
               <div class="shipping-info">
               <form action="<?= BASE_URL . '?act=xu-ly-thanh-toan' ?>" method="POST">
                    <h2>Thông tin người nhận</h2>                    
                         <label for="address">Tên người nhận</label>
                         <input type="text" id="ten_nguoi_nhan" name="ten_nguoi_nhan" value="<?= $user['ho_ten'] ?>" placeholder="Nhập tên người nhận" />
                         <label for="address">Địa chỉ email</label>
                         <input type="text" id="email_nguoi_nhan" name="email_nguoi_nhan" value="<?= $user['email'] ?>" placeholder="Nhập địa chỉ email" />
                         <label for="city">Số điện thoại người nhận</label>
                         <input type="text" id="sdt_nguoi_nhan" name="sdt_nguoi_nhan" value="<?= $user['so_dien_thoai'] ?>"  placeholder="Nhập số điện thoại người nhận" />
                         <label for="district">Địa chỉ người nhận</label>
                         <input type="text" id="dia_chi_nguoi_nhan" name="dia_chi_nguoi_nhan" value="<?= $user['dia_chi'] ?>" placeholder="Nhập địa chỉ người nhận" />
                         <!-- <label for="ward">Phường xã</label>
                         <input type="text" id="ward" placeholder="Nhập phường xã" /> -->
                         <label for="note">Ghi chú</label>
                         <textarea id="ghi_chu" name="ghi_chu" placeholder="Nhập ghi chú"></textarea>
                   
               </div>

               <div class="shipping-method">
                    <h2>Vận chuyển</h2>
                    
                         <label>
                              <input type="radio" name="shipping" value="fast" checked />
                              Giao hàng nhanh <span>16.500đ</span>
                         </label>
                         <label>
                              <input type="radio" name="shipping" value="economy" />
                              Giao hàng tiết kiệm <span>22.500đ</span>
                         </label>
                    
               </div>

               <div class="payment-method">
                    <h2>Thanh toán</h2>
                    <label>
                         <input type="radio"  name="phuong_thuc_thanh_toan_id"  value="1" checked />
                         Thanh toán khi giao hàng (COD)
                    </label>
                    <label>
                         <input type="radio"  name="phuong_thuc_thanh_toan_id" value="2"  checked />
                         Thanh toán qua Banking
                    </label>
                    
               </div>
          </div>

          <div class="order-summary">
               <h2>Sản phẩm</h2>
               <?php foreach($chiTietGioHang as $key=>$sanPham): ?>
               <div class="product-pay">
               <img src="<?= BASE_URL . $sanPham['hinh_anh'] ?>" alt="" />
                    <a href=""><?= $sanPham['ten_san_pham'] ?></a>
                    <strong><?= $sanPham['so_luong'] ?></strong>

                    <span><?php if($sanPham['gia_khuyen_mai']) { ?>
                             <span class="price-sale" data-price="<?= $sanPham['gia_khuyen_mai'] ?>"><?= formatPrice($sanPham['gia_khuyen_mai']).'đ' ?></span>
                             <span class="price-old"><del><?= formatPrice($sanPham['gia_san_pham']).'đ' ?></del></span>
                         <?php } else { ?>
                             <span class="price-sale" data-price="<?= $sanPham['gia_san_pham'] ?>"><del><?= formatPrice($sanPham['gia_san_pham']).'đ' ?></del></span>
                         <?php } ?></span>
               </div>
               <?php endforeach ?>


               <div class="discount">
                    <input type="text" placeholder="Nhập mã giảm giá" />
                    <button type="submit">Áp dụng</button>
               </div>
               <div class="summary">
                    <div>
                         <span>Tổng tiền sản phẩm</span>
                         <span><?php
          $tongGioHang = 0 ;
          // Duyệt qua mỗi sản phẩm trong giỏ hàng
          foreach($chiTietGioHang as $sanPham) {
               if($sanPham['gia_khuyen_mai']) {
                    $tongGioHang += $sanPham['gia_khuyen_mai'] * $sanPham['so_luong'];
               } else {
                    $tongGioHang += $sanPham['gia_san_pham'] * $sanPham['so_luong'];
               }
          }
          // In ra tổng tiền sau khi tính toán
          echo formatPrice($tongGioHang) . 'đ';
          ?></span>
                    </div>
                    <div>
                         <span>Phí vận chuyển</span>
                         <span>30.000</span>
                    </div>
                    <div>
                         <span>Tổng tiền thanh toán</span>
                         <input type="hidden" name="tong_tien" value="<?= $tongGioHang + 30000 ?>">
                         <strong><?= formatPrice($tongGioHang + 30000) . 'đ' ?></strong>
                    
                    </div>
               </div>
               <button class="order-button" type="submit">ĐẶT HÀNG</button>
               </form>
          </div>
     </div>
     
     <?php require_once './views/footer.php' ?>
</body>

</html>