<?php
class Qlisanpham_m extends connectDB{
    function timkiem($msp , $tsp){
        $sql = "SELECT * FROM sanpham WHERE MaSP like '%$msp%'
        AND TenSP like '%$tsp%'";
        return mysqli_query($this->con,$sql);
    }
    function xoa($msp) {
        $sql = "DELETE FROM sanpham WHERE MaSP ='$msp'";
        return mysqli_query($this->con, $sql);
    }
    function sua($mspmoi , $tsp){
        $mspbandau = $_POST['txtMaSPbandau'];
        $sql = "UPDATE sanpham SET MaSP ='$mspmoi', TenSP = '$tsp'
        WHERE MaSP = '$mspbandau'";
        return mysqli_query($this->con , $sql);
    }
    public function xem($msp) {
        $sql = "SELECT MaSP,TenSP,Makho, Mancc, Madanhmuc, Mota, Soluong, Dongia
                FROM nhapkho WHERE Masp = '$msp'";
        return mysqli_query($this->con, $sql);
    }
    
    function hienthi(){
        $sql = "SELECT *FROM sanpham";
        return mysqli_query($this->con,$sql);
    }

    function Checkdl($msp , $tsp ){
        if($msp =='' || $tsp ==''){
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
    function getProductDetails() {
        $sql = "SELECT MaSP, TenSP FROM nhapkho";
        $result = mysqli_query($this->con, $sql);
        $products = [];
        while ($row = mysqli_fetch_assoc($result)) {
            $products[$row['MaSP']] = [
                'TenSP' => $row['TenSP']
            ];
        }
        return $products;
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
}
?>