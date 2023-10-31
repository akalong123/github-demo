<main class="catalog  mb ">
          
            <div class="boxleft">
                 <div class="banner">
                    <img id="banner" src="./img/anh0.jpg" alt="">
                    <button class="pre" onclick="pre()">&#10094;</button>
                    <button class="next" onclick="next()">&#10095;</button>
                 </div>
           
            <div class="items">
               <?php foreach ($spnew as $sp) { 
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