<?php 
  //memanggil file conn.php yang berisi koneski ke database
  //dengan include, semua kode dalam file conn.php dapat digunakan pada file index.php
  include ('conn.php'); 

  $status = '';
  //melakukan pengecekan apakah ada form yang dipost
  if ($_SERVER['REQUEST_METHOD'] === 'POST') {
      $id_trans_upn = $_POST['id_trans_upn'];
      $id_kondektur = $_POST['id_kondektur'];
      $id_bus = $_POST['id_bus'];
      $id_driver = $_POST['id_driver'];
      $jumlah_km = $_POST['jumlah_km'];
      $tanggal = $_POST['tanggal'];
      //query SQL
      $query = "INSERT INTO trans_upn (id_trans_upn, id_kondektur, id_bus, id_driver, jumlah_km, tanggal) VALUES('$id_trans_upn', '$id_kondektur', '$id_bus','$id_driver','$jumlah_km','$tanggal')"; 

      //eksekusi query
      $result = mysqli_query(connection(),$query);
      if ($result) {
        $status = 'ok';
      }
      else{
        $status = 'err';
      }
  }

?>
<!DOCTYPE html>
<html>
  <head>
    <link rel="stylesheet" href="style.css">
    <title>Trans UPN</title>
  </head>

  <body>
    <nav class="navbar navbar-dark fixed-top bg-dark flex-md-nowrap p-0 shadow">
      <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="index.php">Data Trans UPN</a>
    </nav>

    <div class="container-fluid">
      <div class="row">

        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
          
          <?php 
              if ($status=='ok') {
                echo '<br><br><div class="alert alert-success" role="alert">Data Trans UPN berhasil disimpan</div>';
              }
              elseif($status=='err'){
                echo '<br><br><div class="alert alert-danger" role="alert">Data Trans UPN gagal disimpan</div>';
              }
           ?>

          <h2 style="margin: 30px 0 30px 0;">Form Transupn</h2>
          <form action="formTransupn.php" method="POST">
            
            <div class="form-group">
              <label>id_trans_upn</label>
              <input type="text" class="form-control" placeholder="ID Trans UPN" name="id_trans_upn" required="required" readonly>
            </div>
            <div class="form-group">
              <label>id_kondektur</label>
              <input type="text" class="form-control" placeholder="ID Kondektur" name="id_kondektur" required="required">
            </div>
            <div class="form-group">
              <label>id_bus</label>
              <input type="text" class="form-control" placeholder="ID Bus" name="id_bus" required="required">
            </div>
            <div class="form-group">
              <label>id_driver</label>
              <input type="text" class="form-control" placeholder="ID Driver" name="id_driver" required="required">
            </div>
            <div class="form-group">
              <label>jumlah km</label>
              <input type="text" class="form-control" placeholder="jumlah_km" name="jumlah_km" required="required">
            </div>
            <div class="form-group">
              <label>tanggal</label>
              <input type="text" class="form-control" placeholder="tanggal" name="tanggal" required="required">
            </div>
            <button type="submit" class="btn btn-primary">Simpan</button>
          </form>
        </main>
      </div>
    </div>

  </body>
</html>