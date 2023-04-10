<?php
$r = '../../administrator/elements_NAK/mod/database.php';
if (file_exists($r)) {
    $f = $r;
}
else {
    $f = './administrator/elements_NAK/mod/database.php';
}
require_once $f;
//-------------------------

// $s = '../mod/database.php';
// if (file_exists($s)) {
//     $f = $s;
// }
// else {
//     $f = './elements_NAK/mod/database.php';
// }
// require_once $f;

//-----------------

// $r = '../../administrator/elements_NAK/mod/database.php';
// $s = '../mod/database.php';
// if (file_exists($s)) {
//     $f = $s;
//     require_once $f;
// }

// elseif (!file_exists($s)) {
//     $f = './elements_NAK/mod/database.php';
//     require_once $f;
// }
// // require_once $f;
// //-------------------------

// elseif (file_exists($r)) {
//     $f = $r;
//     require_once $f;
// }
// elseif (!file_exists($r)) {
//     $f = './administrator/elements_NAK/mod/database.php';
//     require_once $f;
// }
// else {
//     echo "đường dẫn không hợp lệ";
// }

class hanghoa extends DatabaseConnection {
    public function HanghoaGetAll() {
        $getAll = $this->connect->prepare("select * from hanghoa");
        $getAll->setFetchMode(PDO::FETCH_OBJ);
        $getAll->execute();

        return $getAll->fetchAll();
    }

    public function HanghoaAdd($tenhanghoa, $mota, $giathamkhao, $tenhinhanh, $hinhanh, $idloaihang) {
        $add = $this->connect->prepare("INSERT INTO hanghoa(tenhanghoa, mota, giathamkhao, tenhinhanh, hinhanh, idloaihang) VALUES (?,?,?,?,?,?)");
        $add->execute(array($tenhanghoa, $mota, $giathamkhao, $tenhinhanh, $hinhanh, $idloaihang));

        return $add->rowCount();
    }

    public function HanghoaDelete($idhanghoa) {
        $del = $this->connect->prepare("delete from hanghoa where idhanghoa=?");
        $del->execute(array($idhanghoa));

        return $del->rowCount();
    }

    public function HanghoaUpdate($tenhanghoa, $mota, $giathamkhao, $tenhinhanh, $hinhanh, $idloaihang, $idhanghoa) {
        $update = $this->connect->prepare("UPDATE hanghoa SET " . "tenhanghoa=?, mota=?, giathamkhao=?, tenhinhanh=?, hinhanh=?, idloaihang=?" . "WHERE idhanghoa = ?");
        $update->execute(array($tenhanghoa, $mota, $giathamkhao, $tenhinhanh, $hinhanh, $idloaihang, $idhanghoa));

        return $update->rowCount();
    }

    public function HanghoaGetbyId($idhanghoa) {
        $getTk = $this->connect->prepare("select * from hanghoa where idhanghoa=?");
        $getTk->setFetchMode(PDO::FETCH_OBJ);
        $getTk->execute(array($idhanghoa));

        return $getTk->fetch();
    }

    // public function HanghoaGetbyIdloaihang($idloaihang) {
    //     $getAllId = $this->connect->prepare("select * from hanghoa where idloaihang=?");
    //     $getAllId->setFetchMode(PDO::FETCH_OBJ);
    //     $getAllId->execute(array($idloaihang));

    //     return $getAllId->fetch();
    // }

    public function HanghoaGetbyIdloaihang($idloaihang) {
        $getAllId = $this->connect->prepare("select * from hanghoa where idloaihang=?");
        if ($getAllId->execute(array($idloaihang))) {
            $result = $getAllId->fetchAll(PDO::FETCH_OBJ);
            return $result;
        } else {
            // handle error
            return false;
        }
    }
}   
?>