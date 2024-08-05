<?php
include("../databases/koneksi.php");
sleep(1);

if (isset($_POST["limit"], $_POST["start"], $_POST["keyword"], $_POST["orderBy"])) {
  $keyword = mysqli_real_escape_string($koneksi, $_POST["keyword"]);
  $orderBy = $_POST["orderBy"] === 'desc' ? 'DESC' : 'ASC';

  $query = "SELECT * FROM post WHERE nama LIKE '%" . str_replace(' ', '%', $keyword) . "%' ORDER BY nama  " . $orderBy . " LIMIT " . $_POST["start"] . ", " . $_POST["limit"] . "";
  $result = mysqli_query($koneksi, $query);
  while ($row = mysqli_fetch_array($result)) {
    //tampilkan data
    echo '
        <div class="col-md-4 col-sm-6 col-xs-12">
        <div class="featured-item">
            <div class="thumb">
            <div class="card">
            <img src="images/post/' . $row["gambar"] . '" alt="gambar ai">
            </a> 
                <div class="overlay-content"></div>
             </div>
            </div>
                    <div class="down-content">
                    <a href="#" class="fa fa-heart card-action favorite-icon" onclick="showAlert()"></a>
                        <div class="card-heading">
                          ' . $row["nama"] . '
                        </div>
                        <div class="card-text" style="height: 8em; overflow: hidden; text-overflow: ellipsis;">
                            ' . (strlen($row["deskripsi"]) > 160 ? substr($row["deskripsi"], 0, 160) . '...' : $row["deskripsi"]) . '
                        </div>
                        <div class="card-text">
                            <button> #Gratis </button>';
    // Tambahkan logika untuk menampilkan tombol "#Populer" hanya untuk posting dengan kategori "populer"
    if ($row["kategori"] === "Populer") {
      echo '<button> #Populer </button>';
    }
    echo           '
                        </div>
                        <a href="#"  class="card-button" data-toggle="modal" data-target="#detail' . $row['id'] . '" data-pos-id="' . $row['id'] . '"> Lihat Selengkapnya</a> 
                        <div class="modal fade" id="detail' . $row['id'] . '" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                        <div class="modal-dialog modal-sm" role="document" style=" max-width: none; width: 900px margin: 20px">
                            <!-- login --> 
                           <div class="modal-content" style="background: none; border: none;">
                           <div class="modal-body  id="modal-content">
                
            
            <div id="container_bankpartners" >
              
            <div class="bank-card">
                <div class="img-card">
                  <a href="#" >
                    <img src="images/post/' . $row["gambar"] . '">
                  </a>
                </div>
                <div class="detail-card">
                  <div class="title-more-card">
                    <a href="#" aria-label="Visa Platinum">
                      <h4>' . $row["nama"] . '</h4>
                    </a>
                    <a href=' . $row["link_url"] . ' class="situs" target="blank"> Kunjungi Situs</a>
                  </div>
                  <div class="line-card" ></div>
                  <div class="description-card"  >
                    <div class="row-items-card">
                      <div class="item-card">
                        <ul role="list">
                          <li role="listiem" tabindex="0">' . $row["deskripsi"] . '</li>
                          <div class="card-text">
                                <button> #Gratis </button>
                          </div>
                        </ul>
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
                </div>
            </div>

          
        ';
  }
}
