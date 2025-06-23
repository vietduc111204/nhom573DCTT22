<?php
    if(isset($data["result"])){
      if($data["result"==true ]){
        
      }
      else{?>
          <h5>
            <?php
            echo "Đăng nhập thất bại";
            ?>
          </h5>
          <?php
      }
    }
?>
<!DOCTYPE html>
<html>
<head>
  <title>Quản lý kho hàng</title>
  <link rel="stylesheet" type="text/css" href="http://localhost/baitaplon/Public/CSS/dangnhap.css">
  <link href="https://fonts.googleapis.com/css?family=Poppins:600&display=swap" rel="stylesheet">
  <script src="https://kit.fontawesome.com/a81368914c.js"></script>
  <meta name="viewport" content="width=device-width, initial-scale=1">
</head>

<body>
  <div class="container">
    <div>
      <img class="wave" src="./Public/img/phan-mem-quan-ly-kho.png">
    </div>
    <div class="login-content">
      <form action="http://localhost/baitaplon/Dangnhap/dangnhap" method="post">
        <img src="./Public/img/computer-icons-clip-art-portable-network-graphics-system-administrator-user-png-favpng-P8LVNtfaNewQkVVxgSgqiy0Tk.jpg">
        <h2 class="title">Welcome</h2>
        <div class="input-div one">
          <div class="i">
            <i class="fas fa-user"></i>
          </div>
          <div class="div">
            <input type="text" class="input" placeholder="Tài khoản" name="Taikhoan">
          </div>
        </div>
        <div class="input-div pass">
          <div class="i">
            <i class="fas fa-lock"></i>
          </div>
          <div class="div">
            <input type="password" class="input" placeholder="Mật khẩu" name="Matkhau">
          </div>
        </div>
        <a href="#">Quên mật khẩu?</a>
        <div>
            <input type="submit" class="btn" value="Đăng nhập" name="dangnhap">
        </div>
          
        
      </form>
    </div>
  </div>
  <script type="text/javascript" src="js/main.js"></script>
</body>

</html>