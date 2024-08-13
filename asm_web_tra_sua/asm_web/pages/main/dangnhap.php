<?php
    // login thì phải lưu session
        // session_start();, session start đã có ở index
    // kết nối database
        // include('config/config.php');, đã gọi ở index
    // nếu tồn tại name dangnhap
        if(isset($_POST['dangnhap'])){
        // lấy usename
            $email=$_POST['email'];
        // lấy password md5 trong database
            $matkhau=md5($_POST['password']);
        // chọn tất cả từ tbl_admin cột username=taikhaon đã lấy đc ở input text
            $sql="SELECT * FROM tbl_dangky WHERE email='".$email."' AND matkhau='".$matkhau."' LIMIT 1";
        // $mysqli là biến kết nối database file config
            $row=mysqli_query($mysqli,$sql);
        // đếm số dòng tk row
            $count=mysqli_num_rows($row);
            if($count>0){//là điền đúng bằng 1
                // $_SESSION['dangky']=$email;
                // or
                $row_data=mysqli_fetch_array($row);
                $_SESSION['dangky']=$row_data['tenkhachhang'];
                $_SESSION['id_khachhang']=$row_data['id_dangky'];
                header("Location:index.php?quanly=giohang");//quay về index.php của admincp
            }else{
                echo '<p style="color:red">mật khẩu or email sai, vui lòng nhập lại.</p>';
            }
}
?>
<form action="" method="POST" autocomplete="off">
    <table border=" 1" class="table-login" style="text-align: center;border-collapse: collapse;" width="50%">
        <tr>
            <td colspan=" 2">
                <h3>Đăng nhập khách hàng</h3>
            </td>
        </tr>
        <tr>
            <td>Tài khoản</td>
            <td><input type="text" size="50" name="email" placeholder="Email..."></td>
        </tr>
        <tr>
            <td>Mật khẩu</td>
            <td><input type="password" size="50" name="password" placeholder="Pass..."></td>
        </tr>
        <tr>
            <td colspan="2"><input type="submit" name="dangnhap" value="Đăng nhập"></td>
        </tr>
    </table>
</form>