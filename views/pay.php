<?php include 'header.php' ?>

<body id="pay">
     <section class="banner-title-pay">
          <img src="../public/img/bg_breadcrumb.jpg" alt="" />
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
                    <h2>Thông tin nhận hàng</h2>
                    <form>
                         <label for="address">Địa chỉ</label>
                         <input type="text" id="address" placeholder="Nhập địa chỉ" />
                         <label for="city">Tỉnh thành</label>
                         <input type="text" id="city" placeholder="Nhập tỉnh thành" />
                         <label for="district">Quận huyện</label>
                         <input type="text" id="district" placeholder="Nhập quận huyện" />
                         <label for="ward">Phường xã</label>
                         <input type="text" id="ward" placeholder="Nhập phường xã" />
                         <label for="note">Ghi chú</label>
                         <textarea id="note" placeholder="Nhập ghi chú"></textarea>
                    </form>
               </div>

               <div class="shipping-method">
                    <h2>Vận chuyển</h2>
                    <form>
                         <label>
                              <input type="radio" name="shipping" value="fast" checked />
                              Giao hàng nhanh <span>16.500đ</span>
                         </label>
                         <label>
                              <input type="radio" name="shipping" value="economy" />
                              Giao hàng tiết kiệm <span>22.500đ</span>
                         </label>
                    </form>
               </div>

               <div class="payment-method">
                    <h2>Thanh toán</h2>
                    <label>
                         <input type="radio" name="payment" value="cod" checked />
                         Thanh toán khi giao hàng (COD)
                    </label>
               </div>
          </div>

          <div class="order-summary">
               <h2>Đơn hàng (2 sản phẩm)</h2>
               <div class="product-pay">
                    <img src="../public/img/sp22.webp" alt="" />
                    <span>Ổi lê ruột đỏ</span>
                    <span>20.000đ</span>
               </div>
               <div class="discount">
                    <input type="text" placeholder="Nhập mã giảm giá" />
                    <button type="submit">Áp dụng</button>
               </div>
               <div class="summary">
                    <div>
                         <span>Tạm tính</span>
                         <span>40.000đ</span>
                    </div>
                    <div>
                         <span>Phí vận chuyển</span>
                         <span>-</span>
                    </div>
                    <div>
                         <strong>Tổng cộng</strong>
                         <strong>40.000đ</strong>
                    </div>
               </div>
               <button class="order-button" type="submit">ĐẶT HÀNG</button>
          </div>
     </div>
     <?php include 'footer.php' ?>
</body>

</html>