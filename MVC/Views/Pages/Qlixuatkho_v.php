<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản Lý Kho Hàng</title>
    <link rel="stylesheet" href="http://localhost/baitaplon/Public/CSS/xkho.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <script src="http://localhost/baitaplon/Public/JS/xoa.js"></script>
</head>
<body>
    <div class="header">
        <div class="header-item">
            <h2>Quản lí xuất kho</h2>
        </div>
        <div class="header-item">
            <a href="http://localhost/baitaplon/Qlixuatkhothem/" style="text-decoration: none;">
                <button class="btnXuatkho" type="submit">
                    <i class="fa-solid fa-plus"></i> Xuất kho
                </button>
            </a>
            <form method="post" action="http://localhost/baitaplon/Qlixuatkho/xuatexcel">
                <button class="btnXuatExcel" type="submit" name="btnXuatExcel">
                    <i class="fa-solid fa-download"></i> Xuất Excel
                </button>
            </form>   
        </div>
    </div>
    <form class="trang" method="post" action="http://localhost/baitaplon/Qlixuatkho/timkiem">
        <table>
            <tr>
                    <td style="width: 30%;">Mã xuất kho:</td>
                    <td>
                        <input type="text" class="width" id="txtMxk" name="txtMxk" 
                        value="<?php if(isset($data['Maxuatkho'])) echo $data['Maxuatkho'] ?>" placeholder="Mã xuất kho">    
                    </td>
                </tr>
                <tr>
                    <td style="width: 30%;">Mã đơn hàng:</td>
                    <td>
                        <input type="text" class="width" id="txtMadh" name="txtMadh" 
                        value="<?php if(isset($data['Madonhang'])) echo $data['Madonhang'] ?>" placeholder="Mã đơn hàng">
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
                    <th>STT</th>
                    <th>Mã xuất kho</th>
                    <th>Người xuất kho</th>
                    <th>Mã đơn hàng</th>
                    <th>Mã sản phẩm</th>
                    <th>Tên sản phẩm</th>
                    <th>Đơn giá</th>
                    <th>Số lượng</th>
                    <th>Thành tiền</th>
                    <th>Mã kho</th>
                    <th>Ngày xuất kho</th>
                    <th>Thao tác</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    if(isset($data['dulieu']) && mysqli_num_rows($data['dulieu'])>0){
                        $i=0;
                        while($row=mysqli_fetch_assoc($data['dulieu'])){
                            $thanhtien=$row['Dongia']*$row['Soluong'];
                ?>       
                        <tr style="text-align: center;">
                            <td><?php echo (++$i) ?></td>
                            <td><?php echo $row['Maxuatkho']?></td>
                            <td><?php echo $row['Nguoixuatkho']?></td>
                            <td><?php echo $row['Madonhang']?></td>
                            <td><?php echo $row['MaSP']?></td>
                            <td><?php echo $row['TenSP']?></td>
                            <td><?php echo $row['Dongia']?></td>
                            <td><?php echo $row['Soluong']?></td>
                            <td><?php echo $thanhtien ?></td>
                            <td><?php echo $row['Makho']?></td>
                            <td><?php echo $row['Ngayxuatkho']?></td>
                            <td>
                                <a href="http://localhost/baitaplon/Qlixuatkho/sua/<?php echo $row['Maxuatkho'] ?>" class="btnsua" >Sửa</a> 
                                <a href="javascript:void(0);" onclick="confirmDelete('http://localhost/baitaplon/Qlixuatkho/xoa/<?php echo $row['Maxuatkho'] ?>' )" class="btnxoa" >Xóa </a>
                            </td>
                        </tr>  
                <?php   
                        }
                    }
                ?>
            </tbody>
        </table>
    </form>
</body>
</html>
