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
            <h2>Sửa sản phẩm</h2>
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
        <form method="post" action="http://localhost/baitaplon/Qlisanpham/suadl">
            <table>
                <?php 
                    if(isset($data['dulieu']) && mysqli_num_rows($data['dulieu']) > 0){
                        while($row = mysqli_fetch_assoc($data['dulieu'])){
                ?>
                <input type="hidden" name="txtMaSPbandau" placeholder="Mã sản phẩm" class="width" value="<?php echo $row['MaSP']; ?>">
                <tr>
                    <td>Mã sản phẩm :</td>
                    <td>
                        <select name="txtMaSP" id="slcMaSP" onchange="updateProductDetails()">
                            <option value="">Mã sản phẩm</option>
                            <?php
                                $qlisanpham = new Qlisanpham_m();
                                $qlisanpham->masp();
                            ?>
                        </select> 
                    </td>
                </tr>
                <tr>
                    <td>Tên sản phẩm :</td>
                    <td>
                        <input type="text" name="txtTenSP" id="txtTenSP" placeholder="Tên sản phẩm" class="width" readonly>
                    </td>
                </tr>
                <?php
                        }
                    }
                ?>
                <tr>
                    <td></td>
                    <td>
                        <button class="button" name="btnSuaSP">
                            <i class="fa-solid fa-pen"></i> Sửa
                        </button>
                    </td>
                </tr>
            </table>
        </form>
    </div>
    <script>
        function updateProductDetails() {
            const productDetails = {
                <?php
                    $qlisanpham = new Qlisanpham_m();
                    $productDetails = $qlisanpham->getProductDetails();
                    foreach ($productDetails as $maSP => $details) {
                        echo "'" . $maSP . "': { 'TenSP': '" . $details['TenSP'] . "' },";
                    }
                ?>
            };

            const slcMaSP = document.getElementById('slcMaSP').value;
            if (slcMaSP in productDetails) {
                document.getElementById('txtTenSP').value = productDetails[slcMaSP].TenSP;
            } else {
                document.getElementById('txtTenSP').value = '';
            }
        }
    </script>
</body>
</html>
