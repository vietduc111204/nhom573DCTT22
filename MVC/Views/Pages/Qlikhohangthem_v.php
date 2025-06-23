<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm kho hàng</title>
    <link rel="stylesheet" href="http://localhost/baitaplon/Public/CSS/khachhangthem.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
</head>
<body>
    <div class="header">
        <div></div>
        <div class="header-item">
            <h2>Thêm kho hàng</h2>
        </div>
        <div class="header-item">
           <a href="http://localhost/baitaplon/Qlikhohang">
                <button>
                    <i class="fa-solid fa-rotate-left"></i> Quay lại
                </button>
           </a>
        </div>
    </div>

    <div class="container my-4">
        <form method="post" action="http://localhost/baitaplon/Qlikhohangthem/them">
            <table>
                <tr>
                    <td>Mã kho</td>
                    <td>
                        <input type="text" name="txtMakho" placeholder="Mã kho" class="width">
                    </td>
                </tr>   
                <tr>
                    <td>Tên kho </td>
                    <td>
                        <input type="text" name="txtTenkho" placeholder="Tên kho" class="width">
                    </td>
                </tr>
                <tr>
                    <td>Địa chỉ</td>
                    <td>
                        <input type="text" name="txtDiachi" placeholder="Địa chỉ" class="width">
                    </td>
                </tr>
                <tr>
                    <td>Số điện thoại</td>
                    <td>
                        <input type="number" name="nbSdt" placeholder="Số điện thoại" class="width">
                    </td>
                </tr>
                <tr>
                    <td>Tên quản lý </td>
                    <td>
                        <input type="text" name="txtTenquanly" placeholder="Tên quản lý" class="width">
                    </td>
                </tr>
                <tr>
                    <td>Ghi chú </td>
                    <td>
                        <input type="text" name="txtGhichu" placeholder="Ghi chú" class="width">
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
