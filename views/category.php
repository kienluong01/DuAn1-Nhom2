<?php include 'header.php' ?>

<body>
     <section class="banner-title-category">
          <img src="../public/img/bg_breadcrumb.jpg" alt="" />
          <div class="breadcrumb-category">
               <a href="home.php">Trang chủ</a> >
               <a href="category.php">Danh mục sản phẩm</a>
          </div>
          <div class="title-category">
               <p>DANH MỤC SẢN PHẨM</p>
          </div>
     </section>
     <div class="container">
          <div class="sidebar">
               <div class="filter">
                    <h3>DANH MỤC SẢN PHẨM</h3>
                    <ul>
                         <li>
                              <input type="radio" name="category" /> Trái
                              cây
                         </li>
                         <li>
                              <input type="radio" name="category" />
                              Rau củ
                         </li>
                         <li>
                              <input type="radio" name="category" />
                              Thịt tươi
                         </li>
                         <li>
                              <input type="radio" name="category" />
                              Nước ép
                         </li>
                    </ul>
               </div>
          </div>
          <div class="products">
               <div class="sorting">
                    <span>Xếp theo</span>
                    <label><input type="radio" name="sort" /> Tên A-Z</label>
                    <label><input type="radio" name="sort" /> Tên Z-A</label>
                    <label><input type="radio" name="sort" /> Giá thấp đến
                         cao</label>
                    <label><input type="radio" name="sort" /> Giá cao xuống
                         thấp</label>
               </div>
               <div class="product-list">
                    <div class="product item-offer">
                         <div class="sale">
                              <span>Giảm 60%</span>
                         </div>
                         <a href="detail.php">
                              <div class="img-product">
                                   <img src="../public/img/sp17-2.webp" alt="" />
                              </div>
                              <div class="name-product">
                                   <span>Ớt chuông xanh</span>
                              </div>
                              <div class="price">
                                   <span class="price-sale">20.000đ</span>
                                   <span class="price-old"><del>50.000đ</del></span>
                              </div>
                         </a>
                         <div class="button-product">
                              <div class="button-buy">
                                   <a href="pay.php">
                                        <button>Mua ngay</button>
                                   </a>
                              </div>
                              <div class="button-add">
                                   <a href="cart.php">
                                        <button>
                                             <i class="fas fa-cart-plus"></i>
                                        </button>
                                   </a>
                              </div>
                         </div>
                    </div>
               </div>
          </div>
     </div>
     <?php include 'footer.php' ?>

</body>

</html>