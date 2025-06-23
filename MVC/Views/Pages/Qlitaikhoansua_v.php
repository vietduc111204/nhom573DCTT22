
<!DOCTYPE html>
<html>
<head>
    <title>Quản lý kho hàng</title>
    <link rel="stylesheet" type="text/css" href="http://localhost/baitaplon/Public/CSS/khachhangsua.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    
</head>
<body>
    <div class="header">
        <div></div>
        <div class="header-item">
            <h2>Sửa thông tin tài khoản</h2>
        </div>
        <div class="header-item">
           <a href="http://localhost/baitaplon/Qlitaikhoan">
                <button>
                    <i class="fa-solid fa-rotate-left"></i> Quay lại
                </button>
           </a>
        </div>
    </div>

    <div class="content">
        <form method="post" action="http://localhost/baitaplon/Qlitaikhoan/suadl">
            <table>
                <?php 
                    if(isset($data['dulieu']) && mysqli_num_rows($data['dulieu'])>0){
                        while($row=mysqli_fetch_assoc($data['dulieu'])){
                ?>
                 <input type="hidden" name="txtTaikhoanbandau" placeholder="Tài khoản" class="width" value="<?php echo $row['Taikhoan'];?>">
                <tr>
                    <td>Tài khoản :</td>
                    <td>
                        <input type="text" name="txtTaikhoan" placeholder="Tài khoản" class="width" value="<?php echo $row['Taikhoan'];?>">
                    </td>
                </tr>
                <tr>
                    <td>Mật khẩu :</td>
                    <td>
                        <input type="text" name="txtMatkhau" placeholder="Mật khẩu" class="width" value="<?php echo $row['Matkhau'];?>">
                    </td>
                </tr>
                <tr>
                   <td>Tên người dùng :</td>
                   <td>
                        <input type="text" name="txtTennguoidung" placeholder="Tên người dùng" class="width" value="<?php echo $row['Tennguoidung'];?>">
                   </td>
                </tr>
                <tr>
                   <td>Email :</td>
                   <td>
                        <input type="text" name="txtEmail" placeholder="Email" class="width" value="<?php echo $row['Email'];?>">
                   </td>
                </tr>
                <tr>
                    <td>Số điện thoại :</td>
                    <td>
                        <input type="number" name="nbSdt" placeholder="Số điện thoại" class="width" value="<?php echo $row['Sodienthoai'];?>">
                    </td>
                </tr>
                <?php
                        }
                    }
                ?>
                <tr>
                    <td></td>
                    <td>
                        <button class="button" name="btnSua">
                            <i class="fa-solid fa-pen"></i> Sửa
                        </button>
                    </td>
                </tr>
            </table>
        </form>
    </div>
</body>
</html>

