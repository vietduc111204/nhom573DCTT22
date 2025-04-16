 <?php
class Qlidonhangthem extends controller{
    public $dh;
    function Get_data(){
        $this->view('Masterlayout',[
            'page'=>'Qlidonhangthem_v'
        ]);
    }
    function __construct()
    {
        $this->dh=$this->model('Qlidonhangthem_m');
    }
    function them(){
        if(isset($_POST['btnThem'])){
            $mdh=$_POST['txtMadonhang'];
            $tdh=$_POST['txtTendonhang'];
            $mkm=$_POST['txtMakhuyenmai'];
            $msp=$_POST['txtMaSP'];
            $mk=$_POST['txtMakh'];
            $tt=$_POST['txtTrangthai'];

            $details=$this->dh->details($msp);
            $Soluong = $details['Soluong'];
            $Dongia = $details['Dongia'];
            $Giatrikm = $details['Giatrikm'];
            
            $ttien = $Soluong * $Dongia * $Giatrikm;

            if(!$this->dh->Checkdl($mdh , $tdh , $mkm , $msp , $mk, $ttien ,$tt)){           
                return;
            }

            if($this->dh->Checktrungma($mdh)){
                echo "<script>alert('Mã đơn hàng đã tồn tại!');</script>";
                echo "<script>window.history.back();</script>";
                return;
            }
            else{
                $kq=$this->dh->them($mdh , $tdh , $mkm , $msp , $mk , $ttien, $tt);
                if($kq){
                    echo"<script>alert('Thêm mới thành công!')</script>";
                    echo "<script>window.location.href='http://localhost/baitaplon/Qlidonhang/';</script>";
                }
                else{
                    echo"<script>alert('Thêm mới thất bại!')</script>";
                }
            }
            $this->view('Masterlayout', [
                'page'=>'Qlidonhangthem_v',
                'Madonhang'=>$mdh,
                'Tendonhang'=>$tdh,
                'Makhuyenmai' =>$mkm,
                'MaSP'=>$msp,
                'Makh'=>$mk,
                'Thanhtien'=>$ttien,
                'Trangthai'=>$tt
            ]);
        }
    }
}
?>