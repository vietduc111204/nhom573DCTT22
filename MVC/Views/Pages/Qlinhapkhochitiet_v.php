<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="http://localhost/baitaplon/Public/CSS/nhapkhothem.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <script src="http://localhost/baitaplon/Public/JS/soluong.js"></script>
    <script src="http://localhost/baitaplon/Public/JS/dongia.js"></script>
</head>
<body>
    <div class="header">
        <div class="header-item">
            <h2>Nhập kho</h2>
        </div>
        <div class="header-item">
           <a href="http://localhost/baitaplon/Qlinhapkho/All">
                <button>
                    <i class="fa-solid fa-rotate-left"></i> Quay lại
                </button>
           </a>
        </div>
    </div>

    <div class="content">
        <form method="post" action="http://localhost/baitaplon/Qlinhapkhochitiet/them">
            <table>
                <tr>
                    <td>Mã nhập kho</td>
                    <td>
                        <?php
                        $random=rand(0,1000);
                        $manhapkho='NK'.$random;
                        ?>
                        <input type="text" name="txtMnk" placeholder="Mã nhập kho" class="width">
                    </td>
                </tr>
                <tr>
                    <td>Tên nhà cung cấp</td>
                    <td>
                        <select name="slcTncc" id="slcTncc" onchange="updateNCCDetails()">
                            <option value="">Tên nhà cung cấp</option>
                            <?php
                                $qlinhapkhothem = new Qlinhapkhochitiet_m();
                                $qlinhapkhothem->tenncc();
                            ?>        
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>Tên người nhập</td>
                    <td>
                        <input type="text" name="txtTennn" placeholder="Tên người nhập" class="width">
                    </td>
                </tr>
                <tr>
                    <td>Mã sản phẩm</td>
                    <td>
                        <input type="text" name="txtMaSP" placeholder="Mã sản phẩm" class="width">
                    </td>
                </tr>
                <tr>
                    <td>Tên sản phẩm</td>
                    <td>
                        <input type="text" name="txtTenSP" placeholder="Tên sản phẩm" class="width">
                    </td>
                </tr>
                <tr>
                   <td>Mã nhà cung cấp</td>
                   <td>
                        <input type="text" name="slcMncc" id="slcMncc" placeholder="Mã nhà cung cấp" class="width" readonly>
                   </td>
                </tr>
                <tr>
                   <td>Mã kho</td>
                   <td>
                        <select name="slcMk" id="">
                            <option value="">Mã kho</option>
                            <?php
                                $qlinhapkhothem = new Qlinhapkhochitiet_m();
                                $qlinhapkhothem->makho();
                            ?>
                        </select>
                   </td>
                </tr>
                <tr>
                    <td>Số lượng</td>
                    <td>
                        <input type="number" name="nbSl" placeholder="Số lượng" class="width" oninput="validateQuantity(this)">
                    </td>
                </tr>
                <tr>
                    <td>Đơn giá</td>
                    <td>
                        <input type="number" name="nbGia" placeholder="Đơn giá" class="width" oninput="validatePrice(this)">
                    </td>
                </tr>
                <tr>
                    <td>Ngày nhập</td>
                    <td>
                        <input type="date" name="dateNn" class="width">
                    </td>
                </tr>
                <tr>
                    <td>Mô tả</td>
                    <td>
                        <input type="text" name="txtMota" class="width" placeholder="Mô tả">
                    </td>
                </tr>
                <tr>
                    <td>Mã danh mục</td>
                    <td>
                        <select name="slcMdm" id="">
                            <option value="">Mã danh mục</option>
                            <?php
                                $qlinhapkhothem = new Qlinhapkhochitiet_m();
                                $qlinhapkhothem->madm();
                            ?>
                        </select>
                   </td>
                </tr>
                <tr>
                    <td></td>
                    <td>
                        <button class="button" name="btnNhapkho">
                            <i class="fa-solid fa-plus"></i> Nhập kho
                        </button>
                    </td>
                </tr>
            </table>
        </form>
    </div>
    <script>
        function updateNCCDetails() {
            const NCCDetails = {
                <?php
                    $ncc = new Qlinhapkhochitiet_m();
                    $NCCDetails = $ncc->getNCCDetails();
                    foreach ($NCCDetails as $nhacungcap) {
                        echo "'" . $nhacungcap['Tenncc'] . "': '" . $nhacungcap['Mancc'] . "',";
                    }
                ?>
            };

            const slcTncc = document.getElementById('slcTncc').value;
            if (slcTncc in NCCDetails) {
                document.getElementById('slcMncc').value = NCCDetails[slcTncc];
            } else {
                document.getElementById('slcMncc').value = '';
            }
        }
    </script>
</body>
</html>
