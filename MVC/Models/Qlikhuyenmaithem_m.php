<?php
class Qlikhuyenmaithem_m extends connectDB{
    public function them($mkm, $gtkm, $msp, $mt) {
        // Kiểm tra xem mã khuyến mãi có bị trùng không
        if ($this->Checktrungma($mkm)) {
            return false;  // Nếu trùng thì không thêm
        }
    
        // Kiểm tra mã khuyến mãi có bị trống không
        if (empty($mkm)) {
            return false;  // Nếu trống thì không thêm
        }
    
        // Thực hiện thêm khuyến mãi vào cơ sở dữ liệu
        $sql = "INSERT INTO khuyenmai (Makhuyenmai, Giatrikm, MaSP, Mota) 
                VALUES ('$mkm', '$gtkm', '$msp', '$mt')";
        return mysqli_query($this->con, $sql);  // Trả về true nếu thành công
    }
    function Checkdl($mkm, $gtkm, $msp, $mt) {
        if($mkm == '' || $gtkm == '' || $msp=='' || $mt=='') {
            echo "<script>alert('Không được để trống! Vui lòng nhập lại.')</script>";
            echo "<script>window.history.back()</script>";
            return false;
        }
        return true; 
    }    
    public function Checktrungma($mkm) {
        $sql = "SELECT * FROM khuyenmai WHERE Makhuyenmai = '$mkm'";
        $data = mysqli_query($this->con, $sql);
        return mysqli_num_rows($data) > 0;  // Trả về true nếu trùng
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
}
?>