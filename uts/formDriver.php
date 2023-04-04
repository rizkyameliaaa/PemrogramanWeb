<?php 
  //memanggil file conn.php yang berisi koneski ke database
  //dengan include, semua kode dalam file conn.php dapat digunakan pada file index.php
  include ('conn.php'); 

  $status = '';
  //melakukan pengecekan apakah ada form yang dipost
  if ($_SERVER['REQUEST_METHOD'] === 'POST') {
      $id_driver = $_POST['id_driver'];
      $nama = $_POST['nama'];
      $no_sim = $_POST['no_sim'];
      $alamat = $_POST['alamat'];
      //query SQL
      $query = "INSERT INTO driver (id_driver, nama, no_sim, alamat) VALUES('$id_driver','$nama','$no_sim','$alamat')"; 

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
      <a class="navbar-brand" href="index.php">Data Trans UPN</a>
    </nav>

    <div class="container-fluid">
      <div class="row">
        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
          
          <?php 
              if ($status=='ok') {
                echo '<br><br><div class="alert alert-success" role="alert">Data Driver berhasil disimpan</div>';
              }
              elseif($status=='err'){
                echo '<br><br><div class="alert alert-danger" role="alert">Data Driver gagal disimpan</div>';
              }
           ?>

          <h2 style="margin: 30px 0 30px 0;">Form Driver</h2>
          <form action="formDriver.php" method="POST">
            
            <div class="form-group">
              <label>id_driver</label>
              <input type="text" class="form-control" placeholder="ID Driver" name="id_driver" required="required" readonly>
            </div>
            <div class="form-group">
              <label>nama</label>
              <input type="text" class="form-control" placeholder="nama" name="nama" required="required">
            </div>
            <div class="form-group">
              <label>no_sim</label>
              <input type="text" class="form-control" placeholder="no_sim" name="no_sim" required="required">
            </div>
            <div class="form-group">
              <label>alamat</label>
              <input type="text" class="form-control" placeholder="alamat" name="alamat" required="required">
            </div>
            <button type="submit" class="btn btn-primary">Simpan</button>
          </form>
        </main>
      </div>
    </div>

  </body>
</html>