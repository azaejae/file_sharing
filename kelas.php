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
                <li class="active">
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
                <li>
                    <a href="pengajar.php">Pengajar</a>
                </li>
                <li class="active">
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
                        Daftar kelas
                    </div>
                    <!-- /.panel-heading -->
                    <div class="panel-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered table-hover" id="kelas">
                                <thead>
                                <tr>
                                    <th>Pengajar</th>
                                    <th>Nama kelas</th>
                                    <th>Asal sekolah</th>
                                    <th>Tingkat</th>
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
        <!-- detail kelas  -->
        <div class="modal fade bs-example-modal-lg" id="detail_kelas" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">

                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                        <h4 class="modal-title" id="myModalLabel">Detail kelas</h4>
                    </div>
                    <div class="modal-body">
                        <p id="pengajar"></p><br>
                        <table class="table table-responsive">
                            <tr>
                                <td>Tujuan</td>
                                <td id="tujuan"></td>
                            </tr>
                            <tr>
                                <td>Deskripsi</td>
                                <td id="deskripsi"></td>
                            </tr>
                        </table>
                        <p>Daftar materi</p>
                        <div id="daftar_materi">

                        </div>
                    </div>

                </div>
            </div>
        </div>

        <!-- END detail kelas kelas -->
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
            if(r.hasQuery('pengajar',true))
            {
                var hasil= URI.parseQuery(q);
                //alert(hasil.idpengajar);
                pk='&menu=pengajar_kelas&pengajar='+hasil.pengajar;
            }
            else
            {
                var pk='';
            }

            var akses='api_key=kadHaSKhkadk&secret=4c2d7c5baf2ca604466a59d126d103ff';

           //alert('jalan');
            //get semua data sekolah
            $.getJSON(host+"kelas.php?"+akses+pk,function(result){
                $.each(result.data, function(i, sk){
                    //alert(sk.nama_sekolah);
                    $("#kelas tbody").append("<tr>" +
                    "<td>"+sk.nama_pengajar+"</td>"+
                    "<td>"+sk.nama_kelas+"</td>"+
                    "<td>"+sk.nama_sekolah+"</td>"+
                    "<td>"+sk.tingkat+"</td>"+
                    "<td>" +
                    "<a href='#' title='Detail Kelas' onclick='detailKelas(\""+sk.id_kelas+"\");'>Detail</a><img class='waiter' src='css/images/waiter.gif' />"+
                    "</td>"+
                    "</tr>");
                })
            }).done(function(){
                $('#kelas').dataTable();
            });

            //detial kelas

        });
        function detailKelas(id_kelas)
        {
            $('.waiter').show();
            $.getJSON(host+"kelas.php?menu=detail&id_kelas="+id_kelas,function(result){
                $('#pengajar').empty();
                $('#pengajar').append("Pengajar : "+result.data[0].nama_user);
                $('#tujuan').empty();
                $('#tujuan').append(result.data[0].tujuan_kelas);
                $('#deskripsi').empty();
                $('#deskripsi').append(result.data[0].deskripsi_kelas);
            }).done(function(){
                $.getJSON(host+"kelas.php?menu=materi&id_kelas="+id_kelas,function(result){
                    if(result.data.length==0)
                    {
                        $('#daftar_materi').empty();
                        $('#daftar_materi').append("<p>Tidak ada materi di kelas ini</p>");
                    }
                    else
                    {
                        $('#daftar_materi').empty();
                        $('#daftar_materi').append("<table class='table table-responsive table-bordered' id='t_materi'>" +
                        "<thead>" +
                        "<tr>" +
                        "<td>Judul materi</td>" +
                        "<td>Tujuan</td>" +
                        "<td>Deskripsi</td>" +
                        "<td>Author</td>" +
                        "<td>Opsi</td>" +
                        "</tr>" +
                        "</thead>" +
                        "<tbody></tbody>");
                        $.each(result.data,function(i,sk){
                            $('#t_materi tbody').append(
                                "<tr>" +
                                "<td>"+sk.judul_materi+"</td>" +
                                "<td>"+sk.tujuan_materi+"</td>" +
                                "<td>"+sk.deskripsi_materi+"</td>" +
                                "<td>"+sk.author+"</td>" +
                                "<td><a href="+sk.href+" target='_blank'>Unduh</a></td>" +
                                "</tr>"
                            );
                        $('#daftar_materi').append("<table>");
                        });
                    }

                });
               $('#detail_kelas').modal('show');
               $('.waiter').hide();
            });
        }
    </script>


</body>

</html>
