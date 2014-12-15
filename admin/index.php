<!DOCTYPE html>
<html>

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <title id="judul">Dashboard</title>

  <!-- Core CSS - Include with every page -->
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <link href="font-awesome/css/font-awesome.css" rel="stylesheet">

  <!-- Page-Level Plugin CSS - Blank -->

  <!-- SB Admin CSS - Include with every page -->
  <link href="css/sb-admin.css" rel="stylesheet">

</head>

<body onload="cekSesi();">

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
        <a class="navbar-brand" href="index.php">Admin Dashboard</a>
      </div>
      <!-- /.navbar-header -->

      <ul class="nav navbar-top-links navbar-right">
        <li class="dropdown">
          <a class="dropdown-toggle" data-toggle="dropdown" href="#">
            <i class="fa fa-user fa-fw"></i>  <i class="fa fa-caret-down"></i>
          </a>

          <!-- buat logout -->
          <ul class="dropdown-menu dropdown-user">
            <li><a href="#" onclick="logout();"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
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
              <a href="sekolah.php"><i class="fa fa-graduation-cap fa-fw"></i> Sekolah</a>
            </li>
            <li>
              <a href="pengguna.php"><i class="fa fa-group fa-fw"></i> Pengguna</a>
            </li>
            <li>
              <a href="berkas.php"><i class="fa fa-file-text-o fa-fw"></i> Berkas</a>
            </li>
            <li>
              <a href="profile.php"><i class="fa fa-user fa-fw"></i> Profile</a>
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
          <h1 class="page-header">Blank</h1>
        </div>
        <!-- /.col-lg-12 -->
      </div>
      <!-- END CONTENT HEADER -->
      <!-- /.row -->

      <!-- CONTENT -->
      <div class="row">
        <div class="col-lg-12 text-center">
          <img src="mamam.jpg" alt="">
          <h2>Selamat Datang Admin</h2>
          <a href="#" onclick="logout();">Logout</a>
        </div>
      </div>
      <!-- END CONTENT -->

      <!-- TABLE -->
      <!-- /.row -->
      <div class="row">
        <div class="col-lg-12">
          <div class="panel panel-default">

            <!-- TITLE TABLE -->
            <div class="panel-heading">
              Table
            </div>
            <!-- /.panel-heading -->
            <div class="panel-body">
              <div class="table-responsive">
                <table class="table table-striped table-bordered table-hover">
                  <thead>
                    <tr>
                      <th>NPSN</th>
                      <th>Nama Sekolah</th>
                      <th>Alamat Sekolah</th>
                      <th>Status</th>
                      <th>Op</th>
                    </tr>
                  </thead>

                  <!-- TABLE CONTENT -->
                  <tbody>
                    <tr>
                      <td>2021780</td>
                      <td>SMKN 1 Cikampek</td>
                      <td>Jl. Pangkal Perjuangan</td>
                      <td>Negeri</td>
                      <td>Ubah</td>
                    </tr>
                  </tbody>
                  <!-- TABLE CONTENT -->
                </table>
              </div>
              <!-- /.table-responsive -->
            </div>
            <!-- /.panel-body -->
          </div>
          <!-- /.panel -->
        </div>
      </div>
      <!-- END TABLE -->

        <!-- FORM -->
      <div class="row">
        <div class="col-md-12">
          <div class="panel panel-default">
            <div class="panel-heading">
              Basic Form Elements
            </div>

            <div class="panel-body">
              <div class="row">
                <!-- FOTO -->
                <div class="col-md-3 text-center">
                  <img src="#" alt="">
                  <a href="#" class="btn btn-primary btn-block" style="margin-top:25px">Ubah Password</a>
                </div>
                <!-- END FOTO -->

                <!-- FORM -->
                <div class="col-md-9">

                  <!-- FORM -->
                  <form action="" class="form-horizontal" role="form">

                    <!-- TEXT INPUT -->
                    <div class="form-group">
                      <!-- LABEL -->
                      <label for="#" class="col-sm-2 control-label">Username</label>
                      <!-- END LABEL -->

                      <div class="col-sm-10">

                        <!-- INPUT -->
                        <input type="text" class="form-control" id="#" placeholder="Username">
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
                        <input type="text" class="form-control" id="#" placeholder="Nama Pengguna">
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
                        <input type="text" class="form-control" id="#" placeholder="Nama Sekolah">
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
                        <input type="email" class="form-control" id="#" placeholder="E-Mail@Mail.com">
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
                        <textarea rows="4" class="form-control" id="#" placeholder="Username"></textarea>
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

            </div>
            <!-- /.panel-body -->
          </div>
        </div>
      </div>
      <!-- END FORM -->

      <div class="row">
          <div class="col-md-12">
              <button class="btn-primary btn" id="biru">Biru</button> <button class="btn-danger btn">Merah</button>
              <button class="btn-success btn">Hijau</button> <button class="btn-warning btn">Kuning</button>
          </div>
      </div>

    </div>
    <!-- /#page-wrapper -->

  </div>
  <!-- /#wrapper -->
  <!-- Core Scripts - Include with every page -->
  <script src="js/jquery-1.10.2.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/plugins/metisMenu/jquery.metisMenu.js"></script>
  <script src="js/ceksesi.js"></script>

  <!-- Page-Level Plugin Scripts - Blank -->

  <!-- SB Admin Scripts - Include with every page -->
  <script src="js/sb-admin.js"></script>

  <!-- Page-Level Demo Scripts - Blank - Use for reference -->
<script>
    $(document).ready(function(){

    });
</script>
</body>

</html>