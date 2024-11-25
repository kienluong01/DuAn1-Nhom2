 <?php require_once "./views/header.php" ?>
 <main class="container">


      <div class="row">
           <?php if (isset($_SESSION['thongBao'])): ?>
                <script type="text/javascript">
                     alert("<?php echo $_SESSION['thongBao']; ?>");
                </script>
                <?php unset($_SESSION['thongBao']); // Xóa session thongBao sau khi hiển thị 
                    ?>
           <?php endif; ?>
      </div>



      <section class="home-banner">
           <div class="banner">
                <!-- <img src="public/img/slider_home.webp" alt="" /> -->
           </div>
           <button class="button-banner">
                Mua ngay <i class="fas fa-arrow-right"></i>
           </button>
      </section>
      <section class="product-category">
           <?php foreach ($listDanhMuc as $danhMuc): ?>
                <div class="category-item">
                     <a href="<?= BASE_URL . '?act=category&id=' . $danhMuc['id'] ?>">
                          <img src="public/img/cate_4.webp" alt="" class="img-category" />
                          <span class="title-category-home"><?= $danhMuc['ten_danh_muc'] ?></span>
                     </a>
                </div>
           <?php endforeach ?>
           <!-- <div class="category-item">
                <a href="#">
                     <img src="public/img/cate_5.webp" alt="" class="img-category" />
                     <span class="title-category-home">Rau củ</span>
                </a>
           </div>
           <div class="category-item">
                <a href="#">
                     <img src="public/img/seafood.webp" alt="" class="img-category" />
                     <span class="title-category-home">Thịt tươi sống</span>
                </a>
           </div>
           <div class="category-item">
                <a href="#">
                     <img src="public/img/cate_6.webp" alt="" class="img-category" />
                     <span class="title-category-home">Nước ép</span>
                </a>
           </div> -->
      </section>
      <section class="offers">
           <div class="direction button-controll-offers">
                <button class="left-button-offers" id="prev">
                     <i class="fas fa-angle-left"></i>
                </button>
                <button class="right-button-offers" id="next">
                     <i class="fas fa-angle-right"></i>
                </button>
           </div>
           <div class="title-offers">
                <div class="item-title-offers">
                     <i class="fas fa-fire"></i>
                     <span>Ưu đãi trong tuần</span>
                </div>
           </div>
           <div id="formList">
                <div class="list-offers" id="list">
                     <?php foreach ($listSanPham as $key => $sanPham): ?>
                          <div class="product item-offer item">

                               <div class="sale">
                                    <span>Giảm 60%</span>
                               </div>
                               <a href="<?= BASE_URL . '?act=chi-tiet-san-pham&id_san_pham=' . $sanPham['id'] ?>">
                                    <div class="img-product">
                                         <img src="<?= BASE_URL . $sanPham['hinh_anh'] ?>" alt="" />
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
      </section>

      <section class="banner-children">
           <div class="banner banner1"></div>
           <div class="banner banner2"></div>
      </section>
      <section class="main-product">
           <div class="fruit-category">
                <div class="banner-fruit">
                     <span>Trái cây</span>
                </div>
                <div class="fruit-product">
                     <div class="list-fruit-product">
                          <?php foreach ($listSanPham as $key => $sanPham): ?>
                               <div class="product item-offer">
                                    <div class="sale">
                                         <span>Giảm 60%</span>
                                    </div>
                                    <a href="#">
                                         <div class="img-product">
                                              <img src="<?= BASE_URL . $sanPham['hinh_anh'] ?>" alt="" />
                                         </div>
                                         <div class="name-product">
                                              <a href=""><?= $sanPham['ten_san_pham'] ?></a>
                                         </div>
                                         <div class="price">

                                              <?php if ($sanPham['gia_khuyen_mai']) { ?>
                                                   <span
                                                        class="price-sale"><?= formatPrice($sanPham['gia_khuyen_mai']) . 'đ' ?></span>
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
                                    <div class="button-vegetable">
                                         <a href="#"><button>Xem tất cả</button></a>
                                    </div>
                               </div>
                          <?php endforeach ?>
      </section>


      <div class="vegetable-category">
           <div class="vegetable-product">
                <div class="list-vegetable-product">
                     <?php foreach ($listSanPham as $key => $sanPham): ?>
                          <div class="product item-offer">
                               <div class="sale">
                                    <span>Giảm 60%</span>
                               </div>
                               <a href="#">
                                    <div class="img-product">
                                         <img src="<?= BASE_URL . $sanPham['hinh_anh'] ?>" alt="" />
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
                </div>
           </div>
      <?php endforeach ?>
      <div class="button-vegetable">
           <a href="#"><button>Xem tất cả</button></a>
      </div>
      </div>
      <div class="banner-vegetable">
           <span>Rau củ</span>
      </div>



      </div>
      <div class="juice-category">
           <div class="banner-juice">
                <span>Nước ép</span>
           </div>
           <div class="juice-product">
                <div class="list-juice-product">
                     <?php foreach ($listSanPham as $key => $sanPham): ?>
                          <div class="product item-offer">
                               <div class="sale" hidden>
                                    <span>Giảm 60%</span>
                               </div>
                               <a href="#">
                                    <div class="img-product">
                                         <img src="<?= BASE_URL . $sanPham['hinh_anh'] ?>" alt="" />
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
                </div>
           </div>
      </div>
 <?php endforeach ?>
 </div>
 </div>



 <div class="meat-category">
      <div class="meat-product">
           <div class="list-meat-product">
                <?php foreach ($listSanPham as $key => $sanPham): ?>
                     <div class="product item-offer">
                          <div class="sale" hidden>
                               <span>Giảm 60%</span>
                          </div>
                          <a href="#">
                               <div class="img-product">
                                    <img src="<?= BASE_URL . $sanPham['hinh_anh'] ?>" alt="" />
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
           </div>
      </div>
 </div>
 <div class="button-meat">
      <a href="#"><button>Xem tất cả</button></a>
 </div>
 </div>
 <div class="banner-meat">
      <span>Thịt tươi</span>
 </div>
 </div>


 </section>
 <div class="banner3"></div>
 </main>
 <script src="public/js/main.js"></script>
 <?php require_once "./views/footer.php" ?>

 </html>