
<!DOCTYPE html>
<html>
<head>
    <title>Chỉnh sửa đơn hàng</title>
    <link rel="stylesheet" type="text/css" href="http://localhost/baitaplon/Public/CSS/khachhangsua.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
</head>
<body>
    <div class="header">
        <div></div>
        <div class="header-item">
            <h2>Sửa thông tin đơn hàng</h2>
        </div>
        <div class="header-item">
           <a href="http://localhost/baitaplon/Qlidonhang">
                <button>
                    <i class="fa-solid fa-rotate-left"></i> Quay lại
                </button>
           </a>
        </div>
    </div>

    <div class="content">
        <form method="post" action="http://localhost/baitaplon/Qlidonhang/suadl">
            <table>
                <?php 
                    if(isset($data['dulieu']) && mysqli_num_rows($data['dulieu'])>0){
                        while($row=mysqli_fetch_assoc($data['dulieu'])){
                ?>
                 <input type="hidden" name="txtMadohangbandau" placeholder="Mã đơn hàng" class="width" value="<?php echo $row['Madonhang'];?>">
                <tr>
                    <td>Mã đơn hàng:</td>
                    <td>
                    <input type="text" name="txtMadonhang" placeholder="Mã đơn hàng" class="width" value="<?php echo $row['Madonhang'];?>" readonly>
                        </td>
                </tr>
                <tr>
                    <td>Tên đơn hàng:</td>
                    <td>
                        <input type="text" name="txtTendonhang" placeholder="Tên đơn hàng" class="width" value="<?php echo $row['Tendonhang'];?>">
                    </td>
                </tr>
                <tr>
                   <td>Mã khuyến mãi:</td>
                   <td>
                        <select name="txtMakhuyenmai" id="" value="<?php echo $row['Makhuyenmai'];?>">
                        <option value="">Mã khuyến mãi</option>
                            <?php
                                $qlidonhang = new Qlidonhang_m();
                                $qlidonhang->makm();
                            ?>
                        </select> 
                   </td>
                </tr>
                <tr>
                    <td>Mã sản phẩm:</td>
                    <td>
                    <select name="txtMaSP" id="" value="<?php echo $row['MaSP'];?>">
                        <option value="">Mã sản phẩm</option>
                            <?php
                                $qlidonhang = new Qlidonhang_m();
                                $qlidonhang->masp();
                            ?>
                        </select> 
                    </td>
                </tr>
                <tr>
                    <td>Mã khách hàng:</td>
                    <td>
                    <select name="txtMakh" id="" value="<?php echo $row['Makh'];?>">
                        <option value="">Mã khách hàng</option>
                            <?php
                                $qlidonhang = new Qlidonhang_m();
                                $qlidonhang->makh();
                            ?>
                        </select> 
                    </td>
                </tr>
                <tr>
                    <td>Thành tiền:</td>
                    <td>
                        <input type="text" name="txtThanhtien" placeholder="Trạng thái" class="width" value="<?php echo $row['Thanhtien'];?>" readonly>
                    </td>
                </tr>
                <tr>
                    <td>Trạng thái:</td>
                    <td>
                    <select name="txtTrangthai" id="" value="<?php echo $row['Trangthai'];?>">
                        <option value="Đã thanh toán">Đã thanh toán</option>
                        <option value="Chưa thanh toán">Chưa thanh toán</option>
                        </select>
                    </td>
                </tr>
                <?php
                        }
                    }
                ?>
                <tr>
                    <td></td>
                    <td>
                        <button class="button" name="btnSuaDH">
                            <i class="fa-solid fa-pen"></i> Sửa
                        </button>
                    </td>
                </tr>
            </table>
        </form>
    </div>
</body>
</html>

