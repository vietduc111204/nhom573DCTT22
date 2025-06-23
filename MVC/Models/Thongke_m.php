<?php
class Thongke_m extends connectDB {
    function hienthi($nbd,$nkt){
        // $startDate = date('Y-m-d', strtotime($nbd));
        // $endDate = date('Y-m-d', strtotime($nkt));
        $sql = "SELECT xk.Ngayxuatkho, sp.TenSP, SUM(xk.Soluong) AS Soluong
                FROM xuatkho xk
                JOIN sanpham sp ON xk.MaSP = sp.MaSP
                WHERE xk.Ngayxuatkho BETWEEN '{$nbd}' AND '{$nkt}'
                GROUP BY xk.Ngayxuatkho, sp.TenSP";
             return mysqli_query($this->con,$sql);
    } 
    function tonkho()
    {
        $sql = "SELECT sp.TenSP, SUM(tk.Soluong) AS Tonkho
                FROM tonkho tk
                JOIN sanpham sp ON tk.MaSP = sp.MaSP
                GROUP BY tk.MaSP";
             return mysqli_query($this->con,$sql);
    }
    function kho($nbd,$nkt)
    {
        $sql = "SELECT khohang.Tenkho, sanpham.TenSP, SUM(xk.Dongia * xk.Soluong) AS Doanhthu
                FROM xuatkho xk
                JOIN khohang ON xk.Makho = khohang.Makho
                JOIN sanpham ON xk.MaSP = sanpham.MaSP
                WHERE xk.Ngayxuatkho BETWEEN '{$nbd}' AND '{$nkt}'
                GROUP BY khohang.Tenkho, sanpham.TenSP";
             return mysqli_query($this->con,$sql);
    }
    function nhap($nbd,$nkt)
    {
        $sql = "SELECT SUM(Soluong * Dongia) AS Tongtiennhap
                FROM nhapkho
                WHERE Ngaynhap BETWEEN '{$nbd}' AND '{$nkt}'";
             return mysqli_query($this->con,$sql);
    }
    function xuat($nbd,$nkt)
    {
        $sql = "SELECT SUM(Soluong * Dongia) AS Tongtienxuat
        FROM xuatkho
        WHERE Ngayxuatkho BETWEEN '{$nbd}' AND '{$nkt}'";
             return mysqli_query($this->con,$sql);
    }

}
?>