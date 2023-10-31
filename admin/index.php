<?php
    include "../modal/pdo.php";
    include "../global.php";
    include "../modal/danhmuc.php";
    include "../modal/binhluan.php";
    include "../modal/bieudo.php";
    include "../modal/taikhoan.php";
    include "../modal/sanpham.php";
    include "header.php";

    if (isset($_GET['act']) && $_GET['act'] != "") {
        $act = $_GET['act'];
        switch ($act) {
            case 'adddm':             
                    if (isset($_POST['themmoi']) && $_POST['themmoi'] ) {
                        $ten_loai = $_POST['tenloai'];
                        if ($ten_loai != "") {
                            insert_dm($ten_loai);
                            $thongbao ="Đã thêm danh mục thành công";
                        }else {
                            $thongbao = "Bạn phải nhập tên danh mục";
                        }
                    }
                    include"danhmuc/adddm.php";
                break;
            case 'listdm':
                    $list_danhmuc = loadall_danhmuc();
                    include"danhmuc/listdm.php";
                break;
            case 'xoadm':
                    if (isset($_GET['id']) && $_GET['id'] > 0) {
                        delete_dm($_GET['id']);
                    }
                    $list_danhmuc = loadall_danhmuc();
                    include"danhmuc/listdm.php";
                break;
            case 'suadm':
                    $dm = load_ten_dm($_GET['id']);
                    extract($dm);
                    include"danhmuc/updatedm.php";
                break;
            case 'updatedm':
                if (isset($_POST['capnhat']) && $_POST['capnhat']) {
                    $tenloai= $_POST['tenloai'];
                    $maloai= $_POST['maloai'];
                    update_dm($maloai,$tenloai);
                    $thongbao="Bạn đã chỉnh sửa thành công";
                } 
                $list_danhmuc = loadall_danhmuc();
                include"danhmuc/listdm.php";
                break;
            case 'addsp':
                    $list_danhmuc = loadall_danhmuc();
                    if (isset($_POST['themmoi']) && $_POST['themmoi']) {
                        $iddm = $_POST['iddm'];
                        $name = $_POST['name'];
                        $price = $_POST['price'];
                        $img = $_FILES['img']['name'];
                        $target_file  = "../upload/" . basename($_FILES["img"]["name"]);
                        $desc = $_POST['mota'];

                        if ($img != "") {
                            move_uploaded_file($_FILES["img"]["tmp_name"],$target_file);
                            echo $img;
                        }
                        else{
                            $img = "";

                        }

                            
                        addsp($name,$price,$img,$desc,$iddm);
                        $thongbao= "Thêm sản phẩm thành công";
                    }
                    include"sanpham/addsp.php";
                break;
            case 'listsp':

                    $list_danhmuc = loadall_danhmuc();
                    $result = "";
                    $iddm=0;
                    if (isset($_POST['search']) && $_POST['search']) {
                        $result = $_POST['kyw'];    
                    }
                    if (isset($_POST['filter']) && $_POST['filter']) {
                        $iddm = $_POST['iddm'];
                    }
                    $list_sanpham = loadall_sanpham($result,$iddm);
                    include"sanpham/listsp.php";
                break;
            case 'xoasp':
                if (isset($_GET['id']) && $_GET['id'] > 0) {
                    xoa_sanpham($_GET['id']);
                    echo "Xóa sản phẩm thành công";
                }
                $list_sanpham = loadall_sp();
                include"sanpham/listsp.php";
                break;
            case 'suasp':
                    $list_danhmuc = loadall_danhmuc();
                    $sp = load_sanpham($_GET['id']);
                    extract($sp);
                    include"sanpham/updatesp.php";
                break;
            case 'updatesp':
                if (isset($_POST['capnhat']) && $_POST['capnhat']) {
                    $id = $_POST['id'];
                    $iddm = $_POST['iddm'];
                    $name = $_POST['name'];
                    $price = $_POST['price'];
                    $img = $_FILES['img']['name'];
                    $target_file  = "../upload/" . basename($_FILES["img"]["name"]);
                    $desc = $_POST['mota'];
        
                    if ($img !="") {
                        move_uploaded_file($_FILES["img"]["tmp_name"],$target_file);
                    } else {
                        $img = "";
                    }
        
                    update_sanpham($id, $iddm, $name, $price, $img, $desc);
        
                    $thongbao = "Sửa sản phẩm thành công";
                }
                $list_sanpham = loadall_sp();
                    include"sanpham/listsp.php";
                break;
            case 'listcmt':
                $thongbao ="";
                    $list_cmt = selectlist_cmt();
                    include"binhluan/listcmt.php";
                break;
            case 'xoacmt':
                $thongbao ="";
                if (xoaCmt($_GET['id']) == true) {
                    $thongbao = "Xóa bình luận thành công";
                    die;
                }
                    
                $list_cmt = selectlist_cmt();
                include"binhluan/listcmt.php";
                    
                break;
            case 'listkh':
                $thongbao ="";
                    $list_kh = selectall_user();
                    include"khachhang/listkhachhang.php";
                break;
            case 'xoakh':
                $thongbao ="";
                    $idkh = $_GET['id'];
                    delete_user($idkh);
                    $thongbao="Xóa người dùng thành công";
                    $list_kh = selectall_user();
                    include"khachhang/listkhachhang.php";
                break;

            
            case 'thongke':
                $dsthongke =  load_thongke_sanpham_danhmuc();
                    include"bieudo.php";
                break;
            
            default:
                include"home.php";
                break;
        }
    }else {
        include"home.php";
    }

    

    include"footer.php";
?>