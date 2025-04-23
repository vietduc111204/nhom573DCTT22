<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "quanlikhohang";

// Tạo kết nối
$conn = new mysqli($servername, $username, $password, $dbname);

// Kiểm tra kết nối
if ($conn->connect_error) {
    die("Kết nối thất bại: " . $conn->connect_error);
}

function generateUniqueCode($prefix, $length, $conn) {
    $isUnique = false;
    $code = '';

    while (!$isUnique) {
        $randomString = '';
        $characters = '0123456789';
        $charactersLength = strlen($characters);
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        $code = $prefix . $randomString;

        // Kiểm tra xem mã đã tồn tại trong cơ sở dữ liệu chưa
        $sql = "SELECT COUNT(*) as count FROM danhmucsp WHERE Madanhmuc = '$code'";
        $result = $conn->query($sql);
        $row = $result->fetch_assoc();
        if ($row['count'] == 0) {
            $isUnique = true;
        }
    }

    return htmlspecialchars($code, ENT_QUOTES, 'UTF-8');
}
function checkma($Madanhmuc, $conn) {
    $sql = "SELECT COUNT(*) as count FROM sanpham WHERE Madanhmuc = '$Madanhmuc'";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    return $row['count'];
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản lí kho hàng</title>
    <link rel="stylesheet" href="http://localhost/baitaplon/Public/CSS/danhmuc.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
</head>
<body>
<section id="home">
    <button type="button" onclick="openModal('them')">Thêm Mới</button>
    <h3 class="DM">DANH MỤC SẢN PHẨM</h3>
    <table>
        <tr>
            <th>STT</th>
            <th>Mã Danh Mục</th>
            <th>Tên Danh Mục</th>
            <th>Hành Động</th>
        </tr>
        <?php
        $sql = "SELECT * FROM danhmucsp";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            $stt = 1;
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $stt++ . "</td>"; // Tăng STT
                echo "<td>" . htmlspecialchars($row["Madanhmuc"], ENT_QUOTES, 'UTF-8') . "</td>";
                echo "<td>" . htmlspecialchars($row["Tendanhmuc"], ENT_QUOTES, 'UTF-8') . "</td>";
                echo "<td><a href='#' onclick=\"openModal('sua', '" . htmlspecialchars($row["Madanhmuc"], ENT_QUOTES, 'UTF-8') . "', '" . htmlspecialchars($row["Tendanhmuc"], ENT_QUOTES, 'UTF-8') . "')\">Sửa</a> | <a href='#' onclick=\"deleteRow('" . htmlspecialchars($row["Madanhmuc"], ENT_QUOTES, 'UTF-8') . "')\">Xóa</a></td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td class='no-data' colspan='4'>Không có dữ liệu</td></tr>";
        }
        ?>
    </table>
</section>

<div id="modal" class="modal">
    <div class="modal-content">
        <span class="close" onclick="closeModal()">&times;</span>
        <h3 id="modalTitle">Thêm Danh Mục</h3>
        <form id="formModal" method="POST" action="http://localhost/baitaplon/Danhmuc/them/">
            <label for="ma_danh_muc">Mã Danh Mục:</label>
            <input type="text" name="Madanhmuc" id="formMaDanhMuc" required><br>
            <label for="ten_danh_muc">Tên Danh Mục:</label>
            <input type="text" name="Tendanhmuc" id="formTenDanhMuc" required><br><br>
            <input type="submit" name="Luu" value="Lưu">
        </form>
    </div>
</div>

<script>
    function openModal(type, Madanhmuc = '', Tendanhmuc = '') {
        document.getElementById("modal").style.display = "block";
        document.getElementById("formModal").reset(); // Reset form before setting new values
        if (type === 'them') {
            document.getElementById("modalTitle").innerText = "Thêm Danh Mục";
            document.getElementById("formModal").action = "http://localhost/baitaplon/Danhmuc/them/";
            document.getElementById("formMaDanhMuc").readOnly = true;
            document.getElementById("formMaDanhMuc").value = '<?php echo generateUniqueCode('DM', 6, $conn); ?>';
        } else if (type === 'sua') {
            document.getElementById("modalTitle").innerText = "Sửa Danh Mục";
            document.getElementById("formModal").action = "http://localhost/baitaplon/Danhmuc/sua/";
            document.getElementById("formMaDanhMuc").value = Madanhmuc;
            document.getElementById("formTenDanhMuc").value = Tendanhmuc;
            document.getElementById("formMaDanhMuc").readOnly = true;
        }
    }
       
    function closeModal() {
        document.getElementById("modal").style.display = "none";
        document.getElementById("formModal").reset(); // Clear form fields
    }

    window.onclick = function(event) {
        if (event.target == document.getElementById("modal")) {
            closeModal();
        }
    }

    function deleteRow(id) {
        if (confirm("Bạn có chắc chắn muốn xóa mục này?")) {
            window.location.href = "http://localhost/baitaplon/Danhmuc/xoa/" + id;
        }
    }
</script>
</body>
</html>
