<?php
$sql_lietke_danhmucsp= "SELECT * FROM tbl_danhmuc ORDER BY thutu DESC";
$query_lietke_danhmucsp= mysqli_query($mysqli,$sql_lietke_danhmucsp);
?>
<p class="title_lietke_dm">Liệt kê danh mục sản phẩm</p>
<table border="1" style="border-collapse:collapse;width:100%;">
    <tr>
        <th>Id</th>
        <th>Tên danh mục</th>
        <th>Quản lý</th>
    </tr>
    <?php
    $i=0;
    while($row=mysqli_fetch_array($query_lietke_danhmucsp)){
        $i++;  
    ?>
    <tr>
        <td><?php echo $i ?></td>
        <td><?php echo $row['tendanhmuc'] ?></td>
        <!-- xoá dựa vào id tự tăng -->
        <td>
            <a href="modules/quanlydmsp/xuly.php? iddanhmuc= <?php echo $row['id_danhmuc'] ?>">
                Xoá</a>|
            <a href="?action=quanlydanhmucsanpham&query=sua&iddanhmuc= <?php echo $row['id_danhmuc'] ?>">Sửa</a>
        </td>
        <!-- cột thứ tự không ai hiển thị -->
    </tr>
    <?php
    }
    ?>
</table>