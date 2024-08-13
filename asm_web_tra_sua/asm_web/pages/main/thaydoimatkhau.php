<p>Đổi mật khẩu người dùng</p>
<?php
    // login thì phải lưu session
        // session_start(); ko cần gọi session nữa vì index đã có
    // kết nối database
        // include('config/config.php'); index đã có
    // nếu tồn tại name dangnhap
        if(isset($_POST['doimatkhau'])){
        // lấy usename
            $taikhoan=$_POST['email'];
        // lấy password md5 trong database
            $matkhau_cu=md5($_POST['password_cu']);
            $matkhau_moi=md5($_POST['password_moi']);
        // chọn tất cả từ tbl_admin cột username=taikhaon đã lấy đc ở input text
            $sql="SELECT * FROM tbl_dangky WHERE email='".$taikhoan."' AND matkhau='".$matkhau_cu."' LIMIT 1";
        // $mysqli là biến kết nối database file config
            $row=mysqli_query($mysqli,$sql);
        // đếm số dòng tk row
            $count=mysqli_num_rows($row);
            if($count>0){//là điền đúng bằng 1
                // $_SESSION['dangnhap']=$taikhoan;
                $sql_update=mysqli_query($mysqli,"UPDATE tbl_dangky SET matkhau='".$matkhau_moi."' ");
                echo '<p style="color:green">
                mật khẩu đã được thay đổi.</p>';
                //có thể ko cần where vì đã có ở trên rồi, WHERE email='".$taikhoan."' AND matkhau='".$matkhau_cu."'
                //header("Location:index.php");//quay về index.php của admincp
            }else{
                echo '<p style="color:red">
                Tài khoản hoặc mật khẩu cũ không đúng vui lòng nhập lại.</p>';
                // header("Location:login.php");//quay về index.php của admincp
            }
}
?>
<form action="" method="POST" autocomplete="off">
    <table border=" 1" class="table-login" style="text-align: center;border-collapse: collapse;">
        <tr>
            <td colspan="2">
                <h3>Đổi mật khẩu admin</h3>
            </td>
        </tr>
        <tr>
            <td>Tài khoản(email)</td>
            <td><input type="text" name="email"></td>
        </tr>
        <tr>
            <td>Mật khẩu cũ</td>
            <td><input type="text" name="password_cu"></td>
        </tr>
        <tr>
            <td>Mật khẩu mới</td>
            <td><input type="text" name="password_moi"></td>
        </tr>
        <tr>
            <td colspan="2"><input type="submit" name="doimatkhau" value="đổi mật khẩu"></td>
        </tr>
    </table>
</form>