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
          <h1 class="h2">Danh sách các Chức vụ</h1>
        </div>

        <!-- Block content -->
        <div id="noticeContainer" style="display: none;">
          <div class="alert alert-primary" role="alert">
            <div id="noticeMessage"></div>
          </div>
        </div>
        
        <!-- Nút tải dữ liệu, bấm vào sẽ gọi Request AJAX đến API để load dữ liệu -->
        <a href="#" id="btnLoadData" class="btn btn-success">
          Tải dữ liệu
        </a>
        <!-- Nút thêm mới, bấm vào sẽ hiển thị form nhập thông tin Thêm mới -->
        <a href="create.php" class="btn btn-primary">
          Thêm mới
        </a>
        <table id="tblList" class="table table-bordered table-hover mt-2">
          <thead class="thead-dark">
            <tr>
              <th>Mã chức vụ</th>
              <th>Tên chức vụ</th>
              <th>Tỉ lệ chức vụ</th>
              <th>Năm áp dụng chức vụ</th>
              <th>Ghi chú chức vụ</th>
              <th>Hành động</th>
            </tr>
          </thead>
          <tbody>
          </tbody>
        </table>
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
  <script>
  $(function() {
    function getDuLieuChucVu() {
      $.ajax('/api/chucvu/get.php', {
        success: function(data) {
          var dataObj = JSON.parse(data);
          console.log(dataObj);
          var htmlString = ``;
          $.each(dataObj.data, function(index, item) {
            let aEdit = `<a href="edit.php?CV_MA=${item.CV_MA}" class="btn btn-primary"><i class="fa fa-edit"></i>Sửa</a>`;
            let aDelete = `<button type="button" data-cv_ma="${item.CV_MA}" class="btn btn-danger btnDelete"><i class="fa fa-remove"></i>Xóa</button>`;

            htmlString += `<tr>`;
            htmlString += `<td>${item.CV_MA}</td>`;
            htmlString += `<td>${item.CV_TEN}</td>`;
            htmlString += `<td>${item.CV_TILE}</td>`;
            htmlString += `<td>${item.CV_NAMAPDUNG}</td>`;
            htmlString += `<td>${item.CV_GHICHU}</td>`;
            htmlString += `<td>${aEdit}${aDelete}</td>`;
            htmlString += `</tr>`;
          });

          $('#tblList tbody').html(htmlString);
          $('#noticeMessage').html(`<span>${dataObj.msg}</span>`);
          $('#noticeMessage').parent().removeClass().addClass('alert alert-primary');
          $('#noticeContainer').css('display', 'block');
          dangKySuKienXoa();

        },
        error: function() {
          var htmlString = `<span>Không thể xử lý</span>`;
          $('#noticeMessage').html(htmlString);
          $('#noticeMessage').parent().removeClass().addClass('alert alert-danger');
          $('#noticeContainer').css('display', 'block');
        }
      });
    }

    function dangKySuKienXoa() {
      // Cảnh báo khi xóa
      // 1. Đăng ký sự kiện click cho các phần tử (element) đang áp dụng class .btnDelete
      $('.btnDelete').click(function(event) {
        let parentRowEle = $(this).closest('tr');

        // Click hanlder
        // Hiện cảnh báo khi bấm nút xóa
        swal({
            title: "Bạn có chắc chắn muốn xóa?",
            text: "Một khi đã xóa, không thể phục hồi....",
            icon: "warning",
            buttons: true,
            dangerMode: true,
            confirmButtonText: 'Chắc chăn XÓA!',
            cancelButtonText: "Hủy bỏ!",
        })
        .then((willDelete) => {
            if (willDelete) { // Nếu đồng ý xóa
                
                // 2. Lấy giá trị của thuộc tính (custom attribute HTML) 'CV_MA'
                // var CV_MA = $(this).attr('data-CV_MA');
                var CV_MA = $(this).data('cv_ma');
                var apiDeleteUrl = "/api/chucvu/delete.php?CV_MA=" + CV_MA;
                
                // 3. Gởi Request AJAX đếm API delete, với tham số CV_MA=?
                $.ajax(apiDeleteUrl, {
                  success: function(data) {
                    var dataObj = JSON.parse(data);
                    console.log(dataObj);
                    
                    var htmlString = `<span>${dataObj.msg}</span>`;
                    $('#noticeMessage').html(htmlString);
                    $('#noticeContainer').css('display', 'block');

                    if(dataObj.statusCode === 200) {
                      // Xóa dòng đang chứa button (người dùng đã click XÓA) ra khỏi table
                      parentRowEle.remove();
                      $('#noticeMessage').parent().removeClass().addClass('alert alert-success');
                    } else {
                      $('#noticeMessage').parent().removeClass().addClass('alert alert-danger');
                    }
                  },
                  error: function() {
                    var htmlString = `<span>Không thể xử lý XÓA?!</span>`;
                    $('#noticeMessage').html(htmlString);
                    $('#noticeMessage').parent().removeClass().addClass('alert alert-danger');
                    $('#noticeContainer').css('display', 'block');
                  }
                });
            } else {
                swal("Thao tác đã được Hủy bỏ!");
            }
        });
      });
    };

    $('#btnLoadData').on('click', function(event) {
      event.preventDefault();
      getDuLieuChucVu();
    });

    // Init
    getDuLieuChucVu();
  });
  </script>
</body>

</html>