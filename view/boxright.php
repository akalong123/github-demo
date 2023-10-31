<div class="boxright">

    <div class="mb">
        <div class="box_title">TÀI KHOẢN</div>
        <?php if (!isset($_SESSION['user'])) { ?>
        <div class="box_content form_account">
            <form action="index.php?act=dangnhap" method="POST">
                <h4>Tên đăng nhập</h4><br>
                <input type="text" name="user" id="">
                <h4>Mật khẩu</h4><br>
                <input type="password" name="pass" id=""><br>
                <input type="checkbox" name="" id="">Ghi nhớ tài khoản?
                <br><input type="submit" value="Đăng nhập" name="dangnhap">
                <br>
                <?php if (isset($message)&&$message != '') {
                echo $message;
            } ?>
            </form>
            <li class="form_li"><a href="index.php?act=quenmk">Quên mật khẩu</a></li>
            <li class="form_li"><a href="index.php?act=dangki">Đăng kí thành viên</a></li>
        </div>
        <?php } else { ?>
          <div class="box_content form_account" >
            <p style="text-align: center; ">Hello <?=$_SESSION['user']?></p>
            <button><a href="index.php?act=dangxuat">Đăng xuất</a></button> <br><br>
            <button><a href="index.php?act=quenmk">Quên mật khẩu</a></button> <br> <br>
            <button><a href="index.php?act=capnhattk">Cập nhật tài khoản</a></button> <br> <br>
            
            <?php  
                $user = selectone_user($_SESSION['user']); 
            ?>

            <?php if($user['role'] == 1) { ?>
            <button><a href="./admin/index.php?act=home">Vào trang quản trị</a></button> <br>

            <?php } ?>
            
          </div>
        <?php } ?>
    </div>
    <div class="mb">
        <div class="box_title">DANH MỤC</div>
        <div class="box_content2 product_portfolio">
            <ul>
                <?php
                      foreach($list_danhmuc as $danhmuc){
                        extract($danhmuc);
                        $linkdm = 'index.php?act=sanpham&iddm='.$id;
                        echo '<li><a href="'.$linkdm.'">'.$name.'</a></li> ';
                      }
                    ?>

            </ul>
        </div>
        <div class="box_search">
            <form action="#" method="POST">
                <input type="text" name="" id="" placeholder="Từ khóa tìm kiếm">
            </form>
        </div>
    </div>
    <!-- DANH MỤC SẢN PHẨM BÁN CHẠY -->
    <div class="mb">
        <div class="box_title">SẢN PHẨM BÁN CHẠY</div>
        <div class="box_content">
            <?php 
                  foreach ($top10_sp as $sp) {
                      extract($sp);
                      $img = $img_path.$img;
                      
                      $linksp = 'index.php?act=chitietsp&id='.$id;
                        echo '
                          <div class="selling_products" style="width:100%;">
                          <img src="'.$img.'" alt="anh">
                          <a href="'.$linksp.'">'.$name.'</a>
                          </div>
                        ';
                      }?>

        </div>
    </div>
</div>