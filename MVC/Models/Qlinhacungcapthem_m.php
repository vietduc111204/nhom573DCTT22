<?php
class Qlinhacungcapthem_m extends connectDB{
    function them($mncc , $tncc , $email , $sdt , $dc){
        $sql="INSERT INTO nhacungcap VALUE('$mncc' , '$tncc' , '$email' , '$sdt' , '$dc')";
        return mysqli_query($this->con,$sql);
    }
    function Checkdl($mncc , $tncc , $email , $sdt , $dc) {
        if($mncc == '' || $tncc == '' || $email == '' || $sdt == '' || $dc=='') {
            echo "<script>alert('Không được để trống! Vui lòng nhập lại.')</script>";
            echo "<script>window.history.back()</script>";
            return false;
        }
        return true; 
    }    
    function Checktrungma($mncc){
        $sql="SELECT * FROM nhacungcap WHERE Mancc ='$mncc'";
        $data=mysqli_query($this->con,$sql);
        $kq=false;
        if(mysqli_num_rows($data)>0){
            $kq=true;
        }
        return $kq;
    }
}
?>