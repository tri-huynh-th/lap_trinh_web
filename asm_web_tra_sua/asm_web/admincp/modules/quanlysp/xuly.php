<?php
include('../../config/config.php');
$tensp=$_POST['tensp'];
$masp=$_POST['masp'];
$giasp=$_POST['giasp'];
$soluong=$_POST['soluong'];
// xử lý hình ảnh
$hinhanh=$_FILES['hinhanh']['name'];
$hinhanh_tmp=$_FILES['hinhanh']['tmp_name'];
// function time in php
$hinhanh=time().'_'.$hinhanh;
$tomtat=$_POST['tomtat'];
$noidung=$_POST['noidung'];
$tinhtrang=$_POST['tinhtrang'];
$danhmuc=$_POST['danhmuc'];

// tồn tại bằng isset
if(isset($_POST['themsp'])){
    // them
    $sql_them="INSERT INTO tbl_sanpham(tensp,masp,giasp,soluong,hinhanh,tomtat,noidung,tinhtrang,id_danhmuc) VALUE('".$tensp."','".$masp."','".$giasp."','".$soluong."','".$hinhanh."','".$tomtat."','".$noidung."','".$tinhtrang."','".$danhmuc."')";
    mysqli_query($mysqli,$sql_them);
    // thêm data rồi mới di chuyển hình ảnh
    move_uploaded_file($hinhanh_tmp,'uploads/'.$hinhanh);
    // header là quay về trang nào
    // to find error comment header
    header('Location:../../index.php?action=quanlysp&query=them');
}elseif(isset($_POST['suasp'])){
    // sua
    if($hinhanh!='')
    {       
        move_uploaded_file($hinhanh_tmp,'uploads/'.$hinhanh);
        // tinhtrang='".$tinhtrang."': tinhtrang là col lấy từ biến $tinhtrang
        $sql_update="UPDATE tbl_sanpham SET tensp='".$tensp."',masp='".$masp."',giasp='".$giasp."',soluong='".$soluong."',hinhanh='".$hinhanh."',tomtat='".$tomtat."',noidung='".$noidung."',tinhtrang='".$tinhtrang."',id_danhmuc='".$danhmuc."' WHERE id_sanpham='$_GET[idsanpham]'";   
        // command this sql to rm that pic before when i update new pic, rm old pic
        $sql="SELECT * FROM tbl_sanpham WHERE id_sanpham ='$_GET[idsanpham]' LIMIT 1";
        $query=mysqli_query($mysqli,$sql);
        while($row=mysqli_fetch_array($query)){
            unlink('uploads/'.$row['hinhanh']);// từ trang xuly.php vào uploads tìm tên hình ảnh dựa vào id
        }    
    }else{
        $sql_update="UPDATE tbl_sanpham SET tensp='".$tensp."',masp='".$masp."',giasp='".$giasp."',soluong='".$soluong."',tomtat='".$tomtat."',noidung='".$noidung."',tinhtrang='".$tinhtrang."',id_danhmuc='".$danhmuc."' WHERE id_sanpham='$_GET[idsanpham]'";
    }
    mysqli_query($mysqli,$sql_update);
    // header là quay về trang nào
    header('Location:../../index.php?action=quanlysp&query=them');
}else{
    // xoa
    $id=$_GET['idsanpham'];
    $sql="SELECT * FROM tbl_sanpham WHERE id_sanpham ='$id' LIMIT 1";
    $query=mysqli_query($mysqli,$sql);
    while($row=mysqli_fetch_array($query))
    {
        // từ trang xuly.php vào uploads tìm tên hình ảnh dựa vào id
        unlink('uploads/'.$row['hinhanh']);
    }
    $sql_xoa="DELETE FROM tbl_sanpham WHERE id_sanpham='".$id."'";
    mysqli_query($mysqli,$sql_xoa);
    // header là quay về trang nào
    header('Location:../../index.php?action=quanlysp&query=them');
}
?>