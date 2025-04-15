<!DOCTYPE html>
<html>
<head>
    <title>Chi tiết sản phẩm</title>
    <link rel="stylesheet" href="http://localhost/baitaplon/Public/CSS/xemsanpham.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
</head>
<body>
    <div class="header">
        <div class="header item">
                <h1>Xem sản phẩm</h1>
                <div class="header-item">
                            <a href="http://localhost/baitaplon/Qlisanpham" > 
                <button>
                    <i class="fa-solid fa-rotate-left"></i> Quay lại
                </button></a>
                </div>
        </div>
    </div>
    <div class="content">
       <form action="http://localhost/baitaplon/Qlisanphamxem/xemchitiet" method="post">
     
                <table>
                <?php 
                    if(isset($data['dulieu']) && mysqli_num_rows($data['dulieu'])>0){
                        while($row=mysqli_fetch_assoc($data['dulieu'])){
                ?>
                <tr>
                    <td>Mã sản phẩm:</td>
                    <td><input type="text" name="Masp" value="<?php echo($row['MaSP']); ?>" readonly></td>
                </tr>
                <tr>
                    <td>Tên sản phẩm:</td>
                    <td><input type="text" name="Tensp" value="<?php echo($row['TenSP']); ?>" readonly></td>
                </tr>
                <tr>
                    <td>Mô tả:</td>
                    <td><input type="text" name="Mota" value="<?php echo($row['Mota']); ?>"  readonly></td>
                </tr>
                <tr>
                    <td>Mã nhà cung cấp:</td>
                    <td><input type="text" name="Mancc" value="<?php echo($row['Mancc']); ?>" readonly></td>
                </tr>
                <tr>
                    <td>Số lượng:</td>
                    <td><input type="text" name="Soluong" value="<?php echo($row['Soluong']); ?>" readonly></td>
                </tr>
                <tr>
                    <td>Mã danh mục:</td>
                    <td><input type="text" name="Madanhmuc" value="<?php echo($row['Madanhmuc']); ?>" readonly></td>
                </tr>
                <tr>
                    <td>Mã kho:</td>
                    <td><input type="text" name="Makho" value="<?php echo($row['Makho']); ?>" readonly></td>
                </tr>
                <tr>
                    <td>Đơn giá:</td>
                    <td><input type="text" name="Dongia" value="<?php echo($row['Dongia']); ?>" readonly></td>
                </tr>
                <?php
                        }
                    }
                ?>
                </table>
    </div>
       </form>
</body>
</html>