<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Open School Indonesia</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="font-awesome/css/font-awesome.min.css">

    <!-- Custom CSS -->
    <link href="css/style.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body onload="cekSesi();">

    <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#">Open School Indonesia</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li>
                        <a href="sekolah.php">Sekolah</a>
                    </li>
                    <li>
                        <a href="pengajar.php">Pengajar</a>
                    </li>
                    <li>
                        <a href="kelas.php">Kelas</a>
                    </li>
                    <li>
                        <a href="mendaftar.php">Mendaftar</a>
                    </li>
                    <li class="active"><a href="login.php">Login</a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>

    <!-- Page Content -->
    <div class="container content">
        <div class="row">
            <div class="col-md-4 col-md-offset-4 text-center">
                <div id="login">
                    <h3 class="form-group"><b>Login pengajar</b></h3>
                    <img class="waiter" src="css/images/waiter.gif" />
                    <hr>
                    <br>
                    <div class="row">
                        <form class="form-group" id="form_login">
                            <div class="form-group">
                                <input type="text" class="form-control" name="username" required placeholder="Username">
                            </div>
                            <div class="form-group">
                                <input type="password" class="form-control" name="password" required placeholder="Password">
                            </div>
                            <div class="form-group text-right">
                                <input type="submit" class="btn btn-primary col-md-5 text-right col-md-offset-7" value="Login">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /.container -->

    <!-- jQuery -->
    <script src="js/jquery-1.10.2.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>
    <script>
        function cekSesi()
        {
            if(sessionStorage.getItem('token')!==null)
            {
                $(location).attr('href','dashboard.php');
            }
        }
        $(document).ready(function(){
            var host='http://api.osindonesia.org/pengajar.php?menu=login'
            $('#form_login').submit(function(){
                //alert(host);
                $('.waiter').show();
                $.ajax({
                    url : host,
                    type: "POST",
                    data : $('form#form_login').serialize(),
                    dataType: "JSON",
                    success: function(respon)
                    {
                        if(respon.hasil==='berhasil')
                        {
                            //alert(respon.access_key);
                            sessionStorage.token=respon.access_key;
                            //alert(sessionStorage.access_key);
                            $(location).attr('href','dashboard.php');

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
