<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="http://localhost/baitaplon/Public/CSS/khuyenmaithem.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
</head>
<body>
    <div class="header">
        <div class="header-item">
            <h2>Sửa mã khuyến mãi</h2>
        </div>
        <div class="header-item">
           <a href="http://localhost/baitaplon/Qlikhuyenmai/all">
                <button>
                    <i class="fa-solid fa-rotate-left"></i> Quay lại
                </button>
           </a>
        </div>
    </div>

    <div class="content">
        <form method="post" action="http://localhost/baitaplon/Qlikhuyenmai/suadl">
            <table>
                <?php 
                    if(isset($data['dulieu']) && mysqli_num_rows($data['dulieu'])>0){
                        while($row=mysqli_fetch_assoc($data['dulieu'])){
                ?>
                <input type="hidden" name="txtMakmbandau" placeholder="Mã khuyến mãi" class="width" value="<?php echo $row['Makhuyenmai'];?>">
                <tr>
                    <td>Mã khuyến mãi</td>
                    <td>
                        <input type="text" name="txtMakm" placeholder="Mã khuyến mãi" class="width" value="<?php echo $row['Makhuyenmai'];?>" readonly>
                    </td>
                </tr>
                <tr>
                    <td>Giá trị khuyến mãi</td>
                    <td>
                        <input type="text" name="txtGtrikm" placeholder="Giá trị khuyến mãi" class="width" value="<?php echo $row['Giatrikm'];?>">
                    </td>
                </tr>
                <tr>
                   <td>Mã sản phẩm</td>
                   <td>
                        <select name="slcMaSP" id="" value="<?php echo $row['MaSP'];?>">
                            <option value="">Mã sản phẩm</option>
                            <?php
                                $qlikhuyenmai= new Qlikhuyenmai_m();
                                $qlikhuyenmai->masp();
                            ?>        
                        </select>
                   </td>
                </tr>
                <tr>
                    <td>Mô tả</td>
                    <td>
                        <input type="text" name="txtMota" placeholder="Mô tả" class="width" value="<?php echo $row['Mota'];?>">
                    </td>
                </tr>
                <?php
                        }
                    }
                ?>
                <tr>
                    <td></td>
                    <td>
                        <button class="button" name="btnThem">
                            <i class="fa-solid fa-pen"></i> Sửa mã khuyến mãi
                        </button>
                    </td>
                </tr>
            </table>
        </form>
    </div>
</body>
</html>
