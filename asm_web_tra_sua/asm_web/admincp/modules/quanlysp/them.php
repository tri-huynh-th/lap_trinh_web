<p class="title_them_sp">Thêm sản phẩm</p>
<table border="1" width="100%" style="border-collapse: collapse;">
    <!-- to send file qua form by method post have to use enctype -->
    <form action="modules/quanlysp/xuly.php" method="POST" enctype="multipart/form-data">
        <tr>
            <td>Tên sản phẩm</td>
            <td><input type="text" name="tensp" id=""></td>
        </tr>
        <tr>
            <td>Mã sản phẩm</td>
            <td><input type="text" name="masp" id=""></td>
        </tr>
        <tr>
            <td>Giá sản phẩm</td>
            <td><input type="text" name="giasp" id=""></td>
        </tr>
        <tr>
            <td>Số lượng</td>
            <td><input type="text" name="soluong" id=""></td>
        </tr>
        <tr>
            <td>Hình ảnh</td>
            <td><input type="file" name="hinhanh" id=""></td>
        </tr>
        <tr>
            <td>Tóm tắt</td>
            <td><textarea rows="10" name="tomtat" id="" style="resize:none"></textarea></td>
        </tr>
        <tr>
            <td>Nội dung</td>
            <td><textarea rows="10" name="noidung" id="" style="resize:none"></textarea></td>
        </tr>
        <tr>
            <td>Danh mục sản phẩm</td>
            <td>
                <select name="danhmuc" id="">
                    <?php                   
                    $sql_danhmuc="SELECT * FROM tbl_danhmuc ORDER BY id_danhmuc DESC";
                    $query_danhmuc=mysqli_query($mysqli,$sql_danhmuc);
                    while($row_danhmuc=mysqli_fetch_array($query_danhmuc)){                                            
                    ?>
                    <option value="<?php echo $row_danhmuc['id_danhmuc']?>"><?php echo $row_danhmuc['tendanhmuc']?>
                    </option>
                    <?php
                    }
                    ?>
                </select>
            </td>
        </tr>
        <tr>
            <td>Tình trạng</td>
            <td><select name="tinhtrang" id="">
                    <option value="1">Kích hoạt</option>
                    <option value="0">Ẩn</option>
                </select>
            </td>
        </tr>
        <tr>
            <td colspan="2"><input type="submit" name="themsp" id="" value="Thêm sản phẩm">
            </td>
        </tr>
    </form>

</table>