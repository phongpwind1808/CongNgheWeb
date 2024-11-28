<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <title>Manage Products</title>
</head>
<body>
    <div class="container mt-3 navbar p-3" style="background-color: #AAB7B7;width: 80%; margin: 0 auto;border-radius: 15px 15px 0 0;">
        <h1 class="text-light"><b>Quản lý sản phẩm</b></h1>
        <div class="buttons">
            <!-- Button to trigger Delete Modal -->
            <a href="#" class="btn btn-secondary mx-2" data-toggle="modal" data-target="#deleteEmployeeModal">
                <i class="fa-solid fa-circle-minus mx-2"></i><span>Xóa sản phẩm</span>
            </a>
            <!-- Button to trigger Add Modal -->
            <a href="#" class="btn btn-secondary mx-2" data-toggle="modal" data-target="#addEmployeeModal">
                <i class="fa-solid fa-circle-plus mx-2"></i><span>Thêm sản phẩm</span>
            </a>
        </div>
    </div>

    <!-- Delete Modal -->
    <div id="deleteEmployeeModal" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <form>
                    <div class="modal-header">						
                        <h4 class="modal-title">Xóa sản phẩm</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    </div>
                    <div class="modal-body">					
                        <p>Bạn có chắc chắn muốn xóa</p>
                        <p class="text-warning"><small></small></p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Hủy</button>
                        <button type="submit" class="btn btn-danger">Xóa</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Add Modal -->
    <div id="addEmployeeModal" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <form>
                    <div class="modal-header">						
                        <h4 class="modal-title">Thêm sản phẩm</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    </div>
                    <div class="modal-body">					
                        <div class="form-group">
                            <label>Tên</label>
                            <input type="text" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>Giá</label>
                            <input type="email" class="form-control" required>
                        </div>
                        				
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Hủy </button>
                        <button type="submit" class="btn btn-success">Thêm</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
<!-- lam the nao biet duoc sua ban ghi nao -->
