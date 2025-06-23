<?php
class Qlikhohang extends controller{
    private $khohang;
    function __construct()
    {
        $this->khohang = $this-> model('Qlikhohang_m');
    }
    function Get_data(){
        $dulieu=$this->khohang->hienthi();
        $this->view('Masterlayout',[
            'page'=>'Qlikhohang_v',
            'dulieu'=>$dulieu
        ]);
    }
    function timkiem(){
        if(isset($_POST['btnTimkiem'])){
            $mk=$_POST['txtMakho'];
            $tk=$_POST['txtTenkho']; 
            $dulieu=$this->khohang->timkiem($mk,$tk);
            $this->view('Masterlayout',[
                'page'=>'Qlikhohang_v',
                'dulieu'=>$dulieu,
                'Makho'=>$mk,
                'Tenkho'=>$tk
            ]);
        }
    }   
    function sua($mk){
        $data=$this->khohang->timkiem($mk,'');
        $this->view('Masterlayout',[
            'page'=>'Qlikhohangsua_v',
            'dulieu'=>$data
        ]);
    }
    function suadl(){
        if(isset($_POST['btnSuakho'])){
            $mk=$_POST['txtMakho'];
            $tk=$_POST['txtTenkho'];
            $dc=$_POST['txtDiachi'];
            $sdt=$_POST['nbSdt'];
            $tql=$_POST['txtTenquanly'];
            $gc=$_POST['txtGhichu'];
            
            if(!$this->khohang->Checkdl($mk,$tk,$dc,$sdt,$tql,$gc)){           
                return;
            }
            
            if($this->khohang->sua($mk,$tk,$dc,$sdt,$tql,$gc)){
                echo "<script>alert('Sửa thành công!')</script>";
                echo "<script>window.location.href='http://localhost/baitaplon/Qlikhohang/';</script>";
            } else {
                echo "<script>alert('Sửa thất bại!')</script>";
            }
            $dulieu = $this->khohang->timkiem($mk, $tk);
            $this->view('Masterlayout',[
                'page' => 'Qlikhohang_v',
                'dulieu' => $dulieu,
            ]);
        }
    }
    function xoa($mk) {
            $kq = $this->khohang->xoa($mk);
            if ($kq) {
                echo "<script>alert('Xóa thành công!')</script>";
            } else {
                echo "<script>alert('Xóa thất bại!')</script>";
            }
        
        $mk = isset($_POST['txtMakho']) ? $_POST['txtMakho'] : '';
        $tk = isset($_POST['txtTenkho']) ? $_POST['txtTenkho'] : '';
        $dulieu = $this->khohang->timkiem($mk, $tk);
        $this->view('Masterlayout', [
            'page' => 'Qlikhohang_v',
            'dulieu' => $dulieu,
            'Makho' => $mk,
            'Tenkho' => $tk
        ]);
    }
}
?>