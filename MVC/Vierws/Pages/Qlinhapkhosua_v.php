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
        <form method="post" action="http://localhost/baitaplon/Qlinhapkho/suadl">
            <table>
                <?php 
                    if(isset($data['dulieu']) && mysqli_num_rows($data['dulieu'])>0){
                        while($row=mysqli_fetch_assoc($data['dulieu'])){
                ?>
                <input type="hidden" name="txtMnkbandau" placeholder="Mã nhập kho" class="width" value="<?php echo $row['Manhapkho'];?>">
                <tr>
                    <td>Mã nhập kho</td>
                    <td>
                        <input type="text" name="txtMnk" placeholder="Mã nhập kho" class="width" value="<?php echo $row['Manhapkho'];?>" readonly>
                    </td>
                </tr>
                <tr>
                   <td>Tên nhà cung cấp</td>
                   <td>
                        <select name="slcTncc" id="slcTncc" value="<?php echo $row['Tenncc'];?>" onchange="updateNCCDetails()">
                            <option value="">Tên nhà cung cấp</option>
                            <?php
                                $qlinhapkhothem = new Qlinhapkho_m();
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
                        <input type="text" name="txtMaSP" placeholder="Mã sản phẩm" class="width" value="<?php echo $row['MaSP'];?>">
                    </td>
                </tr>
                <tr>
                    <td>Tên sản phẩm</td>
                    <td>
                        <input type="text" name="txtTenSP" placeholder="Tên sản phẩm" class="width" value="<?php echo $row['TenSP'];?>">
                    </td>
                </tr>
                <tr>
                   <td>Mã nhà cung cấp</td>
                   <td>
                        <input type="text" name="slcMncc" id="slcMncc" placeholder="Mã nhà cung cấp" class="width" readonly value="<?php echo $row['Mancc'];?>" > 
                   </td>
                </tr>
                <tr>
                   <td>Mã kho</td>
                   <td>
                        <select name="slcMk" id="slcMk" value="<?php echo $row['Makho'];?>">
                            <option value="">Mã kho</option>
                            <?php
                                $qlinhapkhothem = new Qlinhapkho_m();
                                $qlinhapkhothem->makho();
                            ?>
                        </select>
                   </td>
                </tr>
                <tr>
                    <td>Số lượng</td>
                    <td>
                        <input type="number" name="nbSl" placeholder="Số lượng" class="width" value="<?php echo $row['Soluong'];?>" oninput="validateQuantity(this)">
                    </td>
                </tr>
                <tr>
                    <td>Đơn giá</td>
                    <td>
                        <input type="number" name="nbGia" placeholder="Giá" class="width" value="<?php echo $row['Dongia'];?>" oninput="validatePrice(this)">
                    </td>
                </tr>
                <tr>
                    <td>Ngày nhập</td>
                    <td>
                        <input type="date" name="dateNn" class="width" value="<?php echo $row['Ngaynhap'];?>">
                    </td>
                </tr>
                <tr>
                    <td>Mô tả</td>
                    <td>
                        <input type="text" name="txtMota" class="width" placeholder="Mô tả" value="<?php echo $row['Mota'];?>">
                    </td>
                </tr>
                <tr>
                    <td>Mã danh mục</td>
                    <td>
                        <select name="slcMdm" id="slcMdm" value="<?php echo $row['Madanhmuc'];?>">
                            <option value="">Mã danh mục</option>
                            <?php
                                $qlinhapkhothem = new Qlinhapkho_m();
                                $qlinhapkhothem->madm();
                            ?>
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
                        <button class="button" name="btnNhapkho">
                            <i class="fa-solid fa-pen"></i> Sửa
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
                    $ncc = new Qlinhapkho_m();
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