<?php 
  //memanggil file conn.php yang berisi koneski ke database
  //dengan include, semua kode dalam file conn.php dapat digunakan pada file index.php
  include ('conn.php'); 
?>
<!DOCTYPE html>
<html>
  <head>
    <link rel="stylesheet" href="styleindex.css">
    <title>Trans UPN</title>
    <style>
        .hijau{
            background-color: green;
        }
        .kuning {
            background-color : yellow;
        }
        .merah{
            background-color : red;
        }
    </style>
  </head>

  <body>
    <nav class="navbar navbar-dark fixed-top bg-dark flex-md-nowrap p-0 shadow">
      <a class="navbar-brand col-sm-2 col-md-2 mr-0" href="#">Trans UPN</a>
    </nav>

    <div class="container-fluid">
      <div class="row">
        <nav class="col-md-2 d-none d-md-block bg-light sidebar">
          <div class="sidebar-sticky">
            <ul class="nav flex-column" style="margin-top:100px;">
              <li class="nav-item">
                <a class="nav-link active" href="<?php echo "index.php"; ?>">Data Trans UPN</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="<?php echo "formBus.php"; ?>">Tambah Data Bus</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="<?php echo "formDriver.php"; ?>">Tambah Data Driver</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="<?php echo "formKondektur.php"; ?>">Tambah Data Kondektur</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="<?php echo "formTransupn.php"; ?>">Tambah Data Trans UPN</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="<?php echo "pendapatanDriver.php"; ?>">Pendapatan Driver</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="<?php echo "pendapatanKondektur.php"; ?>">Pendapatan Kondektur</a>
              </li>
            </ul>
          </div>
        </nav>

        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
          <?php 
            //mengecek apakah proses update dan delete sukses/gagal
            if (@$_GET['status']!==NULL) {
              $status = $_GET['status'];
              if ($status=='ok') {
                echo '<br><br><div class="alert alert-success" role="alert">Data Trans UPN berhasil di-update</div>';
              }
              elseif($status=='err'){
                echo '<br><br><div class="alert alert-danger" role="alert">Data Trans UPN gagal di-update</div>';
              }

            }
           ?>
            <h2 style="margin: 30px 30px 30px 30px;">Data Bus</h2>
            <div class = "item3">
                <form method = "get">
                    <label for="status" style="margin: 30px 30px 30px 30px;">Filter berdasarkan status : </label>
                    <select class="select_filter" id="status_id" name="status" required>
                        <option value="all">-- Pilih status --</option>
                        <option value="1" <?php if (isset($_GET['status']) && $_GET['status'] == 1) {
                            echo " selected";
                        } ?>>
                            Beroperasi / Aktif</option>
                        <option value="2" <?php if (isset($_GET['status']) && $_GET['status'] == 2) {
                            echo " selected";
                        } ?>>
                            Cadangan</option>
                        <option value="0" <?php if (isset($_GET['status']) && $_GET['status'] == 0) {
                            echo " selected";
                        } ?>>
                            Dalam Perbaikan / Rusak</option>
                    </select>
                    <input type="submit" value="Filter">
                </form>
            <div class="table-responsive">
            <table border="1" class="table table-striped table-sm">
              <thead>
                <tr>
                  <th>ID Bus</th>
                  <th>Plat</th>
                  <th>Status</th>
                  <th>Jumlah KM</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                <?php 
                  //proses menampilkan data dari database:
                  //siapkan query SQL
                  if (isset($_GET['status'])) {
                    $status = $_GET['status'];
                    // $query = "SELECT * FROM bus WHERE status = $status";
                    $query = "select bus.id_bus,bus.plat,bus.status,trans_upn.jumlah_km from bus join trans_upn on bus.id_bus = trans_upn.id_trans_upn WHERE status = '$status'";
                } else {
                    // $query = "SELECT * FROM bus";
                    $query = "select bus.id_bus,bus.plat,bus.status,trans_upn.jumlah_km from bus join trans_upn on bus.id_bus = trans_upn.id_trans_upn";
                }
                $result = mysqli_query(connection(), $query);
                ?>

                <?php while($data = mysqli_fetch_array($result)): ?>
                  <tr class="<?php echo $data['status'] == '1' ? 'hijau' : ($data['status'] == '2' ? 'kuning' : 'merah'); ?>">
                    <td><?php echo $data['id_bus'];  ?></td>
                    <td><?php echo $data['plat'];  ?></td>
                    <td><?php echo $data['status'];  ?></td>
                    <td><?php echo $data['jumlah_km'];  ?></td>
                    <td>
                      <a href="<?php echo "updateBus.php?id_bus=".$data['id_bus']; ?>" class="btn btn-outline-warning btn-sm">Update</a>
                      &nbsp;&nbsp;
                      <a href="<?php echo "deleteBus.php?id_bus=".$data['id_bus']; ?>" class="btn btn-outline-danger btn-sm"> Delete</a>
                    </td>
                  </tr>
                <?php endwhile ?>
              </tbody>
            </table>
            </div>

            <h2 style="margin: 30px 0 30px 0;">Data Driver</h2>
            <div class="table-responsive">
            <table border="1" class="table table-striped table-sm">
              <thead>
                <tr>
                  <th>id_driver</th>
                  <th>nama</th>
                  <th>no_sim</th>
                  <th>alamat</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                <?php 
                  //proses menampilkan data dari database:
                  //siapkan query SQL
                  $query = "SELECT * FROM driver";
                  $result = mysqli_query(connection(),$query);
                 ?>

                 <?php while($data = mysqli_fetch_array($result)): ?>
                  <tr>
                    <td><?php echo $data['id_driver'];  ?></td>
                    <td><?php echo $data['nama'];  ?></td>
                    <td><?php echo $data['no_sim'];  ?></td>
                    <td><?php echo $data['alamat'];  ?></td>
                    <td>
                      <a href="<?php echo "updateDriver.php?id_driver=".$data['id_driver']; ?>" class="btn btn-outline-warning btn-sm"> Update</a>
                      &nbsp;&nbsp;
                      <a href="<?php echo "deleteDriver.php?id_driver=".$data['id_driver']; ?>" class="btn btn-outline-danger btn-sm"> Delete</a>
                    </td>
                  </tr>
                 <?php endwhile ?>
              </tbody>
            </table>
            </div>

            <h2 style="margin: 30px 0 30px 0;">Data Kondektur</h2>
            <div class="table-responsive">
            <table border="1" class="table table-striped table-sm">
              <thead>
                <tr>
                  <th>id_kondektur</th>
                  <th>nama</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                <?php 
                  //proses menampilkan data dari database:
                  //siapkan query SQL
                  $query = "SELECT * FROM kondektur";
                  $result = mysqli_query(connection(),$query);
                 ?>

                 <?php while($data = mysqli_fetch_array($result)): ?>
                  <tr>
                    <td><?php echo $data['id_kondektur'];  ?></td>
                    <td><?php echo $data['nama'];  ?></td>
                    <td>
                      <a href="<?php echo "updateKondektur.php?id_kondektur=".$data['id_kondektur']; ?>" class="btn btn-outline-warning btn-sm"> Update</a>
                      &nbsp;&nbsp;
                      <a href="<?php echo "deleteKondektur.php?id_kondektur=".$data['id_kondektur']; ?>" class="btn btn-outline-danger btn-sm"> Delete</a>
                    </td>
                  </tr>
                 <?php endwhile ?>
              </tbody>
            </table>
            </div>

            <h2 style="margin: 30px 0 30px 0;">Data Trans UPN</h2>
            <div class="table-responsive">
            <table border="1" class="table table-striped table-sm">
              <thead>
                <tr>
                  <th>id_trans_upn</th>
                  <th>id_kondektur</th>
                  <th>id_bus</th>
                  <th>id_driver</th>
                  <th>jumlah_km</th>
                  <th>tanggal</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                <?php 
                  //proses menampilkan data dari database:
                  //siapkan query SQL
                  $query = "SELECT * FROM trans_upn";
                  $result = mysqli_query(connection(),$query);
                 ?>

                 <?php while($data = mysqli_fetch_array($result)): ?>
                  <tr>
                    <td><?php echo $data['id_trans_upn'];  ?></td>
                    <td><?php echo $data['id_kondektur'];  ?></td>
                    <td><?php echo $data['id_bus'];  ?></td>
                    <td><?php echo $data['id_driver'];  ?></td>
                    <td><?php echo $data['jumlah_km'];  ?></td>
                    <td><?php echo $data['tanggal'];  ?></td>
                    <td>
                      <a href="<?php echo "updateTransupn.php?id_trans_upn=".$data['id_trans_upn']; ?>" class="btn btn-outline-warning btn-sm"> Update</a>
                      &nbsp;&nbsp;
                      <a href="<?php echo "deleteTransupn.php?id_trans_upn=".$data['id_trans_upn']; ?>" class="btn btn-outline-danger btn-sm"> Delete</a>
                    </td>
                  </tr>
                 <?php endwhile ?>
              </tbody>
            </table>
            </div>

        </main>
      </div>
    </div>
  </body>
</html>
