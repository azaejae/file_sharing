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
    <link rel="stylesheet" href="css/jquery-ui.min.css">
    <link rel="stylesheet" href="css/jquery-ui.theme.min.css">

    <!-- Custom CSS -->
    <link href="css/style.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

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
                    <li class="active">
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

    <!-- Page Content -->
    <div class="container content">
        <div class="row">
            <div class="col-md-6 col-sm-offset-3">
                <h1 class="text-center">Pendaftaran pengajar</h1>
            </div>
        </div>
        <div class="row">
            <form method="post" id="pendaftaran_pengajar" enctype="multipart/form-data">
                <div class="col-sm-6 col-sm-offset-3">
                    <div class="form-group">
                        <input type="text" name="username" class="form-control" required placeholder="Username">
                    </div>
                    <div class="form-group">
                        <input type="password" name="password" class="form-control" required placeholder="Password">
                    </div>
                    <div class="form-group">
                        <input type="text" name="nama_lengkap" class="form-control" required placeholder="Nama Lengkap">
                    </div>
                    <div class="form-group">
                        <input type="text" name="nama_sekolah" id="nama_sekolah" required class="form-control" placeholder="Nama Sekolah">
                    </div>
                    <div class="form-group">
                        <input type="email" name="email" id="" class="form-control" required placeholder="E-Mail">
                    </div>
                    <div class="form-group">
                        <textarea name="alamat" id="" placeholder="Alamat" cols="30" rows="5" required class="form-control"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="foto">Foto</label>
                        <input type="file" name="foto" required id="foto" class="form-control">
                        <input type="hidden" id="npsn" name="npsn">
                    </div>

                </div>
                <div class="col-sm-6 col-sm-offset-3 form-margin">
                    <div class="col-sm-6">
                        <input type="submit" value="Daftar" class="btn btn-primary btn-block">

                    </div>
                    <div class="col-sm-6">
                        <input type="reset" class="btn btn-danger btn-block">
                    </div>
                </div>

            </form>

        </div>

    </div>
    <!-- /.container -->

    <!-- jQuery -->
    <script src="js/jquery-1.10.2.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery-ui.min.js"></script>
    <script>
        function cekSesi()
        {
            if(sessionStorage.getItem('token')!==null)
            {
                $(location).attr('href','dashboard.php');
            }
        }
        var host="http://api.osindonesia.org/pengajar.php";
        $(document).ready(function(){
            $('#pendaftaran_pengajar').submit(function(){
                var formData = new FormData($(this)[0]);
                $.ajax({
                    url : host+"?menu=tambah",
                    type: "POST",
                    //mimeType : "multipart/form-data",
                    data : formData,
                    async: false,
                    dataType: "JSON",
                    success: function(respon)
                    {
                        if(respon.hasil==='berhasil')
                        {
                            alert(respon.pesan);
                        }
                        else
                        {
                            alert(respon.pesan);

                        }
                    },
                    cache: false,
                    contentType: false,
                    processData: false
                }).done(function(){
                    $(location).attr('href','sekolah.php');
                });
                return false;
            });

            //auto complete sekolah
            $("#nama_sekolah").autocomplete({
                source: function( request, response ) {
                    $.ajax({
                        url: "http://api.osindonesia.org/sekolah.php?menu=label",
                        dataType: "json",
                        data: {term: request.term},
                        success: function(data) {
                            response($.map(data, function(item) {
                                return {
                                    label: item.label,
                                    id: item.npsn
                                };
                            }));
                        }
                    });
                },
                minLength: 2,
                select: function(event, ui) {
                    $('#npsn').val(ui.item.id);
                    //$('#abbrev').val(ui.item.abbrev);
                }
            });
        });
    </script>

</body>

</html>
