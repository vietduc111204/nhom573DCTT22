<?php
class Qlinhacungcap extends controller{
    private $nhacungcap;
    
    function __construct()
    {
        $this->nhacungcap = $this-> model('Qlinhacungcap_m');
    }
    function Get_data(){
        $dulieu=$this->nhacungcap->hienthi();
        $this->view('Masterlayout',[
            'page'=>'Qlinhacungcap_v',
            'dulieu'=>$dulieu
        ]);
    }
    function timkiem(){
        if(isset($_POST['btnTimkiem'])){
            $mncc=$_POST['txtMancc'];
            $tncc=$_POST['txtTenncc']; 
            $dulieu=$this->nhacungcap->timkiem($mncc,$tncc);
            $this->view('Masterlayout',[
                'page'=>'Qlinhacungcap_v',
                'dulieu'=>$dulieu,
                'Mancc'=>$mncc,
                'Tenncc'=>$tncc
            ]);
        }
    }   
    function sua($mncc){
        $data=$this->nhacungcap->timkiem($mncc,'');
        $this->view('Masterlayout',[
            'page'=>'Qlinhacungcapsua_v',
            'dulieu'=>$data
        ]);
    }
    function suadl(){
        if(isset($_POST['btnSua'])){
            $mncc=$_POST['txtMancc'];
            $tncc=$_POST['txtTenncc'];
            $email=$_POST['txtEmail'];
            $sdt=$_POST['nbSdt'];
            $dc=$_POST['txtDiachi'];
            

            if(!$this->nhacungcap->Checkdl($mncc , $tncc , $email , $sdt , $dc)){           
                return;
            }
            
            if($this->nhacungcap->sua($mncc , $tncc , $email , $sdt , $dc)){
                echo "<script>alert('Sửa thành công!')</script>";
                echo "<script>window.location.href='http://localhost/baitaplon/Qlinhacungcap/';</script>";
            } else {
                echo "<script>alert('Sửa thất bại!')</script>";
            }
            $dulieu = $this->nhacungcap->timkiem($mncc, $tncc);
            $this->view('Masterlayout',[
                'page' => 'Qlinhacungcap_v',
                'dulieu' => $dulieu,
            ]);
        }
    }
    function xoa($mncc){
        $kq=$this->nhacungcap->xoa($mncc);
        $mncc = isset($_POST['txtMancc']) ? $_POST['txtMancc'] : '';
        $tncc = isset($_POST['txtTenncc']) ? $_POST['txtTenncc'] : ''; 
        $dulieu=$this->nhacungcap->timkiem($mncc, $tncc);
        $this->view('Masterlayout',[
            'page'=>'Qlinhacungcap_v',
            'dulieu'=>$dulieu,
            'Mancc'=>$mncc,
            'Tenncc'=>$tncc
        ]);
    }

}
?>