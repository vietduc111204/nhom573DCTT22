<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản lý kho hàng</title>
    <link rel="stylesheet" href="http://localhost/baitaplon/Public/CSS/khuyenmai.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <script src="http://localhost/baitaplon/Public/JS/xoa.js"></script>
</head>
<body>
<body>
    <div class="header">
        <div class="header-item">
            <h2>Quản lí kho hàng</h2>
        </div>
        <div class="header-item">
            <a href="http://localhost/baitaplon/Qlikhohangthem/" style="text-decoration: none;">
                <button class="btnThem  " type="submit">
                    <i class="fa-solid fa-plus"></i> Thêm kho hàng
                </button>
            </a>
        </div>
    </div>
        
    <div class="content">
        <form method="post" action="http://localhost/baitaplon/Qlikhohang/timkiem">
            <table>
                <tr>
                    <td style="width: 30%;">Mã kho hàng:</td>
                    <td>
                        <input type="text" class="width" id="txtMakho" name="txtMakho" 
                        value="<?php if(isset($data['Makh'])) echo $data['Makho'] ?>" placeholder="Mã kho hàng">
                    </td>
                </tr>
                <tr>
                    <td style="width: 30%;">Tên kho hàng:</td>
                    <td>
                        <input type="text" class="width" id="txtTenkho" name="txtTenkho" 
                        value="<?php if(isset($data['Tenkho'])) echo $data['Tenkho'] ?>" placeholder="Tên kho hàng">    
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
                    <tr style="background: #e9e6e6;"  >
                        <th style="width: 5%;">STT</th>
                        <th style="width: 12%;">Mã kho hàng</th>
                        <th style="width: 13%;">Tên kho hàng</th>
                        <th style="width: 16%;">Địa chỉ</th>   
                        <th style="width: 13%;">Số điện thoại</th>
                        <th style="width: 15%;">Tên quản lý</th>
                        <th style="width: 10%;">Ghi chú</th>
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
                                <td><?php echo $row['Makho']?></td>
                                <td><?php echo $row['Tenkho']?></td>
                                <td><?php echo $row['Diachi']?></td>
                                <td><?php echo $row['Sdt']?></td>
                                <td><?php echo $row['Tenquanly']?></td>
                                <td><?php echo $row['Ghichu']?></td>
                                <td>
                                    <a href="http://localhost/baitaplon/Qlikhohang/sua/<?php echo $row['Makho'] ?>" class="btnsua" >Sửa</a> 
                                    <a href="javascript:void(0);" onclick="confirmDelete('http://localhost/baitaplon/Qlikhohang/xoa/<?php echo $row['Makho'] ?>' )" class="btnxoa" >Xóa </a>
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
</body>
</html>