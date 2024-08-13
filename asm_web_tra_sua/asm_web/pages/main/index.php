<?php   
    $sql_pro="SELECT * FROM tbl_sanpham,tbl_danhmuc WHERE tbl_sanpham.id_danhmuc=tbl_danhmuc.id_danhmuc ORDER BY tbl_sanpham.id_sanpham DESC LIMIT 40";
    $query_pro=mysqli_query($mysqli,$sql_pro);     
?>
<!-- mặc định trang danhmuc.php giống trang index.php -->
<h3>Sản phẩm mới nhất</h3>
<ul class="product-list">
    <?php
    while($row=mysqli_fetch_array($query_pro)){
    ?>
    <li>
        <!-- thế này đc cả hình khi rê chuột qua -->
        <a href="index.php?quanly=sanpham&id=<?php echo $row['id_sanpham']?>">
            <img src="admincp/modules/quanlysp/uploads/<?php echo $row['hinhanh']?>" alt="" />
            <!-- thế này chỉ text thôi-->
            <p class="title-product"><?php echo $row['tensp']?></p>
            <!-- 0 meaning ko có chữ số thập phân đằng sau -->
            <p class="price-product">Giá:<?php echo number_format($row['giasp'],0,',','.').'vnd' ?></p>
            <p style="text-align: center;color: #d1d1d1;"><?php echo $row['tendanhmuc']?></p>
        </a>
    </li>
    <?php
    }
    ?>
</ul>