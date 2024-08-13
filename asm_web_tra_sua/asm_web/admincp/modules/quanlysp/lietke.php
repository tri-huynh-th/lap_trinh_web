<?php
$sql_lietke_sp= "SELECT * FROM tbl_sanpham,tbl_danhmuc WHERE tbl_sanpham.id_danhmuc=tbl_danhmuc.id_danhmuc ORDER BY id_sanpham DESC";
$query_lietke_sp= mysqli_query($mysqli,$sql_lietke_sp);
?>
<p class="title_lietke_sp">Liệt kê sản phẩm</p>
<table border="1" style="border-collapse:collapse;width:100%;">
    <tr>
        <th>Id</th>
        <th>Tên sản phẩm</th>
        <th>Hình ảnh</th>
        <th>Giá sản phẩm</th>
        <th>Số lượng</th>
        <th>Danh mục</th>
        <th>Mã sản phẩm</th>
        <th>Tóm tắt</th>
        <th>Trạng thái</th>
        <th>Quản lý</th>
    </tr>
    <?php
    $i=0;
    while($row=mysqli_fetch_array($query_lietke_sp)){
        $i++;  
    ?>
    <tr>
        <td><?php echo $i ?></td>
        <td><?php echo $row['tensp'] ?></td>
        <td><img src="modules/quanlysp/uploads/<?php echo $row['hinhanh'] ?>" alt="" width="150px"></td>
        <td><?php echo $row['giasp'] ?></td>
        <td><?php echo $row['soluong'] ?></td>
        <td><?php echo $row['tendanhmuc'] ?></td>
        <td><?php echo $row['masp'] ?></td>
        <td><?php echo $row['tomtat'] ?></td>
        <td>
            <?php 
            if($row['tinhtrang']==1){echo 'Kích hoạt';}
            else{echo 'Ẩn';} 
            ?>
        </td>
        <!-- xoá dựa vào id tự tăng -->
        <td>
            <a href="modules/quanlysp/xuly.php?idsanpham=<?php echo $row['id_sanpham']?>">Xoá</a>|
            <a href="?action=quanlysp&query=sua&idsanpham=<?php echo $row['id_sanpham']?>">Sửa</a>
        </td>
        <!-- cột thứ tự không ai hiển thị -->
    </tr>
    <?php
    }
    ?>
</table>