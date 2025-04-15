<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản Lý Kho Hàng</title>
    <link rel="stylesheet" href="http://localhost/baitaplon/Public/CSS/home2.css">
</head>
<body>
    <header>
        <a href="http://localhost/baitaplon/home" style="text-decoration:  none;">
            <h1 class="ten"><i class="fa-solid fa-house"></i> QUẢN LÝ KHO HÀNG</h1>
        </a>  
        <a href="http://localhost/baitaplon/dangnhap" class="DK"><i class="fa-solid fa-right-from-bracket"></i> Đăng Xuất</a>
    </header>
    <nav>   
        <ul id="Menu">
            <li class="TC"><a href="http://localhost/baitaplon/home"><i class="fa-solid fa-inbox"></i> Trang Chủ</a></li>
            <li><a href="http://localhost/baitaplon/home"><i class="fa-solid fa-bars"></i> Danh Mục Quản Lý</a>
                <ul class="menu1">
                    <li><a href="http://localhost/baitaplon/Qlikhohang"><i class="fa-solid fa-box-open"></i> Quản Lý Kho Hàng</a></li>
                    <li><a href="http://localhost/baitaplon/Qlinhapkho/All"><i class="fa-solid fa-truck-ramp-box"></i> Quản lý Nhập Kho</a></li>
                    <li><a href="http://localhost/baitaplon/Qlixuatkho/all"><i class="fa-solid fa-truck-fast"></i> Quản Lý Xuất Kho</a></li>
                    <li><a href="http://localhost/baitaplon/tonkho"><i class="fa-solid fa-cube"></i> Quản Lý Tồn Kho</a></li>
                    <li><a href="http://localhost/baitaplon/Qlisanpham"><i class="fa-solid fa-shop"></i> Quản Lý Sản Phẩm</a></li>
                    <li><a href="http://localhost/baitaplon/Qlinhacungcap"><i class="fa-regular fa-circle-user"></i> Quản Lý Nhà Cung Cấp</a></li>
                    <li><a href="http://localhost/baitaplon/Qlikhachhang"><i class="fa-solid fa-circle-user"></i> Quản Lý Khách Hàng</a></li>
                    <li><a href="http://localhost/baitaplon/Qlikhuyenmai/all"><i class="fa-solid fa-ticket"></i> Quản Lý Khuyến Mãi</a></li>
                    <li><a href="http://localhost/baitaplon/Qlidonhang"><i class="fa-solid fa-cart-shopping"></i> Quản Lý Đơn Hàng</a></li>
                    
                    <li><a href="http://localhost/baitaplon/danhmuc"><i class="fa-solid fa-outdent"></i> Quản Lý Danh Mục</a></li>
                </ul>
            </li>
            <li><a href="http://localhost/baitaplon/Qlitaikhoan"><i class="fa-solid fa-user"></i> Tài Khoản</a></li>
            <li><a href="http://localhost/baitaplon/thongke"><i class="fa-solid fa-money-bill"></i> Thống Kê</a></li>
        </ul>
    </nav>
    <div>
        <?php 
            include_once './MVC/Views/Pages/'.$data['page'].'.php';
        ?>
    </div>
   <div class="footer">
        <p>© 2024 Quản Lý Kho Hàng</p>
    </div>
</div>
</body>
</html>
