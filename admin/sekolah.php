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
        <a class="navbar-brand" href="index.html">Dashboard</a>
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
              <a href="sekolah.php"><i class="fa fa-graduation-cap fa-fw"></i> Sekolah</a>
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
          <h1 class="page-header">Halaman Sekolah</h1>
        </div>
        <!-- /.col-lg-12 -->
      </div>
      <!-- END CONTENT HEADER -->
      <!-- /.row -->

      <!-- CONTENT -->
      <div class="row">
        <div class="col-lg-3 text-left">
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bs-example-modal-md">Tambah Sekolah</button>
        </div>
      </div>
      <!-- END CONTENT -->
        <!-- Small modal -->


        <div class="modal fade bs-example-modal-md" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-md">

                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                        <h4 class="modal-title" id="myModalLabel">Form tambah sekolah</h4>
                    </div>
                    <div class="modal-body">
                        <form role="form" id="tambah_sekolah" method="post">
                            <div class="form-group">
                                <!--<label for="recipient-name" class="control-label">Recipient:</label>-->
                                <input type="number" class="form-control" name="npsn" placeholder="NPSN" required>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" name="nama_sekolah" placeholder="Nama Sekolah" required>
                            </div>
                            <div class="form-group">
                                <label for="status" class="control-label">Status : </label>
                                <select name="status" id="status" class="form-control">
                                    <option value="Negeri">Negeri</option>
                                    <option value="Swasta">Swasta</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <!--<label for="message-text" class="control-label">Message:</label>-->
                                <textarea class="form-control" name="alamat" placeholder="Alamat" required></textarea>
                            </div>
                            <div class="form-group">
                                <label for="logo" class="control-label">Logo :</label>
                                <input type="file"  name="logo" id="logo"  required>
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

        <!-- END Small Modal-->
      <!-- TABLE -->
      <!-- /.row -->
      <div class="row">
        <div class="col-lg-12">
          <div class="panel panel-default">

            <!-- TITLE TABLE -->
            <div class="panel-heading">
              Daftar Sekolah
            </div>
            <!-- /.panel-heading -->
            <div class="panel-body">
              <div class="table-responsive">
                <table class="table table-striped table-bordered table-hover" id="sekolah">
                  <thead>
                    <tr>
                      <th>NPSN</th>
                      <th>Nama Sekolah</th>
                      <th>Alamat Sekolah</th>
                      <th>Status</th>
                      <th>Op</th>
                    </tr>
                  </thead>
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
        </div>
      </div>
      <!-- END TABLE -->



    </div>
    <!-- /#page-wrapper -->

  </div>
  <!-- /#wrapper -->
  <!-- Core Scripts - Include with every page -->
  <script src="js/jquery-1.10.2.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/plugins/metisMenu/jquery.metisMenu.js"></script>
  <script src="js/plugins/dataTables/jquery.dataTables.js"></script>

  <!-- Page-Level Plugin Scripts - Blank -->

  <!-- SB Admin Scripts - Include with every page -->
  <script src="js/sb-admin.js"></script>

  <!-- Page-Level Demo Scripts - Blank - Use for reference -->
<script>
    $(document).ready(function(){
        var urlTambah='http://api.poliga.me/sekolah.php?menu=tambah';
        //cek session
        /*if(sessionStorage.getItem('access_key')==null)
        {
            $(location).attr('href','login.php');
        }*/
        //alert(sessionStorage.access_key);
        //logout
        $('#logout').click(function(){
            alert('Anda Berhasil Logout');
            sessionStorage.clear();
            location.reload();
        });
        //data table
        //$('#sekolah').dataTable();

        //get sekolah
        $.getJSON("http://api.poliga.me/sekolah.php",function(result){
            $.each(result.data, function(i, sk){
                //alert(sk.nama_sekolah);
                $("#sekolah tbody").append("<tr>" +
                "<td>"+sk.npsn+"</td>"+
                    "<td>"+sk.nama_sekolah+"</td>"+
                    "<td>"+sk.alamat_sekolah+"</td>"+
                    "<td>"+sk.status+"</td>"+
                    "<td>Hapus | Ubah</td>"+
                "</tr>");
            })
        }).done(function(){
            $('#sekolah').dataTable();
        });

        //tambah sekolah
        $('form#tambah_sekolah').submit(function(){
            alert('form tambah');
            var formData = new FormData($(this)[0]);
            $.ajax({
                url : urlTambah,
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
                        $('form#tambah_sekolah').each(function(){
                           this.reset();
                        });
                    }
                    else
                    {
                        alert(respon.pesan);

                    }
                },
                cache: false,
                contentType: false,
                processData: false
            });
            return false;
        });
    });
</script>
</body>

</html>
