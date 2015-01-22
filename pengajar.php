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
                    <li>
                        <a href="sekolah.php">Sekolah</a>
                    </li>
                    <li class="active">
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
                    <li>
                        <a href="sekolah.php">Sekolah</a>
                    </li>
                    <li class="active">
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
            <div class="col-sm-12">
                <!-- TABLE -->
                <!-- /.row -->
                <div class="panel panel-default">

                    <!-- TITLE TABLE -->
                    <div class="panel-heading">
                        Daftar pengajar
                    </div>
                    <!-- /.panel-heading -->
                    <div class="panel-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered table-hover" id="pengajar">
                                <thead>
                                    <tr>
                                        <th>Nama pengajar</th>
                                        <th>Nama Sekolah</th>
                                        <th>Opsi</th>
                                    </tr>
                                </thead>

                                <!-- TABLE CONTENT -->
                                <tbody>

                                </tbody>
                                <!-- TABLE CONTENT -->
                            </table>
                        </div>
                        <!-- /.table-responsive -->
                    </div>
                    <!-- /.panel-body -->
                </div>
                <!-- /.panel -->

                <!-- END TABLE -->
            </div>
        </div>

        <hr>

    </div>
    <!-- /.container -->

    <!-- jQuery -->
    <script src="js/jquery-1.10.2.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>
    <script src="js/plugins/dataTables/jquery.dataTables.js"></script>
    <script src="js/uri.min.js"></script>
    <script src="js/sesi.js"></script>
    <script>
        var host='http://api.osindonesia.org/'
        $(document).ready(function(){

            //URI get
            r=new URI(window.location.href);
            //alert(window.location.href);
            var q= r.query();
            if(r.hasQuery('npsn',true))
            {
                var hasil= URI.parseQuery(q);
                //alert(hasil.idpengajar);
                pk='&menu=pengajarsekolah&npsn='+hasil.npsn;
            }
            else
            {
                var pk='';
            }

            var akses='api_key=kadHaSKhkadk&secret=4c2d7c5baf2ca604466a59d126d103ff';


            $.getJSON(host+"pengajar.php?"+akses+pk,function(result){
                $.each(result.data, function(i, sk){
                    $('#pengajar tbody').append(
                        "<tr>"+
                        "<td>"+sk.nama_pengajar+"</td>"+
                        "<td>"+sk.nama_sekolah+"</td>"+
                        "<td><a href=kelas.php?pengajar="+sk.id_pengajar+">Lihat kelas</a></td>"+
                        "</tr>"
                    );
                })
            }).done(function(){
                $('#pengajar').dataTable();
            });
        });
    </script>

</body>

</html>
