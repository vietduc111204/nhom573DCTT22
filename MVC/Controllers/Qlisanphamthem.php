<?php
class qlisanphamthem extends controller{
    private $sp;
    function Get_data(){
        $this->view('Masterlayout',[
            'page'=>'Qlisanphamthem_v'
        ]);
    }
    function __construct()
    {
        $this->sp=$this->model('Qlisanphamthem_m');
    }
    function them(){
        if(isset($_POST['btnThem'])){
           $msp=$_POST['txtMaSP'];
           $tsp=$_POST['txtTenSP'];
            if(!$this->sp->Checkdl($msp, $tsp)){
                return;
            }
            if($this->sp->Checktrungma($msp)){
                echo"<script>alert('Trùng mã sản phẩm!')</script>";
                echo "<script>window.location.href='http://localhost/baitaplon/Qlisanphamthem';</script>";
            }else{
                $kq=$this->sp->them($msp, $tsp);
                if($kq){
                    echo"<script>alert('Thêm mới thành công!')</script>";
                    echo "<script>window.location.href='http://localhost/baitaplon/Qlisanpham/';</script>";
                }
                else{
                    echo"<script>alert('Thêm mới thất bại!')</script>";
                }
            }
            }
            
            $this->view('Masterlayout', [
                'page'=>'Qlisanpham_v',
                'MaSP'=>$msp,
                'TenSP'=>$tsp
            ]);
        }
    }
?>