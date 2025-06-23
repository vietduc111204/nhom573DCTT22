<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản Lý Kho Hàng</title>
    <link rel="stylesheet" href="http://localhost/baitaplon/Public/CSS/nhapkho1.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <script src="http://localhost/baitaplon/Public/JS/xoa.js"></script>
</head>
<body>
    <div class="header">
        <div class="header-item">
            <h2>Quản lí nhập kho</h2>
        </div>
        <div class="header-item">
            <a href="http://localhost/baitaplon/Qlinhapkhothem/" style="text-decoration: none;">
                <button class="btnNhapkho" type="submit">
                    <i class="fa-solid fa-plus"></i> Nhập kho
                </button>
            </a>
        </div>
    </div>
    
    <div class="content">
        <form class="trang" method="post" action="http://localhost/baitaplon/Qlinhapkho/timkiem">
            <table>
            <tr>
                    <td style="width: 30%;">Mã nhập kho:</td>
                    <td>
                        <input type="text" class="width" id="txtMnk" name="txtMnk" 
                        value="<?php if(isset($data['Manhapkho'])) echo $data['Manhapkho'] ?>" placeholder="Mã nhập kho">    
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
                        <button class="btnXuat" type="submit" name="btnXuat">
                            <i class="fa-solid fa-download"></i> Xuất Excel
                        </button>
                    </td>
                </tr>
            </table>
                    
            <table border="1" cellspacing="0">
                <thead>
                    <tr style="background: #e9e6e6;"  >
                        <th style="width: 3%;">STT</th>
                        <th style="width: 12%;">Mã nhập kho</th>
                        <th style="width: 12%;">Tên nhà cung cấp</th>
                        <th style="width: 12%;">Tên người nhập</th>
                        <th style="width: 7%;">Mã sản phẩm</th>
                        <th style="width: 7%;">Tên sản phẩm</th>
                        <th style="width: 7%;">Mã nhà cung cấp</th>
                        <th style="width: 7%;">Mã kho</th>   
                        <th style="width: 7%;">Số lượng</th>
                        <th style="width: 7%;">Đơn giá</th>
                        <th style="width: 7%;">Thành tiền</th>
                        <th style="width: 13%;">Ngày nhập</th>
                        <th style="width: 5%;">Mô tả</th>
                      
                        <th style="width: 5%;">Mã danh mục</th>
                        <th >Thao tác</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        if(isset($data['dulieu']) && mysqli_num_rows($data['dulieu'])>0){
                            $i=0;
                            while($row=mysqli_fetch_assoc($data['dulieu'])){
                                $thanhtien=$row['Soluong']*$row['Dongia'];
                    ?>       
                            <tr style="text-align: center;">
                                <td><?php echo (++$i) ?></td>
                                <td><?php echo $row['Manhapkho']?></td>
                                <td><?php echo $row['Tenncc']?></td>
                                <td><?php echo $row['Tennguoinhap']?></td> 
                                <td><?php echo $row['MaSP']?></td>
                                <td><?php echo $row['TenSP']?></td>
                                <td><?php echo $row['Mancc']?></td>
                                <td><?php echo $row['Makho']?></td>
                                <td><?php echo $row['Soluong']?></td>
                                <td><?php echo $row['Dongia']?></td>
                                <td><?php echo $thanhtien?></td>
                                <td><?php echo $row['Ngaynhap']?></td>
                                <td><?php echo $row['Mota']?></td>
                                
                                <td><?php echo $row['Madanhmuc']?></td>
                                <td>
                                    <a href="http://localhost/baitaplon/Qlinhapkho/sua/<?php echo $row['Manhapkho'] ?>" class="btnsua" >Sửa</a> 
                                    <a href="javascript:void(0);" onclick="confirmDelete('http://localhost/baitaplon/Qlinhapkho/xoa/<?php echo $row['Manhapkho'] ?>' )" class="btnxoa" >Xóa </a>
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
