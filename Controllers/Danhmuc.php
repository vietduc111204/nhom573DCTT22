<?php
class Danhmuc extends Controller {
    private $danhmuc;
    function __construct()
    {
        $this->danhmuc = $this-> model('Danhmuc_m');
    }
    function Get_data(){
        $dulieu=$this->danhmuc->hienthi();
        $this->view('Masterlayout',[
            'page'=>'Danhmuc_v',
            'dulieu'=>$dulieu
        ]);
    }
    public function them() {
        // Xử lý thêm mới danh mục
        if(isset($_POST['Luu'])){
            $mdm=$_POST['Madanhmuc'];
            $tdm=$_POST['Tendanhmuc'];
            $kq=$this->danhmuc->them($mdm , $tdm);
            if($kq){
                echo"<script>alert('Thêm mới thành công!')</script>";
            }
            else{
                echo"<script>alert('Thêm mới thất bại!')</script>";
            }
            $dulieu=$this->danhmuc->hienthi();
            $this->view('Masterlayout',[
            'page'=>'Danhmuc_v',
            'dulieu'=>$dulieu
        ]);
        }     
    }
    public function sua() {
        // Xử lý thêm mới danh mục
        if(isset($_POST['Luu'])){
            $mdm=$_POST['Madanhmuc'];
            $tdm=$_POST['Tendanhmuc'];
            $kq=$this->danhmuc->sua($mdm , $tdm);
            if($kq){
                echo"<script>alert('Sửa thành công!')</script>";
            }
            else{
                echo"<script>alert('Sửa thất bại!')</script>";
            }
            $dulieu=$this->danhmuc->hienthi();
            $this->view('Masterlayout',[
            'page'=>'Danhmuc_v',
            'dulieu'=>$dulieu
        ]);
        }     
    }
    function xoa($mdm){
        $kq=$this->danhmuc->xoa($mdm);
        if($kq){
            echo "<script>alert('Xóa thành công!')</script>";
        }else{
            echo "<script>alert('Xóa thất bại!')</script>";
        }
        $mdm = isset($_POST['Madanhmuc']) ? $_POST['Madanhmuc'] : '';
        $tdm = isset($_POST['Tendanhmuc']) ? $_POST['Tendanhmuc'] : ''; 
        $dulieu=$this->danhmuc->hienthi();
            $this->view('Masterlayout',[
            'page'=>'Danhmuc_v',
            'dulieu'=>$dulieu
        ]);
        }
}
?>
