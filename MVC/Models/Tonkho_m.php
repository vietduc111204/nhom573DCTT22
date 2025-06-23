<?php
class Tonkho_m extends connectDB {
    function timkiem(){
        $sql = "SELECT Makho, Tenkho FROM khohang";
        return mysqli_query($this->con,$sql);
    }
    function hienthi($makho){
        $sql = "SELECT tonkho.MaSP, sanpham.TenSP, tonkho.Soluong
            FROM tonkho
            JOIN sanpham ON tonkho.MaSP = sanpham.MaSP
            WHERE tonkho.makho = '$makho'";
        return mysqli_query($this->con,$sql);
    } 
    function giam($makhoht,$masp,$tensp,$sl,$makhocd){
        $sql = "UPDATE tonkho SET Soluong = Soluong - $sl WHERE MaSP = '$masp' AND Makho = '$makhoht'";
        return mysqli_query($this->con,$sql);
    } 
    function tang($makhoht,$masp,$tensp,$sl,$makhocd){
        $sql = "INSERT INTO tonkho (Makho, MaSP, Soluong)
        VALUES ('$makhocd', '$masp', $sl)
        ON DUPLICATE KEY UPDATE Soluong = Soluong + $sl ";
        return mysqli_query($this->con,$sql);
    } 
    function updateSanPham($makhoht, $masp, $tensp, $sl, $makhocd, $con) {
        // Giảm số lượng trong kho hiện tại
        $sql_giam = "UPDATE tonkho SET Soluong = Soluong - $sl WHERE Masp = '$masp' AND Makho = '$makhoht'";
        $result_giam = mysqli_query($con, $sql_giam);
    
        // Kiểm tra và xử lý lỗi nếu cần
        if (!$result_giam) {
            return false; // Không thực hiện thành công việc giảm số lượng
        }
    
        // Thêm mới hoặc cập nhật số lượng trong kho đích
        $sql_tang = "INSERT INTO tonkho (Masp, Soluong, Makho)
                    VALUES ('$masp', '$tensp', $sl, '$makhocd')
                    ON DUPLICATE KEY UPDATE Soluong = Soluong + $sl ";
        $result_tang = mysqli_query($con, $sql_tang);
    
        // Kiểm tra và xử lý lỗi nếu cần
        if (!$result_tang) {
            return false; // Không thực hiện thành công việc thêm mới hoặc cập nhật số lượng
        }
    
        return true; // Hoàn thành cả hai thao tác thành công
    }
    
}
?>
