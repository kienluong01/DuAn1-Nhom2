<?php include "header.php" ?>
<section class="banner-title-detail">
     <img src="public/img/bg_breadcrumb.jpg" alt="" />
     <div class="breadcrumb-detail">
          <a href="home.php">Trang chủ</a> >
          <a href="category.php">Sản phẩm</a> 
     </div>
    
</section>
<div class="container-detail">
     <!-- Thông tin sản phẩm -->
     <div class="product-detail">
          <div class="product-images">
               <img id="mainImage" class="main-image" src="<?= BASE_URL . $sanPham['hinh_anh'] ?>" alt="" />
               <div class="thumbnail-images">

                    <?php foreach ($listAnhSanPham as $key => $anhSanPham): ?>
                         <img src="<?= BASE_URL . $anhSanPham['link_hinh_anh'] ?>" alt=""
                              onclick="changeImage('<?= BASE_URL . $anhSanPham['link_hinh_anh'] ?>')">
                    <?php endforeach ?>
               </div>
          </div>
          <div class="product-details">
               <a href=""><?= $sanPham['ten_danh_muc'] ?></a>
               <h1 class="product-title"><?= $sanPham['ten_san_pham'] ?></h1>

               <p class="availability">
                    Tình trạng: <span><?= $sanPham['trang_thai'] == 1 ? 'Còn hàng' : 'Hết hàng'; ?></span>
               </p>
               <p class="price">
                    <?php if ($sanPham['gia_khuyen_mai']) { ?>
                         <span class="price-sale"><?= formatPrice($sanPham['gia_khuyen_mai']) . 'đ' ?></span>
                         <span class="price-old"><del><?= formatPrice($sanPham['gia_san_pham']) . 'đ' ?></del></span>
                    <?php } else { ?>
                         <span class="price-sale"><del><?= formatPrice($sanPham['gia_san_pham']) . 'đ' ?></del></span>
                    <?php } ?>
               </p>
               <p><?= 'CÒN ' . $sanPham['so_luong'] . " TRONG KHO" ?> </p>

               <form action="<?= BASE_URL .'?act=them-gio-hang'?>" method="POST">
               <div class="quantity">
               <input type="hidden" name="san_pham_id" value="<?=$sanPham['id']?>">
               <div class="pro-qty"><input type="number" value="1" name="so_luong"></div>
               </div>
               <div class="buttons">

                    <button class="buy-now">Thêm vào giỏ hàng</button>
               </div>
               </form>
          </div>
     </div>

     <!-- Mô tả sản phẩm -->
     <div class="product-description">
          <h2>Mô tả sản phẩm</h2>
          <p>
               <?= $sanPham['mo_ta'] ?>
          </p>

     </div>
     <div class="comment-section">
          <h3>Bình Luận Của Khách Hàng</h3>
          <div class="comment-list" id="commentList">
               <?php foreach ($listBinhLuan as $binhLuan): ?>
                    <div class="binhLuan">
                         <p><span>Khách Hàng - </span><?= $binhLuan['ngay_dang'] ?></p>
                         <p><?= $binhLuan['noi_dung'] ?></p>
                    </div>
                    <hr>
               <?php endforeach ?>
          </div>
          <h3>Phần Bình Luận</h3>
          <form action="">
               <div class="comment-input">
                    <textarea id="commentText" placeholder="Viết bình luận của bạn..."></textarea>
                    <button onclick="addComment()" type="submit">Gửi bình luận</button>
               </div>
          </form>

     </div>
     <!-- Sản phẩm tương tự -->
     <div class="related-products">
          <h2>Sản phẩm tương tự</h2>
          <div class="product-list">
               <?php foreach ($listSanPhamCungDanhMuc as $key => $sanPham): ?>
                    <div class="product item-offer item">
                         <div class="sale">
                              <span>Giảm 60%</span>
                         </div>
                         <a href="<?= BASE_URL . '?act=chi-tiet-san-pham&id_san_pham=' . $sanPham['id'] ?>">
                              <div class="img-product">
                                   <img src="<?= BASE_URL . $sanPham['hinh_anh'] ?>" alt="anh_san_pham" />
                              </div>
                              <div class="name-product">
                                   <a
                                        href="<?= BASE_URL . '?act=chi-tiet-san-pham&id_san_pham=' . $sanPham['id'] ?>"><?= $sanPham['ten_san_pham'] ?></a>
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

          </div>
     </div>
</div>
<?php include 'footer.php' ?>
<script>
     function changeImage(imageSrc) {
          const mainImage = document.getElementById('mainImage');
          mainImage.src = imageSrc;
     }
</script>
</body>

</html>