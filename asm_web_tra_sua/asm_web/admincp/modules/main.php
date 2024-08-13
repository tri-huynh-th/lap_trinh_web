<div class="clear"></div>
<div class="main">
    <?php
        if(isset($_GET['action'])&& $_GET['query']){
           $tam=$_GET['action']; 
           $query=$_GET['query'];
        }else{
            $tam='';
            $query='';
        }
        if($tam=='quanlydanhmucsanpham'&&$query=='them'){
            include("modules/quanlydmsp/them.php");
            include("modules/quanlydmsp/lietke.php");
        }
        elseif($tam=='quanlydanhmucsanpham'&&$query=='sua'){
            include("modules/quanlydmsp/sua.php");
        }
        elseif($tam=='quanlysp'&&$query=='them'){
            include("modules/quanlysp/them.php");
            include("modules/quanlysp/lietke.php");
        }
        elseif($tam=='quanlysp'&&$query=='sua'){
            include("modules/quanlysp/sua.php");
        }
        elseif($tam=='quanlydonhang'&&$query=='lietke'){
            include("modules/quanlydonhang/lietke.php");
        }
        elseif($tam=='donhang'&&$query=='xemdonhang'){
            include("modules/quanlydonhang/xemdonhang.php");
        }
        else{
            include("modules/dashboard.php");
        }
    ?>
</div>