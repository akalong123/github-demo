<?php
function insert_cart($idsp, $iduser, $name, $price, $hinh){
    
    $sql = "INSERT INTO `giohang`( `name`, `img`, `price`,  `idpro`, `iduser`) 
    VALUES ('$name','$hinh','$price','$idsp','$iduser')";
    pdo_execute($sql);
}
function show_cart($iduser)
{
    $sql = "SELECT * FROM `giohang` WHERE iduser = '$iduser'";
    $load_cart = pdo_query($sql);
    return $load_cart;
}

function delete_cart($id){
    $sql = "delete from giohang where id ='$id'";
    pdo_execute($sql);
}
?>