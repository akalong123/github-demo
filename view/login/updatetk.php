<main class="catalog  mb ">

    <div class="boxleft">


        <div class="box_title">Đăng ký thành viên</div>
        <div class="box_content form_account">
            <form action="index.php?act=capnhattk" method="post">              
                <div>
                    <p>User</p>
                    <input type="text" name="user" placeholder="User" value="<?=$user?>">
                </div>
                <div>
                    <p>Mật khẩu</p>
                    <input type="pass" name="pass" placeholder="Mật khẩu" value="<?=$pass?>">
                </div>
                <div>
                    <p>Địa chỉ</p>
                    <input type="text" name="address" placeholder="Địa chỉ" value="<?=$address?>">
                </div>
                <div>
                    <p>Số điện thoại</p>
                    <input type="tel" name="tel" placeholder="Số điện thoại" value="<?=$tel?>">
                </div>
                <br>
                <input type="submit" value="Cập nhật" name="capnhat">
                <input type="reset" value="Nhập lại">
            </form>
            <?=$thongbao?>

        </div>


    </div>
    <?php include"view/boxright.php";?>
    </div>

</main>