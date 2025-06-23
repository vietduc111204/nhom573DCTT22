<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản lý kho hàng</title>
    <link rel="stylesheet" href="http://localhost/baitaplon/Public/CSS/khuyenmai.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <style>
        .footer{
            position: relative;
            top: 300px;
        }
    </style>
</head>

<body>
    <div class="header">
        <div class="header-item">
            <h2>Chi tiết tài khoản</h2>
        </div>
    </div>   
    <div class="content">     
        <form method="post" action="http://localhost/baitaplon/Qlisanpham/timkiem">          
            <table border="1" cellspacing="0">
                <thead>
                    <tr style="background: #e9e6e6;"  >
                        <th style="width: 5%;">STT</th>
                        <th style="width: 10%;">Tài khoản</th>
                        <th style="width: 10%;">Mật khẩu</th>
                        <th style="width: 20%;">Tên người dùng</th>   
                        <th style="width: 15%;">Email</th>
                        <th style="width: 15%;">Số điện thoại</th>
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
                                <td><?php echo $row['Taikhoan']?></td>
                                <td><?php echo $row['Matkhau']?></td>
                                <td><?php echo $row['Tennguoidung']?></td>
                                <td><?php echo $row['Email']?></td>
                                <td><?php echo $row['Sodienthoai']?></td>
                                <td>
                                    <a href="http://localhost/baitaplon/Qlitaikhoan/sua/<?php echo $row['Taikhoan'] ?>" class="btnsua" >Sửa</a> 
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
