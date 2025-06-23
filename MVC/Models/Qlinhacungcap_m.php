<?php
class Qlinhacungcap_m extends connectDB{
    function timkiem($mncc , $tncc){
        $sql = "SELECT * FROM nhacungcap WHERE Mancc like '%$mncc%'
        AND Tenncc like '%$tncc%'";
        return mysqli_query($this->con,$sql);
    }
    function xoa($mncc) {
        try {
            // Thực hiện câu lệnh DELETE
            $sql = "DELETE FROM nhacungcap WHERE Mancc ='$mncc'";
            mysqli_query($this->con, $sql);
            echo "<script>alert('Xóa thành công!');</script>";
        } catch (mysqli_sql_exception $e) {
            // Kiểm tra nếu lỗi liên quan đến ràng buộc khóa ngoại
            if ($e->getCode() == 1451) {
                echo "<script>alert('Không thể xóa do vi phạm ràng buộc khóa ngoại.');</script>";
            } 
        }
    }
    function sua($mnccmoi , $tncc , $email , $sdt , $dc ){
        $mnccbandau = $_POST['txtManhacungcapbandau'];
        $sql = "UPDATE nhacungcap SET Mancc ='$mnccmoi', Tenncc = '$tncc', Email = '$email' , Sdt = '$sdt', Diachi='$dc' 
        WHERE Mancc = '$mnccbandau'";
        return mysqli_query($this->con , $sql);
    }
    function hienthi(){
        $sql = "SELECT *FROM nhacungcap";
        return mysqli_query($this->con,$sql);
    }

    function Checkdl($mncc , $tncc , $email , $sdt , $dc){
        if($mncc == '' || $tncc == '' || $email == '' || $sdt == '' || $dc == '') {
            return 'Không được để trống! Vui lòng nhập lại.';  // Trả về thông báo lỗi
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