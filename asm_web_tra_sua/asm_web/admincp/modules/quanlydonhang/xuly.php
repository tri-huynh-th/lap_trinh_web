<?php
include('../../config/config.php');
if(isset($_GET['code'])){
    // $status=$_GET['cart_status'];
    $code_cart=$_GET['code'];
    // $sql=mysqli_query($mysqli,"UPDATE tbl_cart SET code_status=0 WHERE code_cart='".$code_cart."'");
    $sql_update="UPDATE tbl_cart SET cart_status=0 WHERE code_cart='".$code_cart."'";
    $query=mysqli_query($mysqli,$sql_update);
    header('Location:../../index.php?action=quanlydonhang&query=lietke');
}
?>