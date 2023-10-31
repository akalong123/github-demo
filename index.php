<?php
    session_start();
    include "modal/pdo.php";
    include "modal/sanpham.php";        
    include "modal/danhmuc.php";        
    include "modal/dangki.php";        
    include "modal/giohang.php";        
    include "modal/taikhoan.php";        
    include "modal/binhluan.php";        
    include "view/header.php";
    include "global.php";

    $spnew = loadall_sanpham_home();
    $list_danhmuc = loadall_danhmuc();
    $top10_sp = loadall_sanpham_top10();

    if (isset($_GET['act']) && ($_GET['act'] != "")) {
        $act = $_GET['act'];
        switch ($act) {
            case 'chitietsp':
                if (isset($_GET['id']) && $_GET['id']>0) {
                    extract(load_sanpham($_GET['id']));
                    $list_cungloai = sanpham_cungloai($iddm);

                    $result = loadall_binhluan($_GET['id']);
                }
                if(isset($_POST['guibinhluan'])){
                    insert_binhluan($_POST['idpro'], $_POST['content'], $_SESSION['id']);
                    $result = loadall_binhluan($_GET['id']);
                }
                include"view/chitiet.php";
                break;
            case 'sanpham':
                if (isset($_GET['iddm']) && $_GET['iddm']>0) {
                    $iddm = $_GET['iddm'];
                    $list_sanpham = loadall_sanpham("",$iddm);
                }
                include"view/sanpham.php";
                
                break;
            case 'sanphammain':
                $list_top10 = loadall_sanpham_top10();
                extract($list_top10);
                
                include"view/sanphammain.php";
                break;

            case 'danhmuc':

                $list_laptop = sanpham_rieng(1);
                extract($list_laptop);
                
                $list_phone = sanpham_rieng(2);
                extract($list_phone);

                include"view/danhmuc.php";
                
                break;
            case 'dangki':
                $thongbao ="";
                    if (isset($_POST['dangki']) && $_POST['dangki']) {
                        $email = $_POST['email'];
                        $user = $_POST['user'];
                        $pass = $_POST['pass'];
                        
                        if ($email == "" || $user == "" || $pass =="") {
                            $thongbao = "Bạn phải nhập đầy đủ thông tin";
                        }else{
                            insert_user($email,$user,$pass);
                            $thongbao ="Thêm người dùng thành công";
                        }
                        
                    }
                    include"view/login/dangki.php";
                
                break;
            case 'dangnhap':
                    if (isset($_POST['dangnhap']) && $_POST['dangnhap']) {
                        $user = $_POST['user'];
                        $pass = $_POST['pass'];

                        $check = check_dangnhap($user,$pass);
                        if ($check != false) {
                            $_SESSION['user'] = $user;
                            $message = "Đăng nhập thành công";
                            $result = selectall_user();
                            foreach ($result as $user) {
                                if ($user['pass'] == $pass && $user['user'] == $user) {
                                    $_SESSION['role'] = $user['role'];
                                }
                            }
                            $temp = selectone_user($_SESSION['user']);
                            $_SESSION['id'] = $temp['id'];
                        }else{
                            
                            $message = "Tên đăng nhập hoặc mật khẩu không chính xác";
                        }
                        $message = "";
                        include"view/home.php";
                    }
                break;
            
                case "dangxuat":
                    dangxuat();
                    include "view/home.php";
                    break;
                
                case "quenmk":
                        if (isset($_POST['guiemail'])) {
                            $email = $_POST['email'];
                            $taikhoan = quenMk($email);
                            if ($taikhoan != false) {
                            
                                extract($taikhoan);
                                $message = "Mật khẩu của bạn là ".$pass;
                            }else {
                                $message = "Đã có lỗi xảy ra";
                            }
                        }
                        include "view/login/quenmk.php";
                    break;
                case "capnhattk":
                    $thongbao = "";
                            $result = selectone_user($_SESSION['user']);
                            extract($result);
                        if (isset($_POST['capnhat']) && $_POST['capnhat']) {
                            $username = $_POST['user'];
                            $password = $_POST['pass'];
                            $address = $_POST['address'];
                            $phone = $_POST['tel'];
                            update_user($username,$password,$address,$phone,$_SESSION['user']);
                            $thongbao = "Cập nhật thành công";
                            }
                        include "view/login/updatetk.php";
                        break;
                    case 'giohang':
                        if (isset($_SESSION['id'])) {
                                $list_giohang = show_cart($_SESSION['id']);
                            }
                        if (isset($_POST['add'])) {
                            $id = $_GET['id'];
                            $sanpham= load_sanpham($id);
                            $name = $sanpham['name'];
                            $price = $sanpham['price'];
                            $img = $sanpham['img'];
                            $iduser = $_SESSION['id'];
                            insert_cart($id,$iduser, $name, $price,$img );
                            $list_giohang = show_cart($_SESSION['id']);
                        }
                            if (isset($_POST['delete_cart'])) {
                                if (isset($_GET['idsp'])) {
                                    $idsp = $_GET['idsp'];
                                    delete_cart($idsp);
                                    header('Location: ' . $_SERVER['REQUEST_URI']);
                                    exit();
                                }
                            }
                            include "view/giohang.php";
                        break;
            
            default:
                include"view/home.php";
                break;
        }
    }else {
        include"view/home.php";
    }

    include"view/footer.php";
?>
        
       