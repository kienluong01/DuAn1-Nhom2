<?php include 'header.php' ?>
<section class="banner-title-category">
     <img src="public/img/bg_breadcrumb.jpg" alt="" />
     <div class="breadcrumb-category">
          <a href="home.php">Trang chủ</a> >
          <a href="category.php">Danh mục sản phẩm</a>
     </div>
     <div class="title-category">
          <p>DANH MỤC SẢN PHẨM</p>
     </div>
</section>
<div class="container-category">
     <div class="sidebar">
          <div class="filter">
               <h3>DANH MỤC SẢN PHẨM</h3>
               <ul>
                    <?php foreach ($listDanhMuc as $danhMuc): ?>
                         <li>
                              <a
                                   href="<?= BASE_URL . '?act=danh_muc&id=' . $danhMuc['id'] ?>"><?= $danhMuc['ten_danh_muc'] ?></a>
                         </li>
                    <?php endforeach ?>
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
               <?php if (!empty($listSanPham)): ?>

                    <?php foreach ($listSanPham as $key => $sanPham): ?>
                         <div class="product item-offer">
                              <div class="sale" hidden>
                                   <span>Giảm 60%</span>
                              </div>
                              <a href="#">
                                   <div class="img-product">
                                        <img src="<?= BASE_URL . $sanPham['hinh_anh'] ?>" alt="anh_san_pham" />
                                   </div>
                                   <div class="name-product">
                                        <a href=""><?= $sanPham['ten_san_pham'] ?></a>
                                   </div>
                                   <div class="price">

                                        <?php if ($sanPham['gia_khuyen_mai']) { ?>
                                             <span class="price-sale"><?= formatPrice($sanPham['gia_khuyen_mai']) . 'đ' ?></span>
                                             <span
                                                  class="price-old"><del><?= formatPrice($sanPham['gia_san_pham']) . 'đ' ?></del></span>
                                        <?php } else { ?>
                                             <span
                                                  class="price-sale"><del><?= formatPrice($sanPham['gia_san_pham']) . 'đ' ?></del></span>
                                        <?php } ?>
                                   </div>
                              </a>
                              <div class="button-product">
                                   <div class="button-buy">
                                        <a href="#">
                                             <button>Mua ngay</button>
                                        </a>
                                   </div>
                                   <div class="button-add">
                                        <a href="#">
                                             <button>
                                                  <i class="fas fa-cart-plus"></i>
                                             </button>
                                        </a>
                                   </div>
                              </div>
                         </div>
                    <?php endforeach ?>
               <?php else: ?>
                    <p>Không có sản phẩm nào trong danh mục này</p>
               <?php endif ?>
          </div>
     </div>
</div>


<?php include 'footer.php' ?>

</body>

</html>