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

    <!-- Custom CSS -->
    <link href="css/style.css" rel="stylesheet">
    <style>
        ul {
            padding:0 0 0 0;
            margin:0 0 0 0;
        }
        ul li {
            list-style:none;
            margin-bottom:0px;
        }
        ul li img {
            cursor: pointer;
        }
    </style>
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body onload="showMenu();">

<!-- Navigation -->
<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation" id="before_login" style="display: none">
    <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="index.php">Open School Indonesia</a>
        </div>
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav navbar-right">
                <li class="active">
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
                <li><a href="login.php">Login</a>
                </li>
            </ul>
        </div>
        <!-- /.navbar-collapse -->
    </div>
    <!-- /.container -->
</nav>

<!-- nav after login -->
<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation" id="after_login" style="display: none">
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
                <li class="active">
                    <a href="sekolah.php">Sekolah</a>
                </li>
                <li>
                    <a href="pengajar.php">Pengajar</a>
                </li>
                <li>
                    <a href="kelas.php">Kelas</a>
                </li>
                <li>
                    <a href="dashboard.php">Dashboard</a>
                </li>
                <li><a href="#" onclick="logout();">Logout</a>
                </li>
            </ul>
        </div>
        <!-- /.navbar-collapse -->
    </div>
    <!-- /.container -->
</nav>

<!--End Nav after login-->


<!-- Page Content -->
    <div class="container content">

        <div class="row">
                <ul class="row text-center" id="daftar_sekolah">

                </ul>
        </div>

        <hr>

    </div>
    <!-- /.container -->

    <!-- jQuery -->
    <script src="js/jquery-1.10.2.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>
    <script src="js/sesi.js"></script>

    <!-- Script to Activate the Carousel -->
    <script>
        $(document).ready(function(){
            //get info sekolah
            $.getJSON("http://api.osindonesia.org/sekolah.php",function(result){
                $.each(result.data, function(i, sk){
                    $("#daftar_sekolah").append("<li class=\"col-lg-3 col-md-3 col-sm-3 col-xs-3\"><a href='pengajar.php?npsn="+sk.npsn+"'><img width=\"150\" height=\"150\" src=\""+sk.logo+"\"></a><p>"+sk.nama_sekolah+"</p></li>");
                });
            });
        });
    </script>

</body>

</html>
