</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <a><b>Futsal</b> 212</a>
  </div>

  <div class="login-box-body">
    <p class="login-box-msg">Silahkan isi form dibawah</p>

    <?php echo form_open("log/cek_login"); ?>
      <div class="form-group has-feedback">
        <input type="text" name="username" class="form-control" placeholder="Username" required="required" />
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="password" name="password" class="form-control" placeholder="Password" required="required" />
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div class="row">
        <div class="col-xs-8">
        </div>
        <div class="col-xs-4">
          <button type="submit" class="btn btn-primary btn-block btn-flat">Masuk</button>
        </div>
      </div>
    <?php echo form_close(); ?>

  </div>
</div>

</body>
</html>