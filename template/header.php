       <!-- banner bg main start -->
       <div class="banner_bg_main">
          <!-- header top section start -->
          <!-- logo section start -->
          <div class="logo_section">
             <div class="container">
                <div class="row">
                   <div class="col-sm-12">
                      <div class="logo"><a href="index.php"><img src="images/logoabai.png" width="350">
                            <h1 class="banner_taital"> Website Penyedia Referensi Tools Ai</h1>
                         </a></div>
                   </div>
                </div>
             </div>
          </div>

          <!-- Form  -->





          <!-- logo section end -->
          <!-- header section start -->
          <form action="index.php" method="get" id="form1">
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
          </form>

          <div class="header_box">
             <div class="login_menu">
                <button type="button" data-toggle="modal" data-target="#myModal"><a href="#">
                      <i class="fa fa-user" aria-hidden="true" style="color: black;"></i>
                      <span class="padding_10" style="font-weight: bold;">Login</span></a></button>
                <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                   <div class="modal-dialog modal-sm" role="document" style="max-width: none; width: 400px;
  margin: 20px  auto;">
                      <!-- login -->
                      <div class="modal-content" style="background: none; border: none;">
                         <div class="form-bg">
                            <div class="row">
                               <div class="col-md-offset col-md col-sm-offset col-sm">
                                  <div class="form-container">
                                     <h3 class="title">Masuk Akun</h3>
                                     <form class="form-horizontal" action="function/proses.php" method="post">
                                        <div class="form-group">
                                           <input type="text" class="form-control" name="username" placeholder="Username" required>
                                        </div>
                                        <div class="form-group">
                                           <input type="password" class="form-control" name="password" placeholder="Password" required>
                                        </div>
                                        <button class="btn signup" type="submit" name="masuk_akun">Login</button>
                                        <!-- <button class="btn signin bg-light"><i class="fa fa-google" style="color: black; font-size: 18px; "></i></button> -->
                                        <span>Belum Punya Akun? <a href="#register" data-toggle="modal" style="font-size: 13px; color: #f26522;">Daftar Sekarang</a></span>
                                     </form>
                                  </div>
                               </div>
                            </div>
                         </div>
                      </div>




                   </div>
                </div>
             </div>

          </div>

       </div>
       </div>
       </div>
       <div class="modal fade" id="register" tabindex="-1" role="dialog" aria-labelledby="registerLabel">
          <div class="modal-dialog modal-sm" role="document" style="max-width: none; width: 400px;
  margin: 20px  auto;">

             <div class="modal-content" style="background: none; border: none;">
                <div class="form-bg">
                   <div class="row">
                      <div class="col-md-offset col-md col-sm-offset col-sm">
                         <div class="form-container">
                            <h3 class="title">Buat Akun</h3>
                            <form class="form-horizontal" action="function/proses.php" method="post">
                               <div class="form-group">
                                  <input type="text" class="form-control" placeholder="Nama" name="nama" required>
                               </div>
                               <div class="form-group">
                                  <input type="email" class="form-control" placeholder="Email" name="email" required>
                               </div>
                               <div class="form-group">
                                  <input type="password" class="form-control" placeholder="Password" name="password" required>
                               </div>
                               <div class="form-group">
                                  <input type="password" class="form-control" placeholder="Konfirmasi Password" name="conf_pass" required>
                               </div>
                               <button class="btn signup" type="submit" style="width: 100%;" name="buat_akun">Daftar</button>
                               <span>Sudah Punya Akun? <a href="#myModal" data-toggle="modal" style="font-size: 13px; color: #f26522;">Login Sekarang</a></span>
                            </form>
                         </div>
                      </div>
                   </div>
                </div>
             </div>

          </div>
       </div>



       <div class="container">
          <div class="box_section">
             <div class="online_box">
                <div class="online_box_left">
                   <div class="online_box_main">
                      <div class="box_left">
                         <div class="right_arrow"><i class="fa fa-arrow-right"></i></div>
                      </div>
                      <div class="box_right">
                         <a href="#" class="appoinment_text active" onclick="showAlert()"> Populer</a>
                      </div>
                   </div>
                </div>
                <div class="online_box_left ">
                   <div class="online_box_main">
                      <div class="box_left">
                         <div class="right_arrow"><i class="fa fa-arrow-right"></i></div>
                      </div>
                      <div class="box_right">
                         <a href="#" class="appoinment_text active" onclick="showAlert()"> Favorit</a>
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





       <!-- header section end -->