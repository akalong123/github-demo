<?php
    function loadall_danhmuc(){
        $sql = "select * from danhmuc order by id asc ";
        $list_danhmuc = pdo_query($sql);
        return $list_danhmuc;
    }

    

    function insert_dm($ten_loai){
        $sql = "INSERT INTO danhmuc(name) VALUES('$ten_loai')";
        pdo_execute($sql);
    }

    function delete_dm($id){
        $sql = "delete from danhmuc where id=".$id;
        pdo_execute($sql);
    }

    function load_ten_dm($iddm){
        $sql = "select * from danhmuc where id = ".$iddm;
        $dm = pdo_query_one($sql);
        return $dm;
    }

    function update_dm($id,$name){
        $sql = "update danhmuc set name = '$name' where id=".$id;
        pdo_execute($sql);
    }
?>