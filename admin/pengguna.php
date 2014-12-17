<!DOCTYPE html>
<html>

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title id="judul">Dashboard</title>

  <!-- Core CSS - Include with every page -->
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <link href="css/jquery-ui.min.css" rel="stylesheet">
  <link href="css/jquery-ui.theme.min.css" rel="stylesheet">
  <link href="font-awesome/css/font-awesome.css" rel="stylesheet">

  <!-- Page-Level Plugin CSS - Blank -->

  <!-- SB Admin CSS - Include with every page -->
  <link href="css/sb-admin.css" rel="stylesheet">
<style>
    .ui-autocomplete {
        z-index: 5000;
    }
</style>
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
          <h1 class="page-header">Halaman Pengguna</h1>
        </div>
        <!-- /.col-lg-12 -->
      </div>
      <!-- END CONTENT HEADER -->
      <!-- /.row -->
      <!-- CONTENT -->
      <div class="row">
        <div class="col-md-6 text-left">
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bs-example-modal-md">Pendaftaran Pengguna</button>
        </div>
      </div>
      <!-- END CONTENT -->

        <!-- Small modal -->


        <div class="modal fade bs-example-modal-md" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-md">

                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                        <h4 class="modal-title" id="myModalLabel">Form tambah pengguna</h4>
                    </div>
                    <div class="modal-body">
                        <form role="form" id="tambah_pengguna" method="post">
                            <div class="form-group">
                                <!--<label for="recipient-name" class="control-label">Recipient:</label>-->
                                <input type="text" class="form-control" name="username" placeholder="Username" required>
                            </div>
                            <div class="form-group">
                                <input type="password" class="form-control" name="password" placeholder="Password" required>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" name="nama" placeholder="Nama lengkap" required>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" name="nama_sekolah" id="sekolah" placeholder="Nama Sekolah" required>
                            </div>
                            <div class="form-group">
                                <label for="jenis_user" class="control-label">Jenis user</label>
                                <select name="jenis_user" id="jenis_user">
                                    <option value="1">Admin</option>
                                    <option value="2">Pengajar</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <input type="email" class="form-control" name="email" required placeholder="E-mail">
                            </div>
                            <div class="form-group">
                                <!--<label for="message-text" class="control-label">Message:</label>-->
                                <textarea class="form-control" name="alamat" placeholder="Alamat" required></textarea>
                            </div>
                            <div class="form-group">
                                <label for="foto" class="control-label">Foto :</label>
                                <input type="file"  name="foto" id="foto"  required>
                            </div>
                            <input type="hidden" name="npsn" id="npsn">
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
      <div class="row tab-content">
        <div class="col-lg-12 tab">
          <div class="panel panel-default">

            <!-- TITLE TABLE -->
            <div class="panel-heading">
              Daftar Pengguna
            </div>
            <!-- panel-heading -->
            <div class="panel-body">
              <div class="table-responsive">
                <table class="table table-striped table-bordered table-hover" id="pengguna">
                  <thead>
                    <tr>
                      <th>Username</th>
                      <th>Nama</th>
                      <th>Jenis</th>
                      <th>Sekolah</th>
                      <th>Alamat</th>
                      <th>E-mail</th>
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
        </div>
      </div>
      <!-- END TABLE -->


      </div>
    <!-- /#page-wrapper -->

  </div>
  <!-- /#wrapper -->
  <!-- Core Scripts - Include with every page -->
  <script src="js/jquery-1.10.2.js"></script>
  <script src="js/jquery-ui.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/plugins/metisMenu/jquery.metisMenu.js"></script>
  <script src="js/plugins/dataTables/jquery.dataTables.js"></script>
  <script src="js/ceksesi.js"></script>

  <!-- Page-Level Plugin Scripts - Blank -->

  <!-- SB Admin Scripts - Include with every page -->
  <script src="js/sb-admin.js"></script>

  <!-- Page-Level Demo Scripts - Blank - Use for reference -->
<script>
    var host='http://api.osindonesia.org/'
    $(document).ready(function(){
        var tambah_pengguna='http://api.osindonesia.org/user.php?menu=tambah'
       /* if(sessionStorage.getItem('access_key')==null)
        {
            $(location).attr('href','login.php');
        }
        alert(sessionStorage.access_key);
        */

        //logout
        $('#logout').click(function(){
            alert('Anda Berhasil Logout');
            sessionStorage.clear();
            location.reload();
        });

        //auto complete sekolah
        $("#sekolah").autocomplete({
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

        //daftar pengguna
        $.getJSON("http://api.osindonesia.org/user.php",function(result){
            $.each(result.data, function(i, sk){
                //alert(sk.nama_sekolah);
                $("#pengguna tbody").append("<tr>" +
                "<td>"+sk.username+"</td>"+
                "<td>"+sk.nama_user+"</td>"+
                "<td>"+sk.jenis_user+"</td>"+
                "<td>"+sk.nama_sekolah+"</td>"+
                "<td>"+sk.alamat+"</td>"+
                "<td>"+sk.email+"</td>"+
                "<td><a href='#' onclick='hapusPengguna(\""+sk.username+"\")'>Hapus</a></td>"+
                "</tr>");
            })
        }).done(function(){
            $('#pengguna').dataTable();
        });

        //menambah pengguna
        $('#tambah_pengguna').submit(function(){
            alert('form tambah');
            var formData = new FormData($(this)[0]);
            $.ajax({
                url : tambah_pengguna,
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
                        $('form#tambah_pengguna').each(function(){
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

    function hapusPengguna(username)
    {
       // alert('hapus '+username);
        if (confirm('Anda yakin akan menghapus '+username+' ini?')) {
            //hapus
            $.getJSON(host+"user.php",{
                menu : "hapus",
                username : username,
                access_key : sessionStorage.getItem('access_key')
            }).done(function(data){
                window.location.reload();
            });
        } else {

        }

    }
</script>
</body>

</html>
