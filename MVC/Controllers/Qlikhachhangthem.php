<?php
class qlikhachhangthem extends controller{
    private $kh;
    function Get_data(){
        $this->view('Masterlayout',[
            'page'=>'Qlikhachhangthem_v'
        ]);
    }
    function __construct()
    {
        $this->kh=$this->model('Qlikhachhangthem_m');
    }
    function them(){
        if(isset($_POST['btnThem'])){
            $mkh=$_POST['txtMakh'];
            $tkh=$_POST['txtTenkh'];
            $sdt=$_POST['nbSdt'];
            $dc=$_POST['txtDiachi'];
            

            if(!$this->kh->Checkdl($mkh,$tkh,$sdt,$dc)){           
                return;
            }

            if($this->kh->Checktrungma($mkh)){
                echo "<script>alert('Mã khách hàng đã tồn tại!');</script>";
                echo "<script>window.history.back();</script>";
                return;
            }
            else{
                $kq=$this->kh->them($mkh,$tkh,$sdt,$dc);
                if($kq){
                    echo"<script>alert('Thêm mới thành công!')</script>";
                    echo "<script>window.location.href='http://localhost/baitaplon/Qlikhachhang/';</script>";
                }
                else{
                    echo"<script>alert('Thêm mới thất bại!')</script>";
                }
            }
            $this->view('Masterlayout', [
                'page'=>'Qlikhachhangthem_v',
                'Makh'=>$mkh,
                'Tenkh'=>$tkh,
                'Sdt'=>$sdt,
                'Diachi'=>$dc,
            ]);
        }
    }
}
?>