
<!DOCTYPE html>
<html>
<head>
    <title>Chỉnh sửa kho hàng</title>
    <link rel="stylesheet" type="text/css" href="http://localhost/baitaplon/Public/CSS/khohangsua.css">
    <!-- Thêm Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
</head>
<body>
    <div class="header">
        <div></div>
        <div class="header-item">
            <h2>Sửa thông tin kho hàng</h2>
        </div>
        <div class="header-item">
           <a href="http://localhost/baitaplon/Qlikhohang">
                <button>
                    <i class="fa-solid fa-rotate-left"></i> Quay lại
                </button>
           </a>
        </div>
    </div>

    <div class="content">
        <form method="post" action="http://localhost/baitaplon/Qlikhohang/suadl">
            <table>
                <?php 
                    if(isset($data['dulieu']) && mysqli_num_rows($data['dulieu'])>0){
                        while($row=mysqli_fetch_assoc($data['dulieu'])){
                ?>
                 <input type="hidden" name="txtMakhobandau" placeholder="Mã kho" class="width" value="<?php echo $row['Makho'];?>">
                <tr>
                    <td>Mã kho :</td>
                    <td>
                        <input type="text" name="txtMakho" placeholder="Mã kho" class="width" value="<?php echo $row['Makho'];?>" readonly>
                    </td>
                </tr>
                <tr>
                    <td>Tên kho :</td>
                    <td>
                        <input type="text" name="txtTenkho" placeholder="Tên kho" class="width" value="<?php echo $row['Tenkho'];?>">
                    </td>
                </tr>
                <tr>
                   <td>Địa chỉ :</td>
                   <td>
                        <input type="text" name="txtDiachi" placeholder="Địa chỉ" class="width" value="<?php echo $row['Diachi'];?>">
                   </td>
                </tr>
                    <td>Số điện thoại :</td>
                    <td>
                        <input type="number" name="nbSdt" placeholder="Số điện thoại" class="width" value="<?php echo $row['Sdt'];?>">
                    </td>
                </tr>
                <tr>
                    <td>Tên quản lý :</td>
                    <td>
                        <input type="text" name="txtTenquanly" placeholder="Tên quản lý" class="width" value="<?php echo $row['Tenquanly'];?>">
                    </td>
                </tr>
                <tr>
                    <td>Ghi chú :</td>
                    <td>
                        <input type="text" name="txtGhichu" placeholder="Ghi chú" class="width" value="<?php echo $row['Ghichu'];?>">
                    </td>
                </tr>
                <?php
                        }
                    }
                ?>
                <tr>
                    <td></td>
                    <td>
                        <button class="button" name="btnSuakho">
                            <i class="fa-solid fa-pen"></i> Sửa
                        </button>
                    </td>
                </tr>
            </table>
        </form>
    </div>
</body>
</html>

