<?php
class Qlixuatkhothem_m extends connectDB{
    function them($mxk,$ngxk,$sl, $nxk) {
        if (strtotime($nxk) > strtotime(date('Y-m-d'))) {
            echo "<script>alert('Ngày nhập không được lớn hơn ngày hiện tại! Vui lòng nhập lại.')</script>";
            echo "<script>window.history.back()</script>";
            return false;
        } 
        $sql = "INSERT INTO xuatkho (Maxuatkho, Nguoixuatkho, Soluong, Ngayxuatkho) 
        VALUES ('$mxk', '$ngxk', '$sl', '$nxk')";
        return mysqli_query($this->con, $sql);
    }

    function Checkdl($mxk,$ngxk,$sl, $nxk){
        if($mxk==''||$ngxk == ''|| $sl==''|| $nxk == '') {
            echo "<script>alert('Không được để trống! Vui lòng nhập lại.')</script>";
            echo "<script>window.history.back()</script>";
            return false;
        }
        return true; 
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