<?php 
    //  session start often put it first
$sql_danhmuc="SELECT * FROM tbl_danhmuc ORDER BY id_danhmuc DESC";
$query_danhmuc=mysqli_query($mysqli,$sql_danhmuc);                                      
?>
<?php
if(isset($_GET['dangxuat'])&&$_GET['dangxuat']==1){
    unset($_SESSION['dangky']);
}
?>
<div id="menu">
    <ul class="list-menu">
        <li><a href="index.php">Trang chủ</a></li>
        <!--  muốn truyền tham số vào đường dẫn phải chấm hỏi, tên là quanly=danhmucsanpham, mang theo id để xác định danh mục đó-->
        <?php 
        while($row_danhmuc=mysqli_fetch_array($query_danhmuc)){
        ?>
        <li><a href="index.php?quanly=danhmucsanpham&id=<?php echo $row_danhmuc['id_danhmuc']?>">
                <?php echo $row_danhmuc['tendanhmuc']?></a>
        </li>
        <?php
        }
        ?>
        <!-- giỏ hàng chỉ có 1 giỏ ko cần thêm id -->
        <li><a href=" index.php?quanly=giohang">Giỏ hàng</a></li>
        <?php
        if(isset($_SESSION['dangky'])){
        ?>
        <li><a href="index.php?dangxuat=1">Đăng xuất</a></li>
        <li><a href="index.php?quanly=thaydoimatkhau">Thay đổi mật khẩu</a></li>
        <?php
        }else{
        ?>
        <li><a href="index.php?quanly=dangky">Đăng ký</a></li>
        <?php
        }
        ?>
    </ul>
    <p>
    <form action="index.php?quanly=timkiem" method="POST">
        <input type="text" placeholder="Tìm kiếm sản phẩm..." name="tukhoa">
        <input type="submit" name="timkiem" value="Tìm kiếm">
    </form>
    </p>
</div>