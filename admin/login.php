<!DOCTYPE html>
<html>

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <title>Login</title>

  <!-- Core CSS - Include with every page -->
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <link href="font-awesome/css/font-awesome.css" rel="stylesheet">

  <!-- SB Admin CSS - Include with every page -->
  <link href="css/sb-admin.css" rel="stylesheet">

</head>

<body>

  <div class="container">
    <div class="row">
      <div class="col-md-4 col-md-offset-4">
        <div class="login-panel panel panel-default">
          <div class="panel-heading text-center">

            <!-- TITLE SIGN IN -->
            <h3 class="panel-title">Welcome</h3>
          </div>
          <div class="panel-body">
            <form role="form" id="login" method="POST" action="index.php">

              <!-- FORM -->
              <fieldset>
                <div class="form-group">
                  <input class="form-control" placeholder="Username" name="username" required type="text" autofocus>
                </div>
                <div class="form-group">
                  <input class="form-control" placeholder="Password" name="password" required type="password">
                </div>
                  <input type="submit" id="kirim" value="Login" class="btn btn-lg btn-success col-md-5">   <input type="submit" value="Reset" class="btn btn-lg btn-danger col-md-5 col-md-offset-2">
                <!-- Change this to a button or input when using this as a form -->
                <!--<a href="index.html" class="btn btn-lg btn-success col-md-5">Login</a> <a href="#" class="btn btn-lg btn-danger col-md-5 col-md-offset-2">Reset</a>-->
              </fieldset>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Core Scripts - Include with every page -->
  <script src="js/jquery-1.10.2.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/plugins/metisMenu/jquery.metisMenu.js"></script>
  <!-- SB Admin Scripts - Include with every page -->
  <script src="js/sb-admin.js"></script>
  <script>
      $(document).ready(function(){
          if(sessionStorage.getItem('access_key')!==null)
          {
              $(location).attr('href','snippet.html');
          }
          var host='http://api.local/user.php'
            $('#login').submit(function(){
                alert(host);
                $.ajax({
                        url : host,
                        type: "POST",
                        data : $('form#login').serialize(),
                        dataType: "JSON",
                        success: function(respon)
                        {
                            if(respon.hasil==='berhasil')
                            {
                                //alert(respon.access_key);
                                sessionStorage.access_key=respon.access_key;
                                //alert(sessionStorage.access_key);
                                $(location).attr('href','snippet.html');

                            }
                            else
                            {
                                alert(respon.pesan);
                            }
                        }
                    });
                return false;
            });
      });
  </script>
</body>

</html>
