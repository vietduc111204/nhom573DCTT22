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
            <h2>Quản lí nhà cung cấp</h2>
        </div>
        <div class="header-item">
            <a href="http://localhost/baitaplon/Qlinhacungcapthem/" style="text-decoration: none;">
                <button class="btnThem  " type="submit">
                    <i class="fa-solid fa-plus"></i> Thêm nhà cung cấp
                </button>
            </a>
        </div>
    </div>
        
    <div class="content">
        <form method="post" action="http://localhost/baitaplon/Qlinhacungcap/timkiem">
            <table>
                <tr>
                    <td style="width: 30%;">Mã nhà cung cấp:</td>
                    <td>
                        <input type="text" class="width" id="txtMancc" name="txtMancc" 
                        value="<?php if(isset($data['Mancc'])) echo $data['Mancc'] ?>" placeholder="Mã nhà cung cấp">
                    </td>
                </tr>
                <tr>
                    <td style="width: 30%;">Tên nhà cung cấp:</td>
                    <td>
                        <input type="text" class="width" id="txtTenncc" name="txtTenncc" 
                        value="<?php if(isset($data['Tenncc'])) echo $data['Tenncc'] ?>" placeholder="Tên nhà cung cấp">    
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
                        <th style="width: 10%;">Mã nhà cung cấp</th>
                        <th style="width: 20%;">Tên nhà cung cấp</th>
                        <th style="width: 20%;">Email</th>   
                        <th style="width: 10%;">Số điện thoại</th>
                        <th style="width: 10%;">Địa chỉ</th>
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
                                <td><?php echo $row['Mancc']?></td>
                                <td><?php echo $row['Tenncc']?></td>
                                <td><?php echo $row['Email']?></td>
                                <td><?php echo $row['Sdt']?></td>
                                <td><?php echo $row['Diachi']?></td>
                                <td>
                                    <a href="http://localhost/baitaplon/Qlinhacungcap/sua/<?php echo $row['Mancc'] ?>" class="btnsua" >Sửa</a> 
                                    <a href="javascript:void(0);" onclick="confirmDelete('http://localhost/baitaplon/Qlinhacungcap/xoa/<?php echo $row['Mancc'] ?>' )" class="btnxoa" >Xóa </a>
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