<?php
include('databases/koneksi.php');
$query = mysqli_query($koneksi, "SELECT * FROM post");


?>

<!DOCTYPE html>
<html lang="en">

<head>
  <!-- basic -->
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- mobile metas -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="viewport" content="initial-scale=1, maximum-scale=1">
  <!-- site metas -->
  <title>ABAI | Penyedia website AI gratis</title>
  <meta name="keywords" content="">
  <meta name="description" content="">
  <meta name="author" content="">
  <!-- bootstrap css -->
  <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
  <!-- style css -->
  <link rel="stylesheet" type="text/css" href="css/style.css">
  <!-- Responsive-->
  <link rel="stylesheet" href="css/responsive.css">
  <!-- fevicon -->
  <link rel="icon" href="images/Trans.png">
  <!-- Scrollbar Custom CSS -->
  <link rel="stylesheet" href="css/jquery.mCustomScrollbar.min.css">
  <!-- Tweaks for older IEs-->
  <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">

  <!-- fonts -->
  <link href="https://fonts.googleapis.com/css?family=Poppins:400,700&display=swap" rel="stylesheet">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=DM+Sans:ital,wght@0,500;0,700;1,700&family=Lato:wght@300;400&family=Poppins:ital,wght@0,400;0,500;0,700;0,900;1,100&family=Volkhov:ital@1&display=swap" rel="stylesheet">
  <!-- font awesome -->
  <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <!--  -->
  <!-- owl stylesheets -->
  <link href="https://fonts.googleapis.com/css?family=Great+Vibes|Poppins:400,700&display=swap&subset=latin-ext" rel="stylesheet">
  <link rel="stylesheet" href="css/owl.carousel.min.css">
  <link rel="stylesoeet" href="css/owl.theme.default.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css" media="screen">

</head>

<body>

  <!-- header -->
  <?php include 'template/header.php'; ?>
  <!-- End Header -->

  <section class="featured-places" id="blog">
    <div class="container">
      <div class="row" id="load_data">
        <!-- data dari load_data-home.php akan ditampilkan disini -->
      </div>
    </div>
  </section>

  <div class="loader"></div>
  <div id="load_data_message"></div>
  <!-- footer section start -->
  <?php include 'template/footer.php'; ?>
  <!-- copyright section end -->
  <!-- Javascript files-->
  <script src="js/jquery.min.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.bundle.min.js"></script>
  <script src="js/jquery-3.0.0.min.js"></script>
  <script src="js/plugin.js"></script>
  <!-- sidebar -->
  <script src="js/jquery.mCustomScrollbar.concat.min.js"></script>
  <script src="js/custom.js"></script>
  <script type="text/javascript">
    $(document).ready(function() {
      var limit = 6;
      var start = 0;
      var action = 'inactive';
      var keyword = '';
      var orderBy = 'asc';

      function load_country_data(limit, start, keyword = '', orderBy = 'asc') {
        $('.loader').show();
        $.ajax({
          url: "load-data/load_data.php",
          method: "POST",
          data: {
            limit: limit,
            start: start,
            keyword: keyword,
            orderBy: orderBy
          },
          cache: false,
          beforeSend: function() {},
          success: function(data) {
            if (data == '') {
              $('.loader').hide();
              action = 'active';
            } else {
              $('#load_data').append(data);
              action = 'inactive';
            }
          }
        });
      }

      $(window).scroll(function() {
        if ($(window).scrollTop() + $(window).height() > $("#load_data").height() && action == 'inactive') {
          action = 'active';
          start = start + limit;
          setTimeout(function() {
            load_country_data(limit, start, keyword, orderBy);
          }, 1000);
        }
      });

      // Function to handle "Sort By" button click
      $(".sort_by_btn").on("click", function(e) {
        e.preventDefault();
        orderBy = orderBy === 'asc' ? 'desc' : 'asc';
        updateSortButtonText(orderBy); // Update the button text
        $("#load_data").empty();
        start = 0;
        action = 'inactive';
        load_country_data(limit, start, keyword, orderBy);
      });

      // Function to update the "Sort By" button text
      function updateSortButtonText(orderBy) {
        var sortText = orderBy === 'asc' ? 'Ascending' : 'Descending';
        $("#sort_order_text").text(sortText);
      }

      load_country_data(limit, start, keyword, orderBy);

      $('#form1').submit(function(e) {
        e.preventDefault();
        $('#load_data').empty();
        start = 0;
        action = 'inactive';
        keyword = $('#keyword').val();
        load_country_data(limit, start, keyword);
      });
    });


    function openNav() {
      document.getElementById("mySidenav").style.width = "250px";
    }

    function closeNav() {
      document.getElementById("mySidenav").style.width = "0";
    }


    $('#register').on('show.bs.modal', function() {
      $('#myModal').modal('hide');
    });
    $('#myModal').on('show.bs.modal', function() {
      $('#register').modal('hide');
    });


    // $(document).ready(function() {
    //   $('#keyword').on('keyup', function cari() {
    //     $('#blog').load('function/admin_fungsi.php?keyword=' + $('#keyword').val());
    //   });

    // });

    $(document).ready(function() {
      $('#').click(function(e) {
        e.preventDefault();
        var query = $('#keyword').val();
        $.ajax({
          url: 'function/admin_fungsi.php',
          type: 'POST',
          data: {
            query: query
          },
          success: function(response) {
            // Handle the response from the server
            var results = JSON.parse(response);
            var html = '';
            for (var i = 0; i < results.length; i++) {
              html += '<div>' + results[i].title + '</div>';
            }
            $('#searchResults').html(html);
          }
        });
      });
    });
  </script>
  <!-- menampilkan alert login -->
  <?php
  $show_login = $_GET['show_login'] ?? false;
  ?>
  <?php if ($show_login == 'true') { ?>
    <script>
      $(document).ready(function() {
        $('#myModal').modal('show');
      });
    </script>
  <?php } ?>

  <!-- menampilkan alert favorit -->
  <script>
    function showAlert() {
      alert('Silahkan login terlebih dahulu');
    }
  </script>


</body>

</html>