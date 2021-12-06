<!DOCTYPE html>
<html lang="en">


<!-- auth-login.html  21 Nov 2019 03:49:32 GMT -->
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>RNW</title>
  <!-- General CSS Files -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>dist/assets/css/app.min.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>dist/assets/bundles/bootstrap-social/bootstrap-social.css">
  <!-- Template CSS -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>dist/assets/css/style.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>dist/assets/css/components.css">
  <!-- Custom style CSS -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>dist/assets/css/custom.css">
  <link rel='shortcut icon' type='image/x-icon' href='<?php echo base_url(); ?>assets/images/main_header_logo.png' />
</head>

<body>
  <div class="loader"></div>
  <div id="app">
    <section class="section">
      <div class="container mt-5">
        <div class="row">
          <div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">
            <div class="card card-danger">
              <div class="card-header">
                <h4>Login</h4>
                <div class="card-header-action">
                 <img src="<?php echo base_url(); ?>assets/images/main_header_logo.png" class="user-img mr-2" alt="" width="60">
                </div>
              </div>
              <div class="card-body">
                <form method="POST" action="#" class="needs-validation" novalidate="" action="<?php echo base_url(); ?>welcome/login">
                  <div class="form-group">
                    <label for="email">Email</label>
                    <input id="email" type="email" class="form-control" name="email" tabindex="1" required autofocus>
                    <div class="invalid-feedback">
                      Please fill in your email
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="d-block">
                      <label for="password" class="control-label">Password</label>
                    </div>
                    <input id="password" type="password" class="form-control" name="password" tabindex="2" required>
                    <div class="invalid-feedback">
                      please fill in your password
                    </div>
                  </div>
                  <div class="form-row">
                      <div class="form-group col-md-6">
                        <input type="text" class="form-control" id="title" value="" placeholder="" style="background-color: #fc544b; color: white;font-size: 22px;font-weight: bold;letter-spacing: 4px;" readonly>
                      </div>
                      <div class="form-group col-md-6">
                        <input type="text" class="form-control" id="inputPassword4" placeholder="ENTER CAPTCHA">
                      </div>
                    </div>
                 
                  <div class="form-group">
                    <button type="submit" name="submit" class="btn btn-danger btn-lg btn-block" tabindex="4">
                      Login
                    </button>
                  </div>
                </form>
             
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
  <!-- General JS Scripts -->
  <script src="<?php echo base_url(); ?>dist/assets/js/app.min.js"></script>
  <!-- JS Libraies -->
  <!-- Page Specific JS File -->
  <!-- Template JS File -->
  <script src="<?php echo base_url(); ?>dist/assets/js/scripts.js"></script>
  <!-- Custom JS File -->
  <script src="<?php echo base_url(); ?>dist/assets/js/custom.js"></script>

   <script type="text/javascript">
   $( document ).ready(function() {
    $.getJSON("https://jsonip.com?callback=?", function(data) {
     //  alert("Your IP address is :- " + data.ip);
        $("#my_ip").val(data.ip);
      });
});
   
  </script>

  <script>
    var words = [
    '',
    'AB0EG',
    'DC50H',
    'QZXN4',
    'FBO9U',
    'D87UN',
    'VBHYL',
    'SXRTR',
    'TB4HG',
    '987UT',
    'TTYCJ',
    'VV80B',
    'GBNQL',
    'QAGVY',
    'ABVAC',
    'IQUYO',
    '09QAR',
    'VC5TY',
    'GF3PV',
    'KKLP0',
    'IPLQ5',
    'RVGYH',
    '07WQR',
    'KK12V',
    'YQASK',
    'GFRWF',
    'VGARD',
    'KHTSE',
    'HRDFG',
    'HR56E',
    'GF01B',
    'PP8WT',
    'RR67H',
    'FQWRK',
    'STYLF',
    'DELL1',
    'LEN7F',
    'FFT5X',
    'GHQAS',
    'MNJPJ',
    'AA01J',
    'AYU5T',
    'AYU!F',
    'A!Y@$',
    'AYVRC',
    'ABC#H',
    '#@!AD',
    'A&B6K',
    'HIT@O',
    'PATHO',
    'MOMMY',
    'MOMMA',
    'BHOIY',
    'BHIKH',
    'HASOS',
    'NAG@G',
    'DDPKO',
    'KA@LI',
    'KALIY',
    'FATLO',
    'MBNYO',
    'BHAVL',
    '4TUJG',
    'BHAGT',
    'KEDIT'
    ];

    var data = words[Math.floor(Math.random() * words.length)];

    $('#title').val(data);
  </script>
</body>


<!-- auth-login.html  21 Nov 2019 03:49:32 GMT -->
</html>