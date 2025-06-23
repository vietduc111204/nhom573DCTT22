<?php
class Qlisanphamthem_m extends connectDB{
    function them($msp, $tsp){
        $sql = "INSERT INTO sanpham (MaSP, TenSP) VALUES ('$msp', '$tsp')";
        return mysqli_query($this->con,$sql);
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
    function Checkdl($msp , $tsp ){
        if($msp =='' || $tsp ==''){
        echo "<script>alert('Không được để trống! Vui lòng nhập lại.')</script>";
        echo "<script>window.history.back()</script>";
        return false;
        }
        return true;
    }
    function Checktrungma($msp){
        $sql="SELECT * FROM sanpham WHERE MaSP ='$msp'";
        $data=mysqli_query($this->con,$sql);
        $kq=false;
        if(mysqli_num_rows($data)>0){
            $kq=true;
        }
        return $kq;
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
}
?>
