<!-- Header -->
<?php
include './views/layout/header.php';
?>
<!-- Navbar -->
<?php
include './views/layout/navbar.php';
?>
<!-- /.navbar -->

<!-- Main Sidebar Container -->
<?php
include './views/layout/sidebar.php';
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
     <!-- Content Header (Page header) -->
     <section class="content-header">
          <div class="container-fluid">
               <div class="row mb-2">
                    <div class="col-sm-6">
                         <h1> </h1>
                    </div>
               </div>
          </div><!-- /.container-fluid -->
     </section>

     <!-- Main content -->
     <section class="content">
          <div class="container-fluid">
               <div class="row">
                    <div class="col-12">
                         <div class="card card-primary">
                              <div class="card-header">
                                   <h3 class="card-title">Sửa thông tin tài khoản khách hàng: <?= $khachHang['ho_ten'] ?></h3>
                              </div>


                              <form action="<?= BASE_URL_ADMIN . '?act=sua-khach-hang' ?>" method="POST">
                                <input type="hidden" name="khach_hang_id" value="<?= $khachHang['id'] ?>">
                                   <div class="card-body">

                                   <div class="form-group">
                                   <label>Tên khách hàng</label>
                                  <input type="text" class="form-control" name="ho_ten" value="<?= $khachHang['ho_ten'] ?>" placeholder="Nhập họ tên">
                                   <?php if (isset($_SESSION['errors']['ho_ten'])) { ?>
                                    <p class="text-danger"><?= $_SESSION['errors']['ho_ten'] ?></p>
                                   <?php } ?>
                                   </div>

                                   <div class="form-group">
                                   <label>Email</label>
                                  <input type="email" class="form-control" name="email" value="<?= $khachHang['email'] ?>" placeholder="Nhập email">
                                   <?php if (isset($_SESSION['errors']['email'])) { ?>
                                    <p class="text-danger"><?= $_SESSION['errors']['email'] ?></p>
                                   <?php } ?>
                                   </div>

                                   <div class="form-group">
                                   <label>Ngày sinh</label>
                                  <input type="text" class="form-control" name="ngay_sinh" value="<?= $khachHang['ngay_sinh'] ?>" >
                                   <?php if (isset($_SESSION['errors']['ngay_sinh'])) { ?>
                                    <p class="text-danger"><?= $_SESSION['errors']['ngay_sinh'] ?></p>
                                   <?php } ?>
                                   </div>

                                   <div class="form-group">
                                   <label>Giới tính</label>
                                   <select id="inputStatus" name="gioi_tinh" class="form-control custom-select">
                                   <option <?= $khachHang['gioi_tinh'] == 1 ? 'selected':'' ?>  value="1">Nam</option>
                                   <option <?= $khachHang['gioi_tinh'] !== 1 ? 'selected':'' ?> value="2">Nữ</option>
                                   </select> 
                                   </div>

                                   <div class="form-group">
                                   <label>Địa chỉ</label>
                                  <input type="date" class="form-control" name="dia_chi" value="<?= $khachHang['dia_chi'] ?>" placeholder="Nhập địa chỉ">
                                   <?php if (isset($_SESSION['errors']['dia_chi'])) { ?>
                                    <p class="text-danger"><?= $_SESSION['errors']['dia_chi'] ?></p>
                                   <?php } ?>
                                   </div>

                                   

                                  <div class="form-group">
                <label for="inputStatus">Trạng thái đơn hàng</label>
                <select id="inputStatus" name="trang_thai" class="form-control custom-select">
                <option <?= $khachHang['trang_thai'] == 1 ? 'selected':'' ?>  value="1">Active</option>
                <option <?= $khachHang['trang_thai'] !== 1 ? 'selected':'' ?> value="2">Inactive</option>
                </select>
              </div>

                                   </div>

                                   <div class="card-footer">
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                   </div>
                              </form>
                         </div>
                    </div>
                    <!-- /.col -->
               </div>
               <!-- /.row -->
          </div>
          <!-- /.container-fluid -->
     </section>
     <!-- /.content -->
</div>

<!-- /.content-wrapper -->
<!-- //Footer -->
<?php
include './views/layout/footer.php';
?>
<!-- //End Footer -->
<!-- Page specific script -->
<script>
     $(function() {
          $("#example1").DataTable({
               "responsive": true,
               "lengthChange": false,
               "autoWidth": false,
               // "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
          }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
          $('#example2').DataTable({
               "paging": true,
               "lengthChange": false,
               "searching": false,
               "ordering": true,
               "info": true,
               "autoWidth": false,
               "responsive": true,
          });
     });
</script>
<!-- Code injected by live-server -->

</body>

</html>