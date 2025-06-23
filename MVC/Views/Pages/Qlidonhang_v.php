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
            <h2>Quản lí đơn hàng</h2>
        </div>
        <div class="header-item">
            <a href="http://localhost/baitaplon/Qlidonhangthem/" style="text-decoration: none;">
                <button class="btnThem  " type="submit">
                    <i class="fa-solid fa-plus"></i> Thêm đơn hàng
                </button>
            </a>
        </div>
    </div>
        
    <div class="content">
        <form method="post" action="http://localhost/baitaplon/Qlidonhang/timkiem">
            <table>
                <tr>
                    <td style="width: 30%;">Mã đơn hàng:</td>
                    <td>
                        <input type="text" class="width" id="txtMadonhang" name="txtMadonhang" 
                        value="<?php if(isset($data['Madonhang'])) echo $data['Madonhang'] ?>" placeholder="Mã đơn hàng">
                    </td>
                </tr>
                <tr>
                    <td style="width: 30%;">Tên đơn hàng:</td>
                    <td>
                        <input type="text" class="width" id="txtTendonhang" name="txtTendonhang" 
                        value="<?php if(isset($data['Tendonhang'])) echo $data['Tendonhang'] ?>" placeholder="Tên đơn hàng">    
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
                        <th style="width: 10%;">Mã đơn hàng</th>
                        <th style="width: 10%;">Tên đơn hàng</th>
                        <th style="width: 10%;">Mã khuyến mãi</th>
                        <th style="width: 10%;">Mã sản phẩm</th>
                        <th style="width: 10%;">Mã khách hàng</th>
                        <th style="width: 10%;">Thành tiền</th>
                        <th style="width: 10%;">Trạng thái</th>   
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
                                <td><?php echo $row['Madonhang']?></td>
                                <td><?php echo $row['Tendonhang']?></td>
                                <td><?php echo $row['Makhuyenmai']?></td>
                                <td><?php echo $row['MaSP']?></td>
                                <td><?php echo $row['Makh']?></td>
                                <td><?php echo $row['Thanhtien']?></td>
                                <td><?php echo $row['Trangthai']?></td>
                                <td>
                                    <a href="http://localhost/baitaplon/Qlidonhang/sua/<?php echo $row['Madonhang'] ?>" class="btnsua" >Sửa</a> 
                                    <a href="javascript:void(0);" onclick="confirmDelete('http://localhost/baitaplon/Qlidonhang/xoa/<?php echo $row['Madonhang'] ?>' )"class="btnxoa" >Xóa </a>
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