<?php
class Qlikhohang_m extends connectDB {
    function timkiem($mk, $tk) {
        $sql = "SELECT * FROM khohang WHERE Makho LIKE '%$mk%' AND Tenkho LIKE '%$tk%'";
        return mysqli_query($this->con, $sql);
    }

    function xoa($mk) {
        $sql="DELETE FROM khohang WHERE Makho='$mk'";
        return mysqli_query($this->con,$sql);
    }

    function sua($mkmoi, $tk, $dc, $sdt, $tql, $gc) {
        $mkbandau = $_POST['txtMakhobandau'];
        $sql = "UPDATE khohang SET Makho ='$mkmoi', Tenkho = '$tk', Diachi='$dc' , Sdt = '$sdt' , Tenquanly = '$tql' , Ghichu = '$gc'
        WHERE Makho = '$mkbandau'";
        return mysqli_query($this->con, $sql);
    }

    function hienthi() {
        $sql = "SELECT * FROM khohang";
        return mysqli_query($this->con, $sql);
    }

    function Checkdl($mk, $tk, $dc, $sdt, $tql, $gc) {
        if ($mk == '' || $tk == '' || $dc == '' || $sdt == '' || $tql == '' || $gc == '') {
            echo "<script>alert('Không được để trống! Vui lòng nhập lại.')</script>";
            echo "<script>window.history.back()</script>";
            return false;
        }
        return true;
    }

    function Checktrungma($mk) {
        $sql = "SELECT * FROM khohang WHERE Makho ='$mk'";
        $data = mysqli_query($this->con, $sql);
        return mysqli_num_rows($data) > 0;
    }
}

?>