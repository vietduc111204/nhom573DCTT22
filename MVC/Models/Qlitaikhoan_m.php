<?php
class Qlitaikhoan_m extends connectDB{
    function hienthi(){
        $sql = "SELECT *FROM taikhoan";
        return mysqli_query($this->con,$sql);
    }
    function timkiem($tk){
        $sql = "SELECT * FROM taikhoan WHERE Taikhoan like '%$tk%'";
        
        return mysqli_query($this->con,$sql);
    }
    function sua($tkmoi , $mk , $tnd , $email , $sdt){
        $tkbandau = $_POST['txtTaikhoanbandau'];
        $sql = "UPDATE taikhoan SET Taikhoan ='$tkmoi', Matkhau = '$mk', Tennguoidung='$tnd' , Email = '$email', Sodienthoai = '$sdt' 
        WHERE Taikhoan = '$tkbandau'";
        return mysqli_query($this->con , $sql);
    }

    function Checkdl($tk , $mk , $tnd , $email , $sdt){
        if($tk == '' || $mk=='' || $tnd == '' || $email =='' || $sdt == '' ){
        echo "<script>alert('Không được để trống! Vui lòng nhập lại.')</script>";
        echo "<script>window.history.back()</script>";
        return false;
        }
        return true;
    }
}
?>