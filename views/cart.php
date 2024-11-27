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
               <p class="total-price"><?= formatPrice($sanPham['gia_khuyen_mai'] ? $sanPham['gia_khuyen_mai'] : $sanPham['gia_san_pham']) . 'đ' ?></p>

               <button class="remove" onclick="return confirm('Bạn chắc chắn muốn xóa không')">Xóa</button>
          </div>              
     </div>
     <?php endforeach ?>
     <!-- Tổng tiền -->
     
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
               <button class="continue-shopping">Về trang chủ để tiếp tục mua hàng</button>
          </a>
          <a href="<?= BASE_URL . '?act=thanh-toan' ?>">
          <button class="remove">Đặt hàng ngay</button>
          </a>
     </div>
</div>
<script>
     document.addEventListener('DOMContentLoaded', () => {
    // Hàm định dạng tiền VND
    function formatPrice(price) {
        return new Intl.NumberFormat('vi-VN', { style: 'currency', currency: 'VND' }).format(price);
    }

    // Xử lý khi nhấn nút tăng/giảm
    const cartItems = document.querySelectorAll('.cart-item');
    cartItems.forEach(item => {
        const decreaseBtn = item.querySelector('.decrease');
        const increaseBtn = item.querySelector('.increase');
        const quantityInput = item.querySelector('.quantity-input');
        const priceElement = item.querySelector('.price-sale');
        const totalElement = item.querySelector('.total-price');

        decreaseBtn.addEventListener('click', () => {
            let quantity = parseInt(quantityInput.value);
            if (quantity > 1) {
                quantity--;
                quantityInput.value = quantity;

                // Cập nhật giá tổng
                const price = parseInt(priceElement.dataset.price);
                totalElement.textContent = formatPrice(price * quantity);

                updateCartTotal();
            }
        });

        increaseBtn.addEventListener('click', () => {
            let quantity = parseInt(quantityInput.value);
            quantity++;
            quantityInput.value = quantity;

            // Cập nhật giá tổng
            const price = parseInt(priceElement.dataset.price);
            totalElement.textContent = formatPrice(price * quantity);

            updateCartTotal();
        });

        quantityInput.addEventListener('change', () => {
            let quantity = parseInt(quantityInput.value);
            if (isNaN(quantity) || quantity < 1) {
                quantity = 1;
                quantityInput.value = quantity;
            }

            // Cập nhật giá tổng
            const price = parseInt(priceElement.dataset.price);
            totalElement.textContent = formatPrice(price * quantity);

            updateCartTotal();
        });
    });

    // Hàm cập nhật tổng tiền giỏ hàng
    function updateCartTotal() {
        const totalAmountElement = document.querySelector('.total-amount');
        let total = 0;

        cartItems.forEach(item => {
            const quantity = parseInt(item.querySelector('.quantity-input').value);
            const price = parseInt(item.querySelector('.price-sale').dataset.price);
            total += quantity * price;
        });

        totalAmountElement.textContent = formatPrice(total);
    }
});

</script>

<?php require_once './views/footer.php' ?>
</body>
</html>
