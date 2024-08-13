<?php
    $sql_chitiet="SELECT * FROM tbl_sanpham,tbl_danhmuc WHERE tbl_sanpham.id_danhmuc=tbl_danhmuc.id_danhmuc AND tbl_sanpham.id_sanpham='$_GET[id]' LIMIT 1";//limit 8 là lấy ra 8 sản phẩm thôi, limit 1 vì sản phẩm dựa trên mục id ko cần sắp xếp có nhìu đâu mà sắp
    $query_chitiet=mysqli_query($mysqli,$sql_chitiet); 
    // print_r($query_chitiet);//in ra kiểu mảng
    while($row_chitiet=mysqli_fetch_array($query_chitiet)){
    ?>
<div class="wrapper-chitiet">
    <div class="hinhanh-sanpham">
        <img width="100%" src="admincp/modules/quanlysp/uploads/<?php echo $row_chitiet['hinhanh']?>" alt="">
    </div>
    <!-- khi click vào thêm giỏ hàng mặc định gửi chi tiết qua form -->
    <!-- đường dẫn từ trang index vào pages -->
    <form action="pages/main/themgiohang.php?idsanpham=<?php echo $row_chitiet['id_sanpham']?>" method="POST">
        <!-- h3 có margin -->
        <div class="chitiet-sanpham">
            <h3 style="margin: 0;">Tên sản phẩm: <?php echo $row_chitiet['tensp']?></h3>
            <p>Mã sản phẩm: <?php echo $row_chitiet['masp']?></p>
            <p>Giá sản phẩm: <?php echo number_format($row_chitiet['giasp'],0,',','.').'vnd'?></p>
            <p>Số lượng sản phẩm: <?php echo $row_chitiet['soluong']?></p>
            <p>Danh mục sản phẩm: <?php echo $row_chitiet['tendanhmuc']?></p>
            <p><input class=" addtocart" type="submit" name="themgiohang" value="Thêm giỏ hàng">
            </p>
        </div>
    </form>
</div>
<?php
    }
?>