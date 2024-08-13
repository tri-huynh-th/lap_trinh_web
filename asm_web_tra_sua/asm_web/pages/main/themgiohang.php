<!-- file này sẽ xử lý việc thêm sửa xoá giỏ hàng -->
<?php
// echo $_GET['idsanpham'];
// thêm giỏ hàng mỗi sản phẩm sẽ đc lưu vào session
    session_start();
// từ page này để vào database
    include('../../admincp/config/config.php');
    // them so luong
    if(isset($_GET['cong'])){
        $id=$_GET['cong'];
        foreach($_SESSION['cart'] as $cart_item){
            if($cart_item['id']!=$id){
                $product[]=array('tensp'=>$cart_item['tensp'],'id'=>$cart_item['id'],'soluong'=>$cart_item['soluong'],'giasp'=>$cart_item['giasp'],'hinhanh'=>$cart_item['hinhanh'],'masp'=>$cart_item['masp']);  
                $_SESSION['cart']=$product; 
                // sp khác id như cũ
            }else{
                // nếu sp trùng id thì cộng thêm 1    
                $tangsoluong=$cart_item['soluong']+1;          
                if($cart_item['soluong']<=9){                   
                    $product[]=array('tensp'=>$cart_item['tensp'],'id'=>$cart_item['id'],'soluong'=>$tangsoluong,'giasp'=>$cart_item['giasp'],'hinhanh'=>$cart_item['hinhanh'],'masp'=>$cart_item['masp']);  
                }else{
                    $product[]=array('tensp'=>$cart_item['tensp'],'id'=>$cart_item['id'],'soluong'=>$cart_item['soluong'],'giasp'=>$cart_item['giasp'],'hinhanh'=>$cart_item['hinhanh'],'masp'=>$cart_item['masp']);  
                }
                $_SESSION['cart']=$product; 
            }        
        }
        header('Location:../../index.php?quanly=giohang');
    }
    // tru so luong
    if(isset($_GET['tru'])){
        $id=$_GET['tru'];
        foreach($_SESSION['cart'] as $cart_item){
            if($cart_item['id']!=$id){
                $product[]=array('tensp'=>$cart_item['tensp'],'id'=>$cart_item['id'],'soluong'=>$cart_item['soluong'],'giasp'=>$cart_item['giasp'],'hinhanh'=>$cart_item['hinhanh'],'masp'=>$cart_item['masp']);  
                $_SESSION['cart']=$product; 
                // sp khác id như cũ
            }else{
                // nếu sp trùng id thì cộng thêm 1   
                $tangsoluong=$cart_item['soluong']-1;           
                if($cart_item['soluong']>1){                    
                    $product[]=array('tensp'=>$cart_item['tensp'],'id'=>$cart_item['id'],'soluong'=>$tangsoluong,'giasp'=>$cart_item['giasp'],'hinhanh'=>$cart_item['hinhanh'],'masp'=>$cart_item['masp']);  
                }else{
                    $product[]=array('tensp'=>$cart_item['tensp'],'id'=>$cart_item['id'],'soluong'=>$cart_item['soluong'],'giasp'=>$cart_item['giasp'],'hinhanh'=>$cart_item['hinhanh'],'masp'=>$cart_item['masp']);  
                }
                $_SESSION['cart']=$product; 
            }        
        }
        header('Location:../../index.php?quanly=giohang');
    }
    // xoa san pham
    if(isset($_SESSION['cart'])&&isset($_GET['xoa'])){
        $id=$_GET['xoa'];
        foreach($_SESSION['cart'] as $cart_item){
            // nếu sp ko thuộc so sánh tất cả những sp có sp nào khác id thì nó sẽ chạy lại session là thiết lập 1 session mới và bỏ sp id đó
            if($cart_item['id']!=$id){
                // nếu để soluong+1 như product bên dưới thì cứ mỗi lần xoá xong sp ko trùng id thì tăng lên 1 nê
                $product[]=array('tensp'=>$cart_item['tensp'],'id'=>$cart_item['id'],'soluong'=>$cart_item['soluong'],'giasp'=>$cart_item['giasp'],'hinhanh'=>$cart_item['hinhanh'],'masp'=>$cart_item['masp']);
            }
            // tao session moi la product
            $_SESSION['cart']=$product;
            header('Location:../../index.php?quanly=giohang');
        }
    }
    // page giohang.php để lấy id,... còn themgiohang.php để xử lý
    // xoa tat ca
    if(isset($_GET['xoatatca'])&&$_GET['xoatatca']==1){
        unset($_SESSION['cart']);//chỉ định 1 session cần xoá thôi
        header('Location:../../index.php?quanly=giohang');
    }
    // them san pham vao gio hang
    // nếu tồn tại thêm giỏ hàng
    if(isset($_POST['themgiohang'])){
    // session_destroy();//xoá toàn bộ những session có trong project
    $id=$_GET['idsanpham'];
    // mỗi lần click thêm số lượng bằng 1 vào
    $soluong=1;
    // $sql="SELECT * FROM tbl_sanpham WHERE id_sanpham='$id' LIMIT 1";
    $sql="SELECT * FROM tbl_sanpham WHERE id_sanpham='".$id."' LIMIT 1";
    // kết nối vào database sau đó thực hiện lệnh $sql để lấy sp dựa trên id
    $query=mysqli_query($mysqli,$sql);
    $row=mysqli_fetch_array($query);
    // tạo mảng chứa dữ liệu
    if($row){
        // khi thế này mảng đổi thành 1 đối tượng
        $new_product=array(array('tensp'=>$row['tensp'],'id'=>$id,'soluong'=>$soluong,'giasp'=>$row['giasp'],'hinhanh'=>$row['hinhanh'],'masp'=>$row['masp']));
        // kiem tra session gio hang ton tai chua, neu da ton tai roi thi chi can tang so luong
        if(isset($_SESSION['cart'])){
            $found=false;
            // lay tung sp cho tung mang
            foreach($_SESSION['cart'] as $cart_item){
                // khi no chay no se lay id o tren
                // neu gio hang ton tai thi se co nhung thanh phan da khai bao o tren
                // nếu ko có làm thêm số lượng thì mỗi lần click trùng sản phẩm thì +1, khi có input text số lượng thì lấy input text số lượng, số lượng cart_item + biến sẽ lấy đc số lượng trên đây
                // nếu data trùng
                if($cart_item['id']==$id){
                    $product[]=array('tensp'=>$cart_item['tensp'],'id'=>$cart_item['id'],'soluong'=>$soluong+1,'giasp'=>$cart_item['giasp'],'hinhanh'=>$cart_item['hinhanh'],'masp'=>$cart_item['masp']);
                    $found=true;
                    // nếu dữ liệu ko trùng
                }else{
                    $product[]=array('tensp'=>$cart_item['tensp'],'id'=>$cart_item['id'],'soluong'=>$cart_item['soluong'],'giasp'=>$cart_item['giasp'],'hinhanh'=>$cart_item['hinhanh'],'masp'=>$cart_item['masp']);
                }
            }
            // nếu dữ liệu ko tìm thấy sẽ liên kết mảng product với new_product, nếu sp ko trùng sẽ liên kết 2 mảng lại với nhau vì mới đầu ko tồn tại session cart đã tạo 1 mảng rồi nếu lại click vào nút thêm cart nữa thì lại chạy thêm 1 sản phẩm nữa nó ko cần biết trùng hay không
            // chưa tồn tại session mới có if else phía sau
            if($found==false){
                // liên kết dữ liệu new_product với product
                // nếu session-cart ko tồn tại thì tạo ra new-product, trùng thì sẽ tăng lên 1 và sẽ tạo thêm mảng product nữa thì ko hay nên sẽ gộp 2 dữ liệu lại với nhau còn những dữ liệu khác sẽ tăng lên 1:số lượng khác nên tăng 1, nếu ko trùng thêm sp mới vào new-product
                $_SESSION['cart']=array_merge($product,$new_product);
            }else{
                $_SESSION['cart']=$product;
            }
        }else{
            $_SESSION['cart']=$new_product;
        }
    }
    // quay lại page/main/index giohang
    header('Location:../../index.php?quanly=giohang');
    // kiểm tra xem session cart nó đã lưu thành công hay chưa
    // print_r($_SESSION['cart']);
    }
?>