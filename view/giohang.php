<?php if (isset($_SESSION['user'])) {?>
<h1 style="text-align:center; padding-bottom:15px" class="boxtitle">Giỏ hàng</h1>
<div class="boxcontent">
        
    <table class="bang__cart" border="1" width="100%">
        <tr>
            <th>STT</th>
            <th>Ảnh đại diện</th>
            <th>Tên sản phẩm</th>
            <!-- <th>Số lượng</th> -->
            <th>Giá</th>
            <th>Thành tiền</th>
            <th>Hành động</th>
        </tr>
        <?php if (isset($_SESSION['user'])) { ?>
            <?php
            $i = 1;
            $sum = 0;
            foreach ($list_giohang as $cart) {
                extract($cart);
                $sum += $price;
                $thanhtien = 1 * $price;
            ?>

                <tr>
                    <form action="index.php?act=giohang&idsp=<?= $id ?>" method="post">
                        <td><?= $i++ ?></td>
                        <td><img width="80" src="./upload/<?=$img ?>" alt="Ảnh sản phẩm" /></td>
                        <td><?= $name ?></td>
                        <!-- <td><input id="number" name="quantity" type="number" value="1"></td> -->
                        <td><?= number_format($price) ?> đ</td>
                        <td><?= number_format($thanhtien) ?> đ</td>
                        <td>
                            <button onclick="return confirm('Bạn có chắc chắn muốn xóa không');" name="delete_cart" value="Xóa" type="submit">Xóa</button>
                        </td>
                    </form>
                </tr>

            <?php }
            ?>
        <?php  } else { ?>
            <tr>
                <td colspan="7">Không có sản phẩm nào</td>
            </tr>
        <?php } ?>
    </table>
    <h1 style="font-size: 1.5vw;" class="mt">Tổng tiền: <?=number_format($sum)?> VNĐ</h1>
    <?php } else{?>
        <h1>BẠN PHẢI ĐĂNG NHẬP ĐỂ THÊM VÀO GIỎ HÀNG</h1>
    <?php } ?>

</div>
<script>

</script>