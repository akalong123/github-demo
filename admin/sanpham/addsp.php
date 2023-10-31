<div class="row2">
         <div class="row2 font_title">
          <h1>THÊM MỚI SẢN PHẨM</h1>
         </div>
         <div class="row2 form_content ">
          <form action="index.php?act=addsp" method="POST" enctype="multipart/form-data">
           <div class="row2 mb10 form_content_container">
           <label> MÃ DANH MỤC </label> <br>
            <select style="float:left; width:100px; height:27px;" name="iddm" id="">
              <?php
                foreach($list_danhmuc as $danhmuc){
                  extract($danhmuc);
                  echo'
                    <option value="'.$danhmuc['id'].'">'.$danhmuc['name'].'</option>
                  ';
                }
              ?>
            </select>
           </div>
           <div class="row2 mb10">
            <label>Tên SP </label> <br>
            <input type="text" name="name"  placeholder="Mời bạn nhập tên sản phẩm">
           </div>
           <div class="row2 mb10">
            <label> Giá </label> <br>
            <input type="text" name="price"  placeholder="Mời bạn nhập giá ">
           </div>
           <div  class="row2 mb10">
            <label>Hình ảnh </label> <br>
            <input style="float: left" type="file" name="img" id=""  placeholder="Tải hình ảnh lên">
           </div>
           <div class="row2 mb10">
            <label>Mô tả </label> <br>
            <textarea style="float: left" name="mota" id="" cols="30" rows="10" placeholder="Mời bạn nhập mô tả"></textarea>
           </div>
           
           <div class="row mb10 ">
          <input  type="hidden" name="id"  value="<?=$id?>">
         <input class="mr20" type="submit" name="themmoi" value="THÊM MỚI">
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