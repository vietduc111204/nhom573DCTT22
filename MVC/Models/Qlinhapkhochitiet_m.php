<?php
class Qlinhapkhochitiet_m extends connectDB {
    function them($mnk, $tenncc, $tennn, $msp, $tsp, $mncc, $mk, $sl, $gia, $nn, $mt, $mdm) {
        // Kiểm tra ngày nhập không được lớn hơn ngày hiện tại
        if (strtotime($nn) > strtotime(date('Y-m-d'))) {
            echo "<script>alert('Ngày nhập không được lớn hơn ngày hiện tại! Vui lòng nhập lại.')</script>";
            echo "<script>window.history.back()</script>";
            return false;
        }

        // Kiểm tra xem đã có bản ghi trong nhapkho với Manhapkho là $mnk chưa
        $tontai = $this->checkExists($mnk);

        if ($tontai) {
            // Nếu đã có bản ghi tồn tại, cập nhật lại số lượng
            $slm = $tontai['Soluong'] + $sl;
            $sql = "UPDATE nhapkho SET Tenncc = '$tenncc', Tennguoinhap = '$tennn', MaSP = '$msp', TenSP = '$tsp', Mancc = '$mncc', 
            Makho = '$mk', Soluong = '$slm'  Dongia = '$gia', Ngaynhap = '$nn', Mota = '$mt', Madanhmuc = '$mdm' WHERE Manhapkho = '$mnk'";
        } else {
            // Nếu chưa có bản ghi tồn tại, thêm mới vào bảng nhapkho
            $sql = "INSERT INTO nhapkho (Manhapkho, Tenncc, Tennguoinhap, MaSP, TenSP, Mancc, Makho, Soluong, Dongia, Ngaynhap, Mota, Madanhmuc) 
                    VALUES ('$mnk', '$tenncc', '$tennn', '$msp', '$tsp', '$mncc', '$mk', '$sl', '$gia', '$nn', '$mt', '$mdm')";
        }

        return mysqli_query($this->con, $sql);
    }
    
    function Checkdl($mnk, $tenncc, $tennn, $msp, $tsp, $mncc, $mk, $sl, $gia, $nn, $mt,  $mdm) {
        if ($mnk == '' || $tenncc == '' || $tennn == '' || $msp == '' || $tsp == '' || $mncc == '' || $mk == '' || $sl == '' 
        || $gia == '' || $nn == '' || $mt == '' || $mdm == '') {
            echo "<script>alert('Không được để trống! Vui lòng nhập lại.')</script>";
            echo "<script>window.history.back()</script>";
            return false;
        }
        return true; 
    }    
    
    function mancc() {
        $sql = "SELECT Mancc FROM nhacungcap";
        $kq = mysqli_query($this->con, $sql);
                                
        if (mysqli_num_rows($kq) > 0) {
            while ($row = mysqli_fetch_assoc($kq)) {
                echo '<option value="' . $row["Mancc"] . '">' . $row["Mancc"] . '</option>';
            }
        } else {
            echo '<option value="">Không có dữ liệu</option>';
        }
    }

    function makho() {
        $sql = "SELECT Makho FROM khohang";
        $kq = mysqli_query($this->con, $sql);
                                
        if (mysqli_num_rows($kq) > 0) {
            while ($row = mysqli_fetch_assoc($kq)) {
                echo '<option value="' . $row["Makho"] . '">' . $row["Makho"] . '</option>';
            }
        } else {
            echo '<option value="">Không có dữ liệu</option>';
        }
    }

    function tenncc() {
        $sql = "SELECT Tenncc FROM nhacungcap";
        $kq = mysqli_query($this->con, $sql);
                                
        if (mysqli_num_rows($kq) > 0) {
            while ($row = mysqli_fetch_assoc($kq)) {
                echo '<option value="' . $row["Tenncc"] . '">' . $row["Tenncc"] . '</option>';
            }
        } else {
            echo '<option value="">Không có dữ liệu</option>';
        }
    }

    function madm() {
        $sql = "SELECT Madanhmuc FROM danhmucsp";
        $kq = mysqli_query($this->con, $sql);
                                
        if (mysqli_num_rows($kq) > 0) {
            while ($row = mysqli_fetch_assoc($kq)) {
                echo '<option value="' . $row["Madanhmuc"] . '">' . $row["Madanhmuc"] . '</option>';
            }
        } else {
            echo '<option value="">Không có dữ liệu</option>';
        }
    }

    function checkExists($mnk) {
        $sql = "SELECT Soluong FROM nhapkho WHERE Manhapkho = '$mnk'";
        $result = mysqli_query($this->con, $sql);
        return mysqli_fetch_assoc($result);
    }
    function getNCCDetails() {
        $sql = "SELECT Mancc, Tenncc FROM nhacungcap";
        $result = mysqli_query($this->con, $sql);
        $ncc = [];
        while ($row = mysqli_fetch_assoc($result)) {
            $ncc[] = $row;
        }
        return $ncc;
    }
}

?>