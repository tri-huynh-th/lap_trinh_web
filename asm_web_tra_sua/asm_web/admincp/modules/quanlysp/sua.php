<?php
// get data từ idsanpham của lietke.php
$sql_sua_sp= "SELECT * FROM tbl_sanpham WHERE id_sanpham='$_GET[idsanpham]' LIMIT 1";
$query_sua_sp= mysqli_query($mysqli,$sql_sua_sp);
?>
<p class="title_sua_sp">Sửa sản phẩm</p>
<table border="1" width="100%" style="border-collapse: collapse;">
    <?php
    // khi đã lấy đc dữ liệu ra rồi chỉ cần fetch array
    while($row=mysqli_fetch_array($query_sua_sp)){
    ?>
    <!-- to send file qua form by method post have to use enctype -->
    <!--  sửa giống như trong sửa sua.php của quản lý dmsp-->
    <!--  ko cần get vì nó nằm trong while dùng biến row-->
    <form action="modules/quanlysp/xuly.php?idsanpham=<?php echo $row['id_sanpham']?>" method="POST"
        enctype="multipart/form-data">
        <!-- type=text là phải có value -->
        <tr>
            <td>Tên sản phẩm</td>
            <td><input type="text" name="tensp" id="" value="<?php echo $row['tensp']?>">
            </td>
        </tr>
        <tr>
            <td>Mã sản phẩm</td>
            <td><input type="text" name="masp" id="" value="<?php echo $row['masp']?>"></td>
        </tr>
        <tr>
            <td>Giá sản phẩm</td>
            <td><input type="text" name="giasp" id="" value="<?php echo $row['giasp']?>"></td>
        </tr>
        <tr>
            <td>Số lượng</td>
            <td><input type="text" name="soluong" id="" value="<?php echo $row['soluong']?>"></td>
        </tr>
        <tr>
            <td>Hình ảnh</td>
            <td><input type="file" name="hinhanh" id="">
                <img src="modules/quanlysp/uploads/<?php echo $row['hinhanh'] ?>" alt="" width="150px">
            </td>
        </tr>
        <tr>
            <td>Tóm tắt</td>
            <td>
                <textarea rows="10" name="tomtat" id="" style="resize:none"><?php echo $row['tomtat']?></textarea>
            </td>
        </tr>
        <tr>
            <td>Nội dung</td>
            <td>
                <textarea rows="10" name="noidung" id="" style="resize:none"><?php echo $row['noidung']?></textarea>
            </td>
        </tr>
        <tr>
            <td>Danh mục sản phẩm</td>
            <td>
                <select name="danhmuc" id="">
                    <?php                   
                    $sql_danhmuc="SELECT*FROM tbl_danhmuc ORDER BY id_danhmuc DESC";
                    $query_danhmuc=mysqli_query($mysqli,$sql_danhmuc);
                    while($row_danhmuc=mysqli_fetch_array($query_danhmuc))
                    {
                        // khi click sửa 1sp chỉ tương ứng với 1sp đó chứa id danh mục, chỉ cần đem so sánh id danh mục sp đó với loop khi nó chạy till id của all danh mục= id danh mục của sp đó thì mình sẽ
                        if($row_danhmuc['id_danhmuc']==$row['id_danhmuc'])
                        {                                           
                    ?>
                    <option selected value="<?php echo $row_danhmuc['id_danhmuc']?>">
                        <?php echo $row_danhmuc['tendanhmuc']?>
                    </option>
                    <?php
                        }
                        else
                        {
                    ?>
                    <option value="<?php echo $row_danhmuc['id_danhmuc']?>">
                        <?php echo $row_danhmuc['tendanhmuc']?>
                    </option>
                    <?php 
                        } 
                    } 
                    ?>
                </select>
            </td>
        </tr>
        <tr>
            <td>Tình trạng</td>
            <td><select name="tinhtrang" id="">
                    <?php
                    if($row['tinhtrang']==1){
                    ?> <option value="1" selected>Kích hoạt</option>
                    <option value="0">Ẩn</option>
                    <?php
                    }else{
                    ?>
                    <option value="1">Kích hoạt</option>
                    <option value="0" selected>Ẩn</option>
                    <?php
                    }
                    ?>
                </select>
            </td>
        </tr>
        <tr>
            <td colspan="2"><input type="submit" name="suasp" id="" value="Sửa sản phẩm">
            </td>
        </tr>
    </form>
    <?php
    }
    ?>
</table>