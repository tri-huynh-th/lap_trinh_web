<!-- the same index of main -->
<?php
    if(isset($_POST['timkiem'])){
        $tukhoa=$_POST['tukhoa'];
    }
    $sql_pro="SELECT * FROM tbl_sanpham,tbl_danhmuc WHERE tbl_sanpham.id_danhmuc=tbl_danhmuc.id_danhmuc AND tbl_sanpham.tensp LIKE '%".$tukhoa."%'";//limit 8 là lấy ra 8 sản phẩm thôi
    $query_pro=mysqli_query($mysqli,$sql_pro);     
?>
<!-- mặc định trang danhmuc.php giống trang index.php -->
<h3>Từ khoá tìm kiếm: <?php echo $_POST['tukhoa'];?>
</h3>
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