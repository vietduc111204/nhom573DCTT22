<?php
class Qlikhachhang extends controller{
    private $khachhang;
    
    function __construct()
    {
        $this->khachhang = $this-> model('Qlikhachhang_m');
    }
    function Get_data(){
        $dulieu=$this->khachhang->hienthi();
        $this->view('Masterlayout',[
            'page'=>'Qlikhachhang_v',
            'dulieu'=>$dulieu
        ]);
    }
    function timkiem(){
        if(isset($_POST['btnTimkiem'])){
            $mkh=$_POST['txtMakh'];
            $tkh=$_POST['txtTenkh']; 
            $dulieu=$this->khachhang->timkiem($mkh,$tkh);
            $this->view('Masterlayout',[
                'page'=>'Qlikhachhang_v',
                'dulieu'=>$dulieu,
                'Makh'=>$mkh,
                'Tenkh'=>$tkh
            ]);
        }
    }   
    function sua($mkh){
        $data=$this->khachhang->timkiem($mkh,'');
        $this->view('Masterlayout',[
            'page'=>'Qlikhachhangsua_v',
            'dulieu'=>$data
        ]);
    }
    function suadl(){
        if(isset($_POST['btnSuakhachhang'])){
            $mkh=$_POST['txtMakh'];
            $tkh=$_POST['txtTenkh'];
            $sdt=$_POST['nbSdt'];
            $dc=$_POST['txtDiachi'];
            

            if(!$this->khachhang->Checkdl($mkh,$tkh,$sdt,$dc)){           
                return;
            }
            if($this->khachhang->Checktrungma($mkh)){
                echo "<script>alert('Mã khách hàng đã tồn tại!');</script>";
                echo "<script>window.history.back();</script>";
                return;
            }
            if($this->khachhang->sua($mkh,$tkh,$sdt,$dc)){
                echo "<script>alert('Sửa thành công!')</script>";
                echo "<script>window.location.href='http://localhost/baitaplon/Qlikhachhang/';</script>";
            } else {
                echo "<script>alert('Sửa thất bại!')</script>";
            }
            $dulieu = $this->khachhang->timkiem($mkh, $tkh);
            $this->view('Masterlayout',[
                'page' => 'Qlikhachhang_v',
                'dulieu' => $dulieu,
            ]);
        }
    }
    function xoa($mkh){
        $kq=$this->khachhang->xoa($mkh);
        if($kq){
            echo "<script>alert('Xóa thành công!')</script>";
        }else{
            echo "<script>alert('Xóa thất bại!')</script>";
        }
        $mkh = isset($_POST['txtMakh']) ? $_POST['txtMakh'] : '';
        $tkh = isset($_POST['txtTenkh']) ? $_POST['txtTenkh'] : ''; 
        $dulieu=$this->khachhang->timkiem($mkh, $tkh);
        $this->view('Masterlayout',[
            'page'=>'Qlikhachhang_v',
            'dulieu'=>$dulieu,
            'Makh'=>$mkh,
            'Tenkh'=>$tkh
        ]);
    }

}
?>