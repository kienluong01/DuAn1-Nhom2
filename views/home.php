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
                <!-- <img src="../public/img/slider_home.webp" alt="" /> -->
           </div>
           <button class="button-banner">
                Mua ngay <i class="fas fa-arrow-right"></i>
           </button>
      </section>
      <section class="product-category">
           <div class="category-item">
                <a href="#">
                     <img src="public/img/cate_4.webp" alt="" class="img-category" />
                     <span class="title-category">Hoa quả</span>
                </a>
           </div>
           <div class="category-item">
                <a href="#">
                     <img src="public/img/cate_5.webp" alt="" class="img-category" />
                     <span class="title-category">Rau củ</span>
                </a>
           </div>
           <div class="category-item">
                <a href="#">
                     <img src="public/img/seafood.webp" alt="" class="img-category" />
                     <span class="title-category">Thịt tươi sống</span>
                </a>
           </div>
           <div class="category-item">
                <a href="#">
                     <img src="public/img/cate_6.webp" alt="" class="img-category" />
                     <span class="title-category">Nước ép</span>
                </a>
           </div>
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
 <!-- <section class="news">
           <div class="title-news">
                <span>TIN TỨC</span>
           </div>
           <div class="list-news">
                <a href="#">
                     <div class="news-item">
                          <div class="img-news">
                               <img src="../public/img/untitled-6.webp" alt="" />
                          </div>
                          <div class="title-news-item">
                               <p>
                                    Rau xanh tăng giá vì trời mưa, người dân
                                    nội thành lao đao
                               </p>
                          </div>
                          <div class="desc-news-item">
                               <p class="time">
                                    Cafein Team | Ngày 28/02/2022
                               </p>
                               <br />
                               <p class="desc">
                                    Khoảng gần một tuần nay, do ảnh hưởng
                                    của những cơn mưa lớn kéo dài liên tiếp
                                    nên nguồn cung rau xanh cho các chợ bắt
                                    đầu khan hiếm, giá tăng mạnh, thậm chí
                                    nhiều loại giá tăng gần gấp đôi.
                               </p>
                          </div>
                     </div>
                </a>
                <a href="#">
                     <div class="news-item">
                          <div class="img-news">
                               <img src="../public/img/untitled-5.webp" alt="" />
                          </div>
                          <div class="title-news-item">
                               <p>
                                    Nhập khẩu rau quả vượt mốc 1 tỷ USD,
                                    Thái Lan chiếm 60% thị phần
                               </p>
                          </div>
                          <div class="desc-news-item">
                               <p class="time">
                                    Cafein Team | Ngày 28/02/2022
                               </p>
                               <br />
                               <p class="desc">
                                    Theo báo cáo từ Bộ NN&PTNT, giá trị xuất
                                    khẩu hàng rau quả tháng 9 năm 2017 ước
                                    đạt 294 triệu USD, đưa giá trị xuất khẩu
                                    hàng rau quả 9 tháng đầu năm 2017 ước
                                    đạt 2,64 tỷ USD, tăng 44,2% so với cùng
                                    kỳ năm 2016.
                               </p>
                          </div>
                     </div>
                </a>
                <a href="#">
                     <div class="news-item">
                          <div class="img-news">
                               <img src="../public/img/untitled-6.webp" alt="" />
                          </div>
                          <div class="title-news-item">
                               <p>
                                    Bí quyết bảo quản nho đen trong tủ lạnh
                                    tươi lâu hơn
                               </p>
                          </div>
                          <div class="desc-news-item">
                               <p class="time">
                                    Cafein Team | Ngày 28/02/2022
                               </p>
                               <br />
                               <p class="desc">
                                    Bí quyết lựa chọn và bảo quản nho tươi –
                                    Nho rất ngon và tốt cho sức khỏe, tuy
                                    nhiên nếu không biết cách bảo quản nho
                                    sẽ không để được lâu hoặc bị hỏng, không
                                    tốt cho sức khỏe. Hôm nay hãy tìm hiểu
                                    mẹo vặt lựa chọn và bảo quản nho tươi
                                    thật lâu mà vẫn giữ được độ tươi ngon
                                    nhé bạn.
                               </p>
                          </div>
                     </div>
                </a>
           </div>
      </section> -->
 </main>
 <script src="public/js/main.js"></script>
 <?php require_once "./views/footer.php" ?>

 </html>