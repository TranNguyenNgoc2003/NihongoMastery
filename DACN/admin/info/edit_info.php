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
    $dbname = "dacn";

    $conn = new mysqli($localhost, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Kết nối đến cơ sở dữ liệu thất bại: " . $conn->connect_error);
    }
    $admin ="";
    $sqladmin = "SELECT * FROM admindata WHERE admin_email='$admin_email'";
    $resultad = $conn->query($sqladmin);
    if ($resultad->num_rows > 0) {
        $admin = $resultad->fetch_assoc();
    }

    $conn->close();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nihongo Mastery</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.0.1/css/bootstrap.min.css" integrity="sha512-Ez0cGzNzHR1tYAv56860NLspgUGuQw16GiOOp/I2LuTmpSK9xDXlgJz3XN4cnpXWDmkNBKXR/VDMTCnAaEooxA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.0.1/js/bootstrap.bundle.min.js" integrity="sha512-sH8JPhKJUeA9PWk3eOcOl8U+lfZTgtBXD41q6cO/slwxGHCxKcW45K4oPCUhHG7NMB4mbKEddVmPuTXtpbCbFA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link rel="stylesheet" href="./edit_info.css">
</head>
<body>
    <!-- style="border-bottom: 3px solid white; width: 173px;" -->
    <div class="container-fluid">
        <div class="header">
            <div id="bg-left" style="border-top-right-radius: 18px;">
                <div class="logo" >
                    <div class="img_logo">
                        <a href="#">
                            <img src="./../Image/Nihongo_Master_Logo.png" alt="">
                        </a>
                    </div>
                    <div class="name_logo">
                        <h4>
                            <a href="#"><span>Nihongo </span><br> <span style="display: flex; justify-content: end; margin-right: 30px;">Mastery</span></a>
                        </h4>   
                    </div>
                </div>
            </div>
            
           

            <div class="user_name ">
                <a href="./info.php">
                    <div class="name" style="font-weight: bold;  margin-right: 10px; font-size: 18px;">
                        <?php echo $admin['admin_name']; ?>
                    </div>
                    <i class="far fa-user-circle"></i>
                </a>
            </div>
        </div>
        <div class="content_menu" style="display: flex; ">
            <div id="bg-left" style="padding-bottom: 100px; border-bottom-left-radius: 18px;">
                <div class="list_menu">
                    <div class="line_menu">
                        <hr style="height: 2px; margin-top: 13px;">
                        <div class="text" style="width: 800px;">Quản lý khách hàng</div>
                        <hr style="height: 2px; margin-top: 13px;">
                    </div>
                    <ul>
                        
                        <li>
                            <a class="item" href="./../khachhang/search_khachhang.php">
                                <div class="icon">
                                    <i class="fas fa-users"></i>
                                </div>
                                <div class="text">
                                    Thông tin khách hàng
                                </div>
                            </a>
                        </li>
                        <li>
                            <a class="item" href="./../scoreJLPT/score.php">
                                <div class="icon">
                                    <i class="fa-solid fa-ranking-star"></i>
                                </div>
                                <div class="text">
                                    Kết quả thi JLPT
                                </div>
                            </a>
                        </li>
                        
                </div>
                <div class="list_menu" style="margin-top: 20px;">
                        <div class="line_menu">
                            <hr style="height: 2px; margin-top: 13px;">
                            <div class="text" style="width: 800px;">Quản lý Website</div>
                            <hr style="height: 2px; margin-top: 13px;">
                        </div>
                    <ul>
                        
                        <li>
                            <a class="item" href="./../kanji/search_item.php">
                                <div class="icon">
                                    <i class="fa-solid fa-book"></i>
                                </div>
                                <div class="text">
                                    Dữ liệu Kanji
                                </div>
                            </a>
                        </li>
                        <li>
                            <a class="item" href="./../JLPT/search_item.php">
                                <div class="icon">
                                    <i class="fa-regular fa-file-lines"></i>
                                </div>
                                <div class="text">
                                    Dữ liệu JLPT
                                </div>
                            </a>
                        </li>
                        
                    </ul>
                </div>
                <div class="list_menu" style="margin-top: 20px;">
                        <div class="line_menu">
                            <hr style="height: 2px; margin-top: 13px;">
                            <div class="text" style="width: 800px;">Đăng xuất</div>
                            <hr style="height: 2px; margin-top: 13px;">
                        </div>
                    <ul>
                        
                        <li>
                            <a class="item" href="./../logout/logout.php">
                                <div class="icon">
                                    <i class="fa-solid fa-right-from-bracket"></i>
                                </div>
                                <div class="text">
                                Đăng xuất
                                </div>
                            </a>
                        </li>
                    </ul>
                </div>
                
                
            </div>
            <!-- content -->
            <div class="container content">
                <div class="container menu">
                    <div class="home" id="item">
                        <div>
                            <i style=" font-size:18px; margin-right: 5px;" class="far fa-user"></i>
                            <span>Tài khoản</span>
                        </div>
                        
                    </div>
                    <div class="info"  id="item">
                        <a  href="./info.php" class="item_header">
                            Thông tin tài khoản
                        </a>
                    </div>
                    <div class="edit_info" id="item">
                        <a href="./edit_info.php" class="item_header">
                            Chỉnh sửa thông tin
                        </a>
                    </div>
                </div>
                <hr>
                <div class="container item_content">
                    <div class="right">
                        <form action="process_edit_info.php" method="post">
                            <div class="info">
                                <div class="item">
                                    Họ tên:
                                </div> 
                                <div class="info_data">
                                    <input type="text"
                                        class="form-control" name="edit_fullname" id="edit_fullname" aria-describedby="helpId" placeholder="" value="<?php echo $admin['admin_name']; ?>">
                                </div>
                            </div>
                            <div class="info">
                                <div class="item">
                                    Ngày sinh:
                                </div> 
                                <div class="info_data">
                                    <input type="text"
                                        class="form-control" name="edit_ngaysinh" id="edit_ngaysinh" aria-describedby="helpId" placeholder="" value="<?php echo $admin['NgaySinh']; ?>">
                                </div>
                            </div>
                            <div class="info">
                                <div class="item">
                                    Giới tính:
                                </div> 
                                <div class="info_data">
                                    <input type="text"
                                        class="form-control" name="edit_gioitinh" id="edit_gioitinh" aria-describedby="helpId" placeholder="" value="<?php echo $admin['GioiTinh']; ?>">
                                </div>
                            </div>
                            
                            <div class="info">
                                <div class="item">
                                    Địa chỉ:
                                </div> 
                                <div class="info_data">
                                    <input type="text"
                                        class="form-control" name="edit_diachi" id="edit_diachi" aria-describedby="helpId" placeholder="" value="<?php echo $admin['DiaChi']; ?>">
                                </div>
                            </div>
                            <div class="info">
                                <div class="item">
                                    SDT:
                                </div> 
                                <div class="info_data">
                                    <input type="text"
                                        class="form-control" name="edit_sdt" id="edit_sdt" aria-describedby="helpId" placeholder="" value="<?php echo $admin['admin_phone']; ?>">
                                </div>
                            </div>
                            <div class="info">
                                <div class="item">
                                    Password:
                                </div> 
                                <div class="info_data">
                                    <input type="password"
                                        class="form-control" name="edit_pass" id="edit_pass" aria-describedby="helpId" placeholder="" value="<?php echo $admin['admin_password']; ?>">
                                </div>
                            </div>
                            
                            <button style="margin-left: 100px; margin-top: 30px; background-color: rgb(0, 113, 199); border: none; width: 200px;" type="submit" class="btn btn-primary">Lưu thay đổi</button>
                        </form>
                    </div>
                    <div class="img" style="width: 400px;">
                        <img style="width: 100%;" src="./../Image/japan_logo.png" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>