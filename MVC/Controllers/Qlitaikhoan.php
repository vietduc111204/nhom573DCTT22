<?php
class Qlitaikhoan extends controller{
    private $taikhoan;
    
    function __construct()
    {
        $this->taikhoan = $this-> model('Qlitaikhoan_m');
    }
    function Get_data(){
        $dulieu=$this->taikhoan->hienthi();
        $this->view('Masterlayout',[
            'page'=>'Qlitaikhoan_v',
            'dulieu'=>$dulieu
        ]);
    }
    function sua($tk){
        $dulieu=$this->taikhoan->timkiem($tk);
        $this->view('Masterlayout',[
            'page'=>'Qlitaikhoansua_v',
            'dulieu'=>$dulieu
        ]);
    }
    function suadl(){
        if(isset($_POST['btnSua'])){
            $tk=$_POST['txtTaikhoan'];
            $mk=$_POST['txtMatkhau'];
            $tnd=$_POST['txtTennguoidung'];
            $email=$_POST['txtEmail'];
            $sdt=$_POST['nbSdt'];

            if(!$this->taikhoan->Checkdl($tk , $mk , $tnd , $email , $sdt)){           
                return;
            }
            if($this->taikhoan->sua($tk , $mk , $tnd , $email , $sdt)){
                echo "<script>alert('Sửa thành công!')</script>";
                echo "<script>window.location.href='http://localhost/baitaplon/Qlitaikhoan/';</script>";
            } else {
                echo "<script>alert('Sửa thất bại!')</script>";
            }
            $dulieu = $this->taikhoan->timkiem($tk);
            $this->view('Masterlayout',[
                'page' => 'Qlitaikhoan_v',
                'dulieu' => $dulieu,
            ]);
        }
    }
}
?>