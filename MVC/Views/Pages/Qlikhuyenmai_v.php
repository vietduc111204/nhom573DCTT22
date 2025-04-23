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
    <div class="header">
        <div class="header-item">
            <h2>Quản lí khuyến mãi</h2>
        </div>
        <div class="header-item">
            <a href="http://localhost/baitaplon/Qlikhuyenmaithem/" style="text-decoration: none;">
                <button class="btnThem  " type="submit">
                    <i class="fa-solid fa-plus"></i> Thêm mã khuyến mãi
                </button>
            </a>
        </div>
    </div>
        
    <div class="content">
        <form method="post" action="http://localhost/baitaplon/Qlikhuyenmai/timkiem">
            <table>
                <tr>
                    <td style="width: 30%;">Mã khuyến mãi:</td>
                    <td>
                        <input type="text" class="width" id="txtMakm" name="txtMakm" 
                        value="<?php if(isset($data['Makhuyenmai'])) echo $data['Makhuyenmai'] ?>" placeholder="Mã khuyến mãi">
                    </td>
                </tr>
                <tr>
                    <td style="width: 30%;">Mã sản phẩm:</td>
                    <td>
                        <input type="text" class="width" id="txtMaSP" name="txtMaSP" 
                        value="<?php if(isset($data['MaSP'])) echo $data['MaSP'] ?>" placeholder="Mã sản phẩm">    
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
                        <th style="width: 15%;">Mã khuyến mãi</th>
                        <th style="width: 15%;">Giá trị khuyến mãi</th>
                        <th style="width: 15%;">Mã sản phẩm</th>
                        <th style="width: 13%;">Mô tả</th>   
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
                                <td><?php echo $row['Makhuyenmai']?></td>
                                <td><?php echo $row['Giatrikm']?></td>
                                <td><?php echo $row['MaSP']?></td>
                                <td><?php echo $row['Mota']?></td>
                                <td>
                                    <a href="http://localhost/baitaplon/Qlikhuyenmai/sua/<?php echo $row['Makhuyenmai'] ?>" class="btnsua" >Sửa</a> 
                                    <a href="javascript:void(0);" onclick="confirmDelete('http://localhost/baitaplon/Qlikhuyenmai/xoa/<?php echo $row['Makhuyenmai'] ?>' )" class="btnxoa" >Xóa </a>
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