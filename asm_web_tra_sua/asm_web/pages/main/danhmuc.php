<?php
    $sql_pro="SELECT * FROM tbl_sanpham WHERE tbl_sanpham.id_danhmuc='$_GET[id]' ORDER BY id_sanpham DESC";
    $query_pro=mysqli_query($mysqli,$sql_pro);     
    // get ten danh muc
    $sql_cate="SELECT * FROM tbl_danhmuc WHERE tbl_danhmuc.id_danhmuc='$_GET[id]' LIMIT 1";
    $query_cate=mysqli_query($mysqli,$sql_cate);     
    $row_title=mysqli_fetch_array($query_cate);
?>

<h3><?php echo $row_title['tendanhmuc']?></h3>
<ul class="product-list">
    <?php
    while($row_pro=mysqli_fetch_array($query_pro)){
    ?>
    <li>
        <!-- thế này đc cả hình khi rê chuột qua -->
        <a href="index.php?quanly=sanpham&id=<?php echo $row_pro['id_sanpham']?>">
            <img src="admincp/modules/quanlysp/uploads/<?php echo $row_pro['hinhanh']?>" alt="" />
            <!-- thế này chỉ text thôi-->
            <p class=" title-product"><?php echo $row_pro['tensp']?></p>

            <!-- 0 meaning ko có chữ số thập phân đằng sau -->
            <p class="price-product">Giá:<?php echo number_format($row_pro['giasp'],0,',','.').'vnd' ?></p>

        </a>
    </li>
    <?php
    }
    ?>
</ul>