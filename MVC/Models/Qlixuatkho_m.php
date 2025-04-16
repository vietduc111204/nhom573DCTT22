<?php
class Qlixuatkho_m extends connectDB{
    function all(){
        $sql = "SELECT * FROM xuatkho";
        return mysqli_query($this->con, $sql);
    }
    function sua($mxkmoi, $ngxk, $mdh, $msp, $tsp, $dg, $sl, $mk, $nxk) {
        if (strtotime($nxk) > strtotime(date('Y-m-d'))) {
            echo "<script>alert('Ngày nhập không được lớn hơn ngày hiện tại! Vui lòng nhập lại.')</script>";
            echo "<script>window.history.back()</script>";
            return false;
        }
        $mxkbandau = $_POST['txtMxkbandau'];
        
        $slcu = "SELECT Soluong FROM xuatkho WHERE Maxuatkho='$mxkbandau'";
        $kqsl = mysqli_query($this->con, $slcu);
        $slcu1 = 0;
        if ($kqsl) {
            $row = mysqli_fetch_assoc($kqsl);
            $slcu1 = $row['Soluong'];
        }

        // Cộng lại số lượng cũ vào kho
        $this->slcu($msp, $slcu1);

        // Cập nhật thông tin xuất kho
        $sql = "UPDATE xuatkho SET Maxuatkho='$mxkmoi', Nguoixuatkho='$ngxk',
                Madonhang='$mdh', MaSP='$msp', TenSP='$tsp', Dongia='$dg', Soluong='$sl', 
                Makho='$mk', Ngayxuatkho='$nxk' WHERE Maxuatkho='$mxkbandau'";
        
        if (mysqli_query($this->con, $sql)) {
            // Trừ đi số lượng mới từ kho
            return $this->suasl($msp, $sl);
        }

        return false;
    }

    private function slcu($msp, $slcu) {
        $query = "UPDATE nhapkho SET Soluong = Soluong + $slcu WHERE MaSP = '$msp'";
        return mysqli_query($this->con, $query);
    }

    private function suasl($msp, $sl) {
        $query = "UPDATE nhapkho SET Soluong = Soluong - $sl WHERE MaSP = '$msp'";
        return mysqli_query($this->con, $query);
    }

    function Checkdl($mxk,$ngxk,$mdh, $msp,$tsp, $dg, $sl, $mk, $nxk){
        if($mxk==''||$ngxk==''||$mdh == '' || $msp == '' ||$tsp==''|| $dg == '' || $sl == '' || $mk == '' || $nxk == '') {
            echo "<script>alert('Không được để trống! Vui lòng nhập lại.')</script>";
            echo "<script>window.history.back()</script>";
            return false;
        }
        return true; 
    }
    function timkiem($mxk, $mdh){
        $sql = "SELECT * FROM xuatkho WHERE Maxuatkho LIKE '%$mxk%' AND Madonhang LIKE '%$mdh%'";
        return mysqli_query($this->con, $sql);
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
    function tensp(){
        $sql = "SELECT TenSP FROM nhapkho";
        $kq = mysqli_query($this->con, $sql);
                                
        if (mysqli_num_rows($kq) > 0) {
            while($row = mysqli_fetch_assoc($kq)) {
                echo '<option value="' . $row["TenSP"] . '">' . $row["TenSP"] . '</option>';
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
    function xoa($mxk){
        try {
            // Thực hiện câu lệnh DELETE
            $sql="DELETE FROM xuatkho WHERE Maxuatkho ='$mxk'";
            mysqli_query($this->con, $sql);
            echo "<script>alert('Xóa thành công!');</script>";
        } catch (mysqli_sql_exception $e) {
            // Kiểm tra nếu lỗi liên quan đến ràng buộc khóa ngoại
            if ($e->getCode() == 1451) {
                echo "<script>alert('Không thể xóa do vi phạm ràng buộc khóa ngoại.');</script>";
            } 
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
    function Checktrungma($mxk){
        $sql="SELECT * FROM xuatkho WHERE Maxuatkho ='$mxk'";
        $data=mysqli_query($this->con,$sql);
        $kq=false;
        if(mysqli_num_rows($data)>0){
            $kq=true;
        }
        return $kq;
    }
}
?>