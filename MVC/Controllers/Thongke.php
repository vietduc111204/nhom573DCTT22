<?php
class Thongke extends Controller {
    private $thongke;
    function __construct()
    {
        $this->thongke = $this-> model('Thongke_m');
    }
    function Get_data(){
        $loinhuan = 0;
        $ton=$this->thongke->tonkho();
        $this->view('Masterlayout',[
            'page'=>'Thongke_v',
            'loinhuan' => $loinhuan, 
            'ton'=>$ton
        ]);
    }
    function hien(){
        $loinhuan = 0;
        if(isset($_POST['Apdung'])){
            $nbd=$_POST['NgayBD'];
            $nkt=$_POST['NgayKT'];
            $kq=$this->thongke->hienthi($nbd , $nkt);
            if($kq){
                echo"<script>alert('Tìm kiếm thành công!')</script>";
            }
            else{
                echo"<script>alert('Tìm kiếm thất bại!')</script>";
            }
            $nhap = $this->thongke->nhap($nbd, $nkt);
            $xuat = $this->thongke->xuat($nbd, $nkt);
            $tongnhap = 0;
            $tongxuat = 0;
            if ($nhap) {
                while ($row = mysqli_fetch_assoc($nhap)) {
                    $tongnhap += $row['Tongtiennhap'];
                }
            }

            if ($xuat) {
                while ($row = mysqli_fetch_assoc($xuat)) {
                    $tongxuat += $row['Tongtienxuat'];
                }
            }

            if ($tongnhap != 0) {
                $loinhuan = ($tongxuat - $tongnhap) / $tongnhap * 100; 
                $loivon = $tongxuat - $tongnhap;
            } else {
                $loinhuan = 0;
                $loivon = 0;
            }
    
            $kho=$this->thongke->kho($nbd , $nkt);
            $ton=$this->thongke->tonkho();
            $this->view('Masterlayout',[
            'page'=>'Thongke_v',
            'dulieu'=>$kq,
            'ton'=>$ton,
            'von'=>$loivon,
            'loinhuan' => $loinhuan, 
            'kho'=>$kho
            ]);
        } 
}
}
?>