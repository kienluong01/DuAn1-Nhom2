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
     <h2>Giỏ hàng của bạn (1 sản phẩm)</h2>

     <!-- Sản phẩm 1 -->
     <form action="<?= BASE_URL . '?act=xoa-san-pham-gio-hang' ?>" method="POST">
     <?php foreach($chiTietGioHang as $key=>$sanPham): ?>
     <div class="cart-item">
          <div class="item-info">
               <img src="<?= BASE_URL . $sanPham['hinh_anh'] ?>" alt="" />
               <div class="details">
                    <a href=""><?= $sanPham['ten_san_pham'] ?></a>
                    <p class="price">
                         <?php if($sanPham['gia_khuyen_mai']) { ?>
                             <span class="price-sale" data-price="<?= $sanPham['gia_khuyen_mai'] ?>"><?= formatPrice($sanPham['gia_khuyen_mai']).'đ' ?></span>
                             <span class="price-old"><del><?= formatPrice($sanPham['gia_san_pham']).'đ' ?></del></span>
                         <?php } else { ?>
                             <span class="price-sale" data-price="<?= $sanPham['gia_san_pham'] ?>"><del><?= formatPrice($sanPham['gia_san_pham']).'đ' ?></del></span>
                         <?php } ?>
                    </p>
                    <div class="weight">
                         <span>Trọng lượng:</span>
                         <select>
                              <option value="1kg">1kg</option>
                              <option value="2kg">2kg</option>
                         </select>
                    </div>
               </div>
          </div>
          <div class="item-actions">
               <div class="quantity">
                    <button class="decrease">-</button>
                    <input class="quantity-input" type="number" value="<?= $sanPham['so_luong'] ?>" min="1">
                    <button class="increase">+</button>
               </div>
               <p class="total-price"><?= formatPrice($sanPham['gia_khuyen_mai'] ? $sanPham['gia_khuyen_mai'] : $sanPham['gia_san_pham']) ?></p>
               <button class="remove" onclick="return confirm('Bạn chắc chắn muốn xóa không')">Xóa</button>
          </div>
                         
     </div>

     <?php endforeach ?>
     <!-- Tổng tiền -->
      </form>
     <div class="cart-total">
       
     <p>Thành tiền: <span class="total-amount">
          <?php
          $tong_tien = 0 ;
          // Duyệt qua mỗi sản phẩm trong giỏ hàng
          foreach($chiTietGioHang as $sanPham) {
               if($sanPham['gia_khuyen_mai']) {
                    $tong_tien += $sanPham['gia_khuyen_mai'] * $sanPham['so_luong'];
               } else {
                    $tong_tien += $sanPham['gia_san_pham'] * $sanPham['so_luong'];
               }
          }
          // In ra tổng tiền sau khi tính toán
          echo formatPrice($tong_tien) . 'đ';
          ?>
     </span></p>
</div>

     <!-- Nút hành động -->
     <div class="cart-actions">
          <a href="<?= BASE_URL . '?act=/' ?>">
               <button class="continue-shopping">Tiếp tục mua hàng</button>
          </a>
          <a href="pay.php">
              <a href="<?= BASE_URL . '?act=thanh-toan' ?>">Đặt hàng ngay</a>
          </a>
     </div>
</div>





<script>
document.querySelectorAll('.quantity button').forEach(button => {
    button.addEventListener('click', function() {
        const cartItem = this.closest('.cart-item');  // Lấy item chứa nút
        const quantityInput = cartItem.querySelector('.quantity-input');  // Lấy input số lượng
        const quantity = parseInt(quantityInput.value);  // Lấy số lượng
        const unitPrice = parseFloat(cartItem.querySelector('.price-sale').getAttribute('data-price'));  // Lấy giá đơn vị từ data-price

        if (this.classList.contains('increase')) {
            quantityInput.value = quantity + 1;  // Tăng số lượng
        } else if (this.classList.contains('decrease')) {
            quantityInput.value = Math.max(1, quantity - 1);  // Giảm số lượng nhưng không nhỏ hơn 1
        }

        // Cập nhật giá sản phẩm sau khi thay đổi số lượng
        const totalPrice = unitPrice * parseInt(quantityInput.value);
        cartItem.querySelector('.total-price').textContent = formatPrice(totalPrice);  // Hiển thị tổng tiền
        updateTotal();  // Cập nhật tổng giỏ hàng
    });
});

function formatPrice(price) {
    return price.toLocaleString('vi-VN') + 'đ';  // Định dạng giá với dấu phẩy ngàn (ví dụ: 80.000đ)
}

function updateTotal() {
    let total = 0;
    document.querySelectorAll('.cart-item').forEach(item => {
        const price = parseFloat(item.querySelector('.total-price').textContent.replace('đ', '').replace(',', ''));
        total += price;  // Cộng dồn các tổng tiền sản phẩm
    });
    document.querySelector('.total-amount').textContent = formatPrice(total);  // Cập nhật tổng giỏ hàng
}
</script>

<?php require_once './views/footer.php' ?>
</body>
</html>
