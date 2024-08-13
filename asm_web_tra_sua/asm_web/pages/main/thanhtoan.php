<p>Thanh toán đơn hàng</p>
<!-- <p>tbl_cart sẽ lưu id_khachhang và code đơn hàng, tbl_cart_detail lưu chi tiết đơn hàng như sp có id_sanpham vì từ
    id_sanham có thể lấy đc all info from tbl_sanpham
</p> -->
<?php
session_start();
// input database
include('../../admincp/config/config.php');
$id_khachhang=$_SESSION['id_khachhang'];
// code_order like code_cart
$code_order=rand(0,9999);
// default code_status=1 is new order
$insert_cart="INSERT INTO tbl_cart(id_khachhang,code_cart,cart_status) VALUE('".$id_khachhang."','".$code_order."',1)";
$cart_query=mysqli_query($mysqli,$insert_cart);
if($cart_query){
// add cart_detail
foreach($_SESSION['cart'] as $key=>$value){
$id_sanpham=$value['id'];
$soluong=$value['soluong'];
$insert_order_details="INSERT INTO tbl_cart_details(id_sanpham,code_cart,soluongmua) VALUE('".$id_sanpham."','".$code_order."','".$soluong."')";
mysqli_query($mysqli,$insert_order_details);
}
}
unset($_SESSION['cart']);
// thanhtoan.php is a own page dont be control by index.php
header('Location:../../index.php?quanly=camon');
?>