<?php
class Danhmuc_m extends connectDB {
    function hienthi(){
        $sql = "SELECT *FROM danhmucsp";
        return mysqli_query($this->con,$sql);
    }
    public function them($mdm , $tdm){
        $sql="INSERT INTO danhmucsp VALUE('$mdm' , '$tdm')";
        return mysqli_query($this->con,$sql);
    }
    public function sua($mdm, $tdm) {
        $sql = "UPDATE danhmucsp SET Tendanhmuc = '$tdm' WHERE Madanhmuc = '$mdm'";
        return mysqli_query($this->con,$sql);
    }
    public function xoa($mdm) {
        $sql = "DELETE FROM danhmucsp WHERE Madanhmuc = '$mdm'";
        return mysqli_query($this->con,$sql);
    }
}
?>
