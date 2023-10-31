<?php

    function loadall_sanpham_home(){
        $sql = "SELECT * FROM sanpham where 1 order by id desc limit 0,9";
        $list_sp =  pdo_query($sql);
        return $list_sp;
    }



    function loadall_sanpham_top10(){
        $sql = "SELECT * FROM sanpham where 1 order by luotxem desc limit 0, 10";
        $list_sp =  pdo_query($sql);
        return $list_sp;
    }

    function addsp($name,$price,$img,$desc,$iddm){
        $sql = "insert into sanpham(name,price,img,mota,iddm)
                values('$name','$price','$img','$desc','$iddm')";
        pdo_execute($sql);
    }


    function loadall_sanpham($result,$iddm){
        $sql = "SELECT * FROM sanpham where 1";
        if ($result != "") {
            $sql.= " and name like '%".$result."%'";
        }

        if ($iddm >0) {
            $sql.=" and iddm =".$iddm;
        }
        $list_sanpham = pdo_query($sql);
        return $list_sanpham;
    }

    function loadall_sp(){
        $sql = "SELECT * FROM sanpham where 1 ";
        $list_sanpham = pdo_query($sql);
        return $list_sanpham;
    }

    function xoa_sanpham($id){
        $sql = "delete  from sanpham where id= " .$id;
        pdo_execute($sql);
    }

    function load_sanpham($id){
        $sql = "select * from sanpham where id= " .$id;
        $sp = pdo_query_one($sql);
        return $sp;
    }

    function update_sanpham($id,$iddm,$name,$price,$img,$desc){
        if ($img != "") {
            $sql = "update sanpham set name= '$name', iddm='$iddm',
            price= '$price' , img = '$img', mota='$desc' where id= ".$id;
        }else{
            $sql = "update sanpham set name= '$name', iddm='$iddm',
            price='$price' , mota='$desc' where id=".$id;
        }
        pdo_execute($sql);
        
    }

    function sanpham_rieng($iddm){
        $sql ="select * from sanpham where iddm=".$iddm;
        $list_sanpham = pdo_query($sql);
        return $list_sanpham;
    }

    function sanpham_cungloai($iddm){
        $sql ="select * from sanpham where iddm=".$iddm;
        $list_cungloai = pdo_query($sql);
        return $list_cungloai;
    }
    
?>