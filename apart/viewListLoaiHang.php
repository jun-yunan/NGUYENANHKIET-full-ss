<?php
require_once './administrator/elements_NAK/mod/hanghoaCls.php';
//require_once './administrator/elements_NAK/mod/loaihangCls.php';
//$loaihang = new loaihang();
$hanghoa = new hanghoa();

if (isset($_REQUEST['reqView'])) {
    $idloaihang = $_REQUEST['reqView'];
    $list_hanghoa = $hanghoa->HanghoaGetbyIdloaihang($idloaihang);
}
else {
    $list_hanghoa = $hanghoa->HanghoaGetAll();
}
?>

<div>
    <?php
    foreach ($list_hanghoa as $v) {
        if (isset($v->giathamkhao)) {
            echo $v->giathamkhao;
        }
        else {
            echo "không tồn tại thuộc tính";
        }
        ?>
        <a href="./index.php?reqHanghoa=<?php echo $v->idhanghoa;?>">
            <div class="itemsHanghoa">
                <img src="data:image/png;base64, <?php echo $v->hinhanh;?>" alt="" class="imgHanghoa"><br>
                Sản phẩm: <?php echo $v->tenhanghoa;?><br>
                Giá bán: <?php echo $v->giathamkhao;?>
            </div>
        </a>
    <?php
    }
    ?>
</div>