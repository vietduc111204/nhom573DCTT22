<?php
class qlinhapkho_m extends connectDB{
    function timkiem($mnk,$msp){
        $sql="SELECT * FROM nhapkho WHERE Manhapkho LIKE '%$mnk%' AND MaSP LIKE '%$msp%'";
        return mysqli_query($this->con,$sql);
    }
    
    function xoa($mnk) {
        try {
            // Thực hiện câu lệnh DELETE
            $sql = "DELETE FROM nhapkho WHERE Manhapkho = '$mnk'";
            mysqli_query($this->con, $sql);
            echo "<script>alert('Xóa thành công!');</script>";
        } catch (mysqli_sql_exception $e) {
            // Kiểm tra nếu lỗi liên quan đến ràng buộc khóa ngoại
            if ($e->getCode() == 1451) {
                echo "<script>alert('Không thể xóa do vi phạm ràng buộc khóa ngoại.');</script>";
            } 
        }
    }
    
    function all(){
        $sql= "SELECT * FROM nhapkho";
        return mysqli_query($this->con,$sql);
    }
    function sua($mnkmoi,$tenncc,$tennn,$msp,$tsp,$mncc,$mk,$sl,$gia,$nn,$mt,$mdm) {
        if (strtotime($nn) > strtotime(date('Y-m-d'))) {
            echo "<script>alert('Ngày nhập không được lớn hơn ngày hiện tại! Vui lòng nhập lại.')</script>";
            echo "<script>window.history.back()</script>";
            return false;
        }
        $mnkbandau = $_POST['txtMnkbandau'];
        $sql = "UPDATE nhapkho SET Manhapkho ='$mnkmoi', Tenncc='$tenncc', Tennguoinhap='$tennn', MaSP='$msp', TenSP='$tsp', Mancc='$mncc', Makho='$mk', 
        Soluong='$sl', Dongia='$gia', Ngaynhap='$nn', Mota='$mt',Madanhmuc='$mdm' WHERE Manhapkho='$mnkbandau'";
        return mysqli_query($this->con, $sql);       
    }
    function mancc(){
        $sql = "SELECT Mancc FROM nhacungcap";
        $kq = mysqli_query($this->con, $sql);
                                
        if (mysqli_num_rows($kq) > 0) {
        while($row = mysqli_fetch_assoc($kq)) {
            echo '<option value="' . $row["Mancc"] . '">' . $row["Mancc"] . '</option>';
        }
        } else {
            echo '<option value="">Không có dữ liệu</option>';
        }
    }
    function makho(){
        $sql = "SELECT Makho FROM khohang";
        $kq = mysqli_query($this->con, $sql);
                                
        if (mysqli_num_rows($kq) > 0) {
        while($row = mysqli_fetch_assoc($kq)) {
            echo '<option value="' . $row["Makho"] . '">' . $row["Makho"] . '</option>';
        }
        } else {
            echo '<option value="">Không có dữ liệu</option>';
        }
    }
    function Checkdl($mnk, $tenncc, $tennn, $msp, $tsp, $mncc, $mk, $sl, $gia, $nn, $mt, $mdm) {
        if ($mnk == '' || $tenncc == '' || $tennn == '' || $msp == '' || $tsp == '' || $mncc == '' || $mk == '' 
        || $sl == '' || $gia == '' || $nn == '' || $mt == '' || $mdm == '') {
            echo "<script>alert('Không được để trống! Vui lòng nhập lại.')</script>";
            echo "<script>window.history.back()</script>";
            return false;
        }
        
        // Kiểm tra ngày nhập không lớn hơn ngày hiện tại
        if (strtotime($nn) > strtotime(date('Y-m-d'))) {
            echo "<script>alert('Ngày nhập không được lớn hơn ngày hiện tại! Vui lòng nhập lại.')</script>";
            echo "<script>window.history.back()</script>";
            return false;
        }
        
        return true;
    }
    
    function tenncc(){
        $sql = "SELECT Tenncc FROM nhacungcap";
        $kq = mysqli_query($this->con, $sql);
                                
        if (mysqli_num_rows($kq) > 0) {
        while($row = mysqli_fetch_assoc($kq)) {
            echo '<option value="' . $row["Tenncc"] . '">' . $row["Tenncc"] . '</option>';
        }
        } else {
            echo '<option value="">Không có dữ liệu</option>';
        }
    }
    function madm(){
        $sql = "SELECT Madanhmuc FROM danhmucsp";
        $kq = mysqli_query($this->con, $sql);
                                
        if (mysqli_num_rows($kq) > 0) {
        while($row = mysqli_fetch_assoc($kq)) {
            echo '<option value="' . $row["Madanhmuc"] . '">' . $row["Madanhmuc"] . '</option>';
        }
        } else {
            echo '<option value="">Không có dữ liệu</option>';
        }
    }
    function Checktrungma($mnk){
        $sql="SELECT * FROM nhapkho WHERE Manhapkho ='$mnk'";
        $data=mysqli_query($this->con,$sql);
        $kq=false;
        if(mysqli_num_rows($data)>0){
            $kq=true;
        }
        return $kq;
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