
<!DOCTYPE html>
<html>
<head>
    <title>Chỉnh sửa khách hàng</title>
    <link rel="stylesheet" type="text/css" href="http://localhost/baitaplon/Public/CSS/khachhangsua.css">
    <!-- Thêm Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
</head>
<body>
    <div class="header">
        <div></div>
        <div class="header-item">
            <h2>Sửa thông tin khách hàng</h2>
        </div>
        <div class="header-item">
           <a href="http://localhost/baitaplon/Qlikhachhang">
                <button>
                    <i class="fa-solid fa-rotate-left"></i> Quay lại
                </button>
           </a>
        </div>
    </div>

    <div class="content">
        <form method="post" action="http://localhost/baitaplon/Qlikhachhang/suadl">
            <table>
                <?php 
                    if(isset($data['dulieu']) && mysqli_num_rows($data['dulieu'])>0){
                        while($row=mysqli_fetch_assoc($data['dulieu'])){
                ?>
                 <input type="hidden" name="txtMakhachhangbandau" placeholder="Mã khách hàng" class="width" value="<?php echo $row['Makh'];?>">
                <tr>
                    <td>Mã khách hàng :</td>
                    <td>
                        <input type="text" name="txtMakh" placeholder="Mã khách hàng" class="width" value="<?php echo $row['Makh'];?>" readonly>
                    </td>
                </tr>
                <tr>
                    <td>Tên khách hàng :</td>
                    <td>
                        <input type="text" name="txtTenkh" placeholder="Tên khách hàng" class="width" value="<?php echo $row['Tenkh'];?>">
                    </td>
                </tr>
                <tr>
                    <td>Số điện thoại :</td>
                    <td>
                        <input type="number" name="nbSdt" placeholder="Số điện thoại" class="width" value="<?php echo $row['Sdt'];?>">
                    </td>
                </tr>
                <tr>
                   <td>Địa chỉ :</td>
                   <td>
                        <input type="text" name="txtDiachi" placeholder="Địa chỉ" class="width" value="<?php echo $row['Diachi'];?>">
                   </td>
                </tr>
                
                <?php
                        }
                    }
                ?>
                <tr>
                    <td></td>
                    <td>
                        <button class="button" name="btnSuakhachhang">
                            <i class="fa-solid fa-pen"></i> Sửa
                        </button>
                    </td>
                </tr>
            </table>
        </form>
    </div>
</body>
</html>

