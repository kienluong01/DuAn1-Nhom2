<?php include "./header.php" ?>
<section class="banner-title-detail">
     <img src="public/img/bg_breadcrumb.jpg" alt="" />
     <div class="breadcrumb-detail">
          <a href="home.php">Trang chủ</a> >
          <a href="category.php">Sản phẩm</a> >
          <a href="category.php">Đào đỏ Mỹ</a>
     </div>
     <div class="title-detail">
          <p>ĐĂNG NHẬP TÀI KHOẢN</p>
     </div>
</section>
<div class="container-detail">
     <!-- Thông tin sản phẩm -->
     <div class="product-detail">
          <div class="product-images">
               <img class="main-image" src="public/img/sp17-2.webp" alt="" />
               <div class="thumbnail-images">
                    <img src="public/img/sp17-2.webp" alt="Thumbnail 1" />
                    <img src="public/img/sp17-2.webp" alt="Thumbnail 2" />
                    <img src="public/img/sp17-2.webp" alt="Thumbnail 3" />
               </div>
          </div>
          <div class="product-details">
               <h1 class="product-title">Đào đỏ Mỹ</h1>

               <p class="availability">
                    Tình trạng: <span>Còn hàng</span>
               </p>
               <p class="price">100.000đ</p>
               <div class="quantity">
                    <label for="quantity">Số lượng:</label>
                    <input type="number" id="quantity" min="1" value="1" />
               </div>
               <div class="buttons">
                    <button class="buy-now">Mua Ngay</button>
                    <button class="add-to-cart">Cho Vào Giỏ</button>
               </div>
          </div>
     </div>

     <!-- Mô tả sản phẩm -->
     <div class="product-description">
          <h2>Mô tả sản phẩm</h2>
          <p>
               Nho chứa hàm lượng cao chất xơ. Nước nho ép chứa hàng
               chục chất dinh dưỡng có tác dụng chống ung thư và bệnh
               tim.
          </p>
          <p>
               Bạn đang cố gắng cải thiện thói quen ăn uống? Chắc chắn
               bạn phải nghĩ đến việc dự trữ nho đỏ này.
          </p>
     </div>

     <!-- Sản phẩm tương tự -->
     <div class="related-products">
          <h2>Sản phẩm tương tự</h2>
          <div class="product-list">
               <div class="related-item">
                    <img src="../public/img/sp2.webp" alt="Táo Mỹ" />
                    <p class="item-name">Táo Mỹ</p>
                    <p class="item-price">300.000đ</p>
               </div>
               <div class="related-item">
                    <img src="../public/img/sp22.webp" alt="Hạt óc chó" />
                    <p class="item-name">Hạt óc chó</p>
                    <p class="item-price">500.000đ</p>
               </div>
               <div class="related-item">
                    <img src="../public/img/sp5.webp" alt="Táo Rose Mỹ" />
                    <p class="item-name">Táo Rose Mỹ</p>
                    <p class="item-price">140.000đ</p>
               </div>
               <div class="related-item">
                    <img src="../public/img/sp3.webp" alt="Táo xanh nhập khẩu" />
                    <p class="item-name">Táo xanh nhập khẩu</p>
                    <p class="item-price">45.000đ</p>
               </div>
          </div>
     </div>
</div>
<?php include './views/footer.php' ?>
</body>
</body>

</html>