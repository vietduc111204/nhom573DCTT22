<?php
class Qlikhohangthem_m extends connectDB{
    public function them($mk, $tk, $dc, $sdt, $tql, $gc) {
        // Kiểm tra mã kho trùng lặp
        if ($this->Checktrungma($mk)) {
            return false; // Nếu mã kho đã tồn tại, trả về false
        }
        
        // Thêm kho mới vào cơ sở dữ liệu
        $sql = "INSERT INTO khohang (Makho, Tenkho, Diachi, Sdt, Tenquanly, Ghichu) 
                VALUES ('$mk', '$tk', '$dc', '$sdt', '$tql', '$gc')";
        $result = mysqli_query($this->con, $sql);
        
        return $result; // Trả về true nếu thêm thành công, false nếu không thành công
    }
    
    function Checkdl($mk , $tk ,$dc , $sdt ,$tql, $gc){
        if($mk == '' || $tk=='' || $dc == '' || $sdt =='' || $tql == '' || $gc ==''){
            return "Không được để trống! Vui lòng nhập lại.";  // Thay vì echo, trả về thông báo lỗi
        }
        return true;
   }
   
    function Checktrungma($mk){
        $sql="SELECT * FROM khohang WHERE Makho ='$mk'";
        $data=mysqli_query($this->con,$sql);
        $kq=false;
        if(mysqli_num_rows($data)>0){
            $kq=true;
        }
        return $kq;
    }
}
?>