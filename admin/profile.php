<!DOCTYPE html>
<html>

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <title id="judul">Index</title>

  <!-- Core CSS - Include with every page -->
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <link href="font-awesome/css/font-awesome.css" rel="stylesheet">

  <!-- Page-Level Plugin CSS - Blank -->

  <!-- SB Admin CSS - Include with every page -->
  <link href="css/sb-admin.css" rel="stylesheet">

</head>

<body>

  <div id="wrapper">

    <nav class="navbar navbar-default navbar-fixed-top" role="navigation" style="margin-bottom: 0">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <!-- Title Apps -->
        <a class="navbar-brand" href="index.html">Title Apps</a>
      </div>
      <!-- /.navbar-header -->

      <ul class="nav navbar-top-links navbar-right">
        <li class="dropdown">
          <a class="dropdown-toggle" data-toggle="dropdown" href="#">
            <i class="fa fa-user fa-fw"></i>  <i class="fa fa-caret-down"></i>
          </a>

          <!-- buat logout -->
          <ul class="dropdown-menu dropdown-user">
            <li><a href="#" id="logout"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
            </li>
          </ul>
          <!-- /.dropdown-user -->
        </li>
        <!-- /.dropdown -->
      </ul>
      <!-- /.navbar-top-links -->

      <div class="navbar-default navbar-static-side" role="navigation">
        <div class="sidebar-collapse">
          <ul class="nav" id="side-menu">

            <!-- SIDE LISET MENU -->
            <li>
              <a href="index.html"><i class="fa fa-graduation-cap fa-fw"></i> Sekolah</a>
            </li>
            <li>
              <a href="index.html"><i class="fa fa-group fa-fw"></i> Pengguna</a>
            </li>
            <li>
              <a href="index.html"><i class="fa fa-file-text-o fa-fw"></i> Berkas</a>
            </li>
            <li>
              <a href="index.html"><i class="fa fa-user fa-fw"></i> Profile</a>
            </li>
          </ul>
          <!-- END SIDE LIST MENU -->

          <!-- /#side-menu -->
        </div>
        <!-- /.sidebar-collapse -->
      </div>
      <!-- /.navbar-static-side -->
    </nav>

    <div id="page-wrapper">

      <!-- CONTENT HEADER -->
      <div class="row">
        <div class="col-lg-12">
          <h1 class="page-header">Profile</h1>
        </div>
        <!-- /.col-lg-12 -->
      </div>
      <!-- END CONTENT HEADER -->
      <!-- /.row -->

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
                  <img id="profile" src="https://statikosi.s3.amazonaws.com/profile.png" height="100" width="100" alt="">
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
                                <h4 class="modal-title" id="myModalLabel">Form tambah pengguna</h4>
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
    <!-- /#page-wrapper -->

  </div>
  <!-- /#wrapper -->
  <!-- Core Scripts - Include with every page -->
  <script src="js/jquery-1.10.2.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/plugins/metisMenu/jquery.metisMenu.js"></script>

  <!-- Page-Level Plugin Scripts - Blank -->

  <!-- SB Admin Scripts - Include with every page -->
  <script src="js/sb-admin.js"></script>

  <!-- Page-Level Demo Scripts - Blank - Use for reference -->
<script>
    var host='http://api.local/';
    $(document).ready(function(){
        if(sessionStorage.getItem('access_key')==null)
        {
            $(location).attr('href','login.php');
        }
        alert(sessionStorage.access_key);
        $('#logout').click(function(){
            alert('Anda Berhasil Logout');
            sessionStorage.clear();
            location.reload();
        });

        //detai pengguna
        $.getJSON(host+"user.php?detail="+sessionStorage.getItem('access_key'),function(result){
            $.each(result.data, function(i, sk){
               // alert(sk.nama_user+" "+sk.email+" "+sk.alamat+" "+sk.username+" "+sk.foto+" "+sk.nama_sekolah);

                $("#profile").attr("src",sk.foto);
                $('#username').val(sk.username);
                $('#nama').val(sk.nama_user);
                $('#sekolah').val(sk.nama_sekolah);
                $('#email').val(sk.email);
                $('#alamat').val(sk.alamat);

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
            alert(host+sessionStorage.getItem('access_key'));
            $.ajax({
                url : host+'user.php?menu=ubahpass&access_key='+sessionStorage.getItem('access_key'),
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

    });
</script>
</body>

</html>
