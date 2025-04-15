<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản lý kho hàng</title>
    <link rel="stylesheet" href="http://localhost/baitaplon/Public/CSS/xuatkhothem.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <script src="http://localhost/baitaplon/Public/JS/soluong.js"></script>
</head>
<body>
    <div class="header">
        <div class="header-item">
            <h2>Xuất kho</h2>
        </div>
        <div class="header-item">
           <a href="http://localhost/baitaplon/Qlixuatkho/All" style="text-decoration: none;">
                <button>
                    <i class="fa-solid fa-rotate-left"></i> Quay lại
                </button>
           </a>
           <a href="http://localhost/baitaplon/Qlixuatkhochitiet/" >
                <button class="btnNhapkho" type="submit">
                    <i class="fa-solid fa-plus"></i> Xuất kho chi tiết
                </button>
            </a>
        </div>
    </div>

    <div class="content">
        <form method="post" action="http://localhost/baitaplon/Qlixuatkhothem/them">
            <table>
                <tr>
                    <td>Mã xuất kho</td>
                    <td>
                        <input type="text" name="txtMxk" placeholder="Mã xuất kho" class="width">
                    </td>
                </tr>
                <tr>
                    <td>Người xuất kho</td>
                    <td>
                        <input type="text" name="txtNxk" placeholder="Người xuất kho" class="width">
                    </td>
                </tr>
                <tr>
                    <td>Số lượng</td>
                    <td>
                        <input type="number" name="nbSl" placeholder="Số lượng" class="width" oninput="validateQuantity(this)">
                    </td>
                </tr>
                <tr>
                    <td>Ngày xuất kho</td>
                    <td>
                        <input type="date" name="dateNxk" class="width">
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td>
                        <button class="button" name="btnXuatkho">
                            <i class="fa-solid fa-plus"></i> Xuất kho
                        </button>
                    </td>
                </tr>
            </table>
        </form>
    </div>
</body>
</html>