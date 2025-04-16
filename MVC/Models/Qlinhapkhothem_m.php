<?php
class Qlinhapkhothem_m extends connectDB{
    function them($mnk, $tenncc, $tennn, $mncc, $sl, $nn) {
        if (strtotime($nn) > strtotime(date('Y-m-d'))) {
            echo "<script>alert('Ngày nhập không được lớn hơn ngày hiện tại! Vui lòng nhập lại.')</script>";
            echo "<script>window.history.back()</script>";
            return false;
        }
    
        $tontai = $this->checkExists($mnk);
        
        if ($tontai) {
            $slm = $tontai['Soluong'] + $sl;
            $sql = "UPDATE nhapkho SET Soluong = '$slm' WHERE Manhapkho = '$mnk'";
        } else {
            $sql = "INSERT INTO nhapkho (Manhapkho, Tenncc, Tennguoinhap, Mancc, Soluong, Ngaynhap) 
                    VALUES ('$mnk', '$tenncc', '$tennn', '$mncc', '$sl', '$nn')";
        }

        return mysqli_query($this->con, $sql);
    }
    
    function Checkdl($mnk,$tenncc,$tennn,$mncc,$sl,$nn) {
        if($mnk==''||$tenncc == '' ||$tennn==''|| $mncc=='' ||$sl==''|| $nn =='') {
            echo "<script>alert('Không được để trống! Vui lòng nhập lại.')</script>";
            echo "<script>window.history.back()</script>";
            return false;
        }
        return true; 
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