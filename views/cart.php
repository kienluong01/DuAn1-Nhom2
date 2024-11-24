<?php include 'header.php' ?>

<section class="banner-title-cart">
     <img src="../public/img/bg_breadcrumb.jpg" alt="" />
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
     <div class="cart-item">
          <div class="item-info">
               <img src="../public/img/sp22.webp" alt="Ổi lê ruột đỏ" />
               <div class="details">
                    <h3>Ổi lê ruột đỏ</h3>
                    <p class="price">
                         <span class="current-price">20.000đ</span>
                         <span class="old-price">50.000đ</span>
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
                    <button>-</button>
                    <input type="number" value="1" min="1" readonly />
                    <button>+</button>
               </div>
               <p class="total-price">20.000đ</p>
               <button class="remove">Xóa</button>
          </div>
     </div>

     <!-- Tổng tiền -->
     <div class="cart-total">
          <p>Thành tiền: <span class="total-amount">40.000đ</span></p>
     </div>

     <!-- Nút hành động -->
     <div class="cart-actions">
          <a href="category.php">
               <button class="continue-shopping">Tiếp tục mua hàng</button>
          </a>
          <a href="pay.php">
               <button class="checkout">Đặt hàng ngay</button>
          </a>
     </div>
</div>
<?php include 'footer.php' ?>
</body>

</html>