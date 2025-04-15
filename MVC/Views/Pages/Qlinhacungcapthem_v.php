<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản lí nhà cung cấp</title>
    <link rel="stylesheet" href="http://localhost/baitaplon/Public/CSS/khachhangthem.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
</head>
<body>
    <div class="header">
        <div></div>
        <div class="header-item">
            <h2>Thêm nhà cung cấp</h2>
        </div>
        <div class="header-item">
           <a href="http://localhost/baitaplon/Qlinhacungcap">
                <button>
                    <i class="fa-solid fa-rotate-left"></i> Quay lại
                </button>
           </a>
        </div>
    </div>

    <div class="content">
        <form method="post" action="http://localhost/baitaplon/Qlinhacungcapthem/them">
            <table>
                <tr>
                    <td>Mã nhà cung cấp</td>
                    <td>
                        <input type="text" name="txtMancc" placeholder="Mã nhà cung cấp" class="width">
                    </td>
                </tr>   
                <tr>
                    <td>Tên nhà cung cấp </td>
                    <td>
                        <input type="text" name="txtTenncc" placeholder="Tên nhà cung cấp" class="width">
                    </td>
                </tr>
                <tr>
                    <td>Email </td>
                    <td>
                        <input type="text" name="txtEmail" placeholder="Email" class="width">
                    </td>
                </tr>
                <tr>
                    <td>Số điện thoại</td>
                    <td>
                        <input type="number" name="nbSdt" placeholder="Số điện thoại" class="width">
                    </td>
                </tr>
                <tr>
                    <td>Địa chỉ</td>
                    <td>
                        <input type="text" name="txtDiachi" placeholder="Địa chỉ" class="width">
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
