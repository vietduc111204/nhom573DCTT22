<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="http://localhost/baitaplon/Public/CSS/Tonkho.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.17.4/xlsx.full.min.js"></script>
</head>
<body>
<section>
    <form id="warehouseForm" method="POST" action="http://localhost/baitaplon/tonkho/hien">
        <label for="warehouseSelect">Chọn Kho:</label>
        <select id="warehouseSelect" name="Makho">
            <option value="">Chọn Kho Hàng</option>
            <?php
             if(isset($data['dulieu']) && mysqli_num_rows($data['dulieu'])>0){
                while($row=mysqli_fetch_assoc($data['dulieu'])){
                    echo '<option value="' . $row["Makho"] . '">' . $row["Tenkho"] . '</option>';
                }
            }
            ?>
        </select>
        <button type="submit" name="Xacnhan">Xác nhận</button>
    </form>
    <button onclick="exportToExcel()">Xuất Excel</button>
    <div id="productInfo">
        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['Xacnhan'])) {
            $makho = isset($_POST['Makho']) ? $_POST['Makho'] : '';
            if (!empty($makho)) {
                echo "Bạn đã chọn kho có mã: " . $makho;
            } else {
                echo "Vui lòng chọn kho từ danh sách";
            }
        }
        echo '<h3 class="DM">DANH SÁCH SẢN PHẨM CÓ TRONG KHO</h3>';
        echo '<table id="productTable">';
        echo '<tr>';
        echo '<th>Mã Sản Phẩm</th>';
        echo '<th>Tên Sản Phẩm</th>';
        echo '<th>Số Lượng</th>';
        echo '<th>Hành Động</th>';
        echo '</tr>';
        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['Xacnhan'])) {
            $makho = isset($_POST['Makho']) ? $_POST['Makho'] : '';
            if (!empty($makho)) {
                $conn = new mysqli('localhost', 'root', '', 'quanlikhohang');
                if ($conn->connect_error) {
                    die("Kết nối thất bại: " . $conn->connect_error);
                }
                $sql = "SELECT tonkho.MaSP, sanpham.TenSP, tonkho.Soluong
                        FROM tonkho
                        JOIN sanpham ON tonkho.MaSP = sanpham.MaSP
                        WHERE tonkho.makho = '$makho'";
                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()){
                        echo '<tr>';
                        echo '<td>' . ($row['MaSP']) . '</td>';
                        echo '<td>' . ($row['TenSP']) . '</td>';
                        echo '<td>' . ($row['Soluong']) . '</td>';
                        echo '<td><button type="button" onclick="openModal(\'' . $row['MaSP'] . '\', \'' . $row['TenSP'] . '\', \'' . $row['Soluong'] . '\', \'' . $makho . '\')">Di chuyển</button></td>';
                        echo '</tr>';
                    }
                } else {
                    echo '<tr>';
                    echo '<td colspan="4">Không có sản phẩm nào trong kho này.</td>';
                    echo '</tr>';
                }
                $conn->close();
                echo '</table>';
            } else {
                echo '<p>Vui lòng chọn kho từ danh sách để xem thông tin sản phẩm</p>';
            }
        }
        ?>
    </div>
</section>

<div id="modal" class="modal">
    <div class="modal-content">
        <span class="close" onclick="closeModal()">&times;</span>
        <h3 class="DM">DI CHUYỂN HÀNG HOÁ</h3>
        <form id="formModal" method="POST" action="">
            <label for="ma_san_pham">Mã Sản Phẩm:</label>
            <input type="text" name="MaSP" id="formMaDanhMuc" readonly required><br>
            <label for="ten_san_pham">Tên Sản Phẩm:</label>
            <input type="text" name="TenSP" id="formTenDanhMuc" readonly required><br>
            <label for="Soluong">Số Lượng Muốn Chuyển:</label>
            <input type="number" name="SoLuong" id="formSoLuong" min="0" required><br>
            <label for="Khohientai">Kho Hiện Tại:</label>
            <input type="text" name="Khoht" id="formKhoHT" readonly required><br>
            <input type="hidden" name="Makhoht" id="forMakhoht" value="<?php echo $makho; ?>">
            <label for="Khochuyenden">Chọn Kho Chuyển Đến:</label>
            <select id="warehouseSelecta" name="khocd">
            <?php
               $conn = new mysqli('localhost', 'root', '', 'quanlikhohang');
               if ($conn->connect_error) {
                   die("Kết nối thất bại: " . $conn->connect_error);
               }
               $sql = "SELECT Makho, Tenkho FROM khohang";
               $result = $conn->query($sql);
               if ($result->num_rows > 0) {
                   while ($row = $result->fetch_assoc()) {
                       echo '<option value="' . $row["Makho"] . '">' . $row["Tenkho"] . '</option>';
                   }
               } else {
                   echo '<option value="">Không có kho nào</option>';
               }
               $conn->close();
                ?>
            </select>
            <input type="submit" name="luu" value="Lưu">
        </form>
    </div>
</div>
<?php if (isset($_GET['error'])): ?>
<div class="alert alert-danger">
    <?php echo ($_GET['error']); ?>
</div>
<?php elseif (isset($_GET['success'])): ?>
    <div class="alert alert-success">
        <?php echo ($_GET['success']); ?>
    </div>
<?php endif; ?>

<script>
    function openModal(maSanPham, tenSanPham, Soluong, KhoHienTai) {
        document.getElementById("formModal").reset();
        document.getElementById("formModal").action = "http://localhost/baitaplon/tonkho/chuyen";
        document.getElementById('formMaDanhMuc').value = maSanPham;
        document.getElementById('formTenDanhMuc').value = tenSanPham;
        document.getElementById('formSoLuong').value = 0;
        document.getElementById('formSoLuong').max = Soluong;
        document.getElementById('formKhoHT').value = KhoHienTai;
        document.getElementById('modal').style.display = 'block';
    }
    function closeModal() {
        document.getElementById("modal").style.display = "none";
        document.getElementById("formModal").reset();
    }

    window.onclick = function(event) {
        if (event.target == document.getElementById("modal")) {
            closeModal();
        }
    }

    function exportToExcel() {
        // Định nghĩa các cột bạn muốn xuất
        const cols = [0, 1, 2]; // Chỉ số cột: 0 cho Mã Sản Phẩm, 1 cho Tên Sản Phẩm, 2 cho Số Lượng
        
        // Lấy phần tử bảng
        const table = document.getElementById('productTable');
        
        // Chuẩn bị dữ liệu
        const wsData = [
            ["Mã Sản Phẩm", "Tên Sản Phẩm", "Số Lượng"], // Dòng tiêu đề
        ];
        
        // Duyệt qua các hàng và ô để trích xuất dữ liệu
        const rows = table.querySelectorAll('tr');
        rows.forEach(row => {
            const rowData = [];
            cols.forEach(colIndex => {
                const cell = row.querySelectorAll('td')[colIndex];
                if (cell) {
                    rowData.push(cell.innerText);
                }
            });
            wsData.push(rowData);
        });
        
        // Tạo một workbook mới
        const wb = XLSX.utils.book_new();
        const ws = XLSX.utils.aoa_to_sheet(wsData);
        
        // Thêm worksheet vào workbook
        XLSX.utils.book_append_sheet(wb, ws, 'Danh Sách Tồn Kho');
        
        // Lưu workbook thành file Excel
        XLSX.writeFile(wb, 'Danh Sách Tồn Kho.xlsx');
    }
</script>
</body>
</html>
