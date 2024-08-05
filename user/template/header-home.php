<!-- banner bg main start -->
<div class="banner_bg_main">
   <button class="btn-modal" type="button" data-toggle="modal" data-target="#myModal" style="background: none; float: right; margin-right: 6%; "><a href="#">
         <i class="fa fa-user-circle fa-4x " aria-hidden="true"></i>
      </a></button>
   <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
      <div class="modal-dialog modal-sm" role="document" style="max-width: none; width: 250px; margin: 20px  auto;">

         <div class="modal-content" style="background: none; border: none;">
            <div class="form-bg">
               <div class="row text-center">

                  <!-- Team item -->
                  <div class="col-xl col-sm-6 mb-5">
                     <div class="bg-white rounded shadow-sm py-5 px-4">
                        <img src="../images/profile/<?= $result['gambar'] ?>" width="100" class="img-fluid rounded-circle mb-3 img-thumbnail shadow-sm">
                        <h5 class="mb-0"><?= $result['username'] ?></h5>
                        <span class="large text-uppercase text-muted"><?= $result['email'] ?></span>
                        <div class="profile-userbuttons py-2">
                           <button type="button" class="btn btn-success btn-sm"><a href="edit_user.php" style="color: white;">View</a> </button>
                           <button type="button" class="btn btn-danger btn-sm"><a href="logout.php">LogOut</a></button>
                        </div>
                     </div>
                  </div>
                  <!-- End -->

               </div>
            </div>
         </div>


      </div>
   </div>
   <div class="logo_section">
      <div class="container">
         <div class="row">
            <div class="col-sm-12">
               <div class="logo">
                  <a href="home.php">
                     <img src="../images/logoabai.png" width="350"><br>
                     <h1 class="banner_taital"> Website Penyedia Referensi Tools Ai</h1>
                  </a>
               </div>
            </div>
         </div>
      </div>
   </div>

   <!-- Form  -->




   <!-- logo section end -->
   <!-- header section start -->
   <form action="home.php" method="get">
      <div class="header_section">
         <div class="container">
            <div class="containt_main">
               <div class="main">
                  <!-- Another variation with a button -->
                  <div class="input-group">
                     <input type="text" class="form-control" placeholder="Cari Ai Tools" name="keyword" id="keyword">
                     <div class="input-group-append">
                        <button class="btn btn-secondary" type="submit" style="background-color: #f26522; border-color:#f26522" name="cari">
                           <i class="fa fa-search"></i>
                        </button>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </form>


   <!-- header section end -->


   <div class="container">
      <div class="box_section">
         <div class="online_box">
            <div class="online_box_left">
               <div class="online_box_main">
                  <div class="box_left">
                     <div class="right_arrow"><i class="fa fa-arrow-right"></i></div>
                  </div>
                  <div class="box_right">
                     <a href="populer.php" class="appoinment_text active"> Populer</a>
                  </div>
               </div>
            </div>
            <div class="online_box_left ">
               <div class="online_box_main">
                  <div class="box_left">
                     <div class="right_arrow"><i class="fa fa-arrow-right"></i></div>
                  </div>
                  <div class="box_right">
                     <a href="favorit.php" class="appoinment_text active"> Favorit</a>
                  </div>
               </div>
            </div>
            <div class="online_box_left">
               <div class="online_box_main">
                  <div class="box_left">
                     <div class="right_arrow"><i class="fa fa-arrow-right"></i></div>
                  </div>
                  <div class="box_right">
                     <a href="#" class="appoinment_text sort_by_btn">Sort By <span id="sort_order_text">Ascending</span></a>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
         
</div>