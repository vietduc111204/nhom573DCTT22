<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản lí đơn hàng</title>
    <link rel="stylesheet" href="http://localhost/baitaplon/Public/CSS/khachhangthem.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
</head>
<body>
    <div class="header">
        <div></div>
        <div class="header-item">
            <h2>Thêm đơn hàng</h2>
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
        <form method="post" action="http://localhost/baitaplon/Qlidonhangthem/them">
            <table>
                <tr>
                    <td>Mã đơn hàng</td>
                    <td>
                        <input type="text" name="txtMadonhang" placeholder="Mã đơn hàng" class="width">
                    </td>
                </tr>   
                <tr>
                    <td>Tên đơn hàng </td>
                    <td>
                        <input type="text" name="txtTendonhang" placeholder="Tên đơn hàng" class="width">
                    </td>
                </tr>
                <tr>
                    <td>Mã khuyến mãi</td>
                    <td>
                        <select name="txtMakhuyenmai" id="">
                        <option value="">Mã khuyến mãi</option>
                            <?php
                                $qlidonhang = new Qlidonhangthem_m();
                                $qlidonhang->makm();
                            ?>
                        </select> 
                    </td>
                </tr>
                <tr>
                    <td>Mã sản phẩm </td>
                    <td>
                        <select name="txtMaSP" id="">
                        <option value="">Mã sản phẩm</option>
                            <?php
                                $qlidonhang = new Qlidonhangthem_m();
                                $qlidonhang->masp();
                            ?>
                        </select> 
                    </td>
                </tr>
                <tr>
                    <td>Mã khách hàng </td>
                    <td>
                    <select name="txtMakh" id="">
                        <option value="">Mã khách hàng</option>
                            <?php
                                $qlidonhang = new Qlidonhangthem_m();
                                $qlidonhang->makh();
                            ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>Trạng thái </td>
                    <td>
                    <select name="txtTrangthai" id="" value="<?php echo $row['Trangthai'];?>">
                        <option value="Đã thanh toán">Đã thanh toán</option>
                        <option value="Chưa thanh toán">Chưa thanh toán</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td>
                        <button class="button" name="btnThem">
                            <i class="fa-solid fa-plus"></i> Thêm
                        </button>
                    </td>
                </tr>
            </table>
        </form>
    </div>
</body>
</html>
