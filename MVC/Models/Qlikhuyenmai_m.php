<?php
class Qlikhuyenmai_m extends connectDB{
    function timkiem($mkm, $msp){
        $sql="SELECT * FROM khuyenmai WHERE Makhuyenmai LIKE '%$mkm%' AND MaSP LIKE '%$msp%'";
        return mysqli_query($this->con,$sql);
    }
    function sua($mkmmoi, $gtkm, $msp, $mt){
        $mkmbandau=$_POST['txtMakmbandau'];
        $sql="UPDATE khuyenmai SET Makhuyenmai='$mkmmoi', Giatrikm='$gtkm', 
        MaSP='$msp', Mota='$mt' WHERE Makhuyenmai='$mkmbandau'";
        return mysqli_query($this->con,$sql);
    }
    function Checkdl($mkm, $gtkm, $msp, $mt) {
        if($mkm == '' || $gtkm == '' || $msp=='' || $mt=='') {
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
    function xoa($mkm){
        $sql="DELETE FROM khuyenmai WHERE Makhuyenmai='$mkm'";
        return mysqli_query($this->con, $sql);
    }
    function all(){
        $sql= "SELECT * FROM khuyenmai";
        return mysqli_query($this->con,$sql);
    }
    function Checktrungma($mkm){
        $sql="SELECT * FROM khuyenmai WHERE Makhuyenmai ='$mkm'";
        $data=mysqli_query($this->con,$sql);
        $kq=false;
        if(mysqli_num_rows($data)>0){
            $kq=true;
        }
        return $kq;
    }
}
?>