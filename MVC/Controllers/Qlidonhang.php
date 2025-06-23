<?php
class Qlidonhang extends controller{
    private $donhang;
    
    function __construct()
    {
        $this->donhang = $this-> model('Qlidonhang_m');
    }
    function Get_data(){
        $dulieu=$this->donhang->hienthi();
        $this->view('Masterlayout',[
            'page'=>'Qlidonhang_v',
            'dulieu'=>$dulieu
        ]);
    }
    function timkiem(){
        if(isset($_POST['btnTimkiem'])){
            $mdh=$_POST['txtMadonhang'];
            $tdh=$_POST['txtTendonhang']; 
            $dulieu=$this->donhang->timkiem($mdh,$tdh);
            $this->view('Masterlayout',[
                'page'=>'Qlidonhang_v',
                'dulieu'=>$dulieu,
                'Makh'=>$mdh,
                'Tenkh'=>$tdh
            ]);
        }
    }   
    function sua($mdh){
        $data=$this->donhang->timkiem($mdh,'');
        $this->view('Masterlayout',[
            'page'=>'Qlidonhangsua_v',
            'dulieu'=>$data
        ]);
    }
    function suadl(){
        if(isset($_POST['btnSuaDH'])){
            $mdh=$_POST['txtMadonhang'];
            $tdh=$_POST['txtTendonhang'];
            $mkm=$_POST['txtMakhuyenmai'];
            $msp=$_POST['txtMaSP'];
            $mk=$_POST['txtMakh'];
            $ttien=$_POST['txtThanhtien'];
            $tt=$_POST['txtTrangthai'];

            if(!$this->donhang->Checkdl($mdh , $tdh , $mkm , $msp , $mk, $ttien ,$tt)){           
                return;
            }
          
            else{
                $kq=$this->donhang->sua($mdh , $tdh , $mkm , $msp , $mk, $ttien ,$tt);
                if($kq){
                    echo "<script>alert('Sửa thành công!')</script>";
                    echo "<script>window.location.href='http://localhost/baitaplon/Qlidonhang';</script>";
                } else {
                    echo "<script>alert('Sửa thất bại!')</script>";
                }
            }     
            $dulieu = $this->donhang->timkiem($mdh, $tdh);
            $this->view('Masterlayout',[
                'page' => 'Qlidonhang_v',
                'dulieu' => $dulieu,
            ]);
        }
    }
    function xoa($mdh){
        $kq=$this->donhang->xoa($mdh);
        if($kq){
            echo "<script>alert('Xóa thành công!')</script>";
        }else{
            echo "<script>alert('Xóa thất bại!')</script>";
        }
        $mdh = isset($_POST['txtMadonhang']) ? $_POST['txtMadonhang'] : '';
        $tdh = isset($_POST['txtTendonhang']) ? $_POST['txtTendonhang'] : ''; 
        $dulieu=$this->donhang->timkiem($mdh, $tdh);
        $this->view('Masterlayout',[
            'page'=>'Qlidonhang_v',
            'dulieu'=>$dulieu,
            'Madonhang'=>$mdh,
            'Tendonhang'=>$tdh
        ]);
    }

}
?>