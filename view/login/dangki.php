<main class="catalog  mb ">

    <div class="boxleft">


        <div class="box_title">Đăng ký thành viên</div>
        <div class="box_content form_account">
            <?=$thongbao?>
            <form action="index.php?act=dangki" method="post">
                <div>
                    <p>Email</p>
                    <input type="email" name="email" placeholder="email">
                </div>
                <div>
                    Tên đăng nhập
                    <input type="text" name="user" placeholder="user">
                </div>
                Mật khẩu
                <div>
                    <input type="password" name="pass" placeholder="pass">
                </div>
                <input type="submit" value="Đăng Kí" name="dangki">
                <input type="reset" value="Nhập lại">
            </form>
        </div>


    </div>
    <?php include"view/boxright.php";?>
    </div>

</main>