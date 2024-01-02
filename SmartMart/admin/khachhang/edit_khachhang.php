<?php

    session_start();

    $admin_email = $_SESSION['admin_email'];
    if (!isset($_SESSION['admin_email'])) {
        header("Location: ./../index.php");
        exit();
    }
    $localhost = "localhost";
    $username = "root";
    $password = "";
    $dbname = "sieuthi";

    $conn = new mysqli($localhost, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Kết nối đến cơ sở dữ liệu thất bại: " . $conn->connect_error);
    }
    $admin ="";
    $sql = "SELECT HoTen, ChucVu FROM NhanVien WHERE Email='$admin_email'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        $admin = $result->fetch_assoc();
    }
    $customer = array(); // Initialize $customer variable

    if (isset($_GET['phone_number'])) {
        $phone_number = $_GET['phone_number'];
    
        $sqlcheckkh = "SELECT * FROM KhachHang WHERE SoDienThoai = '$phone_number'";
        $resultcheckkh = $conn->query($sqlcheckkh);
    
        // Check if data is fetched successfully
        if ($resultcheckkh->num_rows > 0) {
            $customer = $resultcheckkh->fetch_assoc();
        }
    }
    $conn->close();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>  Smart Mart</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.0.1/css/bootstrap.min.css" integrity="sha512-Ez0cGzNzHR1tYAv56860NLspgUGuQw16GiOOp/I2LuTmpSK9xDXlgJz3XN4cnpXWDmkNBKXR/VDMTCnAaEooxA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.0.1/js/bootstrap.bundle.min.js" integrity="sha512-sH8JPhKJUeA9PWk3eOcOl8U+lfZTgtBXD41q6cO/slwxGHCxKcW45K4oPCUhHG7NMB4mbKEddVmPuTXtpbCbFA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link rel="stylesheet" href="./khachhang.css">
</head>
<body>
    <div class="container-fluid">
        <div class="header">
            <div id="bg-left" style="border-top-right-radius: 18px;">
                <div class="logo" >
                    <div class="img_logo">
                        <a href="./../home/home.php">
                            <img src="./../Image/logo.png" alt="">
                        </a>
                    </div>
                    <div class="name_logo">
                        <h3>
                            <a href="./../home/home.php">Smart Mart</a>
                        </h3>   
                    </div>
                </div>
            </div>
            
           

            <div class="user_name ">
                <div class="ChucVu" style="font-weight: bold;  margin-right: 20px; margin-top: 5px; font-size: 18px; border: 2px solid rgb(136, 0, 199); border-radius: 10px; padding: 5px 15px; height: 40px;">
                    <?php echo $admin['ChucVu']; ?>
                </div>
                <a href="#">
                    <div class="name" style="font-weight: bold;  margin-right: 10px; font-size: 18px;">
                        <?php echo $admin['HoTen']; ?>
                    </div>
                    <i class="fas fa-user"></i>
                </a>
            </div>
        </div>
        <div class="content_menu" style="display: flex; ">
            <div id="bg-left" style="padding-bottom: 100px; border-bottom-left-radius: 18px;">
                <div class="list_menu">
                        <div class="line_menu">
                            <hr>
                            <div class="text">Thông tin</div>
                            <hr>
                        </div>
                    <ul>
                        
                        <li>
                            <a class="item" href="./../nhanvien/search_nhanvien.php">
                                <div class="icon">
                                    <i class="fas fa-edit"></i>
                                </div>
                                <div class="text">
                                    Chỉnh sửa thông tin
                                </div>
                            </a>
                        </li>
                        <li>
                            <a class="item" href="./../lichlamviec/your_main_page.php">
                                <div class="icon">
                                    <i class="fas fa-calendar-week"></i>
                                </div>
                                <div class="text">
                                    Lịch làm việc
                                </div>
                            </a>
                        </li>
                        
                </div>
                <div class="list_menu" style="margin-top: 20px;">
                        <div class="line_menu">
                            <hr style="height: 2px; margin-top: 13px;">
                            <div class="text" style="width: 800px;">Quản lý khách hàng</div>
                            <hr style="height: 2px; margin-top: 13px;">
                        </div>
                    <ul>
                        
                        <li>
                            <a class="item" href="./../khachhang/search_khachhang.php"  style="border-bottom: 3px solid white; width: 173px;">
                                <div class="icon">
                                    <i class="fas fa-digital-tachograph"></i>
                                </div>
                                <div class="text">
                                    Dữ liệu khách hàng
                                </div>
                            </a>
                        </li>
                        <li>
                            <a class="item" href="./../khachhang/pagefeedback.php">
                                <div class="icon">
                                    <i class="fas fa-comment-alt"></i>
                                </div>
                                <div class="text">
                                    Phản hồi
                                </div>
                            </a>
                        </li>
                        
                    </ul>
                </div>
                <div class="list_menu" style="margin-top: 20px;">
                        <div class="line_menu">
                            <hr>
                            <div class="text" style="width: 700px;">Quản lý hàng hóa</div>
                            <hr>
                        </div>
                    <ul>
                        
                        <li>
                            <a class="item" href="./../hanghoa/product_management.php">
                                <div class="icon">
                                    <i class="fas fa-store"></i>
                                </div>
                                <div class="text">
                                    Sản phẩm cửa hàng
                                </div>
                            </a>
                        </li>
                        <li>
                            <a class="item" href="./../hanghoa/supplier_management.php">
                                <div class="icon">
                                    <i class="fa-solid fa-industry"></i>
                                </div>
                                <div class="text">
                                    Nhà cung cấp
                                </div>
                            </a>
                        </li>
                        
                    </ul>
                </div>
                
            </div>
            <!-- content -->
            <div class="container content">
                <h2>Sửa Thông Tin Khách Hàng</h2>
                <form method="post" action="update_khachhang.php">
                    <input type="hidden" name="customer_id" value="<?php echo $customer['MaKH']; ?>">
                    <div class="mb-3" style="width: 400px;">
                        <label for="" class="form-label">Họ Tên: </label>
                        <input
                            type="text"
                            class="form-control"
                            style="width: 300px;"
                            name="ho_ten"
                            id="ho_ten"
                            value="<?php echo $customer['HoTen']; ?>"
                        />  
                    </div>
                    <div class="mb-3" style="width: 400px;">
                        <label for="" class="form-label"> Ngày Sinh: </label>
                        <input
                            type="date"
                            class="form-control"
                            style="width: 300px;"
                            name="ngay_sinh"
                            id="ngay_sinh"
                            value="<?php echo $customer['NgaySinh']; ?>"
                        />  
                    </div>
                    <div class="mb-3" style="width: 400px;">
                        <label for="" class="form-label">Giới Tính:  </label>
                        <input
                            type="text"
                            class="form-control"
                            style="width: 300px;"
                            name="gioi_tinh"
                            id="gioi_tinh"
                            value="<?php echo $customer['GioiTinh']; ?>"
                        />  
                    </div>
                    <div class="mb-3" style="width: 400px;">
                        <label for="" class="form-label">Địa Chỉ:  </label>
                        <input
                            type="text"
                            class="form-control"
                            style="width: 300px;"
                            name="dia_chi"
                            id="dia_chi"
                            value="<?php echo $customer['DiaChi']; ?>"
                        />  
                    </div>
                    <div class="mb-3" style="width: 400px;">
                        <label for="" class="form-label">Số Điện Thoại: </label>
                        <input
                            type="text"
                            class="form-control"
                            style="width: 300px;"
                            name="so_dien_thoai"
                            id="so_dien_thoai"
                            value="<?php echo $customer['SoDienThoai']; ?>"
                        />  
                    </div>
                    <div class="mb-3" style="width: 400px;">
                        <label for="" class="form-label">Email: </label>
                        <input
                            type="email"
                            class="form-control"
                            style="width: 300px;"
                            name="email"
                            id="email"
                            value="<?php echo $customer['Email']; ?>"
                        />  
                    </div>
                    <button
                        type="submit"
                        class="btn btn-primary"
                        style="background-color: rgb(136, 0, 199); border: none;"
                    >
                        Cập nhật
                    </button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>