<?php
    // login thì phải lưu session
        session_start();
    // kết nối database
        include('config/config.php');
    // nếu tồn tại name dangnhap
        if(isset($_POST['dangnhap'])){
        // lấy usename
            $taikhoan=$_POST['username'];
        // lấy password md5 trong database
            $matkhau=md5($_POST['password']);
        // chọn tất cả từ tbl_admin cột username=taikhaon đã lấy đc ở input text
            $sql="SELECT * FROM tbl_admin WHERE username='".$taikhoan."' AND password='".$matkhau."' LIMIT 1";
        // $mysqli là biến kết nối database file config
            $row=mysqli_query($mysqli,$sql);
        // đếm số dòng tk row
            $count=mysqli_num_rows($row);
            if($count>0){//là điền đúng bằng 1
                $_SESSION['dangnhap']=$taikhoan;
                header("Location:index.php");//quay về index.php của admincp
            }else{
                echo '<script>
                alert("Tài khoản hoặc mật khẩu không đúng vui lòng nhập lại.");</script>';
                header("Location:login.php");//quay về index.php của admincp
            }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login admin</title>
    <style>
    body {
        background: #f2f2f2;
    }

    .wrapper-login {
        /* this 2 commands to put wrapper center */
        width: 15%;
        margin: 0 auto;
    }

    .table-login {
        width: 100%;
    }

    .table-login tr td {
        padding: 5px;
    }
    </style>
</head>

<body>
    <div class="wrapper-login">
        <!-- action="" là gửi đúng tới file này luôn -->
        <!-- autocomplete off là ko tự động hiện tài khoản đã login-->
        <form action="" method="POST" autocomplete="off">
            <table border=" 1" class="table-login" style="text-align: center;border-collapse: collapse;">
                <tr>
                    <td colspan="2">
                        <h3>Đăng nhập admin</h3>
                    </td>
                </tr>
                <tr>
                    <td>Tài khoản</td>
                    <td><input type="text" name="username"></td>
                </tr>
                <tr>
                    <td>Mật khẩu</td>
                    <td><input type="password" name="password"></td>
                </tr>
                <tr>
                    <td colspan="2"><input type="submit" name="dangnhap" value="Đăng nhập"></td>
                </tr>
            </table>
        </form>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
</body>

</html>