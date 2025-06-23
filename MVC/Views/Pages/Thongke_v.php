<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trang Tổng Quan</title>
    <link rel="stylesheet" href="http://localhost/baitaplon/Public/CSS/thongke.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.17.4/xlsx.full.min.js"></script>
</head>
<body>
    <section>
        <div class="container">
            <main class="content">
                <header class="header">
                    <form id="dateForm" method="POST" action="http://localhost/baitaplon/thongke/hien">
                        <div class="date-picker">
                            <label for="startDate">Từ ngày:</label>
                            <input type="text" id="startDate" name="NgayBD" placeholder="Chọn ngày bắt đầu">

                            <label for="endDate">Đến ngày:</label>
                            <input type="text" id="endDate" name="NgayKT" placeholder="Chọn ngày kết thúc">

                            <button type="submit" id="applyDateRange" name="Apdung">Áp dụng</button>
                        </div>
                    </form>
                    <div class="actions">
                        <button onclick="Ngay()" name="Apdung"> Ngày</button>
                        <button onclick="Thang()" name="Apdung">Tháng</button>
                        <button onclick="Quy()"name="Apdung" >Quý</button>
                        <button onclick="Nam()" name="Apdung">Năm</button>
                        <button onclick="exportToExcel()">Xuất Excel</button>
                    </div>
                </header>

                <div class="Bang">
                    <h2>Bảng Thống Kê</h2>
                    <table class="styled-table" id="table1">
                        <thead>
                            <tr>
                                <th>Tên Sản Phẩm</th>
                                <th>Số Lượng Tồn</th>  
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                            if(isset($data['ton']) && mysqli_num_rows($data['ton'])>0){
                                $i=0;
                                while($row=mysqli_fetch_assoc($data['ton'])){
                                    echo "<tr>";
                                    echo "<td>" . $row['TenSP'] . "</td>";
                                    echo "<td>" . $row['Tonkho'] . "</td>";
                                    echo "</tr>";
                                }
                            }
                        ?>
                        </tbody>
                    </table>
                    <table class="styled-table" id="table2">
                        <thead>
                            <tr>
                                <th>Tên Sản Phẩm</th>
                                <th>Số Lượng Bán</th>
                                <th>Thời Gian</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                            if(isset($data['dulieu']) && mysqli_num_rows($data['dulieu'])>0){
                                $i=0;
                                while($row=mysqli_fetch_assoc($data['dulieu'])){
                                    echo "<tr>";
                                    echo "<td>" . $row['TenSP'] . "</td>";
                                    echo "<td>" . $row['Soluong'] . "</td>";
                                    echo "<td>" . $row['Ngayxuatkho'] . "</td>";
                                    echo "</tr>";
                                }
                                
                            }
                            else {
                                echo '<tr>';
                                echo '<td colspan="4">Không có thông tin sản phẩm.</td>';
                                echo '</tr>';
                            }
                        ?>
                        </tbody>
                    </table>
                    
                    <table class="styled-table" id="table3">
                        <thead>
                            <tr>
                                <th>Kho hàng</th>
                                <th>Tên Sản Phẩm</th>
                                <th>Tổng doanh thu</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                            if(isset($data['kho']) && mysqli_num_rows($data['kho'])>0){
                                $i=0;
                                while($row=mysqli_fetch_assoc($data['kho'])){
                                    echo "<tr>";
                                    echo "<td>" . $row['Tenkho'] . "</td>";
                                    echo "<td>" . $row['TenSP'] . "</td>";
                                    echo "<td>" . $row['Doanhthu'] . "</td>";
                                    echo "</tr>";
                                }
                            }
                            else {
                                echo '<tr>';
                                echo '<td colspan="4">Không có thông tin sản phẩm.</td>';
                                echo '</tr>';
                            }
                        ?>
                        </tbody>
                    </table>
                    
                </div>

                <section class="statistics">
                    <div class="stat-card">
                        <h3>Số lượng bán</h3>
                        <p class="number">155,832</p>
                        <canvas id="visitorsChart"></canvas>
                    </div>
                    <div class="stat-card">
                        <h3>Phiên truy cập</h3>
                        <p class="number">205,387</p>
                        <canvas id="sessionsChart"></canvas>
                    </div>
                    <div class="stat-card">
                        <h3>Lợi Nhuận</h3>
                        <p class="number">
                        <span class="change <?php echo ($data['loinhuan'] >= 0) ? 'positive' : 'negative'; ?>">
                        <?php echo isset($data['von']) ? number_format($data['von']) : '0'; ?> VND
                            <!-- <span class="change positive">+0.96% / kỳ trước</span> -->
                        </span>
                        </p>
                        <canvas id="conversionChart"></canvas>
                    </div>
                    <div class="stat-card">
                        <h3>Tỷ lệ </h3>
                        <p class="number">
                        <span class="change <?php echo ($data['loinhuan'] >= 0) ? 'positive' : 'negative'; ?>">
                        <?php echo isset($data['loinhuan']) ? number_format($data['loinhuan'], 2) : '0'; ?>%
                        </span></p>
                        <canvas id="bounceRateChart"></canvas>
                    </div>
                </section>
            </main>
        </div>
    </section>

    <script>
        flatpickr("#startDate", {
            dateFormat: "Y-m-d ",
        });

        flatpickr("#endDate", {
            dateFormat: "Y-m-d "
        });
        function Ngay() {
                const today = new Date().toISOString().split('T')[0];
                document.getElementById('startDate').value = today;
                document.getElementById('endDate').value = today;
                document.getElementById('Apdung').click(); 
}
        function Thang() {
            const date = new Date();
            const today = new Date().toISOString().split('T')[0];
            date.setMonth(date.getMonth() - 1);

            const Thang = new Date(date.getFullYear(), date.getMonth(), 1).toISOString().split('T')[0];

            document.getElementById('startDate').value = Thang;
            document.getElementById('endDate').value = today;
            document.getElementById('Apdung').click();
        }

        function Quy() {
            const date = new Date();
            const quarter = Math.floor((date.getMonth() + 3) / 3);
            const firstDay = new Date(date.getFullYear(), (quarter - 1) * 3, 1).toISOString().split('T')[0];
            const lastDay = new Date(date.getFullYear(), quarter * 3, 0).toISOString().split('T')[0];
            document.getElementById('startDate').value = firstDay;
            document.getElementById('endDate').value = lastDay;
            document.getElementById('dateForm').click();
        }

        function Nam() {
            const date = new Date();
            const firstDay = new Date(date.getFullYear(), 0, 1).toISOString().split('T')[0];
            const lastDay = new Date(date.getFullYear(), 11, 31).toISOString().split('T')[0];
            document.getElementById('startDate').value = firstDay;
            document.getElementById('endDate').value = lastDay;
            document.getElementById('dateForm').click();
        }


        function exportToExcel() {
            const wb = XLSX.utils.book_new();

            // Add sheets
            wb.SheetNames.push("Sheet 1");
            const ws1 = XLSX.utils.table_to_sheet(document.getElementById('table1'));
            wb.Sheets["Sheet 1"] = ws1;

            wb.SheetNames.push("Sheet 2");
            const ws2 = XLSX.utils.table_to_sheet(document.getElementById('table2'));
            wb.Sheets["Sheet 2"] = ws2;

            wb.SheetNames.push("Sheet 3");
            const ws3 = XLSX.utils.table_to_sheet(document.getElementById('table3'));
            wb.Sheets["Sheet 3"] = ws3;

            XLSX.writeFile(wb, 'Thống Kê.xlsx');
        }
    </script>
</body>
</html>
