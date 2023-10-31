<main class="catalog  mb ">
          
            <div class="boxleft">
                 <h1>TOP 10 SẢN PHẨM HOT NHẤT</h1>
           
            <div class="items">
               <?php foreach ($list_top10 as $sp) { 
                  extract($sp);
                  $linksp = 'index.php?act=chitietsp&id='.$id;
                  echo '
                     <div class="box_items">
                     <div class="box_items_img">
                        <img src="'.$img_path.$img.'" alt="">
                        <form action="?act=giohang&id='.$id.'" method="post">
                           <input type="hidden" name="idsp" value="<?=$id?>">
                           <button class="add" name="add" value="thêm" >ADD TO CART</button>
                        </form>
                     </div>
                     <a class="item_name" href="'.$linksp.'">'.$name.'</a>
                     <h2 class="price">'.$price.'</h2>
                     
                     </div>
                  '; }
               ?>
               
             
             
             
            
        </div>
      </div>
            <?php include"view/boxright.php";?>
           
        </main>