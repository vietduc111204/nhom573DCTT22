<?php
class Qlikhohangthem extends controller{
    private $qlkh;
    function __construct()
    {
        $this->qlkh=$this->model('Qlikhohangthem_m');
    }
    function Get_data(){
        $this->view('Masterlayout',[
            'page'=>'Qlikhohangthem_v'
        ]);
    }
    function them() {
        if(isset($_POST['btnThem'])) {
            $mk = $_POST['txtMakho'];
            $tk = $_POST['txtTenkho'];
            $dc = $_POST['txtDiachi'];
            $sdt = $_POST['nbSdt'];
            $tql = $_POST['txtTenquanly'];
            $gc = $_POST['txtGhichu'];
        
            if(!$this->qlkh->Checkdl($mk, $tk, $dc, $sdt, $tql, $gc)) {
                return;
            }
            if($this->qlkh->Checktrungma($mk)) {
                echo "<script>alert('Mã kho đã tồn tại!');</script>";
                echo "<script>window.history.back();</script>";
                return;
            }
            $kq = $this->qlkh->them($mk, $tk, $dc, $sdt, $tql, $gc);
            if($kq) {
                echo "<script>alert('Thêm kho hàng thành công');</script>";
                echo "<script>window.location.href='http://localhost/baitaplon/Qlikhohang/';</script>";
            } else {
                echo "<script>alert('Thêm kho hàng thất bại');</script>";
            }
            $this->view('Masterlayout', [
                'page' => 'Qlikhohang_v',
                'dulieu' => $kq,
                'Makho' => $mk,
                'Tenkho' => $tk,
                'Diachi' => $dc,
                'Sodienthoai' => $sdt,
                'Tenquanly' => $tql,
                'Ghichu' => $gc
            ]);
        }
    }
}
?>