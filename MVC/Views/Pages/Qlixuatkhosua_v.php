<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản lý kho hàng</title>
    <link rel="stylesheet" href="http://localhost/baitaplon/Public/CSS/xuatkhothem.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <script src="http://localhost/baitaplon/Public/JS/soluong.js"></script>
    <script src="http://localhost/baitaplon/Public/JS/dongia.js"></script>
</head>
<body>
    <div class="header">
        <div class="header-item">
            <h2>Xuất kho</h2>
        </div>
        <div class="header-item">
           <a href="http://localhost/baitaplon/Qlixuatkho/All">
                <button>
                    <i class="fa-solid fa-rotate-left"></i> Quay lại
                </button>
           </a>
        </div>
    </div>

    <div class="content">
        <form method="post" action="http://localhost/baitaplon/Qlixuatkho/suadl/">
            <table>
                <?php 
                    if(isset($data['dulieu']) && mysqli_num_rows($data['dulieu']) > 0){
                        while($row = mysqli_fetch_assoc($data['dulieu'])){
                ?>
                <input type="hidden" name="txtMxkbandau" placeholder="Mã xuất kho" class="width" value="<?php echo $row['Maxuatkho']; ?>">
                <tr>
                   <td>Mã xuất kho</td>
                   <td>
                        <input type="text" name="txtMxk" placeholder="Mã xuất kho" class="width" value="<?php echo $row['Maxuatkho']; ?>" readonly>
                   </td>
                </tr>
                <tr>
                   <td>Người xuất kho</td>
                   <td>
                        <input type="text" name="txtNxk" placeholder="Người xuất kho" class="width" value="<?php echo $row['Nguoixuatkho']; ?>">
                   </td>
                </tr>
                <tr>
                    <td>Mã đơn hàng</td>
                    <td>
                        <select name="slcMadh" id="slcMadh">
                            <option value="">Mã đơn hàng</option>
                            <?php
                                $qlixuatkho = new Qlixuatkho_m();
                                $qlixuatkho->madh();
                            ?>
                        </select> 
                    </td>
                </tr>
                <tr>
                    <td>Mã sản phẩm</td>
                    <td>
                        <select name="slcMaSP" id="slcMaSP" onchange="updateProductDetails()">
                            <option value="">Mã sản phẩm</option>
                            <?php
                                $qlixuatkho = new Qlixuatkho_m();
                                $qlixuatkho->masp(); 
                            ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>Tên sản phẩm</td>
                    <td>
                        <input type="text" name="txtTenSP" id="txtTenSP" placeholder="Tên sản phẩm" class="width" readonly value="<?php echo $row['TenSP']; ?>">
                    </td>
                </tr>
                <tr>
                   <td>Đơn giá</td>
                   <td>
                        <input type="number" name="nbGia" placeholder="Đơn giá" class="width" value="<?php echo $row['Dongia']; ?>" oninput="validatePrice(this)">
                   </td>
                </tr>
                <tr>
                    <td>Số lượng</td>
                    <td>
                        <input type="number" name="nbSl" placeholder="Số lượng" class="width" value="<?php echo $row['Soluong']; ?>" oninput="validateQuantity(this)">
                    </td>
                </tr>
                <tr>
                   <td>Mã kho</td>
                   <td>
                        <input type="text" name="txtMk" id="txtMk" placeholder="Mã kho" class="width" readonly value="<?php echo $row['Makho']; ?>">
                   </td>
                </tr>
                <tr>
                    <td>Ngày xuất kho</td>
                    <td>
                        <input type="date" name="dateNxk" class="width" value="<?php echo $row['Ngayxuatkho']; ?>">
                    </td>
                </tr>
                <?php
                        }
                    }
                ?>
                <tr>
                    <td></td>
                    <td>
                        <button class="button" name="btnXuatkho">
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
                    $qlixuatkho = new Qlixuatkho_m();
                    $productDetails = $qlixuatkho->getProductDetails();
                    foreach ($productDetails as $product) {
                        echo "'" . $product['MaSP'] . "': { 'TenSP': '" . $product['TenSP'] . "', 'MaKho': '" . $product['Makho'] . "' },";
                    }
                ?>
            };

            const slcMaSP = document.getElementById('slcMaSP').value;
            if (slcMaSP in productDetails) {
                document.getElementById('txtTenSP').value = productDetails[slcMaSP].TenSP;
                document.getElementById('txtMk').value = productDetails[slcMaSP].MaKho;
            } else {
                document.getElementById('txtTenSP').value = '';
                document.getElementById('txtMk').value = '';
            }
        }
    </script>
</body>
</html>