
<main class="catalog  mb ">

    <div class="boxleft">
      <div class="  mb">
        <div class="box_title">
                <?php echo $name; ?>
            </div>
        <div class="box_content">
          <img src="<?=$img_path.$img?>">
          <div>
            <?=$mota?>
          </div>
        </div>
      </div>

      <div class="mb">
        <div class="box_title">BÌNH LUẬN</div>
            <div class="box_content2  product_portfolio binhluan ">
                <table>
                    <?php foreach($result as $value): ?>
                    <tr>
                        <td><?php echo $value['noidung']?></td>
                        <td><?php echo $value['user']?></td>
                        <td><?php echo date("d/m/Y", strtotime($value['ngaybinhluan'])) ?></td>
                    </tr>
                    <?php endforeach; ?>
                </table>
            </div>
        <div class="box_search">
                <?php if(isset($_SESSION['user'])) { ?>
                    <form action="index.php?act=chitietsp&id=<?=$id?>" method="POST">
                        <input type="hidden" name="idpro" value="<?=$id?>">
                        <input type="text" name="content">
                        <input type="submit" name="guibinhluan" value="Gửi bình luận">
                    </form>
                <?php }else { ?>
                    <b class="success"><u><a href="#login" class="success">Đăng nhập</a></u> để có thể bình luận</b>
                <?php } ?>
            </div>

      </div>

      <div class=" mb">
        <div class="box_title">SẢN PHẨM CÙNG LOẠI</div>
        <div class="box_content">
            <?php
              foreach($list_cungloai as $sp){
                extract($sp);
                $linksp = 'index.php?act=chitietsp&id='.$id;
                echo '
                <li>
                <a href="'.$linksp.'">'.$name.'</a>
                </li><br>
                ';
              }
            ?>
        </div>
      </div>
    </div>
    <?php include"view/boxright.php";?>

  </main>