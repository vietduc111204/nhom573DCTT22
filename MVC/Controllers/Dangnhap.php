<?php
    class dangnhap extends controller{
        public $dn;
        function __construct()
        {
            $this->dn = $this->model('Dangnhap_m');
        }
        function Get_data(){
            $this->view('space',[
                'page'=>'Dangnhap_v'
                
            ]);
        }

        function dangnhap(){
           
            if(isset($_POST["dangnhap"])){
                $tk = $_POST["Taikhoan"];
                $mk = $_POST["Matkhau"];
                $kq1=$this->dn->dangnhaptaikhoan($tk,$mk);
                if($kq1){
                    $this->view('Masterlayout',[
                        'page'=>'Home_v'
                        


                    ]);
                }
                
                else {
                    echo"  <script>
                    alert('Hãy nhập lại tên đăng nhâp hoặc mật khẩu ');
                    history.back()              </script>";
                }
                
            }
        }
    }
?>