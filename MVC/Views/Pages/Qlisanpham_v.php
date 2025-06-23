<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản lý kho hàng</title>
    <link rel="stylesheet" href="http://localhost/baitaplon/Public/CSS/qlisanpham.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <script src="http://localhost/baitaplon/Public/JS/xoa.js"></script>
</head>
<body>
    <div class="header">
        <div class="header-item">
            <h2>Quản lí sản phẩm</h2>
        </div>
        <div class="header-item">
            <a href="http://localhost/baitaplon/Qlisanphamthem/" style="text-decoration: none;">
                <button class="btnThem" type="submit">
                    <i class="fa-solid fa-plus"></i> Thêm sản phẩm
                </button>
            </a>
        </div>
    </div>
        
    <div class="content">
        <form method="post" action="http://localhost/baitaplon/Qlisanpham/timkiem">
            <table>
                <tr>
                    <td style="width: 30%;">Mã sản phẩm :</td>
                    <td>
                        <input type="text" class="width" id="txtMaSP" name="txtMaSP" 
                        value="<?php if(isset($data['MaSP'])) echo $data['MaSP'] ?>" placeholder="Mã sản phẩm">
                    </td>
                </tr>
                <tr>
                    <td style="width: 30%;">Tên sản phẩm :</td>
                    <td>
                        <input type="text" class="width" id="txtTenSP" name="txtTenSP" 
                        value="<?php if(isset($data['TenSP'])) echo $data['TenSP'] ?>" placeholder="Tên sản phẩm">    
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td>
                        <button type="submit" class="btnTimkiem" name="btnTimkiem" id="btnTimkiem">
                            <i class="fa-solid fa-magnifying-glass"></i> Tìm kiếm
                        </button>
                    </td>
                </tr>
            </table>
                    
            <table border="1" cellspacing="0">
                <thead>
                    <tr style="background: #e9e6e6;">
                        <th style="width: 5%;">STT</th>
                        <th style="width: 35%;">Mã sản phẩm</th>
                        <th style="width: 35%;">Tên sản phẩm</th>
                        <th>Thao tác</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        if(isset($data['dulieu']) && mysqli_num_rows($data['dulieu'])>0){
                            $i=0;
                            while($row=mysqli_fetch_assoc($data['dulieu'])){
                    ?>       
                            <tr style="text-align: center;">
                                <td><?php echo (++$i) ?></td>
                                <td><?php echo $row['MaSP']?></td>
                                <td><?php echo $row['TenSP']?></td>
                                <td>
                                    <a href="http://localhost/baitaplon/Qlisanpham/sua/<?php echo $row['MaSP'] ?>" class="btnsua">Sửa</a> 
                                    <a href="javascript:void(0);" onclick="confirmDelete('http://localhost/baitaplon/Qlisanpham/xoa/<?php echo $row['MaSP'] ?>')" class="btnxoa">Xóa</a>
                                    <a href="http://localhost/baitaplon/Qlisanpham/xemchitiet/<?php echo $row['MaSP'] ?>" class="btnxem" name="btnxem">Xem</a>
                                </td>
                            </tr>  
                    <?php   
                            }
                        }
                    ?>
                </tbody>
            </table>
        </form>
    </div>
</body>
</html>
