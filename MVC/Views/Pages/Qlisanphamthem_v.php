<!DOCTYPE html>
<html>
<head>
    <title>Quản lý kho hàng</title>
    <link rel="stylesheet" type="text/css" href="http://localhost/baitaplon/Public/CSS/khohangsua.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
</head>
<body>
    <div class="header">
        <div></div>
        <div class="header-item">
            <h2>Thêm sản phẩm</h2>
        </div>
        <div class="header-item">
           <a href="http://localhost/baitaplon/Qlisanpham">
                <button>
                    <i class="fa-solid fa-rotate-left"></i> Quay lại
                </button>
           </a>
        </div>
    </div>

    <div class="content">
        <form method="post" action="http://localhost/baitaplon/Qlisanphamthem/them">
            <table>
                <tr>
                    <td>Mã sản phẩm :</td>
                    <td>
                        <input type="text" name="txtMaSP" id="txtMaSP" placeholder="Mã sản phẩm" >
                    </td>
                </tr>
                <tr>
                    <td>Tên sản phẩm :</td>
                    <td>
                        <input type="text" name="txtTenSP" id="txtTenSP" placeholder="Tên sản phẩm" >
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td>
                        <button class="button" name="btnThem">
                            <i class="fa-solid fa-pen"></i> Thêm sản phẩm
                        </button>
                    </td>
                </tr>
            </table>
        </form>
    </div>
</body>
</html>
