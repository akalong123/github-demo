<?php
    function check_dangnhap($user,$pass){
        $sql="SELECT * FROM taikhoan WHERE user='$user' and pass='$pass'";
        $result = pdo_query_one($sql);
        return $result;
    }

    function dangxuat() {
        if (isset($_SESSION['user'])) {
            unset($_SESSION['user']);
        }
    }

    function quenMk($email) {
        $sql="SELECT * FROM taikhoan WHERE email='$email'";
        $taikhoan = pdo_query_one($sql);
        return $taikhoan;
    }
    function selectall_user(){
        $sql = "select * from taikhoan";
        $result = pdo_query($sql);
        return $result;
    }
    function selectone_user($user){
        $sql="SELECT * FROM taikhoan WHERE user='$user'";
        $result = pdo_query_one($sql);
        return $result;
    }

    function update_user($username,$password,$address,$phone,$user){
        $sql = "update taikhoan set user = '$username', pass = '$password',
                address = '$address', tel = '$phone'  where user= '$user'";
        pdo_execute($sql);
    }

    function delete_user($id){
        $sql="delete from giohang where iduser='$id'";
        pdo_execute($sql);
        $sql = "delete from taikhoan where id='$id'";
        pdo_execute($sql);
    }
?>