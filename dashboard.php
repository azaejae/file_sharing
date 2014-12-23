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

<body onload="sesiPengajar();">

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
                    <li>
                        <a href="pengajar.php">Pengajar</a>
                    </li>
                    <li>
                        <a href="kelas.php">Kelas</a>
                    </li>
                    <li class="active">
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
            <div class="col-md-10 col-md-offset-1">
                <div class="row">
                    <ul id="myTab" class="nav nav-tabs">
                        <li class="active">
                                <a href="#dashboard" data-toggle="tab">Dashboard</a>
                        </li>
                        <li>
                            <a href="#profile" data-toggle="tab">Profile</a>
                        </li>
                        <li>
                            <a href="#kelas" data-toggle="tab">Kelas</a>
                        </li>
                        <li>
                            <a href="#berkas" data-toggle="tab">Berkas</a>
                        </li>

                    </ul>
                    <div id="myTabContent" class="tab-content">
                        <div class="tab-pane fade in active" id="dashboard">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="panel panel-default">
                                        <div class="panel-heading">
                                            Dashboard pengajar
                                        </div>
                                        <div class="panel-body">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    &nbsp;
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12 text-center text-uppercase">
                                                    <h2>Selamat datang di dashboard pengajar</h2>
                                                    <h3 id="nama_pengajar"></h3>
                                                    <a href="#" id="logout">Logout</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="profile">
                            <!-- FORM -->
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="panel panel-default">
                                        <div class="panel-heading">
                                            Detail Profile
                                        </div>
                                        <div class="panel-body">
                                            <div class="row">
                                                <!-- FOTO -->
                                                <div class="col-md-3 text-center">
                                                    <img id="profilefoto" src="https://statikosi.s3.amazonaws.com/profile.png" height="100" width="100" alt="">
                                                    <a href="#" id="ubahpass" class="btn btn-primary btn-block" style="margin-top:25px">Ubah Password</a>
                                                </div>
                                                <!-- END FOTO -->

                                                <!-- FORM -->
                                                <div class="col-md-9">

                                                    <!-- FORM -->
                                                    <form method="POST" id="ubah_profile" class="form-horizontal" role="form">

                                                        <!-- TEXT INPUT -->
                                                        <div class="form-group">
                                                            <!-- LABEL -->
                                                            <label for="#" class="col-sm-2 control-label">Username</label>
                                                            <!-- END LABEL -->

                                                            <div class="col-sm-10">

                                                                <!-- INPUT -->
                                                                <input type="text" class="form-control" id="username" name="username" readonly placeholder="Username">
                                                                <!-- END INPUT -->
                                                            </div>
                                                        </div>
                                                        <!-- END TEXT INPUT -->

                                                        <!-- TEXT INPUT -->
                                                        <div class="form-group">
                                                            <!-- LABEL -->
                                                            <label for="#" class="col-sm-2 control-label">Nama</label>
                                                            <!-- END LABEL -->

                                                            <div class="col-sm-10">

                                                                <!-- INPUT -->
                                                                <input type="text" class="form-control" required id="nama" name="nama_user" placeholder="Nama Pengguna">
                                                                <!-- END INPUT -->
                                                            </div>
                                                        </div>
                                                        <!-- END TEXT INPUT -->

                                                        <!-- TEXT INPUT -->
                                                        <div class="form-group">
                                                            <!-- LABEL -->
                                                            <label for="#" class="col-sm-2 control-label">Sekolah</label>
                                                            <!-- END LABEL -->

                                                            <div class="col-sm-10">

                                                                <!-- INPUT -->
                                                                <input type="text" class="form-control" id="sekolah" disabled placeholder="Nama Sekolah">
                                                                <!-- END INPUT -->
                                                            </div>
                                                        </div>
                                                        <!-- END TEXT INPUT -->

                                                        <!-- TEXT INPUT -->
                                                        <div class="form-group">
                                                            <!-- LABEL -->
                                                            <label for="#" class="col-sm-2 control-label">E-Mail</label>
                                                            <!-- END LABEL -->

                                                            <div class="col-sm-10">

                                                                <!-- INPUT -->
                                                                <input type="email" class="form-control" required id="email" name="email" placeholder="E-Mail">
                                                                <!-- END INPUT -->
                                                            </div>
                                                        </div>
                                                        <!-- END TEXT INPUT -->

                                                        <!-- TEXT INPUT -->
                                                        <div class="form-group">
                                                            <!-- LABEL -->
                                                            <label for="#" class="col-sm-2 control-label">Alamat</label>
                                                            <!-- END LABEL -->

                                                            <div class="col-sm-10">

                                                                <!-- INPUT -->
                                                                <textarea rows="4" class="form-control" required id="alamat" name="alamat" placeholder="Alamat"></textarea>
                                                                <!-- END INPUT -->
                                                            </div>
                                                        </div>
                                                        <!-- END TEXT INPUT -->
                                                        <div class="col-sm-12 text-center">
                                                            <button class="btn btn-primary col-sm-4 col-sm-offset-4">Simpan Perubahan</button>
                                                        </div>
                                                    </form>
                                                    <!-- END FORM -->
                                                </div>
                                                <!-- END FORM -->
                                            </div>
                                            <!-- Small modal -->


                                            <div class="modal fade bs-example-modal-sm" tabindex="-1" id="mdubahpass" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
                                                <div class="modal-dialog modal-sm">

                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                                            <h4 class="modal-title" id="myModalLabel">Form ubah password</h4>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form role="form" id="ubahpassform" method="post">
                                                                <div class="form-group">
                                                                    <!--<label for="recipient-name" class="control-label">Recipient:</label>-->
                                                                    <input type="password" class="form-control" name="pass_lama" placeholder="Password Lama" required>
                                                                </div>
                                                                <div class="form-group">
                                                                    <input type="password" class="form-control" name="pass_baru" placeholder="Password Baru" required>
                                                                </div>
                                                                <div class="form-group">
                                                                    <input type="submit" class="btn btn-primary btn-block" style="margin-top:25px" value="Ubah Password">
                                                                </div>
                                                            </form>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>

                                            <!-- END Small Modal-->
                                        </div>
                                        <!-- /.panel-body -->
                                    </div>
                                </div>
                            </div>
                            <!-- END FORM -->
                        </div>
                        <div class="tab-pane fade" id="kelas">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="panel panel-default">
                                        <div class="panel-heading">
                                            Daftar kelas <button id="bt_tambah_kelas" class="btn btn-primary">Buat Kelas</button>
                                        </div>
                                        <div class="panel-body">
                                            <div class="table-responsive">
                                                <table class="table table-striped table-bordered table-hover" id="daftar_kelas">
                                                    <thead>
                                                    <tr>
                                                        <th width="22%">Nama kelas</th>
                                                        <th width="5%">Tingkat</th>
                                                        <th width="25%">Tujuan</th>
                                                        <th width="40%">Deskripsi</th>
                                                        <th width="5%">Opsi</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    </tbody>

                                                    <!-- TABLE CONTENT -->
                                                </table>
                                            </div>
                                            <!-- /.table-responsive -->
                                            <!-- form tambah kelas  -->
                                                <div class="modal fade bs-example-modal-md" id="tambah_kelas" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog modal-md">

                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                                                <h4 class="modal-title" id="myModalLabel">Form tambah kelas</h4>
                                                            </div>
                                                            <div class="modal-body">
                                                                <form role="form" id="form_tambah_kelas" method="post">
                                                                    <div class="form-group">
                                                                        <!--<label for="recipient-name" class="control-label">Recipient:</label>-->
                                                                        <input type="text" class="form-control" name="nama_kelas" placeholder="Nama kelas" required>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="tingkat" class="control-label">Tingkat : </label>
                                                                        <select name="tingkat" id="tingkat" class="form-control">
                                                                            <option value="10">10</option>
                                                                            <option value="11">11</option>
                                                                            <option value="12">12</option>
                                                                        </select>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <!--<label for="message-text" class="control-label">Message:</label>-->
                                                                        <textarea class="form-control" name="tujuan_kelas" placeholder="Tujuan kelas" required></textarea>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <!--<label for="message-text" class="control-label">Message:</label>-->
                                                                        <textarea class="form-control" name="deskripsi_kelas" placeholder="Deskripsi kelas" required></textarea>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <input type="submit" class="btn btn-primary text-right" value="Tambah">
                                                                        <input type="reset" class="btn btn-danger text-left" value="Reset">
                                                                    </div>
                                                                </form>
                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>

                                            <!-- END form tambah kelas -->
                                            <!-- form Tambah materi -->
                                            <div class="modal fade bs-example-modal-md" id="tambah_materi" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
                                                <div class="modal-dialog modal-md">

                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                                            <h4 class="modal-title" id="myModalLabel">Form tambah materi</h4>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form role="form" id="form_upload_materi" enctype="multipart/form-data" method="post">
                                                                <div class="form-group">
                                                                    <label for="berkas_materi">Berkas materi</label>
                                                                    <input class="form-control" type="file" id="berkas_materi" name="berkas">
                                                                </div>
                                                            </form>
                                                            <img class="waiter" src="css/images/waiter.gif" />
                                                            <form role="form" id="form_detail_materi" style=" display: none ;">
                                                                <div class="form-group">
                                                                    <input type="text" class="form-control" name="judul_materi" required placeholder="Judul materi">
                                                                </div>
                                                                <div class="form-group">
                                                                    <input type="text" class="form-control" name="author" placeholder="Author">
                                                                </div>
                                                                <div class="form-group">
                                                                    <textarea class="form-control" name="tujuan_materi" required placeholder="Tujuan materi" ></textarea>
                                                                </div>
                                                                <div class="form-group">
                                                                    <textarea class="form-control" name="deskripsi_materi" required placeholder="Deskripsi materi"></textarea>
                                                                </div>
                                                                <div class="form-group">
                                                                    <input type="hidden" name="id_materi" id="id_materi">
                                                                    <input type="hidden" name="id_kelas" id="id_kelas">
                                                                    <input type="submit" class="btn btn-primary btn-lg" value="Simpan">
                                                                </div>
                                                            </form>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                            <!-- END form tambah materi -->
                                        </div>
                                        <!-- /.panel-body -->
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="berkas">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="panel panel-default">
                                        <div class="panel-heading">
                                            Daftar berkas
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <div class="row">

                </div>
            </div>
        </div>
    </div>
    <!-- /.container -->

    <!-- jQuery -->
    <script src="js/jquery-1.10.2.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>
    <script src="js/sesi.js"></script>
    <script src="js/plugins/dataTables/jquery.dataTables.js"></script>
    <script src="http://crypto-js.googlecode.com/svn/tags/3.1.2/build/rollups/md5.js"></script>
    <script src='http://crypto-js.googlecode.com/svn/tags/3.1.2/build/components/lib-typedarrays-min.js'></script>

        <script>
            var host='http://api.osindonesia.org/';
            $(document).ready(function(){
                if(sessionStorage.getItem('token')==null)
                {
                    $(location).attr('href','login.php');
                }
                alert(sessionStorage.token);
                $('#logout').click(function(){
                    alert('Anda Berhasil Logout');
                    sessionStorage.clear();
                    $(location).attr('href','login.php');
                });

                //detail pengguna
                $.getJSON(host+"user.php?detail="+sessionStorage.getItem('token'),function(result){
                    $.each(result.data, function(i, sk){
                        // alert(sk.nama_user+" "+sk.email+" "+sk.alamat+" "+sk.username+" "+sk.foto+" "+sk.nama_sekolah);

                        $("#profilefoto").attr("src",sk.foto);
                        $('#username').val(sk.username);
                        $('#nama').val(sk.nama_user);
                        $('#sekolah').val(sk.nama_sekolah);
                        $('#email').val(sk.email);
                        $('#alamat').val(sk.alamat);
                        $('#nama_pengajar').append(sk.nama_user);

                    })
                });
                //simpan perubahan profile
                $('#ubah_profile').submit(function(){
                    alert(host+'user.php?menu=ubah');
                    $.ajax({
                        url : host+'user.php?menu=ubah',
                        type: "POST",
                        data : $('form#ubah_profile').serialize(),
                        dataType: "JSON",
                        success: function(respon)
                        {
                            if(respon.hasil==='berhasil')
                            {
                                //pesan berhasil
                                alert(respon.pesan);
                                location.reload();

                            }
                            else
                            {
                                alert(respon.pesan);
                            }
                        }
                    });
                    return false;
                });

                //ubah password
                $('#ubahpass').click(function(){
                    $('#mdubahpass').modal('show');
                });

                $('#ubahpassform').submit(function(){
                    alert(host+sessionStorage.getItem('token'));
                    $.ajax({
                        url : host+'user.php?menu=ubahpass&access_key='+sessionStorage.getItem('token'),
                        type: "POST",
                        data : $('form#ubahpassform').serialize(),
                        dataType: "JSON",
                        success: function(respon)
                        {
                            if(respon.hasil==='berhasil')
                            {
                                //pesan berhasil
                                alert(respon.pesan);
                                location.reload();

                            }
                            else
                            {
                                alert(respon.pesan);
                            }
                        }
                    });
                    return false;

                });

                //daftar kelas
                //get kelas
                $.getJSON(host+"kelas.php?menu=pengajar_kelas&access_key="+sessionStorage.token,function(result){
                    $.each(result.data, function(i, sk){
                        //alert(sk.nama_sekolah);
                        $("#daftar_kelas tbody").append("<tr>" +
                        "<td>"+sk.nama_kelas+"</td>"+
                        "<td>"+sk.tingkat+"</td>"+
                        "<td>"+sk.tujuan_kelas+"</td>"+
                        "<td>"+sk.deskripsi_kelas+"</td>"+
                        "<td>" +
                        "<a href='#' title='Tambah materi' onclick='tambahMateri(\""+sk.id_kelas+"\");'><span class='glyphicon glyphicon-plus-sign'></span></a>"+
                        "</td>"+
                        "</tr>");
                    })
                }).done(function(){
                    $('#daftar_kelas').dataTable();
                });
                //show form tambah kelas
                $('#bt_tambah_kelas').click(function(){
                    $('#tambah_kelas').modal('show');
                });

                //submit form tambah kelas
                $('#form_tambah_kelas').submit(function(){
                    $.ajax({
                        url : host+'kelas.php?menu=tambah&access_key='+sessionStorage.token,
                        type: "POST",
                        data : $('form#form_tambah_kelas').serialize(),
                        dataType: "JSON",
                        success: function(respon)
                        {
                            if(respon.hasil==='berhasil')
                            {
                                //pesan berhasil
                                alert(respon.pesan);
                                location.reload();

                            }
                            else
                            {
                                alert(respon.pesan);
                            }
                        }
                    });
                    return false;
                });

            //submit form detail materi
                $('#form_detail_materi').submit(function(){
                    $.ajax({
                        url : 'http://api.local/materi.php?menu=tambah&access_key='+sessionStorage.getItem('token'),
                        type: "POST",
                        data : $('form#form_detail_materi').serialize(),
                        dataType: "JSON",
                        success: function(respon)
                        {
                            if(respon.hasil==='berhasil')
                            {
                                //pesan berhasil
                                alert(respon.pesan);
                                location.reload();

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

            //fungsi tambah materi
            function tambahMateri(idkelas)
            {
                $('#tambah_materi').modal('show');

                //check hash berkas
                $('#berkas_materi').change(function(e){
                    $('.waiter').show();
                    var oFile = document.getElementById('berkas_materi').files[0];
                    var sha1 = CryptoJS.algo.MD5.create();
                    var read = 0;
                    var unit = 64 * 16 * 1024 ;
                    var blob;
                    var reader = new FileReader();
                    reader.readAsArrayBuffer(oFile.slice(read, read + unit));
                    reader.onload = function(e) {
                        var bytes = CryptoJS.lib.WordArray.create(e.target.result);
                        sha1.update(bytes);
                        read += unit;
                        if (read < oFile.size) {
                            blob = oFile.slice(read, read + unit);
                            reader.readAsArrayBuffer(blob);
                        } else {
                            var hash = sha1.finalize();
                            var final = hash.toString(CryptoJS.enc.Hex);
                            //check hash di server
                            $.getJSON(host+"berkas.php",{
                                menu : 'check',
                                hash : final
                            }).done(function(result){
                                if(result.pesan==final)
                                {
                                    $('.waiter').hide();
                                    $('#id_materi').val(result.pesan);
                                    $('#id_kelas').val(idkelas);
                                    $('#form_upload_materi').hide();
                                    $('#form_detail_materi').show();
                                }
                                else
                                {
                                    //upload berkas
                                    var formData = new FormData($('#form_upload_materi')[0]);
                                    $.ajax({
                                        url: 'http://api.local/berkas.php?menu=unggah',
                                        type: 'POST',
                                        data: formData,
                                        dataType: "JSON",
                                        async: false,
                                        cache: false,
                                        contentType: false,
                                        processData: false,
                                        success: function (result) {
                                            if(result.hash==final)
                                            {
                                                $('.waiter').hide();
                                                $('#id_materi').val(result.hash);
                                                $('#id_kelas').val(idkelas);
                                                $('#form_upload_materi').hide();
                                                $('#form_detail_materi').show();
                                            }
                                            else
                                            {
                                                $('.waiter').hide();
                                                alert(result.pesan);
                                            }
                                        }

                                    });

                                }
                            });
                        }

                    }
                    return false;
                });

            }
        </script>

</body>

</html>
