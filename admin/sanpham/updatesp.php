<?php
  
?>
<div class="row2">
         <div class="row2 font_title">
          <h1>CHỈNH SỬA SẢN PHẨM</h1>
         </div>
         <div class="row2 form_content ">
            <form action="index.php?act=updatesp" method="POST" enctype="multipart/form-data" >
            <div class="row2 mb10 form_content_container">
            <label> MÃ DANH MỤC </label> <br>
            <select style="width:100px; height:27px; float:left" name="iddm" id="">
                    <option value="0"  selected >Tất cả</option>
                  <?php
                    foreach($list_danhmuc as $danhmuc){
                      if ($iddm == $danhmuc['id']) {
                        echo'<option style="padding:15px" selected value="'. $danhmuc['id'].'">'.$danhmuc['name'].'</option>';
                      }else{                       
                        echo'<option style="padding:15px"  value="'. $danhmuc['id'].'">'.$danhmuc['name'].'</option>';
                      }

                    }
                  ?>
              </select>
            <div class="row2 mb10">
              <label>Tên SP </label> <br>
              <input type="text" name="name" value="<?=$name?>">
            </div>
            <div class="row2 mb10">
              <label> Giá </label> <br>
              <input type="text" name="price" value="<?=$price?>">
            </div>
            <div class="row2 mb10" >
              <label>Hình ảnh </label> <br>
              <div style="float:left">

                  <?php
                $hinh = '../upload/'.$img;
                echo '<img style ="height:100px" src="'.$hinh.'" alt="">';
                ?>
              </div>
              <input style="float:left" type="file" name="img" vaule="<?=$hinh?>">
              
            </div>
            <div class="row2 mb10">
              <label>Mô tả </label> <br>
              <input type="text" name="mota" value="<?=$mota?>">
            </div>
           <div class="row mb10 ">
          <input type="hidden" name="id"  value="<?=$id?>">
         <input class="mr20" type="submit" name="capnhat" value="CẬP NHẬT">
         <input  class="mr20" type="reset" value="NHẬP LẠI">

         <a href="index.php?act=listsp"><input  class="mr20" type="button" value="DANH SÁCH"></a>
           </div>
          <?php
            if (isset($thongbao) && ($thongbao != "")) {
                echo $thongbao;
            }
          ?>
          </form>
         </div>
        </div>
