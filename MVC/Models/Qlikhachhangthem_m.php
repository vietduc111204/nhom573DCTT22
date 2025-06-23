<?php
class Qlikhachhangthem_m extends connectDB{
    function them($mkh , $tkh , $sdt , $dc){
        $sql="INSERT INTO khachhang VALUE('$mkh' , '$tkh' , '$sdt' ,'$dc')";
        return mysqli_query($this->con,$sql);
    }
    function Checkdl($mkh , $tkh , $sdt , $dc) {
        if($mkh == '' || $tkh == '' || $sdt ==''|| $dc=='') {
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