<?php
class Qlisanpham extends controller{
    private $sp;
    
    function __construct()
    {
        $this->sp = $this-> model('Qlisanpham_m');
    }
    function Get_data(){
        $dulieu=$this->sp->hienthi();
        $this->view('Masterlayout',[
            'page'=>'Qlisanpham_v',
            'dulieu'=>$dulieu
        ]);
    }
    function timkiem(){
        if(isset($_POST['btnTimkiem'])){
            $msp=$_POST['txtMaSP'];
            $tsp=$_POST['txtTenSP']; 
            $dulieu=$this->sp->timkiem($msp,$tsp);
            $this->view('Masterlayout',[
                'page'=>'Qlisanpham_v',
                'dulieu'=>$dulieu,
                'MaSP'=>$msp,
                'TenSP'=>$tsp
                
                
            ]);
        }
    }   
    function sua($msp){
        $data=$this->sp->timkiem($msp,'');
        $this->view('Masterlayout',[
            'page'=>'Qlisanphamsua_v',
            'dulieu'=>$data
        ]);
    }
    function suadl(){
        if(isset($_POST['btnSuaSP'])){
            $msp=$_POST['txtMaSP'];
            $tsp=$_POST['txtTenSP'];

            if(!$this->sp->Checkdl($msp , $tsp)){           
                return;
            }
            if($this->sp->Checktrungma($msp)){
                echo"<script>alert('Trùng mã sản phẩm!')</script>";
                echo "<script>window.location.href='http://localhost/baitaplon/Qlisanpham';</script>";
            }
            if($this->sp->sua($msp , $tsp)){
                echo "<script>alert('Sửa thành công!')</script>";
                echo "<script>window.location.href='http://localhost/baitaplon/Qlisanpham/';</script>";
            } else {
                echo "<script>alert('Sửa thất bại!')</script>";
            }
            $dulieu = $this->sp->timkiem($msp, $tsp);
            $this->view('Masterlayout',[
                'page' => 'Qlisanpham_v',
                'dulieu' => $dulieu,
            ]);
        }
    }
    function xoa($msp){
        $kq=$this->sp->xoa($msp);
        if($kq){
            echo "<script>alert('Xóa thành công!')</script>";
        }else{
            echo "<script>alert('Xóa thất bại!')</script>";
        }
        $msp = isset($_POST['txtMaSP']) ? $_POST['txtMaSP'] : '';
        $tsp = isset($_POST['txtTenSP']) ? $_POST['txtTenSP'] : ''; 
        $dulieu=$this->sp->timkiem($msp, $tsp);
        $this->view('Masterlayout',[
            'page'=>'Qlisanpham_v',
            'dulieu'=>$dulieu,
            'MaSP'=>$msp,
            'TenSP'=>$tsp,
        ]);
    }
    public function xemchitiet($msp) {
        $data=$this->sp->xem($msp);
        $this->view('Masterlayout',[
            'page'=>'Qlisanphamxem_v',
            'dulieu'=>$data
        ]);
    }
    
}
?>