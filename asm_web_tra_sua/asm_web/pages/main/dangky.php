<?php
    // session_start();
    if(isset($_POST['dangky'])){
    $tenkhachhang=$_POST['hovaten'];
    $email=$_POST['email'];
    $dienthoai=$_POST['dienthoai'];   
    $matkhau=md5($_POST['matkhau']);
    $diachi=$_POST['diachi'];
    // insert vào csdl, nhét file config vào, $mysqli la bien de ket noi csdl, lay ra cac col roi nhet data vao
    $sql_dangky=mysqli_query($mysqli,"INSERT INTO tbl_dangky(tenkhachhang,email,diachi,matkhau,dienthoai) VALUE('".$tenkhachhang."','".$email."','".$diachi."','".$matkhau."','".$dienthoai."')");
    if($sql_dangky){
        echo  '<p style="color:green">bạn đã đăng ký thành công</p>'; 
        // take id_khachhang input into db, when add new acc when insert_id it will take new id of khachhang
        $_SESSION['id_khachhang']=mysqli_insert_id($mysqli);
        $_SESSION['dangky']=$tenkhachhang;
        header('Location:index.php?quanly=giohang');
    }
}
?>
<style>
.dangky {
    margin-top: 16px;
}

.dangky tr td {
    /* style css table là table tr td */
    padding: 5px;
}
</style>
<form action="" method="POST">
    <table class="dangky" border="1" style="width:50%;border-collapse: collapse;">
        <tr>
            <td>Họ và tên:</td>
            <td><input type="text" size="50" name="hovaten"></td>
        </tr>
        <tr>
            <td>Email:</td>
            <td><input type="text" size="50" name="email"></td>
        </tr>
        <tr>
            <td>Điện thoại:</td>
            <td><input type="text" size="50" name="dienthoai"></td>
        </tr>
        <tr>
            <td>Địa chỉ:</td>
            <td><input type="text" size="50" name="diachi"></td>
        </tr>
        <tr>
            <td>Mật khẩu:</td>
            <td><input type="text" size="50" name="matkhau"></td>
        </tr>
        <tr>
            <td><input type="submit" name="dangky" value="Đăng ký"></td>
            <td><a href="index.php?quanly=dangnhap">Đăng nhập nếu có tài khoản</a></td>
        </tr>
    </table>
</form>