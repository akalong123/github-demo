<?php
include"../global.php";
?>
<div class="row2">
    <div class="row2 font_title">
        <h1>DANH SÁCH SẢN PHẨM</h1>
    </div>
    <div class="row2 form_content ">
        <div style="display:flex; justify-content: space-between; margin-top:10px">
            <form action="index.php?act=listkh" method="post" style="margin-left:400px">
                <input style=" display:inline-block; width:300px; height:27px;" type="text" name="kyw"
                    placeholder="Search theo tên sản phẩm">
                <input type="submit" name="search" value="Tìm Kiếm">
            </form>
            <form action="index.php?act=listkh" method="post" style=" float:right; margin-bottom:15px;">
                <select style="width:100px; height:27px;" name="iddm" id="">
                    <option value="0" selected>Tất cả</option>
                    <?php
                    foreach($list_kh as $kh){
                      extract($kh);
                      echo'
                          <option style="padding:15px"  value="'.$id.'">'.$name.'</option>
                          ';

                    }
                  ?>
                    <input style="margin-left:10px;" type="submit" name="filter" value="Lọc">
                </select>
            </form>
        </div>
        <form action="index.php?act=xoakh" method="POST">
            <div class="row2 mb10 formds_loai">
            <?=$thongbao?>
                <table>
                    <tr>
                        <th></th>
                        <th>Id</th>
                        <th>ID user</th>
                        <th>Email</th>
                        <th>Địa chỉ</th>
                        <th>Số điện thoại</th>
                        <th></th>
                    </tr>
                    <?php
                
                foreach ($list_kh as $kh) {
                  extract($kh);
                  $xoakh = "index.php?act=xoakh&id=".$id;
                    echo '
                    </tr>
                      <td><input type="checkbox" name="" id=""></td>
                      <td>'.$id.'</td>
                      <td>'.$user.'</td>
                      <td>'.$email.'</td>
                      <td>'.$address.'</td>
                      <td>'.$tel.'</td>
                      <td>
                        <a href="'.$xoakh.'">
                              <input type="button" value="Xóa" >
                        </a> 
                      </td>
                      </tr>
                    ';
                }
                
              ?>
                </table>
            </div>
        </form>
    </div>
    <div class="row mb10 ">
         <a href="../index.php?act=dangki"> <input  class="mr20" type="button" value="NHẬP THÊM"></a>
        </div>
</div>