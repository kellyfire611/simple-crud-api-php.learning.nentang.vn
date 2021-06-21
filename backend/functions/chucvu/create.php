<!-- Nhúng file cấu hình để xác định được Tên và Tiêu đề của trang hiện tại người dùng đang truy cập -->
<?php include_once(__DIR__ . '/../../layouts/config.php'); ?>

<!DOCTYPE html>
<html>

<head>
  <!-- Nhúng file quản lý phần HEAD -->
  <?php include_once(__DIR__ . '/../../layouts/head.php'); ?>
</head>

<body class="d-flex flex-column h-100">
  <!-- header -->
  <?php include_once(__DIR__ . '/../../layouts/partials/header.php'); ?>
  <!-- end header -->

  <div class="container-fluid">
    <div class="row">
      <!-- sidebar -->
      <?php include_once(__DIR__ . '/../../layouts/partials/sidebar.php'); ?>
      <!-- end sidebar -->

      <main role="main" class="col-md-10 ml-sm-auto px-4 mb-2">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
          <h1 class="h2">Thêm mới chức vụ</h1>
        </div>

        <!-- Block content -->
        <div id="noticeContainer" style="display: none;">
          <div class="alert alert-primary" role="alert">
            <div id="noticeMessage"></div>
          </div>
        </div>

        <form name="frmCreate" id="frmCreate" method="post" action="">
          <div class="form-group">
            <label for="CV_MA">Mã chức vụ</label>
            <input type="text" class="form-control" id="CV_MA" name="CV_MA" placeholder="Mã chức vụ" minlength="5" maxlength="5">
            <small id="idHelp" class="form-text text-muted">Mã chức vụ phải là duy nhất, có định dạng CVxxx.</small>
          </div>
          <div class="form-group">
            <label for="CV_TEN">Tên chức vụ</label>
            <input type="text" class="form-control" id="CV_TEN" name="CV_TEN" placeholder="Tên chức vụ" value="" minlength="3" maxlength="150">
          </div>
          <div class="form-group">
            <label for="CV_TILE">Tỉ lệ chức vụ</label>
            <input type="number" class="form-control" id="CV_TILE" name="CV_TILE" placeholder="Tỉ lệ chức vụ" value="" min="0" max="100">
          </div>
          <div class="form-group">
            <label for="CV_NAMAPDUNG">Năm áp dụng chức vụ</label>
            <input type="number" class="form-control" id="CV_NAMAPDUNG" name="CV_NAMAPDUNG" placeholder="Năm áp dụng chức vụ" value="" min="0001" max="9999">
          </div>
          <div class="form-group">
            <label for="CV_GHICHU">Ghi chú chức vụ</label>
            <textarea class="form-control" id="CV_GHICHU" name="CV_GHICHU" placeholder="Mô tả chức vụ" minlength="3" maxlength="150"></textarea>
          </div>
          <button class="btn btn-primary" name="btnSave">Lưu dữ liệu</button>
          <a href="index.php" class="btn btn-outline-primary">Quay về Danh sách</a>
        </form>
        <!-- End block content -->
      </main>
    </div>
  </div>

  <!-- footer -->
  <?php include_once(__DIR__ . '/../../layouts/partials/footer.php'); ?>
  <!-- end footer -->

  <!-- Nhúng file quản lý phần SCRIPT JAVASCRIPT -->
  <?php include_once(__DIR__ . '/../../layouts/scripts.php'); ?>

  <!-- Các file Javascript sử dụng riêng cho trang này, liên kết tại đây -->
  <!-- <script src="..."></script> -->
  <script>
    $(document).ready(function() {
      $("#frmCreate").validate({
        rules: {
          CV_MA: {
            required: true,
            minlength: 5,
            maxlength: 5
          },
          CV_TEN: {
            required: true,
            minlength: 3,
            maxlength: 150
          },
          CV_TILE: {
            required: true,
            number: true
          },
          CV_NAMAPDUNG: {
            required: true,
            minlength: 4,
            maxlength: 4
          },
          CV_GHICHU: {
            required: false,
            minlength: 3,
            maxlength: 150
          }
        },
        messages: {
          CV_MA: {
            required: "Vui lòng nhập mã chức vụ",
            minlength: "Tên chức vụ phải có ít nhất 5 ký tự",
            maxlength: "Tên chức vụ không được vượt quá 5 ký tự"
          },
          CV_TEN: {
            required: "Vui lòng nhập tên chức vụ",
            minlength: "Tên chức vụ phải có ít nhất 3 ký tự",
            maxlength: "Tên chức vụ không được vượt quá 150 ký tự"
          },
          CV_TILE: {
            required: "Vui lòng nhập tỉ lệ chức vụ",
            number: "Tỉ lệ chức vụ phải là số"
          },
          CV_NAMAPDUNG: {
            required: "Vui lòng nhập năm áp dụng chức vụ",
            minlength: "Năm áp dụng chức vụ phải có ít nhất 4 ký tự",
            maxlength: "Năm áp dụng chức vụ không được vượt quá 4 ký tự",
            number: "Năm áp dụng chức vụ phải là số"
          },
          CV_GHICHU: {
            required: "Vui lòng nhập ghi chú cho chức vụ",
            minlength: "Ghi chú cho chức vụ phải có ít nhất 3 ký tự",
            maxlength: "Ghi chú cho chức vụ không được vượt quá 150 ký tự"
          },
        },
        errorElement: "em",
        errorPlacement: function(error, element) {
          // Thêm class `invalid-feedback` cho field đang có lỗi
          error.addClass("invalid-feedback");
          if (element.prop("type") === "checkbox") {
            error.insertAfter(element.parent("label"));
          } else {
            error.insertAfter(element);
          }
        },
        success: function(label, element) {},
        highlight: function(element, errorClass, validClass) {
          $(element).addClass("is-invalid").removeClass("is-valid");
        },
        unhighlight: function(element, errorClass, validClass) {
          $(element).addClass("is-valid").removeClass("is-invalid");
        },

        submitHandler: function(form) {
          var sendData = {
            CV_MA: $('#CV_MA').val(),
            CV_TEN: $('#CV_TEN').val(),
            CV_TILE: $('#CV_TILE').val(),
            CV_NAMAPDUNG: $('#CV_NAMAPDUNG').val(),
            CV_GHICHU: $('#CV_GHICHU').val(),
          };
          $.ajax({
            url: '/api/chucvu/create.php',
            type: 'post',
            data: sendData,
            success: function(data) {
              var dataObj = JSON.parse(data);
              console.log(dataObj);
              
              var htmlString = `<span>${dataObj.msg}</span>`;
              $('#noticeMessage').html(htmlString + ". Sẽ chuyển hướng về trang Danh sách trong 3s...");
              $('#noticeContainer').css('display', 'block');

              if(dataObj.statusCode === 200) {
                // Điều hướng về trang danh sách trong vòng 3s
                setTimeout(() => {
                  location.href = "index.php";
                }, 3000);
                $('#noticeMessage').parent().removeClass().addClass('alert alert-success');
              } else {
                $('#noticeMessage').parent().removeClass().addClass('alert alert-danger');
              }
            },
            error: function() {
              var htmlString = `<span>Không thể xử lý</span>`;
              $('#noticeMessage').html(htmlString);
              $('#noticeMessage').parent().removeClass().addClass('alert alert-danger');
              $('#noticeContainer').css('display', 'block');
            }
          });
        }
      });
    });
  </script>
</body>

</html>