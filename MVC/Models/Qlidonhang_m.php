<?php
class Qlidonhang_m extends connectDB{
    function timkiem($mdh , $tdh){
        $sql = "SELECT * FROM donhang WHERE Madonhang like '%$mdh%'
        AND Tendonhang like '%$tdh%'";
        return mysqli_query($this->con,$sql);
    }
    function xoa($mdh) {
        $sql = "DELETE FROM donhang WHERE Madonhang ='$mdh'";
        return mysqli_query($this->con, $sql);
    }
    function sua($mdhmoi , $tdh , $mkm , $msp , $mk , $ttien ,$tt){
        $mdhbandau = $_POST['txtMadonhang'];
        $sql = "UPDATE donhang SET Madonhang ='$mdhmoi', Tendonhang = '$tdh', Makhuyenmai='$mkm' , MaSP = '$msp' , Makh = '$mk' , Thanhtien = '$ttien' , Trangthai ='$tt'
        WHERE Madonhang = '$mdhbandau'";
        return mysqli_query($this->con , $sql);
    }
    function hienthi(){
        $sql = "SELECT *FROM donhang";
        return mysqli_query($this->con,$sql);
    }

    function Checkdl($mdh , $tdh , $mkm , $msp , $mk , $ttien ,$tt ){
        if($mdh == '' || $tdh=='' || $mkm == '' || $msp =='' || $mk =='' || $ttien =='' || $tt == '' ){
        echo "<script>alert('Không được để trống! Vui lòng nhập lại.')</script>";
        echo "<script>window.history.back()</script>";
        return false;
        }
        return true;
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
    function masp(){
        $sql = "SELECT MaSP FROM sanpham";
        $kq = mysqli_query($this->con, $sql);
                                
        if (mysqli_num_rows($kq) > 0) {
        while($row = mysqli_fetch_assoc($kq)) {
            echo '<option value="' . $row["MaSP"] . '">' . $row["MaSP"] . '</option>';
        }
        } else {
            echo '<option value="">Không có dữ liệu</option>';
        }
    }
    function makh(){
        $sql = "SELECT Makh FROM khachhang";
        $kq = mysqli_query($this->con, $sql);
                                
        if (mysqli_num_rows($kq) > 0) {
        while($row = mysqli_fetch_assoc($kq)) {
            echo '<option value="' . $row["Makh"] . '">' . $row["Makh"] . '</option>';
        }
        } else {
            echo '<option value="">Không có dữ liệu</option>';
        }
    }
    function makm(){
        $sql = "SELECT Makhuyenmai FROM khuyenmai";
        $kq = mysqli_query($this->con, $sql);
                                
        if (mysqli_num_rows($kq) > 0) {
        while($row = mysqli_fetch_assoc($kq)) {
            echo '<option value="' . $row["Makhuyenmai"] . '">' . $row["Makhuyenmai"] . '</option>';
        }
        } else {
            echo '<option value="">Không có dữ liệu</option>';
        }
    }
    function Checktrungma($mdh){
        $sql="SELECT * FROM donhang WHERE Madonhang ='$mdh'";
        $data=mysqli_query($this->con,$sql);
        $kq=false;
        if(mysqli_num_rows($data)>0){
            $kq=true;
        }
        return $kq;
    }
} 
?>