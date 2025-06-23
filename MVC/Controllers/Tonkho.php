<?php
class Tonkho extends Controller {
    private $Tonkho;
    function __construct()
    {
        $this->Tonkho = $this-> model('Tonkho_m');
    }
    function Get_data(){
        $dulieu=$this->Tonkho->timkiem();
        // $makho = $_POST['Makho'];
        // $kho=$this->Tonkho->hienthi($makho);
        $this->view('Masterlayout',[
            'page'=>'Tonkho_v',
            'dulieu'=>$dulieu,
            // 'kho'=>$kho
        ]);
    }
    public function hien() {
        $dulieu=$this->Tonkho->timkiem();
        $this->view('Masterlayout',[
            'page'=>'Tonkho_v',
            'dulieu'=>$dulieu,
            // 'kho'=>$kho
        ]);
        // Kiểm tra nếu form được submit
        if (isset($_POST['Xacnhan'])) {
            // Lấy giá trị của 'Makho' từ form
            $makho = isset($_POST['Makho']) ? $_POST['Makho'] : '';
            
            // Kiểm tra nếu 'Makho' không rỗng
            if (!empty($makho)) {
                
                // Gọi phương thức hienthi từ mô hình Tonkho với mã kho
                $kho = $this->Tonkho->hienthi($makho);
                
                // Chuyển dữ liệu đến view
                $this->view('Masterlayout', [
                    'page' => 'Tonkho_v',
                    'kho' => $kho
                ]);
            } else {
                // Nếu không có 'Makho' thì có thể trả về một thông báo lỗi hoặc xử lý khác
                echo "Vui lòng chọn kho hàng.";
            }
        } else {
            // Nếu không có submit form thì xử lý khác
            echo "Form chưa được submit.";
        }
    }
    
    public function chuyen() {
        if (isset($_POST['luu'])) {
            $makhoht = isset($_POST['Makhoht']) ? $_POST['Makhoht'] : '';
            $makhocd = isset($_POST['khocd']) ? $_POST['khocd'] : '';
            $masp = isset($_POST['MaSP']) ? $_POST['MaSP'] : '';
            $tensp = isset($_POST['TenSP']) ? $_POST['TenSP'] : '';
            $sl = isset($_POST['SoLuong']) ? $_POST['SoLuong'] : 0;
            // Kiểm tra số lượng
            if ($sl <= 0) {
                echo "<script>alert('Số lượng phải lớn hơn 0.')</script>";
                $dulieu=$this->Tonkho->timkiem();
                $this->view('Masterlayout',[
                'page'=>'Tonkho_v',
                'dulieu'=>$dulieu,
                ]);
                return;
            }
    
            // Thực hiện cập nhật sản phẩm
            $kq_giam = $this->Tonkho->giam($makhoht, $masp, $tensp, $sl, $makhocd);
            $kq_tang = $this->Tonkho->tang($makhoht, $masp, $tensp, $sl, $makhocd);
    
            if ($kq_giam && $kq_tang) {
                echo "<script>alert('Cập nhật thành công!')</script>";
            } else {
                echo "<script>alert('Cập nhật thất bại!')</script>";
            }
            $dulieu=$this->Tonkho->timkiem();
            $this->view('Masterlayout',[
            'page'=>'Tonkho_v',
            'dulieu'=>$dulieu,
        ]);
        }
    }
}
?>