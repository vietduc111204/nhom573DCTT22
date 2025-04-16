<?php
class Qlidonhangthem_m extends connectDB{
    function them($mdh , $tdh , $mkm , $msp , $mk, $ttien ,$tt){
        $sql="INSERT INTO donhang VALUE('$mdh' , '$tdh' , '$mkm' , '$msp' , '$mk' ,'$ttien', '$tt')";
        return mysqli_query($this->con,$sql);
    }
    public function Checkdl($mdh, $tdh, $mkm, $msp, $mk, $ttien, $tt) {
        if ($mdh == '' || $tdh == '' || $mkm == '' || $msp == '' || $mk == '' || $ttien == '' || $tt == '') {
            echo "<script>alert('Không được để trống! Vui lòng nhập lại.')</script>";
            echo "<script>window.history.back()</script>";
            return false;
            //return 'Không được để trống! Vui lòng nhập lại.';  // Trả về thông báo lỗi thay vì echo
        }
        return true; 
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
    function details($msp){
        $sql = "
        SELECT nk.Soluong, nk.Dongia, km.Giatrikm
        FROM nhapkho nk
        JOIN khuyenmai km ON nk.MaSP = km.MaSP
        WHERE nk.MaSP = '$msp'";

    $result = $this->con->query($sql);

    if ($result->num_rows > 0) {
        return $result->fetch_assoc();
    } else {
        return null;
    }
    }
}
?>