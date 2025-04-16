<?php 
    class dangnhap_m extends connectDB{
        public function dangnhaptaikhoan($tk,$mk){
            $sql="Select * From taikhoan Where Taikhoan='$tk' AND Matkhau='$mk'";
            $dl=mysqli_query($this->con,$sql);
            $kq=false;
            if(mysqli_num_rows($dl)>0){
                $kq=true;  //trùng mã
            }
            return $kq;
        }
    }
?>