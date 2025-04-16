<?php
class Qlikhachhang_m extends connectDB{
    function timkiem($mkh , $tkh){
        $sql = "SELECT * FROM khachhang WHERE Makh like '%$mkh%'
        AND Tenkh like '%$tkh%'";
        return mysqli_query($this->con,$sql);
    }
    function xoa($mkh) {
        $sql = "DELETE FROM khachhang WHERE Makh ='$mkh'";
        return mysqli_query($this->con, $sql);
    }
    function sua($mkmoi , $tkh , $sdt , $dc){
        $mkhbandau = $_POST['txtMakhachhangbandau'];
        $sql = "UPDATE khachhang SET Makh ='$mkmoi', Tenkh = '$tkh',Sdt = '$sdt', Diachi='$dc' 
        WHERE Makh = '$mkhbandau'";
        return mysqli_query($this->con , $sql);
    }
    function hienthi(){
        $sql = "SELECT *FROM khachhang";
        return mysqli_query($this->con,$sql);
    }

    function Checkdl($mkh , $tkh ,$sdt , $dc ){
        if($mkh == '' || $tkh=='' || $sdt == '' || $dc ==''){
        echo "<script>alert('Không được để trống! Vui lòng nhập lại.')</script>";
        echo "<script>window.history.back()</script>";
        return false;
        }
        return true;
    }
    function Checktrungma($mkh){
        $sql="SELECT * FROM khachhang WHERE Makh ='$mkh'";
        $data=mysqli_query($this->con,$sql);
        $kq=false;
        if(mysqli_num_rows($data)>0){
            $kq=true;
        }
        return $kq;
    }
} 
?>