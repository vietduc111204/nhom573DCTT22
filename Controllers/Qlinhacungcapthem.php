<?php
class qlinhacungcapthem extends controller{
    private $ncc;
    function Get_data(){
        $this->view('Masterlayout',[
            'page'=>'Qlinhacungcapthem_v'
        ]);
    }
    function __construct()
    {
        $this->ncc=$this->model('Qlinhacungcapthem_m');
    }
    function them(){
        if(isset($_POST['btnThem'])){
            $mncc=$_POST['txtMancc'];
            $tncc=$_POST['txtTenncc'];
            $email=$_POST['txtEmail'];
            $sdt=$_POST['nbSdt'];
            $dc=$_POST['txtDiachi'];
            

            if(!$this->ncc->Checkdl($mncc , $tncc , $email , $sdt , $dc)){           
                return;
            }

            if($this->ncc->Checktrungma($mncc)){
                echo "<script>alert('Mã nhà cung cấp đã tồn tại!');</script>";
                echo "<script>window.history.back();</script>";
                return;
            }
            else{
                $kq=$this->ncc->them($mncc , $tncc , $email , $sdt , $dc);
                if($kq){
                    echo"<script>alert('Thêm mới thành công!')</script>";
                    echo "<script>window.location.href='http://localhost/baitaplon/Qlinhacungcap/';</script>";
                }
                else{
                    echo"<script>alert('Thêm mới thất bại!')</script>";
                }
            }
            $this->view('Masterlayout', [
                'page'=>'Qlinhacungcapthem_v',
                'Mancc'=>$mncc,
                'Tenncc'=>$tncc,
                'Email'=>$email,
                'Sdt'=>$sdt,
                'Diachi'=>$dc
                
            ]);
        }
    }
}
?>