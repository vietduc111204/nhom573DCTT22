<?php
class Qlixuatkhochitiet_m extends connectDB{
    function them($mxk, $ngxk, $mdh, $msp, $tsp, $gia, $sl, $mk, $nxk) {
        if (strtotime($nxk) > strtotime(date('Y-m-d'))) {
            echo "<script>alert('Ngày nhập không được lớn hơn ngày hiện tại! Vui lòng nhập lại.')</script>";
            echo "<script>window.history.back()</script>";
            return false;
        }
    
        // Kiểm tra số lượng tồn kho của sản phẩm
        $slht = $this->checksl($msp, $sl);
        if ($slht === false) {
            echo "<script>alert('Không đủ số lượng trong kho để xuất! Vui lòng kiểm tra lại.')</script>";
            echo "<script>window.history.back()</script>";
            return false;
        }
    
        $sql = "REPLACE INTO xuatkho (Maxuatkho, Nguoixuatkho, Madonhang, MaSP, TenSP, Dongia, Soluong, Makho, Ngayxuatkho) 
                VALUES ('$mxk', '$ngxk', '$mdh', '$msp', '$tsp', '$gia', '$sl', '$mk', '$nxk')";
    
        // Nếu thêm mới thành công, cập nhật số lượng trong bảng nhapkho
        if (mysqli_query($this->con, $sql)) {
            $this->themslkho($msp, $sl);
            return true;
        }
        return false;
    }
    

    function Checkdl($mxk, $ngxk, $mdh, $msp, $tsp, $gia, $sl, $mk, $nxk) {
        if ($mxk == '' || $ngxk == '' || $mdh == '' || $msp == '' || $tsp == '' || $gia == '' || $sl == '' || $mk == '' || $nxk == '') {
            echo "<script>alert('Không được để trống! Vui lòng nhập lại.')</script>";
            echo "<script>window.history.back()</script>";
            return false;
        }
        return true; 
    }

    private function checksl($msp, $yeucausl) {
        $sql = "SELECT SUM(Soluong) as tongsl FROM nhapkho WHERE MaSP = '$msp'";
        $result = mysqli_query($this->con, $sql);
        $row = mysqli_fetch_assoc($result);
        $sl = $row['tongsl'];

        if ($sl >= $yeucausl) {
            return $sl;
        }
        return false;
    }

    private function themslkho($msp, $sl) {
        $sql = "UPDATE nhapkho SET Soluong = Soluong - '$sl' 
        WHERE MaSP = '$msp' AND Soluong > 0 ORDER BY Ngaynhap LIMIT 1";
        mysqli_query($this->con, $sql);
    }
    function masp(){
        $sql = "SELECT MaSP FROM nhapkho";
        $kq = mysqli_query($this->con, $sql);
                                
        if (mysqli_num_rows($kq) > 0) {
        while($row = mysqli_fetch_assoc($kq)) {
            echo '<option value="' . $row["MaSP"] . '">' . $row["MaSP"] . '</option>';
        }
        } else {
            echo '<option value="">Không có dữ liệu</option>';
        }
    }
    function madh(){
        $sql = "SELECT Madonhang FROM donhang";
        $kq = mysqli_query($this->con, $sql);
                                
        if (mysqli_num_rows($kq) > 0) {
        while($row = mysqli_fetch_assoc($kq)) {
            echo '<option value="' . $row["Madonhang"] . '">' . $row["Madonhang"] . '</option>';
        }
        } else {
            echo '<option value="">Không có dữ liệu</option>';
        }
    }
    function getProductDetails() {
        $sql = "SELECT MaSP, TenSP, Makho FROM nhapkho";
        $result = mysqli_query($this->con, $sql);
        $products = [];
        while ($row = mysqli_fetch_assoc($result)) {
            $products[] = $row;
        }
        return $products;
    }
}
?>