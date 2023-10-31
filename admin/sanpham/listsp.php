<?php
include"../global.php";
?>
<div class="row2">
    <div class="row2 font_title">
        <h1>DANH SÁCH SẢN PHẨM</h1>
    </div>
    <div class="row2 form_content ">
        <div style="display:flex; justify-content: space-between; margin-top:10px">

            <form action="index.php?act=listsp" method="post" style="margin-left:400px">
                <input style=" display:inline-block; width:300px; height:27px;" type="text" name="kyw"
                    placeholder="Search theo tên sản phẩm">
                <input type="submit" name="search" value="Tìm Kiếm">
            </form>
            <form action="index.php?act=listsp" method="post" style=" float:right; margin-bottom:15px;">
                <select style="width:100px; height:27px;" name="iddm" id="">
                    <option value="0" selected>Tất cả</option>
                    <?php
                    foreach($list_danhmuc as $danhmuc){
                      extract($danhmuc);
                      echo'
                          <option style="padding:15px"  value="'.$id.'">'.$name.'</option>
                          ';

                    }
                  ?>
                    <input style="margin-left:10px;" type="submit" name="filter" value="Lọc">
                </select>
            </form>
        </div>
        <form action="index.php?act=listsp" method="POST">
            <div class="row2 mb10 formds_loai">
                <table>
                    <tr>
                        <th></th>
                        <th>ID</th>
                        <th>Tên SP</th>
                        <th>Giá</th>
                        <th>Hình ảnh</th>
                        <th>Mô tả</th>
                        <th>Lượt xem</th>
                        <th>Iddm</th>
                        <th></th>
                    </tr>
                    <?php
                
                foreach ($list_sanpham as $sanpham) {
                  extract($sanpham);
                  $suasp = "index.php?act=suasp&id=".$id;
                  $xoasp = "index.php?act=xoasp&id=".$id;
                  $link_img = "../upload/".$img;

                    echo '
                    </tr>
                      <td><input type="checkbox" name="" id=""></td>
                      <td>'.$id.'</td>
                      <td>'.$name.'</td>
                      <td>'.$price.'</td>
                      <td><img style="width:60px" src="'.$link_img.'" alt=""></td>
                      <td>'.$mota.'</td>
                      <td>'.$luotxem.'</td>
                      <td>'.$iddm.'</td>
                      <td>
                        <a href="'.$suasp.'">
                          <input type="button" value="Sửa">
                          </a> 
                        <a href="'.$xoasp.'">
                              <input type="button" value="Xóa">
                        </a> 
                      </td>
                      </tr>
                    ';
                }
                
              ?>
                </table>
            </div>
            <div class="row mb10 ">
                <input class="mr20" type="button" value="CHỌN TẤT CẢ">
                <input class="mr20" type="button" value="BỎ CHỌN TẤT CẢ">
                <a href="index.php?act=addsp"> <input class="mr20" type="button" value="NHẬP THÊM"></a>
            </div>
        </form>
    </div>
</div>